<?php

error_reporting(E_ALL);

ini_set('ignore_repeated_errors', TRUE);

ini_set('display_errors', FALSE);

ini_set('log_errors', TRUE);

ini_set('error_log', 'php-error.log');
error_log("Inicio de aplicación web"); 

require_once 'config/config.php';
require_once 'libs/IModel.php';
require_once 'libs/model.php';
require_once 'models/user.php';


require_once 'libs/controller.php';
require_once 'libs/session.php';
require_once 'controller/sessionController.php';
require_once 'controller/indexController.php';
require_once 'controller/profileController.php';
require_once 'libs/view.php';
require_once 'libs/app.php';

require_once 'config/config.php';

$app = new App();

 ?>
