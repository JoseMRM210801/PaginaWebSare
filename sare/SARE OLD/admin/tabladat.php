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
	<title>Todas Solicitudes 3/3</title>
	<link rel="stylesheet" href="../css/fileinput.css">
	<script src="../js/fileinput.min.js" type="text/javascript"></script>
<?php include("../comun/-admins-.html"); ?>
	<style type="text/css">
		.bg0 { background:#C0C0C0; /*gris*/ }
		.bg1 { background:#FFC0C0; /*rojo*/ }
		.bg2 { background:#FFFFC0; /*amar*/ }
		.bg3 { background:#C0FFC0; /*verd*/ }
		.bg0, .bg1, .bg2, .bg3 {
			bordercolor:#FFFFFF;
			color:#000;
		}
	</style>
</head>
<body background="../images/fondomoroleon.png">
	<div class="container"><br>
		<div class="panel panel-default">
		<!-- Start Header -->
		
		<!-- Finish Header -->
		
		<!-- Start Body -->
			<!-- Start Form -->
				<div class="panel-body" id="conten" style="display:none">
					<div class="col-md-2"> </div>
					<div class="col-md-8">
						<h3 style="text-align:center"><b>TODAS SOLICITUDES 3/3</b></h3><hr><br>
					</div>
					<div class="col-md-2"> </div>
					
				<div class="col-md-12"> </div>
					
					<div id="viewdata" style="background:#FFFFFF; align-content:center">
<?php
	include "../conexion.php";
	$resultado = mysqli_query($conexion, "SELECT * FROM solicitud WHERE estatus <> 'Anulado'");
	$result = mysqli_num_rows($resultado);
	if ($result > 0) {
?>
<table class="table table-bordered table-hover">
	<thead>
		<tr class="bg0">
			<th style="text-align:center"><b>FOLIO</b></th>
			<th style="text-align:center"><b>FECHA</b></th>
			<th style="text-align:center"><b>GESTOR</b></th>
			<th style="text-align:center"><b>ESC</b></th>
			<th style="text-align:center"><b>INE</b></th>
			<th style="text-align:center"><b>RFC</b></th>
			<th style="text-align:center"><b>REC</b></th>
			<th style="text-align:center"><b>CPC</b></th>
			<th style="text-align:center"><b>PRED</b></th>
			<th style="text-align:center"><b>CPOD</b></th>
			<th style="text-align:center"><b>ACTA</b></th>
			<th style="text-align:center"><b>SARE</b></th>
			<th style="text-align:center"><b>USO</b></th>
			<th style="text-align:center"><b>ASUNTO</b></th>
		</tr>
	</thead>
	<tbody>
<?php
while ($row = mysqli_fetch_array($resultado, MYSQLI_ASSOC)) {
	$nuevafecha = date("d/m/Y",strtotime($row['f_solicitud']));
		if ($row['estatus'] == 'Finalizado') { $estilo = 'bg3'; }
	else if ($row['estatus'] == 'Pendiente') { $estilo = 'bg2'; }
	else if ($row['estatus'] == 'Cancelado') { $estilo = 'bg1'; }
	else if ($row['estatus'] ==  'Anulado' ) { $estilo = 'bg0'; }
?>
		<tr class="<?php echo $estilo ?>">
			<td align="center"><?php echo $row['folio']; ?></td>
			<td align="center"><?php echo $nuevafecha; ?></td>
			<td align="center"><?php echo $row['est_gestor']; ?></td>
			<td align="center"><?php echo $row['f_escritura']; ?></td>
			<td align="center"><?php echo $row['f_ine']; ?></td>
			<td align="center"><?php echo $row['f_rfc']; ?></td>
			<td align="center"><?php echo $row['f_rec']; ?></td>
			<td align="center"><?php echo $row['f_cartapc']; ?></td>
			<td align="center"><?php echo $row['f_predial']; ?></td>
			<td align="center"><?php echo $row['f_cartapoder']; ?></td>
			<td align="center"><?php echo $row['f_actaconstitutiva']; ?></td>
			<td align="center"><?php echo $row['f_pagosare']; ?></td>
			<td align="center"><?php echo $row['f_usosuelo']; ?></td>
			<td align="center"><?php echo $row['asunto']; ?></td>
		</tr>
<?php	} ?>
	</tbody>
</table>
<h5 style="text-align:center"><span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
<b><?php echo ' Se encontraron '.$result.' registros relacionados con el folio o estatus.'; ?></b></h5>
<?php	} ?>
					</div>
					
				<div class="col-md-12"> </div>
					
					<!-- Botones Páginas -->
					<div class="col-md-2"> </div>
					<div class="col-md-8" style="text-align:center">
						<a href="tablasol.php" class="btn btn-primary" style="width:30%">1/3</a>
						<a href="tablaemp.php" class="btn btn-primary" style="width:30%">2/3</a>
						<a href="#nav" class="btn btn-success" style="width:30%">3/3</a>
					</div>
					<div class="col-md-2"> </div>
				</div><!-- panel-body -->
			<!-- Finish Form -->
		<!-- Finish Body -->
		
		<!-- Start Stripper -->
		
		<!-- Finish Stripper -->
		</div><!-- panel-default -->
	</div><!-- container --><br>
</body>
</html>
<?php	} ?>