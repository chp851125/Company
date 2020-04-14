<?php
   //print_r($_FILES);
   //echo "<hr>";
   //print_r($_POST);
   
if(file_exists($_FILES['file']['tmp_name'])){
    $traget_folder = $_POST['save_path'];
    $file_name = $_FILES['file']['name'];
    
    if(move_uploaded_file($_FILES['file']['tmp_name'], "../". $traget_folder . $file_name)){
        echo "yes";
    }
    else{
        echo "檔案上傳失敗，請確認{$_POST['save_path']}資料夾可寫入";
    }
    
}
else{
    echo "暫存檔不存在，上傳失敗";
}

?>