<?php
    // 类的继承
    class Person{
        public $age = 0;
        public $sex = "未知";
        public $weight = "0";
        public $color = "无色";


        public function eat()
        {
            echo "吃奶";
        }


        public function cry()
        {
            echo "哭";
        }

    }

    // 定义一个类继承另一个类
    class White extends Person {

        public $color = "white";

        public function cry()
        {
            echo "wawawawawa";
        }
    }

    $p1 = new White();
    echo $p1->age;echo "<hr>";
    $p1->cry();
    echo "<hr>";
    echo "肤色：" . $p1->color;
    echo "<hr>";
    $p1->cry();