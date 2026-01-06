<?php
ob_start();
require_once('../models/usermodel.php');
if(isset($_POST['username'])){
    $username=trim($_POST['username']);
    ob_clean();
    if(strlen($username)<3){
        echo 'invalid username';
        exit();
    }
    $con=getConnection();
    if(!$con){
        echo 'database connection error';
        exit();
    }
    $username=mysqli_real_escape_string($con, $username);
    $sql="SELECT * FROM users WHERE username='$username'";
    $result=mysqli_query($con, $sql);
    ob_clean();
    if($result && mysqli_num_rows($result)> 0){
        echo 'username taken';
    } else {
        echo 'username available';
    }
    mysqli_close($con);
}else{
    ob_clean();
    echo'error';
}
ob_end_flush();
?>