<?php

class Register extends SessionController{

    function __construct()
    {
        parent::__construct();
        error_log('Register::construct=>Inicio de Register Controller');
    }

    function newUser(){
        if($this->existsPost(['name','email', 'password'])){
            $user = new User();
            $user->setName($this->getPost('name'));
            $user->setEmail($this->getPost('email'));
            $user->setPassword($this->getPost('password'));
            if($user->save()){
                $this->
                $this->redirect('');
                $this->init();
            }else{
                $this->redirect('register');
            }
            
        }else{
            $this->redirect('register');
        }
        
    }

    function render($route){
        $this->view->render($route,[]);
    }
}
?>