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

    private function getPage(){
        $page = isset($_GET['page']) ? intval($_GET['page']) : 1;
        if($page) return $page;
        return 1;
    }

    private function getOrder(){
        $order = isset($_GET['order']) ? $_GET['order'] : 0;
        
        switch($order){
            case 'user_name':
                return 'user_name';
                break;
            case 'email':
                return 'email';
                break;
            case 'status':
                return 'status';
                break;
            default:
                return 'id';
        }
    }

    private function getOrderType(){
        $orderType = isset($_GET['order_type']) ? $_GET['order_type'] : 'ASC';
        
        switch($orderType){
            case 'DESC':
                return 'DESC';
                break;
            default:
                return 'ASC';
        }
    }

    public function indexAction()
    {
        $title = 'Список задач';
        $model = $this->loadModel("Tasks");
        $page = $this->getPage();
        $order = $this->getOrder();
        $order_type = $this->getOrderType();

        $this->view->render($title, [
            "page" => $page,
            "count" => $model->getTasksCount(),
            "order" => $order,
            "order_type" => $order_type,
            "tasks" => $model->getTasks($page, 3, $order, $order_type)
        ]);
    }
}