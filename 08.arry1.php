<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <ul>
        <?php
            $list = [
                "AAAAAA",
                "BBBBBB",
                "CCCCCC",
                "DDDDDD"
            ];

            $arr1 = count($list);
            for ($i=0; $i < $arr1; $i++) { 
                echo "<li>$list[$i]</li>"; 
                echo "<br/>";
            };
        
            ?>
    </ul>
</body>
</html>