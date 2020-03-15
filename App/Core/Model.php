<?php

namespace App\Core;

use App\Models\MenuModel;

class Model
{
    public $db;
    public $menu;
    protected $query;

    public function __construct()
    {
        $this->db = new \PDO('mysql:host=' . DBHOST .';dbname=' . DBNAME . ';charset=' . CHARSET .';' , DBUSERNAME , DBPASSWORD);
    }
    
}