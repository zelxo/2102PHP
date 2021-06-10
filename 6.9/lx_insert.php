<?php

    if (in_array(null,$_POST)){
        echo "输入内容不能为空,请重新输入";
        header("Refresh:2;url=lx.html");
        die;
    }


    $host = "127.0.0.1";
    $db = 'p2102';
    $user = 'root';
    $pass = 'root';
    $link = new PDO("mysql:host={$host};dbname={$db}",$user,$pass);


    $name = $_POST['kcName'];
    $price = $_POST['kcPrice'];
    $lz = "{$_POST['kc']}";
    $teacher = $_POST['tea'];


    $sql = "insert into teacher(kc_name,kc_price,kc_lz,kc_tea_name) 
            values (?,?,?,?)";

    // 预加载
    $stmt = $link->prepare($sql);


    // 传进参数
    $stmt->bindParam(1,$name);
    $stmt->bindParam(2,$price);
    $stmt->bindParam(3,$lz);
    $stmt->bindParam(4,$teacher);

    $res = $stmt->execute();
    echo "<br>";
    var_dump($res);


    // 获取错误信息
    if ($stmt->errorCode() != "00000"){
        $err =  $stmt -> errorInfo()[2];
        echo "<br>";
        echo $err;
        die;
    }

    if ($stmt->rowCount()>0){
        echo "添加成功";
        header("Location:lx_select.php");
    }