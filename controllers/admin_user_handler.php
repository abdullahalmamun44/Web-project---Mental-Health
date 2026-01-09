<?php
require_once '../models/db.php'; // your getConnection() function

$con = getConnection();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $action = $_POST['action'] ?? '';
    $username = trim($_POST['username'] ?? '');
    $password = trim($_POST['password'] ?? '');

    if ($action === 'add' && $username && $password) {
        $hashed = password_hash($password, PASSWORD_DEFAULT);
        $stmt = mysqli_prepare($con, "INSERT INTO users (username, password) VALUES (?, ?)");
        mysqli_stmt_bind_param($stmt, "ss", $username, $hashed);
        mysqli_stmt_execute($stmt);
    }

    if ($action === 'delete' && $username) {
        $stmt = mysqli_prepare($con, "DELETE FROM users WHERE username = ?");
        mysqli_stmt_bind_param($stmt, "s", $username);
        mysqli_stmt_execute($stmt);
    }

    if ($action === 'update' && $username && $password) {
        $hashed = password_hash($password, PASSWORD_DEFAULT);
        $stmt = mysqli_prepare($con, "UPDATE users SET password = ? WHERE username = ?");
        mysqli_stmt_bind_param($stmt, "ss", $hashed, $username);
        mysqli_stmt_execute($stmt);
    }

    header("Location: ../views/dashboard.php");
    exit();
}
?>