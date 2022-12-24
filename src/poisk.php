<?php
session_start();
if ($_SESSION['loginin']) {
include('online.php');

include('dbconnect.php');

$imya = $_GET["search"];

$connect = mysqli_query($connectuser, "SELECT * FROM `Users` WHERE `login` LIKE '%$imya%'");
$connect = mysqli_fetch_all($connect);

foreach ($connect as $user) {
    ?><a class="dialog <?php if ($_GET['sel'] == $user[0]) {echo 'selected';} ?>" href="<? if (isset($_GET['sel']) AND $_GET['sel'] == $user[0]) {echo '/';} else {echo '?sel='.$user[0];}?>"><?php if ($user[3] > time()-180) {echo '<img src="avatars/default/online.png" id="online" style="vertical-align: middle;">';} else {echo '<img src="avatars/default/not_online.png" style="vertical-align: middle;">';} echo $user[1]; if ($user[5] == 1) {echo '<span class="admin"> (Администратор)</span>';} ?></a><?php
}
}
?>