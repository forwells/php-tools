<?php

if(!function_exists("db")){
    function db(){
        $dbconfig = require_once dirname(dirname(dirname(__FILE__)))."/config/database.php";
        return new Phptools\Mysql\Pdo($dbconfig['driver'], $dbconfig['dbname'], $dbconfig['host'], $dbconfig['username'], $dbconfig['password']);
    }
}