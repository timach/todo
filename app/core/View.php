<?php

namespace App\Core;

class View
{
	public $action;
    public $path;

	public function __construct($name, $action='index')
    {
		$this->path = $name.'/'.$action;
	}

	public function redirect($url)
    {
		header('location: '.$url);
		die();
	}

	public function render($title, $data = [])
    {
		extract($data);
		$path = '../app/views/'.strtolower($this->path).'.php';
        
		if (file_exists($path))
        {
			ob_start();
			require $path;
			$body = ob_get_clean();
			require '../app/views/templates/default.php';
		}
	}
}	