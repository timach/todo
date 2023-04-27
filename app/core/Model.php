<?php

namespace App\Core;

use PDO;
use SimpleCrud\Database;

abstract class Model
{
	public $database;
	public $db;
	
	public function __construct()
	{
		$config = require '../app/config/mysql.php';
		$pdo = new PDO($config['dsn'], $config['user'], $config['password']);
        $this->db = new Database($pdo);
	}

}