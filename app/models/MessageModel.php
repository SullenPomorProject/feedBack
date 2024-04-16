<?php

namespace App\Models;

use App\Lib\Database;
use App\Core\Model;
use PDO;

class MessageModel extends Model
{
    public $table = 'messages';

    public function get()
    {
        $database = new Database();
        $pdo = $database->connection;
        $sql = "SELECT * FROM feedback ORDER BY idMessage DESC";
        $stmt = $pdo->prepare($sql);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function insert($array = [])
    {
        $database = new Database();
        $pdo = $database->connection;
        
        $sql = "INSERT INTO `feedback`(`fullName`, `email`, `textMessage`)
        VALUES(:fullName, :email, :message)";

        $stmt = $pdo->prepare($sql);
        $stmt->execute([
            'fullName' => $array['fullName'],
            'email' => $array['email'],
            'message' => $array['message']
        ]);
    }
}
