<?php
    session_start();
    if(!isset($_SESSION['shUser'])||$_SESSION['shUser']['id']<>0){
       Header("Location: ../login.php"); 
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
    // $().ready(function() {
    // $("#cForm").validate({
    //             onsubmit: true, // 是否在提交是验证
    //             onfocusout: false, // 是否在获取焦点时验证
    //             onkeyup: false, // 是否在敲击键盘时验证

    //             rules: { //规则
    //                 yhname: {
    //                     required: true
    //                 },
    //                 yhid: {
    //                     required: true
    //                 },
    //                 yhpwd: {
    //                     required: true
    //                 },
    //                 yhdate: {
    //                     required: true,
    //                     date: true
    //                 },
    //                 yhnum: {
    //                     required: true,
    //                     digits: true,
    //                     min: 0
    //                 },
    //                 yhadd: {
    //                     required: true,
    //                     maxlength: 50
    //                 },
    //                 yhtel: {
    //                     required: true,
    //                     isPhone: true
    //                 }
    //             },
    //             messages: { //验证错误信息
    //                 yhname: {
    //                     required: "请输入商户名"
    //                 },
    //                 yhid: {
    //                     required: "请输入商户登陆账号"
    //                 },
    //                 yhpwd: {
    //                     required: "请输入商户登陆密码"
    //                 },
    //                 yhdate: {
    //                     required: "请选择账户有效期",
    //                     date: "请选择正确的日期"
    //                 },
    //                 yhnum: {
    //                     required: "请输入该商户最大开团次数",
    //                     digits: "请输入正确的数字",
    //                     min: "请输入正确的数字"
    //                 },
    //                 yhadd: {
    //                     required: "请输入商户地址",
    //                     maxlength: "最多可以输入50个字"
    //                 },
    //                 yhtel: {
    //                     required: "请输入商户电话",
    //                     isPhone: "请输入正确的电话号码"
    //                 }
    //             },
    //             submitHandler: function(form) { //通过之后回调
    //                 //进行ajax传值
    //                 var yhname = $.trim($("#yhname").val());
    //                 var yhid = $.trim($("#yhid").val());
    //                 var yhpwd = $.trim($("#yhpwd").val());
    //                 var yhdate = $.trim($("#yhdate").val());
    //                 var yhnum = $.trim($("#yhnum").val());
    //                 var yhadd = $.trim($("#yhadd").val());
    //                 var yhtel = $.trim($("#yhtel").val());
    //                 shpwd = $.md5(shpwd);
    //                 $.ajax({
    //                         url: "{:U('lib/ad_add_sh.php')}",
    //                         type: "post",
    //                         dataType: "json",
    //                         data: {
    //                             yhname: yhname,
    //                             yhid: yhid,
    //                             yhpwd: yhpwd,
    //                             yhdate: yhdate,
    //                             yhnum: yhnum,
    //                             yhadd: yhadd,
    //                             yhtel: yhtel
    //                         },
    //                         success: function(date) {
    //                             if (date == "success") {
    //                                 window.location.href = myUrl;
    //                             } else if (date == "error") {
    //                                 $.toptip('账号或密码错误', 'error');
    //                             } else {
    //                                 $.toptip('错误', 'error');
    //                             }
    //                         })
    //                 }
    //             });
    //     },
    //     invalidHandler: function(form, validator) {
    //         return false;
    //     }
    // });
    // });

    // jQuery.validator.addMethod("isPhone", function(value, element) {
    //     var length = value.length;
    //     var mobile = /^(((13[0-9]{1})|(15[0-9]{1}))+\d{8})$/;
    //     var tel = /^\d{3,4}-?\d{7,9}$/;
    //     return this.optional(element) || (tel.test(value) || mobile.test(value));
    // }, "请输入正确的电话");


    $(function() {
        $("#btn").click(function() {
            var yhname = $.trim($("#yhname").val());
            var yhid = $.trim($("#yhid").val());
            var yhpwd = $.trim($("#yhpwd").val());
            var yhdate = $.trim($("#yhdate").val());
            var yhnum = $.trim($("#yhnum").val());
            var yhadd = $.trim($("#yhadd").val());
            var yhtel = $.trim($("#yhtel").val());
            // alert("dd");
            $("#con").html("");
            // $("#con").append("<br>yhname:"+yhname);
            // $("#con").append("<br>yhid:"+yhid);
            // $("#con").append("<br>yhpwd:"+yhpwd);
            // $("#con").append("<br>yhdate:"+yhdate);
            // $("#con").append("<br>yhnum:"+yhnum);
            // $("#con").append("<br>yhadd:"+yhadd);
            // $("#con").append("<br>yhtel:"+yhtel);


            if (yhname!=null&&yhname!=""&&yhid!=null&&yhid!=""&&yhpwd!=null&&yhpwd!=""&&yhdate!=null&&yhdate!=""&&yhnum!=null&&yhnum!=""&&yhadd!=null&&yhadd!=""&&yhtel!=null&&yhtel!="") {
                // alert("进来了");
                // $("#con").append("<br>进来了<br>");
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
                        // alert(date);
                        $("#con").append(date);
                        switch (date) {
                            case "success":
                                $.toast('添加成功');
                                // window.location.href = myUrl;
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
                                $.toptip('没有权限', 'error');
                                window.location.href = loginUrl;
                                break;
                            default:
                                break;
                        }
                        
                        // if (date == "success") {
                        //     window.location.href = myUrl;
                        // } else if (date == "error") {
                        //     $.toptip('账号或密码错误', 'error');
                        // } else {
                        //     $.toptip('错误', 'error');
                        // }
                    })
            }

            // if (shid != "" && shid != null) {
            //     if (shpwd != "" && shpwd != null) {
            //         shpwd = $.md5(shpwd);
            //         $.post("lib/sh_login.php", {
            //             uid: shid,
            //             upwd: shpwd
            //         }, function(date) {
            //             if (date == "success") {
            //                 window.location.href = myUrl;
            //             } else if (date == "error") {
            //                 $.toptip('账号或密码错误', 'error');
            //             } else {
            //                 $.toptip('错误', 'error');
            //             }
            //         })
            //     } else {
            //         $.toptip('请输入密码', 'warning');
            //         $("#yhpwd").focus();
            //     }
            // } else {
            //     $.toptip('请输入账号', 'warning');
            //     $("#yhid").focus();
            // }
        });
    });

    $("#yhdate").calendar({
        minDate: Date() + 1,
        dateFormat: 'yyyy-mm-dd'
    });


    // $(function() {
    //     $("#yhpwd").change(function() {
    //         $("#yhpwd").val($.md5($("#yhpwd").val()));
    //     })
    // });


    // weui.form.validate('#form', function(error) {
    //     if (!error) {
    //         var loading = weui.loading('提交中...');
    //         setTimeout(function() {
    //             loading.hide();
    //             weui.toast('提交成功', 3000);
    //         }, 1500);
    //     }
    // });
</script>


</html>