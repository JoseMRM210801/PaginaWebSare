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
	<title>Inicio Admin.</title>
<?php include("../comun/-admins-.html"); ?>
</head>

<body background="../images/fondomoroleon.png">
		<!-- Start Body -->
			<!-- Start Form -->
				<div class="row" id="conten" style="text-align:center; display:none">
					<div class="col-md-2"> </div>
					<div class="col-md-8">
						<h1><b>BIENVENIDO ADMINISTRADOR</b></h1>
						<hr><br>
						<img src ="../images/sare_cafe.png" style="width:84%" alt=""><br>
						<a href="administrador.php"><img src="../images/mb_consulta.png" style="width:28%" alt=""></a><a href="formulario2.php"><img src="../images/mb_solicitud.png" style="width:28%" alt=""></a><a href="resumensol.php"><img src="../images/mb_reportes.png" style="width:28%" alt=""></a>
					</div>
					<div class="col-md-2"> </div>
				</div>
			<!-- Finish	Form -->
		<!-- Finish Body -->
</body>
</html>
<?php	} ?>