<?php 
@session_start();

function get_publish_article(){
    $datas = array();
    $sql="SELECT * FROM article WHERE publish ='1'";
    $query = $_SESSION['$link']->query($sql);
    if($query){
        if(mysqli_num_rows($query) > 0){
            while($row = mysqli_fetch_assoc($query)){
                $datas[]=$row;
            }
        }
    }
    else{
       echo "{$sql}語法請求失敗<br>" .mysqli_error($_SESSION['link']);
    }
    return $datas;
}

function get_all_article(){
    $datas = array();
    $sql="SELECT * FROM article";
    $query = $_SESSION['$link']->query($sql);
    if($query){
        if(mysqli_num_rows($query) > 0){
            while($row = mysqli_fetch_assoc($query)){
                $datas[]=$row;
            }
        }
    }
    else{
        echo "{$sql}語法請求失敗<br>" .mysqli_error($_SESSION['link']);
    }
    return $datas;
}

function get_all_work(){
    $datas = array();
    $sql="SELECT * FROM work";
    $query = $_SESSION['$link']->query($sql);
    if($query){
        if(mysqli_num_rows($query) > 0){
            while($row = mysqli_fetch_assoc($query)){
                $datas[]=$row;
            }
        }
    }
    else{
        echo "{$sql}語法請求失敗<br>" .mysqli_error($_SESSION['link']);
    }
    return $datas;
}

function get_all_member(){
    $datas = array();
    $sql="SELECT * FROM user";
    $query = $_SESSION['$link']->query($sql);
    if($query){
        if(mysqli_num_rows($query) > 0){
            while($row = mysqli_fetch_assoc($query)){
                $datas[]=$row;
            }
        }
    }
    else{
        echo "{$sql}語法請求失敗<br>" .mysqli_error($_SESSION['link']);
    }
    return $datas;
}

function get_article($id){
    $result = null;
    $sql = "SELECT * FROM article WHERE publish='1' AND id='{$id}'";
    $query = $_SESSION['$link']->query($sql);
    if($query){
        if(mysqli_num_rows($query) == 1){
            $result = mysqli_fetch_assoc($query);
        }
    }
    else{
        echo "{$sql}語法請求失敗:<br>" .mysqli_error($_SESSION['link']);
    }
    return $result;
}

function get_edit_article($id){
    $result = null;
    $sql = "SELECT * FROM article WHERE id='{$id}'";
    $query = $_SESSION['$link']->query($sql);
    if($query){
        if(mysqli_num_rows($query) == 1){
            $result = mysqli_fetch_assoc($query);
        }
    }
    else{
        echo "{$sql}語法請求失敗:<br>" .mysqli_error($_SESSION['link']);
    }
    return $result;
}


function get_publish_work(){
    $datas = array();
    $sql = "SELECT * FROM work WHERE publish='1'";
    $query = $_SESSION['$link']->query($sql);
    if($query){
        if(mysqli_num_rows($query)>0){
            while($row = mysqli_fetch_assoc($query)){
                $datas[]=$row;
            }
        }
    }
    else {
        "{$sql}語法請求失敗:<br>".mysqli_connect_error($_SESSION['link']);
    }
    return $datas;
}

function get_work($id){
   $result = null;
   $sql = "SELECT * FROM work WHERE publish='1' AND id='{$id}'";
   $query = $_SESSION['$link']->query($sql);
   if($query){
       if(mysqli_num_rows($query) == 1){
           $result = mysqli_fetch_assoc($query);
       }
   }
   else{
       echo "{$sql}語法請求失敗:<br>" .mysqli_connect_error($_SESSION['link']);
   }
   return $result;
}

function get_edit_work($id){
    $result = null;
    $sql = "SELECT * FROM work WHERE id='{$id}'";
    $query = $_SESSION['$link']->query($sql);
    if($query){
        if(mysqli_num_rows($query) == 1){
            $result = mysqli_fetch_assoc($query);
        }
    }
    else{
        echo "{$sql}語法請求失敗:<br>" .mysqli_connect_error($_SESSION['link']);
    }
    return $result;
}

function get_user($id){
    $result = null;
    $sql = "SELECT * FROM user WHERE id='{$id}'";
    $query = $_SESSION['$link']->query($sql);
    if($query){
        if(mysqli_num_rows($query) == 1){
            $result = mysqli_fetch_assoc($query);
        }
    }
    else{
        echo "{$sql}語法請求失敗:<br>" .mysqli_connect_error($_SESSION['link']);
    }
    return $result;
}

function check_account($account){
    $result = null;
    $sql = "SELECT * FROM user WHERE account = '{$account}'";
    $query = $_SESSION['$link']->query($sql);
    if($query){
        if(mysqli_num_rows($query) >= 1 ){
            $result = true;
        }
    }
    else {
        echo "{$sql}語法請求失敗:<br>" .mysqli_connect_error($_SESSION['link']);
    }
    return $result;
}

function add_user($account, $password, $name){
    $result = null;
    //$password = md5($password);
    $sql= "INSERT INTO user (account, password, name) VALUES('{$account}', '{$password}', '{$name}')";
    $query = $_SESSION['$link']->query($sql);
    if($query){
        if(mysqli_affected_rows($_SESSION['$link']) == 1){
            $result = true;
        }
    }
    else {
        echo "{$sql}語法請求失敗:<br>" .mysqli_connect_error($_SESSION['link']);
    }
    return $result;
}

