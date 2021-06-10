<?php
    // 开启会话
    session_start();

    $host = "127.0.0.1";
    $db = 'php2102';
    $user = 'root';
    $pass = 'root';
    $link = new PDO("mysql:host={$host};dbname={$db}",$user,$pass);

    $cont = $_COOKIE['uid'];

    $sql = "select * from p_users where user_id = '{$cont}'";

    // 查询
    $stmt = $link->query($sql);
    // 执行
    $res = $stmt->execute();

//    $rows = $stmt->fetchAll([]);
