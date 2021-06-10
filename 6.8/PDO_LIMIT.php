<?php
    session_start();
    $host = "127.0.0.1";
    $db = 'php2102';
    $user = 'root';
    $pass = 'root';
    $link = new PDO("mysql:host={$host};dbname={$db}",$user,$pass);

    if (empty($_GET['page'])){
        $_GET['page'] =1;
    }

    if ($_GET['page']<1){
        $_GET['page'] =1;
    }


    $num = intval($_GET['page']);
    $row_num = 10;
    $page = ($num-1) * $row_num;

    $sql = "select * from p_goods ORDER BY goods_id DESC LIMIT {$page},{$row_num}";

    $stmt = $link->prepare($sql);


    $res = $stmt->execute();


    $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);




    $sql1 = "select count(*) from p_goods ";
    $stmt1 = $link->prepare($sql1);
    $res1 = $stmt1->execute();
    $rows1= $stmt1->fetchAll(PDO::FETCH_ASSOC);

    $count = intval($rows1[0]['count(*)']/10);





    echo "<ul>";
    foreach ($rows as $k => $v){
        echo "<li>";
        echo "<a>{$v['goods_name']}</a>";
        echo "<a href='update.php?id={$v['goods_id']}'>修改商品信息 </a>";
        echo "<a href='delete.php?id={$v['goods_id']}'> 删除该商品</a>";
        echo "</li>";
    }
    echo "</ul>";

?>


<a href="PDO_LIMIT.php?page=1">首页</a>
<a href="PDO_LIMIT.php?page=<?php
    if ($num<2){

        echo $num=1;
    }else{
        echo $num-=1;
        $num+=1;

    }
?>">上一页</a>
<a href="PDO_LIMIT.php?page=<?php
    echo $num+=1;
?>">下一页</a>
<a href="PDO_LIMIT.php?page=<?php
    echo $num= $count;
?>">尾页</a>
<a href="shopInsert.html">添加商品</a>
