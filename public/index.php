<?php 

require_once '../vendor/autoload.php';

use app\core\Router;

session_start();

$router = new Router;
$router->run();