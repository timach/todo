<?php

namespace App\Models;

use App\Core\Model;

class Tasks extends Model
{
    public function patchTask($id, $userName, $email, $taskText)
    {
        $task = $this->db->tasks[$id];

        if($taskText != $task->task_text){
            $task->edited = 1;
            $task->task_text = $taskText;
        }

        $task->user_name = $userName;
        $task->email = $email;

        $task->save();
    }

    public function getTask($id)
    {
        return $this->db->tasks[$id];
    }

	public function getTasks($page, $limit, $order, $orderType)
    {
        $offset = ($page-1)*$limit;
        
        $result =  $this->db->tasks
            ->select()
            ->orderBy("$order $orderType")
            ->limit($limit)
            ->offset($offset)
            ->get();
        
		return $result;
	}

    public function getTasksCount()
    {
        return count($this->db->tasks);
    }

    public function putTask($userName, $email, $taskText)
    {
        $id = $this->db->tasks
            ->insert([
                'user_name' => $userName,
                'email' => $email,
                'task_text' => $taskText,
                'status' => 1
            ])
            ->get();
        return $id;
    }

    public function setStatus($id)
    {
        $task = $this->db->tasks[$id];
        $task->status = 0;
        $task->save();
    }
}