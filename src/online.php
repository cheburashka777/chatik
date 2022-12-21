<?php
session_start();
if ($_SESSION['loginin'] == 1) {
include('dbconnect.php');

$id = $_SESSION['id'];
$q1 = mysqli_query($connectuser, "UPDATE `Users` SET `online` = '". time() ."' WHERE `Users`.`id` = '$id'");
$deleted = mysqli_query($connectuser, "SELECT * FROM `Users` WHERE `deleted` = 1 AND `id` = '$id'");
$deleted = mysqli_fetch_row($deleted);
if ($deleted != NULL) {
    session_destroy();
}
}