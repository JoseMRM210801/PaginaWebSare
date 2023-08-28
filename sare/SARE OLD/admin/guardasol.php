<?php
$conexion = mysqli_connect('localhost','root','r00t1nf','sare');

$destinos  = 'lidavidms@hotmail.com, lidavidms@gmail.com, ' . $_POST['email'];
$asunto  = 'Se ha realizado una Solicitud en la Plataforma SARE Moroleón.';
$cabeceras  = 'MIME-Version: 1.0' . "\r\n";
$cabeceras .= 'Content-type: text/html; charset=utf-8' . "\r\n";
$cabeceras .= 'De: SARE Moroleón<sare@moroleon.gob.mx>' . "\r\n";
$cabeceras .= 'Para: ' . $destinos . "\r\n";
$mensaje  = 'Se ha enviado una nueva solicitud de (el/la) C. ';
$mensaje .= $_POST['rsocial'] . ', el día ' . $_POST['fecha'] . "\r\n";
$mensaje .= '----------' . "\r\n" . 'Este correo es informativo únicamente.';

$query = "INSERT INTO solicitud(f_solicitud, est_gestor, rsocial, tel, dp_calle, dp_col, dp_mpio, email, im_calle, im_col, giro, establecimiento, caj_est, sup_predio, sup_ocupar, n_emp, s_inversion, antiguedad, edad_sol, servicios)
	VALUES ('$_POST[fecha]','$_POST[optempresa]','$_POST[rsocial]','$_POST[tel]','$_POST[calle]','$_POST[col]','$_POST[mpio]','$_POST[email]','$_POST[calleinmueble]','$_POST[colinmueble]','$_POST[giro]','$_POST[optest]',$_POST[cajones],$_POST[suppredio],$_POST[supocupar],$_POST[nemp],$_POST[inversion],$_POST[antiguedad],$_POST[edad],'$_POST[opservicios]')";

mysqli_query($conexion, $query);
$folio = mysqli_insert_id($conexion);
mysqli_close($conexion);
if($folio==0)
	echo "\r\n El Folio no se creó adecuadamente.";
else {
	mkdir("../archivos/{$folio}", 0777);
	chmod("../archivos/{$folio}", 0777);
	copy("../archivos/index.html", "../archivos/{$folio}/index.html");
	chmod("../archivos/{$folio}/index.html", 0777);
	mail($destinos, $asunto, $mensaje, $cabeceras);
	print('<META HTTP-EQUIV="Refresh" CONTENT=0;URL=documentos2.php?folio={$folio}>');
}
?>