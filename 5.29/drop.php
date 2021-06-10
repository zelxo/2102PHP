<?php
    // 接收GET传参
    $id = $_GET['id'];
    // 链接数据库
    include "include.php";


    // 删除在login表中 userid为GET传参过来的值
    $sql = "delete from login_history where userId = {$id}";
    // 准备语句
    $stmt = mysqli_prepare($link,$sql);
    // 执行语句
    $res = mysqli_stmt_execute($stmt);

    // 如果$query为TRUE时删除成功   跳转到登录后的PHP页面
    if ($stmt->affected_rows > 0 ){
        echo "删除成功";
        header("Refresh:2;url=login.php");
    }else{
        echo "数据不存在，删除失败";
        header("Refresh:2;url=login.php");
    }