<?php


    class App{
        function __construct()
        {
            $url = (!empty($_GET['url'])?$_GET['url']:NULL);
            $params = trim($url, '/');
            $params = explode("/", $params);
            if($url===NULL){
                $controller = new Homepage();
                $controller->render('homepage/index');
            }else{
                //redirige al controller
                $route = 'controller/'.$params[0];
                if(file_exists($route)){
                    echo 'Estoy en '.$route;
                }else{
                    //Si no existe la ruta
                    echo 'Error 404, page not found';
                }
            }
        }

    }
?>