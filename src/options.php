<?php
session_start();
if ($_SESSION['loginin'] == 1) {
include('dbconnect.php');
include('online.php');

$id = $_SESSION['id'];
$theme = $_POST['theme'];

$update_theme = mysqli_query($connectuser, "UPDATE `Users` SET `style` = '$theme' WHERE `Users`.`id` = '$id'");

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
    <title>Настройки Чатика</title>
</head>
<body>
    <div class="menu">
        <div class="title">Настройки</div>
        <a href="/" class="options">Назад</a>
    </div>
    <div style="margin: 8px;">

    <? if ($_SESSION['error']) { ?>
    <div class="alert">
        <b><?=$_SESSION['error'];?></b>
    </div>
    <? } ?>

        <h3>Тема</h2>
        <form action="options.php" method="post">
            <select name="theme">
                <option value="style" <? if ($user[0][8] == 'style') echo 'selected' ?>>Адаптивная</option>
                <option value="light" <? if ($user[0][8] == 'light') echo 'selected' ?>>Светлая</option>
                <option value="black" <? if ($user[0][8] == 'black') echo 'selected' ?>>Тёмная</option>
            </select>
            <br>
            <br>
            <button type="submit">Применить</button>
        </form>

        <h3>Аватарина</h3>
        <table>
        <tr>
            <td width="220">
                <h4 style="margin-bottom: 5px;">Ваша текущая аватарина:</h4>
                <img src="<?php if ($user[0][4] != NULL) {echo '/avatars/'.$user[0][4];} else {echo '/avatars/default/default.png';} ?>" width="200">
            </td>
            <td>
                <form action="vendor/loadavatar.php" method="post" enctype="multipart/form-data" style="display: inline-block;">
                    <input type="file" name="avatar" size="20"> <br> <br>
                    <button type="submit" style="width: 80%;">Загрузить</button>
                </form>
            </td>
        </tr>
        </table>

        <h3>Админ-панель</h3>
        <a href="admin.php">Войти в <strong>админ-панель</strong></a>
    </div>
</body>
</html>
<?$_SESSION['error'] = null;}?>