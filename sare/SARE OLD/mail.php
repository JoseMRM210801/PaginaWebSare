<?php 
    ini_set( 'display_errors', 1 );
    error_reporting( E_ALL );
    $from = "sare@moroleon.gob.mx";
    $subject = "Prueba de envio de email con PHP";
    $message = "Esto es un email de prueba enviado con PHP";
    $headers = "From:" . $from;
	$to = "lidavidms@gmail.com";
    mail($to,$subject,$message,$headers);
	$to = "lidavidms@hotmail.com";
    mail($to,$subject,$message,$headers);
    echo "Email enviado!!<br>";
?>
<br>Listo!!!