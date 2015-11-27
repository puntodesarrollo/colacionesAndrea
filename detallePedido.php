<?php 

	if($_GET["t"]!=null){
		$ID = $_GET["t"];
	}
	else
	{
		header("location:/login/misCompras.php");
		exit;
	}


?>


<?php
  include '/login/configFacebook.php'; 
  include $_SERVER['DOCUMENT_ROOT']."/header.php";
?>

<section class="gallery dark-bg" id="gallery" style="height:100% !important">
    <div class="container col-md-8 col-md-offset-2">


    <h1 class="text-center">Detalle de Pedido</h1>
    <hr>
	<div class="table-responsive">
		<table class="table table-bordered">
			<thead>
				<tr>
					<th>Producto</th>
					<th>Cantidad</th>
					<th>Precio</th>					
					<th>Subtotal</th>
				</tr>
			</thead>
			<tbody>
				<?php
					include $_SERVER['DOCUMENT_ROOT']."/admin/conexion.php";

					$sql="SELECT * FROM detallepedido WHERE IDpedido='$ID'";
		
					$result = mysqli_query($con,$sql);

					$total = 0;
					
					for ($i = 0; $i <$result->num_rows; $i++) 
					{
						$result->data_seek($i);
						$fila = $result->fetch_assoc();
						$IDproducto = $fila["IDproducto"];

						include $_SERVER['DOCUMENT_ROOT']."/admin/obtenerDatosProducto.php";

						echo '<tr>
								<td>'. $Producto .'</td>
								<td>'. $fila["cantidad"] .'</td>
								<td>'. $fila["precio"] .'</td>
								<td>'. ($fila["precio"] * $fila["cantidad"]) .'</td>
							</tr>';

							$total += ($fila["precio"] * $fila["cantidad"]);
					}

					$sql="SELECT * FROM pedidoarmapedido WHERE IDpedido='$ID'";
		
					$result = mysqli_query($con,$sql);
					
					for ($i = 0; $i <$result->num_rows; $i++) 
					{
						$result->data_seek($i);
						$fila = $result->fetch_assoc();
						$base = $fila["base"];
						$acompanamiento = $fila["acompanamiento"];
						$Producto = $base . " + " . $acompanamiento;

						echo '<tr>
								<td>'. $Producto .'</td>
								<td>'. $fila["cantidad"] .'</td>
								<td>'. $fila["precio"] .'</td>
								<td>'. ($fila["precio"] * $fila["cantidad"]) .'</td>
							</tr>';
						$total += ($fila["precio"] * $fila["cantidad"]);
					}
					mysqli_close($con);
				?>				
			</tbody>
		</table>
		<div class="modal-footer">
			<h3>Total: <small><?php echo $total; ?></small></h3>
			<br>
			<a href="misCompras.php" class="btn btn-primary"><span class="glyphicon glyphicon-chevron-left"></span>&nbsp;Volver</a>
		</div>
	</div>



	 </div>
  <br>
  <br>
</section>


<?php
    $mostrarMapa = false;
    include $_SERVER['DOCUMENT_ROOT']."/footer.php";
?>