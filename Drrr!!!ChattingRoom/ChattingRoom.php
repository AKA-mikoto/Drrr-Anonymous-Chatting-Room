<?php
    @require_once("./inc/ChattingRoomSQL.inc.php");
    
    session_start();
    
    date_default_timezone_set('Asia/Shanghai');  // 设置时区为上海
    
    $_SESSION['time'] = date('Y-m-d H:i:s', time());  // 保存进入页面时的时间戳
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>Drrr!!!ChattingRoom</title>
    <link rel="stylesheet" type="text/css" href="./css/ChattingRoom.css" />
    <link rel="stylesheet" type="text/css" href="./css/talk_box.css" />
    <script type="text/javascript">
        // ----------------------------- 用户进入聊天室时触发 enter 函数 --------------------------------
        function enter() {
            var xmlhttp;
            if (window.XMLHttpRequest) {
                xmlhttp = new XMLHttpRequest();  // IE7+, Firefox, Chrome, Opera, Safari
            }
            else {
                xmlhttp = new ActiveXObject("Microsoft.XMLHTTP"); // IE6, IE5
            }
            
            xmlhttp.open("GET", "./enter.php", true);
            xmlhttp.send();
        }
        
        // ----------------------------- 用户离开聊天室时触发 logout 函数 --------------------------------
        function logout() {
            var xmlhttp;
            if (window.XMLHttpRequest) {
                xmlhttp = new XMLHttpRequest();  // IE7+, Firefox, Chrome, Opera, Safari
            }
            else {
                xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");  // IE6, IE5
            }
            
            xmlhttp.onreadystatechange = function() {
                if(xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                    document.location.href = "./Login.php";  // 返回登录页面
                }
            }
            xmlhttp.open("GET", "./logout.php", false);
            xmlhttp.send();
        }
    </script>
    <script type="text/javascript">
        // ----------------------------------------- 提交消息 --------------------------------------------
        function postMessage(msg) {
            if(msg == '')
                return null;
            
            var xmlhttp;
            if(window.XMLHttpRequest) {
                xmlhttp = new XMLHttpRequest();  // IE7+, Firefox, Chrome, Opera, Safari
            }
            else {
                xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");  // IE6, IE5
            }
            
            xmlhttp.onreadystatechange = function() {
                if(xmlhttp.readyState == 4 && xmlhttp.status == 200)
                    document.getElementById("message").value = '';  // 清空文本区
            }
            xmlhttp.open("POST", "SubMsg.php", true);
            xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            xmlhttp.send("message=" + msg);
        }
    </script>
    <script type="text/javascript">
        // ----------------------------------------- 获取消息 --------------------------------------------
        function getMessage() {
            var xmlhttp;
            if(window.XMLHttpRequest) {
                xmlhttp = new XMLHttpRequest();
            }
            else {
                xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
            }
            
            xmlhttp.onreadystatechange = function() {
                if(xmlhttp.readyState == 4 && xmlhttp.status == 200)
                    document.getElementById("talk_box").innerHTML = xmlhttp.responseText + document.getElementById("talk_box").innerHTML;
            }
            xmlhttp.open("GET", "./getMsg.php", true);
            xmlhttp.send();
        }
    </script>
</head>
<body onload="enter();setInterval(getMessage, 1000);" onunload="logout();">
    <div id="top">
        <div id="roominfo">
            <h2 id="roomname">DOLLARS</h2>
            <button type="button" onclick="logout();">logout</button>
        </div>
        <div id="message_box">
            <div id="userprof">
                <img id="usericon" src="<?php echo $_SESSION['iconAdd']; ?>" />
                <p id="username"><?php echo $_SESSION['name']; ?></p>
            </div>
            <textarea id="message" name="message"></textarea>
            <button id="submit" type="button" onclick="postMessage(document.getElementById('message').value);">POST!</button>
        </div>
    </div>
    <div id="content">
        <div id="talk_box">
        </div>
    </div>
</body>
</html>