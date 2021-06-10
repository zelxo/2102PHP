<?php
    $num = 1;

    for ($i=1;$i<=9;$i++){
        $num1 = $num++;
          for ($j=1;$j<=$num1;$j++){
              $num2 = $j;
              $num4 = $num1*$num2;
              echo $num3 = "$num2". "*" . "$num1"."="."$num4  ";
          }
        echo "<br>";
    }