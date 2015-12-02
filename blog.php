<?php
    include $_SERVER['DOCUMENT_ROOT']."/header.php";
?>
            <header class="main-header" id="top">
                <div class="top-banner-container top-banner-container-style2" style="height:400px">
                    <div class="top-banner-bg custom-bg4 parallax" data-stellar-background-ratio="0.5"></div>
                    <div class="top-banner">
                        <div class="top-image">
                            <img src="/img/logo/logo_small.png" alt="Colaciones Andrea">
                        </div><!-- /top-image -->
                        <div class="bottom-image hidden">
                            <img src="img/slider-images/cooking-since2001.png" alt="Marine Food About">
                        </div><!-- /bottom-image -->
                    </div><!-- /top-banner -->
                    <div class="header-bottom-bar hidden">
                        <div class="container">
                            <div class="row">
                                <div class="col-md-9">
                                    <ul class="category-filter blog-category-filter">
                                        <li class="filter active" data-filter="all"><span>All</span></li>
                                        <li class="filter" data-filter=".news"><span>News</span></li>
                                        <li class="filter" data-filter=".recipes"><span>Recipes</span></li>
                                        <li class="filter" data-filter=".other"><span>Other</span></li>
                                    </ul>
                                </div><!-- col-md-9 -->
                                <div class="col-md-3">
                                    <form action="#" class="search-form">
                                        <input type="search" name="search" id="search" placeholder="Search Blog">
                                        <button type="submit"><i class="fa fa-search"></i></button>
                                    </form>
                                </div><!-- /col-md-3 -->
                            </div><!-- /row -->
                        </div><!-- /container -->
                    </div><!-- /header-bottom-bar -->
                </div><!-- /top-banner-container -->
            </header>

            <section class="latest-post blog-page">
                <div class="container">
                    <div class="row">
                        <div class="col-md-10 col-md-offset-1">
                            <div class="blog-post-container">
                                <div class="blog-post">
                                    <?php
                                        include $_SERVER['DOCUMENT_ROOT']."/admin/conexion.php";

                                        $sql="SELECT * FROM noticias ORDER BY fecha DESC";
                            
                                        $result = mysqli_query($con,$sql);
                                        
                                        for ($i = 0; $i <$result->num_rows; $i++) 
                                        {
                                            $result->data_seek($i);
                                            $fila = $result->fetch_assoc();
                                            $ID = $fila["ID"];

                                            echo '<article class="mix news other">
                                        <header>
                                            <ul class="category hidden">
                                                <li><a href="#">News</a></li>
                                                <li><a href="#">Other</a></li>
                                            </ul>
                                            <h1>'. $fila["titulo"] .'</h1>
                                            <div>'. $fila["bajadaTitulo"] .'</div>
                                            <br>
                                            <div class="post-meta">
                                                <span><time datetime='. $fila["fecha"] .'>'. $fila["fecha"] .'</time></span>
                                            </div><!-- /post-meta -->
                                            <div class="post-image">
                                                <a href="#">
                                                    <img src="/admin/noticias/'. $fila["imagen"] .'" alt="Sin Imagen..." width="50%" class="img-rounded">
                                                </a>
                                            </div>
                                        </header>
                                        <div class="post-contents">
                                            '. $fila["texto"] .'
                                        </div><!-- /post-contents -->
                                        <footer>
                                            <div class="socials-container hidden">
                                                <ul>
                                                    <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                                    <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                                    <li><a href="#"><i class="fa fa-pinterest-p"></i></a></li>
                                                    <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                                                    <li><a href="#"><i class="fa fa-comment-o"></i></a></li>
                                                </ul>
                                            </div><!-- /socials-container -->
                                        </footer>
                                    </article>';
                                        }
                                    ?>
                                </div><!-- /blog-post -->
                                <div class="load-more align-center hidden">
                                    <a href="#" class="custom-button button-style2 load-more-button"><i class="icon-eye"></i>Load More</a>
                                </div><!-- /load-more -->
                            </div><!-- /blog-post-container -->
                        </div><!-- /col-md-12 -->
                    </div><!-- /row -->
                </div><!-- /container -->
            </section>


<?php
    include $_SERVER['DOCUMENT_ROOT']."/footer.php";
?>