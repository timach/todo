<?php 

require_once '../vendor/autoload.php';

use App\Core\Router;

session_start();

$router = new Router;
$router->run();