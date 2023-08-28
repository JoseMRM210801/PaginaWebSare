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
	<title>Solicitud aceptada</title>
<?php include("../comun/-inkmet-.html"); ?>
</head>
<?php $foliou = $_GET['folio']; ?>
<body background="../images/fondomoroleon.png">
<!-- Start Navmenu -->
	
<!-- Finish Navmenu -->
	<div class="container">
		<div class="panel panel-default">
		<!-- Start Header -->
<?php include("../comun/-header-.html"); ?>
		<!-- Finish Header -->
		
		<!-- Start Body -->
			<!-- Start Form -->
				<div class="panel-body" id="conten" style="text-align:center; display:none">
					<div class="col-md-2"> </div>
					<div class="col-md-8">
						<h3>Tu solicitud ha sido completada.<br>Gracias por usar la plataforma SARE.</h3><hr><br>
						<h3>Tu número de folio asignado es: <a style="color:#FF8800"><u>&nbsp;<?php echo $foliou; ?>&nbsp;</u></a></h3><br>
						<h4>Recuerda guardar este número para poder consultar el Estatus de tu trámite, o para cualquier duda o aclaración al respecto.</h4>
						<br><hr><h4>Si deseas dejar un comentario...<br>...próximamente.</h4>
					</div>
					<div class="col-md-2"> </div>
				</div><!-- panel-body -->
			<!-- Finish Form -->
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