<?php

ini_set('display_errors', 1);

spl_autoload_register(function($class)
    {
        $path = str_replace('\\', '/', $class. '.php');
        if(file_exists($path))
        {
            require $path;
        }
    }
);

use App\Core\Model;
use App\Core\Controller;
use App\Core\View;
use App\Core\Route;

$route = new Route();

$route->initialize();