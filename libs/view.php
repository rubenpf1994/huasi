<?php
    class View{
        function __construct()
        {
            error_log('ViewController::construct->Inicio de la vista');
        }

        function render($route){
            error_log('ViewController::render->Loading: views/'.$route.'.php');
            include 'views/'.$route.'.php';
        }
    }
?>