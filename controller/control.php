<?php
require '../model/connection.php';

if($_POST['fullName'] && $_POST['email'] && $_POST['message']){
    
    $email = $_POST['email'];
    $fullName = $_POST['fullName'];
    $message = $_POST['message'];

    $sql = "INSERT INTO `feedBack`(`fullName`, `email`, `textMessege`)
        VALUES(:fullName, :email, :message)";
    $query =  $connect->prepare($sql);
    $query->execute(['fullName' => $fullName,'email' => $email,'message' => $message]);
    
}
   
header('Location: /view/');
?>