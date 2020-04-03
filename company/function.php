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
    $sql = "SELECT * FROM article WHERE publish='1' AND id={$id}";
    $query = $_SESSION['$link']->query($sql);
    if($query){
        if(mysqil_num_rows($query) == 1){
            $result = mysqli_fetch_assoc($query);
        }
    }
    else{
        echo "{$sql}語法請求失敗:<br>" .mysqli_error($_SESSION['linkk']);
    }
    return $result;
}
?>