<?php
include_once("info.php");
$link = new mysqli($ip, $mysqlUser, $mysqlPwd, $nysqlName);
if (mysqli_connect_errno()){
    echo '数据库连接错误'.mysqli_connect_error();
    exit();
}
$link->set_charset('utf8');