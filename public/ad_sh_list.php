<?php
    session_start();
    if(!isset($_SESSION['adUser'])){
       Header("Location: ad_login.php"); 
       exit;
    }
    include_once("lib/conn.php");
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Page Title</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="http://cdn.amazeui.org/amazeui/2.7.2/css/amazeui.min.css">
    <!-- <script src="http://cdn.amazeui.org/amazeui/2.7.2/js/amazeui.min.js"></script> -->
    <!-- <link rel="stylesheet" href="https://cdn.bootcss.com/weui/1.1.3/style/weui.min.css"> -->
    <!-- <link rel="stylesheet" href="https://cdn.bootcss.com/jquery-weui/1.2.1/css/jquery-weui.min.css"> -->
    <style>
        .inp{
            height:2.8rem;
        }
    </style>
</head>
<body>
    <div class="app">
        <div class="am-form .am-form-horizontal">
            <form action="" method="post">
                <div class="am-form-group">
                    <input placeholder="请输入商户名" name="searchKey" id="searchKey" class="inp am-input-sm am-u-sm-10">
                    <input type="submit" id="btnSearch" class="inp am-btn am-btn-primary am-btn-xs am-u-sm-2 am-icon-search">     
                    <div class="am-form-help">提示：输入商户名或者用户账号即可查询</div>
                </div>
            </form>
        </div>
    </div>
    <table class="am-table am-table-striped am-text-nowrap am-scrollable-horizontal am-text-middle">
        <tr>
            <th>
                <span class='am-u-sm-8'>商户名</span>
                <span class='am-u-sm-4'>商户账号</span>
            </th>
        </tr>
        <tbody>
        <?php
            $searchKey  =   isset($_POST["searchKey"]) ? $_POST["searchKey"] : 0;
            $searchKey  =  mysqli_real_escape_string($link, strip_tags(trim($searchKey)));
            $sql        =  "SELECT `sh_name`,`sh_id`,`sh_id_hash` FROM `wx_pt_sh`";
            $links      =  mysqli_stmt_init($link);
            if ($searchKey) {
            //  有参数
                $sql.="WHERE `sh_id`=? OR `sh_name` like ?";
            }
            mysqli_stmt_prepare($links,$sql);
            if ($searchKey) {
            //  有参数
                $searchKey2 = "%".$searchKey."%";
                mysqli_stmt_bind_param($links,'ss',$searchKey,$searchKey2);
            }
            mysqli_stmt_bind_result($links,$sh_name,$sh_id,$sh_id_hash);
            mysqli_stmt_execute($links);
            while(mysqli_stmt_fetch($links)){
                // $arr[] = array("sh_name"=>$sh_name,"sh_id"=>$sh_id,"id"=>$sh_id_hash);
        ?>
        <tr><td><a href="ad_sh_list_more.php?id=<?php echo $sh_id_hash; ?>"><span class='am-u-sm-8'><?php echo $sh_name; ?></span><span class='am-u-sm-4'><?php echo $sh_id; ?></span></a></td></tr>
        <?php
            }
            // print_r($arr);
            mysqli_stmt_close($links);
            mysqli_close($link);
        ?>
        </tbody>
    </table>
</body>
<script src="https://cdn.bootcss.com/jquery/1.11.0/jquery.min.js"></script>
<script>
    function GetQueryString(name) {
        var reg = new RegExp("(^|&)"+ name +"=([^&]*)(&|$)");
        var r = window.location.search.substr(1).match(reg);
        if(r!=null)return  unescape(r[2]); return null;
    }
    getError = GetQueryString('error');
    if(getError==1){
        alert('操作错误！');
    }

    // pushContent(0);     //初始化数据

    // $(function(){
    //     $("#btnSearch").click(function(){
    //         var searchKey = $("#searchKey").val();
    //         pushContent(searchKey);
    //     });
    // });
    // function pushContent(searchKey){
    //     var url = "lib/ad_sh_list.php";
    //     var arr;
    //     $.post(url,{"search":searchKey},function(data){
    //         console.log(data);
    //         var item=data.data;
    //         console.log(item);
    //         for(var i=0;i<item.length;i++){
    //             console.log(item[i]);
    //         }


    //         // arr=$.parseJSON(data);
    //         // $(".bodyTr").empty();
    //         // for(j = 0,len=arr.length; j < len; j++) {
    //         //     var htmlContent = "<tr class='bodyTr'><td><a href='ad_sh_list_more.php?id="+ arr[j].id +"'>" + arr[j].sh_name + "</a></td></tr>";
    //         //     $("tbody").appendTo(htmlContent);
    //         // }
    //     }, "json");
    // };
    
</script>
</html>