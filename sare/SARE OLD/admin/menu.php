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
	<title>Menú Admin.</title>
<?php include("../comun/-admins-.html"); ?>
	<style>
		.navbar-login {
			width: 305px;
			padding: 10px;
			padding-bottom: 0px;
		}

		.navbar-login-session {
			padding: 10px;
			padding-bottom: 0px;
			padding-top: 0px;
		}

		.icon-size {
			font-size: 87px;
		}
	</style>
</head>

<body background="../images/fondomoroleon.png">
<!-- Start Navmenu -->
	<div class="navbar navbar-inverse bg-primary navbar-fixed-top" role="navigation">
		<div class="container"> 
			<div class="navbar-header">
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span> 
				</button>
			</div>
			<div class="collapse navbar-collapse">
				<ul class="nav navbar-nav">
					<li><a href="administrador.php" target="menu">Consultar Solicitud(es)</a></li>
					<li><a href="formulario2.php" target="menu">Realizar Solicitud</a></li>
					<li><a href="resumensol.php" target="menu">Resumen Solicitudes</a></li>
				</ul>
				<ul class="nav navbar-nav navbar-right">
					<li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown">
							<span class="glyphicon glyphicon-user"></span>
							<strong>Salir</strong>
							<span class="glyphicon glyphicon-chevron-down"></span>
						</a>
						<ul class="dropdown-menu">
							<li><div class="navbar-login">
								<div class="row"><div class="col-lg-12">
									<p style="font-size:18px; color:#888">Usuario: <?php echo $_SESSION['usuario']; ?></p>
								</div></div>
							</div></li>
							<li class="divider"></li>
							<li><div class="navbar-login">
								<div class="row"><div class="col-lg-12">
									<p><a href="logout.php" class="btn btn-danger btn-block">Cerrar Sesion</a></p>
								</div></div>
							</div></li>
						</ul>
					</li>
				</ul>
			</div>
		</div>
	</div>
<!-- Finish Navmenu -->
	<br><br><br><br>
	<div class="embed-responsive embed-responsive-4by3">
		<iframe src="home.php" id="menu" name="menu" width="100%" height="100%" frameborder="0" style="border:0" allowfullscreen></iframe>				
	</div>
</body>
</html>
<?php	} ?>