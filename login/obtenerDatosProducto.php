<?php

/*

Obtiene los datos básicos de producto: nombre, descripción, precio, cantidad, cantidadDisponible
Se debe establecer una variable antes de incluirlo en otro script llama $IDproducto//*/

	$conex = include $_SERVER['DOCUMENT_ROOT']."/admin/crearConexion.php";

	//Se obtienen los datos básicos del producto:
	$sentenciaSql="SELECT * FROM productos WHERE ID='$IDproducto'";

	$unResultado = mysqli_query($conex,$sentenciaSql);

	for ($z = 0; $z <$unResultado->num_rows; $z++) 
	{
		$unResultado->data_seek($z);
		$unaFila = $unResultado->fetch_assoc();

		$nombreProducto = $unaFila["nombre"];
		$descripcionProducto = $unaFila["descripcion"];
		$precioProducto = $unaFila["precio"];
		$cantidadProducto = $unaFila["cantidad"];
	}


	//Se obtiene la cantidad ya solicitada actualmente del producto:
	$sentenciaSql="SELECT * FROM pedidos, detallepedido WHERE detallepedido.IDpedido=pedidos.ID AND IDproducto='$IDproducto' AND pedidos.entregado='false'";

	$unResultado = mysqli_query($conex,$sentenciaSql);

	$cantidadDisponible = $cantidadProducto;

	for ($z = 0; $z <$unResultado->num_rows; $z++) 
	{
		$unResultado->data_seek($z);
		$unaFila = $unResultado->fetch_assoc();

		$cantidadDisponible -= $unaFila["cantidad"];
	}	

	mysqli_close($conex);
?>