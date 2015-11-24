<?php
	session_start();
	include $_SERVER['DOCUMENT_ROOT']."/admin/conexion.php";
	date_default_timezone_set("America/Santiago");

	$idProducto = $_GET["idProducto"];	
	$cantidad = $_GET["cantidad"];	
	$fechaActual = date("Y-m-d G:i:s");	
	$idUsuario=$_SESSION["ID"];
   
	$query="INSERT INTO compras (IDusuario,IDproducto,cantidad,fecha) VALUES('$idUsuario','$idProducto','$cantidad', '$fechaActual')";	
	
	$con->query($query);
	
	mysqli_close($con);   
	
?>
