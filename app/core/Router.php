<?php 

namespace App\Core;

class Router
{
    private $controllerName;
    private $actionName;

    public function __construct()
    {
        $this->controllerName = isset($_GET['controller']) ? $_GET['controller'] : 'tasks';
        $this->actionName = isset($_GET['action']) ? $_GET['action'] : 'list';
    }
    public function run()
    {
        $controllerPath = 'app\controllers\\'.$this->controllerName.'Controller';
        $action = $this->actionName.'Action';

        $controller = new $controllerPath;
        $controller->$action();
    }
}