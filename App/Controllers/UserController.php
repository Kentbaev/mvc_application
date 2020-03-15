<?php

namespace App\Controllers;

use App\Core\Controller;
use App\Models\UserModel;

class UserController extends Controller
{
    private $response;

    public function __construct()
    {
        parent::__construct();
        $this->model = new UserModel();
    }

    public function index()
     {
         if(!$this->auth)
         {
             $this->pageData = [
                 'page_title' => 'Вход' ,
                 'title' => 'Administrator'
             ];

             echo $this->view->render('auth' , $this->pageData);
             die();
         }
         else
         {
             header('Location:' .HOST. 'dashboard/index');
             die();
         }
     }

     public function auth($response = false)
     {
         if($this->auth)
         {
             header('Location:' .HOST. 'dashboard/index');
             die();
         }

         if(!empty(isset($_POST['user'])) && !empty(isset($_POST['password'])))
         {
             $user_login = trim($_POST[ 'user' ]);
             $user_password = trim($_POST[ 'password' ]);
             //$user = hash('sha256', $user);
             //$password = hash('sha256', $password);
             $this->response = $this->model->userAuth($user_login , $user_password);
         }
             if($this->response)
             {
                 $_SESSION['auth'] = true;
                 setcookie('errors', '', time() - 1);
                 header('Location:' .HOST. 'dashboard/index');
                 die();
             }
             else
             {
                 $this->pageData = [
                     'page_title' => 'Вход',
                     'title' => 'Administrator'
                 ];
                 setcookie('errors', 'Не корректные данные', time() + 3600);
                 echo $this->view->render('auth', $this->pageData);
                 die();
             }

     }

     public function logout()
     {
         session_destroy();
         header('Location:' . HOST);
         die();
     }

}




