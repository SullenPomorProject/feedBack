<?php

namespace App\Core;

class Route
{
    public static function start()
    {
        $controllerName = 'Main';
        $actionName = 'index';

        $routes = explode('/', $_SERVER['REQUEST_URI']);
        
        if (!empty($routes[1])) {
            $controllerName = $routes[1];
        }

        if (!empty($routes[2])) {
            $actionName = $routes[2];
        }

        $modelName = $controllerName . 'Model';
        $controllerName = 'Controller' . $controllerName;
        $actionName = 'action' . $actionName;

        $modelFile = strtolower($modelName) . '.php';
        $modelPath = 'app/models/' . $modelFile;

        if (file_exists($modelPath)) {
            include $modelPath;
        }

        $controllerFile = strtolower($controllerName) . '.php';
        $controllerPath = 'app/controllers/' . $controllerFile;
        
        if (!file_exists($controllerPath)) {
            echo "No Controller";
            return;
        }
        include $controllerPath;

        $controller = new $controllerName();
        $action = $actionName;

        if (!method_exists($controller, $action)) {
            echo "No action";
            return;
        }
        $controller->$action();
    }
}
