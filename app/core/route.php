<?php

namespace app\core;

class Route
{
    public static function start()
    {
        $controller_name = 'main';
        $action_name = 'index';

        $routes = explode('/', $_SERVER['REQUEST_URI']);
        
        if(!empty($routes[1]))
        {
            $controller_name = $routes[1];
        }

        if(!empty($routes[2]))
        {
            $action_name = $routes[2];
        }

        $model_name = $controller_name.'_model';
        $controller_name = 'controller_'.$controller_name;
        $action_name = 'action_'.$action_name;

        // echo "Model: $model_name <br>";
		// echo "Controller: $controller_name <br>";
		// echo "Action: $action_name <br>";

        $model_file = strtolower($model_name).'.php';
        $model_path = 'app/models/'. $model_file;

        if(file_exists($model_path))
        {
            include $model_path;
        }

        $controller_file = strtolower($controller_name).'.php';
        $controller_path = 'app/controllers/'. $controller_file;
        
        if(!file_exists($controller_path))
        {
            echo "контроллера нет";
            return;
        }
        include $controller_path;

        $controller = new $controller_name();
        $action = $action_name;

        if(!method_exists($controller, $action))
        {
            echo "нет действия";
            return;
        }
        $controller->$action();
    }
}