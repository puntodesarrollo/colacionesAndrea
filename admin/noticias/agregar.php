<?php 

	$sesion = include $_SERVER['DOCUMENT_ROOT']."/admin/verificarSesion.php";

	if($sesion===false){
		header("location:/admin/login");
		exit;
	}


	include $_SERVER['DOCUMENT_ROOT']."/admin/header.php";
?>

	<br>
	<div class="page-header">
		<h2 class="text-center">Agregar Noticia</h2>
	</div>
	<br class="hidden-xs">
	<br class="hidden-xs">
	<div id="contenido">
		<div class="rows">
			<div class="col-xs-12 col-sm-8 col-sm-offset-2">
				<form action="subir.php" method="post" enctype="multipart/form-data" class="form-horizontal">
					<div id="divNombre" class="form-group">
						<label for="nombre" class="control-label">Título</label>
						<input type="text" class="form-control" name="nombre" id="nombre" 
						maxlength="100" placeholder="Título de noticia" required>
						<span id="spanInput" class="glyphicon form-control-feedback"></span>
						<div id="mensajeError" class="alert alert-danger hidden">
							<strong>Error: </strong> ya existe una noticia con este título
						</div>
					</div>
					<div class="form-group">
						<label for="nombre" class="control-label">Bajada de título</label>
						<textarea rows="3" name="bajada" id="bajada" class="form-control" placeholder="bajada de título" maxlength="200" style="width:100% !important" required ></textarea>
					</div>
					<div class="form-group">
						<label for="nombre" class="control-label">Texto</label>
						<textarea id="txtEditor"></textarea>
						<textarea id="txtEditorContent" name="txtEditorContent" hidden=""></textarea>
					</div>
					<div class="form-group">
						<label for="nombre" class="control-label">Imagen</label>
						<input type="file" class="filestyle" data-input="false" data-buttonText="Seleccionar imagen..." name="imagen" id="imagen">
					</div>
					<br />
					<br />
					<div class="modal-footer">
						<a href="/admin/noticias" class="btn btn-default btn-lg"><i class="glyphicon glyphicon-remove" aria-hidden="true"></i>&nbsp;Cancelar</a>
						<button id="botonAgregar" class="btn btn-primary btn-lg" disabled><i class="glyphicon glyphicon-floppy-disk" aria-hidden="true"></i>&nbsp;Agregar</button>
					</div>
				</form>
			</div>
		</div>		
	</div>	
<script>

	// A $( document ).ready() block.
	$( document ).ready(function() {
	    console.log( "ready!" );

	    $("#txtEditor").Editor();

	    $("#botonAgregar").click(function(){

			console.log($('#txtEditor').Editor("getText"));

			$('#txtEditorContent').text($('#txtEditor').Editor("getText"));
		});

		function verificarCampos(){
			
			habilitarBoton=true;
			
			nombre=$("#nombre").val();
			
			console.log("nombre: "+nombre);
			
			$.get( "verificarNombre.php", { nombre: nombre } )
				.done(function( data ) {
					console.log(data);
					if(data=="true")
					{
						$("#divNombre").addClass(" has-error");
						$("#divNombre").addClass(" has-feedback");
						$("#divNombre").removeClass(" has-success");
						$("#spanInput").addClass("glyphicon-remove");
						$("#spanInput").removeClass("glyphicon-ok");					
						$("#mensajeError").removeClass("hidden");
						
						habilitarBoton=false;
					}
					else 
					{
						$("#divNombre").removeClass(" has-error");
						$("#divNombre").addClass(" has-feedback");
						$("#divNombre").addClass(" has-success");
						$("#spanInput").addClass("glyphicon-ok");
						$("#spanInput").removeClass("glyphicon-remove");
						$("#mensajeError").addClass("hidden");
					}
					
					
					if(habilitarBoton)
					{
						$("#botonAgregar").removeAttr("disabled");
					}
					else
					{
						$("#botonAgregar").attr("disabled", "disabled");
					}
					
				});
		}

		$("#nombre").change(function () {
			verificarCampos();
		});
	});
</script>

<?php
	include $_SERVER['DOCUMENT_ROOT']."/admin/footer.php";
?>