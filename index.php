<?php
    include $_SERVER['DOCUMENT_ROOT']."/header.php";
    include $_SERVER['DOCUMENT_ROOT']."/admin/conexion.php";
?>
                    
            <header class="main-header slider-on hidden-xs" id="top" style="height:370px" >
                <div class="main-slider-container">
                    <div class="main-slider" >
                        <ul class="scrollme">
                            <?php
                                 $sqlFotosSlider="SELECT * FROM slider";      
                
                                $resultFotosSlider = mysqli_query($con,$sqlFotosSlider);
                                $delay=0.2;
                                for ($x = 0; $x <$resultFotosSlider->num_rows; $x++) {

                                    $resultFotosSlider->data_seek($x);
                                    $resultadoFotoSl = $resultFotosSlider->fetch_assoc();   
                                    $ruta='admin/slider/'.$resultadoFotoSl["imagen"];                                   
                                    ?>
                                    <li data-transition="fade" data-slotamount="7" data-masterspeed="1500" >
                                        <img class="rs-parallaxlevel-1" src="<?php echo $ruta; ?>" alt="Marine Slider BG"  data-bgfit="contain" data-bgposition="left top" data-bgrepeat="no-repeat">
                              
                                                                        
                                
                                        <div class="tp-caption customin customout rs-parallaxlevel-2"
                                            data-x="center"
                                            data-y="center"
                                            data-voffset="250"
                                            data-customin="x:0;y:40;z:0;rotationX:0;rotationY:0;rotationZ:0;scaleX:1;scaleY:1;skewX:0;skewY:0;opacity:0;transformPerspective:1200;transformOrigin:50% 50%;"
                                            data-customout="x:0;y:0;z:0;rotationX:0;rotationY:0;rotationZ:0;scaleX:1;scaleY:1;skewX:0;skewY:0;opacity:1;transformPerspective:600;transformOrigin:50% 50%;"
                                            data-start="4000"
                                            data-speed="800"
                                            data-easing="Power2.easeInOut">
                                        </div>
                                    </li>                                        

                                    <?php                                                                 
                             
                                }                          
                            ?>                                                                                                                            
                        </ul>
                    </div><!-- /main-slider -->
                </div><!-- /main-slider-container -->
            </header>
            <!-- End main-header -->
                
            <section class="team" id="about" hidden>
                <div class="row">
                    <div class="col-md-6 wow fadeInLeft">
                        <div class="col-md-8 pull-right">
                            <header class="section-title wow fadeInLeft">
                                <h1><span>About</span> Our Chefs</h1>
                            </header>
                            <div class="members-details-container">
                                <div class="member">
                                    <div class="member-info clearfix">
                                        <figure class="member-thumb">
                                            <img src="img/team/member1-thumb.png" alt="Marine Food Membeer">
                                        </figure>
                                        <h3>Gustave Berneir</h3>
                                        <p class="member-post">Executive Chef</p>
                                    </div><!-- /member-info -->
                                    <div class="member-bio">
                                        <p class="italic">Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos.</p>
                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer lorem quam, adipiscing condimentum tristique vel, eleifend sed turpis. Pellentesque cursus arcu id magna euismod in elementum purus molestie. Curabitur pellentesque massa eu nulla consequat sed porttitor arcu porttitor. </p>
                                    </div><!-- /member-bio -->
                                </div><!-- /member -->
                                <div class="member">
                                    <div class="member-info clearfix">
                                        <figure class="member-thumb">
                                            <img src="img/team/member2-thumb.png" alt="Marine Food Membeer">
                                        </figure>
                                        <h3>Gino D'Acampo</h3>
                                        <p class="member-post">Master Chef</p>
                                    </div><!-- /member-info -->
                                    <div class="member-bio">
                                        <p class="italic">Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos.</p>
                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer lorem quam, adipiscing condimentum tristique vel, eleifend sed turpis. Pellentesque cursus arcu id magna euismod in elementum purus molestie. Curabitur pellentesque massa eu nulla consequat sed porttitor arcu porttitor. </p>
                                    </div><!-- /member-bio -->
                                </div><!-- /member -->
                            </div><!-- /members-details-container -->
                            <div class="team-carousel-nav"></div>
                        </div><!-- /col-md-8 -->
                    </div><!-- /col-md-6 -->
                    <div class="members-images-container col-md-6 pull-right wow fadeInRight">
                        <div class="member">
                            <div  class="member-image">
                                <figure>
                                    <img src="img/team/member1.jpg" alt="Marine Food Member">
                                </figure>
                            </div>
                        </div><!-- /member -->
                        <div class="member">
                            <div  class="member-image">
                                <figure>
                                    <img src="img/team/member2.jpg" alt="Marine Food Member">
                                </figure>
                            </div>
                        </div><!-- /member -->
                    </div><!-- /members-images-con -->
                </div><!-- /row -->
            </section><!-- /team -->

            <section class="gallery dark-bg" id="gallery" hidden>
                <div class="container">
                    <div class="row">
                        <div class="col-md-8 col-md-offset-2 wow fadeInDown">
                            <header class="section-title">
                                <h1><span>Our</span> Gallery</h1>
                                <p>Aenean sodales dictum augue, in faucibus nisi sollicitudin eu. Nulla semper arcu vel diam auctor. condimentum. Nam molestie sem eu quam fermentum a tempus nisi aliquet.</p>
                            </header>
                        </div><!-- /col-md-8 -->
                        <div class="col-md-12 wow fadeInDown">
                            <div class="gallery-filter-container">
                                <ul class="gallery-filter">
                                    <li class="filter active" data-filter="all"><span>All</span></li>
                                    <li class="filter" data-filter=".meat"><span>Meat</span></li>
                                    <li class="filter" data-filter=".fish"><span>Fish</span></li>
                                    <li class="filter" data-filter=".desert"><span>Desert</span></li>
                                    <li class="filter" data-filter=".vegetarian"><span>Vegetarian</span></li>
                                </ul>
                            </div><!-- /gellery-filter-container -->
                        </div><!-- /col-md-12 -->
                    </div><!-- /row -->
                </div><!-- /container -->
                <div class="gallery-items-container wow fadeInDown">
                    <ul class="clearfix">
                        <li class="overlay-container mix vegetarian">
                            <img src="img/gallery/gallery1.jpg" alt="Marine Food Gallery">
                            <div class="overlay">
                                <div class="overlay-details">
                                    <h3>Project Title</h3>
                                    <p>Graphic Design</p>
                                </div><!-- /overlay-details -->
                                <div class="buttons-container">
                                    <a href="#" class="button-link"></a>
                                    <a href="img/gallery/gallery1.jpg" class="button-zoom popup-trigger"></a>
                                </div><!-- /buttons-container -->
                            </div><!-- /overlay -->
                        </li>
                        <li class="overlay-container mix  desert">
                            <img src="img/gallery/gallery2.jpg" alt="Marine Food Gallery">
                            <div class="overlay">
                                <div class="overlay-details">
                                    <h3>Project Title</h3>
                                    <p>Graphic Design</p>
                                </div><!-- /overlay-details -->
                                <div class="buttons-container">
                                    <a href="#" class="button-link"></a>
                                    <a href="img/gallery/gallery2.jpg" class="button-zoom popup-trigger"></a>
                                </div><!-- /buttons-container -->
                            </div><!-- /overlay -->
                        </li>
                        <li class="overlay-container mix  vegetarian">
                            <img src="img/gallery/gallery3.jpg" alt="Marine Food Gallery">
                            <div class="overlay">
                                <div class="overlay-details">
                                    <h3>Project Title</h3>
                                    <p>Graphic Design</p>
                                </div><!-- /overlay-details -->
                                <div class="buttons-container">
                                    <a href="#" class="button-link"></a>
                                    <a href="img/gallery/gallery3.jpg" class="button-zoom popup-trigger"></a>
                                </div><!-- /buttons-container -->
                            </div><!-- /overlay -->
                        </li>
                        <li class="overlay-container mix meat">
                            <img src="img/gallery/gallery4.jpg" alt="Marine Food Gallery">
                            <div class="overlay">
                                <div class="overlay-details">
                                    <h3>Project Title</h3>
                                    <p>Graphic Design</p>
                                </div><!-- /overlay-details -->
                                <div class="buttons-container">
                                    <a href="#" class="button-link"></a>
                                    <a href="img/gallery/gallery4.jpg" class="button-zoom popup-trigger"></a>
                                </div><!-- /buttons-container -->
                            </div><!-- /overlay -->
                        </li>
                        <li class="overlay-container mix desert">
                            <img src="img/gallery/gallery5.jpg" alt="Marine Food Gallery">
                            <div class="overlay">
                                <div class="overlay-details">
                                    <h3>Project Title</h3>
                                    <p>Graphic Design</p>
                                </div><!-- /overlay-details -->
                                <div class="buttons-container">
                                    <a href="#" class="button-link"></a>
                                    <a href="img/gallery/gallery5.jpg" class="button-zoom popup-trigger"></a>
                                </div><!-- /buttons-container -->
                            </div><!-- /overlay -->
                        </li>
                        <li class="overlay-container mix fish">
                            <img src="img/gallery/gallery6.jpg" alt="Marine Food Gallery">
                            <div class="overlay">
                                <div class="overlay-details">
                                    <h3>Project Title</h3>
                                    <p>Graphic Design</p>
                                </div><!-- /overlay-details -->
                                <div class="buttons-container">
                                    <a href="#" class="button-link"></a>
                                    <a href="img/gallery/gallery6.jpg" class="button-zoom popup-trigger"></a>
                                </div><!-- /buttons-container -->
                            </div><!-- /overlay -->
                        </li>
                        <li class="overlay-container mix meat">
                            <img src="img/gallery/gallery7.jpg" alt="Marine Food Gallery">
                            <div class="overlay">
                                <div class="overlay-details">
                                    <h3>Project Title</h3>
                                    <p>Graphic Design</p>
                                </div><!-- /overlay-details -->
                                <div class="buttons-container">
                                    <a href="#" class="button-link"></a>
                                    <a href="img/gallery/gallery7.jpg" class="button-zoom popup-trigger"></a>
                                </div><!-- /buttons-container -->
                            </div><!-- /overlay -->
                        </li>
                        <li class="overlay-container mix meat">
                            <img src="img/gallery/gallery8.jpg" alt="Marine Food Gallery">
                            <div class="overlay">
                                <div class="overlay-details">
                                    <h3>Project Title</h3>
                                    <p>Graphic Design</p>
                                </div><!-- /overlay-details -->
                                <div class="buttons-container">
                                    <a href="#" class="button-link"></a>
                                    <a href="img/gallery/gallery8.jpg" class="button-zoom popup-trigger"></a>
                                </div><!-- /buttons-container -->
                            </div><!-- /overlay -->
                        </li>
                        <li class="overlay-container mix vegetarian">
                            <img src="img/gallery/gallery9.jpg" alt="Marine Food Gallery">
                            <div class="overlay">
                                <div class="overlay-details">
                                    <h3>Project Title</h3>
                                    <p>Graphic Design</p>
                                </div><!-- /overlay-details -->
                                <div class="buttons-container">
                                    <a href="#" class="button-link"></a>
                                    <a href="img/gallery/gallery9.jpg" class="button-zoom popup-trigger"></a>
                                </div><!-- /buttons-container -->
                            </div><!-- /overlay -->
                        </li>
                        <li class="overlay-container mix meat">
                            <img src="img/gallery/gallery10.jpg" alt="Marine Food Gallery">
                            <div class="overlay">
                                <div class="overlay-details">
                                    <h3>Project Title</h3>
                                    <p>Graphic Design</p>
                                </div><!-- /overlay-details -->
                                <div class="buttons-container">
                                    <a href="#" class="button-link"></a>
                                    <a href="img/gallery/gallery10.jpg" class="button-zoom popup-trigger"></a>
                                </div><!-- /buttons-container -->
                            </div><!-- /overlay -->
                        </li>
                    </ul>
                </div><!-- /gallery-items-container -->
            </section><!-- /gallery -->

            <section class="services" id="services" hidden>
                <div class="container">
                    <div class="row">
                        <div class="col-md-8 col-md-offset-2 wow fadeInDown">
                            <header class="section-title">
                                <h1><span>Our</span> Services</h1>
                                <p>Aenean sodales dictum augue, in faucibus nisi sollicitudin eu. Nulla semper arcu vel diam auctor. condimentum. Nam molestie sem eu quam fermentum a tempus nisi aliquet.</p>
                            </header>
                        </div><!-- /col-md-8 -->
                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-md-3 wow fadeInDown">
                                    <div class="service">
                                        <figure><img src="img/services/service1.png" alt="Marine Food Services"></figure>
                                        <h2>Breakfast</h2>
                                        <p>Lorem ipsum dolor sit amet, tetur piscing elit. Suspendisse smod congue bibendum. </p>
                                    </div><!-- /service -->
                                </div><!-- /col-md-3 -->
                                <div class="col-md-3 wow fadeInDown" data-wow-delay="0.2s">
                                    <div class="service">
                                        <figure><img src="img/services/service2.png" alt="Marine Food Services"></figure>
                                        <h2>Lunch</h2>
                                        <p>Lorem ipsum dolor sit amet, tetur piscing elit. Suspendisse smod congue bibendum. </p>
                                    </div><!-- /service -->
                                </div><!-- /col-md-3 -->
                                <div class="col-md-3 wow fadeInDown" data-wow-delay="0.4s">
                                    <div class="service">
                                        <figure><img src="img/services/service3.png" alt="Marine Food Services"></figure>
                                        <h2>Dinner</h2>
                                        <p>Lorem ipsum dolor sit amet, tetur piscing elit. Suspendisse smod congue bibendum. </p>
                                    </div><!-- /service -->
                                </div><!-- /col-md-3 -->
                                <div class="col-md-3 wow fadeInDown" data-wow-delay="0.6s">
                                    <div class="service">
                                        <figure><img src="img/services/service4.png" alt="Marine Food Services"></figure>
                                        <h2>Custom</h2>
                                        <p>Lorem ipsum dolor sit amet, tetur piscing elit. Suspendisse smod congue bibendum. </p>
                                    </div><!-- /service -->
                                </div><!-- /col-md-3 -->
                            </div><!-- /row -->
                        </div><!-- /services-container -->
                    </div><!-- /row -->
                </div><!-- /container -->
            </section><!-- /services -->

            <section class="menus dark-bg custom-bg1 parallax" data-stellar-background-ratio="0.5" data-stellar-vertical-offset="-150" id="menu">
                <div class="container">
                    <div class="row">
                        <div class="menus-container wow fadeInDown">
                           
                            <div class="menu-carousel">
                                <div class="menu col-md-12">
                                    <div class="row">
                                        <div class="col-md-8 col-md-offset-2">
                                            <header class="section-title">
                                                <h1><span>Nuestros Almuerzos</span> de Hoy</h1>
                                            </header>
                                        </div><!-- /col-md-8 -->
                                        <?php
                                        	
    	
    										$diaActual= date("w");
    										$sql="SELECT productos.id,productos.nombre,productos.descripcion,productos.precio,productos.cantidad FROM productos,dias_productos WHERE dias_productos.dia='$diaActual' AND productos.id=dias_productos.id_producto AND productos.mostrar=1";					
											$result = mysqli_query($con,$sql);
											if($result->num_rows==1){
												$cantidadProducto=$result->num_rows	;

											}else{
												$cantidadProducto=round(($result->num_rows)/2);	
											}											
											echo '<div class="col-md-6">';
											for ($i = 0; $i <$cantidadProducto; $i++) {
												$result->data_seek($i);
												$fila = $result->fetch_assoc();												
												echo '<div class="food">';
                                                	echo '<h6 class="food-name">'.$fila["nombre"].'</h6>';
                                                	echo '<div class="food-desc">';
                                                    	echo '<div class="food-details">';
                                                        	echo '<span>'.$fila["descripcion"].'</span>';
                                                    	echo '</div>';
                                                    	echo '<div class="dots"></div>';
                                                    	echo '<div class="food-price">';
                                                        	echo '<span>$'.number_format($fila["precio"]).'</span>';
                                                    	echo '</div>';
                                                	echo '</div>';
                                            	echo '</div>';																																				
											}
											echo '</div>';
											echo '<div class="col-md-6">';
											for ($i = $cantidadProducto; $i <$result->num_rows; $i++) {
												$result->data_seek($i);
												$fila = $result->fetch_assoc();
												echo '<div class="food">';
                                                	echo '<h6 class="food-name">'.$fila["nombre"].'</h6>';
                                                	echo '<div class="food-desc">';
                                                    	echo '<div class="food-details">';
                                                        	echo '<span>'.$fila["descripcion"].'</span>';
                                                    	echo '</div>';
                                                    	echo '<div class="dots"></div>';
                                                    	echo '<div class="food-price">';
                                                        	echo '<span>$'.number_format($fila["precio"]).'</span>';
                                                    	echo '</div>';
                                                	echo '</div>';
                                            	echo '</div>';																																					
											}
											echo '</div>';					
													
                                        ?>
                                       
                                        
                                    </div><!-- /row -->
                                </div><!-- menu -->
                                
                            </div><!-- /menu-carousel -->
                        </div><!-- /menus-container -->
                    </div><!-- /row -->
                </div><!-- /container -->
                <div class="container">
                    <div class="row">
                        <div class="col-md-12 align-center wow fadeInUp">
                            <a href="store.php" class="custom-button button-style1"><i class="fa fa-cutlery"></i>Realizar Pedido</a>
                        </div>
                    </div>
                </div><!-- /col-md-12 -->
            </section><!-- /menu -->


<?php
    include $_SERVER['DOCUMENT_ROOT']."/footer.php";
?>