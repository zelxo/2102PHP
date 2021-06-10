<?php
    $host = "127.0.0.1";
    $db = 'php2102';
    $user = 'root';
    $pass = 'root';
    $link = new PDO("mysql:host={$host};dbname={$db}",$user,$pass);

    $sql = "delete from p_goods where goods_id={$_GET['id']}";

    $stmt = $link->prepare($sql);

    $res = $stmt->execute();

    var_dump($res);

    header('Location:PDO_LIMIT.php');