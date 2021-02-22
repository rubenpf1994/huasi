<?php


    class App{
        function __construct()
        {
            $url = (!empty($_GET['url'])?$_GET['url']:NULL);
            $params = trim($url, '/');
            $params = explode("/", $params);
            if($url===NULL){
                $controller = new Homepage();
                $controller->render('homepage/index.html.twig');
            }else{
                //redirige al controller
                $route = 'controller/'.$params[0].'Controller.php';
                if(file_exists($route)){
                    require_once $route;
                    switch ($route){
                        case 'controller/registerController.php':
                            $controller = new Register();
                            $controller->render('register/index.html.twig');
                            break;
                        case 'controller/loginController.php':
                            $controller = new Login();
                            $controller->render('login/index.html.twig');
                            break;  
                        case 'controller/profileController.php':
                            $controller = new Profile();
                            $controller->render('profile/index.html.twig');
                            break;      
                    } 
                    if(isset($params[1])){
                        if(method_exists($controller, $params[1])){
                            $controller->{$params[1]}();
                        }else{
                            //Si no existe la ruta
                            echo 'Error 404, page not found';
                        } 
                    }
                                
                }else{
                    //Si no existe la ruta
                    echo 'Error 404, page not found';
                }
            }
        }

    }
?>