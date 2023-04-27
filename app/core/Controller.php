<?php

namespace App\Core;

use App\Core\View;

abstract class Controller
{
	public $view;
    public $model;

	public function __construct($name, $action)
    {
		$this->view = new View($name, $action);
		$this->model = $this->loadModel($name);
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