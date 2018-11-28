<?php
    include_once("lib/conn.php");
    $t_id   =   $_GET["t"]  ?   $_GET["t"]  :   0;
    $t_id   =   mysqli_real_escape_string($link, strip_tags(trim($t_id)));
    $t_id   =   1;
    $sql    =   "SELECT * FROM wx_pt_pt WHERE pt_id = '$t_id';";
    $pt     =   mysqli_fetch_array(mysqli_query($link, $sql));
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <title>拼团详情</title>
    <!-- 引入样式 -->
    <link rel="stylesheet" href="css/mint.css">
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <!-- 先引入 Vue -->
    <script src="js/vue.js"></script>
    <!-- 引入组件库 -->
    <script src="js/mint.js"></script>
  </head>

  <body>
    
    <div id="app">
      <!-- 顶部标题 -->
      <!-- <div id="head">
        <mt-header title="拼团详情" fixed>
          <router-link to="/" slot="left">
            <mt-button icon="back"></mt-button>
          </router-link>
          <router-link to="user.html" slot="right">
            <i class="fa fa-user-circle-o" style="font-size:1.1rem"></i>
          </router-link>
        </mt-header>
      </div> -->

      <!-- 拼团宣传图 -->
      <div id="swipe">
        <!-- <mt-swipe :auto="4000" :show-indicators="false">
          <mt-swipe-item>
            <img src="images/1.png" alt="">
          </mt-swipe-item>
          <mt-swipe-item>
            <img src="images/2.jpg" alt="">
          </mt-swipe-item>
          <mt-swipe-item>
            <img src="images/3.jpg" alt="">
          </mt-swipe-item>
        </mt-swipe> -->
        <img height=300 src="<?php echo $pt["pt_tp"]; ?>" alt="<?php echo $pt["pt_mc"]; ?>">
      </div>

      <!-- 拼团名称 -->
      <div id="ptmc">
        <div class="ptmc-line">
          <span id="ptmc-title"><?php echo $pt["pt_mc"]; ?></span>
          <!-- <span id="ptmc-zf" class="btn-red">在线支付</span> -->
        </div>
        <?php
            $sql_jt =   "SELECT jt_jg,jt_rs,jt_id FROM wx_pt_pt_ptjt WHERE jt_pt_id = '$t_id';";
            $jt     =   mysqli_query($link, $sql_jt);
            while ($row = mysqli_fetch_row($jt)) {
        ?>
        <div class="ptmc-line">
          <span id="ptmc-jg">￥<?php echo $row[0]*100; ?></span>
          <span id="ptmc-rs" class="btn-red"><?php echo $row[1]; ?>人</span>
        </div>
        <?php  } ?>
        <div class="ptmc-line">
          <span id="ptmc-yj">&nbsp;&nbsp;￥
              <?php 
                $sql_jg =   "SELECT sum(xm_jg) FROM wx_pt_pt_ptxm WHERE xm_state = 'Y' AND xm_pt_id = '$t_id';";
                $jg     =   mysqli_fetch_array(mysqli_query($link, $sql_jg));
                echo $jg[0]."&nbsp;&nbsp;"; 
              ?>
        </span>
        </div>
      </div>

      <!-- 拼团介绍 -->
      <div id="ptjs">
        <div id="ptjs-title">
          <i class="fa fa-tags"></i>
          <span>拼团介绍</span>
        </div>
        <div id="ptjs-value"><?php echo $pt["pt_js"]; ?></div>
      </div>
<?php
    $pt_yxq = 0;
    if (strtotime($pt["pt_yxqq"]) > strtotime(date("Y/m/d"))) {
        // 未开始
        $pt_yxq =   1;
        echo "<div id='over' class='over-color'><i class='fa fa-frown-o'></i> 小主，活动还没有开始</div>";
    }elseif(strtotime($pt["pt_yxqz"]) < strtotime(date("Y/m/d"))){
        // 已经结束
        $pt_yxq =   2;
        echo "<div id='over' class='over-color'><i class='fa fa-frown-o'></i> 小主，活动已经结束了</div>";
    }
