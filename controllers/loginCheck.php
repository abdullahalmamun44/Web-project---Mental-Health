<?php
    require_once('../models/usermodel.php');
if(isset($_POST['submit'])==true) {
    session_start();
    $username=$_REQUEST['username'];
    $password=$_REQUEST['password'];
    if($username==""| $password== "") {
        echo"Null username/password... Please type again !";

    }else{
        $user =['username'=>$username,'password'=>$password];
        $status=login($user);
        if($status){
            setcookie('status','true',time()+3000,'/');
            $_SESSION['username']= $username;
            header('location: ../views/home.php');
        }else{
        echo"Invalid username /Password";
        }
    }

    
}else{
    header('location: ../views/userlogin.php');
}
?>