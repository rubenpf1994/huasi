<?php

error_reporting(E_ALL);

ini_set('ignore_repeated_errors', TRUE);

ini_set('display_errors', FALSE);

ini_set('log_errors', TRUE);

ini_set('error_log', 'php-error.log');
error_log("Inicio de aplicación web"); 

require_once 'controller/index.php';
require_once 'controller/profile.php';
require_once 'libs/view.php';
require_once 'libs/controller.php';
require_once 'libs/app.php';

$app = new App();

 ?>
