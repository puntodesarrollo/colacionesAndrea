<?php

	$login = include $_SERVER['DOCUMENT_ROOT']."/login/verificarLogin.php";

	if($login===false)
	{
		header("location:/login/");
	}

	$conexionActualizar = include $_SERVER['DOCUMENT_ROOT']."/admin/crearConexion.php";

	$ID = $_GET["ID"];
	$sentenciaActualizar="DELETE FROM comprasarmapedido WHERE ID='$ID'";	

	mysqli_query($conexionActualizar,$sentenciaActualizar);

	mysqli_close($conexionActualizar);

	header("location:/store-cart.php");
?>