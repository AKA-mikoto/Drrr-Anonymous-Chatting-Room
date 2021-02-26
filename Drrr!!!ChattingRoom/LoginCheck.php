<?php
    @require_once("./inc/ChattingRoomSQL.inc.php");
    
    session_start(); // 开启 SESSION 功能
    
    $loginstatus = 0; // 登录检测状态值
    
    $sqlResult = mysqli_query($conn, "SELECT * FROM `user`");
    
    $_SESSION['name'] = htmlspecialchars(strtolower(trim($_GET['nickname']))); // 将输入的用户名去除前后空白并转小写再转换成合适的 HTML 格式后存于 SESSION 中
    
    // ---------------------------------- 登录检查 ----------------------------------
    if($_SESSION['name'] == '') { // 检查名称是否仅含空白
        $loginstatus = -1;
        echo "Username illegal! Please input another username. ";
    }
    elseif(mysqli_num_rows($sqlResult) >= 19) { // 检查人数是否已达上限
        $loginstatus = -2;
        echo "Chatting room has filled up. Please login agine for a while. ";
    }
    else
        while($user = mysqli_fetch_array($sqlResult)) { // 遍历数据库记录
            if(in_array($_SESSION['name'], $user)) { // 检查是否已有相同名称
                $loginstatus = -3;
                echo "The username has been used. Please input another username. ";
                break;
            }
        }
    
    // -------------------------------- 以上检查均通过 ---------------------------------
    if(!$loginstatus) {
        $_SESSION['iconAdd'] = './resource/icons/'. strval(rand(1, 19)). '.png'; // 随机生成头像路径并存于 SESSION 中
        
        $addUser = "INSERT INTO `user` (nickname, icon) VALUES ('{$_SESSION['name']}', '{$_SESSION['iconAdd']}')"; // 向数据库中添加记录的 SQL 语句
        mysqli_query($conn, $addUser); // 在数据库中添加用户记录
        
        $userInfo = mysqli_fetch_row(mysqli_query($conn, "SELECT * FROM `user` WHERE nickname = '{$_SESSION['name']}'")); // 取得该用户在数据库中的信息
        $_SESSION['id'] = $userInfo[0]; // 将该用户的 userid 存储在 SESSION 中
        
        echo "Login success. Entering now, please wait for a while. ";
    }
?>