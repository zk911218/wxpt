<!DOCTYPE html>
<html lang="zh-CN">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <title>拼团列表</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://res.wx.qq.com/open/libs/weui/1.1.3/weui.min.css">
    <link rel="stylesheet" href="css/newPt.css">
    <!-- <link rel="stylesheet" href="../style/font-awesome.min.css"> -->
</head>
<body>
    <div class="container-fluid">
        <!-- 标题 -->
        <div class="weui-flex head-menu">
            <!-- 返回 -->
            <div class="weui-flex__item">
                <a type="button" class="placeholder glyphicon glyphicon-menu-left" href="javascript :history.back(-1)"></a>
            </div>
            <!-- 标题： 拼团列表 -->
            <div class="weui-flex__item">
                <div class = "placeholder head-menu-center">
                    <span>新建拼团</span>
                </div>
            </div>
            <!-- 占位 -->
            <div class="weui-flex__item"></div>
        </div>

        <!-- 内容 ——拼团玩法 -->
        <div class="ka">
            <a href=""><span class="ka-ti">丨</span><span>拼团玩法</span><span class="f-r"><i class="glyphicon glyphicon-menu-right"></i></span></a>
        </div>

        <!-- 内容 ——拼团宣传图 -->
        <div class="ka">
            <div><span class="ka-ti">丨</span><span>拼团宣传图</span></div>
            <!--图片上传-->
            <div class=" weui-cells_form"  id="uploader">
                <div class="weui-cell">
                    <!-- <div class="weui-cell__bd"> -->
                        <div class="weui-uploader">
                            <!-- <div class="weui-uploader__hd">
                                <p class="weui-uploader__title">图片上传</p>
                                <div class="weui-uploader__info"><span id="uploadCount">0</span>/1</div>
                            </div> -->
                            <div class="weui-uploader__bd">
                                <ul class="weui-uploader__files" id="uploaderFiles"></ul>
                                <div class="weui-uploader__input-box">
                                    <input id="uploaderInput" name="uploaderInput" class="weui-uploader__input" type="file" accept="image/*" multiple/>
                                </div>
                            </div>
                        </div>
                    <!-- </div> -->
                </div>
            </div>
            
        </div>

        <!-- 内容 ——基本信息 -->
        <input type="text" hidden val="" id="uploadImg" name="uploadImg">
        <div class="ka">
            <div><span class="ka-ti">丨</span><span>基本信息</span></div>
            <!-- 基本信息 -->
            <div class="jbxx">
                <div class="jbxx-item">
                    <span>拼团名称</span>
                    <input name="ptmc" type="text" class="jbxx-item-input" placeholder="请填写拼团名称" />
                </div>
                <div class="jbxx-item">
                    <span>市场价</span>
                    <span><input type="number" name="scj" id="scj" class="jbxx-item-input" required  placeholder="0.00">元</span>
                </div>
                <div class="jbxx-item">
                    <span class="ptsj" name="ptsj-b" id="ptsj-b">拼团开始时间</span>
                    <!-- <input class="ptsj" name="ptsj-b" id="ptsj-b" type="date" placeholder="拼团开始时间"/> -->
                    <span class="">——</span>
                    <span class="ptsj" name="ptsj-o" id="ptsj-o">拼团结束时间</span>
                    <!-- <input  class="ptsj" name="ptsj-o" id="ptsj-o" type="date" placeholder="拼团结束时间"/> -->
                </div>
                <div class="jbxx-item">
                    <div>拼团介绍</div>
                    <textarea name="ptjs" id="ptjs" required  placeholder="请详细阐述项目介绍等" ></textarea>
                </div>
            </div>
        </div>

        <!-- 拼团细节 -->
        <div class="ka">
            <div><span class="ka-ti">丨</span><span>参团须知</span></div>
            <div class="jbxx">
                <div class="jbxx-item">
                    <textarea name="ptjs" id="ptjs" required  placeholder="请清晰明确的描述活动规则和注意事项，字数控制在15-1000字" ></textarea>
                </div>
            </div>
        </div>

        <!-- 温馨提示 -->
        <div class="ka">
            <div><span class="ka-ti">丨</span><span>温馨提示</span></div>
                <div class="jbxx-item">
                    【立即成团】拼团截止时间马上就要到了，已有人参加的拼团人数不够还不能成团，为了不让已付钱的客户溜走，点击后可以一键成团，锁住客户跑不了！
                </div>
            </div>
        </div>

        <div class="ka f-c-f">
            <input type="submit" class="btn btn-danger f-c" value="&nbsp;保&nbsp;存&nbsp;"/>
        </div>

    </div>





