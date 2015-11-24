<?php

/*

Actualiza la cantidad a comprar de un producto al máximo posible de acuerdo a las ventas del día
Se deben establecer las siguientes variables antes de incluirlo en otro script:

$ID, que representa el campo ID en la tabla "compras" de la fila a modificar
$cantidadComprar, que representa la nueva cantidad a colocar en la fila a modificar de la tabla "compras" //*/

	$conexionActualizar = include $_SERVER['DOCUMENT_ROOT']."/admin/crearConexion.php";

	//Se obtienen los datos básicos del producto:
	$sentenciaActualizar="UPDATE compras SET cantidad=$cantidadComprar WHERE ID='$ID'";

	mysqli_query($conexionActualizar,$sentenciaActualizar);

	mysqli_close($conexionActualizar);
?>