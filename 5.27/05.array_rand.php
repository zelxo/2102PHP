<?php
    $arr = ["zhangsan","lisi","Baby","Mike","John","Jack","Zhaoliu"];

   /* $v = array_values($arr);
    $k = array_rand($v,2);
    echo "<pre>";
    print_r($k) ;
    echo "</pre>";*/



    echo "<pre>";
    // 输出创建好的数组
    print_r($arr);
    // 想要从数组中取出多少个随机值
    $k = array_rand($arr,2);
    echo "</pre>";

    echo $arr[$k[0]];       // 输出第一个随机值  下标为0
    echo "<br>";            // 输出换行符
    echo $arr[$k[1]];       // 输出第二个随机值  下标为1