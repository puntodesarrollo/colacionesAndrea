<?php
	ini_set('display_errors', 1);
	ini_set('display_startup_errors', 1);
	error_reporting(E_ALL);

	$retornoPrecio = 0;

	$conexionPrecio = include $_SERVER['DOCUMENT_ROOT']."/admin/crearConexion.php";

	$sqlPrecio="SELECT precio FROM precioarmapedido";

	$resultadoPrecio = mysqli_query($conexionPrecio,$sqlPrecio);

	for ($i = 0; $i <$resultadoPrecio->num_rows; $i++) 
	{
		$resultadoPrecio->data_seek($i);
		$filaActualPrecio = $resultadoPrecio->fetch_assoc();
		$retornoPrecio = $filaActualPrecio["precio"];
	}
	return $retornoPrecio;
?>