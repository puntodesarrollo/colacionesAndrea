<?php
	$sesion = include $_SERVER['DOCUMENT_ROOT']."/admin/verificarSesion.php";

	if($sesion===false){
		header("location:/admin/login");
		exit;
	}

//Variables album

define ('SITE_ROOT', realpath(dirname(__FILE__)));

$path="/imagenes/";
	
if($_GET["t"]!=null){
	
	$nombre = $_GET["t"];
	
	//Se hace la conexion:
	include $_SERVER['DOCUMENT_ROOT']."/admin/conexion.php";
	
	$sql="DELETE FROM slider WHERE imagen='".$nombre."'";
	$result = mysqli_query($con,$sql);

	unlink($nombre);
	
	mysqli_close($con);
	//redireccionar a productos
	header("location:/admin/slider");
}
?>
