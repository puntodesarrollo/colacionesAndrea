<?php

	$retorno="-1";

	$idFacebook=$user['id'];
	$nombre=$user['name'];	
	$correo=$user['email'];		
	
	$sql="SELECT * FROM usuarios WHERE id_facebook='$idFacebook'";

	$result = mysqli_query($con,$sql);
	
	if(!($result===false) && $result->num_rows>0){
		for ($i = 0; $i <$result->num_rows; $i++) {
			$result->data_seek($i);
			$fila = $result->fetch_assoc();
				$retorno=$fila["ID"];				
		}
		mysqli_close($con);
	}
	else{

		$insert="INSERT INTO usuarios(id_facebook, nombre, es_empresa, correo) VALUES('$idFacebook', '$nombre', 'false', '$correo')";				
		$con->query($insert);
		$retorno =$con->insert_id;							
			
	}	
	$_SESSION['ID']  = $retorno;
	 header("location:/login");
	
?>