<?php
    $localhost = "127.0.0.1";
    $name = "root";
    $pass = "root";
    $db = "php2102";

    $link = new mysqli($localhost,$name,$pass,$db);


    $sql = "SELECT * FROM ks";
    $query = mysqli_query($link,$sql);
    $res = mysqli_fetch_all($query,MYSQLI_ASSOC);
?>

<table border="1">
    <thead>
        <tr>
            <th>题库id</th>
            <th>题库名称</th>
            <th>题库添加人</th>
            <th>题库添加时间</th>
            <th>操作</th>
        </tr>
    </thead>
    <tbody>
        <?php
            foreach ($res as $k => $v){
                echo    "<tr>";
                echo    "<td>{$v['q_id']}</td>";
                echo    "<td>{$v['题库名称']}</td>";
                echo    "<td>{$v['题库添加人']}</td>";
                echo    "<td>{$v['题库添加时间']}</td>";
                echo    "<td><a href='del.php?id={$v['q_id']}'>删除</a> || <a href='#'>修改</a></td>";
                echo    "</tr>";
            }
        ?>

    </tbody>
</table>
