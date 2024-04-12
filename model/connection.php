<?php
$hostdb = 'mysql:host=localhost;dbname=testTaskDB';
$login = 'root';
$password = '';

$connect = new PDO($hostdb, $login, $password);
$connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


if(!$connect){
    die('Error connect to DataBase');
}

?>