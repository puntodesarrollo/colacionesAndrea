<?php
	session_start();
	include $_SERVER['DOCUMENT_ROOT']."/admin/conexion.php";
	date_default_timezone_set("America/Santiago");

	$idProducto = $_GET["idProducto"];	
	$cantidad = $_GET["cantidad"];
	if(empty($_GET["cantidad"])){

		$cantidad=1;
	}	
	$fechaActual = date("Y-m-d G:i:s");	
	//if(isset($_SESSION["ID"]){
		$idUsuario=$_SESSION["ID"];	
	//}else{
	//	$idUsuario='';
	//}
	
	$ipUsuario = $_SERVER["REMOTE_ADDR"];

	$select="SELECT * FROM compras WHERE ipUsuario='$ipUsuario' AND IDproducto='$idProducto'";
	$result = mysqli_query($con,$select);

	$cantidadSelect=$result->num_rows;

	for ($i = 0; $i <$result->num_rows; $i++) {
		$result->data_seek($i);
		$fila = $result->fetch_assoc();	
		$cantidadProductoActual=$fila["cantidad"];

	}
	if($cantidadSelect>0){
		$total=$cantidadProductoActual+$cantidad;
		$resultado = $con->query("UPDATE compras set cantidad='$total' WHERE ipUsuario='$ipUsuario' AND IDproducto='$idProducto'");

	}else{

		$query="INSERT INTO compras (IDusuario,IDproducto,cantidad,fecha,ipUsuario) VALUES('$idUsuario','$idProducto','$cantidad', '$fechaActual','$ipUsuario')";		
		$con->query($query);
	}												
	
	mysqli_close($con);   
	
?>
