            <section class="map <?php  if(isset($mostrarMapa) && !$mostrarMapa) echo "hidden"; ?>" id="map">
                
                <iframe src="https://mapsengine.google.com/map/u/0/embed?mid=ziDg0mefAhTM.kNDHElct8Kcc" width="100%" height="480" style="pointer-events: none;"></iframe>
                
                <div class="map-container wow fadeInDown hidden">
                    <div id="google-map"></div>
                    <div id="cd-zoom-in"></div>
                    <div id="cd-zoom-out"></div>
                </div><!-- /map-container -->
            </section>

            <footer class="main-footer dark-bg <?php  if(isset($mostrarMapa) && !$mostrarMapa) echo "hidden"; ?>">
                <div class="container">
                    <div class="row">
                        <!--<div class="col-md-3 align-center">

                        </div><!-- /col-md-3 -->
                        <div class="col-md-6 col-md-offset-1 wow fadeInDown">
                            <div class="contact-form-contaienr" style="margin-top: 0px !important;">
                                <div class="section-title">
                                    <h1><span>Contacto</span> </h1>
                                </div>
                                <form id="contact-form" method="post" action="">
                                    <input type="text" id="name" name="name" placeholder="Nombre" required>                                    
                                    <input type="email" id="email" name="email" placeholder="Correo electrónico" required>                                    
                                    <textarea id="message" name="message" rows="6" placeholder="Mensaje" required></textarea>
                                    <button type="submit" onclick="return enviarCorreo();">Enviar Mensaje</button>
                                    
                                </form>
                                <br>                                
                                <div id="form-message"></div>
                            </div><!-- /contact-form-container -->
                        </div><!-- /col-md-6 -->
                        <div class="col-md-4 col-md-offset-1 wow fadeInRight">
                             <div class="address-container">
                                <address>
                                    <img src="/img/template-assets/map-pin.png" alt="Marine Food Address">
                                    <p>
                                        <span>Colaciones Andrea</span>
                                        <span>La Serena</span>                                        
                                        <span>Coquimbo</span>
                                    </p>
                                    <img src="/img/template-assets/phone-icon.png" alt="Marine Food Address">
                                    <p>
                                        <span>Telefonos</span>
                                        <span>+56 9 8439 4023</span>
                                        <span>+56 9 4230 0407</span>                                        
                                    </p>
                                    <img src="/img/template-assets/mail-icon2.png" alt="Marine Food Address">
                                    <p>
                                        <span>contacto@colacionesandrea.cl</span>
                                    </p>
                                </address>
                            </div><!-- /address-container -->
                            <!--<div class="socials-container text-center">
                                <ul>
                                    <li class="wow fadeInLeft"><a href="https://www.facebook.com/COLACIONESADOMICILIOANDREA"><i class="fa fa-facebook"></i></a></li>
                                    <!--
                                    <li class="wow fadeInLeft" data-wow-delay="0.1s"><a href="#"><i class="fa fa-twitter"></i></a></li>
                                    <li class="wow fadeInLeft" data-wow-delay="0.2s"><a href="#"><i class="fa fa-skype"></i></a></li>
                                    <li class="wow fadeInLeft" data-wow-delay="0.3s"><a href="#"><i class="fa fa-google-plus"></i></a></li>
                                    <li class="wow fadeInLeft" data-wow-delay="0.4s"><a href="#"><i class="fa fa-linkedin"></i></a></li>
                                    <li class="wow fadeInLeft" data-wow-delay="0.5s"><a href="#"><i class="fa fa-instagram"></i></a></li>-->
                                <!--</ul>
                            </div><!-- /socials-container -->
                            <br class="hidden-xs">
                            <br class="hidden-xs">
                            <div class="logo-container wow fadeInLeft">
                                <a href="#">
                                    <img src="/img/logo/logo.png" alt="Marine Food Logo" class="img-rounded hidden-xs" width="60%" style="display: block; margin-left: auto; margin-right: auto;">
                                    <img src="/img/logo/logo.png" alt="Marine Food Logo" class="img-rounded visible-xs" width="139px" style="display: block; margin-left: auto; margin-right: auto;">
                                </a>
                            </div><!-- /logo-container -->
                        </div><!-- /col-md-3 -->
                        <div class="copyright col-md-12 wow fadeInUp" data-wow-delay="0.7s">
                            <p>&copy; 2015 <a target="_blank" href="http://puntodesarrollo.com" style="color:white !important">Punto Desarrollo</a></p>
                            <!--<p> 2015 The Gourmet. All Rights Reserved</p>-->
                        </div><!-- /copyright -->
                    </div><!-- /row -->
                </div><!-- /container -->
            </footer>


