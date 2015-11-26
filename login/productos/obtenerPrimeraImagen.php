<?php
	
	$conexionPrimeraFoto= include $_SERVER['DOCUMENT_ROOT']."/admin/crearConexion.php";
	//antes se debe definir una variable $IDproducto
	$sqlPrimeraFoto="SELECT * FROM fotos_productos WHERE id_producto='$IDproducto'";					
	$resultPrimeraFoto = mysqli_query($conexionPrimeraFoto,$sqlPrimeraFoto);

	$rutaPrimeraFoto="";
	if($resultPrimeraFoto->num_rows!=0){

		for ($z = 0; $z <1; $z++) 
		{
			$resultPrimeraFoto->data_seek($z);
			$fila = $resultPrimeraFoto->fetch_assoc();			
			$rutaPrimeraFoto='admin/productos/'.$fila["ruta_foto"];						
		}
	}	
	mysqli_close($conexionPrimeraFoto);

	return $rutaPrimeraFoto;

?>