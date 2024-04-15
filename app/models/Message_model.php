<?php

namespace app\models;
use app\lib\database;
use app\core\model;
use PDO;

class Message_model extends Model
{
    public $table = 'massages';

    public function get()
    {
        $database = new DataBase;
        $pdo = $database->connection;
        $sql = "SELECT * FROM feedBack ORDER BY idMessage DESC";
        $stmt = $pdo->prepare($sql);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function insert($array = [])
    {
        $database = new DataBase;
        $pdo = $database->connection;
        
        $sql = "INSERT INTO `feedBack`(`fullName`, `email`, `textMessage`)
        VALUES(:fullName, :email, :message)";

        $stmt = $pdo->prepare($sql);
        $stmt->execute(array('fullName' => $array['fullName'],'email' => $array['email'],'message' => $array['message']));
    }
}