			<form method="post" action="guardasol.php" onsubmit="return checkCheckBox(this)" enctype="multipart/form-data">
				<div class="panel-body" id="conten" style="display:none">
					<div class="col-md-2"> </div>
					<div class="col-md-8">
						<h3 style="text-align:center"><b>REALIZAR TRAMITE</b></h3><hr><br>
						<h5 style="text-align:right; color:#FF8800"><span class="glyphicon glyphicon-exclamation-sign"></span><i> Todos los campos son requeridos</i></h5>
					</div>
					<div class="col-md-2"> </div>
					
				<div class="col-md-12"> </div>
					
					<!-- Solicitante -->
					<div class="col-md-2"> </div>
					<div class="col-md-8"><h4>- Datos generales del solicitante -</h4></div>
					<div class="col-md-2"> </div>
					<div class="col-md-12"> </div>
					<div class="col-md-2"> </div>
					<div class="col-md-3">
						<div class="input-group">
							<span class="input-group-addon" id="sizing-addon2"><span class="glyphicon glyphicon-exclamation-sign"></span> Fecha: &nbsp; &nbsp;</span>
							<input type="date" name="fecha" id="fecha" class="form-control fechas" value="<?php echo date("Y-m-d"); ?>" required>
						</div>
					</div>
					<div class="col-md-1"> </div>
					<div class="col-md-4">
						<div class="input-group">
							<span class="input-group-addon" id="sizing-addon2"><span class="glyphicon glyphicon-exclamation-sign"></span> Gestor:&nbsp; &nbsp;</span>
							<select name="optempresa" id="optempresa" class="form-control" required>
								<option value="">Selecciona un gestor.</option>
								<option value="Propietario">Propietario</option>
								<option value="Arrendatario">Arrendatario</option>
								<option value="Representante">Representante</option>
							</select>
						</div>
					</div>
					<div class="col-md-2"> </div>
					<div class="col-md-12"> </div>
					<div class="col-md-2"> </div>
					<div class="col-md-5">
						<div class="input-group">
							<span class="input-group-addon" id="sizing-addon2"><span class="glyphicon glyphicon-exclamation-sign"></span> Nombre:&nbsp;</span>
							<input name="rsocial" id="rsocial" type="text" class="form-control" maxlength="45" required>
						</div>
					</div>
					<div class="col-md-3">
						<div class="input-group">
							<span class="input-group-addon" id="sizing-addon2"><span class="glyphicon glyphicon-exclamation-sign"></span> Teléfono: </span>
							<input name="tel" id="tel" type="tel" class="form-control" maxlength="10" required>
						</div>
					</div>
					<div class="col-md-2"> </div>
					
				<div class="col-md-12"><br></div>
					
					<!-- Domicilio -->
					<div class="col-md-2"> </div>
					<div class="col-md-8"><h4>- Domicilio para recibir notificaciones -</h4></div>
					<div class="col-md-2"> </div>
					<div class="col-md-12"> </div>
					<div class="col-md-2"> </div>
					<div class="col-md-4">
						<div class="input-group">
							<span class="input-group-addon" id="sizing-addon2"><span class="glyphicon glyphicon-exclamation-sign"></span> Calle y N°: </span>
							<input name="calle" id="calle" type="text" class="form-control" maxlength="30" required>
						</div>
					</div>
					<div class="col-md-4">
						<div class="input-group">
							<span class="input-group-addon" id="sizing-addon2"><span class="glyphicon glyphicon-exclamation-sign"></span> Colonia: &nbsp; &nbsp;</span>
							<input name="col" id="col" type="text" class="form-control" maxlength="30" required>
						</div>
					</div>
					<div class="col-md-2"> </div>
					<div class="col-md-12"> </div>
					<div class="col-md-2"> </div>
					<div class="col-md-4">
						<div class="input-group">
							<span class="input-group-addon" id="sizing-addon2"><span class="glyphicon glyphicon-exclamation-sign"></span> Municipio:&nbsp;</span>
							<input name="mpio" id="mpio" type="text" class="form-control" maxlength="20" required>
						</div>
					</div>
					<div class="col-md-4">
						<div class="input-group">
							<span class="input-group-addon" id="sizing-addon2"><span class="glyphicon glyphicon-exclamation-sign"></span> Correo-e: &nbsp;</span>
							<input name="email" id="email" type="email" class="form-control" maxlength="40" required>
						</div>
					</div>
					<div class="col-md-2"> </div>
					
				<div class="col-md-12"><br></div>
					
					<!-- Ubicación -->
					<div class="col-md-2"> </div>
					<div class="col-md-8"><h4>- Ubicación del inmueble -</h4></div>
					<div class="col-md-2"> </div>
					<div class="col-md-12"> </div>
					<div class="col-md-2"> </div>
					<div class="col-md-4">
						<div class="input-group">
							<span class="input-group-addon" id="sizing-addon2"><span class="glyphicon glyphicon-exclamation-sign"></span> Calle y N°: </span>
							<input name="calleinmueble" id="calleinmueble" type="text" class="form-control" maxlength="30" required>
						</div>
					</div>
					<div class="col-md-4">
						<div class="input-group">
							<span class="input-group-addon" id="sizing-addon2"><span class="glyphicon glyphicon-exclamation-sign"></span> Colonia: &nbsp; &nbsp;</span>
							<input name="colinmueble" id="colinmueble" type="text" class="form-control" maxlength="30" required>
						</div>
					</div>
					<div class="col-md-2"> </div>
					
				<div class="col-md-12"><br></div>
					
					<!-- Permisos -->
					<div class="col-md-2"> </div>
					<div class="col-md-8"><h4>- Permiso de uso de suelo y constancia de factibilidad -</h4></div>
					<div class="col-md-2"> </div>
					<div class="col-md-12"> </div>
					<div class="col-md-2"> </div>
					<div class="col-md-8">
						<div class="input-group">
							<span class="input-group-addon" id="sizing-addon2"><span class="glyphicon glyphicon-exclamation-sign"></span> Giro solicitado: </span>
							<select name="giro" id="giro" class="form-control" required>
								<option value="">Selecciona un giro.</option>
								<?php
									include "conexion.php";
									include "../conexion.php";
									$sql = "Select * from listgiros";
									$res = mysqli_query($conexion, $sql);
									if($res){
										while ($fila = mysqli_fetch_assoc($res)) {
											echo "<option value='$fila[id_giro]'> $fila[codigo] - $fila[giro] </option>";
										};
									};
								?>
							</select>
						</div>
					</div>
					<div class="col-md-2"> </div>
					<div class="col-md-12"> </div>
					<div class="col-md-2"> </div>
					<div class="col-md-5">
						<div class="input-group">
							<span class="input-group-addon" id="sizing-addon2"><span class="glyphicon glyphicon-exclamation-sign"></span> Establecimiento: </span>
							<select name="optest" id="optest" class="form-control" required>
								<option value=""                           >Selecciona un estado.</option>
								<option value="Construido y no funcionando">Construido y no funcionando</option>
								<option value="Construido y funcionando"   > Construido y funcionando </option>
							</select>
						</div>
					</div>
					<div class="col-md-3">
						<div class="input-group">
							<span class="input-group-addon" id="sizing-addon2"><span class="glyphicon glyphicon-exclamation-sign"></span> N° estacionamientos: </span>
							<input type="number" name="cajones" id="cajones" class="form-control" min="0" maxlength="2" required>
						</div>
					</div>
					<div class="col-md-2"> </div>
					<div class="col-md-12"> </div>
					<div class="col-md-2"> </div>
					<div class="col-md-4">
						<div class="input-group">
							<span class="input-group-addon" id="sizing-addon2"><span class="glyphicon glyphicon-exclamation-sign"></span> Superficie total (m²): </span>
							<input type="number" name="suppredio" id="suppredio" class="form-control" min="1" maxlength="4" required>
						</div>
					</div>
					<div class="col-md-4">
						<div class="input-group">
							<span class="input-group-addon" id="sizing-addon2"><span class="glyphicon glyphicon-exclamation-sign"></span> Superficie ocupar (m²): </span>
							<input type="number" name="supocupar" id="supocupar" class="form-control" min="1" maxlength="3" required>
						</div>
					</div>
					<div class="col-md-2"> </div>
					<div class="col-md-12"><br></div>
					<div class="col-md-2"> </div>
					<div class="col-md-4">
						<div class="input-group">
							<span class="input-group-addon" id="sizing-addon2"><span class="glyphicon glyphicon-exclamation-sign"></span> Número de empleados: </span>
							<input type="number" name="nemp" id="nemp" class="form-control" min="1" maxlength="2" required>
						</div>
					</div>
					<div class="col-md-4">
						<div class="input-group">
							<span class="input-group-addon" id="sizing-addon2"><span class="glyphicon glyphicon-exclamation-sign"></span> Monto de inversión ($): </span>
							<input type="number" name="inversion" id="inversion" class="form-control" min="0" maxlength="6" required>
						</div>
					</div>
					<div class="col-md-2"> </div>
					<div class="col-md-12"> </div>
					<div class="col-md-2"> </div>
					<div class="col-md-4">
						<div class="input-group">
							<span class="input-group-addon" id="sizing-addon2"><span class="glyphicon glyphicon-exclamation-sign"></span> Antigüedad est. (años): </span>
							<input type="number" name="antiguedad" id="antigueddad" class="form-control" min="0" maxlength="2" required>
						</div>
					</div>
					<div class="col-md-4">
						<div class="input-group">
							<span class="input-group-addon" id="sizing-addon2"><span class="glyphicon glyphicon-exclamation-sign"></span> Edad solicitante (años): </span>
							<input type="number" name="edad" id="edad" class="form-control" min="18" maxlength="2" required>
						</div>
					</div>
					<div class="col-md-2"> </div>
					<div class="col-md-12"> </div>
					<div class="col-md-2"> </div>
					<div class="col-md-4">
						<div class="input-group">
							<span class="input-group-addon" id="sizing-addon2"><span class="glyphicon glyphicon-exclamation-sign"></span> Agua potable y alcantarillado: </span>
							<div class="form-control" style="text-align:center">
								<span><input type="radio" name="opservicios" value="Si"> Si </span>&nbsp;&nbsp;&nbsp;
								<span><input type="radio" name="opservicios" value="No"> No </span>
							</div>
						</div>
					</div>
					<div class="col-md-4">
						<div class="input-group">
							<span class="input-group-addon" id="sizing-addon2"></span>
							<div class="form-control" style="text-align:center"></div>
						</div>
					</div>
					<div class="col-md-2"> </div>
					
					<!-- Botones Continuar/Cancelar -->
					<div class="col-md-4"> </div>
					<div class="col-md-4"><br>
						<button class="btn btn-primary" type="submit" style="width:49%" name="enviar" value="Enviar">Continuar</button>
						<a href="<?php echo $pagina; ?>" class="btn btn-primary" style="width:49%" name="cancel" value="Cancelar">Cancelar</a>
					</div>
					<div class="col-md-4"> </div>
				</div><!-- panel-body -->
			</form>
