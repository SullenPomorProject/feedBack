<?php

namespace App\Models;

use App\Lib\Database;
use App\Core\Model;
use PDO;

class MessageModel extends Model
{
    public $tableName = 'messages';

    public function get()
    {
        $database = new Database();
        $pdo = $database->connection;
        $sql = "SELECT * FROM feedback ORDER BY idMessage DESC";
        $statement = $pdo->prepare($sql);
        $statement->execute();

        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }

    public function insert($data = [])
    {
        $database = new Database();
        $pdo = $database->connection;
        
        $sql = "INSERT INTO `feedback`(`fullName`, `email`, `textMessage`)
        VALUES(:fullName, :email, :message)";

        $stmt = $pdo->prepare($sql);
        $stmt->execute([
            'fullName' => $data['fullName'],
            'email' => $data['email'],
            'message' => $data['message']
        ]);
    }
}
