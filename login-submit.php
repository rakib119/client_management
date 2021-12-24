<?php
require_once("inc/functions.inc.php");
$flag = 0;
// pr($_POST);
// die();
if (!$_POST['email']) {
    $flag = 1;
    $_SESSION['email_error'] = "Please enter your email";
}
if (!$_POST['password']) {
    $flag = 1;
    $_SESSION['password_error'] = "Please enter your Password";
}
if ($flag != 1) {
    $email = email_format($_POST['email']);
    $password = password_format($_POST['password']);
    
    $clients = select('clients', '*', "email='$email' AND password='$password' AND status=1");
    if (mysqli_num_rows($clients) > 0) {
        $login_info = mysqli_fetch_assoc($clients);
        $_SESSION["LOGIN"] = 'YES';
        $_SESSION["is_client"] = 'YES';
        $_SESSION["LOGIN_ID"] = $login_info['id'];
        $_SESSION["EMAIL"] = $login_info['email'];
        $_SESSION["USER_NAME"] = $login_info['name'];
        // $_SESSION['success'] = "login successfull";
        header('location: index.php');
    } else {
        $admin = select('users', '*', "email='$email' AND password='$password' AND status=1");
        if (mysqli_num_rows($admin) > 0) {
            $login_info = mysqli_fetch_assoc($admin);
            $_SESSION["LOGIN"] = 'YES';
            $_SESSION["LOGIN_ID"] = $login_info['id'];
            $_SESSION["EMAIL"] = $login_info['email'];
            $_SESSION["USER_NAME"] = $login_info['name'];
            // $_SESSION['success'] = "login successfull";
            header('location: index.php');
        } else {
            $_SESSION['login_error'] = "Please enter correct login Details";
            header('location: login.php');
        }
    }
}
