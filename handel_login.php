<?php
session_start();
$errors = [];
if (empty($_REQUEST['email']))
    $errors['email'] = 'Enter Your Email';
if (empty($_REQUEST['password']))
    $errors['password'] = 'Enter Your Password';
if (!empty($_REQUEST['email']) && !filter_var($_REQUEST['email'], FILTER_VALIDATE_EMAIL)) {
    $errors['email'] = 'Input Email Not Correct Please Write @ or .com';
}
$email = filter_var($_REQUEST['email'], FILTER_SANITIZE_EMAIL);
$password = htmlspecialchars($_REQUEST['password']);
if (empty($errors)) {
    require_once ('classes.php');
    $user = User::login($email, md5($password));
    if (!empty($user)) {
        if ($user->is_banned) {
            header('location:error_page.php?msg_login=account_banned');
            exit();
        }
        $_SESSION["user"] = serialize($user);
        if ($user->role == "admin") {
            header("location:front_end/admin/dashboard/home.php");
        } elseif ($user->role == "subscriber") {
            header("location:front_end/subscriber/home.php");
        }
    } else {
        header('location:index.php?msg_login=no-req');
    }
} else {
    $_SESSION['errors'] = $errors;
    header('location:index.php?msg_login=al');
}
?>