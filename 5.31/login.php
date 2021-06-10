<?php
    // 开启会话
    session_start();

    // 获取post传参
    $username = trim($_POST['username']);
    $pass = trim($_POST['pass']);

    // 连接数据库

    $link = new mysqli('localhost','root','root','php2102');
    $sql = "select * from reg where username = '{$username}'";


    $result = mysqli_query($link,$sql);
    $row = mysqli_fetch_all($result,MYSQLI_ASSOC);
    echo "<pre>";
    print_r($row[0]);
    echo "</pre>";

    echo "<br>";

    // 验证密码
    $p = password_verify($pass,$row[0]['userPass']);
    if ($p){
        echo "登录成功";

        // 将用户信息保存到会话中
        $_SESSION['userName'] = $row[0]['userName'];

    }else{
        echo "密码错误";
    }