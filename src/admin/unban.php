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
    <title>Разбанить пользователя</title>
</head>
<body>
    <div class="menu">
        <span class="title">Разбанить пользователя</span>
        <a href="../admin.php" class="exit">Назад</a>
    </div>
    <div class="delete_dialog">
        <h2>Вы собираетесь разбанить пользователя <?= $user[1] ?>.</h1>
        <h3>Вы уверены?</h3>
        <form action="../vendor/undelete_user.php" method="post">
        <input type="hidden" name="id" value="<?= $user[0] ?>">
        <button type="submit">Разбанить!</button>
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