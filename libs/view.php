<?php
require_once(__DIR__.'/../vendor/autoload.php');
    class View{
        function __construct()
        {
            $loader = new \Twig\Loader\FilesystemLoader('./templates');
            $this->twig = new \Twig\Environment($loader);
            error_log('ViewController::construct->Inicio de la vista');
        }

        function render($route, $params){
            error_log('ViewController::render->Loading: public/views/'.$route.'.php');
            //include 'public/views/'.$route.'.php';
            echo $this->twig->render($route, $params);
        }
    }
?>