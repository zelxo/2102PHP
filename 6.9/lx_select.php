<?php
    $host = "127.0.0.1";
    $db = 'p2102';
    $user = 'root';
    $pass = 'root';
    $link = new PDO("mysql:host={$host};dbname={$db}",$user,$pass);

    $sql = "SELECT * FROM teacher ";

    // 预加载
    $stmt = $link->prepare($sql);

    // 执行
    $res = $stmt->execute();

    // 获取错误信息
    if ($stmt->errorCode() != "00000"){
        echo $stmt->errorInfo()[2];
    }

    // 获取结果
    $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);


    echo "<table>";
    echo "</table>";



?>


<!--//<table border="1">-->
<!--//    <thead>-->
<!--//        <tr>-->
<!--//            <th>课程名称</th>-->
<!--//            <th>课程价格</th>-->
<!--//            <th>是否连载</th>-->
<!--//            <th>课程讲师</th>-->
<!--//        </tr>-->
<!--//    </thead>-->
<!--//    <tbody>-->
<!--//        --><?php //foreach ($rows as $k => $v){?>
<!--//            <tr>-->
<!--//                <td>--><?php //$v['kc_name'] ?><!--</td>-->
<!--//                <td>--><?php //$v['kc_price'] ?><!--</td>-->
<!--//                <td>--><?php //$v['kc_lz'] ?><!--</td>-->
<!--//                <td>--><?php //$v['kc_tea_name'] ?><!--</td>-->
<!--//            </tr>-->
<!--//        --><?php//}//?>
<!--//    </tbody>-->
<!--//</table>-->
