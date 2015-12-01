<?php
// check if fields passed are empty

	
$name = $_GET['name'];
$email_address = $_GET['email'];
$message = $_GET['message'];
$tema = "desde la página colacionesandrea.cl";
	
// create email body and send it	
//$to = 'gpuellestorres@gmail.com';
$to = 'leohm63@gmail.com';
$email_subject = $tema;
$email_body = "Ha recibido un nuevo mensaje desde la página web colacionesandrea.cl\n\n".
				  " Detalles:\n \nNombre: ".$name ."\n ".
				  "Correo electrónico: ".$email_address."\n\n Mensaje: \n ".$message;
$headers = $email_address;
mail($to,$email_subject,$email_body,$headers);
return true;			
?>