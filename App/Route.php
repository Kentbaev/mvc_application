<?php

namespace App;

use App\Controllers;
use App\Core\View;

final class Route
{
    public $routes = [];
    public $params = [];

    public function __construct()
    {
        $this->routes = require_once 'routes.php';
    }

    public function run($uri)
    {
        $uri = preg_replace("/[?].*/", '', $uri);
        $url = explode( '/' , $uri );
        $url = array_slice( $url , 2 , 2 );
        $url = implode( '/' , $url );

        $params = $this->getParams($uri);

        if(!array_key_exists($url, $this->routes))
        {
            echo $this->errorPage();
            die();
        }

        foreach($this->routes as $key=>$value)
        {
            if($url == $key)
            {
                $this->getController($value, $params);
                break;
            }
        }

    }


    private function getParams($uri)
    {
        $get_key = [];
        $get_value = [];

        if(strrpos($uri,'?'))
        {
            $uri = preg_replace("/.*[?]/", '', $uri); //получаем гет запрос

            if ($uri == '')
            {
                return $this->params;
            }

            $uri = preg_split("/[=&]/", $uri, -1);

            foreach ($uri as $key => $value)
            {
                if ($key % 2 == 0)
                {
                    $get_key[] = $value;
                } elseif ($key % 2 == 1)
                {
                    $get_value[] = $value;
                }
            }

            if (count($get_key) != count($get_value))
            {
                echo $this->errorPage();
                die();
            }

            $this->params = array_combine($get_key, $get_value);

            return $this->params;
        }
    }


    private function getController($url, $params)
    {
        $controller = 'App\Controllers\\' . $url['controller'];
        $method = $url['method'];
        $route = new $controller();
        return $route->$method($params);
    }

    public function errorPage()
    {
        return '<h1>Page Not Found 404</h1>';
        //header("HTTP/1.0 404 Not Found");
    }

}

