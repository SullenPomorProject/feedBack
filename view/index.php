<!DOCTYPE html>
<html lang="rn">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FeedBack</title>
    <link rel="stylesheet" href="/css/style.css">
</head>
<body>
    <form action="../controller/control.php" method="post">
        <input type="text" name="fullName" placeholder="ФИО">
        <input type="email" name="email" placeholder="email">
        <input type="text" name="messege" placeholder="Сообщение">
        <button name="sendMessege" type="submit">Отправить</button>
    </form>
    
    <div id="messegeContainer" style="height:200px; overflow-y: scroll;">
        <ul id="messegeList"></ul>
        <h1>text</h1>
    </div>
</body>

</html>
