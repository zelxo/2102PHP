<?php
    $arr = [
        "name"=>"zhangsan",
        "age"   => 11,
        "email" => "zhangsan@qq.com"
    ];
    // 返回数组中所有的值   将键类型换为数值
    $v = array_values($arr);
    echo "<pre>";
    print_r($v);
    echo "</pre>";
