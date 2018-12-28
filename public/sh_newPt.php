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
            <!-- 上传图片 并显示 -->
            <div class="uploadPic">
                <img src="/userUpload/images/pt.jpg" alt="拼团宣传图" id="uploadPic">
            </div>

            <!--图片上传-->
            <div class="weui-gallery" id="gallery">
                <span class="weui-gallery__img" id="galleryImg"></span>
                <div class="weui-gallery__opr">
                    <a href="javascript:" class="weui-gallery__del">
                        <i class="weui-icon-delete weui-icon_gallery-delete"></i>
                    </a>
                </div>
            </div>
            <div class="weui-cells weui-cells_form">
                <div class="weui-cell">
                    <div class="weui-cell__bd">
                        <div class="weui-uploader">
                            <div class="weui-uploader__hd">
                                <p class="weui-uploader__title">图片上传</p>
                            </div>
                            <div class="weui-uploader__bd">
                                <ul class="weui-uploader__files" id="uploaderFiles">
                                    
                                </ul>
                                <div class="weui-uploader__input-box">
                                    <input id="uploaderInput" class="weui-uploader__input zjxfjs_file" type="file" accept="image/*" multiple="">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
        </div>

        <!-- 内容 ——基本信息 -->
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
                    <span><input type="number" name="scj" id="scj" class="jbxx-item-input" placeholder="0.00">元</span>
                </div>
                <div class="jbxx-item">
                    <span class="ptsj" name="ptsj-b" id="ptsj-b">拼团开始时间</span>
                    <!-- <input class="ptsj" name="ptsj-b" id="ptsj-b" type="date" placeholder="拼团开始时间"/> -->
                    <span class="">→</span>
                    <span class="ptsj" name="ptsj-o" id="ptsj-o">拼团结束时间</span>
                    <!-- <input  class="ptsj" name="ptsj-o" id="ptsj-o" type="date" placeholder="拼团结束时间"/> -->
                </div>
                <div class="jbxx-item">
                    <div>拼团介绍</div>
                    <textarea name="ptjs" id="ptjs" placeholder="请详细阐述项目介绍等" ></textarea>
                </div>
            </div>
        </div>

        <!-- 拼团细节 -->
        <div class="ka">
            <div><span class="ka-ti">丨</span><span>拼团细节</span></div>
            <div class="jbxx">
                <div class="jbxx-item">
                    <span>使用范围</span>
                    <span class="f-r">通用</span>
                </div>
                <div class="jbxx-item">
                    <span>使用人群：</span>
                    <span>
                        <input type="radio" name="syrq" id="syrq-1">男性
                        &nbsp;&nbsp;&nbsp;&nbsp;
                        <input type="radio" name="syrq" id="syrq-2">女性
                        &nbsp;&nbsp;&nbsp;&nbsp;
                        <input type="radio" name="syrq" id="syrq-3" checked>全部
                    </span>
                </div>
                <div class="jbxx-item">
                    <div>参团须知</div>
                    <textarea name="ptjs" id="ptjs" placeholder="请清晰明确的描述活动规则和注意事项，字数控制在15-1000字" ></textarea>
                </div>
            </div>
        </div>

        <!-- 参团方式 -->
        <div class="ka">
            <div>
                <span class="ka-ti">丨</span><span>参团方式</span>
                <span class="f-r"><input type="radio" name="zffs" id="zffs" checked>&nbsp;在线支付</span>
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
</body>
<script src="https://cdn.jsdelivr.net/npm/jquery@1.12.4/dist/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/js/bootstrap.min.js"></script>
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
            var arrays = value.split("-");
            df= [parseInt(arrays[0]), parseInt(arrays[1]), parseInt(arrays[2])];
        }
        
        weui.datePicker({
            id: "start"+id,
            start: 2018,
            end: dt.getFullYear()+2,
            defaultValue:df,
            onConfirm: function (result) {
                $("#ptsj-b").text(result[0].label.replace("年","-") + result[1].label.replace("月","-") + result[2].label.replace("日",""));
                $("#ptsj-o").text("拼团结束时间");
            }
        });
    });

    //结束日期
    $('#ptsj-o').on('click', function () {
        var dt = new Date();
        var df = [dt.getFullYear(), (dt.getMonth()), dt.getDate()];
        var id = dt.getFullYear() + "" + dt.getMonth() + "" + dt.getDate() + "" + dt.getHours() + "" + dt.getMinutes() + "" + dt.getSeconds();
        
        var value = $.trim($("#ptsj-o").text());
        if(value == "拼团结束时间"){
            value = "";
        }
        if (value != "") {
            var arrays = value.split("-");
            df = [parseInt(arrays[0]), parseInt(arrays[1]), parseInt(arrays[2])];
        }
        var dfStart = "2018";
        var startVal = $.trim($("#ptsj-b").text());
        if(startVal == "拼团开始时间"){
            startVal = "";
        }
        if (startVal != "") {
            dfStart = startVal;
        }
        var dts = dfStart.split('-');
        var std;
        if(dts.length==1)
        {
            std=new Date(dts[0],1,1);
        }else{
            std=new Date(dts[0],dts[1],dts[2]);
        }
        
        weui.datePicker({
            id: "end" + id,
            start: std,
            end: dt.getFullYear() + 2,
            defaultValue: df,
            onConfirm: function (result) {
                $("#ptsj-o").text(result[0].label.replace("年", "-") + result[1].label.replace("月", "-") + result[2].label.replace("日", ""));
            }
        });
    });

    mui.init();
    $(function() {
        var tmpl = '<li class="weui-uploader__file" style="background-image:url(#url#)"></li>',
            $gallery = $("#gallery"),
            $galleryImg = $("#galleryImg"),
            $uploaderInput = $("#uploaderInput"),
            $uploaderFiles = $("#uploaderFiles");
 
            $uploaderInput.on("change", function(e) {
                var src, url = window.URL || window.webkitURL || window.mozURL,
                files = e.target.files;
                for(var i = 0, len = files.length; i < len; ++i) {
                    var file = files[i];
 
                    if(url) {
                        src = url.createObjectURL(file);
                    } else {
                        src = e.target.result;
                    }
 
                    $uploaderFiles.append($(tmpl.replace('#url#', src)));
                }
            });
        var index; //第几张图片
        $uploaderFiles.on("click", "li", function() {
            index = $(this).index();
            $galleryImg.attr("style", this.getAttribute("style"));
            $gallery.fadeIn(100);
        });
        $gallery.on("click", function() {
            $gallery.fadeOut(100);
        });
        //删除图片
        $(".weui-gallery__del").click(function() {
            $uploaderFiles.find("li").eq(index).remove();
        });
    });
</script>
</html>