function verify_user($account, $password){
    $result = null;
    $password = md5($password);
    $sql = "SELECT * FROM user WHERE account = '{$account}' AND password = '{$password}'";
    $query = $_SESSION['$link']->query($sql);
    if($query){
        if(mysqli_num_rows($query) >= 1){
            $user = mysqli_fetch_assoc($query);
            $_SESSION['is_login'] = true;
            $_SESSION['login_user_id'] = $user['id'];
            $result = true;
        }
    }
    else{
        echo "{$sql}語法請求失敗:<br>" .mysqli_connect_error($_SESSION['link']);
    }
    return $result;
}

function add_article($title, $category, $content, $publish){
    $result = null;
    $create_date = date("Y-m-d H:i:s");
    $creater_id = $_SESSION['login_user_id'];
    $sql= "INSERT INTO article (title, category, content, publish, create_date, creater_id) 
    VALUES('{$title}', '{$category}', '{$content}', '{$publish}', '{$create_date}', '{$creater_id}')";
    $query = $_SESSION['$link']->query($sql);
    if($query){
        if(mysqli_affected_rows($_SESSION['$link']) == 1){
            $result = true;
        }
    }
    else {
        echo "{$sql}語法請求失敗:<br>" .mysqli_connect_error($_SESSION['link']);
    }
    return $result;
}

function add_work($introduce, $image_path, $video_path, $publish){
    $result = null;
    $upload_date = date("Y-m-d H:i:s");
    $create_userid = $_SESSION['login_user_id'];
    
    $image_path_value = "'{$image_path}'"; //image_path如果為空值，以NULL儲存
    if($image_path == ''){
        $image_path_value = "NULL";
    }
    $video_path_value = "'{$video_path}'"; //video_path如果為空值，以NULL儲存
    if($video_path == ''){
        $video_path_value = "NULL";
    }
    
    $sql= "INSERT INTO work (introduce, image_path, video_path, publish, upload_date, create_userid)
    VALUES('{$introduce}', {$image_path_value}, {$video_path_value}, '{$publish}', '{$upload_date}', '{$create_userid}')";
    $query = $_SESSION['$link']->query($sql);
    //echo ($sql);
    if($query){
        if(mysqli_affected_rows($_SESSION['$link']) == 1){
            $result = true;
        }
    }
    else {
        echo "{$sql}語法請求失敗:<br>" .mysqli_connect_error($_SESSION['link']);
    }
    return $result;
}

function update_article($id, $title, $category, $content, $publish){
    $result = null;
    $modify_date = date("Y-m-d H:i:s");
    $sql= "UPDATE article SET title='{$title}', category='{$category}', content='{$content}', publish='{$publish}', modify_date='{$modify_date}'
           WHERE id=$id";
    $query = $_SESSION['$link']->query($sql);
    if($query){
        if(mysqli_affected_rows($_SESSION['$link']) == 1){
            $result = true;
        }
    }
    else {
        echo "{$sql}語法請求失敗:<br>" .mysqli_connect_error($_SESSION['link']);
    }
    return $result;
}

//更新作品
function update_work($id, $introduce, $image_path, $video_path, $publish){
    $result = null;
    $upload_date = date("Y-m-d H:i:s");
    
    $work = get_edit_work($id);
    //新增圖片不同，將原圖刪除
    if(file_exists("../".$work['image_path'])){
        if($image_path != $work['image_path']){
            unlink("../".$work['image_path']);
        }
    }
    if(file_exists("../".$work['video_path'])){
        if($video_path != $work['video_path']){
            unlink("../".$work['video_path']);
        }
    }
    
    //image_path or video_path 為空處理
    $image_path_sql = "image_path = '{$image_path}'";
    if($image_path == ''){
        $image_path_sql = "image_path = NULL";
    }
    
    $video_path_sql = "video_path = '{$video_path}'";
    if($video_path == ''){
        $video_path_sql = "video_path = NULL";
    }
    
    $sql= "UPDATE work SET introduce='{$introduce}', {$image_path_sql}, {$video_path_sql}, publish='${publish}', upload_date='{$upload_date}'
           WHERE id=$id";
    $query = $_SESSION['$link']->query($sql);
    if($query){
        if(mysqli_affected_rows($_SESSION['$link']) == 1){
            $result = true;
        }
    }
    else {
        echo "{$sql}語法請求失敗:<br>" .mysqli_connect_error($_SESSION['link']);
    }
    return $result;
}

function update_user($id, $account, $password, $name){
    $result = null;
    $password_sql='';
    if($password != ''){
        $password = md5($password);
        $password_sql = "password='{$password}',";
    }
    $sql= "UPDATE user SET account='{$account}', {$password_sql} name='{$name}'
           WHERE id=$id";
    $query = $_SESSION['$link']->query($sql);
    if($query){
        if(mysqli_affected_rows($_SESSION['$link']) == 1){
            $result = true;
        }
    }
    else {
        echo "{$sql}語法請求失敗:<br>" .mysqli_connect_error($_SESSION['link']);
    }
    return $result;
}

function del_article($id){
    $result = null;
    $sql= "DELETE FROM article WHERE id = '{$id}'";
    $query = $_SESSION['$link']->query($sql);
    if($query){
        if(mysqli_affected_rows($_SESSION['$link']) == 1){
            $result = true;
        }
    }
    else {
        echo "{$sql}語法請求失敗:<br>" .mysqli_connect_error($_SESSION['link']);
    }
    return $result;
}

function del_member($id){
    $result = null;
    $sql= "DELETE FROM user WHERE id = '{$id}'";
    $query = $_SESSION['$link']->query($sql);
    if($query){
        if(mysqli_affected_rows($_SESSION['$link']) == 1){
            $result = true;
        }
    }
    else {
        echo "{$sql}語法請求失敗:<br>" .mysqli_connect_error($_SESSION['link']);
    }
    return $result;
}

?>