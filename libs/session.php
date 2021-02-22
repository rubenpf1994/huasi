<?php
class Session{
    function __construct()
    {
        if(session_status()==PHP_SESSION_NONE){
            session_start();
        }
    }

    function existsSession(){
        return isset($_SESSION['user']);
        
    }

    function setCurrentUser($user){
        if(!isset($_SESSION['user'])){
            $_SESSION['user']=$user;
        }
    }

    function get_current_user(){
        if(isset($_SESSION['user'])){
            return $_SESSION['user'];
        }
    }

    function closeSession(){
        session_unset();
        session_destroy();
    }
}
?>