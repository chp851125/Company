<?php
    require_once '../mysqli_connect.php';
    require_once '../function.php';
    $check = update_article($_POST['id'],$_POST['title'], $_POST['category'], $_POST['content'], $_POST['publish']);
    
    if($check){
        echo "yes";
    }
    else{
        echo "no";
    }
?>