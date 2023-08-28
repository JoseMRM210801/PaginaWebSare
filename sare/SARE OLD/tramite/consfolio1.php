<?php
	include "../conexion.php";
	$folio = $_GET['tipofolio'];
	$estatus = $_GET['tipoestatus'];
	$resultado = mysqli_query($conexion, "SELECT * FROM solicitud WHERE folio='$folio'");
	$result = mysqli_num_rows($resultado);
	if ($result > 0) {
		$row = mysqli_fetch_array($resultado, MYSQLI_ASSOC);
		$nuevafecha = date("d/m/Y",strtotime($row['f_solicitud']));
			if ($row['estatus'] == 'Finalizado') { $estilo = 'bg3'; }
		else if ($row['estatus'] == 'Pendiente') { $estilo = 'bg2'; }
		else if ($row['estatus'] == 'Cancelado') { $estilo = 'bg1'; }
		else if ($row['estatus'] ==  'Anulado' ) { $estilo = 'bg0'; }

		echo '
		<div class="col-md-2"> </div>
		<div class="col-md-8">
			<div class="col-md-6" id="inf1"><p style="color:#F7F3F3">Fecha de ingreso:</p></div>
			<div class="col-md-6" id="' . $estilo . '"><p style="color:#000000; text-align:center">' . $nuevafecha . '</p></div>
		</div>
		<div class="col-md-2"> </div>
		<div class="col-md-12"> </div>
		<div class="col-md-2"> </div>
		<div class="col-md-8">
			<div class="col-md-6" id="inf1"><p style="color:#F7F3F3">Estatus del trámite:</p></div>
			<div class="col-md-6" id="' . $estilo . '"><p style="color:#000000; text-align:center">' . $row['estatus'] . '</p></div>
		</div>
		<div class="col-md-2"> </div>
		<div class="col-md-12"> </div>
		<div class="col-md-2"> </div>
		<div class="col-md-8">
			<div class="col-md-12" id="inf1"><p style="color:#F7F3F3">Observaciones:</p></div>
		</div>
		<div class="col-md-2"> </div>
		<div class="col-md-12"> </div>
		<div class="col-md-2"> </div>
		<div class="col-md-8">
			<div class="col-md-12" id="' . $estilo . '"><p style="color:#000000">&nbsp;' . $row['asunto'] . '</p></div>
		</div>
		<div class="col-md-2"> </div>
		<div class="col-md-12"><br></div>';
		
		if ($row['estatus'] != 'Anulado' ) {
			echo '
			<!-- Propietario o Arrendatario -->
			<div class="col-md-2"> </div>
			<div class="col-md-8" style="text-align:left"><h4>- <b>Documentos Anexos: </b>(Propietario o Arrendatario) -</h4></div>
			<div class="col-md-2"> </div>
			<div class="col-md-12"> </div>
			<div class="col-md-2"> </div>
			<div class="col-md-8">';
				$escritura=$row['f_escritura'];
				if($escritura!="")
					echo "<div class='col-md-6 alert alert-success' role='alert' style='margin-bottom: 0px'>Copia Escrituras o Contrato (Documento existente)</div>";
				else
					echo '<div class="col-md-6 alert alert-warning" role="alert" style="margin-bottom: 0px">Copia Escrituras o Contrato (Documento faltante)</div>';
				$credencial=$row['f_ine'];
				if($credencial!="")
					echo "<div class='col-md-6 alert alert-success' role='alert' style='margin-bottom: 0px'>Copia de Identificación (Documento existente)</div>"; 	
				else
					echo '<div class="col-md-6 alert alert-warning" role="alert" style="margin-bottom: 0px">Copia de Identificación (Documento faltante)</div>';
				$regfedcont=$row['f_rfc'];
				if($regfedcont!="")
					echo "<div class='col-md-6 alert alert-success' role='alert' style='margin-bottom: 0px'>Copia del Reg. Fed. Cont. (Documento existente)</div>"; 	
				else
					echo '<div class="col-md-6 alert alert-warning" role="alert" style="margin-bottom: 0px">Copia del Reg. Fed. Cont. (Documento faltante)</div>';
				$regestcont=$row['f_rec'];
				if($regestcont!="")
					echo "<div class='col-md-6 alert alert-success' role='alert' style='margin-bottom: 0px'>Copia del Reg. Est. Cont. (Documento existente)</div>"; 	
				else
					echo '<div class="col-md-6 alert alert-warning" role="alert" style="margin-bottom: 0px">Copia del Reg. Est. Cont. (Documento faltante)</div>';
				$cartapc=$row['f_cartapc'];
				if($cartapc!="")
					echo "<div class='col-md-6 alert alert-success' role='alert' style='margin-bottom: 0px'>Copia de Carta de P.C. (Documento existente)</div>"; 	
				else
					echo '<div class="col-md-6 alert alert-warning" role="alert" style="margin-bottom: 0px">Copia de Carta de P.C. (Documento faltante)</div>';
				$predial=$row['f_predial'];
				if($predial!="")
					echo "<div class='col-md-6 alert alert-success' role='alert' style='margin-bottom: 0px'>Copia de Pago Predial (Documento existente)</div>"; 	
				else
					echo '<div class="col-md-6 alert alert-warning" role="alert" style="margin-bottom: 0px">Copia de Pago Predial (Documento faltante)</div>';
			echo '</div>
			<div class="col-md-2"> </div>
			
			<div class="col-md-12"><br></div>';
			
			if($row['est_gestor'] == "Representante"){
				echo '<!-- Representante Legal -->
				<div class="col-md-2"> </div>
				<div class="col-md-8" style="text-align:left"><h4>- <b>Documentos Anexos: </b>(Representante Legal) -</h4></div>
				<div class="col-md-2"> </div>
				<div class="col-md-12"> </div>
				<div class="col-md-2"> </div>
				<div class="col-md-8">';
				$cartapoder=$row['f_cartapoder'];
					if($cartapoder!="")
						echo "<div class='col-md-6 alert alert-success' role='alert' style='margin-bottom: 0px'>Copia de Carta Poder (Documento existente)</div>"; 	
					else
						echo '<div class="col-md-6 alert alert-warning" role="alert" style="margin-bottom: 0px">Copia de Carta Poder (Documento faltante)</div>';
					$actaconst=$row['f_actaconstitutiva'];
					if($actaconst!="")
						echo "<div class='col-md-6 alert alert-success' role='alert' style='margin-bottom: 0px'>Copia de Acta Constitutiva (Documento existente)</div>"; 	
					else
						echo '<div class="col-md-6 alert alert-warning" role="alert" style="margin-bottom: 0px">Copia de Acta Constitutiva (Documento faltante)</div>';
				echo '</div>
				<div class="col-md-2"> </div>
				
				<div class="col-md-12"><br></div>';
			}
			
			echo '<!-- Desarrollo Urbano -->
			<div class="col-md-2"> </div>
			<div class="col-md-8" style="text-align:left"><h4>- <b>Documentos Anexos: </b>(Desarrollo Urbano) -</h4></div>
			<div class="col-md-2"> </div>
			<div class="col-md-12"> </div>
			<div class="col-md-2"> </div>
			<div class="col-md-8">';
				$pagosare=$row['f_pagosare'];
				if($pagosare!="")
					echo "<div class='col-md-6 alert alert-success' role='alert' style='margin-bottom: 0px'>Copia de Pago SARE (Documento existente)</div>"; 	
				else
					echo '<div class="col-md-6 alert alert-warning" role="alert" style="margin-bottom: 0px">Copia de Pago SARE (Documento faltante)</div>';
				$usosuelo=$row['f_usosuelo'];
				if($usosuelo!="")
					echo "<div class='col-md-6 alert alert-success' role='alert' style='margin-bottom: 0px'>Copia de Uso de Suelo (Documento existente)</div>"; 	
				else
					echo '<div class="col-md-6 alert alert-warning" role="alert" style="margin-bottom: 0px">Copia de Uso de Suelo (Documento faltante)</div>';
			echo '</div>
			<div class="col-md-2"> </div>';
		};
	} else { echo '
		<div class="col-md-2"> </div>
		<div class="col-md-8">
			<div class="alert alert-danger" role="alert" style="text-align:center">
				<span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
				<span class="sr-only">Error:</span>&nbsp;NO EXISTE NINGUN REGISTRO CON ESTE FOLIO.
			</div>
		</div>
		<div class="col-md-2"> </div>';}
?>
