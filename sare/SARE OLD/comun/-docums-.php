			<form method="post" action="" name="inscripcion" enctype="multipart/form-data">
				<div class="panel-body" id="conten" style="display:none">
					<div class="col-md-2"> </div>
					<div class="col-md-8">
						<h3 style="text-align:center"><b>SUBIR DOCUMENTOS</b></h3><hr><br>
					</div>
					<div class="col-md-2"> </div>
					
				<div class="col-md-12"><br></div>
					
					<div class="col-md-2"> </div>
					<div class="col-md-3">
						<div class="input-group">
							<span class="input-group-addon" id="sizing-addon2"><b>Folio: &nbsp; &nbsp; &nbsp;</b></span>
							<input name="folio" type="number" class="form-control" readonly="readonly" value="<?php echo $foliou; ?>">
						</div>
					</div>
					<div class="col-md-5">
						<div class="input-group">
							<span class="input-group-addon" id="sizing-addon2"><b>Gestor:&nbsp; &nbsp;</b></span>
							<input name="persona" type="text" class="form-control" readonly="readonly" value="<?php echo $gestor; ?>">
						</div>
					</div>
					<div class="col-md-2"> </div>
					<div class="col-md-12">
						<h5 style="text-align:center"><b>Adjuntar Archivos</b> <i>(Puedes adjuntar archivos con formato PDF, nombres cortos, no mayores a 15MB)</i></h5>
					</div>
					
				<div class="col-md-12" id="fisica"><br></div>
					
					<!-- Propietario o Arrendatario -->
					<div class="col-md-2"> </div>
					<div class="col-md-8"><h4>- <b>Documentos Anexos: </b>(Propietario o Arrendatario) -</h4></div>
					<div class="col-md-2"> </div>
					<div class="col-md-12"><br></div>
					
					<div class="col-md-2"> </div>
					<div class="col-md-4" style="text-align:center; background:#ddd; padding:8px; border-radius:10px 10px 10px 10px; -moz-border-radius:10px 10px 10px 10px; -webkit-border-radius:10px 10px 10px 10px">
						<h5 style="text-align:left"><b>&nbsp;Copia de Escrituras o Contrato:</b></h5>
						<div class="input-group">
							<span class="input-group-addon" id="sizing-addon2"><b>Archivo<br>a subir:</b></span>
							<input type="file" style="width:100%; padding-top:5px; padding-bottom:5px; padding-left:5px; padding-right:5px" name="escritura" <?php if($escritura != "") echo "disabled"; ?>>
							<button class="btn btn-sm btn-primary" type="submit" style="width:100%" value="Enviar" <?php if($escritura != "") echo "disabled"; ?>>Subir Escrituras</button>
						</div>
						<?php
							$archivo = (isset($_FILES['escritura'])) ? $_FILES['escritura'] : null;
							$dir_archivo = "../archivos/{$foliou}/".$archivo['name'];
							if($dir_archivo!="../archivos/{$foliou}/"){
								$dir_archivo = "../archivos/{$foliou}/esc.pdf";
								move_uploaded_file($archivo['tmp_name'], $dir_archivo);
								chmod($dir_archivo, 0777);
								$update = "UPDATE solicitud SET f_escritura ='esc.pdf' WHERE folio={$foliou}";
								mysqli_query($conexion, $update);
								$mens = "SE HA ENVIADO EXITOSAMENTE SU ARCHIVO:\\n{$archivo['name']}";
								print "<script>alert('$mens')</script>";
								print('<meta http-equiv="refresh" content="0; url=#fisica">');
							}
						?>
						<div class="input-group">
							<span class="input-group-addon" id="sizing-addon2"><b>Archivo<br>subido:</b></span>
							<input type="text" style="width:100%; padding-top:5px; padding-bottom:5px; padding-left:5px; padding-right:5px" disabled value="<?php echo ' '.$escritura; ?>">
							<button type="button" style="width:100%" class="btn <?php if($escritura != "") { echo "btn-success"; } else { echo "btn-danger"; }; ?>" disabled>&nbsp;
								<span class="glyphicon <?php if($escritura != "") { echo "glyphicon-ok"; } else { echo "glyphicon-remove"; }; ?>"></span>&nbsp;</button>
						</div>
					</div>
					<div style="text-align:center">&nbsp;</div>
					<div class="col-md-4" style="text-align:center; background:#ddd; padding:8px; border-radius:10px 10px 10px 10px; -moz-border-radius:10px 10px 10px 10px; -webkit-border-radius:10px 10px 10px 10px">
						<h5 style="text-align:left"><b>&nbsp;Copia de Identificación:</b></h5>
						<div class="input-group">
							<span class="input-group-addon" id="sizing-addon2"><b>Archivo<br>a subir:</b></span>
							<input type="file" style="width:100%; padding-top:5px; padding-bottom:5px; padding-left:5px; padding-right:5px" name="identif" <?php if($identif != "") echo "disabled"; ?>>
							<button class="btn btn-sm btn-primary" type="submit" style="width:100%" value="Enviar" <?php if($identif != "") echo "disabled"; ?>>Subir Identificación</button>
						</div>
						<?php
							$archivo = (isset($_FILES['identif'])) ? $_FILES['identif'] : null;
							$dir_archivo = "../archivos/{$foliou}/".$archivo['name'];
							if($dir_archivo!="../archivos/{$foliou}/"){
								$dir_archivo = "../archivos/{$foliou}/ine.pdf";
								move_uploaded_file($archivo['tmp_name'], $dir_archivo);
								chmod($dir_archivo, 0777);
								$update = "UPDATE solicitud SET f_ine ='ine.pdf' WHERE folio={$foliou}";
								mysqli_query($conexion, $update);
								$mens = "SE HA ENVIADO EXITOSAMENTE SU ARCHIVO:\\n{$archivo['name']}";
								print "<script>alert('$mens')</script>";
								print('<meta http-equiv="refresh" content="0; url=#fisica">');
							}
						?>
						<div class="input-group">
							<span class="input-group-addon" id="sizing-addon2"><b>Archivo<br>subido:</b></span>
							<input type="text" style="width:100%; padding-top:5px; padding-bottom:5px; padding-left:5px; padding-right:5px" disabled value="<?php echo ' '.$identif; ?>">
							<button type="button" style="width:100%" class="btn <?php if($identif != "") { echo "btn-success"; } else { echo "btn-danger"; }; ?>" disabled>&nbsp;
								<span class="glyphicon <?php if($identif != "") { echo "glyphicon-ok"; } else { echo "glyphicon-remove"; }; ?>"></span>&nbsp;</button>
						</div>
					</div>
					<div class="col-md-2"> </div>
					<div class="col-md-12" style="text-align:center">&nbsp;</div>
					<div class="col-md-2"> </div>
					<div class="col-md-4" style="text-align:center; background:#ddd; padding:8px; border-radius:10px 10px 10px 10px; -moz-border-radius:10px 10px 10px 10px; -webkit-border-radius:10px 10px 10px 10px">
						<h5 style="text-align:left"><b>&nbsp;Copia del Reg. Fed. Cont.:</b></h5>
						<div class="input-group">
							<span class="input-group-addon" id="sizing-addon2"><b>Archivo<br>a subir:</b></span>
							<input type="file" style="width:100%; padding-top:5px; padding-bottom:5px; padding-left:5px; padding-right:5px" name="regfedcon" <?php if($regfedcon != "") echo "disabled"; ?>>
							<button class="btn btn-sm btn-primary" type="submit" style="width:100%" value="Enviar" <?php if($regfedcon != "") echo "disabled"; ?>>Subir Reg. Fed. Cont.</button>
						</div>
						<?php
							$archivo = (isset($_FILES['regfedcon'])) ? $_FILES['regfedcon'] : null;
							$dir_archivo = "../archivos/{$foliou}/".$archivo['name'];
							if($dir_archivo!="../archivos/{$foliou}/"){
								$dir_archivo = "../archivos/{$foliou}/rfc.pdf";
								move_uploaded_file($archivo['tmp_name'], $dir_archivo);
								chmod($dir_archivo, 0777);
								$update = "UPDATE solicitud SET f_rfc ='rfc.pdf' WHERE folio={$foliou}";
								mysqli_query($conexion, $update);
								$mens = "SE HA ENVIADO EXITOSAMENTE SU ARCHIVO:\\n{$archivo['name']}";
								print "<script>alert('$mens')</script>";
								print('<meta http-equiv="refresh" content="0; url=#fisica">');
							}
						?>
						<div class="input-group">
							<span class="input-group-addon" id="sizing-addon2"><b>Archivo<br>subido:</b></span>
							<input type="text" style="width:100%; padding-top:5px; padding-bottom:5px; padding-left:5px; padding-right:5px" disabled value="<?php echo ' '.$regfedcon; ?>">
							<button type="button" style="width:100%" class="btn <?php if($regfedcon != "") { echo "btn-success"; } else { echo "btn-danger"; }; ?>" disabled>&nbsp;
								<span class="glyphicon <?php if($regfedcon != "") { echo "glyphicon-ok"; } else { echo "glyphicon-remove"; }; ?>"></span>&nbsp;</button>
						</div>
					</div>
					<div style="text-align:center">&nbsp;</div>
					<div class="col-md-4" style="text-align:center; background:#ddd; padding:8px; border-radius:10px 10px 10px 10px; -moz-border-radius:10px 10px 10px 10px; -webkit-border-radius:10px 10px 10px 10px">
						<h5 style="text-align:left"><b>&nbsp;Copia del Reg. Est. Cont.:</b></h5>
						<div class="input-group">
							<span class="input-group-addon" id="sizing-addon2"><b>Archivo<br>a subir:</b></span>
							<input type="file" style="width:100%; padding-top:5px; padding-bottom:5px; padding-left:5px; padding-right:5px" name="regestcon" <?php if($regestcon != "") echo "disabled"; ?>>
							<button class="btn btn-sm btn-primary" type="submit" style="width:100%" value="Enviar" <?php if($regestcon != "") echo "disabled"; ?>>Subir Reg. Est. Cont.</button>
						</div>
						<?php
							$archivo = (isset($_FILES['regestcon'])) ? $_FILES['regestcon'] : null;
							$dir_archivo = "../archivos/{$foliou}/".$archivo['name'];
							if($dir_archivo!="../archivos/{$foliou}/"){
								$dir_archivo = "../archivos/{$foliou}/rec.pdf";
								move_uploaded_file($archivo['tmp_name'], $dir_archivo);
								chmod($dir_archivo, 0777);
								$update = "UPDATE solicitud SET f_rec ='rec.pdf' WHERE folio={$foliou}";
								mysqli_query($conexion, $update);
								$mens = "SE HA ENVIADO EXITOSAMENTE SU ARCHIVO:\\n{$archivo['name']}";
								print "<script>alert('$mens')</script>";
								print('<meta http-equiv="refresh" content="0; url=#fisica">');
							}
						?>
						<div class="input-group">
							<span class="input-group-addon" id="sizing-addon2"><b>Archivo<br>subido:</b></span>
							<input type="text" style="width:100%; padding-top:5px; padding-bottom:5px; padding-left:5px; padding-right:5px" disabled value="<?php echo ' '.$regestcon; ?>">
							<button type="button" style="width:100%" class="btn <?php if($regestcon != "") { echo "btn-success"; } else { echo "btn-danger"; }; ?>" disabled>&nbsp;
								<span class="glyphicon <?php if($regestcon != "") { echo "glyphicon-ok"; } else { echo "glyphicon-remove"; }; ?>"></span>&nbsp;</button>
						</div>
					</div>
					<div class="col-md-2"> </div>
					<div class="col-md-12" style="text-align:center">&nbsp;</div>
					<div class="col-md-2"> </div>
					<div class="col-md-4" style="text-align:center; background:#ddd; padding:8px; border-radius:10px 10px 10px 10px; -moz-border-radius:10px 10px 10px 10px; -webkit-border-radius:10px 10px 10px 10px">
						<h5 style="text-align:left"><b>&nbsp;Copia de Carta de P.C.:</b></h5>
						<div class="input-group">
							<span class="input-group-addon" id="sizing-addon2"><b>Archivo<br>a subir:</b></span>
							<input type="file" style="width:100%; padding-top:5px; padding-bottom:5px; padding-left:5px; padding-right:5px" name="cartapc" <?php if($cartapc != "") echo "disabled"; ?>>
							<button class="btn btn-sm btn-primary" type="submit" style="width:100%" value="Enviar" <?php if($cartapc != "") echo "disabled"; ?>>Subir Carta de P.C.</button>
						</div>
						<?php
							$archivo = (isset($_FILES['cartapc'])) ? $_FILES['cartapc'] : null;
							$dir_archivo = "../archivos/{$foliou}/".$archivo['name'];
							if($dir_archivo!="../archivos/{$foliou}/"){
								$dir_archivo = "../archivos/{$foliou}/cpc.pdf";
								move_uploaded_file($archivo['tmp_name'], $dir_archivo);
								chmod($dir_archivo, 0777);
								$update = "UPDATE solicitud SET f_cartapc ='cpc.pdf' WHERE folio={$foliou}";
								mysqli_query($conexion, $update);
								$mens = "SE HA ENVIADO EXITOSAMENTE SU ARCHIVO:\\n{$archivo['name']}";
								print "<script>alert('$mens')</script>";
								print('<meta http-equiv="refresh" content="0; url=#fisica">');
							}
						?>
						<div class="input-group">
							<span class="input-group-addon" id="sizing-addon2"><b>Archivo<br>subido:</b></span>
							<input type="text" style="width:100%; padding-top:5px; padding-bottom:5px; padding-left:5px; padding-right:5px" disabled value="<?php echo ' '.$cartapc; ?>">
							<button type="button" style="width:100%" class="btn <?php if($cartapc != "") { echo "btn-success"; } else { echo "btn-danger"; }; ?>" disabled>&nbsp;
								<span class="glyphicon <?php if($cartapc != "") { echo "glyphicon-ok"; } else { echo "glyphicon-remove"; }; ?>"></span>&nbsp;</button>
						</div>
					</div>
					<div style="text-align:center">&nbsp;</div>
					<div class="col-md-4" style="text-align:center; background:#ddd; padding:8px; border-radius:10px 10px 10px 10px; -moz-border-radius:10px 10px 10px 10px; -webkit-border-radius:10px 10px 10px 10px">
						<h5 style="text-align:left"><b>&nbsp;Copia de Pago Predial:</b></h5>
						<div class="input-group">
							<span class="input-group-addon" id="sizing-addon2"><b>Archivo<br>a subir:</b></span>
							<input type="file" style="width:100%; padding-top:5px; padding-bottom:5px; padding-left:5px; padding-right:5px" name="predial" <?php if($predial != "") echo "disabled"; ?>>
							<button class="btn btn-sm btn-primary" type="submit" style="width:100%" value="Enviar" <?php if($predial != "") echo "disabled"; ?>>Subir Pago Predial</button>
						</div>
						<?php
							$archivo = (isset($_FILES['predial'])) ? $_FILES['predial'] : null;
							$dir_archivo = "../archivos/{$foliou}/".$archivo['name'];
							if($dir_archivo!="../archivos/{$foliou}/"){
								$dir_archivo = "../archivos/{$foliou}/pred.pdf";
								move_uploaded_file($archivo['tmp_name'], $dir_archivo);
								chmod($dir_archivo, 0777);
								$update = "UPDATE solicitud SET f_predial ='pred.pdf' WHERE folio={$foliou}";
								mysqli_query($conexion, $update);
								$mens = "SE HA ENVIADO EXITOSAMENTE SU ARCHIVO:\\n{$archivo['name']}";
								print "<script>alert('$mens')</script>";
								print('<meta http-equiv="refresh" content="0; url=#fisica">');
							}
						?>
						<div class="input-group">
							<span class="input-group-addon" id="sizing-addon2"><b>Archivo<br>subido:</b></span>
							<input type="text" style="width:100%; padding-top:5px; padding-bottom:5px; padding-left:5px; padding-right:5px" disabled value="<?php echo ' '.$predial; ?>">
							<button type="button" style="width:100%" class="btn <?php if($predial != "") { echo "btn-success"; } else { echo "btn-danger"; }; ?>" disabled>&nbsp;
								<span class="glyphicon <?php if($predial != "") { echo "glyphicon-ok"; } else { echo "glyphicon-remove"; }; ?>"></span>&nbsp;</button>
						</div>
					</div>
					<div class="col-md-2"> </div>
					
					<?php if($gestor == "Representante") { ?>
				<div class="col-md-12" id="moral"><br></div>
					
					<!-- Representante Legal -->
					<div class="col-md-2"> </div>
					<div class="col-md-8"><h4>- <b>Documentos Anexos: </b>(Representante Legal) -</h4></div>
					<div class="col-md-2"> </div>
					<div class="col-md-12"><br></div>
					
					<div class="col-md-2"> </div>
					<div class="col-md-4" style="text-align:center; background:#ddd; padding:8px; border-radius:10px 10px 10px 10px; -moz-border-radius:10px 10px 10px 10px; -webkit-border-radius:10px 10px 10px 10px">
						<h5 style="text-align:left"><b>&nbsp;Copia de Carta Poder:</b></h5>
						<div class="input-group">
							<span class="input-group-addon" id="sizing-addon2"><b>Archivo<br>a subir:</b></span>
							<input type="file" style="width:100%; padding-top:5px; padding-bottom:5px; padding-left:5px; padding-right:5px" name="cartapoder" <?php if($cartapoder != "") echo "disabled"; ?>>
							<button class="btn btn-sm btn-primary" type="submit" style="width:100%" value="Enviar" <?php if($cartapoder != "") echo "disabled"; ?>>Subir Carta Poder</button>
						</div>
						<?php
							$archivo = (isset($_FILES['cartapoder'])) ? $_FILES['cartapoder'] : null;
							$dir_archivo = "../archivos/{$foliou}/".$archivo['name'];
							if($dir_archivo!="../archivos/{$foliou}/"){
								$dir_archivo = "../archivos/{$foliou}/cpod.pdf";
								move_uploaded_file($archivo['tmp_name'], $dir_archivo);
								chmod($dir_archivo, 0777);
								$update = "UPDATE solicitud SET f_cartapoder ='cpod.pdf' WHERE folio={$foliou}";
								mysqli_query($conexion, $update);
								$mens = "SE HA ENVIADO EXITOSAMENTE SU ARCHIVO:\\n{$archivo['name']}";
								print "<script>alert('$mens')</script>";
								print('<meta http-equiv="refresh" content="0; url=#moral">');
							}
						?>
						<div class="input-group">
							<span class="input-group-addon" id="sizing-addon2"><b>Archivo<br>subido:</b></span>
							<input type="text" style="width:100%; padding-top:5px; padding-bottom:5px; padding-left:5px; padding-right:5px" disabled value="<?php echo ' '.$cartapoder; ?>">
							<button type="button" style="width:100%" class="btn <?php if($cartapoder != "") { echo "btn-success"; } else { echo "btn-danger"; }; ?>" disabled>&nbsp;
								<span class="glyphicon <?php if($cartapoder != "") { echo "glyphicon-ok"; } else { echo "glyphicon-remove"; }; ?>"></span>&nbsp;</button>
						</div>
					</div>
					<div style="text-align:center">&nbsp;</div>
					<div class="col-md-4" style="text-align:center; background:#ddd; padding:8px; border-radius:10px 10px 10px 10px; -moz-border-radius:10px 10px 10px 10px; -webkit-border-radius:10px 10px 10px 10px">
						<h5 style="text-align:left"><b>&nbsp;Copia de Acta Constitutiva:</b></h5>
						<div class="input-group">
							<span class="input-group-addon" id="sizing-addon2"><b>Archivo<br>a subir:</b></span>
							<input type="file" style="width:100%; padding-top:5px; padding-bottom:5px; padding-left:5px; padding-right:5px" name="actacons" <?php if($actacons != "") echo "disabled"; ?>>
							<button class="btn btn-sm btn-primary" type="submit" style="width:100%" value="Enviar" <?php if($actacons != "") echo "disabled"; ?>>Subir Acta Constitutiva</button>
						</div>
						<?php
							$archivo = (isset($_FILES['actacons'])) ? $_FILES['actacons'] : null;
							$dir_archivo = "../archivos/{$foliou}/".$archivo['name'];
							if($dir_archivo!="../archivos/{$foliou}/"){
								$dir_archivo = "../archivos/{$foliou}/acta.pdf";
								move_uploaded_file($archivo['tmp_name'], $dir_archivo);
								chmod($dir_archivo, 0777);
								$update = "UPDATE solicitud SET f_actaconstitutiva ='acta.pdf' WHERE folio={$foliou}";
								mysqli_query($conexion, $update);
								$mens = "SE HA ENVIADO EXITOSAMENTE SU ARCHIVO:\\n{$archivo['name']}";
								print "<script>alert('$mens')</script>";
								print('<meta http-equiv="refresh" content="0; url=#moral">');
							}
						?>
						<div class="input-group">
							<span class="input-group-addon" id="sizing-addon2"><b>Archivo<br>subido:</b></span>
							<input type="text" style="width:100%; padding-top:5px; padding-bottom:5px; padding-left:5px; padding-right:5px" disabled value="<?php echo ' '.$actacons; ?>">
							<button type="button" style="width:100%" class="btn <?php if($actacons != "") { echo "btn-success"; } else { echo "btn-danger"; }; ?>" disabled>&nbsp;
								<span class="glyphicon <?php if($actacons != "") { echo "glyphicon-ok"; } else { echo "glyphicon-remove"; }; ?>"></span>&nbsp;</button>
						</div>
					</div>
					<div class="col-md-2"> </div>
					<?php } ?>
					
				<div class="col-md-12" id="urbano"><br></div>
					
					<!-- Desarrollo Urbano -->
					<div class="col-md-2"> </div>
					<div class="col-md-8"><h4>- <b>Documentos Anexos: </b>(Desarrollo Urbano) -</h4></div>
					<div class="col-md-2"> </div>
					<div class="col-md-12"><br></div>
					
					<div class="col-md-2"> </div>
					<div class="col-md-4" style="text-align:center; background:#ddd; padding:8px; border-radius:10px 10px 10px 10px; -moz-border-radius:10px 10px 10px 10px; -webkit-border-radius:10px 10px 10px 10px">
						<h5 style="text-align:left"><b>&nbsp;Copia de Pago SARE:</b></h5>
						<div class="input-group">
							<span class="input-group-addon" id="sizing-addon2"><b>Archivo<br>a subir:</b></span>
							<input type="file" style="width:100%; padding-top:5px; padding-bottom:5px; padding-left:5px; padding-right:5px" name="pagosare" <?php if($pagosare != "") echo "disabled"; ?>>
							<button class="btn btn-sm btn-primary" type="submit" style="width:100%" value="Enviar" <?php if($pagosare != "") echo "disabled"; ?>>Subir Pago SARE</button>
						</div>
						<?php
							$archivo = (isset($_FILES['pagosare'])) ? $_FILES['pagosare'] : null;
							$dir_archivo = "../archivos/{$foliou}/".$archivo['name'];
							if($dir_archivo!="../archivos/{$foliou}/"){
								$dir_archivo = "../archivos/{$foliou}/sare.pdf";
								move_uploaded_file($archivo['tmp_name'], $dir_archivo);
								chmod($dir_archivo, 0777);
								$update = "UPDATE solicitud SET f_pagosare ='sare.pdf' WHERE folio={$foliou}";
								mysqli_query($conexion, $update);
								$mens = "SE HA ENVIADO EXITOSAMENTE SU ARCHIVO:\\n{$archivo['name']}";
								print "<script>alert('$mens')</script>";
								print('<meta http-equiv="refresh" content="0; url=#urbano">');
							}
						?>
						<div class="input-group">
							<span class="input-group-addon" id="sizing-addon2"><b>Archivo<br>subido:</b></span>
							<input type="text" style="width:100%; padding-top:5px; padding-bottom:5px; padding-left:5px; padding-right:5px" disabled value="<?php echo ' '.$pagosare; ?>">
							<button type="button" style="width:100%" class="btn <?php if($pagosare != "") { echo "btn-success"; } else { echo "btn-danger"; }; ?>" disabled>&nbsp;
								<span class="glyphicon <?php if($pagosare != "") { echo "glyphicon-ok"; } else { echo "glyphicon-remove"; }; ?>"></span>&nbsp;</button>
						</div>
					</div>
					<div style="text-align:center">&nbsp;</div>
					<div class="col-md-4" style="text-align:center; background:#ddd; padding:8px; border-radius:10px 10px 10px 10px; -moz-border-radius:10px 10px 10px 10px; -webkit-border-radius:10px 10px 10px 10px">
						<h5 style="text-align:left"><b>&nbsp;Copia de Uso de Suelo:</b></h5>
						<div class="input-group">
							<span class="input-group-addon" id="sizing-addon2"><b>Archivo<br>a subir:</b></span>
							<input type="file" style="width:100%; padding-top:5px; padding-bottom:5px; padding-left:5px; padding-right:5px" name="usosuelo" <?php if($usosuelo != "") echo "disabled"; ?>>
							<button class="btn btn-sm btn-primary" type="submit" style="width:100%" value="Enviar" <?php if($usosuelo != "") echo "disabled"; ?>>Subir Uso de Suelo</button>
						</div>
						<?php
							$archivo = (isset($_FILES['usosuelo'])) ? $_FILES['usosuelo'] : null;
							$dir_archivo = "../archivos/{$foliou}/".$archivo['name'];
							if($dir_archivo!="../archivos/{$foliou}/"){
								$dir_archivo = "../archivos/{$foliou}/uso.pdf";
								move_uploaded_file($archivo['tmp_name'], $dir_archivo);
								chmod($dir_archivo, 0777);
								$update = "UPDATE solicitud SET f_usosuelo ='uso.pdf' WHERE folio={$foliou}";
								mysqli_query($conexion, $update);
								$mens = "SE HA ENVIADO EXITOSAMENTE SU ARCHIVO:\\n{$archivo['name']}";
								print "<script>alert('$mens')</script>";
								print('<meta http-equiv="refresh" content="0; url=#urbano">');
							};
						?>
						<div class="input-group">
							<span class="input-group-addon" id="sizing-addon2"><b>Archivo<br>subido:</b></span>
							<input type="text" style="width:100%; padding-top:5px; padding-bottom:5px; padding-left:5px; padding-right:5px" disabled value="<?php echo ' '.$usosuelo; ?>">
							<button type="button" style="width:100%" class="btn <?php if($usosuelo != "") { echo "btn-success"; } else { echo "btn-danger"; }; ?>" disabled>&nbsp;
								<span class="glyphicon <?php if($usosuelo != "") { echo "glyphicon-ok"; } else { echo "glyphicon-remove"; }; ?>"></span>&nbsp;</button>
						</div>
					</div>
					<div class="col-md-2"> </div>
					
					<!-- Botón Finalizar -->
					<div class="col-md-4"> </div>
					<div class="col-md-4"><br><a href="final.php?folio=<?php echo $foliou; ?>" class="btn btn-primary" style="width:100%">Finalizar</a></div>
					<div class="col-md-4"> </div>
				</div><!-- panel-body -->
			</form>
