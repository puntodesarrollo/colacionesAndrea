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
	$con = new mysqli("localhost", "cpu16669", "HIW7crQ5", "cpu16669_colaciones");
	//Se avisa si falla la conexion:
	if ($con->connect_errno) {
		echo "Falló la conexión con MySQL: (" . $con->connect_errno . ") " . $con->connect_error;
	}
	
	if (!$con->set_charset("utf8")) {
		printf("Error cargando el conjunto de caracteres utf8: %s\n", $con->error);
	}							
	
	$sql="UPDATE usuarios SET nombre = '$nombre', direccion = '$direccion', telefono = '$telefono', correo = '$correo' WHERE ID = '$ID'";

	$result = mysqli_query($con,$sql);
	mysqli_close($con);	

	//redireccionar a programas
	header("location:index.html");
?>