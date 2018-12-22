<?php
    session_start();
    include_once("conn.php");
    $uid    =   isset($_POST["uid"]) ? $_POST["uid"] : null;
    $upwd   =   isset($_POST["upwd"]) ? $_POST["upwd"] : null;
    $uid    =   mysqli_real_escape_string($link, strip_tags(trim($uid)));
    $upwd   =   mysqli_real_escape_string($link, strip_tags(trim($upwd)));
    $ip     =   $_SERVER["REMOTE_ADDR"];


    if ($uid != null && $uid != "" && $upwd != null && $upwd != "") {
        $sql   =   "SELECT * FROM wx_pt_sh WHERE sh_id = '$uid'";
        // $yh    =   mysqli_query($link, $sql);
        // if (!$yh) {
        //     printf("Error: %s\n", mysqli_error($link));
        //     exit();
        // }
        $yh    =   mysqli_fetch_array(mysqli_query($link, $sql));
        $yh_pwd = $yh['sh_pwd'];
        // echo $yh_pwd;
        if (password_verify ( $upwd , $yh_pwd )) {
            // todo: session
            $_SESSION['shUser'] = $yh;
            $id = $yh["id"];
			$sql2 = "INSERT INTO wx_pt_login(`ip`, `uid`,`type`,`state`) VALUES ('$ip','$id','sh','success')";
			mysqli_query($link,$sql2);
            echo "success";
        } else {
            // 密码错误
            $id = $yh["id"];
            $sql2 = "INSERT INTO wx_pt_login(`ip`, `uid`,`type`,`state`) VALUES ('$ip','$id','sh','password_error')";
            mysqli_query($link,$sql2);
            echo "error";
        }
    } else {
        // 数据错误，记录日志
        $id = $yh["id"];
        $sql2 = "INSERT INTO wx_pt_login(`ip`, `uid`,`type`,`state`) VALUES ('$ip','$id','sh','login_illegal')";
        mysqli_query($link,$sql2);
        echo "error";
    }
