<?php
    $Name = trim($_POST['Name']);
    $add = trim($_POST['add']);

    $localhost = "127.0.0.1";
    $name = "root";
    $pass = "root";
    $db = "php2102";

    $link = new mysqli($localhost,$name,$pass,$db);

    if (!empty($Name) || !empty($add)){
        $sql = "insert into ks (`题库名称`,`题库添加人`,`题库添加时间`)
            values ('{$Name}','{$add}',NOW())";
        $stmt = mysqli_prepare($link,$sql);
        $result = mysqli_stmt_execute($stmt);

        echo "添加成功,正在跳转展示页面";
        header('Refresh:2;url=show.php');
    }else{
        die("输入内容不能为空");
    }

