<?php
session_start();
require_once("../../classes.php");
$user = unserialize ($_SESSION["user"]);
if (!empty($_REQUEST["like"])) {
    if (empty($user->myLike($_REQUEST["post_id"], $user->id))) {
        $user->store_like($_REQUEST["like"],$user->id,$_REQUEST["post_id"]);
        header("location:home.php?msg =like_done");
    } else{
        $user->unlike($user->id,$_REQUEST["post_id"]);
        header("location:home.php?msg =unlike_done");
    }

}else{
    header("location:home.php?msg=requird_like_field");
}