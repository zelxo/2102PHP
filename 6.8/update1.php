<?php

    $host = "127.0.0.1";
    $db = 'php2102';
    $user = 'root';
    $pass = 'root';
    $link = new PDO("mysql:host={$host};dbname={$db}",$user,$pass);

    $id = $_POST['shopId'];
    $name = $_POST['shopName'];
    $shopNum = $_POST['shopNum'];
    $shopPrice = $_POST['shopPrice'];

    $sql = "update p_goods set goods_name='{$name}',goods_number='{$shopNum}',shop_price='{$shopPrice}    ' where goods_id={$id}";

    $stmt = $link->prepare($sql);
    var_dump($stmt);
    echo "<br>";
    $res = $stmt->execute();
    var_dump($res);

    header("Location:PDO_LIMIT.php");