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
?>