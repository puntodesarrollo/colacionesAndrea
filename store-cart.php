<?php
    //Se verifica la sesión:
    $login = include $_SERVER['DOCUMENT_ROOT']."/login/verificarLogin.php";

    if($login===false)
    {
        header("location:/login.php");
    }

    //Se eliminan las compras antiguas:
    include $_SERVER['DOCUMENT_ROOT']."/login/eliminarAntiguasCarro.php";

?>
<?php
    include $_SERVER['DOCUMENT_ROOT']."/header.php";
?>
        
            <!-- Start main-header -->
            <header class="main-header" id="top">
                
                <?php
                    include $_SERVER['DOCUMENT_ROOT']."/carroCompra.php";
                ?>

                <div class="logo-container light-shark-bg align-center">
                    <a href="#" class="logo">
                        <img src="img/logo/logo_small.png" alt="Marine Food Logo">
                    </a>
                </div><!-- /logo-container -->
                <div class="header-bottom-bar hidden">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="contact-info align-right">
                                    <ul>
                                        <li>Need Help?  Call Us: +800 123-45-67</li>
                                        <li><a href="#">Email Customer Care</a></li>
                                        <li><a href="#">Shipping Information</a></li>
                                        <li><a href="#">Returns &amp; Exchanges</a></li>
                                    </ul>
                                </div><!-- /contact-info -->
                            </div><!-- /col-md-12 -->
                        </div><!-- /row -->
                    </div><!-- /container -->
                </div><!-- /header-bottom-bar -->
            </header>
            <!-- End main-header -->

            <section class="store-cart">
                <div class="container">
                    <form action="#" class="cart-items wow fadeInDown">
                        <table>
                            <thead>
                                <tr>
                                    <th class="item-thumb">Item</th>
                                    <th class="item-desc">Producto</th>
                                    <th>Precio</th>
                                    <th>Cantidad</th>
                                    <th>Cantidad Disponible</th>
                                    <th>Subtotal</th>
                                    <th class="remove-item"> </th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
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

                                        if($cantidadComprar>$cantidadDisponible || $cantidadComprar<=0)
                                        {
                                            $cantidadComprar=$cantidadDisponible;
                                            include $_SERVER['DOCUMENT_ROOT']."/login/actualizarDatosCompra.php";
                                        }

                                        if($cantidadComprar>0)
                                        {
                                            $primeraFoto = include $_SERVER['DOCUMENT_ROOT']."/login/productos/obtenerPrimeraImagen.php";

                                            echo '<tr>
                                                    <td class="item-thumb">
                                                        <figure>
                                                            <img src="' . $primeraFoto . '" alt="Marine Food">
                                                        </figure>
                                                    </td>
                                                    <td class="item-desc">'. $nombreProducto .'</td>
                                                    <td><strong>$'. $precioProducto .'</strong></td>
                                                    <td>
                                                        <input type="text" class="cart-item-count" readonly value="'. $cantidadComprar .'">
                                                        <a href="/login/aumentar.php?ID='. $ID .'" class="btn btn-primary"><i class="fa fa-plus"></i></a>
                                                        <a href="/login/disminuir.php?ID='. $ID .'" class="btn btn-primary"><i class="fa fa-minus"></i></a>
                                                    </td>
                                                    <td><strong>'. $cantidadDisponible .'</strong></td>
                                                    <td><strong>'. ($precioProducto * $cantidadComprar) .'</strong></td>
                                                    <td class="remove-item">
                                                        <a href="/login/eliminar.php?ID='. $ID .'" class="remove-items-link"><i class="fa fa-times-circle"></i></a>
                                                    </td>
                                                </tr>';
                                        }
                                        $totalCompra+=($precioProducto * $cantidadComprar);     
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
                                        

                                        echo '<tr>
                                                <td class="item-thumb">
                                                    <figure>
                                                        <img src="img/gallery/gallery18.jpg" alt="Marine Food">
                                                    </figure>
                                                </td>
                                                <td class="item-desc">'. $base . ' + ' . $acompanamiento . '</td>
                                                <td><strong>$'. $precioArmaPedido .'</strong></td>
                                                <td>
                                                    <input type="text" class="cart-item-count" readonly value="' . $cantidad . '">                                                        
                                                </td>
                                                <td><strong>-</strong></td>
                                                <td><strong>'. ($precioArmaPedido * $cantidad) .'</strong></td>
                                                <td class="remove-item">
                                                    <a href="/login/eliminarPedido.php?ID='. $ID .'" class="remove-items-link"><i class="fa fa-times-circle"></i></a>
                                                </td>
                                            </tr>';
                                        $totalCompra+=($precioArmaPedido * $cantidad);//*/
                                    }

                                    mysqli_close($conexion);
                                ?>
                            </tbody>
                        </table>
                    </form>
                    <div class="estimate-shopping wow fadeInDown">
                        <div class="row">                            
                            <div class="cart-subtotal-container col-md-3 col-md-offset-9">
                                <div class="subtotals">
                                    <div class="subtotal total">
                                        <h6>Total:</h6>
                                        <span><strong>$<?php echo $totalCompra;?>*</strong></span>
                                    </div><!-- /subtotal -->
                                </div><!-- /subtotal -->
                            </div>
                            <div class="col-md-4 col-md-offset-8">
                                <p>* a pedidos fuera de la <a href="#" id="botonZonaCobertura">zona de cobertura</a> se le agrega $1000 sobre el total</p>                                
                                <br class="hidden-xs">
                                <br class="hidden-xs">
                            </div>
                            <div class="col-md-12 align-right">
                                <a href="/store.php" class="custom-button button-style3 large">Continuar Pedido</a>
                                <?php 
                                    if($totalCompra>0)
                                    {
                                        echo '<a href="/login/realizarCompra.php" class="custom-button button-style3 large filled">Confirmar Pedido</a>';
                                    }
                                ?>
                                
                            </div>
                        </div><!-- /row -->
                    </div><!-- /estimate-shopping -->
                </div><!-- /container -->
            </section>

            <script type="text/javascript">
            jQuery(document).ready(function() {
               
                $("#botonZonaCobertura").click(function(){
                    console.log("hacia zona cobertura");
                    $('html, body').animate({
                            scrollTop: $("#map").offset().top
                        }, 1000);
                });
            });
        </script>
        
<?php
    include $_SERVER['DOCUMENT_ROOT']."/footer.php";
?>x|