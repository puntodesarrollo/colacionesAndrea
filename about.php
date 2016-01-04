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
                                        <span class="dropcap">C</span>
                                        olaciones a Domicilio Andrea”  es una empresa familiar que empezó por la falta de trabajo de la  dueña de la empresa. Su experiencia como manipuladora de alimentos y sus ganas de salir adelante hicieron que comenzara a vender comida a domicilio.
                                        Gracias a los proyectos de Sercotec Capital Abeja empezó a surgir como micro empresaria teniendo asíl la opción de comprar diversos materiales y ampliar su cocina.
                                    </p>
                                </div><!-- /col-md-6 -->
                                <div class="col-md-6 wow fadeInRight">
                                    <p>
                                        <span class="dropcap">D</span>
                                        esde el comienzo ofreciendo productos de alta calidad y con un toque casero, sus colaciones buscar llegar a ser las primeras de la región, y otorgar ese gustito de comer como en casa, brindando a los usuarios un entorno amable y de confianza para que su alimentación sea grata y acogedora.
                                        Atendido por su propia dueña, asegura que todo llegue bien y a tiempo para que sus clientes degusten la cocina chilena y casera.
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
