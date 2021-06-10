<?php
    class People{
        // 肤色
        public $lisi = "black";    // 成员属性(变量)

        public function stature()
        {
            echo "170cm";
        }

        public function weight(){    // 成员方法(函数)
            echo "60kg";
        }

    }

    // 将成员实例化得到一个对象
    $people = new People();
    var_dump($people);
    echo "<hr>";
    // 访问成员变量   访问变量需要var_dump输出才能在网页中看到
    $a = $people->lisi;
    var_dump($a);
    echo "<hr>";
    // 访问成员方法 不需要var_dump输出就能在网页中看到
    $people->stature();
    echo "<hr>";
    $people->weight();