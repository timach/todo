<?php 

namespace App\Controllers;

class TasksController
{
    public function createAction(){

    }

    public function editAction(){
        
    }

    public function indexAction(){
        $body = 'task controler - index action';
        $title = 'index';
        require_once(dirname(__FILE__).'/../views/templates/default.php');
    }
}