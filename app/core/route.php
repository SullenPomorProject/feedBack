<?php

namespace App\Core;

class Route
{
    public static function initialize()
    {
        $currentController = 'Main';
        $currentAction = 'index';

        $uriSegments = explode('/', $_SERVER['REQUEST_URI']);
        
        if (!empty($uriSegments[1])) {
            $currentController = $uriSegments[1];
        }

        if (!empty($uriSegments[2])) {
            $currentAction = $uriSegments[2];
        }

        $modelClassName = $currentController . 'Model';
        $controllerClassName = 'Controller' . $currentController;
        $actionMethodName = 'action' . $currentAction;

        $modelFileName = strtolower($modelClassName) . '.php';
        $modelFilePath = 'app/models/' . $modelFileName;

        if (file_exists($modelFilePath)) {
            include $modelFilePath;
        }

        $controllerFileName = strtolower($controllerClassName) . '.php';
        $controllerFilePath = 'app/controllers/' . $controllerFileName;
        
        if (!file_exists($controllerFilePath)) {
            echo "Controller not found";
            return;
        }
        include $controllerFilePath;

        $controllerInstance = new $controllerClassName();
        $actionMethod = $actionMethodName;

        if (!method_exists($controllerInstance, $actionMethod)) {
            echo "Action not found";
            return;
        }
        $controllerInstance->$actionMethod();
    }
}