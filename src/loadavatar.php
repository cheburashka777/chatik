<? include('online.php'); 
$user = mysqli_query($connectuser, "SELECT * FROM `Users` WHERE `id` = '$id'");
$user = mysqli_fetch_all($user);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <? if ($user[0][8] != 'style') { ?>
    <link rel="stylesheet" href="css/<? echo $user[0][8];?>.css">
    <? } ?>
    <title>Загрузка Аватарины</title>
</head>
<body>
<div class="menu">
    <div class="title">Загрузка Аватарины</div>
    <a href="/" class="options">Назад</a>
</div>
<div style="padding: 8px;">
    <center>

    <table>
        <tr>
            <td width="220">
                <h4>Ваша текущая аватарина:</h4>
                <img src="<?php if ($online[4] != NULL) {echo '/avatars/'.$online[4];} else {echo '/avatars/default/default.png';} ?>" width="200">
            </td>
            <td>
                <form action="vendor/loadavatar.php" method="post" enctype="multipart/form-data" style="display: inline-block;">
                    <input type="file" name="avatar" size="20"> <br> <br>
                    <button type="submit" style="width: 80%;">Загрузить</button>
                </form>
            </td>
        </tr>
    </table>

    
    
    </center>
</div>
</body>
</html>