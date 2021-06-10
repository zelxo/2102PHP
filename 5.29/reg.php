<?php
    // 接收form表单post传输数据  验证是否符合规则
    session_start();   // 开启session
 if (isset($_SESSION['userName'])){
     header('Refresh:2;url=my.php');
     echo "你已经注册";die;
 }

    // 处理变量
    $u_name = trim($_POST['u_name']);
    $u_email = trim($_POST['u_email']);
    $u_mobile = trim($_POST['u_mobile']);
    $u_age = intval($_POST['u_age']);
    $u_pass1 = trim($_POST['u_pass1']);
    $u_pass2 = trim($_POST['u_pass2']);
    $now = time();
    $address = trim($_POST['u_address']);
    $upass = password_hash($u_pass1,PASSWORD_BCRYPT);

    // 获取mysql链接的四个参数
    $host = "127.0.0.1";    // 获取主机地址
    $user = "root";         // 获取数据库用户名
    $pass = "root";         // 数据库密码
    $db = "php2102";        // 使用的数据库名字


    // 链接mysql数据库
    $link = new mysqli($host,$user,$pass,$db);
    mysqli_query($link,"set names UTF8");

    if (empty($_POST['u_name']) || empty($_POST['u_email']) || empty($_POST['u_mobile']) || empty($_POST['u_age']) || empty($_POST['u_pass1']) || empty($_POST['u_pass2'])){
        echo "请将注册信息填写完成";
        header("Refresh:.5;url=reg.html");

        die;
    }


    // 用mysql语句 查看reg数据表中是否已存在用户名，邮箱，手机号
    $sql_con = "select * from reg  where userName = '{$u_name}' || userEmail = '{$u_email}' || userMobile = '{$u_mobile }'";

    // 在数据库中执行mysql语句
    $query = mysqli_query($link,$sql_con);

    // 获取里面的多条数据
    $fe = mysqli_fetch_all($query,MYSQLI_ASSOC);

    // 如果$fe 返回的为TRUE有多条数据时就不能注册，停止添加到数据库
    if ($fe){
        die("用户名/邮箱/手机号已经存在");
    }


    // sql语句
    $sql = "insert into reg(`userName`,`userEmail`,`userMobile`,`userEge`,`userPass`,`userRegTime`,`address`)
            values ('{$u_name}','{$u_email}','{$u_mobile}','{$u_age}','{$upass}',{$now},'{$address}')";

    // 准备语句
    $stmt = mysqli_prepare($link,$sql);

    // 执行阶段
    $result = mysqli_stmt_execute($stmt);


    // 添加成功后 跳转到登录页面
    if ($result){
        echo "insert 成功";
        header("Refresh:2; url = login.html");
    }else{
        echo "insert 失败";
    }
?>


