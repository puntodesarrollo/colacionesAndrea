<?php

	ini_set('display_errors', 1);
	ini_set('display_startup_errors', 1);
	error_reporting(E_ALL);

	$retorno="-1";

	session_start();

	if(isset($_SESSION['ID'])){

		$IDusuario = $_SESSION['ID'];
	}else{
		$IDusuario = '';
	}

	//Se eliminan las compras antiguas:
	include $_SERVER['DOCUMENT_ROOT']."/login/eliminarAntiguasCarro.php";

	
	$ipUsuario = $_SERVER["REMOTE_ADDR"];

	$conexion = include $_SERVER['DOCUMENT_ROOT']."/admin/crearConexion.php";

	$sql="SELECT * FROM compras WHERE IDusuario='$IDusuario' OR ipUsuario='$ipUsuario'";

	$resultado = mysqli_query($conexion,$sql);

	$totalCompra = 0;

	$arr = array();

	for ($i = 0; $i <$resultado->num_rows; $i++) 
	{
		$resultado->data_seek($i);
		$filaActual = $resultado->fetch_assoc();
		$ID = $filaActual["ID"];
		$IDproducto = $filaActual["IDproducto"];
		$cantidadComprar = $filaActual["cantidad"];

		include $_SERVER['DOCUMENT_ROOT']."/login/obtenerDatosProducto.php";

		if($cantidadComprar>$cantidadDisponible || $cantidadComprar<=0)
		{
			$cantidadComprar=$cantidadDisponible;
			include $_SERVER['DOCUMENT_ROOT']."/login/actualizarDatosCompra.php";
		}

		if($cantidadComprar>0)
		{
			$primeraFoto= include $_SERVER['DOCUMENT_ROOT']."/login/productos/obtenerPrimeraImagen.php";

			$array = array('ID' => $ID, 'iIDproducto' => $IDproducto, 'nombreProducto' => $nombreProducto, 'cantidadComprar' => $cantidadComprar, 'precioProducto' => $precioProducto, 'imagen' => $primeraFoto);
			array_push($arr,$array);
		}
	}

	$conexion = include $_SERVER['DOCUMENT_ROOT']."/admin/crearConexion.php";

    $sql="SELECT * FROM comprasarmapedido WHERE IDusuario='$IDusuario'";

    $resultado = mysqli_query($conexion,$sql);

    $precioArmaPedido = include $_SERVER['DOCUMENT_ROOT']."/login/obtenerPrecioPedido.php";

    for ($i = 0; $i <$resultado->num_rows; $i++) 
    {
        $resultado->data_seek($i);
        $filaActual = $resultado->fetch_assoc();
        $ID = $filaActual["ID"];
        $base = $filaActual["base"];
        $acompanamiento = $filaActual["acompanamiento"];
        $cantidad = $filaActual["cantidad"];

        $nombreProducto = $base . ' + ' . $acompanamiento;
        
        $array = array('ID' => $ID, 'iIDproducto' => "armaPedido", 'nombreProducto' => $nombreProducto , 'cantidadComprar' => $cantidad, 'precioProducto' => $precioArmaPedido, 'imagen' => "");
		array_push($arr,$array);
    }

	//mysqli_close($conexion);
	echo json_encode($arr);
?>