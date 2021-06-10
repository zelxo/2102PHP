<?php
    // 使用mysqli链接MySQL
    $host = "localhost";            // mysql的主机地址
    $user = "root";                 // 数据库的用户名
    $pass = "root";                 // 数据库密码
    $db = "php2102";                // 使用的数据库

    // mysqli函数的参数   第一个为主机地址   第二个为数据库用户名  第三个为数据库密码   第四个为使用的数据库
    $link = new mysqli("$host","$user","$pass","$db");



    // 接收URL参数
    $userId = intval( $_GET['id'] );   // 获取id

    // 获取表中的数据   查看users表的记录
    $sql = "select * from users where userid='".$userId."'";
    echo $sql;die;
    echo "<br>";

    // 执行一个查询   在$link 中查询 $sql的代码
    $result = mysqli_query($link,$sql);


    // 获取记录    MYSQLI_ASSOC参数返回字段列名
    $rows = mysqli_fetch_all($result,MYSQLI_ASSOC);
    echo "<pre>";
    print_r($rows);
    echo "</pre>";