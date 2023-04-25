<?php 

namespace App\Core;

class Router
{
    private $controllerName;
    private $actionName;

    public function __construct()
    {
        $this->controllerName = isset($_GET['controller']) ? $_GET['controller'] : 'Tasks';
        $this->actionName = isset($_GET['action']) ? $_GET['action'] : 'index';
    }
    public function run()
    {
        $controllerPath = 'App\Controllers\\'.$this->controllerName.'Controller';
        $action = $this->actionName.'Action';

        $controller = new $controllerPath;
        $controller->$action();
    }
}