<?php
        include $_SERVER['DOCUMENT_ROOT']."/header.php";
        include $_SERVER['DOCUMENT_ROOT']."/admin/conexion.php";

        $id_producto= $_GET["p"];       

        $sql="SELECT * FROM productos WHERE id='$id_producto'"; 

        $result = mysqli_query($con,$sql);
        

        for ($i = 0; $i <$result->num_rows; $i++) {         
            $result->data_seek($i);
            $fila = $result->fetch_assoc();                     
            $nombre=$fila["nombre"];                                
            $descripcion=$fila["descripcion"];
            $cantidad=$fila["cantidad"];
            $precio=$fila["precio"];
            $Idcategoria = $fila["Idcategoria"];            
            
        }


        $sqlCategoriaProd="SELECT * FROM categorias WHERE ID='$Idcategoria'"; 

        $resulCategoriaProd = mysqli_query($con,$sqlCategoriaProd);
        

        for ($i = 0; $i <$resulCategoriaProd->num_rows; $i++) {         
            $resulCategoriaProd->data_seek($i);
            $fila = $resulCategoriaProd->fetch_assoc();                     
            $nombreCategoria=$fila["nombre"];                                
            
        }

        $sqlCategorias="SELECT * FROM categorias";      
                
        $resultCategorias = mysqli_query($con,$sqlCategorias);
?>
        <div class="wrapper">
        
            <!-- Start main-header -->
            <header class="main-header" id="top">
                <?php
                    include $_SERVER['DOCUMENT_ROOT']."/carroCompra.php";
                ?> 
                <div class="logo-container light-shark-bg align-center">
                    <a href="#" class="logo">
                        <img src="img/logo/logo.png" alt="Marine Food Logo">
                    </a>
                </div><!-- /logo-container -->
                <div class="header-bottom-bar">
                </div><!-- /header-bottom-bar -->
            </header>
            <!-- End main-header -->

            <section class="store-items store-items-details">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="store-item store-item-detail row">
                                <div class="col-md-6 wow fadeInLeft">
                                    <div class="item-slideshow">
                                        <?php
                                            include $_SERVER['DOCUMENT_ROOT']."/login/productos/obtenerImagenes.php";

                                            if(empty($arrayImagenes)){

                                                array_push($arrayImagenes,"img/gallery/gallery24.jpg");
                                            }
                                           
                                        ?>
                                        <div class="main-image">
                                            <?php
                                                foreach ($arrayImagenes as $imagen) {
                                                    echo '<figure><img src="'.$imagen.'" alt="Marine Food"></figure>';        
                                                }
                                            ?>                                           
                                        </div><!-- /main-image -->
                                        <div class="thumbnails">
                                             <?php
                                                foreach ($arrayImagenes as $imagen) {
                                                    echo '<figure><img src="'.$imagen.'" alt="Marine Food"></figure>';        
                                                } 
                                            ?>                                              
                                        </div><!-- /thumbnails -->
                                    </div><!-- /item-slideshow -->
                                </div><!-- /col-md-6 -->
                                <div class="col-md-6 wow fadeInRight">
                                    <ul class="breadcrumb">
                                        
                                        <li><?php echo $nombreCategoria;?></li>
                                    </ul>
                                    <div class="food-info">
                                        <h3 class="food-name"><?php echo $nombre; ?></h3>
                                        <p class="food-price"><?php echo '$'.number_format($precio); ?></p>
                                        <p><?php echo $descripcion; ?></p>
                                    </div><!-- /food-info -->                                    
                                    <form class="food-order-form">
                                        <input type="text" name="cantidad" id="order-count" value="1">
                                        <?php
                                             echo '<input type="submit" value="Agregar" onclick="return funcionAgregar(\''.$id_producto.'\')">';
                                        ?>
                                    </form><!-- /food-order -->                                                                        
                                </div><!-- /col-md-6 -->
                            </div><!-- /store-item -->
                        </div><!-- /col-md-12 -->                        
                    </div><!-- /row -->
                </div><!-- /container -->
            </section>
            <section class="clients white-rock-bg">
                <div class="container">
                    <div class="clients-carousel grayscale-image row">
                        <div class="client-logo-container wow fadeInUp">
                            <figure class="client-logo">
                                <img src="img/clients/client1.png" alt="Marine Food Clients">
                            </figure>
                        </div><!-- /client-logo-container -->
                        <div class="client-logo-container wow fadeInUp" data-wow-delay="0.2s">
                            <figure class="client-logo">
                                <img src="img/clients/client2.png" alt="Marine Food Clients">
                            </figure>
                        </div><!-- /client-logo-container -->
                        <div class="client-logo-container wow fadeInUp" data-wow-delay="0.4s">
                            <figure class="client-logo">
                                <img src="img/clients/client3.png" alt="Marine Food Clients">
                            </figure>
                        </div><!-- /client-logo-container -->
                        <div class="client-logo-container wow fadeInUp" data-wow-delay="0.6s">
                            <figure class="client-logo">
                                <img src="img/clients/client4.png" alt="Marine Food Clients">
                            </figure>
                        </div><!-- /client-logo-container -->
                        <div class="client-logo-container wow fadeInUp" data-wow-delay="0.8s">
                            <figure class="client-logo">
                                <img src="img/clients/client5.png" alt="Marine Food Clients">
                            </figure>
                        </div><!-- /client-logo-container -->
                    </div><!-- /row -->
                </div><!-- /contianer -->
            </section>

<script type="text/javascript">
    function funcionAgregar(id) {        
        //alert(id);
        var cantidad = $("#order-count").val();
        
            $.ajax({
                url: "/login/compra/agregarCompraBD.php", data: { "idProducto": id ,"cantidad":cantidad},
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
