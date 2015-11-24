<?php
	session_start(); 
	require_once __DIR__ . '/facebook_sdk5/Facebook/autoload.php';
	$fb = new Facebook\Facebook([
  		'app_id' => '186972681645039',
  		'app_secret' => '36cc435d41a97961e0a163a181621258',
  		'default_graph_version' => 'v2.5',
  	]);	

	$helper = $fb->getRedirectLoginHelper();
	$accessToken = $helper->getAccessToken();
	$permissions = ['email', 'user_likes']; // optional

	$loginUrl = $helper->getLoginUrl('http://puntodesarrollo.com/login/indexFacebook.php', $permissions);

?>