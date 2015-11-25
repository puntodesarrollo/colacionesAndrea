<?php

	ini_set('display_errors', 1);
	ini_set('display_startup_errors', 1);
	error_reporting(E_ALL);

	$retorno="-1";

	session_start();
	$IDusuario=$_SESSION['ID'];

	$conexion = include $_SERVER['DOCUMENT_ROOT']."/admin/crearConexion.php";

	$sql="SELECT * FROM compras WHERE IDusuario='$IDusuario'";

	$resultado = mysqli_query($conexion,$sql);

	$totalCompra = 0;

	$arr = array();

	for ($i = 0; $i <$resultado->num_rows; $i++) 
	{
		$resultado->data_seek($i);
		$filaActual = $resultado->fetch_assoc();
		$ID = $filaActual["ID"];
		$IDproducto = $filaActual["IDproducto"];
		$cantidadComprar = $filaActual["cantidad"];

		include $_SERVER['DOCUMENT_ROOT']."/login/obtenerDatosProducto.php";

		if($cantidadComprar>$cantidadDisponible || $cantidadComprar<=0)
		{
			$cantidadComprar=$cantidadDisponible;
			include $_SERVER['DOCUMENT_ROOT']."/login/actualizarDatosCompra.php";
		}

		if($cantidadComprar>0)
		{
			$array = array('ID' => $ID, 'iIDproducto' => $IDproducto, 'nombreProducto' => $nombreProducto, 'cantidadComprar' => $cantidadComprar, 'precioProducto' => $precioProducto);
			array_push($arr,$array);
		}			
		$totalCompra+=($precioProducto * $cantidadComprar);		
	}
	//mysqli_close($conexion);
	echo json_encode($arr);
?>