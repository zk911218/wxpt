<?php
$mysqli = new MySQLi("localhost","wx","zk911218","wxpt");
$mysqli->set_charset('utf8');
 
if(!$mysqli){
 
 die($mysqli->error);
 
}
 
//创建一个预定义的对象 ?占位
 
$sql = "select sh_name,sh_id,sh_yxq,sh_max_ci,sh_dz from wx_pt_sh where sh_id_hash=?";
 
$mysqli_stmt = $mysqli->prepare($sql);
 
$id='sh1';
 
//绑定参数
 
$mysqli_stmt->bind_param("s",$id);
 
//绑定结果集
 
$mysqli_stmt->bind_result($sh_name,$sh_id,$sh_yxq,$sh_max_ci,$sh_dz);
 
//执行
 
$mysqli_stmt->execute();
 
//取出绑定的结果集
 
while($mysqli_stmt->fetch()){
 
 echo "$sh_name,$sh_id,$sh_yxq,$sh_max_ci,$sh_dz<hr>";
 
}
 
//关闭结果集
 
$mysqli_stmt->free_result();
 
$mysqli_stmt->close();
 
$mysqli->close();
?>