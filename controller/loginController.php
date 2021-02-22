<?php
    class Login extends SessionController{
        function __construct()
        {
            parent::__construct();
            error_log('LoginController::constructor->Inicio login');
        }

        function oughouho(){
            
        }
        function render($route){
            $this->view->render($route,[]);
        }
    }
?>