<!DOCTYPE html>
<html lang="es-MX">
<head>
	<title>Consultar trámite</title>
<?php include("../comun/-inkmet-.html"); ?>
	<script>
		function viewdata(){
			var folio = $("#folio").val();
			$.ajax({
				type:"GET",
				data:{tipofolio:folio},
				url:"consfolio1.php"
			}).done(function(data){
				$('#viewdata').html(data);
			});
		}
	</script>
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
						<h3><b>CONSULTAR TRAMITE</b></h3><hr><br>
					</div>
					<div class="col-md-2"> </div>
					
				<div class="col-md-12"> </div>
					
					<div class="col-md-2"> </div>
					<div class="col-md-2"><h4 style="text-align:left"><b>Buscar por:</b></h4></div>
					<div class="col-md-3">
						<div class="input-group">
							<span class="input-group-addon" id="sizing-addon2"><span class="glyphicon glyphicon-list-alt"></span> Folio: &nbsp;</span>
							<input type="number" name="folio" class="form-control" id="folio">
							<!--<input type="date" name="calendario" id="calendario" class="form-control fechas" placeholder="" aria-describedby="sizing-addon2">-->
						</div>
					</div>
					<div class="col-md-1"> </div>
					<div class="col-md-2">
						<input type="submit" class="btn btn-primary" style="width:100%" name="Submit" value="Ver Trámite" onClick="viewdata()">
					</div>
					<div class="col-md-2"> </div>
					
				<div class="col-md-12"><br></div>
					
					<div id="viewdata" style="background:#FFFFFF; align-content:center"><?php	echo '
						<div class="col-md-12"><br></div>
					<!-- Botón Trámite -->
					<div class="col-md-4"> </div>
					<div class="col-md-4"><br>
						<a href="privacidad.html" class="btn btn-primary" style="width:100%">Realizar trámite</a>
						<!-- <a href="" class="btn btn-primary" style="width:100%">Segundo Botón</a> -->
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