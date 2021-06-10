<?php
    // 使用pdo查询数据   优点是速度和安全
    $host = "127.0.0.1";
    $db = 'php2102';
    $user = 'root';
    $pass = 'root';
    $link = new PDO("mysql:host={$host};dbname={$db}",$user,$pass);


    // 拼装sql语句
    $sql = "select user_id,user_name from p_users where user_id= ? and user_name = ?";


    //预处理
    $stmt = $link->prepare($sql);

    // 查询
    $id = $_GET['id'];
    $name = $_GET['name'];
    $res = $stmt->execute([$id,$name]);    // 返回statement对象
    var_dump($res);



    // 获取错误信息
    $err_code = $stmt->errorCode();      // 获取错误码
    if ($err_code != "00000"){
        $err_info = $stmt->errorInfo();  // 获取错误信息
        echo "出错了" . $err_info[2];
        die;
    }

    // 获取数据
    //$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    echo "<pre>";
    print_r($row);
    echo "</pre>";



