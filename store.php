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
                <div class="top-banner-container top-banner-container-style2">
                    <div class="top-banner-bg custom-bg5 parallax" data-stellar-background-ratio="0.5"></div>
                    <div class="top-banner">
                        <div class="top-image">
                            <img src="img/slider-images/our-store.png" alt="Marine Food About">
                        </div><!-- /top-image -->
                        <div class="bottom-image">
                            <img src="img/slider-images/cooking-since2001.png" alt="Marine Food About">
                        </div><!-- /bottom-image -->
                    </div><!-- /top-banner -->
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
                                            echo '<img src="'.$rutaImagen.'" alt="'.$nombreProd.'">';
                                        echo '</a>';
                                    echo '</figure>';
                                    echo '<h3 class="food-name"><a href="store-item.html">'.$nombreProd.'</a></h3>';
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

            <section class="map">
                <div class="map-container wow fadeInDown">
                    <div id="google-map"></div>
                    <div id="cd-zoom-in"></div>
                    <div id="cd-zoom-out"></div>
                </div><!-- /map-container -->
            </section>

            <footer class="main-footer dark-bg">
                <div class="container">
                    <div class="row">
                        <div class="col-md-3 align-center">
                            <div class="logo-container wow fadeInLeft">
                                <a href="#">
                                    <img src="img/logo/logo-light-blue.png" alt="Marine Food Logo">
                                </a>
                            </div><!-- /logo-container -->
                            <div class="socials-container">
                                <ul>
                                    <li class="wow fadeInLeft"><a href="#"><i class="fa fa-facebook"></i></a></li>
                                    <li class="wow fadeInLeft" data-wow-delay="0.1s"><a href="#"><i class="fa fa-twitter"></i></a></li>
                                    <li class="wow fadeInLeft" data-wow-delay="0.2s"><a href="#"><i class="fa fa-skype"></i></a></li>
                                    <li class="wow fadeInLeft" data-wow-delay="0.3s"><a href="#"><i class="fa fa-google-plus"></i></a></li>
                                    <li class="wow fadeInLeft" data-wow-delay="0.4s"><a href="#"><i class="fa fa-linkedin"></i></a></li>
                                    <li class="wow fadeInLeft" data-wow-delay="0.5s"><a href="#"><i class="fa fa-instagram"></i></a></li>
                                </ul>
                            </div><!-- /socials-container -->
                        </div><!-- /col-md-3 -->
                        <div class="col-md-6 wow fadeInDown">
                            <div class="contact-form-contaienr">
                                <div class="section-title">
                                    <h1><span>Contact</span> Us</h1>
                                </div>
                                <form id="contact-form" method="post" action="php/contact.php">
                                    <input type="text" id="name" name="name" placeholder="Name*" required>
                                    <input type="email" id="email" name="email" placeholder="Email*" required>
                                    <textarea id="message" name="message" rows="6" placeholder="Message" required></textarea>
                                    <button type="submit">Send Message</button>
                                </form>
                                <div id="form-messages"></div>
                            </div><!-- /contact-form-container -->
                        </div><!-- /col-md-6 -->
                        <div class="col-md-3 wow fadeInRight">
                            <div class="address-container">
                                <address>
                                    <img src="img/template-assets/map-pin.png" alt="Marine Food Address">
                                    <p>
                                        <span>The Gourmet.</span>
                                        <span>PO Box 21177</span>
                                        <span>Little Lonsdale St, Melbourne</span>
                                        <span>Victoria 8011 Australia</span>
                                    </p>
                                    <img src="img/template-assets/phone-icon.png" alt="Marine Food Address">
                                    <p>
                                        <span>Phone: (415) 124-5678</span>
                                        <span>Fax: (415) 124-5678</span>
                                    </p>
                                    <img src="img/template-assets/mail-icon2.png" alt="Marine Food Address">
                                    <p>
                                        <span>support@yourname.com</span>
                                    </p>
                                </address>
                            </div><!-- /address-container -->
                        </div><!-- /col-md-3 -->
                        <div class="copyright col-md-12 wow fadeInUp" data-wow-delay="0.7s">
                            <p>&copy; 2015 The Gourmet. All Rights Reserved</p>
                        </div><!-- /copyright -->
                    </div><!-- /row -->
                </div><!-- /container -->
            </footer>

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
