<?php
    $messege = $_POST['messege'];
    $email = $_POST['email'];
    $fullName = $_POST['fullName'];

    //if($messege == ''){
    //echo 'vvedite messege'
    //exit();}

    $dsn = 'mysql:host=localhost;dbname=testTaskDB';
    $pdo = new PDO($dsn, 'root', '');

    $sql = 'INSERT INTO feedBack(fullName, email, textMessege) VALUES(:fullName, :email, :messege)';
    $query =  $pdo->prepare($sql);
    $query->execute(['fullName' => $fullName],['email' => $email],['textMessege' => $messege]);
    header('Location: /view/');
?>