<?php
session_start();
include('dbconnect.php');

if (strlen($_POST['password']) < 5) {
    $_SESSION['error'] = 'Пароль слишком короткий.';
} elseif ($_POST['password'] > 32) {
    $_SESSION['erroreg'] = 'Пароль слишком длинный';
}

if (preg_match('/[^a-zA-Z]+/', trim($_POST['password']))) {
    $_SESSION['error'] = 'Пароль содержит недопустимые символы';
}

if (!empty($_SESSION['error'])) {
    $error = $_SESSION['error'];
    unset($_SESSION['error']);
}

$password = md5(trim($_POST['password']));

$user = mysqli_query($connectuser, "SELECT * FROM `Users` WHERE `password` = '$password'");
$user = mysqli_fetch_row($user);

if ($user[6] != NULL) {
    $_SESSION['error'] = 'Вы были забанены.';
}

if ($user[7] != NULL) {
    $_SESSION['error'] = 'Вы были забанены. <br> Причина: '.$user[7];
}

if ($user != NULL) {
    $_SESSION['loginin'] = 1;

    $_SESSION['id'] = $user[0];
    $_SESSION['login'] = $user[1];
    $_SESSION['password'] = $user[2];
    $_SESSION['admin'] = $user[5];
    if ($user[4] == NULL) {
        $_SESSION['avatar'] = NULL;
    }
    $_SESSION['deleted'] = $user[6];

    header("Location: /");
} else {
    $_SESSION['error'] = 'Пароль неверный. Введите правильный пароль и повторите попытку.';
}

$userscount = mysqli_query($connectuser, "SELECT COUNT(*) FROM `Users`");
$userscount = mysqli_fetch_row($userscount);
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <link rel="stylesheet" href="css/style.css">
    <title>Вход в Чатик</title>
</head>
<body>
    <div class="login">
    <?= $error ?>
    <h1>Вход</h1>
    <form action="login.php" method="post">
        <input type="password" name="password" placeholder="Пароль"> <br>
        <button type="submit">Вход</button>
    </form>
    <p>Не зарегистрированы? Тогда пожалуйте пройти <a href="register.php">регистрацию</a>.</p>
    <p>Сейчас зарегистрированно: <b><?= $userscount[0] ?></b> пользователей.</p>
    </div>
</body>
</html>