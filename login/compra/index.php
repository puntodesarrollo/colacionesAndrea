<?php 
		session_start();		
		include $_SERVER['DOCUMENT_ROOT']."/admin/header.php";
    	include $_SERVER['DOCUMENT_ROOT']."/admin/conexion.php";
    	
    	$diaActual= date("w");

    	$sql="SELECT productos.id,productos.nombre,productos.descripcion,productos.precio,productos.cantidad FROM productos,dias_productos WHERE dias_productos.dia='$diaActual' AND productos.id=dias_productos.id_producto AND productos.mostrar=1";					
		$result = mysqli_query($con,$sql);			

    ?>
    <br>
    <br>
    <div class="page-header">
        <h2 class="text-center">Colaciones a la venta</h2>
    </div>
    <div class="row">    	
    	<div class="col-md-4 col-md-offset-8" id="divCarro">
    		Pedido:<br>
    	</div>
    </div>
	<div class="table-responsive">
			<table class="table table-hover table-striped">
				<thead>
					<tr>
						<th>Nombre</th>
						<th>Descripcion</th>
						<th>Valor</th>
						<th>Cantidad</th>
						<th>Agregar</th>					
					</tr>
				</thead>
				<tbody>
					<?php																	
					
					for ($i = 0; $i <$result->num_rows; $i++) {
						$result->data_seek($i);
						$fila = $result->fetch_assoc();

						$IDproducto=$fila["id"];
						include '../obtenerDatosProducto.php';							
						$stock=$cantidadDisponible;	
						echo '<tr>
							<td>'.$fila["nombre"].'<input class="nombre" value="'.$fila["nombre"].'" hidden/><input class="cantidadDisponible" value="'.$stock.'" hidden/></td>
							<td>'.$fila["descripcion"].'</td>
							<td>$'.number_format($fila["precio"]).'<input name="precio" class="precio" value="'.$fila["precio"].'" hidden/> </td>
							<td>
								<input type="number" class="form-control cantidad" name="cantidad" placeholder="Quedan '.$stock.' unidades a la venta"/> 	
							</td>
							<td>
								<a href="#" data-toggle="modal" data-target="#myModal" onclick="funcionAgregar(\''.$fila["id"].'\',\''.$stock.'\',this)">
										<span class="glyphicon glyphicon-plus-sign text-danger"></span>
								</a>
							</td>								
						</tr>';
					}					
					?>
				</tbody>
			</table>
			<div class="modal-footer">
				<a href="" class="btn btn-lg btn-default"><span class="glyphicon glyphicon-plus text-primary"></span>Confirmar Compra</a>
			</div>
		</div>
<?php 
	mysqli_close($con);
?>

<script type="text/javascript">
	function funcionAgregar(id,stock,elemento) {		
		//alert(id);
		var precio = $(elemento).closest('tr').find('.precio').val();
		
		var cantidad = $(elemento).closest('tr').find('.cantidad').val();
		var nombre = $(elemento).closest('tr').find('.nombre').val();
		var cantidadDisponible=$(elemento).closest('tr').find('.cantidadDisponible').val();
		if(cantidad==""){

			alert("Debe ingresar la cantidad");
		}else if(parseInt(cantidad)>parseInt(stock)){

			alert("La cantidad a pedir debe ser menor o igual al stock");
		}		 
		else if(parseInt(cantidadDisponible)<parseInt(cantidad)){
			alert("El pedido actual supera el stock disponible");	

		}
		else{
			$.ajax({
            	url: "/login/compra/agregarCompraBD.php", data: { "idProducto": id, "cantidad": cantidad },
            	success: function (retorno) {
            		var nuevaCantidadDisponible=parseInt(cantidadDisponible)-parseInt(cantidad);
            		
            		$(elemento).closest('tr').find('.cantidadDisponible').val(nuevaCantidadDisponible);
	            	$(elemento).closest('tr').find('.cantidad').attr("placeholder", "Quedan "+nuevaCantidadDisponible+" unidades a la venta");

               		var precioTotal=parseInt(precio)*parseInt(cantidad);
					var texto=nombre+"("+cantidad+")="+formatoPrecio(precioTotal)+"<br>"; 
					$("#divCarro").append(texto);
            	}
        	});
		}		
	}

	function formatoPrecio(n) {
            var number = new String(n);
            var result = "";
            isNegative = false;
            if (number.indexOf("-") > -1) {
                number = number.substr(1);
                isNegative = true;
            }

            while (number.length > 3) {
                result = '.' + number.substr(number.length - 3) + result;

                number = number.substring(0, number.length - 3);

            }
            result = number + result;
            if (isNegative) result = '-' + result;
          
            return '$' + result;
        }
		
</script>	

<?php
	mysqli_close($con);
	include $_SERVER['DOCUMENT_ROOT']."/admin/footer.php";
?>		
