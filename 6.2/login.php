<?php

    if ($_POST){
        session_start();    // 开启会话
        if (isset($_SESSION['userName'])){

            echo "你已经登录";die;
        }



        // 处理变量
        $value = trim($_POST['u']);
        $upass = trim($_POST['pass']);

        include "include.php";


        // sql语句  查询数据库中是否有该用户名/邮箱/手机号
        $sql = "select * from reg where userName='{$value}' or userEmail='{$value}' or userMobile='{$value}'";

        // 查询上面SQL语句
        $result = mysqli_query($link, $sql);

        // 获取结果
        $rows = mysqli_fetch_all($result,MYSQLI_ASSOC);
        echo "<pre>";
        print_r($rows);
        echo "</pre>";

        // empty 判空  如果获取结果为空时 就表明没有该用户需要重新跳转登录页面重新输入
        if (empty($rows[0])){
            header("Refresh:2; url = login.php");
            die("查无此人");
        }

        // 用户信息$rows[0]

        // 验证密码   password_verify()
        if (password_verify($upass,$rows[0] ['userPass'])){
            echo "登录成功,正在跳转个人中心";
            $now = time();
//        date("Y-m-d H:i:s",$now);




            // 更新用户最后一次登录时间
            $sql1 = "update reg set last_login_time = {$now} where userId={$rows[0]['userId']}";
            // 准备
            $stmt1 = mysqli_prepare($link,$sql1);
            // 执行
            $result1 = mysqli_stmt_execute($stmt1);

            // 记录用户登录信息
            $uid = $rows[0] ['userId'];  // 用户id
            $loginTime = $now;    // 登录时间
            $loginIP = $_SERVER['REMOTE_ADDR'];  // 用户登录IP
            $ua = $_SERVER['HTTP_USER_AGENT'];   // 浏览器信息

            $sql = "insert into login_history(`uid`,`loginTime`,`loginIP`,`ua`) 
                values ('{$uid}','{$loginTime}','{$loginIP}','{$ua}')";



            // 准备阶段
            $stmt1 = mysqli_prepare($link,$sql);

            // 执行阶段
            $result = mysqli_stmt_execute($stmt1);

            // 保存用户信息到会话中
            $_SESSION['userName'] = $rows[0]['userName'];
            setcookie('uid',$rows[0]['userId']);


            // 页面跳转
            header('Location:my.php');
            // 使用echo 包一个JS标签 使用JS的页面跳转方法
//        echo "<script>location.href='my.php'</script>";
        }else{
            echo "密码错误";

        }
        die;
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>登录</title>
</head>
<body>
<form action="login.php" method="post">
    <input type="text" name="u" placeholder="用户名/手机号/邮箱"><br>
    <input type="password" name="pass" placeholder="密码"><br>
    <input type="submit" value="登录">
    <p>
        没有账号?点我立即<a href="reg.html">注册</a>!
    </p>
</form>
</body>
</html>
