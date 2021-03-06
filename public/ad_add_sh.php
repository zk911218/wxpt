<?php
    session_start();
    if(!isset($_SESSION['adUser'])){
       Header("Location:ad_login.php"); 
       exit;
    }
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>新建账户</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdn.bootcss.com/weui/1.1.3/style/weui.min.css">
    <link rel="stylesheet" href="https://cdn.bootcss.com/jquery-weui/1.2.1/css/jquery-weui.min.css">
    <link rel="stylesheet" href="css/font-awesome.min.css">
</head>

<body>
    <div class="app">
        <!-- <form class="weui-cells weui-cells_form" id="form" action="lib\ad_add_sh.php" method="post"> -->
        <div class="weui-cells weui-cells_form" id="form">
            <div class="weui-cell">
                <div class="weui-cell__hd"><label class="weui-label">商户名</label></div>
                <div class="weui-cell__bd">
                    <input class="weui-input" required placeholder="请输入商户名" emptyTips="请输入商户名" notMatchTips="请输入商户名"
                        name="yhname" id="yhname">
                </div>
            </div>
            <div class="weui-cell weui-cell">
                <div class="weui-cell__hd">
                    <label class="weui-label">用户账号</label>
                </div>
                <div class="weui-cell__bd">
                    <input class="weui-input" required placeholder="请输入用户账号" name="yhid" id="yhid">
                </div>
            </div>
            <div class="weui-cell weui-cell">
                <div class="weui-cell__hd">
                    <label class="weui-label">用户密码</label>
                </div>
                <div class="weui-cell__bd">
                    <input class="weui-input" required type="password" name="yhpwd" id="yhpwd">
                </div>
            </div>
            <div class="weui-cell">
                <div class="weui-cell__hd"><label for="" class="weui-label">账户有效期止</label></div>
                <div class="weui-cell__bd">
                    <input class="weui-input" required type="text" value="" name="yhdate" id="yhdate">
                </div>
            </div>
            <div class="weui-cell weui-cell">
                <div class="weui-cell__hd">
                    <label class="weui-label">最大开团次数</label>
                </div>
                <div class="weui-cell__bd">
                    <input class="weui-input" required type="number" name="yhnum" id="yhnum">
                </div>
            </div>
            <div class="weui-cells__tips"><i class="fa fa-exclamation-triangle"></i> 如果不限制次数，此处输入0</div>
            <div class="weui-cell weui-cell">
                <div class="weui-cell__hd">
                    <label class="weui-label">商户地址</label>
                </div>
                <div class="weui-cell__bd">
                    <textarea class="weui-textarea" required rows="2" name="yhadd" id="yhadd"></textarea>
                </div>
            </div>
            <div class="weui-cell weui-cell">
                <div class="weui-cell__hd">
                    <label class="weui-label">商户电话</label>
                </div>
                <div class="weui-cell__bd">
                    <input class="weui-input" type="tel" name="yhtel" id="yhtel" required emptyTips="请输入正确的商户电话"
                        notMatchTips="请输入商户电话" pattern="[0-9]{11}">
                </div>
            </div>
            <br>
            <button class="weui-btn weui-btn_primary" id="btn">确定增加用户</button>
        </div>
        <div id="con"></div>

    </div>
</body>
<script src="https://cdn.bootcss.com/jquery/1.11.0/jquery.min.js"></script>
<script src="https://res.wx.qq.com/open/libs/weuijs/1.1.3/weui.min.js"></script>
<script src="https://cdn.bootcss.com/jquery-weui/1.2.1/js/jquery-weui.min.js"></script>
<script src="http://www.gongjuji.net/Content/files/jquery.md5.js"></script>
<!-- <script src="http://static.runoob.com/assets/jquery-validation-1.14.0/dist/jquery.validate.min.js"></script>
<script src="http://static.runoob.com/assets/jquery-validation-1.14.0/dist/localization/messages_zh.js"></script> -->

<script>

    $(function() {
        $("#btn").click(function() {
            var yhname = $.trim($("#yhname").val());
            var yhid = $.trim($("#yhid").val());
            var yhpwd = $.trim($("#yhpwd").val());
            var yhdate = $.trim($("#yhdate").val());
            var yhnum = $.trim($("#yhnum").val());
            var yhadd = $.trim($("#yhadd").val());
            var yhtel = $.trim($("#yhtel").val());
            var successUrl = "ad_index.php";
            var loginUrl = "ad_login.php";
            // $("#con").html("");


            if (yhname!=null&&yhname!=""&&yhid!=null&&yhid!=""&&yhpwd!=null&&yhpwd!=""&&yhdate!=null&&yhdate!=""&&yhnum!=null&&yhnum!=""&&yhadd!=null&&yhadd!=""&&yhtel!=null&&yhtel!="") {

                yhpwd = $.md5(yhpwd);
                $.post("lib/ad_add_sh.php", {
                        yhname: yhname,
                        yhid: yhid,
                        yhpwd: yhpwd,
                        yhdate: yhdate,
                        yhnum: yhnum,
                        yhadd: yhadd,
                        yhtel: yhtel
                    }, function(date) {
                        // $("#con").append(date);
                        switch (date) {
                            case "success":
                                $.toast('添加成功',function(){
                                    window.location.href = successUrl;
                                });
                                break;
                            case "error1":
                                $.toptip('添加失败', 'error');
                                break;
                            case "error2":
                                $.toptip('提交的数据有空值', 'error');
                                break;
                            case "error3":
                                $.toptip('电话填写错误', 'error');
                                break;
                            case "error4":
                                $.toptip('最大开团数错误', 'error');
                                break;
                            case "error5":
                                $.toast('没有权限', 'error',function(){
                                    window.location.href = loginUrl;
                                });
                                break;
                            default:
                                break;
                        }
                    })
            }else{
                $.toptip('请完整输入所有的信息', 'error');
            }
        });
    });

    $("#yhdate").calendar({
        minDate: Date() + 1,
        dateFormat: 'yyyy-mm-dd'
    });
</script>


</html>