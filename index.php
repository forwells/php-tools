<?php
require_once "./vendor/autoload.php";

#create table
// $sql = <<<SQL
//     create table if not exists `user`(
//         `name` varchar(50) not null default "",
//         `age` int(10) not null default 0,
//         `create_time` timestamp,
//         `update_time` timestamp
//     );
// SQL;
#create user
// $sql = "insert into `user`(`name`) values('tommy')";
// db()->query($sql);
// db()->exec("");
db()->add("user", ['name'=>'tommy', 'age'=>'18']);
// var_dump(db());
