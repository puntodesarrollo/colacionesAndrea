<?php
  include $_SERVER['DOCUMENT_ROOT'].'/login/configFacebook.php'; 
  include $_SERVER['DOCUMENT_ROOT']."/header.php";
?>

<section class="gallery dark-bg" id="gallery" style="height:100% !important">
    <div class="container">

    <div class="row">
        <div class="col-md-12 wow fadeInDown animated hidden" style="visibility: visible; animation-name: fadeInDown;" id="info">
          <div class="gallery-filter-container">
              <ul class="gallery-filter">
                  <li class="filter active" data-filter="all">
                    <a href="modificarDatos.php" style="color:white !important">Datos Personales</a>
                  </li>
                  <li class="filter active" data-filter="all" >
                    <a href="datosFacturacion.php" style="color:white !important">Datos de Facturación</a>
                  </li>
                  <li class="filter active" data-filter="all" >
                    <a href="/store-cart.php" style="color:white !important">Carro de Compras</a>
                  </li>
                  <li class="filter active" data-filter="all" >
                    <a href="misCompras.php" style="color:white !important">Compras Realizadas</a>
                  </li>
                  <li class="filter active" data-filter="all" >
                    <a href="/login/cerrarSesion.php" onclick="signOut();" id="signout" style="color:white !important">Cerrar Sesión</a>
                  </li>
              </ul>
          </div>
          <div class="service">
            <h3>Mis Datos: </h3>
            <hr>
            <strong>Nombre: </strong><label style="text-height:1px !important" id="nombre"></label>
            <br>
            <br class="hidden-xs">
            <strong>Correo Electrónico: </strong><label id="correo"></label>
            <br>
            <br class="hidden-xs">
            <strong>Teléfono: </strong><label id="telefono"></label>
            <br>
            <br class="hidden-xs">
            <strong>Dirección: </strong><label id="direccion"></label>
          </div>          
        </div>
        <div class="clearfix"></div>
        <br>
        <div id="registrar" class="col-md-8 col-md-offset-2 wow fadeInDown animated" style="visibility: visible; animation-name: fadeInDown;">
          <a href="#" class="g-signin2 btn btn-social btn-google btn-block btn-lg hidden" id="signin" style="width:100%; height:44px;" data-onsuccess="onSignIn" data-text="hola" data-theme="dark"></a>
          <a href="#" class="btn btn-social btn-social-lg btn-google btn-block btn-lg" id="google"> <span class="fa fa-google"></span> Ingresar con Google</a>
          <br>
          <br>
          <a href="<?php echo $loginUrl; ?>" class="btn btn-social btn-social-lg btn-facebook btn-block btn-lg"> <span class="fa fa-facebook"></span> Ingresar con Facebook</a>
        </div>
      </div>


      
  </div>
  <br>
  <br>
</section>

    <script>
      function signOut() {
        var auth2 = gapi.auth2.getAuthInstance();
        auth2.signOut().then(function () {
          console.log('User signed out.');
        });

        $("#info").addClass("hidden");
        $("#signout").addClass("hidden");
        $("#registrar").removeClass("hidden");

        console.log("cerrar sesión");

        window.location.href = "/login/cerrarSesion.php";
          
      }
    </script>
    <script>

      $( document ).ready(function() {
          console.log( "ready!" );

          setTimeout(function(){
            //$("#signin").find("div").first().attr("style", "height:44px;width:100%;opacity: 0; !important");
            //$("#signin").html($("#signin").html() + '<span class="fa fa-google"></span> Ingresar con Google');
          }, 1000);

          $("#google").click(function(){
            console.log($("#signin").find("div").first().find("div").first().find("span").first().find("span").first().html());
            $("#signin").trigger("click");
            $("#signin").find("div").first().find("div").first().find("span").first().find("span").first().trigger("click");
          });

          $.get( "/login/obtenerUsuario.php")
            .done(function( data ) {
              console.log(data);

              if (data=="") return;

              datos = JSON.parse(data);
              console.log("Nombre:" + datos.nombre);
              $("#info").removeClass("hidden");
              $("#signout").removeClass("hidden");
              $("#registrar").addClass("hidden");

              $("#nombre").html(datos.nombre);
              $("#correo").html(datos.correo);
              $("#direccion").html(datos.direccion);
              $("#telefono").html(datos.telefono);
              
          });
      });

      function onSignIn(googleUser) {
        // Useful data for your client-side scripts:
        var profile = googleUser.getBasicProfile();
        console.log("ID: " + profile.getId()); // Don't send this directly to your server!
        console.log("Name: " + profile.getName());
        console.log("Image URL: " + profile.getImageUrl());
        console.log("Email: " + profile.getEmail());

        // The ID token you need to pass to your backend:
        var id_token = googleUser.getAuthResponse().id_token;
        console.log("ID Token: " + id_token);

        $.get( "/login/registrarGoogle.php", { idGoogle: profile.getId(), nombre: profile.getName(), correo: profile.getEmail()} )
          .done(function( data ) {
            console.log(data);

            if(data==="true")
            {
              console.log("reload");
              location.reload();
            }
          });
      }
    </script>
<?php
    $mostrarMapa = false;
    include $_SERVER['DOCUMENT_ROOT']."/footer.php";
?>