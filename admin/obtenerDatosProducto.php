<?php
	$sesion = include $_SERVER['DOCUMENT_ROOT']."/admin/verificarSesion.php";

	if($sesion===false){
		header("location:/admin/login");
		exit;
	}

	if($IDproducto!=null){

		//obtener los datos de la bd
		include $_SERVER['DOCUMENT_ROOT']."/admin/conexion.php";
		
		$sql="SELECT * FROM productos WHERE ID='$IDproducto'";

		$result = mysqli_query($con,$sql);
		
		if($result===false || $result->num_rows===0)
		{
			exit;
		}
		
		for ($i = 0; $i <$result->num_rows; $i++) {
			$result->data_seek($i);
			$fila = $result->fetch_assoc();

			$Producto = $fila["nombre"];
		}
		
		mysqli_close($con);
	}
?>