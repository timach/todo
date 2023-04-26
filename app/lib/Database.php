<?php 

namespace App\lib;

use Mysqli;

class Database{
    protected $mysqli;
	
	public function __construct()
	{
		$config = require '../app/config/mysql.php';
        $this->mysqli = new mysqli($config["host"], $config["user"], $config["password"], $config["dbname"]);

		if ($this->mysqli->connect_errno)
		{
			echo "Failed to connect to MySQL: " . $this->mysqli->connect_error;
			die();
		}
		 
		$this->mysqli->query("SET NAMES UTF8");
		$this->mysqli->query("SET CHARACTER SET UTF8");
	}

	public function __destruct()
    {
        $this->mysqli->close();
    }
	
    public function query($sql, $params = [])
	{
		return $this->mysqli->query($sql);
	}

	public function row($sql, $params = [])
	{
		$result = $this->query($sql, $params);
		return $result->fetch_all(MYSQLI_ASSOC);
	}
}