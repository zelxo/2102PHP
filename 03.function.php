<?php
    function  abc($num1,$num2){
        return $num1 + $num2;
    }
    // 定义变量  变量名前面加$符号
    $a = 11;
    $b = 22;
    $c = abc($a,$b);
    // 字符串拼接使用 .
    // 使用单引号字符串  原样输出
    echo '$a + $b = '.$c;
    echo "\n";
    // 使用双引号字符串   解析变量输出
    echo "$a + $b = ".$c;
