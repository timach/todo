<?php

namespace App\Core;

use App\Core\View;

abstract class Controller
{
	public $view;
    public $model;
	public $isAdmin;

	public function __construct($name, $action)
    {
		$message = isset($_SESSION['message']) ? $_SESSION['message'] : '';
		$_SESSION['message'] = '';

		$this->view = new View($name, $action, $message);
		$this->model = $this->loadModel($name);

		$account = $this->loadModel("Account");
		$session = isset($_SESSION['isAdmin']) ? $_SESSION['isAdmin'] : false;
		$this->isAdmin = $account->isAdmin($session);
	}

	public function loadModel($name)
    {
		$path = 'App\Models\\'.ucfirst($name);
		
		if (class_exists($path))
        {
			return new $path;
		}
	}
}