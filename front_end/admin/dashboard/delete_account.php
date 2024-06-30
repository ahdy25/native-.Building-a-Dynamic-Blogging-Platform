<?php
session_start();
require_once('../../../classes.php');
if (!isset($_SESSION["user"])) {
    header("location:../../../error_page.php?msg=not_logged_in");
    exit();
}
$user = unserialize($_SESSION["user"]);
if (!isset($_REQUEST["user_id"]) || empty($_REQUEST["user_id"])) {
    header("location:../../../error_page.php?msg=invalid_user_id");
    exit();
}
$user_id = intval($_REQUEST["user_id"]);
if ($user->role !== 'admin') {
    header("location:../../../error_page.php?msg=unauthorized");
    exit();
}
if ($user->delete_account($user_id)) {
    header("location:../../../success_page.php?msg=delete_done");
} else {
    header("location:../../../error_page.php?msg=delete_failed");
}
exit();
?>
