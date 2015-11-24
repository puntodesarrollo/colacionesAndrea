<?php
	$sesion = include $_SERVER['DOCUMENT_ROOT']."/admin/verificarSesion.php";

	if($sesion===false){
		header("location:/admin/login");
		exit;
	}

	if($IDproducto!=null){

		//obtener los datos de la bd
		$conex = include $_SERVER['DOCUMENT_ROOT']."/admin/crearConexion.php";
		
		$sentenciaSql="SELECT * FROM productos WHERE ID='$IDproducto'";

		$unResult = mysqli_query($conex,$sentenciaSql);
		
		if($unResult===false || $unResult->num_rows===0)
		{
			exit;
		}
		
		for ($z = 0; $z <$unResult->num_rows; $z++) {
			$unResult->data_seek($z);
			$estaFila = $unResult->fetch_assoc();

			$Producto = $estaFila["nombre"];
		}
		
		mysqli_close($con);
	}
?>