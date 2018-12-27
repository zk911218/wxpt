<?php
    session_start();
    if(!isset($_SESSION['adUser'])){
       Header("Location: ad_login.php"); 
       exit;
    }
    
   //  $ad_id      =   isset($_SESSION['adUser']['id']) ? $_SESSION['adUser']['id'] : null;
   // $searchKey       =   isset($_GET["search"]) ? $_GET["search"] : 0;
   $searchKey       =   isset($_POST["search"]) ? $_POST["search"] : 0;
   include_once("conn.php");
   $searchKey   =  mysqli_real_escape_string($link, strip_tags(trim($searchKey)));
   $sql    =  "SELECT `sh_name`,`sh_id`,`sh_id_hash` FROM `wx_pt_sh`";
   $links  =  mysqli_stmt_init($link);
   $arr    =  array();
   if ($searchKey) {
   //  有参数
      $sql.="WHERE `sh_id`=? OR `sh_name`=?";
   }
   // $sql.="LIMIT 3";
   // echo $sql;
   mysqli_stmt_prepare($links,$sql);
   if ($searchKey) {
   //  有参数
      mysqli_stmt_bind_param($links,'ss',$searchKey,$searchKey);
   }
   mysqli_stmt_bind_result($links,$sh_name,$sh_id,$sh_id_hash);
   mysqli_stmt_execute($links);
   while(mysqli_stmt_fetch($links)){
      $arr[] = array("sh_name"=>$sh_name,"sh_id"=>$sh_id,"id"=>$sh_id_hash);
   }
   // print_r($arr);
   mysqli_stmt_close($links);
   mysqli_close($link);
   echo json_encode($arr);