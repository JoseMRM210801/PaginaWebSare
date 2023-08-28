<?php
	include "../conexion.php";
	$folio = $_GET['tipofolio'];
	$estatus = $_GET['tipoestatus'];
	$resultado = mysqli_query($conexion, "SELECT * FROM solicitud WHERE folio='$folio' or estatus='$estatus'");
	$result = mysqli_num_rows($resultado);
	if ($result > 0) {
?>
<table class="table table-bordered table-hover">
	<thead>
		<tr class="bg0">
			<th style="width:1px"><b>FOLIO</b></th>
			<th style="text-align:center"><b>FECHA</b></th>
			<th style="text-align:center"><b>RAZÓN SOCIAL</b></th>
			<th style="text-align:center"><b>DIRECCIÓN</b></th>
			<th style="text-align:center"><b>COLONIA</b></th>
			<th style="width:1px"><b>ESTATUS</b></th>
			<th style="width:1px"><b>DATOS</b></th>
			<th style="width:1px"><b>DOCUM</b></th>
			<th style="width:1px"><b>SUBIR</b></th>
		</tr>
	</thead>
	<tbody>
<?php
while ($row = mysqli_fetch_array($resultado, MYSQLI_ASSOC)) {
	$nuevafecha = date("d/m/Y",strtotime($row['f_solicitud']));
		if ($row['estatus'] == 'Finalizado') { $estilo = 'bg3'; $icon1 = 'comment'; $icon2 = 'search'; $icon3 = 'ban-circle'; }
	else if ($row['estatus'] == 'Pendiente') { $estilo = 'bg2'; $icon1 = 'pencil'; $icon2 = 'search'; $icon3 = 'circle-arrow-up'; }
	else if ($row['estatus'] == 'Cancelado') { $estilo = 'bg1'; $icon1 = 'ban-circle'; $icon2 = 'ban-circle'; $icon3 = 'ban-circle'; }
	else if ($row['estatus'] ==  'Anulado' ) { $estilo = 'bg0'; $icon1 = 'ban-circle'; $icon2 = 'ban-circle'; $icon3 = 'ban-circle'; }
?>
		<tr class="<?php echo $estilo ?>">
			<td align="center"><?php echo $row['folio']; ?></td>
			<td align="center"><?php echo $nuevafecha; ?></td>
			<td align="center"><?php echo $row['rsocial']; ?></td>
			<td align="center"><?php echo $row['im_calle']; ?></td>
			<td align="center"><?php echo $row['im_col']; ?></td>
			<td align="center"><?php echo $row['estatus']; ?></td>
			<td align="center">
				<a class="btn btn-info btn-sm" data-toggle="modal" data-target="#myModal<?php echo $row['folio']; ?>" <?php if($icon1 == "ban-circle") echo "disabled"; ?>><span class="glyphicon glyphicon-<?php echo $icon1; ?>" aria-hidden="true"></span></a>
				<div class="modal fade" id="myModal<?php echo $row['folio']; ?>" role="dialog">
				<!-- Start Modal -->
					<div class="modal-dialog modal-lg">
						<div class="modal-content">
							<div class="modal-header">
								<button type="button" class="close" data-dismiss="modal">&times;</button>
								<h4 class="modal-title" id="myModalLabel<?php echo $row['folio']; ?>"><b>FOLIO:</b> [ <?php echo $row['folio']; ?> ]</h4>
							</div>
							<div class="modal-body">
								<!-- Solicitante -->
								<div class="col-md-12" align="left"><h4>- Datos generales del solicitante -</h4></div>
								<div class="col-md-12"> </div>
								<div class="col-md-5">
									<div class="input-group">
										<span class="input-group-addon" id="sizing-addon2">Fecha: &nbsp; &nbsp;</span>
										<input name="fecha" id="f<?php echo $row['folio']; ?>" type="date" class="form-control fechas" value="<?php echo $row['f_solicitud']; ?>" required>
									</div>
								</div>
								<div class="col-md-2"> </div>
								<div class="col-md-5">
									<div class="input-group">
										<span class="input-group-addon" id="sizing-addon2">Gestor:&nbsp; &nbsp;</span>
										<select name="optempresa" id="e<?php echo $row['folio']; ?>" class="form-control" required>
											<option value="<?php echo $row['est_gestor']; ?>"><?php echo $row['est_gestor']; ?></option>
											<option value=""> </option>
											<option value="Propietario"  >Propietario  </option>
											<option value="Arrendatario" >Arrendatario </option>
											<option value="Representante">Representante</option>
										</select>
									</div>
								</div>
								<div class="col-md-12"> </div>
								<div class="col-md-7">
									<div class="input-group">
										<span class="input-group-addon" id="sizing-addon2">Nombre:&nbsp;</span>
										<input name="rsocial" id="n<?php echo $row['folio']; ?>" type="text" class="form-control" value="<?php echo $row['rsocial']; ?>" maxlength="45" required>
									</div>
								</div>
								<div class="col-md-5">
									<div class="input-group">
										<span class="input-group-addon" id="sizing-addon2">Teléfono: </span>
										<input name="tel" id="t<?php echo $row['folio']; ?>" type="tel" class="form-control" value="<?php echo $row['tel']; ?>" maxlength="10" required>
									</div>
								</div>
								
							<div class="col-md-12"><br></div>
								
								<!-- Domicilio -->
								<div class="col-md-12" align="left"><h4>- Domicilio para recibir notificaciones -</h4></div>
								<div class="col-md-12"> </div>
								<div class="col-md-6">
									<div class="input-group">
										<span class="input-group-addon" id="sizing-addon2">Calle y N°: </span>
										<input name="calle" id="c<?php echo $row['folio']; ?>"  type="text" class="form-control" value="<?php echo $row['dp_calle']; ?>" maxlength="30" required>
									</div>
								</div>
								<div class="col-md-6">
									<div class="input-group">
										<span class="input-group-addon" id="sizing-addon2">Colonia: &nbsp; &nbsp;</span>
										<input name="col" id="cn<?php echo $row['folio']; ?>"  type="text" class="form-control" value="<?php echo $row['dp_col']; ?>" maxlength="30" required>
									</div>
								</div>
								<div class="col-md-12"> </div>
								<div class="col-md-6">
									<div class="input-group">
										<span class="input-group-addon" id="sizing-addon2">Municipio:&nbsp;</span>
										<input name="mpio" id="m<?php echo $row['folio']; ?>"  type="text" class="form-control" value="<?php echo $row['dp_mpio']; ?>" maxlength="20" required>
									</div>
								</div>
								<div class="col-md-6">
									<div class="input-group">
										<span class="input-group-addon" id="sizing-addon2">Correo-e: &nbsp;</span>
										<input name="email" id="em<?php echo $row['folio']; ?>" type="E-Mail" class="form-control" value="<?php echo $row['email']; ?>" maxlength="40" required>
									</div>
								</div>
								
							<div class="col-md-12"><br></div>
								
								<!-- Ubicación -->
								<div class="col-md-12" align="left"><h4>- Ubicación del inmueble -</h4></div>
								<div class="col-md-12"> </div>
								<div class="col-md-6">
									<div class="input-group">
										<span class="input-group-addon" id="sizing-addon2">Calle y N°: </span>
										<input name="calleinmueble" id="ic<?php echo $row['folio']; ?>"  type="text" class="form-control" value="<?php echo $row['im_calle']; ?>" maxlength="30" required>
									</div>
								</div>
								<div class="col-md-6">
									<div class="input-group">
										<span class="input-group-addon" id="sizing-addon2">Colonia: &nbsp; &nbsp;</span>
										<input name="colinmueble" id="ico<?php echo $row['folio']; ?>"  type="text" class="form-control" value="<?php echo $row['im_col']; ?>" maxlength="30" required>
									</div>
								</div>
								
							<div class="col-md-12"><br></div>
								
								<!-- Permisos -->
								<div class="col-md-12" align="left"><h4>- Permiso de uso de suelo y constancia de factibilidad -</h4></div>
								<div class="col-md-12"> </div>
								<div class="col-md-12">
									<div class="input-group">
										<span class="input-group-addon" id="sizing-addon2">Giro solicitado: </span>
										<select name="giro" id="g<?php echo $row['folio']; ?>" class="form-control" required>
											<?php
												$sql = "Select * from listgiros where id_giro=".$row['giro'];
												$res = mysqli_query($conexion, $sql);
												if($res) while ($fila = mysqli_fetch_assoc($res)) echo "<option value='$fila[id_giro]'> $fila[codigo] - $fila[giro] </option>";
											?>
											<option value=""> </option>
											<?php
												$sql = "Select * from listgiros";
												$res = mysqli_query($conexion, $sql);
												if($res) while ($fila = mysqli_fetch_assoc($res)) echo "<option value='$fila[id_giro]'> $fila[codigo] - $fila[giro] </option>";
											?>
										</select>
									</div>
								</div>
								<div class="col-md-12"> </div>
								<div class="col-md-7">
									<div class="input-group">
										<span class="input-group-addon" id="sizing-addon2">Establecimiento: </span>
										<select name="optest" id="es<?php echo $row['folio']; ?>" class="form-control" required>
											<option value="<?php echo $row['establecimiento']; ?>"><?php echo $row['establecimiento']; ?></option>
											<option value=""> </option>
											<option value="Construido y no funcionando">Construido y no funcionando</option>
											<option value="Construido y funcionando"   > Construido y funcionando  </option>
										</select>
									</div>
								</div>
								<div class="col-md-5">
									<div class="input-group">
										<span class="input-group-addon" id="sizing-addon2">N° estacionamientos: </span>
										<input name="cajones" id="caj<?php echo $row['folio']; ?>" type="number" class="form-control" value="<?php echo $row['caj_est']; ?>" min="0" maxlength="2" required>
									</div>
								</div>
								<div class="col-md-12"> </div>
								<div class="col-md-6">
									<div class="input-group">
										<span class="input-group-addon" id="sizing-addon2">Superficie total (m²): </span>
										<input name="suppredio" id="sp<?php echo $row['folio'];?>" type="number" class="form-control" value="<?php echo $row['sup_predio']; ?>" min="0" maxlength="4" required>
									</div>
								</div>
								<div class="col-md-6">
									<div class="input-group">
										<span class="input-group-addon" id="sizing-addon2">Superficie ocupar (m²): </span>
										<input name="supocupar" id="so<?php echo $row['folio']; ?>" type="number" class="form-control" value="<?php echo $row['sup_ocupar']; ?>" min="0" maxlength="3" required>
									</div>
								</div>
								<div class="col-md-12"> </div>
							<div class="col-md-12"><br></div>
								<div class="col-md-12"> </div>
								<div class="col-md-6">
									<div class="input-group">
										<span class="input-group-addon" id="sizing-addon2">Número de empleados: </span>
										<input name="nemp" id="ne<?php echo $row['folio']; ?>" type="number" class="form-control" value="<?php echo $row['n_emp']; ?>" maxlength="2" required>
									</div>
								</div>
								<div class="col-md-6">
									<div class="input-group">
										<span class="input-group-addon" id="sizing-addon2">Monto de inversión ($): </span>
										<input name="inversion" id="si<?php echo $row['folio']; ?>" type="number" class="form-control" value="<?php echo $row['s_inversion']; ?>" maxlength="6" required>
									</div>
								</div>
								<div class="col-md-12"> </div>
								<div class="col-md-6">
									<div class="input-group">
										<span class="input-group-addon" id="sizing-addon2">Antigüedad est. (años): </span>
										<input name="antiguedad" id="an<?php echo $row['folio']; ?>" type="number" class="form-control" value="<?php echo $row['antiguedad'];?>" maxlength="2" required>
									</div>
								</div>
								<div class="col-md-6">
									<div class="input-group">
										<span class="input-group-addon" id="sizing-addon2">Edad solicitante (años): </span>
										<input name="edad" id="ed<?php echo $row['folio']; ?>" type="number" class="form-control" value="<?php echo $row['edad_sol'] ;?>" maxlength="2" required>
									</div>
								</div>
								<div class="col-md-12"> </div>
								<div class="col-md-6">
									<div class="input-group">
										<span class="input-group-addon" id="sizing-addon2">Agua potable y alcantarillado: </span>
										<select name="optest" id="ap<?php echo $row['folio']; ?>" class="form-control" required>
											<option value="<?php echo $row['servicios']; ?>"><?php echo $row['servicios']; ?></option>
											<option value=""> </option>
											<option value="Si"> Si </option>
											<option value="No"> No </option>
										</select>
									</div>
								</div>
								<div class="col-md-1"> </div>
								<div class="col-md-5">
									<div class="input-group">
										<span class="input-group-addon" id="sizing-addon2">Estatus: &nbsp; &nbsp; &nbsp;</span>
										<select name="estatus" id="st<?php echo $row['folio']; ?>" class="form-control" required>
											<option value="<?php echo $row['estatus']; ?>"><?php echo $row['estatus']; ?></option>
											<option value=""> </option>
											<option value="Pendiente" >Pendiente </option>
											<option value="Finalizado">Finalizado</option>
											<option value="Cancelado" >Cancelado </option>
										</select>
									</div>
								</div>
								
							<div class="col-md-12"><br></div>
								
								<div class="col-md-12">
									<div class="input-group">
										<span class="input-group-addon" id="sizing-addon2">Asunto:</span>
										<input name="asunto" id="as<?php echo $row['folio']; ?>"  type="text" class="form-control" value="<?php echo $row['asunto']; ?>" maxlength="250">
									</div>
								</div>&nbsp;
							</div>
							<div class="modal-footer">
								<button type="button" class="btn btn-success" data-dismiss="modal" onclick="updatedata('<?php echo $row['folio']; ?>')">Actualizar</button>
								<button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
							</div>
						</div>
					</div>
				<!-- Finish Modal -->
				</div>
			</td>
			<td align="center">
				<a class="btn btn-info btn-sm" data-toggle="modal" data-target="#myModal2<?php echo $row['folio']; ?>" <?php if($icon2 == "ban-circle") echo "disabled"; ?>><span class="glyphicon glyphicon-<?php echo $icon2; ?>" aria-hidden="true"></span></a>
				<div class="modal fade" id="myModal2<?php echo $row['folio']; ?>" role="dialog">
				<!-- Start Modal -->
					<div class="modal-dialog modal-lg">
						<div class="modal-content">
							<div class="modal-header">
								<button type="button" class="close" data-dismiss="modal">&times;</button>
								<h4 class="modal-title" id="myModalLabel<?php echo $row['folio']; ?>"><b>FOLIO:</b> [ <?php echo $row['folio']; ?> ] &nbsp; <b>GESTOR:</b> [ <?php echo $row['est_gestor']; ?> ]</h4>
							</div>
							<div class="modal-body">
								<?php
								$no= $row['folio'];
								$gs= $row['est_gestor'];
								$dir = "../archivos/{$row['folio']}/";
								
								echo '<!-- Propietario o Arrendatario -->
								<div class="col-md-12" align="left"><h4>- <b>Documentos Anexos: </b>(Propietario o Arrendatario) -</h4></div>
								<div class="col-md-12"> </div>';
								
								$escritura=$row['f_escritura'];
								if($escritura!="")
									echo "<div class='col-md-6 alert alert-success' role='alert' style='margin-bottom: 0px'><a href='".$dir.$escritura."'>Copia de Escrituras o Contrato</a></div>";
								else
									echo '<div class="col-md-6 alert alert-warning" role="alert" style="margin-bottom: 0px">Copia de Escrituras o Contrato (Documento faltante)</div>';
								
								$credencial=$row['f_ine'];
								if($credencial!="")
									echo "<div class='col-md-6 alert alert-success' role='alert' style='margin-bottom: 0px'><a href='".$dir.$credencial."'>Copia de Identificación</a></div>"; 	
								else
									echo '<div class="col-md-6 alert alert-warning" role="alert" style="margin-bottom: 0px">Copia de Identificación (Documento faltante)</div>';
								
								$regfedcont=$row['f_rfc'];
								if($regfedcont!="")
									echo "<div class='col-md-6 alert alert-success' role='alert' style='margin-bottom: 0px'><a href='".$dir.$regfedcont."'>Copia del Reg. Fed. Cont.</a></div>"; 	
								else
									echo '<div class="col-md-6 alert alert-warning" role="alert" style="margin-bottom: 0px">Copia del Reg. Fed. Cont. (Documento faltante)</div>';
								
								$regestcont=$row['f_rec'];
								if($regestcont!="")
									echo "<div class='col-md-6 alert alert-success' role='alert' style='margin-bottom: 0px'><a href='".$dir.$regestcont."'>Copia del Reg. Est. Cont.</a></div>"; 	
								else
									echo '<div class="col-md-6 alert alert-warning" role="alert" style="margin-bottom: 0px">Copia del Reg. Est. Cont. (Documento faltante)</div>';
								
								$cartapc=$row['f_cartapc'];
								if($cartapc!="")
									echo "<div class='col-md-6 alert alert-success' role='alert' style='margin-bottom: 0px'><a href='".$dir.$cartapc."'>Copia de Carta de P.C.</a></div>"; 	
								else
									echo '<div class="col-md-6 alert alert-warning" role="alert" style="margin-bottom: 0px">Copia de Carta de P.C. (Documento faltante)</div>';
								
								$predial=$row['f_predial'];
								if($predial!="")
									echo "<div class='col-md-6 alert alert-success' role='alert' style='margin-bottom: 0px'><a href='".$dir.$predial."'>Copia de Pago Predial</a></div>"; 	
								else
									echo '<div class="col-md-6 alert alert-warning" role="alert" style="margin-bottom: 0px">Copia de Pago Predial (Documento faltante)</div>';
								
								echo '<div class="col-md-12"><br></div>';
								
								if($gs == "Representante"){
									echo '<!-- Representante Legal -->
									<div class="col-md-12" align="left"><h4>- <b>Documentos Anexos: </b>(Representante Legal) -</h4></div>
									<div class="col-md-12"> </div>';
									
									$cartapoder=$row['f_cartapoder'];
									if($cartapoder!="")
										echo "<div class='col-md-6 alert alert-success' role='alert' style='margin-bottom: 0px'><a href='".$dir.$cartapoder."'>Copia de Carta Poder</a></div>"; 	
									else
										echo '<div class="col-md-6 alert alert-warning" role="alert" style="margin-bottom: 0px">Copia de Carta Poder (Documento faltante)</div>';
									
									$actaconst=$row['f_actaconstitutiva'];
									if($actaconst!="")
										echo "<div class='col-md-6 alert alert-success' role='alert' style='margin-bottom: 0px'><a href='".$dir.$actaconst."'>Copia de Acta Constitutiva</a></div>"; 	
									else
										echo '<div class="col-md-6 alert alert-warning" role="alert" style="margin-bottom: 0px">Copia de Acta Constitutiva (Documento faltante)</div>';
									
									echo '<div class="col-md-12"><br></div>';
								}
								
								echo '<!-- Desarrollo Urbano -->
								<div class="col-md-12" align="left"><h4>- <b>Documentos Anexos: </b>(Desarrollo Urbano) -</h4></div>
								<div class="col-md-12"> </div>';
								
								$pagosare=$row['f_pagosare'];
								if($pagosare!="")
									echo "<div class='col-md-6 alert alert-success' role='alert' style='margin-bottom: 0px'><a href='".$dir.$pagosare."'>Copia de Pago SARE</a></div>"; 	
								else
									echo '<div class="col-md-6 alert alert-warning" role="alert" style="margin-bottom: 0px">Copia de Pago SARE (Documento faltante)</div>';
								
								$usosuelo=$row['f_usosuelo'];
								if($usosuelo!="")
									echo "<div class='col-md-6 alert alert-success' role='alert' style='margin-bottom: 0px'><a href='".$dir.$usosuelo."'>Copia de Uso de Suelo</a></div>"; 	
								else
									echo '<div class="col-md-6 alert alert-warning" role="alert" style="margin-bottom: 0px">Copia de Uso de Suelo (Documento faltante)</div>';
								?>&nbsp;
							</div>
							<div class="modal-footer">
								<button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
							</div>
						</div>
					</div>
				<!-- Finish Modal -->
				</div>
			</td>
			<td align="center">
				<a href="documentos2.php?folio=<?php echo $row['folio']; ?>" class="btn btn-info btn-sm" <?php if($icon3 == "ban-circle") echo "disabled"; ?>><span class="glyphicon glyphicon-<?php echo $icon3; ?>" aria-hidden="true"></span></a>
			</td>
		</tr>
<?php	} ?>
	</tbody>
</table>
<h5 style="text-align:center"><span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
<b><?php echo ' Se encontraron '.$result.' registros relacionados con el folio o estatus.'; ?></b></h5>
<?php
} else { echo '
	<div class="col-md-12">
		<div class="alert alert-danger" role="alert" style="text-align:center">
			<span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
			<span class="sr-only">Error:</span>NO EXISTE NINGUN REGISTRO CON ESTE FOLIO Y/O ESTATUS.	
		</div>
	</div>'; }
?>
