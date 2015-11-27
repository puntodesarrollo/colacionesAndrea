<?php
	session_start();
	unset($_SESSION["ID"]);
	/*session deleted. if you try using this you've got an error*/
	
	header("location:/login.php");
	exit;
?>