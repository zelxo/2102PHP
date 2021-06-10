<?php
    $name = trim($_POST['sname'] );
    $age = intval($_POST['age']);
    $site = trim($_POST['site']);


    // 将数据写入文件   file_put_contents()

    $str = $name . "," . $age . "," . "$site" . "\n";
    $str1 =  file_put_contents('test2.sql',$str,FILE_APPEND);
    ?>

<?php
    // 读取test1.sql文件中的数据
    $cont = file_get_contents('test2.sql');
    // 把读取的数据查分为数组
    $arr1 = explode("\n",trim($cont));
    echo "<pre>";
    print_r($arr1);
    echo "</pre>";
?>

    <table border="1">
        <thead>
        <tr>
            <th>姓名</th>
            <th>年龄</th>
            <th>住址</th>
        </tr>
        </thead>
        <tbody>
            <tr>
                <td></td>
                <td></td>
                <td></td>
            </tr>
        </tbody>
    </table>