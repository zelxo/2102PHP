<?php
    function str_rand($length){
        // 需要随机的参数
        $str = "abcdefghjkmnpqrstuvwxyzABCDEFGHJKMNPQRSTUVWXYZ23456789";

        // 定义一个空字符串来存放随机后的字符串
        $str1 = "";
        // 循环找到需要随机的字符串的个数
        for ($i=0;$i< $length;$i++){
            // 在字符串的下标中找到随机的下标
            $num = mt_rand(0,53);
            echo "随机数：".$num;echo "<br>";
            // 找到对应的下标的字符
            echo "随机的字母：". $str[$num];echo "<br>";
            // 将对应的字符找到放在一个变量中
            $a =  $str[$num];
            // 将这个变量赋值给提前准备好的字符串
            $str1 .= $a;
        }
        // 返回这个字符串
        return $str1;
    }
    // 给函数传入一个个数
    var_dump(str_rand(8));