<?php

	session_start();

	include $_SERVER['DOCUMENT_ROOT']."/admin/conexion.php";

	$sql="SELECT * FROM usuarios WHERE ID = '" . $_SESSION['ID'] . "'";
		
	$result = mysqli_query($con,$sql);

	if(!($result===false) && $result->num_rows>0)
	{	

		$ID=$_SESSION['ID'];
		$ipUsuario = $_SERVER["REMOTE_ADDR"];
	
		$sql="UPDATE compras SET IDusuario='$ID' WHERE ipUsuario='$ipUsuario'";

		$result = mysqli_query($con,$sql);

		$sql="UPDATE comprasarmapedido SET IDusuario='$ID' WHERE ipUsuario='$ipUsuario'";

		$result = mysqli_query($con,$sql);
		
		mysqli_close($con);
		return true;
	}
	mysqli_close($con);
	return false;
?>