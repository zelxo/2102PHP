    #1 查找 order_info 表中 order_sn  为 2020042321284 或 2020042369891 的记录

    #select * from p_order_info where order_sn=2020042321284 or order_sn=2020042369891;

    #2查找  order_info 表中 user_id 为 1116 的订单记录,按支付时间倒序排序.

    #select * from p_order_info where user_id=1116 ORDER  By pay_time DESC;

    #3    查找 order_goods 表中 商品名(goods_name 字段) 中包含 WDR5620 的记录
    #select goods_name from p_goods where goods_name="WDR5620";

    #统计 订单表(order_info)中有多少用户(count + distinct)
    #