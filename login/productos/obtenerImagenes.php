<?php
	
	//antes se debe definir una variable $id_producto
	$sql_fotos="SELECT * FROM fotos_productos WHERE id_producto='$id_producto'";					
	$result_fotos = mysqli_query($con,$sql_fotos);

	$arrayImagenes=array();
	for ($i = 0; $i <$result_fotos->num_rows; $i++) 
	{
		$result_fotos->data_seek($i);
		$fila = $result_fotos->fetch_assoc();			
		$rutaFoto='admin/productos/'.$fila["ruta_foto"];	
		array_push($arrayImagenes, $rutaFoto);				
	}	

?>