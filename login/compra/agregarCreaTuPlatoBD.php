<?php
	session_start();
	include $_SERVER['DOCUMENT_ROOT']."/admin/conexion.php";
	date_default_timezone_set("America/Santiago");
    
 
	$base = $_GET["base"];	
	$acompanamiento = $_GET["acompanamiento"];	
	$cantidad =$_GET["cantidad"];

	$fechaActual = date("Y-m-d G:i:s");	
	$idUsuario=$_SESSION["ID"];		
	$ipUsuario = $_SERVER["REMOTE_ADDR"];

	$query="INSERT INTO comprasarmapedido (IDusuario,IPusuario,base,acompanamiento,cantidad,fecha) VALUES('$idUsuario','$ipUsuario','$base', '$acompanamiento','$cantidad','$fechaActual')";		
	$con->query($query);
												
	
	mysqli_close($con);   
	
?>
