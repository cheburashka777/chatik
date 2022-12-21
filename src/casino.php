<?php session_start();
$user = mysqli_query($connectuser, "SELECT * FROM `Users` WHERE `id` = '$id'");
$user = mysqli_fetch_all($user);
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <? if ($user[0][8] != 'style') { ?>
    <link rel="stylesheet" href="css/<? echo $user[0][8];?>.css">
    <? } ?>
    <title>КАЗИНО МИР ФАРТА!!!</title>
</head>
<body>
    <div class="menu"><div class="title">КАЗИНО <span style="color: red;">МИР ФАРТА</span>!!!</div><a href="/" class="exit">Назад</a></div>
    <div style="margin: 8px;">
    <h1>Товарищ, вращайте барабан!</h1>
    <h2><?php if (isset($_SESSION['all_points'])) echo "У вас всего: ".$_SESSION['all_points']." очков!";?></h2>
    <?php if (isset($_SESSION['points'])) echo "Вы выйграли: ".$_SESSION['points']." очков!";?>
    <br>
    <br>
    <form action="/vendor/casino.php">
    <button type="submit">Испытать удачу!</button>
    </form>
    </div>
</body>
</html>