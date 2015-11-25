<?php 

	session_start();
	$ID=$_SESSION['ID'];
	
	//Se hace la conexion:
	include $_SERVER['DOCUMENT_ROOT']."/admin/conexion.php";
	

	$sql="SELECT * FROM usuarios WHERE ID='$ID'";

	$result = mysqli_query($con,$sql);
		
	if(!($result===false) && $result->num_rows>0){
		for ($i = 0; $i <$result->num_rows; $i++) {
			$result->data_seek($i);
			$fila = $result->fetch_assoc();
			$arr = array('id_facebook' => $fila["id_facebook"], 'id_google' => $fila["id_google"], 'nombre' => $fila["nombre"], 'direccion' => $fila["direccion"], 'telefono' => $fila["telefono"], 'es_empresa' =>$fila["es_empresa"], 'correo' => $fila["correo"]);
		}
		mysqli_close($con);
	}

?>

<html lang="en">
  <head>
    <script src="https://apis.google.com/js/platform.js" async defer></script>
    <!-- Bootstrap core CSS -->
    <link href="/bootstrap/css/bootstrap.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
  </head>
  <body>
  	<div class="content">
  		<div class="col-sm-8 col-sm-offset-2">
  			<div class="page-header">
  				<h3>Mis datos:</h1>
  			</div>
  			<form class="form-horizontal" role="form" action="aplicarModificarDatos.php" method="post">
			  <div class="form-group">
			    <label for="nombre" class="col-lg-2 control-label">Nombre</label>
			    <div class="col-lg-10">
			      <input type="text" class="form-control" id="nombre" name="nombre"
			             placeholder="Nombre Completo" value="<?php echo $arr["nombre"]; ?>" required>
			    </div>
			  </div>
			  <div class="form-group">
			    <label for="nombre" class="col-lg-2 control-label">Direcci&oacute;n</label>
			    <div class="col-lg-10">
			      <input type="text" class="form-control" id="direccion" name="direccion"
			             placeholder="Los Capullos #4053, La Florida, La Serena" value="<?php echo $arr["direccion"]; ?>" required>
			    </div>
			  </div>
			  <div class="form-group">
			    <label for="nombre" class="col-lg-2 control-label">Tel&eacute;fono</label>
			    <div class="col-lg-10">
			      <input type="text" class="form-control" id="telefono" name="telefono"
			             placeholder="+56979302846" value="<?php echo $arr["telefono"]; ?>" required>
			    </div>
			  </div>
			  <div class="form-group">
			    <label for="nombre" class="col-lg-2 control-label">Correo</label>
			    <div class="col-lg-10">
			      <input type="email" class="form-control" id="correo" name="correo"
			             placeholder="micorreo@gmail.com" value="<?php echo $arr["correo"]; ?>" required>
			    </div>
			  </div>
			  <div class="modal-footer">
			      <button type="submit" class="btn btn-default btn-primary">Guardar Datos</button>
		      </div>
			</form>
  		</div>
  	</div>
  </body>
</html>