<?php
    require_once('../models/userModel.php');

    if(isset($_POST['submit']) == true){
        session_start();
        $username = $_REQUEST['username'];
        $password = $_REQUEST['password'];
        $email = $_REQUEST['email'];


        if($username == "" || $password == "" || $email == ""){
            echo "null username/password/email... please type again!";
        }else{
            $user = ['username'=> $username, 'password'=> $password, 'email'=> $email];
            $status=addUser($user);
            if($status){
                header('location: ../views/login.php');
            }else{
                header('location: ../views/register.php');
                
            }
        }
    }else{
        header('location: ../views/register.php');
    }

?>