<?php


    // 不追加的写法
    echo "<pre>";
    print_r($_POST);
    echo "</pre>";

    $name = trim($_POST['sname'] );
    $age = intval($_POST['age']);
    $site = trim($_POST['site']);


     // 将数据写入文件   file_put_contents()

    $str = $name . "," . $age . "," . "$site";
    echo $str;
    $str1 =  file_put_contents('test1.sql',$str );
?>

<?php
// 读取test1.sql文件中的数据
$cont = file_get_contents('test1.sql');
echo $cont;echo "<br>";
// 把读取的数据查分为数组
$arr1 = explode(",",$cont);
echo "<pre>";
print_r($arr1);
echo "</pre>";
?>

<table border="1">
    <thead>
    <tr>
        <th>姓名</th>
        <th>年龄</th>
        <th>住址</th>
    </tr>
    </thead>
    <tbody>
    <tr>
<!--        将数组下标对应的值写入td中-->
        <td><?php
            echo $arr1[0];
            ?></td>
        <td><?php
            if ($arr1>18){
                echo "成年";
            }else{
                echo "未成年";
            }
            ?></td>
        <td><?php
            echo $arr1[2];
            ?></td>
    </tr>
    </tbody>
</table>
