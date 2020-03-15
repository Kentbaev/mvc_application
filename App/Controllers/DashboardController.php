<?php

namespace App\Controllers;

use App\Core\Controller;
use App\Models\ClientModel;
use App\Models\MenuModel;
use App\Models\CompanyModel;
use App\Models\ProfessionModel;


class DashboardController extends Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->model = new ClientModel();
        $this->menu = new MenuModel();
        $this->company = new CompanyModel();
        $this->profession = new ProfessionModel();
    }

    public function index()
    {
        if(!$this->auth)
        {
            header('Location: ' . HOST);
            die();
        }
        $menu = $this->menu->mainMenu();
        $clients = $this->model->clientsList();
        $companies = $this->company->selectAll();
        $professions = $this->profession->selectAll();
        
        $this->pageData = [
          'menu' => $menu,
          'active' => 'dashboard/index',
          'page_title' => 'Dashboard',
          'title' => 'Карточка клиента',
          'clients' => $clients,
          'companies' => $companies,
           'professions' => $professions
        ];

        echo $this->view->render('dashboard', $this->pageData);
        die();

    }
}


