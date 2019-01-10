<?php
    session_start();
    if(!isset($_SESSION['shUser'])){
       Header("Location: sh_login.php"); 
       exit;
    }
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>主页</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdn.bootcss.com/weui/1.1.3/style/weui.min.css">
    <link rel="stylesheet" href="css/font.css">
    <!-- <link rel="stylesheet" href="https://cdn.bootcss.com/jquery-weui/1.2.1/css/jquery-weui.min.css"> -->
    <!-- <link rel="stylesheet" href="css/font-awesome.min.css"> -->
    <!-- <script src="https://cdn.bootcss.com/jquery/1.11.0/jquery.min.js"></script>
    <script src="https://cdn.bootcss.com/jquery-weui/1.2.1/js/jquery-weui.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Swiper/4.x.x/css/swiper.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Swiper/4.x.x/js/swiper.min.js"></script> -->
    <style>
        .iconfont{
            font-family:"iconfont" !important;
            font-size:26px;
            font-style:normal;
            -webkit-font-smoothing: antialiased;
            -webkit-text-stroke-width: 0.2px;
            -moz-osx-font-smoothing: grayscale;
            color:red;
            font-wight:block;
        }
        .weui-grid__icon+.weui-grid__label{
            margin-top:15px;
        }
        .pic img{
            max-height:250px;
            width:100%;
        }
    </style>
</head>
<body>
    <div id="page">
        <div class="pic">
            <div class="swiper-slide"><img src="images/pin.png" alt=""></div>
        </div>
        <div class="weui-grids">
            <a href="sh_newPt.php" class="weui-grid js_grid">
                <div class="weui-grid__icon">
                    <i class="iconfont">&#xe602;</i>
                </div>
                <p class="weui-grid__label">
                    新增拼团
                </p>
            </a>
            <a href="sh_pt.php#now" class="weui-grid js_grid">
                <div class="weui-grid__icon">
                    <i class="iconfont">&#xe621;</i>
                </div>
                <p class="weui-grid__label">
                    当前拼团
                </p>
            </a>
            <a href="sh_pt.php#history" class="weui-grid js_grid">
                <div class="weui-grid__icon">
                    <i class="iconfont">&#xe60a;</i>
                </div>
                <p class="weui-grid__label">
                    历史拼团
                </p>
            </a>
            <a href="sh_gmcx.php" class="weui-grid js_grid">
                <div class="weui-grid__icon">
                    <i class="iconfont">&#xe600;</i>
                </div>
                <p class="weui-grid__label">
                    订单查询
                </p>
            </a>
            <a href="sh_zd.php" class="weui-grid js_grid">
                <div class="weui-grid__icon">
                    <i class="iconfont">&#xe757;</i>
                </div>
                <p class="weui-grid__label">
                    账单
                </p>
            </a>
            <a href="sh_my.php" class="weui-grid js_grid">
                <div class="weui-grid__icon">
                    <i class="iconfont">&#xe603;</i>
                </div>
                <p class="weui-grid__label">
                    账户管理
                </p>
            </a>
        </div>
    </div>
</body>

</html>