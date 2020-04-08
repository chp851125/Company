<?php
    require_once '../mysqli_connect.php';
    require_once '../function.php';
    $check = check_account($_POST['n']);
    
    if($check){
        echo "yes";
    }
    else{
        echo "no";
    }
?>