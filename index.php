<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FeedBack</title>
    <link rel="stylesheet" href="/css/style.css">
</head>
<body>
    <form id='inputForm' action="../controller/control.php" method="post">
        <input type="text" id="fullName" name="fullName" placeholder="ФИО">
        <input type="email" id="email" name="email" placeholder="email">
        <input type="text" id="message" name="message" placeholder="Сообщение">
        <button name="sendMessege" type="submit">Отправить</button>
    </form>
    
    <?php
        require_once '../feedback2/model/connection.php';
        echo '<table>';
        $query = $connect->query('SELECT * FROM `feedBack` ORDER BY `idMessage` DESC');
        while($row = $query->fetch(PDO::FETCH_ASSOC)){
            echo "
            <tr>
                <td>".$row['fullName']."</td>
                <td>".$row['email']."</td>
                <td>".$row['textMessage']."</td>
            </tr>";
        }
        echo '</table>';

    ?>
</body>

</html>
