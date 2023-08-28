<!DOCTYPE html>
<html lang="es-MX">
<head>
	<title>Buscar giro(s)</title>
<?php include("../comun/-inkmet-.html"); ?>
	<script>
		function viewdata(){
			var giro = $("#giro").val();
			$.ajax({
				type:"GET",
				data:{tipogiro:giro},
				url:"buscagiros1.php"
			}).done(function(data){
				$('#viewdata').html(data);
			});
		}
	</script>
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
						<h3><b>BUSCAR GIRO(S)</b></h3><hr><br>
					</div>
					<div class="col-md-2"> </div>
					
				<div class="col-md-12"> </div>
					
					<div class="col-md-2"> </div>
					<div class="col-md-2"><h4 style="text-align:left"><b>Buscar por:</b></h4></div>
					<div class="col-md-4">
						<div class="input-group">
							<span class="input-group-addon" id="sizing-addon2"><span class="glyphicon glyphicon-list-alt"></span> Giro:</span>
							<input type="text" name="giro" class="form-control" id="giro">
							<!--<input type="date" name="calendario" id="calendario" class="form-control fechas" placeholder="" aria-describedby="sizing-addon2">-->
						</div>
					</div>
					<div class="col-md-2">
						<input type="submit" class="btn btn-primary" style="width:100%" name="Submit" value="Ver Giro(s)" onClick="viewdata()">
					</div>
					<div class="col-md-2"> </div>
					
				<div class="col-md-12"><br></div>
					
					<div id="viewdata" style="background:#FFFFFF; align-content:center"><?php 	echo '
						<div class="col-md-12"><br></div>
					<!-- Botones Listados/Descargar -->
					<div class="col-md-4"> </div>
					<div class="col-md-4"><br>
						<a href="listagiros.php" class="btn btn-primary" style="width:49%">Listados</a>
						<a href="descargar.php" class="btn btn-primary" style="width:49%">Descargar</a>
					</div>'; ?></div>
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