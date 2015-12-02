<?php

  header("location:/login.php");
    exit;

  include 'configFacebook.php'; 
  
?>
<html lang="en">
  <head>
    <meta name="google-signin-scope" content="profile email">
    <meta name="google-signin-client_id" content="1014154852560-1m65dufsnfoahaagpb9keavo8bufjlco.apps.googleusercontent.com">
    <script src="https://apis.google.com/js/platform.js" async defer></script>
    <!-- Bootstrap core CSS -->
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <link rel="stylesheet" href="/font-awesome-4.5.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="/css/bootstrap-social.css">

    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
  </head>
  <body>

    <div class="col-sm-6 col-sm-offset-3 hidden text-center" id="info">
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
        <a href="modificarDatos.php" class="btn btn btn-primary">Modificar mis Datos Personales</a>
        <a href="datosFacturacion.php" class="btn btn btn-primary">Agregar/Modificar mis Datos de Facturación</a>
      </div>
      <div class="modal-footer">
        <a href="carro.php" class="btn btn btn-primary">Mi Carro de Compras</a>
        <a href="misCompras.php" class="btn btn btn-primary">Ver Compras Realizadas</a>
        </div>
        <div class="modal-footer">
        <a href="#" id="signout" class="hidden btn btn btn-danger" onclick="signOut();">Cerrar Sesi&oacute;n</a>
      </div>
    </div>

    <div class="clearfix"></div>
<br>
    <div id="registrar" class="col-sm-4 col-sm-offset-4">
      <a href="#" class="g-signin2 btn btn-social btn-google" id="signin" style="width:200px; height:34px;" data-onsuccess="onSignIn" data-theme="dark"></a>
      <br>
      <br>
      <a href="<?php echo $loginUrl; ?>" class="btn btn-social btn-facebook"> <span class="fa fa-facebook"></span> Ingresar con Facebook</a>      
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

        console.log("cerrar sesión");

        window.location.href = "cerrarSesion.php";
          
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

            if(data==="true")
            {
              console.log("reload");
              location.reload();
            }
          });
      }
    </script>
  </body>
</html>