<?php
    include_once("conn.php");
    $uid    =   $_POST["uid"] ? $_POST["uid"] : null;
    $upwd   =   $_POST["uid"] ? $_POST["upwd"] : null;
    $uid    =   mysqli_real_escape_string($link, strip_tags(trim($uid)));
    $upwd   =   mysqli_real_escape_string($link, strip_tags(trim($upwd)));



    if ($uid != null && $uid != "" && $upwd != null && $upwd != "") {
        $sql   =   "SELECT sh_pwd FROM wx_pt_sh WHERE sh_id = '$uid'";
        // $yh    =   mysqli_query($link, $sql);
        // if (!$yh) {
        //     printf("Error: %s\n", mysqli_error($link));
        //     exit();
        // }
        $yh    =   mysqli_fetch_array(mysqli_query($link, $sql));
        $yh_pwd = $yh[0];
        // echo $yh_pwd;
        if (password_verify ( $upwd , $yh_pwd )) {
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
