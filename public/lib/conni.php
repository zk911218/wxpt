<?php
$link = new mysqli('localhost', 'wx', 'zk911218', 'wxpt');
if (mysqli_connect_errno()){
    echo '数据库连接错误'.mysqli_connect_error();
    exit();
}
$link->set_charset('utf8');