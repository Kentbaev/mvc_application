<?php

namespace App\Controllers;

use App\Core\Controller;
use App\Models\ClientModel;
use App\Models\MenuModel;


class ClientController extends Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->model = new ClientModel();
        $this->menu = new MenuModel();
    }

    public function index()
    {
        if (!$this->auth){
            header('Location:' . HOST);
            die();
        }

        $client_id = trim($_GET[ 'client_id' ]);
        $menu = $this->menu->mainMenu();
        $clientcard = $this->model->clientCard($client_id);

        if ($clientcard){
            $this->pageData = [
                'menu' => $menu ,
                'active' => 'client/index',
                'page_title' => $clientcard[ 0 ][ 'client_full_name' ] ,
                'title' => 'Карточка клиента' ,
                'clients' => $clientcard
            ];

            $response = $this->view->render('card' ,$this->pageData);
            echo $response;
            die();
        } else{
            header('Location:' . HOST . 'dashboard/index');
            die();
        }
    }

    public function delete($client_id)
    {
        $client_id = trim(htmlspecialchars($_GET[ 'client_id' ])) ?? '';
        $response = $this->model->delete($client_id);

        if (!$response){
            header('Location:' . HOST . 'dashboard/index');
            die();
        } else{
            echo 'error';
            die();
        }
    }

    public function insert()
    {
        $client_full_name = trim(htmlspecialchars($_POST[ 'client_full_name_ins' ])) ?? '';
        $client_email = trim(htmlspecialchars($_POST[ 'client_email_ins' ])) ?? '';
        $client_phone_number = trim(htmlspecialchars($_POST[ 'client_phone_number_ins' ])) ?? '';
        $company_id = trim(htmlspecialchars($_POST[ 'company_id_ins' ])) ?? '';
        $profession_id = trim(htmlspecialchars($_POST[ 'profession_id_ins' ])) ?? '';

        $result = $this->model->insert($client_full_name ,$client_email ,$client_phone_number ,$company_id ,$profession_id);
        if (!$result){
            header('Location:' . HOST . 'dashboard/index');
            die();
        } else{
            echo 'error';
            die();
        }
    }

    public function update()
    {
        $client_id = trim(htmlspecialchars($_POST[ 'client_id' ])) ?? '';
        $client_full_name = trim(htmlspecialchars($_POST[ 'client_full_name' ])) ?? '';
        $client_email = trim(htmlspecialchars($_POST[ 'client_email' ])) ?? '';
        $client_phone_number = trim(htmlspecialchars($_POST[ 'client_phone_number' ])) ?? '';
        $company_id = trim(htmlspecialchars($_POST[ 'company_id' ])) ?? '';
        $profession_id = trim(htmlspecialchars($_POST[ 'profession_id' ])) ?? '';

        $result = $this->model->update($client_id ,$client_full_name ,$client_email ,$client_phone_number ,$company_id ,$profession_id);

        if (!$result){
            header('Location:' . HOST . 'dashboard/index');
            die();
        } else{
            echo 'error';
            die();
        }
    }

}
