<?php
    session_start();
    $set = intval($_GET['id']);

    include "../include.php";
    $sql = "select goods_id,goods_name,shop_price,goods_number from  p_goods where goods_id='$set'";
    $query = mysqli_query($link,$sql);
    $row = mysqli_fetch_all($query,MYSQLI_ASSOC);
    $_SESSION['goods_id'] =$row[0]['goods_id'];
    echo "<pre>";
    print_r($row[0]);
    echo "</pre>";
?>

<form action="03.update.php" method="post">
    <?php foreach ($row as $k=>$v){ ?>
    商品ID: <input type="text" disabled name="shopID" value="<?php echo $set ?>"><br>
    商品名: <input type="text" name="shopName" value="<?php echo $v['goods_name'] ?>"><br>
    商品价格: <input type="text" name="price" value="<?php echo $v['shop_price'] ?>"><br>
    商品库存: <input type="text" name="number" value="<?php echo $v['goods_number']?>"><br>
    <input type="submit" value="提交">
    <?php } ?>
</form>
