<?php
require_once('../models/database.php');
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    if ($username === "" || $password === "") {
        echo "Username or password cannot be empty!";
    } else {
        $con = getConnection();
        $sql = "SELECT * FROM admin WHERE userName='$username' AND password='$password'";
        $result = mysqli_query($con, $sql);

        if (mysqli_num_rows($result) === 1) {
    $_SESSION['admin'] = $username;
    setcookie('status', 'true', time() + 3600, '/');
    header("Location: ../views/dashboard.php"); 
    exit();   // ✅ this is critical
}

        } else {
            echo "Invalid credentials!";
            echo "<br><a href='../views/admin_login.php'>Try again</a>";
        }
    }
} else {
    header("Location: ../views/admin_login.php");
}
?>
