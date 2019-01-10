<?php
/* Connect to a MySQL server  连接数据库服务器 */
include_once("info.php");
$link = mysqli_connect(
    $ip,
    $mysqlUser,
    $mysqlPwd,  
    $mysqlName
);

if (!$link) {
    printf("链接数据库出错。错误代码： ", mysqli_connect_error());
    exit;
}
mysqli_set_charset($link, "utf8");

/* Close the connection 关闭连接*/
// mysqli_close($link);