<?php
    require_once '../mysqli_connect.php';
    require_once '../function.php';
    $check = add_article($_POST['title'], $_POST['category'], $_POST['content'], $_POST['publish']);
    
    if($check){
        echo "yes";
    }
    else{
        echo "no";
    }
?>