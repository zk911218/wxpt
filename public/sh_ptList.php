<!DOCTYPE html>
<html lang="zh-CN">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <title>拼团列表</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://res.wx.qq.com/open/libs/weui/1.1.3/weui.min.css">
    <!-- <link rel="stylesheet" href="../style/font-awesome.min.css"> -->
    
    <style>
    a:hover ,a:active ,a:visited {
        color: black;
        text-decoration: none;
    }
    .f-l{
        float: left;
    }
    .f-r{
        float: right;
    }
    .container-fluid{
        margin: 0px;
        padding: 0px;
    }
    .head-menu{
        height: 14px;
        line-height: 14px;
        margin: 13px 10px;
    }
    .head-menu-center{
        text-align: center;
        margin: auto;
        font-size: 18px;
    }
    .head-menu-question{
        font-size: 14px;
        color: red;
    }
    .head-menu-right,.head-menu-right:hover,.head-menu-right:active,.head-menu-right:visited{
        text-align: right;
        display: block;
        color: red;
    }
    .zk-navbar{
        height: 50px;
    }
    .navbar-item{
        background-color: white;
        color: dimgrey;
        border: 0px;
        text-align: center;
        line-height: 48px;
    }
    .navbar-item-on{
        color: red;
        border-bottom: 2px solid red;
        background-color: white;
    }
    .navbar-panel{
        overflow: hidden;
        clear: both;
        background-color: rgb(240, 240, 240);
    }
    .navbar-item-panel{
        display: none;
        margin: 10px;
    }
    .navbar-item-panel-on{
        display: block;
    }
    .zk-ka{
        background-color: white;
        padding: 10px;
        overflow: hidden;
        margin-bottom: 10px;
        border-radius: 7px;
    }
    .ka-title{
        position: relative;
    }
    .ka-title-title{
        font-size: 16px;
    }
    .ka-kaituan{
        clear: both;
        display: block;
        margin-top: 10px;
    }
    .ka-kaituan-qk{
        float: left;
        background-color: rgb(240, 240, 240);
        display: block;
        padding: 10px;
        width: 80px;
        height: 80px;
    }
    .ka-kaituan-qk+.ka-kaituan-qk{
        margin-left: 10px;
    }
    .ka-kaituan-shuzi-qk-shuzi{
        display: block;
        font-size: 18px;
        text-align: center;
    }
    .ka-kaituan-shuzi-qk-wenzi{
        display: block;
        text-align: center;
    }
    .ka-kaituan-btn{
        height: 90px;
        line-height: 90px;
        position: relative;
        z-index: 10;
    }
    .ka-tuan{
        clear: both;
        margin-top: 5px;
    }
    .ka-tuan li{
        list-style: none;
        font-size: 12px;
    }
    .ka-tuan-i{
        color: red;
    }
    .ka-shouru{
        clear: both;
    }
    .ka-shouru-1{
        color: red;
        font-size: 12px;
    }
    .ka-shouru-2{
        color: red;
        font-size: 16px;
    }
    .ka-time{
        font-size: 12px;
        font-size: #333;
        clear: both;
    }
    .ka-title-bg{
        /* background: url(../images/cg.png) center center no-repeat; */
        height: 80px;
        width: 80px;
        position: absolute;
        top: -30px;
        right: 0px;
        float: right;
        opacity: 0.5;
    }
    </style>
