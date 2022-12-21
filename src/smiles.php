<?php
session_start();
if ($_SESSION['loginin'] == 1) {
include('../online.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Смайлики для Чата</title>
</head>
<body>
    <img src="http://www.kolobok.us/smiles/standart/smile3.gif"> :) :-) =) =-) <br>
    <img src="http://www.kolobok.us/smiles/standart/sad.gif"> :( :-( =( =-(
</body>
</html>
<? }