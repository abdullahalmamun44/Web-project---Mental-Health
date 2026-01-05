<?php
require_once('../models/usermodel.php');

session_start();

if(!isset($_SESSION['reset_user'])) {
    header('location: ../views/forgot_password.php');
    exit();
}

if(isset($_POST['submit']) == true) {
    $username = trim($_POST['username']);
    $new_password = trim($_POST['new_password']);
    $confirm_password = trim($_POST['confirm_password']);
    
    if($username !== $_SESSION['reset_user']) {
        header('location: ../views/reset_password.php');
        exit();
    }
    if($new_password !== $confirm_password) {
        header('location: ../views/reset_password.php');
        exit();
    }
    
    if(strlen($new_password) < 6) {
        header('location: ../views/reset_password.php');
        exit();
    }
    $success = updatePassword($username, $new_password);
    
    if($success) {
        session_destroy();
        header('location: ../views/userlogin.php');
        exit();
    } else {
        header('location: ../views/reset_password.php');
        exit();
    }
    
} else {
    header('location: ../views/forgot_password.php');
    exit();
}
?>