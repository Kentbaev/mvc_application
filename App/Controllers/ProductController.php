<?php

namespace App\Controllers;

use App\Core\Controller;
use App\Models\MenuModel;
use App\Models\ProductModel;


class ProductController extends Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->menu = new MenuModel();
        $this->product = new ProductModel();
    }

    public function index()
    {
        $menu = $this->menu->mainMenu();
        $count = $this->product->productCount();

        $this->pageData = [
            'menu' => $menu,
            'active' => 'product/index',
            'page_title' => 'Product',
            'title' => 'Продукты',
            'count' => $count
        ];

        echo $this->view->render('product', $this->pageData);
        die();
    }

    public function select()
    {
        $currentPage = $_POST['currentPage'];
        $from = $_POST['from'];
        $products = $this->product->select($from);
        echo json_encode($products);
        die();
    }

}


