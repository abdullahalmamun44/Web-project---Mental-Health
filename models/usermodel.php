<?php
    require_once('database.php');
    function login($user){
        $con=getConnection();
        $sql="select * from users where username='{$user['username']}' and password='{$user['Password']}'";
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
        $sql= "insert into users values ('{$user['Name']}','{$user['username']}','{$user['Phone']}','{$user['E-Mail']}','{$user['Password']}','{$user['Age']}','{$user['Gender']}','{$user['Emergency Contact']}')";
        if(mysqli_query($con,$sql)){
            return true;
        }else{
            return false;
        }
            
    }
    function deleteUser(){

    }
    function updateUser(){

    }
?>
