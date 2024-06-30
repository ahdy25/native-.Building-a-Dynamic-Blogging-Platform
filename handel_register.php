<?php
session_start();
$errors = [];
if (empty($_REQUEST['first_name']))
    $errors['first name'] = 'The name is required';
if (empty($_REQUEST['last_name']))
    $errors['last name'] = 'Last name is required';
if (empty($_REQUEST['phone']))
    $errors['phone_lose'] = 'Phone number is required';
if (strlen($_REQUEST['phone']) != 11)
    $errors['phone'] = 'The phone number must be 11 digits long';
if (empty($_REQUEST['pw']) || empty($_REQUEST['pc']))
    $errors['pw-pc'] = 'The password or password confirm is required';
if (empty($_REQUEST['email']))
    $errors['email'] = 'Email is required';
if ($_REQUEST['pw'] != $_REQUEST['pc'])
    $errors['password_ditection'] = 'The password conforamtion not match with password';
if (!empty($_REQUEST['email']) && !filter_var($_REQUEST['email'], FILTER_VALIDATE_EMAIL))
    $errors['email'] = 'email not corect add @ ';
if (strlen($_REQUEST['pw']) < 6) {
    $errors['pw_short'] = 'The password must be at least 6 characters long';
}

$first_name = htmlspecialchars(trim($_REQUEST['first_name']));
$last_name = htmlspecialchars(trim($_REQUEST['last_name']));
$email = filter_var($_REQUEST['email'], FILTER_SANITIZE_EMAIL);
$password = htmlspecialchars($_REQUEST['pw']);
$password_confirmation = htmlspecialchars($_REQUEST['pc']);
$phone = htmlspecialchars(trim($_REQUEST['phone']));
if (empty($errors)) {
    require_once ('classes.php');
    try {
        Subscriber::register($first_name, $last_name, $email, md5($password), $phone);
        header('location:success_page.php?msg=sr');
    } catch (\Throwable $th) {
        header('location:register.php?msg=ar');
    }
} else {
    $_SESSION['errors'] = $errors;
    header('location:register.php?msg=errors');
}
