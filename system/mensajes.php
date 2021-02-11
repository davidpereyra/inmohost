<?php
	extract($_GET);
	extract ($_POST);
	extract ($_REQUEST);
	
	include ("php/config.php");
	include ("php/sec_head.php");
	//libreria de dreamwaeaver XLST para inclucion de archivos de XML con XSLT
	include(_FILE_XSL_CLASS);
	// cambio la hoja de estylos por defecto
	$otraCSS = "styleInterno.css";

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>INMOHOST</title>
<?php
	include("head.php");
?>
<script language="JavaScript1.2" type="text/javascript" src="<?php echo _FILE_JAVASCRIPT_AJAX; ?>"></script>

<!--MENUEXTRA-->
<script language="JavaScript1.2" type="text/javascript" src="<?php echo _FILE_JAVASCRIPT_MENUEXTRA; ?>"></script>
<?php echo "<style type=\"text/css\" media=\"screen\">
	@import url(\""._FILE_CSS_MENUEXTRA."\");
</style>\n"; ?>
<!--//MENUEXTRA-->
<script language="javascript" type="text/javascript" src="<?php echo _FILE_JAVASCRIPT_TOOLTIP; ?>"></script>
</head>
<body>
<script language="javascript">
	parent.ventana('agenda_resumen','', '<?php echo _FILE_PHP_RESUMEN_PRINCIPAL; ?>', 'Resumen de movimentos');
</script>
<div style="position:relative;top:100px;">
<table width="100%" border="0" cellspacing="1" cellpadding="1" class="tableOscura">
  

    <?php
	extract($_GET);
	extract($_POST);
    // Si hay que realizar alguna operacion y ya se ha editado la entidad
	// se ejecuta el abm del modulo
	//print "Nom ventana $nomVentana";

	if ($mod_tip)
	{
		include($fileABM);
		
	}
	if ($errors)
	{
		echo "<tr class='tableClara'><td align='center' colspan='2' class='destacado1'>".$errors."</td></tr>";
				
	}else{
		echo "<tr colspan='2' class='tableClara'><td align='center' colspan='2' class='destacado1'>$resultado</td></tr>";	
	}
	
	echo "<tr class='tableClara'>
					<td align='center' colspan='2'>
						<input type='button' value='Cerrar' class='botonForm' onclick=\"parent.Windows.close('$nomVentana');\">	
					</td> 
					<!--td align='left'>
					<input type='button' value='Volver' class='botonForm' onclick=\"this.history.back();\">
					
					</td-->
					
					</tr>";
	
	?>
</table>
</div>
</body>
</html>