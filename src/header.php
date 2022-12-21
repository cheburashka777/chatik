<?php
if ($_SESSION['loginin'] == 1) {
session_start();
include('dbconnect.php');
$sendid = $_GET['sel'];
$userslist = mysqli_query($connectuser, "SELECT * FROM `Users` WHERE `id` = '$sendid'");
$userslist = mysqli_fetch_row($userslist);

$id = $_GET['sel'];

$online = mysqli_query($connectuser, "SELECT * FROM `Users` WHERE `id` = '$id'");
$online = mysqli_fetch_row($online);

$msgcount = mysqli_query($connect_pubmsg, "SELECT COUNT(*) FROM `public_messages`");
$msgcount = mysqli_fetch_row($msgcount);

if ($id == $_SESSION['id']) {
    $online[3] = 'Это вы';
} elseif ($online[3] > time()-180) {
    $online[3] = 'На связи';
} elseif ($online[3] == 0) {
    $online[3] = 'Никогда не был на связи';
} else {
    $online[3] = 'Не на связи';
}

if (!isset($_GET['sel'])) {
?>
<div class="companian" style="height: 48px;">
    <div class="avatar">
        <img src="avatars/default/avatar.png" width="33" height="33">
    </div>
    <div class="name">Общий чат<br>
    <span class="online"><?= $msgcount[0] ?> сообщений</span>
    </div>

</div>
<?php
} elseif ($_GET['sel'] == NULL) {
?>
<div class="companian" style="height: 48px;">
    <div class="avatar">
        <img src="avatars/default/avatar.png" width="33" height="33">
    </div>
    <div class="name">Общий чат<br>
    <span class="online"><?= $msgcount[0] ?> сообщений</span>
    </div>
</div>
<?php
} else {
?>
<div class="companian">
    <div class="avatar">
        <img src="<?php if ($online[4] != NULL) {echo '/avatars/'.$online[4];} else {echo '/avatars/default/default.png';} ?>" width="33" height="33">
    </div>
    <div class="name"><?php echo $userslist[1]; if ($userslist[5] == 1) {echo '<span class="admin"> (Администратор)</span>';}?> <br> <span class="online"><?= $online[3] ?></span></div>
</div>
<? }} ?>

<!-- <div class="companian">
    <div class="avatar">
        <img src="Дедуля.jpeg" width="32" height="32">
    </div>
    <div class="name">Кент <br> <span class="online">Не в сети</span></div>
</div> -->