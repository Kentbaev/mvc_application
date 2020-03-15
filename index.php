<?php

//ini_set('display_errors', 0);

require_once __DIR__ . '/config.php';

require_once __DIR__ . '/vendor/autoload.php';

use App\Route;

session_start();

$route = new Route();
$uri = $_SERVER['REQUEST_URI'];

$route->run($uri);
