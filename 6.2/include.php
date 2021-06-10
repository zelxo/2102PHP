<?php
    // 获取mysql链接的四个参数
    $host = "127.0.0.1";    // 获取主机地址
    $user = "root";         // 获取数据库用户名
    $pass = "root";         // 数据库密码
    $db = "php2102";        // 使用的数据库名字


    // 链接mysql数据库
    $link = new mysqli($host, $user, $pass, $db);