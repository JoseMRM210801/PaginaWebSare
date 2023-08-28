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
	<title>Resumen Solicitudes</title>
<?php include("../comun/-admins-.html"); ?>
	<style>
		p { font-size:20px; margin:5px;	}
		#bg0 { background:#C0C0C0; /*gris*/	}
		#bg1 { background:#FFC0C0; /*rojo*/	}
		#bg2 { background:#FFFFC0; /*amar*/	}
		#bg3 { background:#C0FFC0; /*verd*/	}
		#inf1 { background:#404040; /*gris-o*/ } 
		#inf2 { background:#D0D0D0; /*gris-c*/ }
		#bg0, #bg1, #bg2, #bg3, #inf1, #inf2 {
			border-color:#EEEEEE;
			border-style:solid;
			border-width:3px;
			max-width:100%;
		}
	</style>
</head>
<body background="../images/fondomoroleon.png">
	<div class="container">
		<div class="panel panel-default">
		<!-- Start Header -->
<?php include("../comun/-header-.html"); ?>
		<!-- Finish Header -->
		
		<!-- Start Body -->
			<!-- Start Form -->
				<div class="panel-body" id="conten" style="display:none">
					<div class="col-md-2"> </div>
					<div class="col-md-8">
						<h3 style="text-align:center"><b>RESUMEN DE SOLICITUDES</b></h3><hr>
					</div>
					<div class="col-md-2"> </div>
					
				<div class="col-md-12" id="estado"><br></div>
					
					<!-- Solicitudes por Estado -->
					<div class="col-md-2"> </div>
					<div class="col-md-8"><h4>- <b>Solicitudes por Estado</b> (Todas Recibidas) -</h4></div>
					<div class="col-md-2"> </div>
					<div class="col-md-12"><br></div>
					
					<?php
						include "../conexion.php";
						$query = "SELECT * FROM solicitud";
						$resultado = mysqli_query($conexion, $query);
						$total = mysqli_num_rows($resultado);
					?>
					<div class="col-md-2"> </div>
					<div class="col-md-4" id="inf1"><p style="color:#F7F3F3">Solicitudes Finalizadas:</p></div>
					<div class="col-md-4" id="bg3">
						<?php
							$resultado = mysqli_query($conexion, $query . " WHERE estatus='Finalizado'");
							$result = mysqli_num_rows($resultado);
							$porcent = round($result * 100 / $total, 1);
						?>
						<p style="color:#000000; text-align:center"><?php echo $result." &nbsp;-&nbsp; ".$porcent."%"; ?></p>
					</div>
					<div class="col-md-2"> </div>
				<div class="col-md-12"> </div>
					<div class="col-md-2"> </div>
					<div class="col-md-4" id="inf1"><p style="color:#F7F3F3">Solicitudes Pendientes:</p></div>
					<div class="col-md-4" id="bg2">
						<?php
							$resultado = mysqli_query($conexion, $query . " WHERE estatus='Pendiente'");
							$result = mysqli_num_rows($resultado);
							$porcent = round($result * 100 / $total, 1);
						?>
						<p style="color:#000000; text-align:center"><?php echo $result." &nbsp;-&nbsp; ".$porcent."%"; ?></p>
					</div>
					<div class="col-md-2"> </div>
				<div class="col-md-12"> </div>
					<div class="col-md-2"> </div>
					<div class="col-md-4" id="inf1"><p style="color:#F7F3F3">Solicitudes Canceladas:</p></div>
					<div class="col-md-4" id="bg1">
						<?php
							$resultado = mysqli_query($conexion, $query . " WHERE estatus='Cancelado'");
							$result = mysqli_num_rows($resultado);
							$porcent = round($result * 100 / $total, 1);
						?>
						<p style="color:#000000; text-align:center"><?php echo $result." &nbsp;-&nbsp; ".$porcent."%"; ?></p>
					</div>
					<div class="col-md-2"> </div>
				<div class="col-md-12"> </div>
					<div class="col-md-2"> </div>
					<div class="col-md-4" id="inf1"><p style="color:#F7F3F3">Solicitudes Anuladas:</p></div>
					<div class="col-md-4" id="bg0">
						<?php
							$resultado = mysqli_query($conexion, $query . " WHERE estatus='Anulado'");
							$result = mysqli_num_rows($resultado);
							$porcent = round($result * 100 / $total, 1);
						?>
						<p style="color:#000000; text-align:center"><?php echo $result." &nbsp;-&nbsp; ".$porcent."%"; ?></p>
					</div>
					<div class="col-md-2"> </div>
				<div class="col-md-12"> </div>
					<div class="col-md-2"> </div>
					<div class="col-md-4" id="inf1"><p style="color:#F7F3F3"><b>Total de Solicitudes:</b></p></div>
					<div class="col-md-4" id="inf2">
						<p style="color:#000000; text-align:center"><b><?php echo $total." &nbsp;-&nbsp; 100%"; ?></b></p>
					</div>
					<div class="col-md-2"> </div>
					
				<div class="col-md-12" id="porgiro"><br></div>
					
					<!-- Solicitudes por Giro -->
					<div class="col-md-2"> </div>
					<div class="col-md-8"><h4>- <b>Solicitudes por Giro</b> (Solo Finalizadas) -</h4></div>
					<div class="col-md-2"> </div>
					<div class="col-md-12"><br></div>
					
					<?php
						$resultado = mysqli_query($conexion, "SELECT codigo, listgiros.giro, count(*) AS cant FROM listgiros, solicitud
							WHERE id_giro=solicitud.giro AND estatus='Finalizado' GROUP BY solicitud.giro ORDER BY codigo");
						$result = mysqli_num_rows($resultado);
						while ($row = mysqli_fetch_array($resultado, MYSQLI_ASSOC)) {
					?>
					<div class="col-md-2"> </div>
					<div class="col-md-4" id="inf1"><p style="color:#F7F3F3">Código <?php echo $row['codigo']; ?>:</p></div>
					<div class="col-md-4" id="bg0">
						<p style="color:#000000; text-align:center"><?php echo $row['cant']; ?> giros</p>
					</div>
					<div class="col-md-2"> </div>
					<div class="col-md-12"> </div>
					<div class="col-md-2"> </div>
					<div class="col-md-8" id="inf2"><p style="color:#000000"><?php echo $row['giro']; ?></p></div>
					<div class="col-md-2"> </div>
				<div class="col-md-12"> </div>
					<?php	} ?>
					
				<div class="col-md-12" id="pordatos"><br></div>
					
					<!-- Solicitudes por Datos -->
					<div class="col-md-2"> </div>
					<div class="col-md-8"><h4>- <b>Solicitudes por Datos</b> (Solo Finalizadas) -</h4></div>
					<div class="col-md-2"> </div>
					<div class="col-md-12"><br></div>
					
					<?php
						$resultado = mysqli_query($conexion, "SELECT YEAR(f_solicitud) AS year, count(*) AS cant FROM solicitud WHERE estatus='Finalizado' GROUP BY YEAR(f_solicitud)");
						$result = mysqli_num_rows($resultado);
						while ($row = mysqli_fetch_array($resultado, MYSQLI_ASSOC)) {
					?>
					<div class="col-md-2"> </div>
					<div class="col-md-4" id="inf1"><p style="color:#F7F3F3"><b>Solicitudes <?php echo $row['year']; ?>:</b></p></div>
					<div class="col-md-4" id="bg0">
						<p style="color:#000000; text-align:center"><b><?php echo $row['cant']; ?> solicitudes</b></p>
					</div>
					<div class="col-md-2"> </div>
				<div class="col-md-12"> </div>
					<?php	} ?>
					
				<div class="col-md-12"><br></div>
					
					<?php
						$resultado = mysqli_query($conexion, $query . " WHERE estatus='Finalizado'");
						$result = mysqli_num_rows($resultado);
						$propieta = 0;
						$arrendat = 0;
						$represen = 0;
						$consyfunc = 0;
						$consnofun = 0;
						$empleados = 0;
						$inversion = 0;
						while ($row = mysqli_fetch_array($resultado, MYSQLI_ASSOC)) {
							switch ($row['est_gestor']) {
								case "Propietario": $propieta = $propieta + 1; break;
								case "Arrendatario": $arrendat = $arrendat + 1; break;
								case "Representante": $represen = $represen + 1; break;
							} 
							switch ($row['establecimiento']) {
								case 'Construido y no funcionando': $consnofun = $consnofun + 1; break;
								case  'Construido y funcionando' : $consyfunc = $consyfunc + 1; break;
							}
							$empleados = $empleados + $row['n_emp'];
							$inversion = $inversion + $row['s_inversion'];
						}
					?>
					
					<div class="col-md-2"> </div>
					<div class="col-md-4" id="inf1"><p style="color:#F7F3F3">Gestores Propietarios:</p></div>
					<div class="col-md-4" id="bg3">
						<p style="color:#000000; text-align:center"><?php echo $propieta." personas"; ?></p>
					</div>
					<div class="col-md-2"> </div>
				<div class="col-md-12"> </div>
					<div class="col-md-2"> </div>
					<div class="col-md-4" id="inf1"><p style="color:#F7F3F3">Gestores Arrendatarios:</p></div>
					<div class="col-md-4" id="bg2">
						<p style="color:#000000; text-align:center"><?php echo $arrendat." personas"; ?></p>
					</div>
					<div class="col-md-2"> </div>
				<div class="col-md-12"> </div>
					<div class="col-md-2"> </div>
					<div class="col-md-4" id="inf1"><p style="color:#F7F3F3">Gestores Representantes:</p></div>
					<div class="col-md-4" id="bg1">
						<p style="color:#000000; text-align:center"><?php echo $represen." personas"; ?></p>
					</div>
					<div class="col-md-2"> </div>
					
				<div class="col-md-12"><br></div>
					
					<div class="col-md-2"> </div>
					<div class="col-md-4" id="inf1"><p style="color:#F7F3F3">Construidos sin funcionar:</p></div>
					<div class="col-md-4" id="bg0">
						<p style="color:#000000; text-align:center"><?php echo $consnofun." estabs."; ?></p>
					</div>
					<div class="col-md-2"> </div>
				<div class="col-md-12"> </div>
					<div class="col-md-2"> </div>
					<div class="col-md-4" id="inf1"><p style="color:#F7F3F3">Construidos y funcionando:</p></div>
					<div class="col-md-4" id="inf2">
						<p style="color:#000000; text-align:center"><?php echo $consyfunc." estabs."; ?></p>
					</div>
					<div class="col-md-2"> </div>
					
				<div class="col-md-12"><br></div>
					
					<div class="col-md-2"> </div>
					<div class="col-md-4" id="inf1"><p style="color:#F7F3F3"><b>Total de Empleados:</b></p></div>
					<div class="col-md-4" id="bg0">
						<p style="color:#000000; text-align:center"><b><?php echo $empleados." personas"; ?></b></p>
					</div>
					<div class="col-md-2"> </div>
				<div class="col-md-12"> </div>
					<div class="col-md-2"> </div>
					<div class="col-md-4" id="inf1"><p style="color:#F7F3F3"><b>Total de Inversión:</b></p></div>
					<div class="col-md-4" id="inf2">
						<p style="color:#000000; text-align:center"><b><?php echo "$".number_format($inversion,2,'.',','); ?></b></p>
					</div>
					<div class="col-md-2"> </div>
					
				<div class="col-md-12"><br></div>
					
				</div><!-- panel-body -->
			<!-- Finish	Form -->
		<!-- Finish Body -->
		
		<!-- Start Stripper -->
<?php include("../comun/-stripp-.html"); ?>
		<!-- Finish Stripper -->
		</div><!-- panel-default -->
	</div><!-- container -->
</body>
</html>
<?php	} ?>