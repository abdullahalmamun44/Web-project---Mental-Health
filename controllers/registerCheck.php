<?php

    if(isset($_POST['submit']) == true){
        session_start();
        $username = $_REQUEST['username'];
        $password = $_REQUEST['password'];
        $email = $_REQUEST['email'];


        if($username == "" || $password == "" || $email == ""){
            echo "null username/password/email... please type again!";
        }else{
            $user = ['username'=> $username, 'password'=> $password, 'email'=> $email];
            $_SESSION['user'] = $user;
            header('location: ../views/userlogin.php');
        }
    }else{
        header('location: register.php');
    }

?>