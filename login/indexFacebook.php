<?php
	include 'configFacebook.php';
  session_start();
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

    include 'registrarFacebook.php';    
  }
		
?>