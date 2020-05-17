<?php
    require_once '../mysqli_connect.php';
    require_once '../function.php';
    $check = add_user($_POST['account'], $_POST['password'], $_POST['name']);
    
    if($check){
        echo "yes";
    }
    else{
        echo "no";
    }
?>