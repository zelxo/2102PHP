
<form action="05.search.php" method="get">
    搜索: <input type="text" name="search" placeholder="请输入关键字">
    <input type="submit">
</form>
<?php
    session_start();
    include "../include.php";


    /*$nu=0;
    $num = intval($_GET['page']);
    if ($num<1){
        $num=1;
    }
    $nu=$num;
    $page = ($num-1)*10;
    echo $nu;*/
//    if ($_POST){
//        $update = $_POST;
//        $goods_id_se=$_SESSION['goods_id'];
//        $updateSql = "update p_goods set goods_name='{$update['shopName']}' where goods_id=$goods_id_se ";
//        $updateStmt = mysqli_prepare($link,$updateSql);
//        $updateRes = mysqli_stmt_execute($updateStmt);
//    }


    // 没有获取到URL传参时默认为1
    if (empty($_GET)){
        $_GET['page'] = 1;
    }
    // 获取到的URL传参小于1时，强行变为1
    if ($_GET['page']<1){
        $_GET['page'] = 1;
    }
    $num = intval($_GET['page']);
    $row_num = 10;
    $page = ($num-1) * $row_num;


    // 链接数据库





    $sql = "select goods_id,goods_name from p_goods ORDER BY goods_id DESC limit {$page},{$row_num}";


    $query = mysqli_query($link,$sql);

    $res = mysqli_fetch_all($query,MYSQLI_ASSOC);

    $sql1 = "select count(goods_id) from p_goods";

    $query1 = mysqli_query($link,$sql1);

    $res1 = mysqli_fetch_array($query1,MYSQLI_ASSOC);


    $count = intval($res1['count(goods_id)']/10);


    echo "<ul>";
    foreach ($res as $k=>$v){
        echo "<li>";
        echo "<a href='content.php?id={$v['goods_id']} '>'{$v['goods_id']}.' '.{$v['goods_name']}'</a>";
        echo "<a href='03.setShop.php?id={$v['goods_id']}'>编辑商品信息</a>";
        echo "</li>";
    }
    echo "</ul>";
    echo $num;
?>



<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>

    <a href="02.list.php?page=1">首页</a>
    <a href="02.list.php?page=<?php
                    if ($num<2){

                        echo $num=1;
                    }else{
                        echo $num-=1;
                        $num+=1;

                    }
    ?>">上一页</a>
    <a href="02.list.php?page=<?php
                    echo $num+=1;
    ?>">下一页</a>
    <a href="02.list.php?page=<?php
                  echo $count;
    ?>">尾页</a>
    <a href="04.add.php">添加商品</a>
</body>
</html>
