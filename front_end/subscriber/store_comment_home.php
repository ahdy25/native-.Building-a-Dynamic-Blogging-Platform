<?php
session_start();
require_once('../../classes.php');
$user = unserialize($_SESSION["user"]);

$comment = htmlspecialchars(trim($_REQUEST['comment']));

if (!empty($comment)) {
    $user->store_comment($comment, $_REQUEST["post_id"], $user->id);
    header("location:home.php?msg=comment_succses_home");
} else {
    header("location:../../error_page.php?msg=required_comment_home_field");
}
?>