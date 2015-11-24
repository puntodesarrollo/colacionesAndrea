<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

	$retorno="-1";

	$idGoogle=$_GET["idGoogle"];
	$nombre=$_GET["nombre"];	
	$correo=$_GET["correo"];
	
	//Se hace la conexion:
	$con = new mysqli("localhost", "cpu16669", "HIW7crQ5", "cpu16669_colaciones");
	//Se avisa si falla la conexion:
	if ($con->connect_errno) {
		echo "Falló la conexión con MySQL: (" . $con->connect_errno . ") " . $con->connect_error;
	}
	
	if (!$con->set_charset("utf8")) {
		printf("Error cargando el conjunto de caracteres utf8: %s\n", $con->error);
	}							
	
	$sql="SELECT * FROM usuarios WHERE id_google='$idGoogle'";

	$result = mysqli_query($con,$sql);
		
	if(!($result===false) && $result->num_rows>0){
		for ($i = 0; $i <$result->num_rows; $i++) {
			$result->data_seek($i);
			$fila = $result->fetch_assoc();
				$retorno=$fila["ID"];
		}
		mysqli_close($con);
	}
	else{
		mysqli_close($con);

		//Se agrega el nuevo usuario
		$con = new mysqli("localhost", "cpu16669", "HIW7crQ5", "cpu16669_colaciones");
		//Se avisa si falla la conexion:
		if ($con->connect_errno) {
			echo "Falló la conexión con MySQL: (" . $con->connect_errno . ") " . $con->connect_error;
		}
		
		if (!$con->set_charset("utf8")) {
			printf("Error cargando el conjunto de caracteres utf8: %s\n", $con->error);
		}							
		
		$sql="INSERT INTO usuarios(id_facebook, id_google, nombre, direccion, telefono, es_empresa, correo) VALUES('','$idGoogle', '$nombre', '', '', 'false', '$correo')";

		$result = mysqli_query($con,$sql);
		mysqli_close($con);


		//Se obtiene la id del nuevo usuario
		$con = new mysqli("localhost", "cpu16669", "HIW7crQ5", "cpu16669_colaciones");
		//Se avisa si falla la conexion:
		if ($con->connect_errno) {
			echo "Falló la conexión con MySQL: (" . $con->connect_errno . ") " . $con->connect_error;
		}
		
		if (!$con->set_charset("utf8")) {
			printf("Error cargando el conjunto de caracteres utf8: %s\n", $con->error);
		}							
		
		$sql="SELECT * FROM usuarios WHERE id_google='$idGoogle'";

		$result = mysqli_query($con,$sql);
			
		if(!($result===false) && $result->num_rows>0){
			for ($i = 0; $i <$result->num_rows; $i++) {
				$result->data_seek($i);
				$fila = $result->fetch_assoc();
					$retorno=$fila["ID"];
			}
		}
		mysqli_close($con);
	}
	
	//Se inicia la sesión con la ID del usuario
	session_start();

	if($_SESSION['ID']!= $retorno)
	{
		$_SESSION['ID']= $retorno;
		echo "true";
	}
	else
	{
		echo "false";
	}
?>