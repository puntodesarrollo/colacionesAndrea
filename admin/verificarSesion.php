<?php

	session_start();

	include $_SERVER['DOCUMENT_ROOT']."/admin/conexion.php";

	$sql="SELECT password FROM admin WHERE usuario = '" . $_SESSION['usuario'] . "' AND ID='" . $_SESSION['IDUsuario'] . "'";
		
	$result = mysqli_query($con,$sql);

	if(!($result===false) && $result->num_rows>0)
	{	
		mysqli_close($con);
		return true;
	}
	mysqli_close($con);
	return false;

?>