<?php
include("function.php");
$id = $_GET['id'];
delete('productos','codpro',$id);
header("location:config_pro.php");
?>
