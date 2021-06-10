<?php
    $str1 = file_get_contents('test2.sql');
    $arr1 = explode("\n",trim($str1));
    echo "<pre>";
    print_r($arr1);
    echo "</pre>";