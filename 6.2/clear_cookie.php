<?php
header("Content-type:text/html;charset=utf-8");
//开启session
session_start();
//清空session 数组
$_SESSION = array();
////销毁session文件
//session_destroy();

//删除cookie文件，若cookie中只有用户名这一个数据    cookie是在PHP中删除不了的
setcookie('uid','',time()-1);   // time() -1 是让cookie立马过期
//跳转到首页
echo "<script>alert('退出成功');location.href='login.php'</script>";
?>

