<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>登陆</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdn.bootcss.com/weui/1.1.3/style/weui.min.css">
    <link rel="stylesheet" href="https://cdn.bootcss.com/jquery-weui/1.2.1/css/jquery-weui.min.css">
    <link rel="stylesheet" href="css/font-awesome.min.css">
</head>

<body>
    <div class="app">
        <div class="weui-cells weui-cells_form">
            <div class="weui-cell weui-cell">
                <div class="weui-cell__hd">
                    <label class="weui-label">用户账号</label>
                </div>
                <div class="weui-cell__bd">
                    <input class="weui-input" placeholder="请输入用户账号" name="shid" id="shid">
                </div>
            </div>
            <div class="weui-cell weui-cell">
                <div class="weui-cell__hd">
                    <label class="weui-label">用户密码</label>
                </div>
                <div class="weui-cell__bd">
                    <input class="weui-input" type="password" name="shpwd" id="shpwd">
                </div>
            </div>
            <br><br>
            <button class="weui-btn weui-btn_primary" id="btn">登 &nbsp; 陆</button>
        </div>
    </div>
</body>
<script src="https://cdn.bootcss.com/jquery/1.11.0/jquery.min.js"></script>
<script src="https://cdn.bootcss.com/jquery-weui/1.2.1/js/jquery-weui.min.js"></script>
<script src="http://www.gongjuji.net/Content/files/jquery.md5.js"></script>
<script>
    $(function() {
        $("#btn").click(function() {
            var shid = $.trim($("#shid").val());
            var shpwd = $.trim($("#shpwd").val());
            if (shid != "" && shid != null) {
                if (shpwd != "" && shpwd != null) {
                    shpwd = $.md5(shpwd);
                    $.post("lib/ad_login.php", {
                        uid: shid,
                        upwd: shpwd
                    }, function(data) {
                        if (data == "success") {
                            window.location.href = "ad_index.php";
                        }else if (data == "error"){
                            $.toptip('账号或密码错误', 'error');
                        }else{
                            $.toptip('登陆错误', 'error');
                        }
                    })
                } else {
                    $.toptip('请输入密码', 'warning');
                    $("#yhpwd").focus();
                }
            } else {
                $.toptip('请输入账号', 'warning');
                $("#yhid").focus();
            }
        });
    });
</script>

</html>