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
    <title>商户主页</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdn.bootcss.com/weui/1.1.3/style/weui.min.css">
    <link rel="stylesheet" href="https://cdn.bootcss.com/jquery-weui/1.2.1/css/jquery-weui.min.css">
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <style>
    @font-face {
        font-family: 'iconfont';  /* project id 888367 */
        src: url('//at.alicdn.com/t/font_888367_5njetokmj2u.eot');
        src: url('//at.alicdn.com/t/font_888367_5njetokmj2u.eot?#iefix') format('embedded-opentype'),
        url('//at.alicdn.com/t/font_888367_5njetokmj2u.woff') format('woff'),
        url('//at.alicdn.com/t/font_888367_5njetokmj2u.ttf') format('truetype'),
        url('//at.alicdn.com/t/font_888367_5njetokmj2u.svg#iconfont') format('svg');
    }
    .iconfont{
        font-family:"iconfont" !important;
        font-size:26px;
        font-style:normal;
        -webkit-font-smoothing: antialiased;
        -webkit-text-stroke-width: 0.2px;
        -moz-osx-font-smoothing: grayscale;
        color:green;
    }
    .weui-grid__icon+.weui-grid__label{
        margin-top:15px;
    }
    </style>
</head>
<body>
    <div id="page">
        <div class="pic">
            <img src="images/pin.png" alt="" width=100%>
        </div>
        <div class="weui-grids">
            <a href="sh_new_pt.php" class="weui-grid js_grid">
                <div class="weui-grid__icon">
                    <!-- <i class="fa fa-plus-square-o fa-2x" aria-hidden="true"></i> -->
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
                    <i class="iconfont">&#xe62d;</i>
                </div>
                <p class="weui-grid__label">
                    账户管理
                </p>
            </a>
        </div>
    </div>
</body>
</html>