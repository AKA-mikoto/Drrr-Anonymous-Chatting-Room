<?php
    header('Content-type:text/html; charset="utf-8"');
    
    @require_once("./inc/ChattingRoomSQL.inc.php");
    
    $onlineUser = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM user")); // 获取当前在线用户数
?>

<!DOCTYPE>
<html>
<head>
    <meta charset="utf-8" />
    <title>Welcome to DOLLARS</title>
    <link rel="stylesheet" type="text/css" href="./css/Login.css" />
    <script type="text/javascript">
        <!---------------------- 使用 AJAX 交互登录检查脚本 ----------------------->
        function check() {
            var str = document.getElementById("nickname").value; // 获取用户输入的昵称
            
            var xmlhttp;
            if(window.XMLHttpRequest) {
                xmlhttp = new XMLHttpRequest(); // IE7+, Firefox, Chrome, Opera, Safari
            }
            else {
                xmlhttp = new ActiveXObject("Microsoft.XMLHTTP"); // IE6, IE5
            }
            
            xmlhttp.onreadystatechange = function() {
                if(xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                    document.getElementById("msg").innerHTML = xmlhttp.responseText; // 从 PHP 脚本获取回显信息
                }
                if(xmlhttp.responseText.indexOf("success") != -1) { // 如果回显信息中包含“success”则触发
                    window.location.href = "./ChattingRoom.php"; // 跳转到聊天室页面
                }
            }
            xmlhttp.open("GET", "./LoginCheck.php?nickname=" + str, true); // 通过 GET 方式直接将参数添加在 URL 后传入 PHP 脚本
            xmlhttp.send();
        }
    </script>
</head>
<body>
    <div id="logo"></div>
    
    <div id="loginDiv">
        <span id="loginName">USERNAME：<input type="text" id="nickname" name="nickname" /></span>
        <br />
        <span id="msg" name="msg"></span>
        <br />
        <button id="enterButton" type="submit" onclick="check();">Enter</button>
    </div>
    <p id="onlineUser"><?php echo $onlineUser; ?> people online now.</p>
</body>
</html>