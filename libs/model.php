<?php

require_once 'libs/database.php';
class Model{

    function __construct(){
        error_log('Model::Construct=> Inicio de Model');
        $this->db = new Database();
    }

    function query($query){
        return $this->db->connect()->query($query);
    }

    function prepare($query){
        return $this->db->connect()->prepare($query);
    }
}
?>