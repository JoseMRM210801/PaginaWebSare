<!DOCTYPE html>
<html lang="es-MX">
<head>
<?php 
	if (isset($_GET['pag'])) {
		$pagina = $_GET['pag']; }
	else { $pagina = 1; }
	switch ($pagina) {
		default: $pagina = 1;
		case 1: $rango = "001 AND 051"; break;
		case 2: $rango = "052 AND 100"; break;
		case 3: $rango = "101 AND 151"; break;
		case 4: $rango = "152 AND 202"; break;
		case 5: $rango = "206 AND 256"; break;
		case 6: $rango = "257 AND 304"; break;
		case 7: $rango = "305 AND 354"; break;
		case 8: $rango = "355 AND 405"; break;
		case 9: $rango = "406 AND 454"; break;
	} ?>
	<title>Listado giros <?php echo $pagina; ?>/9</title>
<?php include("../comun/-inkmet-.html"); ?>
</head>
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
						<h3><b>LISTADO GIROS <?php echo $pagina; ?>/9</b></h3><hr><br>
						<h4><b>Listado de Giros de Bajo Riesgo para el Programa "SARE"</b></h4>
						<h5 style="text-align:right; color:#FF8800"><b>*SCIAN:</b> Sistema de Clasificación Industrial de América del Norte</h5>
						<table border="1" style="cellspacing:0; cellpadding:0; width:100%">
							<tr style="background:#BFBFBF">
								<td><b>NUM</b></td>
								<td><b>CÓDIGO</b></td>
								<td><b>ESTRUCTURA SCIAN* 2013</b></td>
							</tr>
<?php
	include "../conexion.php";
	$resultado = mysqli_query($conexion, "SELECT * FROM listgiros WHERE id_giro BETWEEN ".$rango);
	$result = mysqli_num_rows($resultado);
	if ($result > 0) {
		while ($row = mysqli_fetch_array($resultado, MYSQLI_ASSOC)) {
				 if ($row['id_giro'] < 10) { $tiponum = "00".$row['id_giro']; }
			else if ($row['id_giro'] < 100) { $tiponum = "0".$row['id_giro']; }
			else if ($row['id_giro'] < 1000) { $tiponum = $row['id_giro']; }
?>
							<tr>
								<td><?php echo $tiponum; ?></td>
								<td><?php echo $row['codigo']; ?></td>
								<td style="text-align:left">&nbsp;<?php echo $row['giro']; ?></td>
							</tr>
<?php	}
	} ?>
						</table>
					</div>
					<div class="col-md-2"> </div>
					
					<!-- Botones Páginas -->
					<div class="col-md-4"> </div>
					<div class="col-md-4"><br>
<?php
	for ($i = 1; $i <= 9; $i++) {
		if ($i == $pagina) { echo '						<a href="#nav" class="btn btn-success">'.$i.'</a>'; }
		else { echo '						<a href="listagiros.php?pag='.$i.'" class="btn btn-primary">'.$i.'</a>'; }
	} ?>
					</div>
					<div class="col-md-4"> </div>
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