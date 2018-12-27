<?php
    session_start();
    if(!isset($_SESSION['adUser'])){
       Header("Location: ad_login.php"); 
       exit;
    }
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>管理后台</title>
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
        <div class="weui-grids">
            <a href="ad_add_sh.php" class="weui-grid js_grid">
                <div class="weui-grid__icon">
                    <i class="iconfont">&#xe60b;</i>
                </div>
                <p class="weui-grid__label">
                    新增商户
                </p>
            </a>
            <a href="ad_sh_list.php" class="weui-grid js_grid">
                <div class="weui-grid__icon">
                    <i class="iconfont">&#xe60e;</i>
                </div>
                <p class="weui-grid__label">
                    当前商户
                </p>
            </a>
            <a href="" class="weui-grid js_grid">
                <div class="weui-grid__icon">
                    <i class="iconfont">&#xe609;</i>
                </div>
                <p class="weui-grid__label">
                    平台拼团
                </p>
            </a>
            <a href="" class="weui-grid js_grid">
                <div class="weui-grid__icon">
                    <i class="iconfont">&#xe60c;</i>
                </div>
                <p class="weui-grid__label">
                    平台订单
                </p>
            </a>
            <a href="" class="weui-grid js_grid">
                <div class="weui-grid__icon">
                    <i class="iconfont">&#xe61e;</i>
                </div>
                <p class="weui-grid__label">
                    平台账单
                </p>
            </a>
            <a href="" class="weui-grid js_grid">
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