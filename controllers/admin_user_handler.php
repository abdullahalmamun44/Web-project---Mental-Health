<?php
require_once '../models/database.php';
session_start();

$con = getConnection();

// Only allow admin role
if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'admin') {
    header("Location: ../views/userlogin.php");
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action'])) {
    $act = $_POST['action'];
    $username = trim($_POST['username'] ?? '');
    $password = trim($_POST['password'] ?? '');

    if ($act === 'add' && $username && $password) {
        // Prevent duplicate usernames
        $check = mysqli_prepare($con, "SELECT id FROM users WHERE username=?");
        mysqli_stmt_bind_param($check, "s", $username);
        mysqli_stmt_execute($check);
        mysqli_stmt_store_result($check);

        if (mysqli_stmt_num_rows($check) > 0) {
            $_SESSION['msg'] = " Username already exists!";
        } else {
            $hashed = password_hash($password, PASSWORD_DEFAULT);
            $stmt = mysqli_prepare($con, "INSERT INTO users (username, password) VALUES (?, ?)");
            mysqli_stmt_bind_param($stmt, "ss", $username, $hashed);
            mysqli_stmt_execute($stmt);
            $_SESSION['msg'] = " User added successfully!";
        }
    }

    if ($act === 'delete' && $username) {
        $stmt = mysqli_prepare($con, "DELETE FROM users WHERE username=?");
        mysqli_stmt_bind_param($stmt, "s", $username);
        mysqli_stmt_execute($stmt);
        $_SESSION['msg'] = " User deleted successfully!";
    }
}

header("Location: ../views/dashboard.php");
exit();
?>