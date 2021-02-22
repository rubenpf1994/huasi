<?php
class Profile extends Controller{
    function __construct()
    {
        parent::__construct();
    }

    function render($route){
        $this->view->render($route,[]);
    }
}
?>