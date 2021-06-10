<?php
    echo "<pre>";
    print_r($_POST);
    echo "</pre>";
    // 使用mysqli链接MySQL
    $host = "localhost";            // mysql的主机地址
    $user = "root";                 // 数据库的用户名
    $pass = "root";                 // 数据库密码
    $db = "php2102";                // 使用的数据库

    // mysqli函数的参数   第一个为主机地址   第二个为数据库用户名  第三个为数据库密码   第四个为使用的数据库
    $link = new mysqli("$host","$user","$pass","$db");


    // 处理变量
    $username = trim($_POST['u_name']);
    $email = trim($_POST['u_email']);
    $tel = trim($_POST['u_tel']);
    $password = trim($_POST['u_pwd1']);


    // sql语句// 值用小括号
    $sql = "insert into users (`username`,`email`,`mobile`,`password`) 
            values ('{$username}','{$email}','{$tel}','{$password}')";

    // 准备阶段   准备执行这个语句
    $stmt = mysqli_prepare($link,$sql);



    // 执行阶段
    $result = mysqli_stmt_execute($stmt);

    if ($result){
        echo "insert  成功";
    }else{
        echo "insert  失败";
    }

