create table login_history(
    `userId` int unsigned auto_increment primary  key ,
    `uid` varchar (64),
    `loginTime` int ,
    `loginIP` varchar (256),
    `ua` varchar (256)
)