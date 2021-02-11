 
<?php
class database{

    private $host;
    private $db;
    private $user;
    private $password;
    private $charset;

    public function __construct(){
        $this->host = constant('HOST');
        $this->db = constant('DB');
        $this->user = constant('USER');
        $this->password = constant('PASSWORD');
        $this->charset = constant('CHARSET');
    }

    public function connect(){
        try {
            $options = [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_EMULATE_PREPARES => false
            ];
            $pdo = new PDO('mysql:host='.$this->host.';dbname='.$this->db, $this->user, $this->password, $options);
            error_log('Conexión a base de datos exitosa');
            return $pdo;
        } catch (PDOException $e) {
            error_log('Error connection: '.$e->getMessage());
        }
        
    }
}
?>