<br />\n<font size='1'><table class='xdebug-error xe-notice' dir='ltr' border='1' cellspacing='0' cellpadding='1'>\n<tr><th align='left' bgcolor='#f57900' colspan=\"5\"><span style='background-color: #cc0000; color: #fce94f; font-size: x-large;'>( ! )</span> Notice: Undefined index: yh_id_hash in D:\\wamp\\www\\public\\lib\\uploadImg.php on line <i>48</i></th></tr>\n<tr><th align='left' bgcolor='#e9b96e' colspan='5'>Call Stack</th></tr>\n<tr><th align='center' bgcolor='#eeeeec'>#</th><th align='left' bgcolor='#eeeeec'>Time</th><th align='left' bgcolor='#eeeeec'>Memory</th><th align='left' bgcolor='#eeeeec'>Function</th><th align='left' bgcolor='#eeeeec'>Location</th></tr>\n<tr><td bgcolor='#eeeeec' align='center'>1</td><td bgcolor='#eeeeec' align='center'>0.0009</td><td bgcolor='#eeeeec' align='right'>406656</td><td bgcolor='#eeeeec'>{main}(  )</td><td title='D:\\wamp\\www\\public\\lib\\uploadImg.php' bgcolor='#eeeeec'>...\\uploadImg.php<b>:</b>0</td></tr>\n</table></font>\n{\"picUrl\":\"..\\/upload\\/images\\/1547149242.43315c379fba69bdc2.57094215.jpeg\"}"
​​
responseText: "<br />\n<font size='1'><table class='xdebug-error xe-notice' dir='ltr' border='1' cellspacing='0' cellpadding='1'>\n<tr><th align='left' bgcolor='#f57900' colspan=\"5\"><span style='background-color: #cc0000; color: #fce94f; font-size: x-large;'>( ! )</span> Notice: Undefined index: yh_id_hash in D:\\wamp\\www\\public\\lib\\uploadImg.php on line <i>48</i></th></tr>\n<tr><th align='left' bgcolor='#e9b96e' colspan='5'>Call Stack</th></tr>\n<tr><th align='center' bgcolor='#eeeeec'>#</th><th align='left' bgcolor='#eeeeec'>Time</th><th align='left' bgcolor='#eeeeec'>Memory</th><th align='left' bgcolor='#eeeeec'>Function</th><th align='left' bgcolor='#eeeeec'>Location</th></tr>\n<tr><td bgcolor='#eeeeec' align='center'>1</td><td bgcolor='#eeeeec' align='center'>0.0009</td><td bgcolor='#eeeeec' align='right'>406656</td><td bgcolor='#eeeeec'>{main}(  )</td><td title='D:\\wamp\\www\\public\\lib\\uploadImg.php' bgcolor='#eeeeec'>...\\uploadImg.php<b>:</b>0</td></tr>\n</table></font>\n{\"picUrl\":\"..\\/upload\\/images\\/1547149242.43315c379fba69bdc2.57094215.jpeg\"}












