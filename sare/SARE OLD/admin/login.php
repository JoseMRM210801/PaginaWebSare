<?php session_start();?>
<!DOCTYPE html>
<html lang="es-MX">
<head>
	<title>Acceso Admin.</title>
<?php include("../comun/-admins-.html"); ?>
	<style>
		@import url('https://fonts.googleapis.com/css?family=Raleway:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i&subset=latin-ext');

		#playground-container {
			overflow:hidden !important;
		}

		.main {
			margin-top:15px;
			-webkit-box-shadow:0px 0px 14px 0px rgba(0,0,0,0.24);
			-moz-box-shadow:0px 0px 14px 0px rgba(0,0,0,0.24);
			box-shadow:0px 0px 14px 0px rgba(0,0,0,0.24);
			padding:0px;
			background:#e7e8ea;
		}

		.fb:focus, .fb:hover {
			color:#FFF !important;
		}

		body {
			font-family:'Raleway', sans-serif;
		}

		.left-side {
			padding:0px 0px 0px;
			color:#FFF;
			background-size:cover;
		}

		.left-side h3 {
			font-size:30px;
			font-weight:900;
			color:#FFF;
			padding:30px 10px 00px 26px;
		}
			
		.left-side p {
			font-weight:600;
			color:#FFF;
			padding:10px 10px 10px 26px;
		}

			
		.fb {
			background:#fff;
			color:#FFF;
			padding:10px 15px;
			border-radius:18px;
			font-size:12px;
			font-weight:600;
			margin-right:15px;
			margin-left:26px;-webkit-box-shadow:0px 0px 14px 0px rgba(0,0,0,0.24);
			-moz-box-shadow:0px 0px 14px 0px rgba(0,0,0,0.24);
			box-shadow:0px 0px 14px 0px rgba(0,0,0,0.24);
		}

		.tw {
			background:#20c1ed;
			color:#FFF;
			padding:10px 15px;
			border-radius:18px;
			font-size:12px;
			font-weight:600;
			margin-right:15px;-webkit-box-shadow:0px 0px 14px 0px rgba(0,0,0,0.24);
			-moz-box-shadow:0px 0px 14px 0px rgba(0,0,0,0.24);
			box-shadow:0px 0px 14px 0px rgba(0,0,0,0.24);
		}
			
		.right-side {
			padding:0px 0px 0px;
			background:#FFF;
			background-size:cover;
		}

		.right-side h3 {
			font-size:30px;
			font-weight:700;
			color:#000;
			padding:30px 10px 00px 50px;
		}

		.right-side p {
			font-weight:600;
			color:#000;
			padding:10px 50px 10px 50px;
		}

		.form {
			padding:10px 50px 10px 50px;
		}

		.form-control {
			box-shadow:none !important;
			border-radius:0px !important;
			border-bottom:1px solid #2196f3 !important;
			border-top:1px !important;
			border-left:none !important;
			border-right:none !important;
		}
		
		.btn-deep-purple {
			background:#fcca21;
			border-radius:18px;
			padding:5px 19px;
			color:#000;
			font-weight:600;
			float:right;
			-webkit-box-shadow:0px 0px 14px 0px rgba(0,0,0,0.24);
			-moz-box-shadow:0px 0px 14px 0px rgba(0,0,0,0.24);
			box-shadow:0px 0px 14px 0px rgba(0,0,0,0.24);
		}
	</style>
</head>

<body background="../images/fondomoroleon.png">
	<div style="text-align:center; background-color:#000; color:#fff"><br><b>..:: SARE MOROLEÓN ::..</b><br></div>
	<!-- Start Body -->
		<form action="" method="post">
			<div class="container" id="conten" style="display:none">
				<div class="col-md-10 col-md-offset-1 main">
					<div class="col-md-6 left-side">
						<img src="../images/bienvenida.png" class="img-responsive" style="padding:10px 20px" alt="">
					</div>
					<div class="col-md-6 right-side">
						<h3 style="color:#8c8f91; margin-top:0px">Iniciar Sesión</h3>
						<div class="form">
							<div class="form-group">
								<i class="glyphicon glyphicon-user"></i>
								<label for="form2" style="margin:0 0 0 0">Usuario:</label>
								<input type="text" id="form2" name="usuario" class="form-control input-lg" autofocus required>
							</div>
							<div class="form-group">
								<i class="glyphicon glyphicon-lock"></i>
								<label for="form4" style="margin:0 0 0 0">Contraseña:</label>
								<input type="password" id="form4" name="contrasena" class="form-control input-lg" required>
							</div>
							<div class="form-group">
								<button class="btn btn-deep-purple" type="submit" name="entrar" value="Iniciar Sesión"> Accesar </button><br><br>
							</div>
						</div>
					</div>
				</div>
			</div>
		</form>
	<!-- Finish Body -->
</body>
</html>
<?php
	if($_POST['entrar']=='Iniciar Sesión') {
		include("../conexion.php");

		$user=$_POST['usuario'];
		$pass=md5($_POST['contrasena']);

		$consulta="SELECT * FROM tblusuarios WHERE usuario='".$user."' AND contrasena='".$pass."'"; 
		$consultar=mysqli_query($conexion, $consulta) or die(mysql_error()); 
		$row = mysqli_fetch_array($consultar);
		 
		if(mysqli_num_rows($consultar)==1) { 
			//$_SESSION['usuario']=$user;
			$_SESSION['nivel']=$row['nivel'];
			$_SESSION['usuario']=$row['usuario'];
			 
			if($_SESSION['nivel'] == '1') {

				echo "<script language=\"javascript\">
				window.location.href=\"menu.php\";
				</script>";

			} elseif($_SESSION['nivel'] == '2') {
		 
				echo "<script language=\"javascript\">
				window.location.href=\"fdreportes.php\";
				</script>";

			}
		} else { // Si no devolvió 1 resultado
			$mens = "USUARIO Y/O CONTRASEÑA INCORRECTA"; 
			print "<script>alert('$mens')</script>";
		}
	}
?>