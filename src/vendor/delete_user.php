<?php
session_start();
if ($_SESSION['loginin'] == 1 AND $_SESSION['admin'] == 1) {
include('../dbconnect.php');

$user_id = trim($_POST['id']);
$reason  = trim($_POST['reason']);

$user = mysqli_query($connectuser, "SELECT * FROM `Users` WHERE `id` = '$user_id'");
$user = mysqli_fetch_row($user);

if ($reason != NULL) {
    mysqli_query($connectuser, "UPDATE `Users` SET `deleted` = '1', `ban_reason` = '$reason' WHERE `Users`.`id` = '$user_id'");
} elseif ($reason == NULL) {
    mysqli_query($connectuser, "UPDATE `Users` SET `deleted` = '1' WHERE `Users`.`id` = '$user_id'");
}

header("Location: ../admin.php");
}