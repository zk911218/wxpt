<?php
    session_start();
    include_once("conn.php");
    include_once("getGuid.php");
    if(!isset($_SESSION['adUser'])){
       Header("Location:ad_login.php"); 
       exit;
    }
    $ad_id      =   isset($_SESSION['adUser']['id']) ? $_SESSION['adUser']['id'] : null;

    $yhname     =   isset($_POST["yhname"]) ? $_POST["yhname"] : 0;
    $yhid       =   isset($_POST["yhid"]) ? $_POST["yhid"] : 0;
    $yhdate     =   isset($_POST["yhdate"]) ? $_POST["yhdate"] : date("Y-m-d");
    $yhnum      =   isset($_POST["yhnum"]) ? $_POST["yhnum"] : 0;
    $yhadd      =   isset($_POST["yhadd"]) ? $_POST["yhadd"] : 0;
    $yhtel      =   isset($_POST["yhtel"]) ? $_POST["yhtel"] : 0;
    $yhstate    =   isset($_POST["yhstate"]) ? $_POST["yhstate"] : "Y";
    $id         =   isset($_POST["id"]) ? $_POST["id"] : 0;

    $ad_id      =   mysqli_real_escape_string($link, strip_tags(trim($ad_id)));
    $yhname     =   mysqli_real_escape_string($link, strip_tags(trim($yhname)));
    $yhid       =   mysqli_real_escape_string($link, strip_tags(trim($yhid)));
    $yhdate     =   mysqli_real_escape_string($link, strip_tags(trim($yhdate)));
    $yhnum      =   mysqli_real_escape_string($link, strip_tags(trim($yhnum)));
    $yhadd      =   mysqli_real_escape_string($link, strip_tags(trim($yhadd)));
    $yhtel      =   mysqli_real_escape_string($link, strip_tags(trim($yhtel)));
    $yhstate    =   mysqli_real_escape_string($link, strip_tags(trim($yhstate)));
    $id    =   mysqli_real_escape_string($link, strip_tags(trim($id)));

    if ($ad_id != null && $ad_id != "") {
        if (preg_match("/^[1-9]\d*|0$/", $yhnum)) {
            if (preg_match("/[0-9]{11}/", $yhtel)) {
                if ($yhname!=null&&$yhname!=""&&$yhid!=null&&$yhid!=""&&$yhdate!=null&&$yhdate!=""&&$yhnum!=null&&$yhnum!=""&&$yhadd!=null&&$yhadd!=""&&$yhtel!=null&&$yhtel!="") {
                    $yh_id_hash =   guid();  //生成该用户的唯一标识符
                    $sql = "UPDATE wx_pt_sh SET `sh_name` = ?,`sh_id`=?,`sh_yxq`=?,`sh_max_ci`=?,`sh_dz`=?,`sh_dh`=?,`sh_state`=?,`sh_update_id`=? WHERE sh_id_hash = ?";
                    $links=  mysqli_stmt_init($link);
                    if(mysqli_stmt_prepare($links, $sql)){
                        mysqli_stmt_bind_param($links,'sssssssss',$yhname,$yhid,$yhdate,$yhnum,$yhadd,$yhtel,$yhstate,$ad_id,$id);
                        if (mysqli_stmt_execute($links)) {
                            // 添加成功
                            echo "success";
                        } else {
                            // 添加失败
                            echo "error1";
                        }
                        mysqli_stmt_fetch($links);
                        mysqli_stmt_close($links);
                    }else{
                        echo "error1";
                        exit;
                    }
                    mysqli_close($link);
                    
                    
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