</head>
<body>
<div class="container-fluid ">
    <!-- 标题 -->
    <div class="weui-flex head-menu">
        <!-- 返回 -->
        <div class="weui-flex__item">
            <a type="button" class="placeholder glyphicon glyphicon-menu-left" href="javascript :history.back(-1)"></a>
        </div>
        <!-- 标题： 拼团列表 -->
        <div class="weui-flex__item">
            <div class = "placeholder head-menu-center">
                <span>拼团列表</span>
                <a class="glyphicon glyphicon-question-sign head-menu-question" href=""></a>

            </div>
        </div>
        <!-- 新建拼团 -->
        <div class="weui-flex__item"><a class = "placeholder head-menu-right" href="">新建拼团</a></div>
    </div>

    <!-- 顶部navbar -->
    <div class="zk-navbar weui-flex">
        <div class="weui-flex__item navbar-item navbar-item-on" data-panel="navbar-item-panel-1">
            进行中
        </div>
        <div class="weui-flex__item navbar-item" data-panel="navbar-item-panel-2">
            未开始
        </div>
        <div class="weui-flex__item navbar-item" data-panel="navbar-item-panel-3">
            已失效
        </div>
    </div>

    <!-- 内容 -->
    <div class="navbar-panel">
        <!-- 进行中 -->
        <div class="navbar-item-panel navbar-item-panel-1 navbar-item-panel-on">
            <!-- 卡片 -->
            <div class="zk-ka">
                <!-- 标题 -->
                <div class="ka-title">
                    <span class="ka-title-title">秋季养生【限时大秒杀】</span>
                    <span class="title-Badge weui-badge">阶梯价格团</span>
                </div>
                <!-- 开团情况 -->
                <div class="ka-kaituan">
                    <div class="ka-kaituan-qk"><span class="ka-kaituan-shuzi-qk-shuzi">1</span><span class="ka-kaituan-shuzi-qk-wenzi">已付款</span></div>
                    <div class="ka-kaituan-qk"><span class="ka-kaituan-shuzi-qk-shuzi">2</span><span class="ka-kaituan-shuzi-qk-wenzi">已开团</span></div>
                    <div class="ka-kaituan-qk"><span class="ka-kaituan-shuzi-qk-shuzi">3</span><span class="ka-kaituan-shuzi-qk-wenzi">未开团</span></div>
                    <div class="ka-kaituan-btn f-r"><a href="javascript:;" class="btn btn-success ">立即成团</a></div>
                </div>
                <!-- 组团规则 -->
                <div class="ka-tuan">
                    <ul class="f-l">
                        <li><i class="glyphicon glyphicon-shopping-cart ka-tuan-i"></i>  1人团  ￥699.00</li>
                        <li><i class="glyphicon glyphicon-shopping-cart ka-tuan-i"></i>  2人团  ￥499.00</li>
                        <li><i class="glyphicon glyphicon-shopping-cart ka-tuan-i"></i>  3人团  ￥299.00</li>
                    </ul>
                    <div class="f-r"><a href="javascript:;" class="btn btn-danger">&nbsp;&nbsp;&nbsp;&nbsp;终止&nbsp;&nbsp;&nbsp;&nbsp;</a></div>
                </div>
                <!-- 拼团收入 -->
                <div class="ka-shouru">
                    <span class="ka-shouru-1">拼团收入（元）：</span>
                    <span class="ka-shouru-2">100.00</span>
                </div>
                <!-- 结束时间 -->
                <div class="ka-time">
                    活动结束时间：
                    2018-10-31
                </div>
            </div>
            <!-- 卡片END -->
        </div>
        
        <!-- 未开始 -->
        <div class="navbar-item-panel navbar-item-panel-2">
            
            <!-- 卡片 -->
            <div class="zk-ka">
                <!-- 标题 -->
                <div class="ka-title">
                    <span class="ka-title-title">秋季养生【限时大秒杀】</span>
                    <span class="title-Badge weui-badge">阶梯价格团</span>
                </div>
                <!-- 组团规则 -->
                <div class="ka-tuan">
                    <ul class="f-l">
                        <li><i class="glyphicon glyphicon-shopping-cart ka-tuan-i"></i>  1人团  ￥699.00</li>
                        <li><i class="glyphicon glyphicon-shopping-cart ka-tuan-i"></i>  2人团  ￥499.00</li>
                        <li><i class="glyphicon glyphicon-shopping-cart ka-tuan-i"></i>  3人团  ￥299.00</li>
                    </ul>
                    <div class="f-r"><a href="javascript:;" class="btn btn-default">&nbsp;&nbsp;&nbsp;&nbsp;编辑&nbsp;&nbsp;&nbsp;&nbsp;</a></div>
                </div>
                <!-- 开始时间 -->
                <div class="ka-time">
                    活动开始时间：
                    2018-10-31
                </div>
            </div>
            <!-- 卡片END -->
        </div>

        <!-- 已失效 -->
        <div class="navbar-item-panel navbar-item-panel-3">
            <!-- 卡片 -->
            <div class="zk-ka">
                <!-- 标题 -->
                <div class="ka-title">
                    <span class="ka-title-title">秋季养生【限时大秒杀】</span>
                    <span class="title-Badge weui-badge">阶梯价格团</span>
                    <!-- <img class="ka-title-bg" src="/admins/images/cg.png" alt="成功"> -->
                    <img class="ka-title-bg" src="/admins/images/sb.png" alt="失败">
                </div>
                <!-- 开团情况 -->
                <div class="ka-kaituan">
                    <div class="ka-kaituan-qk"><span class="ka-kaituan-shuzi-qk-shuzi">1</span><span class="ka-kaituan-shuzi-qk-wenzi">已付款</span></div>
                    <div class="ka-kaituan-qk"><span class="ka-kaituan-shuzi-qk-shuzi">2</span><span class="ka-kaituan-shuzi-qk-wenzi">已开团</span></div>
                    <div class="ka-kaituan-qk"><span class="ka-kaituan-shuzi-qk-shuzi">3</span><span class="ka-kaituan-shuzi-qk-wenzi">未开团</span></div>
                    <div class="ka-kaituan-btn f-r"><a href="javascript:;" class="btn btn-default">编辑再用</a></div>
                </div>
                <!-- 组团规则 -->
                <div class="ka-tuan">
                    <ul class="f-l">
                        <li><i class="glyphicon glyphicon-shopping-cart ka-tuan-i"></i>  1人团  ￥699.00</li>
                        <li><i class="glyphicon glyphicon-shopping-cart ka-tuan-i"></i>  2人团  ￥499.00</li>
                        <li><i class="glyphicon glyphicon-shopping-cart ka-tuan-i"></i>  3人团  ￥299.00</li>
                    </ul>
                </div>
                <!-- 拼团收入 -->
                <div class="ka-shouru">
                    <span class="ka-shouru-1">拼团收入（元）：</span>
                    <span class="ka-shouru-2">100.00</span>
                </div>
                <!-- 结束时间 -->
                <div class="ka-time">
                    活动有效期：
                    2018-8-31
                    至
                    2018-9-30
                </div>
            </div>
            <!-- 卡片END -->

            <!-- 卡片 -->
            <div class="zk-ka">
                <!-- 标题 -->
                <div class="ka-title">
                    <span class="ka-title-title">秋季养生【限时大秒杀】</span>
                    <span class="title-Badge weui-badge">阶梯价格团</span>
                    <img class="ka-title-bg" src="/admins/images/cg.png" alt="成功">
                    <!-- <img class="ka-title-bg" src="/admins/images/sb.png" alt="失败"> -->
                </div>
                <!-- 开团情况 -->
                <div class="ka-kaituan">
                    <div class="ka-kaituan-qk"><span class="ka-kaituan-shuzi-qk-shuzi">1</span><span class="ka-kaituan-shuzi-qk-wenzi">已付款</span></div>
                    <div class="ka-kaituan-qk"><span class="ka-kaituan-shuzi-qk-shuzi">2</span><span class="ka-kaituan-shuzi-qk-wenzi">已开团</span></div>
                    <div class="ka-kaituan-qk"><span class="ka-kaituan-shuzi-qk-shuzi">3</span><span class="ka-kaituan-shuzi-qk-wenzi">未开团</span></div>
                    <div class="ka-kaituan-btn f-r"><a href="javascript:;" class="btn btn-default">编辑再用</a></div>
                </div>
                <!-- 组团规则 -->
                <div class="ka-tuan">
                    <ul class="f-l">
                        <li><i class="glyphicon glyphicon-shopping-cart ka-tuan-i"></i>  1人团  ￥699.00</li>
                        <li><i class="glyphicon glyphicon-shopping-cart ka-tuan-i"></i>  2人团  ￥499.00</li>
                        <li><i class="glyphicon glyphicon-shopping-cart ka-tuan-i"></i>  3人团  ￥299.00</li>
                    </ul>
                </div>
                <!-- 拼团收入 -->
                <div class="ka-shouru">
                    <span class="ka-shouru-1">拼团收入（元）：</span>
                    <span class="ka-shouru-2">100.00</span>
                </div>
                <!-- 结束时间 -->
                <div class="ka-time">
                    活动有效期：
                    2018-8-31
                    至
                    2018-9-30
                </div>
            </div>
            <!-- 卡片END -->




        </div>
    </div>

    <!-- 底部导航tab -->
    <div></div>
</div>
</body>
<script src="https://cdn.jsdelivr.net/npm/jquery@1.12.4/dist/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/js/bootstrap.min.js"></script>
<script type="text/javascript" src="https://res.wx.qq.com/open/libs/weuijs/1.1.4/weui.min.js"></script>
<script type="text/javascript">
    $(function(){
        $('.navbar-item').on('click', function () {
            $(this).addClass('navbar-item-on').siblings('.navbar-item-on').removeClass('navbar-item-on');
            var panel = "." + $(this).data('panel');
            $(".navbar-item-panel").removeClass('navbar-item-panel-on');
            $(panel).addClass('navbar-item-panel-on');
        });
    });
</script>
</html>