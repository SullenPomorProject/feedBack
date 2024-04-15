<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FeedBack</title>
    <link rel="stylesheet" href="/css/styles.css">
</head>
<body>
    <form id='inputForm' method="post">
        <input type="text" id="fullName" name="fullName" placeholder="ФИО">
        <input type="email" id="email" name="email" placeholder="email">
        <input type="text" id="message" name="message" placeholder="Сообщение">
        <button name="sendMessege" type="submit">Отправить</button>
    </form>
    <h1>Сообщения</h1>
    <hr>
    <table id="messages">
        <tr>
            <th>ФИО</th>
            <th>Почта</th>
            <th>Сообщение</th>
        </tr>
        <?php foreach($data as $value): ?>
            <tr>
                <td><?php echo $value['fullName'] ?></td>
                <td><?php echo $value['email'] ?></td>
                <td><?php echo $value['textMessage'] ?></td>
            </tr>
        <?php endforeach; ?>
    </table>
</body>
<script src="/js/message.js"></script>
</html>