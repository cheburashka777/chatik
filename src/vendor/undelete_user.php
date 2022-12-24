<?php
session_start();
if ($_SESSION['loginin'] == 1 AND $_SESSION['admin'] == 1) {
include('../dbconnect.php');

$user_id = trim($_POST['id']);

mysqli_query($connectuser, "UPDATE `Users` SET `deleted` = '0', `ban_reason` = NULL WHERE `Users`.`id` = '$user_id'");

header("Location: ../admin.php");
}