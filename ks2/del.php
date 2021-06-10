<?php
    $id = intval($_GET['id']);

    $localhost = "127.0.0.1";
    $name = "root";
    $pass = "root";
    $db = "php2102";
    $link = new mysqli($localhost,$name,$pass,$db);

    $sql = "delete from ks where `q_id`={$id}";
    $query = mysqli_query($link,$sql);


    if ($query){
        echo "删除成功";
        header('Refresh:2;url=show.php');
    }else{
        echo  "删除失败";
    }
