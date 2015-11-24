<?php
  include 'configFacebook.php'; 
  
?>
<html lang="en">
  <head>
    <meta name="google-signin-scope" content="profile email">
    <meta name="google-signin-client_id" content="1014154852560-1m65dufsnfoahaagpb9keavo8bufjlco.apps.googleusercontent.com">
    <script src="https://apis.google.com/js/platform.js" async defer></script>
    <!-- Bootstrap core CSS -->
    <link href="/bootstrap/css/bootstrap.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
  </head>
  <body>

    <div class="col-sm-6 col-sm-offset-3 hidden text-center" id="info">
      <br>
      <img src="" id="imagen" class="img-rounded">
      <br>
      <label id="nombre"></label>
      <br>
      <label id="correo"></label>
      <br>
      <label id="telefono"></label>
      <br>
      <label id="direccion"></label>
      <br>
      <div class="modal-footer">
      <a href="modificarDatos.php" class="btn btn-lg btn-primary">Modificar mis Datos</a>
      <a href="#" id="signout" class="hidden btn btn-lg btn-danger" onclick="signOut();">Cerrar Sesi&oacute;n</a>
      </div>
    </div>

    <div class="clearfix"></div>
<br>
    <div id="registrar" class="col-sm-4 col-sm-offset-4 text-center">
      <a href="<?php echo $loginUrl; ?>">Log in with Facebook!</a>
      <div class="g-signin2" id="signin" data-onsuccess="onSignIn" data-theme="dark"></div>
    </div>

    <script>
      function signOut() {
        var auth2 = gapi.auth2.getAuthInstance();
        auth2.signOut().then(function () {
          console.log('User signed out.');
        });

        $("#info").addClass("hidden");
        $("#signout").addClass("hidden");
        $("#registrar").removeClass("hidden");
      }
    </script>
    <script>

      $( document ).ready(function() {
          console.log( "ready!" );
          $.get( "obtenerUsuario.php")
            .done(function( data ) {
              console.log(data);
              datos = JSON.parse(data);
              console.log("Nombre:" + datos.nombre);
              $("#info").removeClass("hidden");
              $("#signout").removeClass("hidden");
              $("#registrar").addClass("hidden");

              $("#nombre").html(datos.nombre);
              $("#correo").html(datos.correo);
              $("#direccion").html(datos.direccion);
              $("#telefono").html(datos.telefono);
              $("#imagen").attr("src","");
              $("#imagen").attr("src",profile.getImageUrl());
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

        $.get( "registrarGoogle.php", { idGoogle: profile.getId(), nombre: profile.getName(), correo: profile.getEmail()} )
          .done(function( data ) {
            console.log(data);

            if(data=="true")
            {
              location.reload();
            }
          });
      }
    </script>
  </body>
</html>