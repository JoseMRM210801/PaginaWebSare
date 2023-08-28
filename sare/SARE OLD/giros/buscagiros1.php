<?php
	include "../conexion.php";
	$giro = $_GET['tipogiro'];
	if ($giro == "" || $giro == " ") { $giro = "."; }
	$resultado = mysqli_query($conexion, "SELECT * FROM listgiros WHERE giro LIKE '%$giro%'");
	$result = mysqli_num_rows($resultado);
	if ($result > 0) {	
?>
		<div class="col-md-2"> </div>
		<div class="col-md-8">
			<h4><b>Listado de Giros de Bajo Riesgo para el Programa "SARE"</b></h4>
			<h5 style="text-align:right; color:#FF8800"><b>*SCIAN:</b> Sistema de Clasificación Industrial de América del Norte</h5>
			<table border="1" cellspacing="0" cellpadding="0" width="100%">
				<tr style="background:#BFBFBF">
					<td><b>NUM</b></td>
					<td><b>CÓDIGO</b></td>
					<td><b>ESTRUCTURA SCIAN* 2013</b></td>
				</tr>
<?php
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
<?php	} ?>
			</table>
			<h5><br><span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
			<b><?php echo ' Se encontraron '.$result.' registros relacionados con "'.$giro.'".'; ?></b></h5>
		</div>
		<div class="col-md-2"> </div>
<?php
	} else { echo '
		<div class="col-md-2"> </div>
		<div class="col-md-8">
			<div class="alert alert-danger" role="alert">
				<span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
				<span class="sr-only">Error:</span>&nbsp;NO SE ENCONTRARON REGISTROS RELACIONADOS CON "'.$giro.'".
			</div>
		</div>
		<div class="col-md-2"> </div>';}
?>
