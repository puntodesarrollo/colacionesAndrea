<?php
	//Se verifica la sesión:
	$login = include $_SERVER['DOCUMENT_ROOT']."/login/verificarLogin.php";

	if($login===false)
	{
		header("location:/login/");
	}

	//Se eliminan las compras antiguas:
	include $_SERVER['DOCUMENT_ROOT']."/login/eliminarAntiguasCarro.php";

?>
<div class="table-responsive">
	<h2>Productos en el carro:</h2>
	<table class="table table-hover">
		<thead>
			<tr>
				<th>Producto</th>
				<th>Cantidad</th>
				<th>Cantidad Disponible</th>
				<th>Precio</th>
				<th>Total</th>
			</tr>
		</thead>
		<tbody>
			<?php
				session_start();
				$IDusuario=$_SESSION['ID'];

				$conexion = include $_SERVER['DOCUMENT_ROOT']."/admin/crearConexion.php";

				$sql="SELECT * FROM compras WHERE IDusuario='$IDusuario'";
	
				$resultado = mysqli_query($conexion,$sql);

				$totalCompra = 0;
				
				for ($i = 0; $i <$resultado->num_rows; $i++) 
				{
					$resultado->data_seek($i);
					$filaActual = $resultado->fetch_assoc();
					$ID = $filaActual["ID"];
					$IDproducto = $filaActual["IDproducto"];
					$cantidadComprar = $filaActual["cantidad"];

					include $_SERVER['DOCUMENT_ROOT']."/login/obtenerDatosProducto.php";

					if($cantidadComprar>$cantidadDisponible)
					{
						$cantidadComprar=$cantidadDisponible;
						include $_SERVER['DOCUMENT_ROOT']."/login/actualizarDatosCompra.php";
					}

					echo '<tr>
							<td>'. $nombreProducto .'</td>
							<td>'. $cantidadComprar .'</td>
							<td>'. $cantidadDisponible .'</td>
							<td>'. $precioProducto .'</td>
							<td>'. ($precioProducto * $cantidadComprar) .'</td>
						</tr>';

					$totalCompra+=($precioProducto * $cantidadComprar);
				}

				mysqli_close($conexion);
			?>				
		</tbody>
	</table>
	<h3>Total Compra: <?php echo $totalCompra; ?></h3>
	<div class="modal-footer">
		<a href="realizarCompra.php" class="btn btn-primary"><span class="glyphicon glyphicon-plus"></span>&nbsp;Realizar Compra</a>
	</div>
</div>