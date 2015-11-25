<?php

	ini_set('display_errors', 1);
	ini_set('display_startup_errors', 1);
	error_reporting(E_ALL);

	session_start();
	$ID=$_SESSION['ID'];

	$retorno="-1";

	$direccion=$_POST["direccion"];
	$nombre=$_POST["nombre"];	
	$correo=$_POST["correo"];
	$telefono=$_POST["telefono"];
	
	//Se guardan los datos del usuario
	include $_SERVER['DOCUMENT_ROOT']."/admin/conexion.php";
	$sql="UPDATE usuarios SET nombre = '$nombre', direccion = '$direccion', telefono = '$telefono', correo = '$correo' WHERE ID = '$ID'";

	$result = mysqli_query($con,$sql);
	mysqli_close($con);	

	//redireccionar a programas
	header("location:/login");
?>