<?php

    $host = "127.0.0.1";
    $db = 'php2102';
    $user = 'root';
    $pass = 'root';
    $link = new PDO("mysql:host={$host};dbname={$db}",$user,$pass);
    var_dump($link);
    echo "<hr>";
    $id = $_GET['id'];

    $sql = "select user_id,user_name from p_users where user_id = {$id}";

    // 查询
    $stmt = $link->query($sql);
    var_dump($stmt);
    echo "<hr>";
    // 获取数据
    $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
    echo "<pre>";
    print_r($rows);
    echo "</pre>";