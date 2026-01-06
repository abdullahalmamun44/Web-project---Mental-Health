<?php
require_once('../models/database.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $fullname = $_POST['fullname'];
    $username = $_POST['username'];
    $phonenumber = $_POST['phonenumber'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $age = $_POST['age'];
    $gender = $_POST['gender'];
    $emergencycontact = $_POST['emergencycontact'];
    $role = $_POST['role']; // NEW

    $con = getConnection();

    if ($role === 'user') {
       $sql = "INSERT INTO user (fullName, userName, phonenumber, email, password, age, gender, emergencyContact)
        VALUES ('$fullname','$username','$phonenumber','$email','$password','$age','$gender','$emergencycontact')";

        if (mysqli_query($con, $sql)) {
            header("Location: ../views/userlogin.php"); // redirect to user login
            exit();
        } else {
            echo "Error: " . mysqli_error($con);
        }
    } elseif ($role === 'admin') {
       $sql = "INSERT INTO admin (userName, password) 
        VALUES ('$username','$password')";


        if (mysqli_query($con, $sql)) {
            header("Location: ../views/admin_login.php"); // redirect to admin login
            exit();
        } else {
            echo "Error: " . mysqli_error($con);
        }
    } else {
        echo "Invalid role selected!";
    }
}
?>
