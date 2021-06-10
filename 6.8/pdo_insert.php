<?php
    if (empty($_POST)){
        echo "注册内容不能为空";
        die;
    }else if (in_array(null,$_POST)){
        echo "请将内容填写完成";
        die;
    }

    // 使用pdo  insert
    $host = "127.0.0.1";
    $db = 'php2102';
    $user = 'root';
    $pass = 'root';
    $link = new PDO("mysql:host={$host};dbname={$db}",$user,$pass);

    // 判断密码和确认密码是否一致
    $pass1 = trim($_POST['pass1']);
    $pass2 = trim($_POST['pass2']);
    if ($pass2 == $pass1){
        // 密码转为哈希
        $upass = password_hash($_POST['pass1'],PASSWORD_BCRYPT);
    }




    // 拼装sql语句
    $sql = "insert into p_users(`user_name`,`email`,`mobile`,`password`) 
values (?,?,?,?)";

    // 预处理
    $stmt = $link->prepare($sql);    // 得到一个statement对象

    // 绑定参数
    $stmt->bindParam(1,$_POST['u_name']);
    $stmt->bindParam(2,$_POST['email']);
    $stmt->bindParam(3,$_POST['mobile']);
    $stmt->bindParam(4,$upass);

    // 执行sql
    $stmt->execute();

    // 判断错误
    $err_code = $stmt->errorCode();
    if ($err_code != "00000"){
        $err_info = $stmt->errorInfo();
        echo $err_info[2];
        die;
    }




    // 查看sql执行受影响的行数
    $affect_rows =  $stmt->rowCount();
    echo "<br>";
    // echo "受影响的行数：" . $affect_rows;
    if ($affect_rows>0){
        header("Refresh:2;url=login.html");
        echo "执行成功";
    }else{
        echo "注册失败";
    }
