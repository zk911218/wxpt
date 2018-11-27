<?php
    include_once("conn.php");
    $uid    =   $_POST["uid"] ? $_POST["uid"] : null;
    $upwd    =   $_POST["uid"] ? $_POST["upwd"] : null;
    $uid    =   mysqli_real_escape_string(strip_tags(trim($uid)));
    $upwd   =   mysqli_real_escape_string(strip_tags(trim($upwd)));



    if ($uid != null && $uid != "" && $upwd != null && $upwd != "") {
        $sql   =   "SELECT yh_salt,yh_pwd FROM wx_pt_sh WHERE sh_id = '$uid'";
        $yh    =   $link -> query($sql);
        // 1.对密码加盐
        $yh_salt = $yh[0];
        $yh_pwd = $yh[1];
        $password=sha1($upwd.$yh_salt);
        // 2.对密码进行比较
        if ($password == $yh_pwd) {
            // todo: session
            echo "success";
        } else {
            // 密码错误
            echo "error";
        }
    } else {
        // 数据错误，记录日志
        echo "";
    }
