<?php
    @require_once("./inc/ChattingRoomSQL.inc.php");
    
    session_start();
    
    $message = "-- ". $_SESSION['name']. " has entered the room --";
    
    // 向数据库中插入用户进入提示信息
    mysqli_query($conn, "INSERT INTO `message` (type, nickname, message) VALUES('0', '{$_SESSION['name']}', '{$message}')");
?>