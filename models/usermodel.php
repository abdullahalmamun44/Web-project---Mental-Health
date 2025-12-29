<?php
    require_once('database.php');
    
    function login($user){
        $con=getConnection();
        $sql="select * from users where username='{$user['username']}' and password='{$user['password']}'";
        $result=mysqli_query($con,$sql);
        if (mysqli_num_rows($result)==1){
            return true;
        }else{
            return false;
        }
    }
    
    function getUserById(){

    }
    function getAllUsers(){

    }
    function addUser($user){
        $con=getConnection();
        if(!$con){
        echo "Connection failed";
        return false;
    }
    
    $result = mysqli_query($con, "SHOW TABLES");
    echo "Available tables: ";
    while($row = mysqli_fetch_array($result)) {
        echo $row[0] . ", ";
    }
    echo "<br>";

        $sql= "INSERT INTO users VALUES ('{$user['fullname']}','{$user['username']}','{$user['phonenumber']}',
        '{$user['email']}','{$user['password']}','{$user['age']}','{$user['gender']}','{$user['emergencycontact']}')";
        if(mysqli_query($con,$sql)){
            echo "Success! Row inserted.<br>";
            return true;
        }else{
            echo mysqli_error($con);
            echo "Error: " . mysqli_error($con) . "<br>";
            return false;
        }
            
    }
    function deleteUser(){

    }
    function updateUser(){

    }
?>
