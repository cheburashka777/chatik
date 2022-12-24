<?php
session_start();
if ($_SESSION['loginin'] == 1) {
include('../dbconnect.php');
include('../online.php');

$id = $_SESSION['id'];
$message_id = $_GET['id'];

$messages = mysqli_query($connect_msg, "SELECT * FROM `messages` WHERE `id` = '$message_id' AND `senderID` = '$id'");
$messages = mysqli_fetch_row($messages);

if ($messages != NULL) {
    mysqli_query($connect_msg, "DELETE FROM messages WHERE `messages`.`id` = '$message_id'");
    header("Location: /?sel={$_GET['sel']}");
} else {
    echo 'Чужие СМСки любим удалять, да?';
}
}