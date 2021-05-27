<?php
    $arr1 = ["a","b","c","d"];
    $arr2 = ["e","f","g","h"];
    $arr3 = ["a","b","c","d"];

    // 创建一个变量装载合并完的数组
    $arr4 = array_merge($arr1,$arr2,$arr3);  // 合并数组
    echo "<pre>";
    // 输出合并完的数组
    print_r($arr4);
    echo "</pre>";
