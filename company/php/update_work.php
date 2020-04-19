<?php
    require_once '../mysqli_connect.php';
    require_once '../function.php';
    $check = update_work($_POST['id'], $_POST['introduce'], $_POST['image_path'], $_POST['video_path'], $_POST['publish']);
    
    if($check){
        echo "yes";
    }
    else{
        echo "no";
    }
?>