?>

      <!-- 拼团玩法 -->
      <div id="ptwf">
        <img src="images/ptwf.jpg" alt="拼团玩法" width="100%">
      </div>



      <!-- 拼团详细情况 -->
      <div id="ptxq">
        <div class="page-part">
          <mt-cell title="活动有效期"></mt-cell>
          <mt-cell title="<?php echo $pt["pt_yxqq"]; ?>至<?php echo $pt["pt_yxqz"]; ?>"></mt-cell>
        </div>
        <div class="page-part">
          <mt-cell title="参团须知"></mt-cell>
          <mt-cell title="<?php echo $pt["pt_ctxz"]; ?>"></mt-cell>
        </div>
        <div class="page-part">
          <mt-cell title="活动内容"></mt-cell>
        <?php
            $sql_xm =   "SELECT xm_name,xm_jg,xm_tp,xm_cs FROM wx_pt_pt_ptxm WHERE xm_state = 'Y' AND xm_pt_id = '$t_id';";
            $xm     =   mysqli_query($link, $sql_xm);
            while ($row_xm = mysqli_fetch_row($xm)) {
        ?>
          <mt-cell title="<?php echo $row_xm[0]; ?>">
            <span ><img height=40 width=70 src="<?php echo $row_xm[2]; ?>" alt="<?php echo $row_xm[0]; ?>" ></span>
            <span style="color:#666"><?php echo $row_xm[3]; ?>次</span>
            <span style="color:red;margin-left: 15px;">￥<?php echo $row_xm[1]; ?></span>
          </mt-cell>
            <?php } ?>
        </div>
        <!-- <div class="page-part">
          <mt-cell title="适用人群"></mt-cell>
          <mt-cell title="不限"></mt-cell>
        </div> -->
        <div class="page-part">
          <mt-cell title="适用门店"></mt-cell>
          <?php
            $pt_sh_id   =   $pt["pt_sh_id"];
            $sql_sh        =   "SELECT sh_name,sh_dh,sh_dz FROM wx_pt_sh WHERE id=$pt_sh_id";
            $sh     =   mysqli_fetch_array(mysqli_query($link, $sql_sh));
          ?>
          <mt-cell title="<?php echo $sh[0]; ?>" label="地址：<?php echo $sh[2]; ?> 联系电话：<?php echo $sh[1]; ?>" to="tel:<?php echo $sh[1]; ?>">
            <i class="fa fa-phone fa-lg" aria-hidden="true" style="color:red"></i>
          </mt-cell>
        </div>
      </div>

      <footer id="footer">
          <table width=100% cellspacing=0 cellpadding=0><tr>
          <?php
            if($pt_yxq == 0){
                $jt     =   mysqli_query($link, $sql_jt);
                while ($row = mysqli_fetch_row($jt)) {
                    echo "<td><a href='yh_ct.html?t=$t_id&jt=$row[2]'><button class='footer-btn'>$row[1]人团（￥$row[0]）</button></a></td>";
                }
            }
          ?>
          </tr></table>
      </footer>
    </div>
  </body>
  <style>
    html,body {
      height: 100%;
      margin: 0;
    }
    #app{
      /* padding-top: 30px; */
      padding-bottom: 40px;
    }

    .mint-header {
      background-color: red;
    }

    #swipe {
      width: 100%;
      height: 300px;
    }

    .mint-swipe-item img {
      width: 100%;
      height: 100%;
    }

    #ptmc {
      clear: both;
      overflow: hidden;
      margin: 10px;
    }

    .ptmc-line {
      clear: both;
      line-height: 30px;
    }

    #ptmc-title {
      font-size: 1.2em;
      float: left;
    }

    #ptmc-zf {
      float: right;
    }

    #ptmc-jg {
      font-weight: 600;
      color: red;
    }

    #ptmc-rs {
      color: red;
    }

    #ptmc-yj {
      text-decoration: line-through;
      color: #666;
    }

    .btn-red {
      border: 1px solid red;
      color: red;
      padding: 3px;
      margin-left: 5px;
      margin-right: 5px;
      border-radius: 5px;
      font-size: 0.8em;
      line-height: 1em;
    }

    #ptjs {
      border-top: 1px dashed red;
      padding: 10px;
      line-height: 30px;
    }

    #ptjs-title {
      color: red;
    }

    #ptjs-value {
      color: #333;
    }

    #over{
      width: 80%;
      line-height: 40px;
      border-radius: 20px;
      text-align: center;
      margin: 10px auto;
      font-size: 1.5rem;
      color: white;
    }
    .over-color{
      background-color:dimgray !important; 
    }

    .page-part{
      margin-bottom: 10px;
    }

    #footer {
      z-index: 1;
      position: fixed;
      bottom: 0;
      left: 0;
      width: 100%;
    }

    .footer-btn {
      background: red;
      width: 100%;
      height: 40px;
      line-height: 40px;
      color: white;
      border: 0px;
      margin: 0px;
      padding: 0px;
      font-size: 1rem;
    }
    td+td{
        border-left:2px solid #fff;
    }
  </style>
  <script>
    new Vue({
      el: '#head'
    });

    new Vue({
      el: '#swipe',
      methods: {
        handleChange(index) {
          showIndicators: false
        }
      }
    });

    new Vue({
      el: '#ptxq'
    });

  </script>


</html>