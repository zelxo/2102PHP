<?php
    include "../include.php";


    echo "接收到的get传参：" . $_GET['name'];

    $get = $_GET['name'];
    echo "<br>";

    $sql = "select user_id,user_name from p_users where user_name = '{$get} '";
    echo    $sql;
    $query = mysqli_query($link,$sql);
    $rows = mysqli_fetch_all($query,MYSQLI_ASSOC);
    echo "<pre>";
    print_r($rows);
    echo "</pre>";