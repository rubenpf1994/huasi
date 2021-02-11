<?php


include('..\connection\connection.php');
class User {
    private $id;
    private $name;
    private $email;
    private $password;
    private $created_at;

    public function __construct(){
        
    }

    public function getId():int{
        return $this->id;
    }

    public function getName():String{
        return $this->name;
    }

    public function setName(String $name){
        $this->name = $name;
    }

    public function getEmail():String{
        return $this->email;
    }

    public function setEmail(String $email){
        $this->name = $email;
    }

    public function getPassword():String{
        return $this->password;
    }

    public function setPassword(String $password){
        $this->name = $password;
    }

    public function getCreatedAt():DateTime{
        return $this->created_at;
    }

    public function insertUser($name, $email, $password):bool{
        
        /*$db = new Connection();
        $query = $db->getConnection()->prepare("INSERT INTO user (name, email, password) VALUES (:name, :email, :password)");
        if($query->execute(['name'=>$name, 'email'=>$email, 'password'=>$password])){
            return true;
        }*/
        return false;
    }

    public function update(){

    }

    public function delete(){

    }

    public function userExists($email, $pass){
        /*$db = new Connection();
        $query = $db->getConnection()->prepare("SELECT * FROM user WHERE email =:email AND password =:pass");
        $query->execute(['email'=>$email, 'pass'=>$pass]);

        if($query->rowCount()){
            return true;
        }else{
            return false;
        }*/
    }

    public function setUser($email){
        /*$db = new Connection();
        $query = $db->getConnection()->prepare("SELECT * FROM user WHERE email =:email");
        $query->execute(['email'=>$email]);
        $currentUser = $query->fetch(PDO::FETCH_ASSOC);
        $this->id =  $currentUser['id'];
        $this->name =  $currentUser['name'];
        $this->email =  $currentUser['email'];
        $this->password =  $currentUser['password'];
        $this->created_at =  $currentUser['created_at'];*/
    
    }

}
?>