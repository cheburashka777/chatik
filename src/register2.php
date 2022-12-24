<?php
session_start();
include('dbconnect.php');

$loginl = strlen($_POST['login']);
$passwordl = strlen($_POST['password']);

if ($_POST['login'] == NULL OR $_POST['password'] == NULL) {
    $_SESSION['erroreg'] = 'Не все поля введены';
    header("Location: /register.php");
    exit();
} elseif ($loginl > 32 OR $passwordl > 32) {
    $_SESSION['erroreg'] = 'Логин или пароль слишком длинные';
    header("Location: /register.php");
    exit();
} elseif (strlen($_POST['password']) < 5) {
    $_SESSION['error'] = 'Пароль слишком короткий.';
}

$login = $_POST['login'];
$password = $_POST['password'];

if (preg_match('/[^a-zA-Z]+/', $login) OR preg_match('/[^a-zA-Z]+/', $password)) {
    $_SESSION['erroreg'] = 'Логин или пароль содержит недопустимые символы';
    header("Location: /register.php");
    exit();
}
// $password = str_replace(array(' ', '/', '\\', '\n', ';', ':', '"', '\'', ',', '<', '>', '$', '№', '%', '^', '&', '*', '(', ')', '=', '+', '[', ']', '{', '}', '|', '`', '~'), '', $password);
// $login = str_replace(array(' ', '/', '\\', '\n', ';', ':', '"', '\'', ',', '<', '>', '$', '№', '%', '^', '&', '*', '(', ')', '=', '+', '[', ']', '{', '}', '|', '`', '~'), '', $login);
$password = md5($password);

$check  = mysqli_query($connectuser, "SELECT * FROM `Users` WHERE `login` = '$login' OR `password` = '$password'");
$check  = mysqli_fetch_row($check);

if ($check == NULL) {

$q = mysqli_query($connectuser, "INSERT INTO `Users` (`id`, `login`, `password`, `online`, `avatar`) VALUES (NULL, '$login', '$password', NULL, NULL)");

$user = mysqli_query($connectuser, "SELECT * FROM `Users` WHERE `password` = '$password'");
$user = mysqli_fetch_row($user);

$_SESSION['loginin'] = 1;

$_SESSION['id'] = $user[0];
$_SESSION['login'] = $user[1];
$_SESSION['password'] = $user[2];

header("Location: /");
} else {
    $_SESSION['error'] = 'Этот логин или пароль уже заняты, попробуйте изменить данные.';
    header("Location: /register.php");
}