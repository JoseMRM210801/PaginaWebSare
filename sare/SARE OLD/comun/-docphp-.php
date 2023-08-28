	<link rel="stylesheet" href="../css/fileinput.css">
	<script src="../js/fileinput.min.js" type="text/javascript"></script>
	<link rel="stylesheet" href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css">
	<script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>
<?php
	include "../conexion.php";
	$foliou = $_GET['folio'];
	$sql = "SELECT * FROM solicitud WHERE folio = $foliou";
	$result = mysqli_query ($conexion, $sql);
	// verificamos que no haya error
	if ( !$result )
		print('<meta http-equiv="refresh" content="0; url=' . $pagina . '">');
	$num_filas = mysqli_num_rows($result);
	// verificamos que existan registros
	if ($num_filas > 0){
		$fila = mysqli_fetch_array($result, MYSQLI_ASSOC);
		$estatus = $fila['estatus'];
		// verificamos que esté Pendiente
		if ( $estatus != "Pendiente" )
			print('<meta http-equiv="refresh" content="0; url=' . $pagina . '">');
		$escritura = $fila['f_escritura'];
		$identif = $fila['f_ine'];
		$regfedcon = $fila['f_rfc'];
		$regestcon = $fila['f_rec'];
		$cartapc = $fila['f_cartapc'];
		$predial = $fila['f_predial'];
		$cartapoder = $fila['f_cartapoder'];
		$actacons = $fila['f_actaconstitutiva'];
		$pagosare = $fila['f_pagosare'];
		$usosuelo = $fila['f_usosuelo'];
		$gestor = $fila['est_gestor'];
	} else {
		print('<meta http-equiv="refresh" content="0; url=' . $pagina . '">');
	}
?>
