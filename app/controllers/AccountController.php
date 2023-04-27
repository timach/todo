<?php 

namespace App\Controllers;

use App\Core\Controller;

class AccountController extends Controller
{
    public function indexAction()
    {

        if ($_SERVER['REQUEST_METHOD'] === 'POST')
        {
            $token = isset($_POST['token']) ? htmlspecialchars($_POST['token']) : false;

            if (!$token || $token !== $_SESSION['token'])
            {
                header($_SERVER['SERVER_PROTOCOL'] . ' 405 Method Not Allowed');
                exit;
            }

            $login = isset($_POST['login']) ? htmlspecialchars($_POST['login']) : '';
            $password = isset($_POST['password']) ? htmlspecialchars($_POST['password']) : '';
            
            $account = $this->loadModel("Account");
            if($account->auth($login, $password))
            {
                $_SESSION['message'] = 'Вы вошли как администратор';
                $_SESSION['isAdmin'] = true;
                header("Location: ?");
            }
            else
            {
                $_SESSION['message'] = 'Неправильный логин или пароль';
                header("Location: ?controller=account");
            }
            exit();
        }

        
        if($this->isAdmin)
        {
            $title = 'Профиль';
            $this->view->render($title, ["isAdmin" => true]);
        }
        else
        {
            //csrf
            $_SESSION['token'] = $csrf = md5(uniqid(mt_rand(), true));
            $title = 'Вход';
            $this->view->render($title, [
                "isAdmin" => false,
                "csrf" => $csrf
            ]);
        }
        
    }

    public function logoutAction()
    {
        unset($_SESSION['isAdmin']);
        header("Location: ?controller=account");
    }
}