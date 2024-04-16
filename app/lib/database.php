<?php

namespace App\Lib;

use PDO;
use PDOException;

class Database
{
    private $host = 'localhost';
    private $login = 'root';
    private $password = '';
    private $dbname = 'testTaskDB';

    public function __construct()
    {
        try {
            $dsn = "mysql:host={$this->host};dbname={$this->dbname}";
            $this->connection = new PDO($dsn, $this->login, $this->password);
            $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }
    }
}
