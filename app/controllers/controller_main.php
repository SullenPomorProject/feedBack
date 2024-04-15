<?php

use app\core\controller;
use app\models\Main_model;

class Controller_main extends Controller
{
    public function action_index()
    {
        $messages = new Main_model;
        $data = $messages->get();
        $this->view->generate('index.php', $data);
    }
}