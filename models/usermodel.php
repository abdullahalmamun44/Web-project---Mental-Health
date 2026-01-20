<?php

require_once('database.php');

function login($user)
{
    $con = getConnection();
    $sql = "select * from users where username='{$user['username']}' and password='{$user['password']}'";
    $result = mysqli_query($con, $sql);
    if (mysqli_num_rows($result) == 1) {
        return mysqli_fetch_assoc($result);
    } else {
        return false;
    }
}

function forgotPassword($username, $email)
{
    $con = getConnection();
    $sql = "SELECT * FROM users WHERE username = '$username' AND email = '$email'";
    $result = mysqli_query($con, $sql);

    if (mysqli_num_rows($result) == 1) {
        return true;
    } else {
        return false;
    }
}

function updatePassword($username, $new_password)
{
    $con = getConnection();
    $sql = "UPDATE users SET password = '$new_password' WHERE username = '$username'";

    if (mysqli_query($con, $sql)) {
        return mysqli_affected_rows($con) > 0;
    } else {
        return false;
    }
}

function addUser($user)
{
    $con = getConnection();
    if (!$con) {
        echo "Connection failed";
        return false;
    }


    $check_sql = "SELECT * FROM users WHERE username = '{$user['username']}'";
    $check_result = mysqli_query($con, $check_sql);

    if (mysqli_num_rows($check_result) > 0) {
        return false;
    }

    $sql = "INSERT INTO users VALUES ('{$user['fullname']}','{$user['username']}','{$user['phonenumber']}',
        '{$user['email']}','{$user['password']}','{$user['age']}','{$user['gender']}','{$user['emergencycontact']}')";
    if (mysqli_query($con, $sql)) {
        echo "Success! Row inserted.<br>";
        return true;
    } else {
        echo mysqli_error($con);
        //echo "Error: " . mysqli_error($con) . "<br>";
        return false;
    }

}
function checkUsername($username)
{
    ob_start();
    $con = getConnection();
    if (!$con) {
        ob_end_clean();
        return false;
    }

    $username = mysqli_real_escape_string($con, trim($username));
    $sql = "SELECT * FROM users WHERE username='$username'";
    $result = mysqli_query($con, $sql);
    ob_end_clean();
    if ($result && mysqli_num_rows($result) > 0) {
        return true;
    } else {
        return false;
    }
}
function getUserByUsername($username)
{
    $con = getConnection();
    $username = mysqli_real_escape_string($con, $username);

    $sql = "SELECT * FROM users WHERE username='$username'";
    $result = mysqli_query($con, $sql);

    if ($result && mysqli_num_rows($result) == 1) {
        $user = mysqli_fetch_assoc($result);
        return $user;
    }
    return false;
}
function updateUser($username, $updateData)
{
    $con = getConnection();

    $fullName = mysqli_real_escape_string($con, $updateData['fullName']);
    $email = mysqli_real_escape_string($con, $updateData['email']);
    $phonenumber = mysqli_real_escape_string($con, $updateData['phonenumber']);
    $age = mysqli_real_escape_string($con, $updateData['age']);
    $gender = mysqli_real_escape_string($con, $updateData['gender']);
    $emergencyContact = mysqli_real_escape_string($con, $updateData['emergencyContact']);
    $username = mysqli_real_escape_string($con, $username);

    $sql = "UPDATE users SET 
                fullName = '$fullName',
                email = '$email',
                phonenumber = '$phonenumber',
                age = '$age',
                gender = '$gender',
                emergencyContact = '$emergencyContact'
                WHERE username = '$username'";

    if (mysqli_query($con, $sql)) {
        return mysqli_affected_rows($con) > 0;
    } else {
        return false;
    }
}
function deleteUser($username)
{
    $con = getConnection();
    if (!$con) {
        return false;
    }
    $username = mysqli_real_escape_string($con, $username);
    $check_sql = "SELECT * FROM users WHERE username = '$username'";
    $check_result = mysqli_query($con, $check_sql);
    
    if (mysqli_num_rows($check_result) == 0) {
        return false;
    }
    
    $sql = "DELETE FROM users WHERE username = '$username'";
    
    if (mysqli_query($con, $sql)) {
        return mysqli_affected_rows($con) > 0;
    } else {
        return false;
    }
}
?>