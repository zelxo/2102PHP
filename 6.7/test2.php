<?php
    // 实例化一个类的时候，如果不存在会自动调用类的自动加载函数

    // 定义一个自动加载的函数

    function autoload($class_name)
    {
        echo "正在new " . $class_name;echo "<br>";
        echo "类名 " . $class_name ;echo "<br>";

        // 根据类名找到类文件
        $class_file = $class_name . ".php";
        echo "类文件 " . $class_file; echo "<br>";


        include $class_file;
    }
    // 注册自动加载函数
    spl_autoload_register("autoload");

    $b = new Bird();
    var_dump($b);

//    $c = new Cat();
//    var_dump($c);
//    $a = new abc();
//    var_dump($a);