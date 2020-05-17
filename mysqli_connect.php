<?php
@session_start();

$db_server="localhost";
$db_user="root";
$db_password="000000";
$db_name="company";

$_SESSION['$link'] = mysqli_connect($db_server, $db_user, $db_password, $db_name);

if($_SESSION['$link']){
    mysqli_query($_SESSION['$link'], "SET NAMES utf8");
    //echo "已連線資料庫";
}
else{
    echo '無法連線資料庫<br>'.mysqli_connect_error();
}
?>