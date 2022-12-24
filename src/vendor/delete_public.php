<?php
session_start();
if ($_SESSION['loginin'] == 1) {
include('../dbconnect.php');
include('../online.php');

$id = $_SESSION['id'];
$message_id = $_GET['id'];
$messages = mysqli_query($connect_pubmsg, "SELECT * FROM `public_messages` WHERE `id` = '$message_id' AND `senderID` = '$id'");
$messages = mysqli_fetch_row($messages);

if ($messages != NULL) {

$message_pub_del = $_GET['id'];

mysqli_query($connect_pubmsg, "DELETE FROM public_messages WHERE `public_messages`.`id` = '$message_pub_del'");
header("Location: /");

} else {
    echo 'Чужие СМСки любим удалять, да?';
}
}