<?php

use App\Core\Controller;
use App\Models\MessageModel;

class ControllerMain extends Controller
{
    public function actionIndex()
    {
        $messageModel = new MessageModel();
        $data = $messageModel->get();
        $this->view->generate('index', $data);
    }

    public function actionIndexInsert()
    {
        if (!isset($_POST['fullName']) || !isset($_POST['email']) ||
        !isset($_POST['message'])) {
            return;
        }

        $email = $_POST['email'];
        $fullName = $_POST['fullName'];
        $messageContent = $_POST['message'];
        $emailPattern = '/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/';

        if (!preg_match($emailPattern, $email) || empty($fullName) ||
        empty($messageContent)) {
            return;
        }

        $messageDetails  = [
            'fullName' => $fullName,
            'email' => $email,
            'message' => $messageContent,
        ];

        $messageModel = new MessageModel();
        $messageModel->insert($messageDetails);

        echo json_encode($messageDetails);
    }
}
