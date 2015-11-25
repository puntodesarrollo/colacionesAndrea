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
                            <div class="col-md-3">                               
                            </div><!-- /col-md-3 -->
                        </div><!-- /row -->
                    </div><!-- /container -->
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
                                        <div class="main-image">
                                            <figure><img src="img/gallery/gallery24.jpg" alt="Marine Food"></figure>
                                            <figure><img src="img/gallery/gallery28.jpg" alt="Marine Food"></figure>
                                            <figure><img src="img/gallery/gallery29.jpg" alt="Marine Food"></figure>
                                        </div><!-- /main-image -->
                                        <div class="thumbnails">
                                            <figure><img src="img/gallery/gallery25.jpg" alt="Marine Food"></figure>
                                            <figure><img src="img/gallery/gallery26.jpg" alt="Marine Food"></figure>
                                            <figure><img src="img/gallery/gallery27.jpg" alt="Marine Food"></figure>
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
        var cantidad = $("#order-count").val();
        
            $.ajax({
                url: "/login/compra/agregarCompraBD.php", data: { "idProducto": id ,"cantidad":cantidad},
                success: function (retorno) {                  
                    //$("#divCarro").append(texto);
                    
                }
            });
               
            return false;
    }
 
        
</script> 

<?php
    include $_SERVER['DOCUMENT_ROOT']."/footer.php";
?>
