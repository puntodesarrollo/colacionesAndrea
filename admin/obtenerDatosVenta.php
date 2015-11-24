<?php
	$sesion = include $_SERVER['DOCUMENT_ROOT']."/admin/verificarSesion.php";

	if($sesion===false){
		header("location:/admin/login");
		exit;
	}
	
	if($IDpedido!=null){

		//obtener los datos de la bd
		include $_SERVER['DOCUMENT_ROOT']."/admin/conexion.php";
		
		$sql="SELECT * FROM pedidos WHERE ID='$IDpedido'";

		$result = mysqli_query($con,$sql);
		
		if($result===false || $result->num_rows===0)
		{
			exit;
		}
		
		for ($i = 0; $i <$result->num_rows; $i++) {
			$result->data_seek($i);
			$fila = $result->fetch_assoc();

			$IDusuario = $fila["IDusuario"];
			$Fecha = $fila["fecha"];
		}


		//Se obtiene el nombre del usuario:
		$sql="SELECT * FROM usuarios WHERE ID='$IDusuario'";

		$result = mysqli_query($con,$sql);
		
		$Usuario="";

		for ($i = 0; $i <$result->num_rows; $i++) {
			$result->data_seek($i);
			$fila = $result->fetch_assoc();

			$Usuario = $fila["nombre"];
		}

		//Se obtiene el total de venta:
		$Total = 0;

		$sql="SELECT * FROM detallepedido WHERE IDpedido='$IDpedido'";

		$result = mysqli_query($con,$sql);

		for ($i = 0; $i <$result->num_rows; $i++) {
			$result->data_seek($i);
			$fila = $result->fetch_assoc();

			$Total += ($fila["cantidad"] * $fila["precio"]);
		}
		
		mysqli_close($con);

	}
?>