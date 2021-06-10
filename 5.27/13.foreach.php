<?php
    $arr1 = [
        "name"  => " zhangsan ",
        "age"   => 11,
        "email" => "zhangsan@qq.com"
    ];

    $arr2 = [];
    foreach ($arr1 as $k => $v){
        $input = trim($v);
        $arr2[$k] = $input;
    }
    echo "<pre>";
    print_r($arr2);
    echo "</pre>";
