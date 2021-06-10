-- 模糊搜索
select ount(goods_name) from p_goods where goods_name like '%三星%';

-- 量表联查 
SELECT p_order_info.order_id,p_order_info.goods_amount,p_order_info.add_time,
p_users.user_name,p_users.reg_time,p_users.last_login,p_users.visit_count
FROM p_order_info,p_users WHERE p_order_info.user_id = p_users.user_id
AND p_order_info.user_id IN (95,108);

-- 使用联结表实现:在(p_order_info)中查询order_id是78014,78010的订单，并在(p_order_goods)中查出对应的商品信息
SELECT a.order_id,b.goods_name
FROM p_order_info as a , p_order_goods as b 
WHERE   a.order_id = b.order_id  AND  a.order_id IN (78014,78010)


-- 三表联查(p_users+p_order_info+p_order_goods)
SELECT p_users.user_id,p_users.user_name,p_users.reg_time,p_users.last_login,p_users.visit_count,
p_order_info.order_id,p_order_info.goods_amount,p_order_info.add_time,
p_order_goods.goods_id,p_order_goods.goods_name,p_order_goods.goods_number,p_order_goods.goods_price
FROM p_order_goods,p_users,p_order_info WHERE p_users.user_id = p_order_info.user_id 
AND p_users.user_id IN (95,108)
AND p_order_goods.order_id = p_order_info.order_id


-- 分组查询
-- 统计订单中最多的前10个用户及订单数
SELECT user_id,count(*) as sum  FROM p_order_info  GROUP BY user_id ORDER BY sum DESC LIMIT 10;

-- 在p_order_info表中统计userId为213、385、435的用户的订单数分别是多少？
SELECT user_id,COUNT(*) FROM p_order_info GROUP BY user_id HAVING user_id IN (213,385,435)

-- 找出卖出数量最多的是个商品及商品ID(p_order_goods表)
SELECT goods_id,COUNT(goods_number) AS num FROM p_order_goods GROUP BY order_id ORDER BY num DESC limit 10  

-- 找出订单总金额最多的前十个用户及用户ID(p_order_info表)
SELECT user_id,SUM(goods_amount) as big FROM p_order_info as a GROUP BY user_id ORDER BY  big DESC LIMIT 10

-- 找出订单总金额>1000 <5000 的10个用户及用户ID (p_order_info表)
SELECT user_id,SUM(money_paid) as big FROM p_order_info as a GROUP BY user_id HAVING big>1000 and big <5000 
ORDER BY big DESC LIMIT 10

-- 找出订单总金额<1000 的是个用户及用户id (p_order_info表)
SELECT user_id,SUM(money_paid) as big FROM p_order_info as a GROUP BY user_id HAVING big<1000 ORDER BY big DESC LIMIT 10