</body>
<script src="https://cdn.jsdelivr.net/npm/jquery@1.12.4/dist/jquery.min.js"></script>
<!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/js/bootstrap.min.js"></script> -->
<script type="text/javascript" src="https://res.wx.qq.com/open/libs/weuijs/1.1.4/weui.min.js"></script>
<script type="text/javascript">
    $('#ptsj-b').on('click', function () {
        var dt = new Date();
        var df= [dt.getFullYear(), (dt.getMonth() + 1), dt.getDate()];
        var id=dt.getFullYear()+""+dt.getMonth() +""+dt.getDate()+""+dt.getHours()+""+ dt.getMinutes()+""+dt.getSeconds();
        
        var value=$.trim($("#ptsj-b").text());
        if(value == "拼团开始时间"){
            value = "";
        }
        if(value!="")
        {
            var arrays = value.split("/");
            df= [parseInt(arrays[0]), parseInt(arrays[1]), parseInt(arrays[2])];
        }
        
        weui.datePicker({
            id: "start"+id,
            start: dt,
            end: dt.getFullYear()+2,
            defaultValue:df,
            onConfirm: function (result) {
                $("#ptsj-b").text(result[0].label.replace("年","/") + result[1].label.replace("月","/") + result[2].label.replace("日",""));
                $("#ptsj-o").text("拼团结束时间");
            }
        });
    });

    //结束日期
    $('#ptsj-o').on('click', function () {
        var dt = new Date();
        var id = dt.getFullYear() + "" + dt.getMonth() + "" + dt.getDate() + "" + dt.getHours() + "" + dt.getMinutes() + "" + dt.getSeconds();

        var std = "2019";
        var startVal = $.trim($("#ptsj-b").text());
        if(startVal == "拼团开始时间"){
            startVal = "";
            std = startVal;
            $('#ptsj-b').click();
        }
        if (startVal != "") {
            var arrays2 = startVal.split('/');
            df = [parseInt(arrays2[0]), parseInt(arrays2[1]), parseInt(arrays2[2])];
            
            if(df.length==1)
            {
                std=new Date(df[0],0,1);
            }else{
                std=new Date(df[0],df[1]-1,df[2]);
            }
            weui.datePicker({
                id: "end" + id,
                start: std,
                end: dt.getFullYear() + 2,
                defaultValue: df,
                onConfirm: function (result) {
                    $("#ptsj-o").text(result[0].label.replace("年", "/") + result[1].label.replace("月", "/") + result[2].label.replace("日", ""));
                }
            });
        }
    });

    var uploadCount = 0;
    weui.uploader('#uploader', {
        url: 'lib/uploadImg.php',
        auto: true,
        type: 'file',
        fileVal: 'uploaderInput',
        compress: {
            width: 1080,
            height: 450,
            quality: .8
        },
        onBeforeQueued: function(files) {
            // `this` 是轮询到的文件, `files` 是所有文件

            if(["image/jpg", "image/jpeg", "image/png"].indexOf(this.type) < 0){
                weui.alert('请上传正确的图片类型（jpg/jpeg/png）');
                return false; // 阻止文件添加
            }
            if(this.size > 10 * 1024 * 1024){
                weui.alert('请上传不超过10M的图片');
                return false;
            }
            if (files.length > 1) { // 防止一下子选择过多文件
                weui.alert('最多只能上传1张图片，请重新选择');
                return false;
            }
            if (uploadCount + 1 > 1) {
                weui.alert('最多只能上传1张图片');
                return false;
            }

            ++uploadCount;

            // return true; // 阻止默认行为，不插入预览图的框架
        },
        onQueued: function(){
            // console.log(this);

            console.log(this.status); // 文件的状态：'ready', 'progress', 'success', 'fail'
            // console.log(this.base64); // 如果是base64上传，file.base64可以获得文件的base64

            // this.upload(); // 如果是手动上传，这里可以通过调用upload来实现；也可以用它来实现重传。
            // this.stop(); // 中断上传

            // return true; // 阻止默认行为，不显示预览图的图像
        },
        onBeforeSend: function(data, headers){
            // console.log(this, data, headers);
            // $.extend(data, { test: 1 }); // 可以扩展此对象来控制上传参数
            // $.extend(headers, { Origin: 'http://127.0.0.1' }); // 可以扩展此对象来控制上传头部

            // return false; // 阻止文件上传
        },
        onProgress: function(procent){
            // console.log(this, procent);
            // return true; // 阻止默认行为，不使用默认的进度显示
        },
        onSuccess: function (ret) {
            console.log(this, ret);
            // return true; // 阻止默认行为，不使用默认的成功态
            // ret = jQuery.parseJSON(ret);
            if(ret.picUrl){
                $(".weui-uploader__input-box").hide();
                $("#uploadImg").val(ret.picUrl);
            }else{
                $("#uploaderFiles").empty();
                weui.alert("上传失败:" + ret.errmsg);
            }
            
        },
        onError: function(err){
            console.log(this, err);
            // $("#errcon").append(err.response);
            // return true; // 阻止默认行为，不使用默认的失败态
        }
    });

</script>
</html>