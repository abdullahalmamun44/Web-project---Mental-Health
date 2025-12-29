<?php
    require_once('../models/usermodel.php');
    if(isset($_POST['submit'])==true) {
    session_start();
    $username=$_POST['username'];
    $password=$_POST['password'];
    if($username==""| $password== "") {
        echo"Null username/password... Please type again !";

    }else{
        $user =['username'=>$username,'password'=>$password];
        $status=login($user);
        if($status){
            setcookie('status','true',time()+3000,'/');
            $_SESSION['username']= $username;
            header('location: ../assets/dashboard.html');
        }else{
        echo" Login Failed: Invalid username / password...";
        echo "<br><a href='../views/userlogin.php'>Go back to login</a>";
        }
    }

    
}else{
    header('location: ../views/userlogin.php');
}
?>