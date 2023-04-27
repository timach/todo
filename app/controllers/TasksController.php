<?php 

namespace App\Controllers;

use App\Core\Controller;

class TasksController extends Controller
{
    public function createAction()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST')
        {
            $token = isset($_POST['token']) ? htmlspecialchars($_POST['token']) : false;

            if (!$token || $token !== $_SESSION['token'])
            {
                header($_SERVER['SERVER_PROTOCOL'] . ' 405 Method Not Allowed');
                exit;
            }
            else
            {
                $userName = isset($_POST['user_name']) ? htmlspecialchars($_POST['user_name']) : '';
                $email = isset($_POST['email']) ? filter_var($_POST['email'], FILTER_VALIDATE_EMAIL) : '';
                $taskText = isset($_POST['task_test']) ? htmlspecialchars($_POST['task_test']) : '';
                
                if(!$userName || !$email || !$taskText)
                {
                    header($_SERVER['SERVER_PROTOCOL'] . ' 400 Bad Request');
                    exit;
                }

                $model = $this->loadModel("Tasks");

                $result = $model->putTask($userName, $email, $taskText);
                l($result);
                die('ok');
            }
            //
        }
        else
        {
            $title = 'Создать задачу';
        
            //csrf
            $_SESSION['token'] = md5(uniqid(mt_rand(), true));

            $this->view->render($title, []);
        }
    }

    public function editAction()
    {
        $id = isset($_GET['id']) ? $_GET['id'] : 0;
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