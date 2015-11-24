<?php

	//Se verifica la sesión:
	$login = include $_SERVER['DOCUMENT_ROOT']."/login/verificarLogin.php";

	if($login===false)
	{
		header("location:/login/");
	}

?>

<h1 class="text-center">Mis Compras</h1>
	<div class="table-responsive">
		<table class="table table-hover">
			<thead>
				<tr>
					<th>Usuario</th>
					<th>Fecha</th>
					<th>Total Ventas</th>
					<th>Ver Detalle</th>
					<th>Entregado</th>
				</tr>
			</thead>
			<tbody>
				<?php

					session_start();
					$IDusuario=$_SESSION['ID'];

					include $_SERVER['DOCUMENT_ROOT']."/admin/conexion.php";

					$sql="SELECT ID, entregado FROM pedidos WHERE IDusuario='$IDusuario'";
		
					$result = mysqli_query($con,$sql);
					
					for ($i = 0; $i <$result->num_rows; $i++) 
					{
						$result->data_seek($i);
						$fila = $result->fetch_assoc();

						$IDpedido = $fila["ID"];

						include $_SERVER['DOCUMENT_ROOT']."/admin/obtenerDatosVenta.php";

						if( $fila["entregado"]=="true")
						{
							echo '<tr>
									<td>'. $Usuario .'</td>
									<td>'. $Fecha .'</td>
									<td>'. $Total .'</td>
									<td><a href="detallePedido.php?t='.$IDpedido.'">Ver Detalle</a>
									<td>S&iacute;</td>
								</tr>';
						}
						else
						{
							echo '<tr>
									<td>'. $Usuario .'</td>
									<td>'. $Fecha .'</td>
									<td>'. $Total .'</td>
									<td><a href="detallePedido.php?t='.$IDpedido.'">Ver Detalle</a>
									<td>No</td>
								</tr>';
						}
					}
				?>
			</tbody>
		</table>
		<div class="modal-footer">
			<a href="agregar.php" class="btn btn-primary"><span class="glyphicon glyphicon-plus"></span>&nbsp;Agregar</a>
		</div>
	</div>