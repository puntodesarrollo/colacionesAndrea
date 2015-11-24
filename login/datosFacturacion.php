<?php 

	session_start();
	$ID=$_SESSION['ID'];
	
	//Se hace la conexion:
	include $_SERVER['DOCUMENT_ROOT']."/admin/conexion.php";
	
	$sql="SELECT * FROM datosfacturacion WHERE IDusuario='$ID'";
						
	$result = mysqli_query($con,$sql);
	
	for ($i = 0; $i <$result->num_rows; $i++) {
		$result->data_seek($i);
	    $fila = $result->fetch_assoc();															

    	$razonsocial=$fila["razonsocial"];
		$rut = $fila["rut"];
		$domicilio = $fila["domicilio"];
		$comuna = $fila["comuna"];
		$giro = $fila["giro"];
		$telefono = $fila["telefono"];
	}
	
	mysqli_close($con);

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
  			<form class="form-horizontal" role="form" action="guardarDatosFacturacion.php" method="post">
			  <div class="form-group">
			    <label for="nombre" class="col-lg-2 control-label">Nombre o Raz&oacute;n Social</label>
			    <div class="col-lg-10">
			      <input type="text" class="form-control" id="nombre" name="nombre"
			             placeholder="Colaciones a Domicilio Andrea" value="<?php echo $razonsocial; ?>" length="200" required>
			    </div>
			  </div>
			  <div class="form-group">
			    <label for="nombre" class="col-lg-2 control-label">Rut</label>
			    <div class="col-lg-10">
			      <input type="text" class="form-control" id="rut" name="rut"
			             placeholder="11.111.111-1" value="<?php echo $rut; ?>" length="15" required>
			    </div>
			  </div>
			  <div class="form-group">
			    <label for="nombre" class="col-lg-2 control-label">Domicilio</label>
			    <div class="col-lg-10">
			      <input type="text" class="form-control" id="domicilio" name="domicilio"
			             placeholder="Los Capullos #4053, La Florida, La Serena" value="<?php echo $domicilio; ?>" length="150" required>
			    </div>
			  </div>
			  <div class="form-group">
			    <label for="nombre" class="col-lg-2 control-label">Comuna</label>
			    <div class="col-lg-10">
			      <input type="text" class="form-control" id="comuna" name="comuna"
			             placeholder="La Serena" value="<?php echo $comuna; ?>" length="50"  required>
			    </div>
			  </div>
			  <div class="form-group">
			    <label for="nombre" class="col-lg-2 control-label">Giro</label>
			    <div class="col-lg-10">
			      <input type="text" class="form-control" id="giro" name="giro"
			             placeholder="" value="<?php echo $giro; ?>" length="100"  required>
			    </div>
			  </div>
			  <div class="form-group">
			    <label for="nombre" class="col-lg-2 control-label">Tel&eacute;fono</label>
			    <div class="col-lg-10">
			      <input type="text" class="form-control" id="telefono" name="telefono"
			             placeholder="+56979302846" value="<?php echo $telefono; ?>" length="15"  required>
			    </div>
			  </div>
			  <div class="modal-footer">
		  		<a href="/login" class="btn btn-default">Cancelar</a>
		      	<button type="submit" class="btn btn-primary">Guardar Datos</button>
		      </div>
			</form>
  		</div>
  	</div>
  </body>
</html>