<?php
    session_start();
    if(!isset($_SESSION['adUser'])){
       Header("Location: ad_login.php"); 
       exit;
    }
    $sh_id_hash    =   isset($_GET["id"]) ? $_GET["id"] : 0;
    if (!$sh_id_hash) {
        exit;
    }
    include_once("lib/conn.php");
   
    // 创建预处理语句
    $links=  mysqli_stmt_init($link);
    if(mysqli_stmt_prepare($links, "SELECT sh_name,sh_id,sh_yxq,sh_max_ci,sh_dz,sh_insert_time,sh_state FROM `wx_pt_sh` WHERE sh_id_hash = ?;")){
         // 绑定参数
        mysqli_stmt_bind_param($links,'s',$sh_id_hash);
        // 绑定结果变量
        mysqli_stmt_bind_result($links,$sh_name,$sh_id,$sh_yxq,$sh_max_ci,$sh_dz,$sh_insert_time,$sh_state);
        // 执行查询
        mysqli_stmt_execute($links);
        // 获取值
        mysqli_stmt_fetch($links);
        // 关闭预处理语句
        mysqli_stmt_close($links);
    }else{
        echo "系统错误";
        exit;
    }
    mysqli_close($link);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>用户信息</title>
    <link rel="stylesheet" href="http://cdn.amazeui.org/amazeui/2.7.2/css/amazeui.min.css">
    <style>
        .card{
            /* margin:5px; */
        }
        .line{
            line-height:3rem;
            overflow: hidden;
            width:100%;
            padding:0.5rem;
        }
        .line+.line{
            border-top:1px solid #6666662b;
        }
        .line_left{
            font-size:1.3rem;
            color:#666;
        }
        .btn+.btn{
            margin-top:0.5rem;
        }
    </style>
</head>
<body>
    <div class="am-box card">
        <div class="line"><span class="line_left am-u-sm-5">商户名称：</span><span class="line_right am-u-sm-7"><?php echo $sh_name; ?></span></div>
        <div class="line"><span class="line_left am-u-sm-5">账号：</span><span class="line_right am-u-sm-7"><?php echo $sh_id; ?></span></div>
        <div class="line"><span class="line_left am-u-sm-5">有效期：</span><span class="line_right am-u-sm-7"><?php echo $sh_yxq; ?></span></div>
        <div class="line"><span class="line_left am-u-sm-5">地址：</span><span class="line_right am-u-sm-7"><?php echo $sh_dz; ?></span></div>
        <div class="line"><span class="line_left am-u-sm-5">添加时间：</span><span class="line_right am-u-sm-7"><?php echo $sh_insert_time; ?></span></div>
        <div class="line"><span class="line_left am-u-sm-5">最多拼团次数：</span><span class="line_right am-u-sm-7"><?php echo $sh_max_ci; ?></span></div>
        <div class="line"><span class="line_left am-u-sm-5">已开团数量：</span><span class="line_right am-u-sm-7"></span></div>
        <div class="line"><span class="line_left am-u-sm-5">商户状态：</span><span class="line_right am-u-sm-7"><?php echo $sh_state; ?></span></div>
        <br>
        <div class="btn"> <a href="ad_sh_list_update.php?id=<?php echo $sh_id_hash;?>" class="am-btn am-btn-primary am-radius am-btn-block">修改信息</a> </div>
        <div class="btn"> <a href="ad_sh_list.php" class="am-btn am-btn-default am-radius am-btn-block">返回</a> </div>    

    </div>
</body>
</html>