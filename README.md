# Drrr-Anonymous-Chatting-Room
这是一个主要由 PHP 开发的网页匿名聊天室，是我大学期末课程设计的作品，主要灵感来源于日本动画《无头骑士异闻录》。

编写语言包括 HTML、CSS、JavaScript、PHP、SQL，测试环境为 WAMP，主要技术有 AJAX。


**项目文件说明：**
./css 文件夹：包含整个项目的 css 文件

./database_sql 文件夹：导入数据库需要用到的 sql 文件

./inc 文件夹：包含需要被其他脚本引用的连接数据库用的头文件

./resource 文件夹：包含 19 张以数字命名的头像和 1 张背景图

login.php：聊天室登录页面，登陆成功后跳转到聊天室页面

loginCheck.php：检测 login.php 中用户名是否合法的脚本

enter.php：浏览器从 login.php 跳转到 ChattingRoom.php 时自动触发，向聊天室发送一条提示新用户进入聊天室的消息

ChattingRoom.php：聊天室主页面

subMsg.php：用户发送聊天信息时触发，把聊天信息存入数据库中

getMsg.php：ChattingRoom.php 每隔1秒触发该脚本，从数据库中获取最近的聊天记录

logout.php：用户退出聊天室时自动触发，删除数据库 user 表中关于该退出用户的信息


**说明：**

1.首先在 MySQL 中创建一个名为“chattingroom”的数据库，然后导入 ./database_sql/chattingroom.sql 文件


2.在 ./inc/ChattingRoomSQL.inc.php 脚本中修改你的数据库用户名和密码。

3.挂载到 WAMP 环境下

4.完成


鉴于本人水平有限，有些已知 bug 没有解决（比如输入的聊天信息过长也只会显示一行、数据库中提示信息删不掉等），大佬们有兴趣可以自己改改


**联系邮箱：**yuki_judai@126.com



This a anonymous chatting room project coded mainly by PHP as my final course design，the inspiration comes from Japanese animation "デュラララ!!".

The programming languages including HTML, CSS, JavaScript, PHP, SQL, testing environment is WAMP, AJAX is the main technique that I wanted to learn.

**Project file illustrate:**

./css folder: Including all the CSS file that the project needed

./database_sql folder: A sql file which was necessary when importing database

./inc folder: A headfile which is needed to be included by other scripts

./resource folder: Including 19 head icons, and 1 background picture

login.php: The login page of chatting room, once you login successfully, this page will jump to chatting room page

loginCheck.php: Checking if the username inputted in login.php is legal

enter.php: Automatically trigger when jumping from login.php to ChattingRoom.php, send a message which prompts a new user has join in to the chatting room

ChattingRoom.php: The main page of this project

subMsg.php: When anyone send a message, this script would store the message into database

getMsg.php: This script would be trigger 1 time per second by ChattingRoom.php, used to acquire the latest message from database

logout.php: Automatically trigger when a user logout from chatting room, deletes the information of this user in the user table in database.


**Usage:**

1.firstly, creating a database named "chattingroom", then import the file "./database_sql/chattingroom.sql"

2.alter the username and password to yours database in "./inc/ChattingRoomSQL.inc.php"

3.mount in WAMP environment

4.done


Since my poor programming skill, some bugs were not solved(like: the message would only displayed in one line even if you input long text, the prompt message can't be deleted automatically), you can fix these bugs if you have time and interest.


**My email:** yuki_judai@126.com
