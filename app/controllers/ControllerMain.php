<?php

use App\Core\Controller;
use App\Models\MessageModel;

class ControllerMain extends Controller
{
    public function actionIndex()
    {
        $messages = new MessageModel();
        $data = $messages->get();
        $this->view->generate('index', $data);
    }

    public function actionIndexInsert()
    {
        if (!isset($_POST['fullName']) || !isset($_POST['email']) || !isset($_POST['message'])) {
            return;
        }

        $email = $_POST['email'];
        $fullName = $_POST['fullName'];
        $message = $_POST['message'];
        $patternEmail = '/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/';

        if (!preg_match($patternEmail, $email) || $fullName == null || $message == null) {
            return;
        }
        $array = [
            'fullName' => $fullName,
            'email' => $email,
            'message' => $message
        ];

        $messages = new MessageModel();
        $messages->insert($array);

        echo json_encode($array);
    }
}
