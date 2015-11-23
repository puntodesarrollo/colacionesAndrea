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
						<textarea rows="6" name="texto" id="texto" class="form-control" placeholder="bajada de título" maxlength="1000" style="width:100% !important" required ></textarea>
						<div id="alerts"></div>
    <div class="btn-toolbar" data-role="editor-toolbar" data-target="#editor">
      <div class="btn-group">
        <a class="btn dropdown-toggle" data-toggle="dropdown" title="Font"><i class="icon-font"></i><b class="caret"></b></a>
          <ul class="dropdown-menu">
          </ul>
        </div>
      <div class="btn-group">
        <a class="btn dropdown-toggle" data-toggle="dropdown" title="Font Size"><i class="icon-text-height"></i>&nbsp;<b class="caret"></b></a>
          <ul class="dropdown-menu">
          <li><a data-edit="fontSize 5"><font size="5">Huge</font></a></li>
          <li><a data-edit="fontSize 3"><font size="3">Normal</font></a></li>
          <li><a data-edit="fontSize 1"><font size="1">Small</font></a></li>
          </ul>
      </div>
      <div class="btn-group">
        <a class="btn" data-edit="bold" title="Bold (Ctrl/Cmd+B)"><i class="icon-bold"></i></a>
        <a class="btn" data-edit="italic" title="Italic (Ctrl/Cmd+I)"><i class="icon-italic"></i></a>
        <a class="btn" data-edit="strikethrough" title="Strikethrough"><i class="icon-strikethrough"></i></a>
        <a class="btn" data-edit="underline" title="Underline (Ctrl/Cmd+U)"><i class="icon-underline"></i></a>
      </div>
      <div class="btn-group">
        <a class="btn" data-edit="insertunorderedlist" title="Bullet list"><i class="icon-list-ul"></i></a>
        <a class="btn" data-edit="insertorderedlist" title="Number list"><i class="icon-list-ol"></i></a>
        <a class="btn" data-edit="outdent" title="Reduce indent (Shift+Tab)"><i class="icon-indent-left"></i></a>
        <a class="btn" data-edit="indent" title="Indent (Tab)"><i class="icon-indent-right"></i></a>
      </div>
      <div class="btn-group">
        <a class="btn" data-edit="justifyleft" title="Align Left (Ctrl/Cmd+L)"><i class="icon-align-left"></i></a>
        <a class="btn" data-edit="justifycenter" title="Center (Ctrl/Cmd+E)"><i class="icon-align-center"></i></a>
        <a class="btn" data-edit="justifyright" title="Align Right (Ctrl/Cmd+R)"><i class="icon-align-right"></i></a>
        <a class="btn" data-edit="justifyfull" title="Justify (Ctrl/Cmd+J)"><i class="icon-align-justify"></i></a>
      </div>
      <div class="btn-group">
		  <a class="btn dropdown-toggle" data-toggle="dropdown" title="Hyperlink"><i class="icon-link"></i></a>
		    <div class="dropdown-menu input-append">
			    <input class="span2" placeholder="URL" type="text" data-edit="createLink"/>
			    <button class="btn" type="button">Add</button>
        </div>
        <a class="btn" data-edit="unlink" title="Remove Hyperlink"><i class="icon-cut"></i></a>

      </div>
      
      <div class="btn-group">
        <a class="btn" title="Insert picture (or just drag & drop)" id="pictureBtn"><i class="icon-picture"></i></a>
        <input type="file" data-role="magic-overlay" data-target="#pictureBtn" data-edit="insertImage" />
      </div>
      <div class="btn-group">
        <a class="btn" data-edit="undo" title="Undo (Ctrl/Cmd+Z)"><i class="icon-undo"></i></a>
        <a class="btn" data-edit="redo" title="Redo (Ctrl/Cmd+Y)"><i class="icon-repeat"></i></a>
      </div>
      <input type="text" data-edit="inserttext" id="voiceBtn" x-webkit-speech="">
    </div>

    <div id="editor">
      Go ahead&hellip;
    </div>
  </div>
					<div class="form-group">
						<label for="nombre" class="control-label">Imagen</label>
						<input type="file" class="filestyle" data-input="false" data-buttonText="Seleccionar imagen..." name="imagen" id="imagen">
					</div>
					<br />
					<br />
					<div class="modal-footer">
						<a href="/admin/creatuplato" class="btn btn-default btn-lg"><i class="glyphicon glyphicon-remove" aria-hidden="true"></i>&nbsp;Cancelar</a>
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
	    $('#editor').wysiwyg();

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
