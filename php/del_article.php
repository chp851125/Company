<?php
    require_once '../mysqli_connect.php';
    require_once '../function.php';
    $check = del_article($_POST['id']);
    
    if($check){
        echo "yes";
    }
    else{
        echo "no";
    }
?>