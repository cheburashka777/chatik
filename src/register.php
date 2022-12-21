<?php
session_start();
if (!empty($_SESSION['erroreg'])) {
    $error = $_SESSION['erroreg'];
    unset($_SESSION['erroreg']);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>Регистрация</title>
</head>
<body>
    <div class="register">
    <p>
    <?php
    echo $error;
    ?>
    </p>
    <h1>Регистрация</h1>
    <form action="register2.php" method="post">
        <input type="text" placeholder="Логин" name="login"> <br> <br>
        <input type="password" placeholder="Пароль" name="password"> <br>
        <button type="submit">Зарегистрироваться</button>
    </form>
    <p>Уже есть аккаунт? Тогда пожалуйте <a href="login.php">войти</a>.</p>
    </div>
</body>
</html>