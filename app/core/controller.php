<?php

namespace app\core;

use app\core\view;

class Controller
{
    public $view;
    
    function __construct()
    {
        $this->view = new View();
    }

    function action_index()
    {
        
    }
}