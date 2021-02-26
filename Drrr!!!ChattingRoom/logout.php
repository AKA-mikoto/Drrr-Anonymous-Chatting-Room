<?php
    @require_once("./inc/ChattingRoomSQL.inc.php");
    
    session_start();
    
    $message = "-- ". $_SESSION['name']. " has left the room --";
    
    // 向数据库中插入用户登出提示信息
    mysqli_query($conn, "INSERT INTO `message` (type, nickname, message) VALUES('0', '{$_SESSION['name']}', '{$message}')");
    
    mysqli_query($conn, "DELETE FROM `user` WHERE id = {$_SESSION['id']}"); // 删除数据库中该用户的记录
?>