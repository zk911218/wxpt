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
        <form class="weui-cells weui-cells_form" action="" method="POST" >
            <div class="weui-cell weui-cell">
                <div class="weui-cell__hd">
                    <label class="weui-label">用户账号</label>
                </div>
                <div class="weui-cell__bd">
                    <input class="weui-input" placeholder="请输入用户账号" name="yhid" id="yhid">
                </div>
            </div>
            <div class="weui-cell weui-cell">
                <div class="weui-cell__hd">
                    <label class="weui-label">用户密码</label>
                </div>
                <div class="weui-cell__bd">
                    <input class="weui-input" type="password" name="yhpwd" id="yhpwd">
                </div>
            </div>
            <br><br>
            <button class="weui-btn weui-btn_primary">登 &nbsp; 陆</button>
        </form>

    </div>
</body>
<script src="https://cdn.bootcss.com/jquery/1.11.0/jquery.min.js"></script>
<script src="https://cdn.bootcss.com/jquery-weui/1.2.1/js/jquery-weui.min.js"></script>
<script>
    $(function(params) {
        var yhid    =   trim($("#yhid")).val();
        var yhpwd   =   md5(trim($("#yhpwd").val()));
        if (yhid != "" && yhid != null && yhpwd != "" && yhpwd != null) {
            
        }
    })
</script>
</html>