</div><!-- /wrapper -->
        <!-- End wrapper -->
        <script src="/js/imagesloaded.pkgd.min.js"></script>
        <script src="/js/jquery.themepunch.tools.min.js"></script>
        <script src="/js/jquery.themepunch.revolution.min.js"></script>
        <script src="/js/retina.min.js"></script>
        <script src="/js/SmoothScroll.js"></script>
        <script src="/js/owl.carousel.min.js"></script>
        <script src="/js/jquery.mixitup.min.js"></script>
        <script src="/js/jquery.magnific-popup.min.js"></script>
        <script src="/js/jquery.stellar.min.js"></script>
        <script src="/js/jquery.nicescroll.min.js"></script>
        <script src="/js/jquery.nav.js"></script>
        <script src="/js/cd-google-map.js"></script>
        <script src="/js/wow.min.js"></script>
        <script src="/js/tweetie.min.js"></script>
        <script src="/js/jquery.scrollme.min.js"></script>
        <script src="/js/plugins.js"></script>
        <script src="/js/main.js"></script>       
        <script type="text/javascript">
            jQuery(document).ready(function() {
               jQuery('.main-slider').revolution(
                {
                    delay:9000,
                    startwidth:1170,
                    startheight: 960,
                    hideThumbs:10,
                    fullScreen: 'on',
                    navigationStyle: 'preview4',
                    parallax: 'scroll',
                    parallaxLevels:[100,-80]
                });                
               
               actualizarCarroInicio();              


            });

            function enviarCorreo(){

                var name = $("#name").val();
                var email =$("#email").val();
                var message = $("#message").val();  
                $("#form-message").attr("style","display: block !important; margin-top: 1em; text-align: center;");
                $("#form-message").empty();    
                if(name==""){

                    $("#form-message").append("Debe ingresar su nombre");
                    $("#name").focus();
                   

                }else if(email==""){

                    $("#form-message").append("Debe ingresar su email");
                    $("#email").focus();
                }
                else if (verificarEmail()==false){
                    $("#form-message").append("Debe ingresar un mail con formato correcto");
                    $("#email").focus();   
                }
                else if(message==""){
                    $("#form-message").append("Debe ingresar un mensaje");
                    $("#message").focus();    
                }else{

                    $.ajax({
                        url: "contact_me.php", data: { "name": name, "email": email, "message":message },
                        success: function (retorno) {  

                             $("#form-message").append("Mensaje Enviado correctamente. Gracias por contactarnos!");
                                $("#name").val('');
                                $("#email").val('');
                                $("#message").val(''); 
                                $("#form-message").delay(5000).fadeOut('slow');

                    
                        }
                    });
                            
                }    

                
               
                return false;

            }

            function verificarEmail(){

                if($("#email").val().indexOf('@', 0) == -1 || $("#email").val().indexOf('.', 0) == -1) {
                    //alert('El correo electrónico introducido no es correcto.');
                    return false;
                }
                return true;
            }

            function actualizarCarroInicio()
            {
                    $.get( "/login/obtenerCarro.php" )
                    .done(function(data) {

                        console.log(data);

                        var obj = jQuery.parseJSON(data);

                        console.log("aqui");

                        cantidad = 0;

                        $("#detalleCarro").html("");
                        for(i=0;i<obj.length;i++)
                        {
                            var total=parseInt(obj[i].cantidadComprar)*parseInt(obj[i].precioProducto);

                            if(obj[i].imagen!="")
                            {
                                $("#detalleCarro").append('<li><div class="item-container clearfix"><figure><img src="' + obj[i].imagen + '" alt="'+ obj[i].nombreProducto +'"></figure><p class="food-name"><a href="#">'+ obj[i].cantidadComprar + ' x ' + obj[i].nombreProducto +'</a></p><p class="food-price">$'+ total +'</p></div></li>');
                            }
                            else
                            {
                                $("#detalleCarro").append('<li><div class="item-container clearfix"><figure><img src="/img/gallery/gallery20.jpg" alt="'+ obj[i].nombreProducto +'"></figure><p class="food-name"><a href="#">'+ obj[i].cantidadComprar + ' x ' + obj[i].nombreProducto +'</a></p><p class="food-price">$'+ total +'</p></div></li>');
                            }
                            

                            cantidad += parseInt(obj[i].cantidadComprar);
                        }


                        $("#totalCarro").html(cantidad);
                        $("#totalCarroIcono").html(cantidad);
                    });
            }

            function actualizarCarro()
               {
                    $.get( "/login/obtenerCarro.php" )
                    .done(function(data) {

                        console.log(data);

                        var obj = jQuery.parseJSON(data);

                        console.log("aqui");

                        cantidad = 0;

                        $("#detalleCarro").html("");
                        for(i=0;i<obj.length;i++)
                        {
                            var total=parseInt(obj[i].cantidadComprar)*parseInt(obj[i].precioProducto);

                            if(obj[i].imagen!="")
                            {
                                $("#detalleCarro").append('<li><div class="item-container clearfix"><figure><img src="' + obj[i].imagen + '" alt="'+ obj[i].nombreProducto +'"></figure><p class="food-name"><a href="#">'+ obj[i].cantidadComprar + ' x ' + obj[i].nombreProducto +'</a></p><p class="food-price">$'+ total +'</p></div></li>');
                            }
                            else
                            {
                                $("#detalleCarro").append('<li><div class="item-container clearfix"><figure><img src="/img/gallery/gallery20.jpg" alt="'+ obj[i].nombreProducto +'"></figure><p class="food-name"><a href="#">'+ obj[i].cantidadComprar + ' x ' + obj[i].nombreProducto +'</a></p><p class="food-price">$'+ total +'</p></div></li>');
                            }
                            

                            cantidad += parseInt(obj[i].cantidadComprar);
                        }


                        $("#totalCarro").html(cantidad);
                        $("#totalCarroIcono").html(cantidad);

                        $('html, body').animate({
                            scrollTop: $("body").offset().top
                        }, 1000);
                    });
               }
        </script>

    </body>
</html>