<?php

	session_start();

	include $_SERVER['DOCUMENT_ROOT']."/admin/conexion.php";

	$sql="SELECT * FROM usuarios WHERE ID = '" . $_SESSION['ID'] . "'";
		
	$result = mysqli_query($con,$sql);

	if(!($result===false) && $result->num_rows>0)
	{	
		mysqli_close($con);
		return true;
	}
	mysqli_close($con);
	return false;
?>