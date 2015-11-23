<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

	//Se agrega el nuevo usuario
	$con = new mysqli("localhost", "cpu16669", "HIW7crQ5", "cpu16669_colaciones");
	//Se avisa si falla la conexion:
	if ($con->connect_errno) {
		echo "Falló la conexión con MySQL: (" . $con->connect_errno . ") " . $con->connect_error;
	}
	
	if (!$con->set_charset("utf8")) {
		printf("Error cargando el conjunto de caracteres utf8: %s\n", $con->error);
	}							
	
	$sql="INSERT INTO usuarios(id_facebook, id_google, nombre, direccion, telefono, es_empresa, correo) VALUES('','1234', 'Guillermo', '', '', 'false', 'gpuellestorres@gmail.com')";
	echo $sql;
	
	$result = mysqli_query($con,$sql);
	mysqli_close($con);
?>