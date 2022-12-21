<?php
session_start();
if ($_SESSION['loginin'] == 1 AND $_SESSION['admin'] == 1) {
include('dbconnect.php');
$users = mysqli_query($connectuser, "SELECT * FROM `Users`");
$users = mysqli_fetch_all($users);

$user = mysqli_query($connectuser, "SELECT * FROM `Users` WHERE `id` = '$id'");
$user = mysqli_fetch_all($user);

$id = $_SESSION['id'];
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <? if ($user[0][8] != 'style') { ?>
    <link rel="stylesheet" href="css/<? echo $user[0][8];?>.css">
    <? } ?>
    <title>Админ-панель Чатика</title>
</head>
<body>
<div class="userlist">
    <div class="menu" onclick="menutoggle()">
    <span class="title">Управление пользователями</span>
            <a href="index.php" class="options">Назад</a>
            <!-- <a class="options" href="/options">Настройки</a> -->
    </div>
    <div class="dialogs">
        <?php
        foreach ($users as $user) { ?>
        <div class="user">
            <?php echo $user[1]; if ($user[6] == 0) { ?><a class="options" href="/admin/ban.php?id=<?= $user[0] ?>">Забанить</a></div><?php } else { ?> <a class="options" href="/admin/unban.php?id=<?= $user[0] ?>">Разбанить</a>
        </div> <?php }
        }
        ?>
    </div>
</div>
</body>
</html>
<? } ?>