<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<?php
include "../conexion.php";

$n=utf8_decode($_POST['n']);
$t=utf8_decode($_POST['t']);
$e=utf8_decode($_POST['e']);
$c=utf8_decode($_POST['c']);
$em=utf8_decode($_POST['em']);
$cn=utf8_decode($_POST['cn']);
$m=utf8_decode($_POST['m']);
$ic=utf8_decode($_POST['ic']);
$ico=utf8_decode($_POST['ico']);
$g=utf8_decode($_POST['g']);
$es=utf8_decode($_POST['es']);
$sp=utf8_decode($_POST['sp']);
$so=utf8_decode($_POST['so']);
$caj=utf8_decode($_POST['caj']);
$ne=utf8_decode($_POST['ne']);
$si=utf8_decode($_POST['si']);
$an=utf8_decode($_POST['an']);
$ed=utf8_decode($_POST['ed']);
$ap=utf8_decode($_POST['ap']);
$as=utf8_decode($_POST['as']);
$st=utf8_decode($_POST['st']);

$id = $_GET['id']; 

//Creamos la sentencia SQL y la ejecutamos
$sSQL="Update solicitud Set rsocial='$n',tel='$t',est_gestor='$e',dp_calle='$c',email='$em',dp_col='$cn',dp_mpio='$m',im_calle='$ic',im_col='$ico',giro='$g',establecimiento='$es',sup_predio=$sp,sup_ocupar=$so,caj_est=$caj,n_emp=$ne,s_inversion=$si,antiguedad=$an,edad_sol=$ed,servicios='$ap',asunto='$as',estatus='$st' where folio=$id";
if(mysqli_query($conexion, $sSQL)){
	echo '<div class="alert alert-success alert-dismissible" role="alert">
  	 <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
 	 <span class="glyphicon glyphicon-ok" aria-hidden="true"></span>
	 <META HTTP-EQUIV="Refresh" CONTENT=0;URL=administrador.php >&nbsp;EL REGISTRO SE ACTUALIZO CORRECTAMENTE.</div>';
}else{
	echo $sSQL. "<br>";
}
?>