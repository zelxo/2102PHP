<?php
    // 包含类文件
    include "Bird.php";
    include "Cat.php";
    include "Dog.php";

    $b = new Bird();
    var_dump($b);
    echo "<hr>";
    $c = new Cat();
    var_dump($c);
    echo "<hr>";
    $d = new Dog();
    var_dump($d);