<?php
session_start();
if ($_SESSION['loginin'] == 1 AND $_SESSION['admin'] == 1) {
include('../dbconnect.php');
$id = $_GET['id'];
$user = mysqli_query($connectuser, "SELECT * FROM `Users` WHERE `id` = '$id'");
$user = mysqli_fetch_row($user);

?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css">
    <title>Забанить пользователя</title>
</head>
<body>
    <div class="menu">
        <span class="title">Забанить пользователя</span>
        <a href="../admin.php" class="exit">Назад</a>
    </div>
    <div class="delete_dialog">
        <h2>Вы собираетесь забанить пользователя <?= $user[1] ?>.</h1>
        <h3>Вы уверены?</h3>
        <form action="../vendor/delete_user.php" method="post">
            <input type="hidden" name="id" value="<?= $user[0] ?>">
            <textarea name="reason" cols="30" rows="10" placeholder="Опишите причину бана"></textarea> <br> <br>
            <button type="submit">Забанить!</button>
            <button onclick="back()">Отмена</button>
        </form>
    </div>
    <script>
        function back() {
            window.location.href = "../admin.php";
        }
    </script>
</body>
</html>
<? } ?>