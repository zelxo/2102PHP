<?php
    include "../include.php";
    $shop = $_POST;
    echo "<pre>";
    print_r($shop);
    echo "</pre>";


    $sql = "insert into p_goods (`goods_name`,`shop_price`,`goods_number`,`goods_desc`) 
            values ('{$shop['shopName']}','{$shop['price']}','{$shop['shopNumber']}','{$shop['desc']}')";

    $stmt = mysqli_prepare($link,$sql);

    $result = mysqli_stmt_execute($stmt);

    header('Location:02.list.php');