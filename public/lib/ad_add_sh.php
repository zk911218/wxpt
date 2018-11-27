<?php
    session_start();
    include_once("conn.php");
    $_SESSION['ad']['ad_id'] = 1;
    $ad_id      =   $_SESSION['ad']['ad_id'] ? $_SESSION['ad']['ad_id'] : null;
    $ad_id      =   mysqli_real_escape_string($link, strip_tags(trim($ad_id)));
    $yhname     =   mysqli_real_escape_string($link, strip_tags(trim($_POST["yhname"])));
    $yhid       =   mysqli_real_escape_string($link, strip_tags(trim($_POST["yhid"])));
    $yhpwd      =   mysqli_real_escape_string($link, strip_tags(trim($_POST["yhpwd"])));
    $yhdate     =   mysqli_real_escape_string($link, strip_tags(trim($_POST["yhdate"])));
    $yhnum      =   mysqli_real_escape_string($link, strip_tags(trim($_POST["yhnum"])));
    $yhadd      =   mysqli_real_escape_string($link, strip_tags(trim($_POST["yhadd"])));
    $yhtel      =   mysqli_real_escape_string($link, strip_tags(trim($_POST["yhtel"])));

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
                    $sql    =   "select * from wx_pt_sh";

                    // $sql    =   "INSERT INTO wx_pt_sh(sh_name,sh_id,sh_pwd,sh_yxq,sh_max_ci,sh_dz,sh_insert_id,sh_dh,sh_state) VALUES ('$yhname','$yhid','$yhpwd','$yhdate','$yhnum','$yhadd','$ad_id','$yhtel','$yhState')";
                    // $sql = "INSERT INTO wx_pt_sh(sh_name,sh_id,sh_pwd,sh_yxq,sh_max_ci,sh_dz,sh_insert_id,sh_dh,sh_state) VALUES ('莆田整容整形医院02店','pt01','$2y$10$86d.e9VD9Rqgz4rGwM2ZS.3wERx6Hf94W3BovNr39wGVukmxJUXyi','2019/01/31','100','莆田市莆田整容整形医院02店','1','03111554499','Y');";
                    // echo $sql;
                    $yh     =   mysqli_query($link, $sql);
                    while ($row = mysqli_fetch_assoc($yh)) {
                        for ($i=0; $i<14; $i++) {
                            echo $row[$i]." | ";
                        }
                        echo "<br>";
                    }
                    
                    if ($yh) {
                        // 添加成功
                        echo "添加成功";
                    } else {
                        // 添加失败
                        echo "添加失败";
                    }
                } else {
                    // 提交的数据有空值
                    echo "提交的数据有空值";
                }
            } else {
                // 电话错误
                echo "电话错误";
            }
        } else {
            // 最大开团数错误
            echo "最大开团数错误";
        }
    } else {
        // 没有权限，返回管理员登陆页面
        echo "没有权限";
    }
    mysqli_close($link);
