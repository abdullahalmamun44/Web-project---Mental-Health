<?php
    require_once('../models/usermodel.php');

    if(isset($_POST['submit']) == true){
        session_start();
        $fullname = $_REQUEST['fullname'];
        $phonenumber = $_REQUEST['phonenumber'];
        $username = $_REQUEST['username'];
        $password = $_REQUEST['password'];
        $email = $_REQUEST['email'];
        $gender= $_REQUEST['gender'];
        $age=$_REQUEST['age'];
        $emergencycontact = $_REQUEST['emergencycontact'];


        if($fullname=="" || $username == "" || $phonenumber == "" || $password == "" || $email == ""
         || $age=="" || $gender=="" || $emergencycontact==""){
            echo "null username/password/email... please type again!";
        }else{
            $user = ['username'=> $username, 'password'=> $password, 'email'=> $email ,'fullname'=>$fullname,
            'phonenumber'=>$phonenumber,'age'=>$age,'gender'=>$gender,'emergencycontact'=>$emergencycontact];
            $status=addUser($user);
            if($status){
                header('location: ../views/userlogin.php');
            }else{
                header('location: ../views/register.php');

            }
        }
    }else{
        header('location: ../views/register.php');
    }

?>