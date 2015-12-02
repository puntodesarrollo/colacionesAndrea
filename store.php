<?php
    include $_SERVER['DOCUMENT_ROOT']."/header.php";

    include $_SERVER['DOCUMENT_ROOT']."/admin/conexion.php";

    $sqlCategorias="SELECT * FROM categorias";      
                
    $resultCategorias = mysqli_query($con,$sqlCategorias);


?>
            <header class="main-header" id="top">
                <?php
                    include $_SERVER['DOCUMENT_ROOT']."/carroCompra.php";
                ?>    
                <div class="top-banner-container">
                    <div class="logo-container light-shark-bg align-center">
                        <a href="#" class="logo">
                            <img src="/img/logo/logo_small.png" alt="Marine Food Logo">
                        </a>
                    </div><!-- /logo-container -->                    
                    <!--<div class="top-banner-bg custom-bg5 parallax" data-stellar-background-ratio="0.5"></div>
                    <div class="top-banner">
                        <div class="top-image">
                            <img src="img/slider-images/our-store.png" alt="Marine Food About">
                        </div>>
                        <div class="bottom-image">
                            <img src="img/slider-images/cooking-since2001.png" alt="Marine Food About">
                        </div>
                    </div> /top-banner -->
                    <div class="header-bottom-bar">
                        <div class="container">
                            <div class="row">
                                <div class="col-md-9">
                                    <ul class="category-filter store-category-filter">
                                        <li class="filter active" data-filter="all"><span>Todos</span></li>
                                        <?php
                                            for ($i = 0; $i <$resultCategorias->num_rows; $i++) {           
                                                $resultCategorias->data_seek($i);
                                                $fila = $resultCategorias->fetch_assoc();                       
                                                $idCat=$fila["ID"];                                
                                                $nombreCat=$fila["nombre"];
                                                echo "<li class='filter' data-filter='.".$nombreCat."'><span>".$nombreCat."</span></li>";        
                                            }
                                        ?>

                                    </ul>
                                    <br>
                                </div><!-- col-md-9 -->
                              
                            </div><!-- /row -->
                        </div><!-- /container -->
                    </div><!-- /header-bottom-bar -->
                </div><!-- /top-banner-container -->
            </header>        

            <?php

                $diaActual= date("w");

                $sqlSelect="SELECT productos.id,productos.nombre,productos.descripcion,productos.precio,productos.cantidad,categorias.nombre AS nombreCategoria FROM productos,dias_productos,categorias WHERE dias_productos.dia='$diaActual' AND productos.id=dias_productos.id_producto AND productos.mostrar=1 AND categorias.ID=productos.Idcategoria";                  
                $resultSelect = mysqli_query($con,$sqlSelect);      

            ?>

            <section class="store-items">
                <div class="container">
                    <div class="row">
                    <?php                                                                   
                   
                       for ($x = 0; $x <$resultSelect->num_rows; $x++) {

                            $resultSelect->data_seek($x);
                            $filaResult = $resultSelect->fetch_assoc();

                            $id_producto=$filaResult["id"];
                            $nombreProd=$filaResult["nombre"];
                            $precio=$filaResult["precio"];
                            $descripcion=$filaResult["descripcion"];

                            $categoria=$filaResult["nombreCategoria"];

                            include $_SERVER['DOCUMENT_ROOT']."/login/productos/obtenerImagenes.php";                                
                            if(empty($arrayImagenes)){

                                $rutaImagen="img/gallery/gallery18.jpg";
                            }else{
                                $rutaImagen=$arrayImagenes[0];
                            }
                            
                            echo '<div class="col-md-4 col-sm-6 col-xs-12 mix '.$categoria.'">';
                                echo '<div class="store-item wow fadeInDown">';
                                    echo '<figure>';
                                        echo '<a href="store-item.php?p='.$id_producto.'">';
                                            echo '<img src="'.$rutaImagen.'" alt="'.$nombreProd.'" height="369px">';
                                        echo '</a>';
                                    echo '</figure>';
                                    echo '<h3 class="food-name"><a href="store-item.php?p='.$id_producto.'">'.$nombreProd.'</a></h3>';
                                    echo '<ul class="food-category">';
                                        echo '<li>'.$descripcion.'</li>';
                                    echo '</ul>';
                                    echo '<div class="food-order">';
                                        echo '<p class="food-price">$'.number_format($precio).'</p>';
                                        echo '<a href="" class="add-to-cart-link" onclick="return funcionAgregar(\''.$id_producto.'\')">Agregar al Pedido</a>';
                                    echo '</div>';
                                echo '</div>';
                            echo '</div>';    

                        }                   
                    ?>            
                    </div><!-- /row -->                    
                </div><!-- /container -->
            </section>

            <section class="clients white-rock-bg">
                <div class="container">
                    <div class="clients-carousel grayscale-image row">
                     <?php
                        $sqlFotosPiePagina="SELECT * FROM fotos_productos";      
                
                        $resultFotosPiePagina = mysqli_query($con,$sqlFotosPiePagina);
                        $delay=0.2;
                        for ($x = 0; $x <$resultFotosPiePagina->num_rows; $x++) {

                            $resultFotosPiePagina->data_seek($x);
                            $resultadoImagenes = $resultFotosPiePagina->fetch_assoc();   
                            $ruta='admin/productos/'.$resultadoImagenes["ruta_foto"];
                            if($x==0){
                                echo '<div class="client-logo-container wow fadeInUp">';
                                    echo '<figure class="client-logo">';
                                        echo '<img src="'.$ruta.'" alt="Marine Food Clients" height="106px">';
                                    echo '</figure>';
                                echo '</div>';
                            }else{
                                echo '<div class="client-logo-container wow fadeInUp" data-wow-delay="'.$delay.'s">';
                                    echo '<figure class="client-logo">';
                                        echo '<img src="'.$ruta.'" alt="Marine Food Clients" height="106px">';
                                    echo '</figure>';
                                echo '</div>';
                                $delay=$delay+0.2;    
                            }
                             
                         }                        
                     ?>                                         
                    </div><!-- /row -->
                </div><!-- /contianer -->
            </section>
        

<script type="text/javascript">
    function funcionAgregar(id) {        
        //alert(id);
       
            $.ajax({
                url: "/login/compra/agregarCompraBD.php", data: { "idProducto": id },
                success: function (retorno) {  

                    actualizarCarro();
                    
                }
            });
               
            return false;
    }
 
        
</script>            
<?php
    include $_SERVER['DOCUMENT_ROOT']."/footer.php";
?>
