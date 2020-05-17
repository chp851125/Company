<?php
    require_once '../mysqli_connect.php';
    require_once '../function.php';
    $check = verify_user($_POST['account'], $_POST['password']);
    
    if($check){
        echo "yes";
    }
    else{
        echo "no";
    }
?>