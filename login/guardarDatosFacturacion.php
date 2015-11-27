<?php

	ini_set('display_errors', 1);
	ini_set('display_startup_errors', 1);
	error_reporting(E_ALL);

	session_start();
	$ID=$_SESSION['ID'];

	$retorno="-1";

	$razonsocial=$_POST["nombre"];
	$rut=$_POST["rut"];	
	$domicilio=$_POST["domicilio"];
	$comuna=$_POST["comuna"];
	$giro=$_POST["giro"];
	$telefono=$_POST["telefono"];

	//agregar los datos a la BD
	include $_SERVER['DOCUMENT_ROOT']."/admin/conexion.php";
	
	$sql  = "SELECT * FROM datosfacturacion WHERE IDusuario='$ID'";
	$resultado = $con->query($sql);

	if(mysqli_num_rows($resultado)==0)
	{
		$sql  = "INSERT INTO datosfacturacion(IDusuario, razonsocial, rut, domicilio, comuna, giro, telefono) VALUES('$ID', '$razonsocial','$rut', '$domicilio', '$comuna', '$giro', '$telefono')";
		//echo $sql;
		$resultado = $con->query($sql);
	}
	else
	{
		//Se agregan o actualizan los datos:
		$sql  = "UPDATE datosfacturacion SET razonsocial='$razonsocial', rut='$rut', domicilio='$domicilio', comuna='$comuna', giro='$giro', telefono='$telefono' WHERE IDusuario='$ID'";
		$resultado = $con->query($sql);
	}

	mysqli_close($con);

	//redireccionar a programas
	header("location:/login.php");
?>