<?php
    $dbServer = "localhost";
    $dbUser = "root";
    $dbPassword = "2333";
    $dbName = "chattingroom";
    
    $conn = @mysqli_connect($dbServer, $dbUser, $dbPassword, $dbName);
    
    if(mysqli_connect_errno($conn))
        die("无法连接到数据库服务器");
    
    mysqli_set_charset($conn, "utf8");
?>