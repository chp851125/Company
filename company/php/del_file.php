<?php
if(file_exists("../" . $_POST['file'])){
    if(unlink("../" . $_POST['file'])){
        echo "yes";
    }
    else{
        echo "刪除失敗";
    }
}
else{
    echo "檔案不存在";
}

?>