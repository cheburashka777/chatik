<?php
$connectuser = mysqli_connect('$hostname', '$username', '$password', '$database');
if (!$connectuser) {
    die('Вот дерьмо! Не работает!');
}

$connect_pubmsg = mysqli_connect('$hostname', '$username', '$password', '$database');
if (!$connect_pubmsg) {
    die('Вот дерьмо! Не работают общие сообщения!');
}

$connect_msg = mysqli_connect('$hostname', '$username', '$password', '$database');
if (!$connect_msg) {
    die('Вот дерьмо! Не работают личные сообщения!');
}