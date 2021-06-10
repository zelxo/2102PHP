<?php
    session_start();
    $host = "127.0.0.1";
    $db = 'php2102';
    $user = 'root';
    $pass = 'root';
    $link = new PDO("mysql:host={$host};dbname={$db}",$user,$pass);

    $sql = "select goods_id,goods_name,shop_price,goods_number from p_goods where goods_id='{$_GET['id']}'";
    $stmt=$link -> prepare($sql);
    $stmt ->execute();
    $get=$stmt->fetch(PDO::FETCH_NUM);




?>

<form action="update1.php" method="post">
    商品id：<input type="text" name="shopId" value="<?php echo $_GET['id'] ?>" ><br>
    商品名称：<input type="text" name="shopName" VALUE="<?php echo $get[1] ?>"><br>
    商品库存：<input type="text" name="shopNum" VALUE="<?php echo $get[2] ?>"><br>
    商品价格：<input type="text" name="shopPrice" VALUE="<?php echo $get[3] ?>"><br>
    <input type="submit" value="修改">
</form>
