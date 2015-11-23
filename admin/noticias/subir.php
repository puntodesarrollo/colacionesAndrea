<?php	
	$sesion = include $_SERVER['DOCUMENT_ROOT']."/admin/verificarSesion.php";

	if($sesion===false){
		header("location:/admin/login");
		exit;
	}

	define ('SITE_ROOT', realpath(dirname(__FILE__)));
	$path="/imagenes/";

	//Variables album
	$nombre = $_POST["nombre"];

	$bajada = $_POST["bajada"];

	$texto = $_POST['txtEditorContent'];

	//agregar los datos a la BD
	include $_SERVER['DOCUMENT_ROOT']."/admin/conexion.php";
	
	//Se agregan los datos

	if($_FILES["imagen"]["name"]!="")
	{
		$nombreArchivo =str_replace(" ","_",$_FILES['imagen']['name']);  		
  		$file_tmp  = $_FILES['imagen']['tmp_name'];
  		move_uploaded_file($file_tmp, SITE_ROOT. $path .$nombre.$nombreArchivo);
		$ruta="imagenes/" .$nombre.$nombreArchivo;
		$resultado = $con->query("INSERT INTO noticias (titulo,bajadaTitulo, fecha, imagen, texto) VALUES('$nombre','$bajada',now(),'$ruta', '$texto')"); 

	}
	else{
		$resultado = $con->query("INSERT INTO noticias (titulo,bajadaTitulo, fecha, texto) VALUES('$nombre','$bajada',now(), '$texto')");

	}

	mysqli_close($con);

	//redireccionar a programas
	header("location:/admin/noticias");
?>
