<?php
session_start();
if ($_SESSION['loginin'] == 1 AND $_SESSION['deleted'] == 0) {
unset($error);
include('dbconnect.php');
include('online.php');
include('time.php');

$kto = $_GET['sel'];
$id = $_SESSION['id'];

$pubmessages = mysqli_query($connect_pubmsg, "SELECT * FROM `public_messages`");
$pubmessages = mysqli_fetch_all($pubmessages);

$messages = mysqli_query($connect_msg, "SELECT * FROM `messages` WHERE `komu` = '$id' OR `senderID` = '$id'");
$messages = mysqli_fetch_all($messages);

$user = mysqli_query($connectuser, "SELECT * FROM `Users` WHERE `id` = '$id'");
$user = mysqli_fetch_all($user);

?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://code.jquery.com/jquery-3.6.1.js"></script>
    <script src="search.js"></script>
    <link rel="stylesheet" href="css/style.css">
    <? if ($user[0][8] != 'style') { ?>
    <link rel="stylesheet" href="css/<? echo $user[0][8];?>.css">
    <? } ?>
    <title>Чат</title>
</head>
<body>
<?php include('menu.php'); ?>
    <div class="chat">
        <?php include('header.php'); ?>
        <div class="messages">
            <?php
            if (!isset($_GET['sel']) OR $_GET['sel'] == null) {
               ?><div class="alert_chat"><h3 class="h3alert" style="text-align: center; margin: 0;">Внимание!!</h3>Общий чат не работает по причине неправильной кодировки. <br> Что с этим делать — не знаю((( <img src="http://www.kolobok.us/smiles/standart/sad.gif"></div><?php
            foreach ($pubmessages as $pubmessage) {
            ?>
                <div>
                <span class="autor"><?= $pubmessage[1] ?>: </span><?= $pubmessage[2] ?> <span class="time"><?php echo vremya($pubmessage[3]); ?></span> <?php if ($pubmessage[4] == $_SESSION['id']) {echo '<a class="delete" href="vendor/delete_public.php?id='. $pubmessage[0] .'">Удалить</a>';} ?>
                </div>
            <?php
            }
            } elseif ($_GET['sel'] != $_SESSION['id']) {
            foreach ($messages as $message) {
                    if ($message[1] == $kto OR $message[4] == $kto) {
            ?>
                <div>
                <span class="autor"><?= $message[2] ?>: </span><?= $message[3] ?> <span class="time"><?php echo vremya($message[5]); ?></span> <?php if ($message[1] == $_SESSION['id']) {echo '<a class="delete" href="vendor/delete_msg.php?id='. $message[0] .'&sel='. $kto .'">Удалить</a>';} ?>
                </div>
            <?php
                    }
            }
            } else {
                foreach ($messages as $message) {
                    if ($message[6] == 1) {
                ?>
                <div>
                <?= $message[3] ?> <span class="time"><?php echo vremya($message[5]); ?></span> <?php if ($message[1] == $_SESSION['id']) {echo '<a class="delete" href="vendor/delete_msg.php?id='. $message[0] .'&sel='. $kto .'">Удалить</a>';} ?>
                </div>
                <?php
                    }
                }
            }
            ?>
        </div>
        <div class="message">
            <form action="<? if(!isset($_GET['sel'])) {echo 'vendor/public_message.php';} else {echo 'vendor/send.php?sel='. $_GET['sel'];} ?>" method="POST">
            <textarea placeholder="Введите сообщение. (При обновлении страницы сообщение сбросится)" name="message"></textarea>
            <a href="smiles.php">Смайлики</a>
            <input type="submit" class="sumbit" value="Отправить сообщение" onclick="send()" accesskey="">
            </form>
        </div>
    </div>

    <script>
    function send(e) {
    if (e.keyCode == 13) { 
      document.querySelector(".sumbit").click();
    }
    }

    // function menutoggle() {
    //     document.getElementById("dialogs").classList.toggle("closed");
    // }

    let elToggle = document.querySelector(".menu");
    let elBlock = document.getElementById("dialogs");
    elToggle.addEventListener("click", () => {
    if (elBlock.style.height === "0px") {
        elBlock.style.height = `${ elBlock.scrollHeight }px`
    } else {
        elBlock.style.height = `${ elBlock.scrollHeight }px`;
        window.getComputedStyle(elBlock, null).getPropertyValue("height");
        elBlock.style.height = "0";
    }
    });

    if (/Android|webOS|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent)) {
        online = document.getelementById('online');
        online.src = 'avatar/default/online_mobile.png';
    } else if (/iPhone/i.test(navigator.userAgent)) {
        online = document.getelementById('online');
        online.src = 'avatar/default/online_iphone.png';
    }
    </script>
</body>
</html>
<?php
} else {
    header("Location: /login.php");
}