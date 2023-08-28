<!DOCTYPE html>
<html lang="es-MX">
<head>
	<title>Solicitud aceptada</title>
<?php include("../comun/-inkmet-.html"); ?>
</head>
<?php $foliou = $_GET['folio']; ?>
<body background="../images/fondomoroleon.png">
<!-- Start Navmenu -->
<?php include("../comun/-navmen-.html"); ?>
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
						<h3><b>Tu solicitud ha sido completada.</b></h3><hr>
						<h3>Gracias por utilizar la plataforma SARE.</h3><br>						
						<h3>Tu número de folio asignado es: <a style="color:#FF8800"><u>&nbsp;<?php echo $foliou; ?>&nbsp;</u></a></h3><br>
						<h4>Recuerda guardar este número para poder consultar el Estatus de tu trámite,<br>o para cualquier duda o aclaración al respecto.</h4>
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
<?php include("../comun/-footer-.html"); ?>
	<!-- Finish Footer -->
	</div><!-- container -->
<!-- Start Submenu -->
<?php include("../comun/-submen-.html"); ?>
<!-- Finish Submenu -->
</body>
</html>