<?php
session_start();
session_unset();
session_destroy();
if (!empty($_GET["msg"]) && $_GET["msg"] == 'logout') {
    header("location:index.php");
} elseif (!empty($_GET["msg"]) && $_GET["msg"] == 'sing_in_account') {
    header("location:register.php");
} elseif (!empty($_GET["msg"]) && $_GET["msg"] == 'login_account') {
    header("location:index.php");
} else {
    header("location:index.php");
}
exit();
