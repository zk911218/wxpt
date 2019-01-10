<?php
$DEBUG      =   TRUE;
$SERVER_Near=   TRUE;
$appID      =   "wx8b3703e86e98656c";
$appsecret  =   "99f1275cc9ae63a85eabbf287b9a8286";
if ($SERVER_Near) {
    # 本机测试
    $ip         =   "localhost";
    $mysqlName  =   "wxpt";
    $mysqlUser  =   "wx";
    $mysqlPwd   =   "zk911218";
} else {
    # 远程服务器
    $ip         =   "123.207.44.252";
    $mysqlName  =   "wxpt";
    $mysqlUser  =   "wx";
    $mysqlPwd   =   "zk911218";
}

