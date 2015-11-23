<?php

	ini_set('display_errors', 1);
	ini_set('display_startup_errors', 1);
	error_reporting(E_ALL);

	$retorno="-1";

	session_start();
	$ID=$_SESSION['ID'];
	
	//Se hace la conexion:
	$con = new mysqli("localhost", "cpu16669", "HIW7crQ5", "cpu16669_colaciones");
	//Se avisa si falla la conexion:
	if ($con->connect_errno) {
		echo "Falló la conexión con MySQL: (" . $con->connect_errno . ") " . $con->connect_error;
	}
	
	if (!$con->set_charset("utf8")) {
		printf("Error cargando el conjunto de caracteres utf8: %s\n", $con->error);
	}							
	
	$sql="SELECT * FROM usuarios WHERE ID='$ID'";

	$result = mysqli_query($con,$sql);
		
	if(!($result===false) && $result->num_rows>0){
		for ($i = 0; $i <$result->num_rows; $i++) {
			$result->data_seek($i);
			$fila = $result->fetch_assoc();
			$arr = array('id_facebook' => $fila["id_facebook"], 'id_google' => $fila["id_google"], 'nombre' => $fila["nombre"], 'direccion' => $fila["direccion"], 'telefono' => $fila["telefono"], 'es_empresa' =>$fila["es_empresa"], 'correo' => $fila["correo"]);
		}
		mysqli_close($con);
	}
	
	echo json_encode($arr);
?>