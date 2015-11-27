<?php
	//include 'configFacebook.php';
  ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);
  require_once __DIR__ . '/facebook_sdk5/Facebook/autoload.php';
  session_start();
  $fb = new Facebook\Facebook([
      'app_id' => '985781244798546',
      'app_secret' => '7da10da9bbbb64368751fe398080e42d',
      'default_graph_version' => 'v2.5',      
    ]); 
  
  $helper = $fb->getRedirectLoginHelper();   
  $accessToken = $helper->getAccessToken();
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