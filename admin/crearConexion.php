<?php
	//Se hace la conexion:
	$conexion = new mysqli("localhost", "cpu16669", "HIW7crQ5", "cpu16669_colaciones");
	//Se avisa si falla la conexion:
	if ($conexion->connect_errno) {
		echo "Falló la conexión con MySQL: (" . $conexion->connect_errno . ") " . $conexion->connect_error;
	}
	
	if (!$conexion->set_charset("utf8")) {
		printf("Error cargando el conjunto de caracteres utf8: %s\n", $conexion->error);
	}

	return $conexion;
?>