<?php
	session_start();
	include $_SERVER['DOCUMENT_ROOT']."/admin/conexion.php";
	date_default_timezone_set("America/Santiago");

	$idProducto = $_GET["idProducto"];	
	$cantidad = $_GET["cantidad"];	
	$fechaActual = date("Y-m-d G:i:s");	
	$idUsuario=$_SESSION["ID"];

	$select="SELECT * FROM compras WHERE IDusuario='$idUsuario' AND IDproducto='$idProducto'";
	$result = mysqli_query($con,$select);

	$cantidadSelect=$result->num_rows;

	for ($i = 0; $i <$result->num_rows; $i++) {
		$result->data_seek($i);
		$fila = $result->fetch_assoc();	
		$cantidadProductoActual=$fila["cantidad"];

	}
	if($cantidadSelect>0){
		$total=$cantidadProductoActual+$cantidad;
		$resultado = $con->query("UPDATE compras set cantidad='$total' WHERE IDusuario='$idUsuario' AND IDproducto='$idProducto'");

	}else{

		$query="INSERT INTO compras (IDusuario,IDproducto,cantidad,fecha) VALUES('$idUsuario','$idProducto','$cantidad', '$fechaActual')";		
		$con->query($query);
	}												
	
	mysqli_close($con);   
	
?>