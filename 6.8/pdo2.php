<?php

    $host = "127.0.0.1";
    $db = 'php2102';
    $user = 'root';
    $pass = 'root';
    $link = new PDO("mysql:host={$host};dbname={$db}",$user,$pass);
    var_dump($link);
    echo "<hr>";

    // 预处理 ? 占位符
    $sql = "select user_id,user_name from p_users where user_id = ?";
    echo $sql;
    // 预处理
    $stmt = $link -> prepare($sql);    // 执行预处理函数
    $id = $_GET['id'];
    $rows = $stmt->execute([$id]);
    var_dump($rows);
