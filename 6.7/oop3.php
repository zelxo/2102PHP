<?php
    class Peoson{
        public $color = "black";    // 成员属性(变量)
        public $school = "北大";


        public function __construct()
        {
            echo "构造函数";
        }

        public function __destruct()
        {
            echo "析构函数";
        }
    }

    $a = new Peoson();
    echo "<hr>";
    unset($a);