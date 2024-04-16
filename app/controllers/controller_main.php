<?php

use app\core\controller;
use app\models\MessageModel;

class Controller_main extends Controller
{
    public function action_index()
    {
        $messages = new MessageModel;
        $data = $messages->get();
        $this->view->generate('index', $data);
    }

    public function action_index_insert()
    {
        if(!isset($_POST['fullName']) || !isset($_POST['email']) ||!isset($_POST['message'])){
            return;
        }

        $email = $_POST['email'];
        $fullName = $_POST['fullName'];
        $message = $_POST['message'];
        $pattern_email = '/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/';

        if(!preg_match($pattern_email, $email) || $fullName == null || $message == null){
            return;
        }
        $array = [
            'fullName' => $fullName,
            'email' => $email,
            'message' => $message
        ];

        $messages = new Message_model;
        $messages->insert($array);

        echo json_encode($array);
    }
}