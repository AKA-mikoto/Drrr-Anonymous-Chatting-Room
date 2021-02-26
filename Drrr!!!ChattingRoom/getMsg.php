<?php
    @require_once("./inc/ChattingRoomSQL.inc.php");    
    
    session_start();
    
    $msgResult = mysqli_query($conn, "SELECT * FROM `message` ORDER BY timestamp ASC");
    
    while($msgInfo = mysqli_fetch_array($msgResult)) { // 遍历数据库
        if($msgInfo[4] > $_SESSION['time']) { // 如果消息记录的时间戳大于上次读取的时间戳
            if($msgInfo[0]) { // type 字段为 1 代表用户聊天消息
                echo "<div class=\"msg_div\">";
                echo "<div class=\"msg_userprof\"><img class=\"msg_icon\" src=". $msgInfo[2]. " /><p class=\"msg_name\">". $msgInfo[1]. "</p></div>";
                echo "<div class=\"msg_box\">". $msgInfo[3]. "</div>";
                echo "</div>";
            }
            else { // type 字段为 0 代表提示消息
                echo "<p class=\"promptMsg\">";
                echo $msgInfo[3];
                echo "</p>";
            }
            $_SESSION['time'] = $msgInfo[4];
        }
    }
?>