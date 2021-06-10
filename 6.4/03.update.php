<?php
    include "../include.php";
    session_start();

    $update = $_POST;
    $goods_id_se=$_SESSION['goods_id'];

    echo "<pre>";
    print_r($goods_id_se);
    echo "</pre>";

    $updateSql = "update p_goods set goods_name='{$update['shopName']}' where goods_id='{$goods_id_se}' ";

    $updateStmt = mysqli_prepare($link,$updateSql);

    $updateRes = mysqli_stmt_execute($updateStmt);

    header('Location:02.list.php');
?>