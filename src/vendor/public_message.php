<?php
session_start();
if ($_SESSION['loginin'] == 1) {
include('../dbconnect.php');
include('../online.php');

$autor = $_SESSION['login'];
$message_text = htmlspecialchars(trim($_POST['message']));

if (!empty($message_text)) {
$message_text = strtr($message_text, [
    ':)' => '<img src="http://www.kolobok.us/smiles/standart/smile3.gif" alt=":)">',
    ':-)' => '<img src="http://www.kolobok.us/smiles/standart/smile3.gif" alt=":-)">',
    '=)' => '<img src="http://www.kolobok.us/smiles/standart/smile3.gif" alt="=)">',
    '=-)' => '<img src="http://www.kolobok.us/smiles/standart/smile3.gif" alt="=-)">',
    ':(' => '<img src="http://www.kolobok.us/smiles/standart/sad.gif" alt=":(">',
    ':-(' => '<img src="http://www.kolobok.us/smiles/standart/sad.gif" alt=":-(">',
    '=(' => '<img src="http://www.kolobok.us/smiles/standart/sad.gif" alt="=(">',
    '=-(' => '<img src="http://www.kolobok.us/smiles/standart/sad.gif" alt="=-(">',
    ':P' => '<img src="http://www.kolobok.us/smiles/standart/blum3.gif" alt="=-(">',
    ':-P' => '<img src="http://www.kolobok.us/smiles/standart/blum3.gif" alt=":-P">',
    '=P' => '<img src="http://www.kolobok.us/smiles/standart/blum3.gif" alt="=P">',
    '=-P' => '<img src="http://www.kolobok.us/smiles/standart/blum3.gif" alt="=-P">',
    ':Р' => '<img src="http://www.kolobok.us/smiles/standart/blum3.gif" alt=":Р">',
    ':-Р' => '<img src="http://www.kolobok.us/smiles/standart/blum3.gif" alt=":-Р">',
    '=Р' => '<img src="http://www.kolobok.us/smiles/standart/blum3.gif" alt="=Р">',
    '=-Р' => '<img src="http://www.kolobok.us/smiles/standart/blum3.gif" alt="=-Р">',
    
]);

$senderID = $_SESSION['id'];
$time = time();

mysqli_query($connect_msg, "INSERT INTO `public_messages` (`id`, `autor`, `text`, `date`, `senderID`) VALUES (NULL, '$autor', '$message_text', '$time', '$senderID')");
}

header('Location: ../');
}