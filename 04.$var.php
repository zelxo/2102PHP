<?php
    $a = 1;
    $b = &$a;
    $b = 2;

    echo $a;

    echo "\n";

    $a = 'hello';       //普通变量
    $$a = 'world';      //可变变量 相当于：$hello = ‘world’;
    echo "$a ${$a}";   //输出：hello world
    echo "\n";
    echo "$a $hello";   //输出：hello world