<?php
    header("Content-type:text/html;charset=utf-8");




    // 处理变量
    $sname = trim($_POST['sname']);
    $age = intval($_POST['age']);
    $site = trim($_POST['site']);

    // 链接mysql
    $localhost = "127.0.0.1";
    $name = "root";
    $pass = "root";
    $db = "p2102";

    $link = new mysqli($localhost,$name,$pass,$db);


    // aql语句  添加数据到对应字段
    $sql = "insert into student(`stuName`,`stuAge`,`stuSite`) 
                values ('{$sname}','{$age}','{$site}')";

    // 准备阶段
    $stmt = mysqli_prepare($link,$sql);

    // 执行阶段
    mysqli_stmt_execute($stmt);


    // 获取数据库中的记录
    $sql = "select * from student";
    // 查找数据库中的表
    $result = mysqli_query($link,$sql);
    // 查找表中的数据
    $rows = mysqli_fetch_all($result,MYSQLI_ASSOC);

    echo "<pre>";
    print_r($rows);
    echo "</pre>";
?>

<table>
    <thead>
        <tr>
            <th>姓名</th>
            <th>年龄</th>
            <th>住址</th>
        </tr>
    </thead>
    <tbody>
        <?php

        foreach ($rows as $k=>$v){
            if ($v['stuAge']>18){
                $age1 = "成年";
            }else{
                $age1 = "未成年";
            }
            echo "<tr>";
            echo "<td>{$v['stuName']}</td>";
            echo "<td>{$age1}</td>";
            echo "<td>{$v['stuSite']}</td>";
            echo "</tr>";
        }
        ?>
    </tbody>
</table>
