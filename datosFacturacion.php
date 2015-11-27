<?php 

	session_start();
	$ID=$_SESSION['ID'];
	
	//Se hace la conexion:
	include $_SERVER['DOCUMENT_ROOT']."/admin/conexion.php";
	
	$sql="SELECT * FROM datosfacturacion WHERE IDusuario='$ID'";
						
	$result = mysqli_query($con,$sql);

	$mostrarAviso=true;
	
	for ($i = 0; $i <$result->num_rows; $i++) {
		$mostrarAviso=false;

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

<?php
  include '/login/configFacebook.php'; 
  include $_SERVER['DOCUMENT_ROOT']."/header.php";
?>

<section class="gallery dark-bg" id="gallery" style="height:100% !important">
    <div class="container">
  		<div class="col-sm-8 col-sm-offset-2">
  			<div class="page-header">
  				<h3>Mis datos de facturación:</h1>
  			</div>
  			<hr>
  			<?php
		    	if($mostrarAviso)
		    	{
		    		echo 'Los datos de facturación son opcionales, solamente debes llenarlos si deseas que te entreguemos una factura al momento de hacerte el envío';
		    	}
    	 	?>
    	 <hr>  			
  			<form class="form-horizontal" role="form" action="guardarDatosFacturacion.php" method="post">
			  <div class="form-group">
			    <label for="nombre" class="col-lg-2 control-label">Nombre o Raz&oacute;n Social</label>
			    <div class="col-lg-10">
			      <input type="text" class="form-control" id="nombre" name="nombre"
			             placeholder="Colaciones a Domicilio Andrea" value="<?php if(!$mostrarAviso) echo $razonsocial; ?>" length="200" required>
			    </div>
			  </div>
			  <div class="form-group">
			    <label for="nombre" class="col-lg-2 control-label">Rut</label>
			    <div class="col-lg-10">
			      <input type="text" class="form-control" id="rut" name="rut"
			             placeholder="11.111.111-1" value="<?php if(!$mostrarAviso) echo $rut; ?>" length="15" required>
			    </div>
			  </div>
			  <div class="form-group">
			    <label for="nombre" class="col-lg-2 control-label">Domicilio</label>
			    <div class="col-lg-10">
			      <input type="text" class="form-control" id="domicilio" name="domicilio"
			             placeholder="Los Capullos #4053, La Florida, La Serena" value="<?php if(!$mostrarAviso) echo $domicilio; ?>" length="150" required>
			    </div>
			  </div>
			  <div class="form-group">
			    <label for="nombre" class="col-lg-2 control-label">Comuna</label>
			    <div class="col-lg-10">
			      <input type="text" class="form-control" id="comuna" name="comuna"
			             placeholder="La Serena" value="<?php if(!$mostrarAviso) echo $comuna; ?>" length="50"  required>
			    </div>
			  </div>
			  <div class="form-group">
			    <label for="nombre" class="col-lg-2 control-label">Giro</label>
			    <div class="col-lg-10">
			      <input type="text" class="form-control" id="giro" name="giro"
			             placeholder="" value="<?php if(!$mostrarAviso) echo $giro; ?>" length="100"  required>
			    </div>
			  </div>
			  <div class="form-group">
			    <label for="nombre" class="col-lg-2 control-label">Tel&eacute;fono</label>
			    <div class="col-lg-10">
			      <input type="text" class="form-control" id="telefono" name="telefono"
			             placeholder="+56979302846" value="<?php if(!$mostrarAviso) echo $telefono; ?>" length="15"  required>
			    </div>
			  </div>
			  <div class="col-md-4 col-md-offset-8">
			  	<a href="/login.php" class="btn btn-default btn-block">Cancelar</a>
		      	<button type="submit" class="btn btn-primary btn-block">Guardar Datos</button>
	      	  </div>
		  		
			</form>
  		</div>
  


  </div>
  <br>
  <br>
</section>


<?php
    $mostrarMapa = false;
    include $_SERVER['DOCUMENT_ROOT']."/footer.php";
?>