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
    <h1 class="text-center">Detalle de Pedido</h1>
	<div class="table-responsive">
		<table class="table table-hover">
			<thead>
				<tr>
					<th>Producto</th>
					<th>Cantidad</th>
					<th>Precio</th>
				</tr>
			</thead>
			<tbody>
				<?php
					include $_SERVER['DOCUMENT_ROOT']."/admin/conexion.php";

					$sql="SELECT * FROM detallepedido WHERE IDpedido='$ID'";
		
					$result = mysqli_query($con,$sql);
					
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
							</tr>';
					}
					mysqli_close($con);
				?>				
			</tbody>
		</table>
		<div class="modal-footer">
			<a href="misCompras.php" class="btn btn-primary"><span class="glyphicon glyphicon-chevron-left"></span>&nbsp;Volver</a>
		</div>
	</div>

<?php
?>