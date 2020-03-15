<?php

namespace App\Core;

abstract class Controller
{
    protected $view;
    protected $model;
    protected $city;
    protected $company;
    protected $profession;
    protected $product;
    public $pageData = [];
    protected $auth = false;

    public function __construct()
    {
        $this->view = new View();
        $this->model = new Model();

        if(isset($_SESSION['auth']) == true)
        {
            $this->auth = true;
        }
    }

    public abstract function index();

}