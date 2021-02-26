<?php
    @require_once("./inc/ChattingRoomSQL.inc.php");
    
    session_start();
    
    $msg = htmlspecialchars($_POST['message']);
    
    $result = mysqli_query($conn, "SELECT * FROM `message`");
    
    if(mysqli_num_rows($result) >= 10) { // 如果记录数大于 10 条，则删除最早的一条消息记录
        $sql = "DELETE FROM `message` ORDER BY timestamp ASC LIMIT 1";
        mysqli_query($conn, $sql);
    }
    $sql = "INSERT INTO `message` (nickname, icon, message) VALUES('{$_SESSION['name']}', '{$_SESSION['iconAdd']}', '{$msg}')";
    mysqli_query($conn, $sql);
?>