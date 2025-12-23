<?php
if(isset($_POST['submit'])==true) {
    session_start();
    $username=$_REQUEST['username'];
    $password=$_REQUEST['password'];
    if($username==""| $password== "") {
        echo"Null username/password... Please type again !";

    }else{
        if($username==$_SESSION['user']['username']&&$password==$_SESSION['user']['password']){
            setcookie('status','true',time()+3000,'/');
            $_SESSION['username']= $username;
            header('location: home.php');
        }else{
        echo"Invalid username /Password";
        }
    }

    
}else{
    header('location: userlogin.php');
}
?>