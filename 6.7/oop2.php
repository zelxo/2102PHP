<?php
    class People
    {
        // 肤色
        public $lisi = "black";    // 成员属性(变量)
        private $weight;
        public function stature()
        {
            echo "170cm";
        }

        public function weight()  // 成员方法(函数)
        {
            echo "重量： 60kg";
        }

        public function __construct($name,$sex,$age,$weight)
        {
            echo "name: " . $name;echo "<br>";
            echo "sex: " . $sex; echo "<br>";
            echo "age: " . $age; echo "<br>";
            echo "weight: " . $weight; echo "<br>";
            $this->weight = $weight;
        }

        public function showWeight()
        {
            echo "重量： ". $this->weight;
        }


    }

    $Peo1 = new People("李四","man","17","60kg");
    echo "<br>";
    $Peo1->showWeight();
    echo "<hr>";
    $Peo2 = new People("刘能","man","50","100kg");
    echo "<br>";
    $Peo2->showWeight();
