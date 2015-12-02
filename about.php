<?php
    include $_SERVER['DOCUMENT_ROOT']."/header.php";

    include $_SERVER['DOCUMENT_ROOT']."/admin/conexion.php";

    $sqlCategorias="SELECT * FROM categorias";      
                    


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
                </div><!-- /top-banner-container -->
            </header>                
                        <section class="about dark-bg">
                <div class="container">
                    <div class="row">
                        <header class="section-title col-md-6 col-md-offset-3 wow fadeInDown">
                            <h1><span>Quienes</span> Somos</h1>
                            <p>Colaciones Andrea, Delivery La Serena &amp; Coquimbo </p>
                        </header>
                        <div class="about-container">
                            <div class="row">
                                <div class="col-md-6 wow fadeInLeft">
                                    <p>
                                        <span class="dropcap">Q</span>
                                        uisque volutpat pharetra felis, eu cursus lorem molestie vitae ulla vehicula, lacus ut suscipit fermentum, turpis felis ultricies dui ut libero augue at libero. Morbi ut arcu dolor. Maecenas id nulla nec nibh viverra vehicula. Cras feugiat, magna eu lacinia ullamcorper. lla vehicula, lacus ut suscipit fermentum, turpis felis ultricies dui, ut rhoncus libero augue at libero. Morbi ut arcu dolor. 
                                        Maecenas id nulla nec nibh viverra vehicula. Cras feugiat, magna eu lacinia ullamcorper, augue est sodales nibh, ut vulputate augue est sed nunc. Suspendisse sagittist.
                                    </p>
                                </div><!-- /col-md-6 -->
                                <div class="col-md-6 wow fadeInRight">
                                    <p>
                                        <span class="dropcap">W</span>
                                        uisque volutpat pharetra felis, eu cursus lorem molestie vitae ulla vehicula, lacus ut suscipit fermentum, turpis felis ultricies dui ut libero augue at libero. Morbi ut arcu dolor. Maecenas id nulla nec nibh viverra vehicula. Cras feugiat, magna eu lacinia ullamcorper. lla vehicula, lacus ut suscipit fermentum, turpis felis ultricies dui, ut rhoncus libero augue at libero. Morbi ut arcu dolor. 
                                        Maecenas id nulla nec nibh viverra vehicula. Cras feugiat, magna eu lacinia ullamcorper, augue est sodales nibh, ut vulputate augue est sed nunc. Suspendisse sagittist.
                                    </p>
                                </div><!-- /col-md-6 -->
                            </div><!-- /row -->
                        </div><!-- /about-container -->
                    </div><!-- /row -->
                </div><!-- /contianer -->                
            </section>
            
<?php
    include $_SERVER['DOCUMENT_ROOT']."/footer.php";
?>
