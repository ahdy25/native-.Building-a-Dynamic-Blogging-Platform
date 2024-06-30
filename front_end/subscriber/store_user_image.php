<?php
session_start();
require_once("../../classes.php");
$user = unserialize($_SESSION["user"]);

if (isset($_POST['delete'])) {
    if (!empty($user->image)) {
        unlink($user->image);
        $user->update_profile(null, $user->id);
        $user->image = null;
        $_SESSION["user"] = serialize($user);
        header("location:../../success_page.php?msg=user_image_deleted");
    } else {
        header('location:../../error_page.php?msg=no_image_to_delete');
    }
} elseif (!empty($_FILES["image"]["name"])) {
    $imageStor =  "../../images/user/" . $_FILES["image"]["name"];
    move_uploaded_file($_FILES["image"]["tmp_name"], $imageStor);
    $user->update_profile($imageStor, $user->id);
    $user->image = $imageStor;
    $_SESSION["user"] = serialize($user);
    header("location:../../success_page.php?msg=user_image_done");
} else {
    header('location:../../error_page.php?msg=required_images_fields');
}
