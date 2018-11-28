<?php
include_once("conn.php");
$sql    =   "select * from wx_pt_sh";
$yh     =   mysqli_query($link, $sql);
$row    =   mysqli_fetch_array($yh, MYSQLI_ASSOC);
print_r($row);
mysqli_close($link);
?>