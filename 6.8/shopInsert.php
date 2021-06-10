<?php
    if (empty($_POST)){
        echo "传参不能为空";
        die;
    }else if (in_array(null,$_POST)){
        echo "请将内容填写完成";
        die;
    }



    $host = "127.0.0.1";
    $db = 'php2102';
    $user = 'root';
    $pass = 'root';
    $link = new PDO("mysql:host={$host};dbname={$db}",$user,$pass);

    $name = trim($_POST['shopName']);
    $price = trim($_POST['price']);
    $num = trim($_POST['goods_num']);

    // sql语句
    $sql = "insert into p_goods(`goods_name`,`shop_price`,`goods_number`,`goods_desc`)
            values (?,?,?,?)";

    // 预加载
    $stmt = $link->prepare($sql);
    var_dump($stmt);

    // 绑定参数
    $stmt->bindParam(1,$name);
    $stmt->bindParam(2,$price);
    $stmt->bindParam(3,$num);
    $stmt->bindParam(4,$num);


    // 执行
    $stmt->execute();
    echo "<hr>";

    // 获取错误信息
    if ($stmt->errorCode() != "00000"){
        echo $stmt->errorInfo()[2];
    }
    echo "<hr>";
    // 检查执行结果
    $row_cont = $stmt->rowCount();
    var_dump($row_cont);

