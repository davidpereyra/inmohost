<?php
	extract($_GET);
	extract ($_POST);
	extract ($_REQUEST);

	include ($rutaSystema._FILE_PHP_VARIAS_FUN);
	include ($rutaSystema._FILE_PHP_LOG);

	echo "<link rel=\"shortcut icon\" href=\"".$rutaAbsoluta."interfaz/inmohost/images/icono.ico\">\n";

	
echo "
<script language='javascript' type='text/javascript'>
	var _USR_ID = '"._USR_ID."';
	var _USR_RAZ = '"._USR_RAZ."';
	var _USR_CIM = '"._USR_CIM."';
	var _USR_CCPIM = '"._USR_CCPIM."';
	var fileGenericoHtml = '"._FILE_HTML_GENERICO."';
	var rutaAbsoluta='".$rutaAbsoluta."';
	var rutaAbsolutaFichaFoto='".$rutaAbsolutaFichaFoto."';
	var rutaSystema='".$rutaSystema."';
	var rutaInterfaz='".$rutaInterfaz."';
	var rutaSystemAbs='".$rutaSystemAbs."';
	var fileActualizador = '"._FILE_PHP_ACTUALIZADOR."';
	var _now = '"._NOW."';
	var fileResumenPrincipal='"._FILE_PHP_RESUMEN_PRINCIPAL."';
	
</script>";

			// vamos a incluir a prototype ne todos lados

echo "<script type=\"text/javascript\" src=\"".$rutaSystema."javascript/windows/prototype.js\"></script>";			

echo "<SCRIPT>
		
//window.onerror = myOnError;

function myOnError(msg, file, linea) {
	return true;
	var myAjax = new Ajax.Request(
				\"".$rutaSystema._FILE_PHP_LOG."\", 
				{
					method: 'get', 
					parameters: \"error=javascript&texto=\"+msg+\"&archivo=\"+file+\"&linea=\"+linea+\"\"
				});
}
</SCRIPT>";


if (strpos($_SERVER['PHP_SELF'], "inmohost.php") != false ){
echo "
	<!--INICIO VENTANAS-->
<script language='javascript' type='text/javascript'>
	// variables globales de efectos de ventanas
	var efecto1 = '".$_EFECTO_1."';
	var efecto2 = '".$_EFECTO_2."';
</script>

	<script type=\"text/javascript\" src=\"".$rutaSystema."javascript/windows/window.js\"></script>
	<script type=\"text/javascript\" src=\"".$rutaSystema."javascript/windows/effects.js\"></script>
	<script type=\"text/javascript\" src=\"".$rutaSystema."javascript/windows/manejador.js\"></script>

	<link href=\"".$rutaInterfaz.$classTemplate."/window.css\" rel=\"stylesheet\" type=\"text/css\" />
	<link href=\"".$rutaInterfaz.$classTemplate."/neutra.css\" rel=\"stylesheet\" type=\"text/css\" />
	<link href=\"".$rutaInterfaz.$classTemplate."/alert.css\" rel=\"stylesheet\" type=\"text/css\" />
	<!--FIN VENTANAS-->\n";
	
	if (FUNC_brouserUsr() == "MSIE"){
	echo"
		<link href=\"".$rutaInterfaz.$classTemplate."/window_ie.css\" rel=\"stylesheet\" type=\"text/css\" />
		<link href=\"".$rutaInterfaz.$classTemplate."/neutra_ie.css\" rel=\"stylesheet\" type=\"text/css\" />
		<link href=\"".$rutaInterfaz.$classTemplate."/alert_ie.css\" rel=\"stylesheet\" type=\"text/css\" />\n";
	}
}

	if(!isset($otraCSS)){
		echo "<link href=\"".$rutaInterfaz.$classTemplate."/css/style.css\" rel=\"stylesheet\" type=\"text/css\" />\n";
	} else {

		echo "<link href=\"".$rutaInterfaz.$classTemplate."/css/".$otraCSS."\" rel=\"stylesheet\" type=\"text/css\" media=\"screen\"/>\n";

		if(file_exists($rutaInterfaz.$classTemplate."/css/print_".$otraCSS))	echo "<link href=\"".$rutaInterfaz.$classTemplate."/css/print_".$otraCSS."\" rel=\"stylesheet\" type=\"text/css\" media=\"print\"/>\n";

	}
	
	echo "<!--INICIO GENERALES-->
	<script src=\"".$rutaSystema."javascript/comunes.js\" type=\"text/javascript\"></script>
	<script src=\"".$rutaSystema."javascript/ajax.js\" type=\"text/javascript\"></script>
	<script src=\"".$rutaSystema."javascript/formularios.js\" type=\"text/javascript\"></script>
	<script src=\""._FILE_JAVASCRIPT_ACTUALIZADOR."\" type=\"text/javascript\"></script>
	<!--FIN GENERALES-->\n";


if (FUNC_brouserUsr() == "MSIE"){

	if(strpos($_SERVER['PHP_SELF'], "inmohost.php") != false || strpos($_SERVER['PHP_SELF'], "index.php") != false || strpos($_SERVER['PHP_SELF'], "login.php") != false){// optimizar esta parte
		$parchePNG = $rutaSystema."extra/pngbehavior.htc";
	} else {
		$parchePNG = $rutaSystema."extra/pngbehavior2.htc";
	}
	
	echo "
	<style type=\"text/css\">
		img {
			/* corrigo el problema de IE 5.5 y 6 de los png trasparentes */
			behavior: url(\"$parchePNG\"); 
		}
	</style>\n";

	echo "<link href=\"".$rutaInterfaz.$classTemplate."/css/style_ie.css\" rel=\"stylesheet\" type=\"text/css\" />\n";
	
}
	
?>