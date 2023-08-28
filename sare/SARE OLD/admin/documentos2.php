<?php
	session_start();
	if($_SESSION["nivel"]!="1") {
		$mens = "Acceso denegado a este sitio."; 
		print "<script>alert('$mens')</script>";
		print('<meta http-equiv="refresh" content="0; url=../index.php">');
	} else {
?>
<!DOCTYPE html>
<html lang="es-MX">
<head>
	<title>Subir documentos</title>
<?php include("../comun/-admins-.html"); ?>
<?php $pagina = "home.php#"; ?>
<?php include ("../comun/-docphp-.php"); ?>
</head>
<body background="../images/fondomoroleon.png">
<!-- Start Navmenu -->
	
<!-- Finish Navmenu -->
	<div class="container">
		<div class="panel panel-default">
		<!-- Start Header -->
<?php include("../comun/-header-.html"); ?>
		<!-- Finish Header -->
		
		<!-- Start Body -->
<?php include("../comun/-docums-.php"); ?>
		<!-- Finish Body -->
		
		<!-- Start Stripper -->
<?php include("../comun/-stripp-.html"); ?>
		<!-- Finish Stripper -->
		</div><!-- panel-default -->
	<!-- Start Footer -->
		
	<!-- Finish Footer -->
	</div><!-- container -->
<!-- Start Submenu -->
	
<!-- Finish Submenu -->
</body>
</html>
<?php	} ?>