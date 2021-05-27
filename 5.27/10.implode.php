<?php
    // 将数组通过指定字符连接起来返回的是字符串
    $arr = ["zhangsan","lisi","Baby","Mike","Abc","John","Jack","Zhaoliu"];
    // implode 第一个参数为分隔符  第二个参数为要转为字符串的数组
    $str = implode('#',$arr);
    echo $str;