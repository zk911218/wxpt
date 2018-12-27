<?php
    session_start();
    if(!isset($_SESSION['adUser'])){
       Header("Location:ad_login.php"); 
       exit;
    }
    $sh_id_hash    =   isset($_GET["id"]) ? $_GET["id"] : 0;
    if (!$sh_id_hash) {
        exit;
    }
    include_once("lib/conn.php");
   
    // 创建预处理语句
    $links=  mysqli_stmt_init($link);
    if(mysqli_stmt_prepare($links, "SELECT id,sh_name,sh_id,sh_yxq,sh_max_ci,sh_dz,sh_dh,sh_insert_time,sh_state FROM `wx_pt_sh` WHERE sh_id_hash = ?;")){
         // 绑定参数
        mysqli_stmt_bind_param($links,'s',$sh_id_hash);
        // 绑定结果变量
        mysqli_stmt_bind_result($links,$id,$sh_name,$sh_id,$sh_yxq,$sh_max_ci,$sh_dz,$sh_dh,$sh_insert_time,$sh_state);
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
    if (!isset($id)) {
        Header("Location:ad_sh_list.php?error=1");
        exit;
    }
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>修改商户信息</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdn.bootcss.com/weui/1.1.3/style/weui.min.css">
    <link rel="stylesheet" href="https://cdn.bootcss.com/jquery-weui/1.2.1/css/jquery-weui.min.css">
    <!-- <link rel="stylesheet" href="css/font-awesome.min.css"> -->
</head>

<body>
    <div class="app">
        <!-- <h2>修改商户信息</h2> -->
        <!-- <form class="weui-cells weui-cells_form" id="form" action="lib\ad_add_sh.php" method="post"> -->
        <div class="weui-cells weui-cells_form" id="form">
            <div class="weui-cell">
                <div class="weui-cell__hd"><label class="weui-label">商户名：</label></div>
                <div class="weui-cell__bd">
                    <input class="weui-input" required emptyTips="请输入商户名" notMatchTips="请输入商户名"
                        name="yhname" id="yhname" value="<?php echo $sh_name; ?>" >
                </div>
            </div>
            <div class="weui-cell weui-cell">
                <div class="weui-cell__hd">
                    <label class="weui-label">用户账号：</label>
                </div>
                <div class="weui-cell__bd">
                    <input class="weui-input" required name="yhid" id="yhid" value="<?php echo $sh_id; ?>" >
                </div>
            </div>
            <div class="weui-cell">
                <div class="weui-cell__hd"><label for="" class="weui-label">账户有效期止</label></div>
                <div class="weui-cell__bd">
                    <input class="weui-input" required type="text" value="<?php echo $sh_yxq; ?>"  name="yhdate" id="yhdate">
                </div>
            </div>
            <div class="weui-cell weui-cell">
                <div class="weui-cell__hd">
                    <label class="weui-label">最大开团次数</label>
                </div>
                <div class="weui-cell__bd">
                    <input class="weui-input" required type="number" name="yhnum" id="yhnum" value="<?php echo $sh_max_ci; ?>" >
                </div>
            </div>
            <div class="weui-cells__tips"><i class="weui-icon-info-circle"></i> 注意：如果不限制次数，此处输入0</div>
            <div class="weui-cell weui-cell">
                <div class="weui-cell__hd">
                    <label class="weui-label">商户地址</label>
                </div>
                <div class="weui-cell__bd">
                    <textarea class="weui-textarea" required rows="2" name="yhadd" id="yhadd" ><?php echo $sh_dz; ?></textarea>
                </div>
            </div>
            <div class="weui-cell weui-cell">
                <div class="weui-cell__hd">
                    <label class="weui-label">商户电话</label>
                </div>
                <div class="weui-cell__bd">
                    <input class="weui-input" type="tel" name="yhtel" id="yhtel" required emptyTips="请输入正确的商户电话"
                        notMatchTips="请输入商户电话" pattern="[0-9]{11}" value="<?php echo $sh_dh; ?>" >
                </div>
            </div>
            <div class="weui-cell weui-cell">
                <div class="weui-cell__bd">
                    <label class="weui-label">有效状态</label>
                </div>
                <div class="weui-cell__ft">
                    <input class="weui-switch" type="checkbox" id="sh_state1" name="sh_state1" <?php if($sh_state=="Y"){echo "checked";} ?> >
                    <input hidden="hidden" id="sh_state" name="sh_state" value="<?php echo $sh_state; ?>" />
                </div>
            </div>
            <br>
            <button class="weui-btn weui-btn_primary" id="btn">确定修改用户信息</button>
            <button class="weui-btn weui-btn_default" id="btnReturn" onclick="javascript:history.back(-1);" >返 回</button>
        </div>
        <div id="con"></div>

    </div>
</body>
<script src="https://cdn.bootcss.com/jquery/1.11.0/jquery.min.js"></script>
<script src="https://res.wx.qq.com/open/libs/weuijs/1.1.3/weui.min.js"></script>
<script src="https://cdn.bootcss.com/jquery-weui/1.2.1/js/jquery-weui.min.js"></script>
<script>
    $(function() {
        $("#sh_state1").bind("click", function () {
            if($("#sh_state").val()=="N"){
                $("#sh_state").val("Y");
            }else{
                $("#sh_state").val("N");
            }
        });
        $("#btn").click(function() {
            var yhname = $.trim($("#yhname").val());
            var yhid = $.trim($("#yhid").val());
            var yhdate = $.trim($("#yhdate").val());
            var yhnum = $.trim($("#yhnum").val());
            var yhadd = $.trim($("#yhadd").val());
            var yhtel = $.trim($("#yhtel").val());
            var yhstate = $.trim($("#sh_state").val());
            var id  = "<?php echo $sh_id_hash;?>";

            var successUrl = "ad_sh_list_more.php?id=<?php echo $sh_id_hash; ?>";
            var loginUrl = "ad_login.php";

            $("#con").html("");

            if (yhname!=null&&yhname!=""&&yhid!=null&&yhid!=""&&yhdate!=null&&yhdate!=""&&yhnum!=null&&yhnum!=""&&yhadd!=null&&yhadd!=""&&yhtel!=null&&yhtel!="") {
                
                $.post("lib/ad_sh_list_update.php", {
                        yhname: yhname,
                        yhid: yhid,
                        yhdate: yhdate,
                        yhnum: yhnum,
                        yhadd: yhadd,
                        yhtel: yhtel,
                        yhstate: yhstate,
                        id: id
                    }, function(date) {
                        // $("#con").append(date);
                        switch (date) {
                            case "success":
                                $.toast('修改成功',function(){
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
                $.toptip('请完整填写所有内容', 'error');
            }
        });
    });

    $("#yhdate").calendar({
        minDate: Date() + 1,
        dateFormat: 'yyyy-mm-dd'
    });
</script>


</html>