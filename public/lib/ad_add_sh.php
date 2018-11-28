<?php
    // session_start();
    include_once("conn.php");
    // $_SESSION['ad']['ad_id'] = 1;
    // $ad_id      =   $_SESSION['ad']['ad_id'] ? $_SESSION['ad']['ad_id'] : null;
    $ad_id      =   1;
    $ad_id      =   mysqli_real_escape_string($link, strip_tags(trim($ad_id)));
    $yhname     =   mysqli_real_escape_string($link, strip_tags(trim($_POST["yhname"])));
    $yhid       =   mysqli_real_escape_string($link, strip_tags(trim($_POST["yhid"])));
    $yhpwd      =   mysqli_real_escape_string($link, strip_tags(trim($_POST["yhpwd"])));
    $yhdate     =   mysqli_real_escape_string($link, strip_tags(trim($_POST["yhdate"])));
    $yhnum      =   mysqli_real_escape_string($link, strip_tags(trim($_POST["yhnum"])));
    $yhadd      =   mysqli_real_escape_string($link, strip_tags(trim($_POST["yhadd"])));
    $yhtel      =   mysqli_real_escape_string($link, strip_tags(trim($_POST["yhtel"])));
    
    // $ad_id      =   1;
    // $yhname     =   2;
    // $yhid       =   3;
    // $yhpwd      =   4;
    // $yhdate     =   "2019-02-06";
    // $yhnum      =   6;
    // $yhadd      =   7;
    // $yhtel      =   "12345678918";

    if ($ad_id != null && $ad_id != "") {
        if (preg_match("/^[1-9]\d*|0$/", $yhnum)) {
            if (preg_match("/[0-9]{11}/", $yhtel)) {
                if ($yhname!=null&&$yhname!=""&&$yhid!=null&&$yhid!=""&&$yhpwd!=null&&$yhpwd!=""&&$yhdate!=null&&$yhdate!=""&&$yhnum!=null&&$yhnum!=""&&$yhadd!=null&&$yhadd!=""&&$yhtel!=null&&$yhtel!="") {
                    // 用password_hash()函数对密码加密。默认60位，应保证255字符存储空间。
                    // string password_hash ( string $password , int $algo [, array $options ] )
                    // 用password_verify()函数对密码验证是否匹配。
                    // bool password_verify ( string $password , string $hash )
                    $yhpwd  =   password_hash($yhpwd, PASSWORD_DEFAULT);
                    $yhState=   "Y";
                    $sql = "INSERT INTO wxpt.wx_pt_sh(`sh_name`,`sh_id`,`sh_pwd`,`sh_yxq`,`sh_max_ci`,`sh_dz`,`sh_insert_id`,`sh_dh`,`sh_state`) VALUES ('$yhname','$yhid','$yhpwd','$yhdate','$yhnum','$yhadd','$ad_id','$yhtel','Y');";
                    // echo $sql;
                    $yh     =   mysqli_query($link, $sql);
                    
                    if ($yh) {
                        // 添加成功
                        echo "success";
                    } else {
                        // 添加失败
                        echo "error1";
                    }
                } else {
                    // 提交的数据有空值
                    echo "error2";
                }
            } else {
                // 电话错误
                echo "error3";
            }
        } else {
            // 最大开团数错误
            echo "error4";
        }
    } else {
        // 没有权限，返回管理员登陆页面
        echo "error5";
    }
    mysqli_close($link);
