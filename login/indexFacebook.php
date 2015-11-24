<?php
	include 'configFacebook.php';
  $con = new mysqli("localhost", "cpu16669", "HIW7crQ5", "cpu16669_colaciones");
  if ($con->connect_errno) {
    echo "Falló la conexión con MySQL: (" . $con->connect_errno . ") " . $con->connect_error;
  }
  
  if (!$con->set_charset("utf8")) {
    printf("Error cargando el conjunto de caracteres utf8: %s\n", $con->error);
  } 

  if(isset($accessToken)){
    $_SESSION['facebook_access_token'] = (string) $accessToken;
    try {     
      $response = $fb->get('/me?fields=id,name,email,picture', $_SESSION['facebook_access_token']);
    } catch(Facebook\Exceptions\FacebookResponseException $e) {
      echo 'Graph returned an error: ' . $e->getMessage();
      exit;
    } catch(Facebook\Exceptions\FacebookSDKException $e) {
      echo 'Facebook SDK returned an error: ' . $e->getMessage();
      exit;
    }

    $user = $response->getGraphUser();
   // var_dump($user);
    //echo 'Name: ' . $user['name'];
    //echo 'Name: ' . $user['picture'];
    var_dump($user);    
    //$decoded = json_decode($user,true);
    //$url = $decoded['picture']['url'];
    //echo $url;
  }
		
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
   
  </body>
</html>