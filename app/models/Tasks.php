<?php

namespace App\Models;

use App\Core\Model;

class Tasks extends Model
{

	public function getTasks($page, $limit, $order, $orderType)
    {
        $offset = ($page-1)*$limit;
        $sql = "SELECT * FROM tasks ORDER BY `$order` $orderType LIMIT $limit OFFSET $offset";
		$result = $this->database->row($sql);
		return $result;
	}

    public function getTasksCount()
    {
        $result = $this->database->row('SELECT count(id) as count FROM tasks');
        return $result[0]["count"];
    }

}