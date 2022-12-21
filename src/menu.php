<?php
if ($_SESSION['loginin'] == 1) {
// require_once "mobile_detect.php";
// $detect = new Mobile_Detect;
include('dbconnect.php');
$userslist = mysqli_query($connectuser, "SELECT * FROM `Users`");
$userslist = mysqli_fetch_all($userslist);

$id = $_SESSION['id'];
$users = mysqli_query($connectuser, "SELECT * FROM `Users` WHERE `id` = '$id'");
$users = mysqli_fetch_row($users);
?>

<div class="chatlist_mobile">
        <div class="menu" onclick="menutoggle()">
        <span class="title"><span class="admin">β </span>Диалоги</span>
            <a class="options" href="/options.php">Настройки</a>
            <a href="logout.php" class="exit">Выйти</a>
        </div>
        <div class="dialogs" id="dialogs" style="height: 0;">
        <?php
        foreach ($userslist as $user) {
            ?><a class="dialog <?php if ($_GET['sel'] == $user[0]) {echo 'selected';} ?>" href="<? if (isset($_GET['sel']) AND $_GET['sel'] == $user[0]) {echo '/';} else {echo '?sel='.$user[0];}?>"><?php if ($user[3] > time()-180) {echo '<img src="avatars/default/online.png" id="online" style="vertical-align: middle;">';} else {echo '<img src="avatars/default/not_online.png" style="vertical-align: middle;">';} echo $user[1]; if ($user[5] == 1) {echo '<span class="admin"> (Администратор)</span>';} ?></a><?php
        }
        ?>
        <div class="parameters">
        <div class="casino"><a href="casino.php"><img src="/cdn/casino.png"></a></div>
</div>
</div>

<div class="chatlist">
        <div class="menu">
            <span class="title"><span class="admin">β </span>Диалоги</span>
            <a class="options" href="/options.php">Настройки</a>
            <a href="logout.php" class="exit">Выйти</a>
        </div>
        <div class="dialogs">
        <?php
        foreach ($userslist as $user) {
            ?><a class="dialog <?php if ($_GET['sel'] == $user[0]) {echo 'selected';} ?>" href="<? if (isset($_GET['sel']) AND $_GET['sel'] == $user[0]) {echo '/';} else {echo '?sel='.$user[0];}?>"><?php if ($user[3] > time()-180) {echo '<img src="avatars/default/online.png" id="online" style="vertical-align: middle;">';} else {echo '<img src="avatars/default/not_online.png" style="vertical-align: middle;">';} echo $user[1]; if ($user[5] == 1) {echo '<span class="admin"> (Администратор)</span>';} ?></a><?php
        }
        ?>
        </div>
        <div class="parameters">
        <div class="casino"><a href="casino.php"><img src="/cdn/casino.png"></a></div>
</div>
<? }
// if ($user[3] > time()-180 AND $detect->isMobile()) {echo '<img src="avatars/default/online_mobile.png">';} elseif ($user[3] > time()-180 AND $detect->isiOS()) {echo '<img src="avatars/default/online_iphone.png">';} else