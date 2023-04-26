<?php

namespace App\Core;

use App\Core\View;

abstract class Controller
{
	public $view;
    public $model;

	public function __construct($name)
    {
		$this->view = new View($name);
		$this->model = $this->loadModel($name);
	}

	public function loadModel($name)
    {
		$path = 'application\models\\'.ucfirst($name);
		if (class_exists($path))
        {
			return new $path;
		}
	}
}