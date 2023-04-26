<?php 

namespace Application\lib;

use PDO;

class Database{
    protected $mysqli;
	
	public function __construct() {
		$config = require 'application/config/mysql.php';
        $this->mysqli = new mysqli($config["host"], $config["user"], $config["password"], $config["dbname"]);
	}

    public function query($sql, $params = []) {
		$stmt = $this->mysqli->prepare($sql);
		if (!empty($params)) {
			foreach ($params as $key => $val) {
				$stmt->bindValue(':'.$key, $val);
			}
		}
		$stmt->execute();
		return $stmt;
	}

	public function row($sql, $params = []) {
		$result = $this->query($sql, $params);
		return $result->fetchAll(PDO::FETCH_ASSOC);
	}
}