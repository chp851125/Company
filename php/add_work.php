<?php
    require_once '../mysqli_connect.php';
    require_once '../function.php';
    $check = add_work($_POST['title'], $_POST['introduce'], $_POST['image_path'], $_POST['video_path'], $_POST['publish']);
    
    if($check){
        echo "yes";
    }
    else{
        echo "no";
    }
?>