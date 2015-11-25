<?php
	session_start(); 
	require_once __DIR__ . '/facebook_sdk5/Facebook/autoload.php';
	$fb = new Facebook\Facebook([
  		'app_id' => '985781244798546',
  		'app_secret' => '7da10da9bbbb64368751fe398080e42d',
  		'default_graph_version' => 'v2.5',
  	]);	

	$helper = $fb->getRedirectLoginHelper();
	$accessToken = $helper->getAccessToken();
	$permissions = ['email', 'user_likes']; // optional

	$loginUrl = $helper->getLoginUrl('http://colacionesandrea.cl/login/indexFacebook.php', $permissions);

?>