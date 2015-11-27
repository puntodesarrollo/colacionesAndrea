<?php

	//Se verifica la sesión:
	$login = include $_SERVER['DOCUMENT_ROOT']."/login/verificarLogin.php";

	if($login===false)
	{
		header("location:/login/");
	}

?>


<?php
  include '/login/configFacebook.php'; 
  include $_SERVER['DOCUMENT_ROOT']."/header.php";
?>

<section class="gallery dark-bg" id="gallery" style="height:100% !important">
    <div class="container col-md-8 col-md-offset-2">

<h1 class="text-center">Mis Compras</h1>
<hr>
	<div class="table-responsive">
		<table class="table table-bordered">
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
									<td><a href="detallePedido.php?t='.$IDpedido.'" style="color:aqua !important">Ver Detalle</a>
									<td>S&iacute;</td>
								</tr>';
						}
						else
						{
							echo '<tr>
									<td>'. $Usuario .'</td>
									<td>'. $Fecha .'</td>
									<td>'. $Total .'</td>
									<td><a href="detallePedido.php?t='.$IDpedido.'" style="color:aqua !important">Ver Detalle</a>
									<td>No</td>
								</tr>';
						}
					}
				?>
			</tbody>
		</table>
		<div class="modal-footer">
			<a href="/login.php" class="btn btn-default btn-lg"><span class="glyphicon glyphicon-chevron-left"></span>&nbsp;Volver</a>
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