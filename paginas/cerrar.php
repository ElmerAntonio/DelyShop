<?php
session_start();
include 'function.php';
$id=$_SESSION['id_usuario'];
$tabla=$_REQUEST['table'];
$campo=$_REQUEST['campo'];
date_default_timezone_set('America/Panama');
$entrando=date('Y-M-D G:i:s');
$estage="desconectado";
$field = array("estado"=>$estage,"time_logout"=>$entrando);
$tbl = $tabla;
edit($tbl,$field,$campo,$id);
session_destroy();
header("location:../index.html");
 ?>
