<?php

require_once 'libs/controller.php';
class Homepage extends Controller{
    function __construct()
    {
        parent::__construct();
        error_log('indexController::construct->Inicio de IndexController');
    }

    function render($route){
        $this->view->render($route);
    }


}
?>