<?php 
	extract($_GET);
	extract ($_POST);
	extract ($_REQUEST);
include ("include/funciones/config.php");

// nombre de la session
//@session_name($session_name);
//Inicio la sesión 
@session_start();

@session_destroy(); 

	$referencia_dir = $_REQUEST["dir_sistema"];
	
	 // desde donde estoy hacia donde voy
	if ($referencia_dir == "admin") 
		$pag_login = $pag_admin_ingreso;
	else 	$pag_login = $referencia_dir."/".$pag_login;

?> 
<html> 
<head> 
<title>Secci&oacute;n cerrada correctamente</title> 
<META HTTP-EQUIV="refresh" content="1;URL=<?php echo $pag_login; ?>">
<link href="css/general.css" rel="stylesheet" type="text/css">
</head> 
<body> 
<div align="center">
  <h3><br>
    <br>
    <br>
    <br>
  Secci&oacute;n cerrada correctamente<br> 
  <br>
  <br>
  <br> 
  <a href="<?php echo $pag_login; ?>" >Ingresar nuevamente </a></h3>
</div>
</body> 
</html>