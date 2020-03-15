<?php

namespace App\Controllers;

use App\Core\Controller;
use App\Models\MenuModel;
use App\Models\CompanyModel;
use App\Models\CityModel;



class CompanyController extends Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->company = new CompanyModel();
        $this->menu = new MenuModel();
        $this->city = new CityModel();
    }

    public function index()
    {
        $menu = $this->menu->mainMenu();
        $companies = $this->company->selectAll();
        $cities = $this->city->selectAll();

        $this->pageData = [
            'menu' => $menu,
            'active' => 'company/index',
            'page_title' => 'Company',
            'title' => 'Компании',
            'companies' => $companies,
            'cities' => $cities
        ];

        echo $this->view->render('company', $this->pageData);
        die();

    }

    public function insert()
    {
        $company_name = trim(htmlspecialchars($_POST[ 'company_name_ins' ])) ?? '';
        $company_address = trim(htmlspecialchars($_POST[ 'company_address_ins' ])) ?? '';
        $city_id = trim(htmlspecialchars($_POST[ 'city_id_ins' ])) ?? '';

        $result = $this->company->insert($company_name, $company_address, $city_id);

        if (!$result){
            header('Location:' . HOST . 'company/index');
            die();
        } else{
            echo 'error';
            die();
        }
    }

    public function delete($company_id)
    {
        $company_id = trim($_GET[ 'company_id' ]) ?? '';
        $response = $this->company->delete($company_id);

        if (!$response){
            header('Location:' . HOST . 'company/index');
            die();
        } else{
            echo 'error';
            die();
        }
    }

    public function update()
    {
        $company_id = trim(htmlspecialchars($_POST['company_id'])) ?? '';
        $company_name = trim(htmlspecialchars($_POST[ 'company_name' ])) ?? '';
        $company_address = trim(htmlspecialchars($_POST[ 'company_address' ])) ?? '';
        $city_id = trim(htmlspecialchars($_POST[ 'city_id' ])) ?? '';

        $result = $this->company->update($company_id, $company_name, $company_address, $city_id);

        if (!$result){
            header('Location:' . HOST . 'company/index');
            die();
        } else{
            echo 'error';
            die();
        }
    }

}


