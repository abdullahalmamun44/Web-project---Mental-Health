<?php
require_once '../models/database.php'; // your getConnection() function

$con = getConnection();

if (isset($_POST['action'])) {
    $act = $_POST['action'];
    $username = trim($_POST['username'] ?? '');
    $password = trim($_POST['password'] ?? '');

    if ($act === 'add' && $username && $password) {
        $hashed = password_hash($password, PASSWORD_DEFAULT);
        $stmt = mysqli_prepare($con, "INSERT INTO users (username, password) VALUES (?, ?)");
        mysqli_stmt_bind_param($stmt, "ss", $username, $hashed);
        mysqli_stmt_execute($stmt);
    }

    if ($act === 'delete' && $username) {
        $stmt = mysqli_prepare($con, "DELETE FROM users WHERE username=?");
        mysqli_stmt_bind_param($stmt, "s", $username);
        mysqli_stmt_execute($stmt);
    }
}


header("Location: ../views/dashboard.php");
exit();

?>