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
    $usernameExists=checkUsername($username);
    if($usernameExists===false){
        echo 'username available';
    } else {
        echo 'username taken';
    }
}else{
    ob_clean();
   
    echo 'error';
}

exit;