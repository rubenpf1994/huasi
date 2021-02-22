<?php
    class Controller{
        function __construct()
        {
            $this->view = new View();
        }

        function existsPost($params){
            foreach($params as $param){
                if(!isset($_POST[$param])||isset($_POST[$param])&&$_POST[$param]===""){
                    echo 'Post no válido';
                    return false;
                }
            }
            return true;
        }

        function existsGet($params){
            foreach($params as $param){
                if(!isset($_GET[$param])|| isset($_GET[$param])&&$_GET[$param]===""){
                    return false;
                }
            }
            return true;
        }

        function getGet($param){
            if(isset($_GET[$param])){
                return $_GET[$param];
            }
        }

        function getPost($param){
            if(isset($_POST[$param])){
                return $_POST[$param];
            }
        }

        function redirect($url){
            header('Location: '.constant('URL').'/'.$url);
        }
    }
?>