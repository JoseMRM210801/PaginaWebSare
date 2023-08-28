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
	<title>Consultar trámites</title>
	<link rel="stylesheet" href="../css/fileinput.css">
	<script src="../js/fileinput.min.js" type="text/javascript"></script>
<?php include("../comun/-admins-.html"); ?>
	<script>
		function viewdata() {
			var folio = $("#folio").val();
			var estatus = $("#estatus").val();
			$.ajax({
			type: "GET",
			data:{tipofolio:folio,tipoestatus:estatus},
			url: "administrador1.php"
			}).done(function( data ) {
			$('#viewdata').html(data);
			});
		}

		function updatedata(str) {
			var id = str;
			var n = $('#n'+str).val();
			var t = $('#t'+str).val();
			var e = $('#e'+str).val();
			var c = $('#c'+str).val();
			var em = $('#em'+str).val();
			var cn = $('#cn'+str).val();
			var m = $('#m'+str).val();
			var ic = $('#ic'+str).val();
			var ico = $('#ico'+str).val();
			var g = $('#g'+str).val();
			var es = $('#es'+str).val();
			var sp = $('#sp'+str).val();
			var so = $('#so'+str).val();
			var caj = $('#caj'+str).val();
			var ne = $('#ne'+str).val();
			var si = $('#si'+str).val();
			var an = $('#an'+str).val();
			var ed = $('#ed'+str).val();
			var ap = $('#ap'+str).val();
			var as = $('#as'+str).val();
			var st = $('#st'+str).val();
			
			var datas="n="+n+"&t="+t+"&e="+e+"&c="+c+"&em="+em+"&cn="+cn+"&m="+m+"&ic="+ic+"&ico="+ico+"&g="+g+"&es="+es+"&sp="+sp+"&so="+so+"&caj="+caj+"&ne="+ne+"&si="+si+"&an="+an+"&ed="+ed+"&ap="+ap+"&as="+as+"&st="+st;
			
			$.ajax({
			   type: "POST",
			   url: "updatedata.php?id="+id,
			   data: datas
			}).done(function( data ) {
			  $('#info').html(data);
			  viewdata();
			});
		}
	</script>
	<style type="text/css">
		.bg0 { background:#C0C0C0; /*gris*/	}
		.bg1 { background:#FFC0C0; /*rojo*/	}
		.bg2 { background:#FFFFC0; /*amar*/	}
		.bg3 { background:#C0FFC0; /*verd*/	}
		.bg0, .bg1, .bg2, .bg3 {
			bordercolor:#FFFFFF;
			color:#000;
		}
	</style>
</head>
<body background="../images/fondomoroleon.png">
	<div class="container">
		<div class="panel panel-default">
		<!-- Start Header -->
<?php include("../comun/-header-.html"); ?>
		<!-- Finish Header -->
		
		<!-- Start Body -->
			<!-- Start Form -->
				<div class="panel-body" id="conten" style="display:none">
					<div class="col-md-2"> </div>
					<div class="col-md-8">
						<h3 style="text-align:center"><b>CONSULTAR SOLICITUD(ES)</b></h3><hr><br>
					</div>
					<div class="col-md-2"> </div>
					
				<div class="col-md-12"> </div>
					
					<div class="col-md-2"><h4><b>Buscar por:</b></h4></div>
					<div class="col-md-3">
						<div class="input-group">
							<span class="input-group-addon" id="sizing-addon2"><span class="glyphicon glyphicon-list-alt"></span> Folio: &nbsp;</span>	
							<input type="number" name="folio" class="form-control" id="folio">
							<!--<input type="date" name="calendario" id="calendario" class="form-control fechas" placeholder="" aria-describedby="sizing-addon2">-->
						</div>
					</div>
					<div class="col-md-4">
						<div class="input-group">
							<span class="input-group-addon" id="sizing-addon2"><span class="glyphicon glyphicon-tasks"></span> Estatus:</span>
							<select class="form-control" id="estatus" name="estatus">
								<option value=""> Seleccionar estatus. </option>
								<option value="Pendiente"> Pendiente </option>
								<option value="Finalizado"> Finalizado </option>
								<option value="Cancelado"> Cancelado </option>
							</select>
						</div>
					</div>
					<div class="col-md-3">
						<input type="submit" class="btn btn-primary" style="width:100%" name="Submit" value="Ver Solicitud(es)" onClick="viewdata()">
					</div>
					
				<div class="col-md-12"><br></div>
					
					<div id="viewdata" style="background:#FFFFFF; align-content:center"><?php	echo '
						<div class="col-md-12"><br><br><br></div>'; ?></div>
				</div><!-- panel-body -->
			<!-- Finish	Form -->
		<!-- Finish Body -->
		
		<!-- Start Stripper -->
<?php include("../comun/-stripp-.html"); ?>
		<!-- Finish Stripper -->
		</div><!-- panel-default -->
	</div><!-- container -->
</body>
</html>
<?php	} ?>