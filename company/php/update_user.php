<?php
    require_once '../mysqli_connect.php';
    require_once '../function.php';
    $check = update_user($_POST['id'], $_POST['account'], $_POST['password'], $_POST['name']);
    
    if($check){
        echo "yes";
    }
    else{
        echo "no";
    }
?>