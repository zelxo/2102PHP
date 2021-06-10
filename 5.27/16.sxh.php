<?php
    //第一种方法
/*for($q=1;$q<=9;$q++){
    for($w=0;$w<=9;$w++){
        for($e=0;$e<=9;$e++){
            if($q*$q*$q + $w*$w*$w + $e*$e*$e ==
                100*$q + 10*$w + $e){
                echo "$q $w $e "."<p>";
            }
        }
    }
}*/

    // 第二种方法
    // 水仙花的特点三位数   abc = a3+b3+c3    三位数的三次方相加等于本身
    for ($i=100;$i<1000;$i++){
        $a = floor($i/100);
        $b = floor($i%100/10);
        $c = $i%10;
        if (pow($a,3)+pow($b,3)+pow($c,3)==$i){
            echo $i;
            echo "<br>";
        }


    }



