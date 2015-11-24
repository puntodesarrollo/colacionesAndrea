<?php

	session_start();
	$IDusuario=$_SESSION['ID'];

	$conexion = include $_SERVER['DOCUMENT_ROOT']."/admin/crearConexion.php";

	$sql="INSERT INTO pedidos VALUES(NULL, '$IDusuario', now(), 'false')";

	mysqli_query($conexion,$sql);

	$IDpedido = $conexion->insert_id;

	$sql="SELECT * FROM compras WHERE IDusuario='$IDusuario'";

	$resultado = mysqli_query($conexion,$sql);
	
	for ($i = 0; $i <$resultado->num_rows; $i++) 
	{
		$resultado->data_seek($i);
		$filaActual = $resultado->fetch_assoc();
		$ID = $filaActual["ID"];
		$IDproducto = $filaActual["IDproducto"];
		$cantidadComprar = $filaActual["cantidad"];

		include $_SERVER['DOCUMENT_ROOT']."/login/obtenerDatosProducto.php";

		if($cantidadComprar>$cantidadDisponible)
		{
			$cantidadComprar=$cantidadDisponible;
			include $_SERVER['DOCUMENT_ROOT']."/login/actualizarDatosCompra.php";
			header("location:/login/carro.php");
			exit;
		}

		$conInsert = include $_SERVER['DOCUMENT_ROOT']."/admin/crearConexion.php";

		$sqlInsert="INSERT INTO detallepedido(IDpedido, IDproducto, cantidad, precio) VALUES('$IDpedido','$IDproducto','$cantidadComprar','$precioProducto')";

		mysqli_query($conInsert,$sqlInsert);
	}

	$sql="DELETE FROM compras WHERE IDusuario='$IDusuario'";

	$resultado = mysqli_query($conexion,$sql);

	mysqli_close($conexion);
	mysqli_close($conInsert);

	header("location:/login/misCompras.php");

?>