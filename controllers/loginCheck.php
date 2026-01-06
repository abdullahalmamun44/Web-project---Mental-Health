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
        $userData=login($user);
        if($userData){
            $_SESSION['user_data']=$userData;

            setcookie('status','true',time()+3000,'/');
            setcookie('username',$username,time()+3000,'/');
            $_SESSION['username']= $username;
            header('location: ../views/dashboard.php');
        }else{echo "<script>
                    alert('Login Failed: Invalid username or password');
                    window.location.href='../views/userlogin.php';
                  </script>";
        }
    }

    
}else{
    header('location: ../views/userlogin.php');
}
?>