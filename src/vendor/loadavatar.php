<?php
session_start();
if ($_SESSION['id']) {
include('../dbconnect.php');
include('../online.php');

if ($_FILES['avatar']['size'] > 20*1024*1024) {
    exit('Картинка слишком большая. Попробуйте загрузить файл меньшего размера.');
} elseif ($_FILES['avatar']['type'] == 'image/gif' OR $_FILES['avatar']['type'] == 'image/jpeg' OR $_FILES['avatar']['type'] == 'image/png' OR $_FILES['avatar']['type'] == 'image/webp') {

$avatarname = $_FILES['avatar']['name'];
$id = $_SESSION['id'];
$avatardirectory = time().$avatarname;

move_uploaded_file($_FILES['avatar']['tmp_name'], '../avatars/' . $avatardirectory);

$avatar = mysqli_query($connectuser, "UPDATE `Users` SET `avatar` = '$avatardirectory' WHERE `Users`.`id` = '$id'");

header("Location: /options.php");
} else {
    $_SESSION['error'] = 'Неподдерживаемый тип файла. Попробуйте загрузить картинку.';
    header("Location: /options.php");
    exit('Неподдерживаемый тип файла. Попробуйте загрузить картинку.');
}
}