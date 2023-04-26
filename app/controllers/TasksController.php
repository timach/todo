<?php 

namespace App\Controllers;

use App\Core\Controller;

class TasksController extends Controller
{
    public function createAction()
    {

    }

    public function editAction()
    {
        
    }

    public function indexAction()
    {
        $title = 'index';
        $this->view->render($title);
    }
}