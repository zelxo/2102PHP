<?php
    session_start();

    $host = "127.0.0.1";
    $db = 'php2102';
    $user = 'root';
    $pass = 'root';
    $link = new PDO("mysql:host={$host};dbname={$db}",$user,$pass);


    $value = trim($_POST['u_name']);
    $pass = trim($_POST['pass']);

    $sql = "select * from p_users where user_name=? and password=? ";

    $stmt = $link->prepare($sql);

    $name = $_POST['u_name'];

    $pass = $_POST['pass'];

    $rows = $stmt->execute([$name,$pass]);



    $sql1 = "select * from p_users where user_name='{$name}'";
    $stmt1 = $link->query($sql1);
    $res = $stmt1->fetchAll(PDO::FETCH_ASSOC);
    echo "<pre>";
    print_r($res);
    echo "</pre>";
    if (!$res){
        echo "用户不存在";
        die;
    }
//    var_dump($rows);
    if (password_verify($pass,$res[0]['password'])){
        echo "登陆成功";
        header("Refresh:2;url=my.php");
    }else {
        echo "账号或密码错误";
    }
    $_SESSION['user_name'] = $res[0]['user_name'];
    setcookie('uid',$res[0]['user_id']);





