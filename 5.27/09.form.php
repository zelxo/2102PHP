<?php

    // 获取表单提交内容
    echo "<pre>";
    print_r($_POST);
    echo "</pre>";


    // 获取用户名

    $u_name = $_POST['u_name'];
    $Name = "/^[A-z]{6,}$/";
    // preg_match — 执行匹配正则表达式
    // preg_match($Name,$u_name)中第一个参数是需要匹配的正则表达式   第二个值用来匹配正则的数据
    if (!preg_match($Name,$u_name)){
        echo "用户名不规范";
    }


    // 获取邮箱
    $u_email = $_POST['u_email'];
    $Email = "/^[a-z0-9A-Z]+[- | a-z0-9A-Z . _]+@([a-z0-9A-Z]+(-[a-z0-9A-Z]+)?\\.)+[a-z]{2,}$/";
    if (!preg_match($Email,$u_email)){
        echo "邮箱不规范";
    }



    $u_tel = $_POST['u_tel'];
    $Tel = "/^1[356789][0-9]{9}$/";
    if (!preg_match($Tel,$u_tel)){
        echo "手机号不规范";
    }


    $u_pwd1 = $_POST['u_pwd1'];
    $Pwd1 = "/^(?![0-9]+$)(?![a-zA-Z]+$)[0-9A-Za-z\\W]{6,18}$/";
    if (!preg_match($Pwd1,$u_pwd1)){
        echo "密码不符合规范";
    }

    $u_pwd2 = $_POST['u_pwd2'];
    if ($u_pwd2!=$u_pwd1){
        echo "与上次输入密码不符";
    }

