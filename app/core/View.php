<?php

namespace App\Core;

class View
{
    public $path;
	private $message;

	public function __construct($name, $action='index', $message='')
    {
		$this->message = $message;
		$this->path = $name.'/'.$action;
	}

	public function redirect($url)
    {
		header('location: '.$url);
		die();
	}

	public function render($title, $data = [])
    {
		$message = $this->message;
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