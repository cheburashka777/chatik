<?php
session_start();
include('../online.php');
$_SESSION['points'] = rand(10, 500);
$_SESSION['all_points'] += $_SESSION['points'];
header("Location: ../casino.php");
?>