<?php
require_once('../models/usermodel.php');
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    if ($username == "" || $password == "") {
        echo "Null username/password... Please type again !";
    } else {
        $user = ['username' => $username, 'password' => $password];
        $status = login($user);

        if ($status) {
            setcookie('status', 'true', time() + 3000, '/');
            $_SESSION['username'] = $username;
            header('Location: ../views/dashboard.php');
            exit(); // ✅ critical
        } else {
            echo "Login Failed: Invalid username / password...";
            echo "<br><a href='../views/userlogin.php'>Go back to login</a>";
        }
    }
} else {
    header('Location: ../views/userlogin.php');
    exit();
}
?>
