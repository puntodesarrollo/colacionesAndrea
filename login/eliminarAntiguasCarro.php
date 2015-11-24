<?php

	$algunaConexion = include $_SERVER['DOCUMENT_ROOT']."/admin/crearConexion.php";

	$sentenciaSql="DELETE FROM compras WHERE fecha<(NOW() - INTERVAL 240 MINUTE)";

	$unResultado = mysqli_query($algunaConexion,$sentenciaSql);

	mysqli_close($algunaConexion);
	

?>