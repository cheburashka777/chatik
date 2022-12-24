<?php
session_start();
if ($_SESSION['loginin'] == 1) {
include('online.php');

$user = mysqli_query($connectuser, "SELECT * FROM `Users` WHERE `id` = '$id'");
$user = mysqli_fetch_all($user);
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
    <title>Смайлики для Чата</title>
    <style>
        div img {
            vertical-align: middle;
        }
    </style>
</head>
<body>
    <div class="menu">
        <div class="title">Смайлики</div>
        <a href="/" class="options">Назад</a>
    </div>
    <div style="padding: 8px;">
    <img src="http://www.kolobok.us/smiles/standart/smile3.gif"> :) :-) =) =-) <br>
    <img src="http://www.kolobok.us/smiles/standart/sad.gif"> :( :-( =( =-(
    </div>
</body>
</html>
<? }