<?php
    // 个人中心页面

    // 开启会话
    session_start();

    // 打印出接收到的用户信息
    echo "<pre>";
    print_r($_SESSION);
    echo "</pre>";

    // 将接收到的用户信息的userName值赋给一个变量
    $username = $_SESSION['userName'];
    // 将接收的变量放在个人界面语句中
    echo "你好 {$username} ,欢迎回来";