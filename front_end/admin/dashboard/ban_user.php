<?php
session_start();
require_once('../../../classes.php');

if (!isset($_SESSION["user"]) || unserialize($_SESSION["user"])->role !== 'admin') {
    header("location:../../../error_page.php?msg=unauthorized");
    exit();
}

if (!isset($_POST["user_id"]) || empty($_POST["user_id"])) {
    header("location:../../../error_page.php?msg=invalid_user_id");
    exit();
}

$user_id = intval($_POST["user_id"]);
$user = unserialize($_SESSION["user"]);

if ($user->ban_user($user_id)) {
    header("location:../../../success_page.php?msg=ban_done");
} else {
    header("location:../../../error_page.php?msg=ban_failed");
}
exit();
?>
