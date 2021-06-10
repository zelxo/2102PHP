<?php
    include "../include.php";
    // 接收url传参
    $search = trim($_GET['search']);

    if (isset($_GET['page'])){
        $num = $_GET['page'];
    }else{
        $num = 1;
    }

    $row_num = 5;
    $page = ($num-1)*$row_num;
    // 模糊搜索   搜索数据库中所有包含%$search%的数据
    echo $page;
    $sql = "select goods_name from p_goods where goods_name like '%{$search}%' limit {$page},{$row_num}";
    $query = mysqli_query($link,$sql);
    $rows = mysqli_fetch_all($query,MYSQLI_ASSOC);


    $sql1 = "select count(goods_name) from p_goods where goods_name like '%$search%'";

    $query1 = mysqli_query($link,$sql1);

    $row1 = mysqli_fetch_array($query1,MYSQLI_ASSOC);


    $count = ceil($row1['count(goods_name)']/$row_num);


    // 将数据写入列表中
    echo "<ul>";
    foreach ($rows as $k=>$v){
        $replace = "<span style='color:red'>$search</span>";
        $new_name = str_replace($search,$replace,$v['goods_name']);
        echo "<li>{$new_name}</li>";
    }
    echo "</ul>";
?>


<a href="05.search.php?search=<?php echo $search?>&page=1">首页</a>
<a href="05.search.php?search=<?php echo $search?>&page=<?php
            if ($num<2){
                echo $num=1;
            }else{
                echo $num-=1;
                $num+=1;
            }
?>">上一页</a>
<a href="05.search.php?search=<?php echo $search?>&page=<?php
            if ($num<$count){
                echo $num+=1;
            }else {
               echo $num = $count;
            }
?>">下一页</a>
<a href="05.search.php?search=<?php echo $search?>&page=<?php
            echo $num=$count;
?>">尾页</a>

