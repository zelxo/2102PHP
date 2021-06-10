<?php
    // 使用mysqli链接MySQL
    $host = "localhost";            // mysql的主机地址
    $user = "root";                 // 数据库的用户名
    $pass = "root";                 // 数据库密码
    $db = "php2102";                // 使用的数据库

    // mysqli函数的参数   第一个为主机地址   第二个为数据库用户名  第三个为数据库密码   第四个为使用的数据库
    $link = new mysqli("$host","$user","$pass","$db");


    // 向数据库中写入数据
    $sql = "insert into users (`username`,`email`,`mobile`,`password`) 
            values ('zhangsan','zhangsan@qq.com','15333726117','xxx')";


    // 准备阶段
    $stmt = mysqli_prepare($link,$sql);
    var_dump($stmt);
    echo "<hr>";
    echo "<pre>";
    print_r($stmt);
    echo "</pre>";


    // 执行阶段
    mysqli_stmt_execute($stmt);
    echo "<pre>";
    print_r($stmt);
    echo "</pre>";