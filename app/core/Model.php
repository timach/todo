<?php

namespace App\Core;

use App\Lib\Database;

abstract class Model
{
	public $database;
	
	public function __construct()
	{
		$this->database = new Database;
	}

}