<?php
    // 个人中心
    // 开启会话
    session_start();





    include "include.php";


    // 查询
    if (isset($_SESSION['userName'])){
        $userName = $_SESSION['userName'];
        echo "你好 {$userName} [{$_COOKIE['uid']}],欢迎回来";
    }else{
        echo "请先登录";
        header('Refresh:2;url = login.html');
        die;
    }
    $cont = $_COOKIE['uid'];

    $sql = "select * from login_history where uid = '{$cont}'";

    $query = mysqli_query($link,$sql);

    $result = mysqli_fetch_all($query,MYSQLI_ASSOC);

?>



<form action="clear_cookie.php">
    <input type="submit" value="退出登录">
</form>

<table border="1">
    <thead>
        <tr>
            <th>uid</th>
            <th>loginTime</th>
            <th>loginIP</th>
            <th>ua</th>
            <th>操作</th>
        </tr>
    </thead>
    <tbody>

        <?php
            foreach ($result as $k=>$v){
                echo "<tr>";
                echo "<td>{$v['uid']}</td>";
                echo "<td>{$v['loginTime']}</td>";
                echo "<td>{$v['loginIP']}</td>";
                echo "<td>{$v['ua']}</td>";
                // 给a链接一个get传参  传入的是id为用户数据中的userId
                echo "<td><a href='drop.php?id={$v['userId']}'>删除</a></td>";
                echo "</tr>";
            }
        ?>
    </tbody>
</table>
