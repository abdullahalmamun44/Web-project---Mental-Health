<?php
require_once('../models/usermodel.php');

if(isset($_POST['submit']) == true) {
    $username = trim($_POST['username']);
    $email = trim($_POST['email']);

    if($username == "" || $email == "") {
        header('location: ../views/forgot_password.php');
        exit();
    }else {
        header('location: ../views/forgot_password.php?error=Username and email combination not found');
    }
    
    $user_Exists = forgotPassword($username, $email);
    
    if($user_Exists) {
        session_start();
        $_SESSION['reset_user'] = $username;
        $_SESSION['reset_email'] = $email;
        
        header('location: ../views/reset_password.php');
        exit();
    } else {
        header('location: ../views/forgot_password.php');
        exit();
    }
    
} else {
    header('location: ../views/forgot_password.php');
    exit();
}
?>