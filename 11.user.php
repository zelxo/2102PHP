<?php
    $f = './num';
    $number = file_get_contents($f);
    $number = $number+1;
    file_put_contents($f,$number);
    echo "访问量：",$number;
