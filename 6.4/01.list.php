<?php
    // 设置一个变量
    $nu=0;
    // 如果没有通过GET传参时默认为第一页
    if (empty($_GET)){
        $_GET['page'] = 1;
    }
    // 设置一个变量接收GET传参
    $num = intval($_GET['page']);
    // 如果传过来的参小于1时  就让他变为1
    if ($num<1){
        $num=1;
    }
    // 将上面的$nu覆盖为当前的页面
    $nu=$num;
    // 查找时开始的位置
    $page = ($num-1)*10;




    // 链接数据库
    include "../include.php";
    // 查找p_goods表中的goods_id,goods_name排列方式为goods_id倒序排列每次从$page开始查找10条
    $sql = "select goods_id,goods_name from p_goods ORDER BY goods_id DESC limit {$page},10";


    $query = mysqli_query($link,$sql);

    $res = mysqli_fetch_all($query,MYSQLI_ASSOC);



    echo "<ul>";
    foreach ($res as $k=>$v){
        echo "<li>";
        echo $v['goods_id'].' '.$v['goods_name'];
        echo "</li>";
    }
    echo "</ul>";
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
<?php
    $a = $nu-1;
    $b = $nu+1;
?>

    <a href="01.list.php?page=<?php
                        echo $a;
    ?>">上一页</a>
    <a href="01.list.php?page=<?php
                        echo $b;
    ?>">下一页</a>
</body>
</html>
