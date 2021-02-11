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
<div style="position:relative;top:100px;">
<table width="100%" border="0" cellspacing="1" cellpadding="1" class="tableOscura">

	<tr class="tableClara"><td>&nbsp;</td>  </tr>
  
    <?php
	extract($_GET);
	extract($_POST);
    // Si hay que realizar alguna operacion y ya se ha editado la entidad
	// se ejecuta el abm del modulo
	if ($mod_tip)
	{
		include(_FILE_PHP_ABM_MEDIOS);
	}
	if ($errors)
	{
		for ($i=0; $i<count($errors);$i++)
		{
			
			echo "<tr class='tableClara><td  class='destacado2' align='center'>".$errors[$i]."</td></tr>";
		}
		
		echo "<tr class='tableClara'><td>
					<input type='button' class='botonForm' value='Cerrar' onclick=\"parent.Windows.close('edicionSimple');\">
					</td>
					<td>
					<input type='button' value='Volver' onclick=\"history.back();\">
					</td>
					
					</tr>";
	}
	?>

  <tr class="tableClara">
  <td>
  </td>

<?php
	// Se realizo la operacion con exito, se muestran los mensajes correspondientes
	if ($msg_exitos && !$errors)
	{	
		for ($i=0; $i<count($msg_exitos);$i++)
		{
			echo "<tr class='tableClara'><td align='center'>".$msg_exitos[$i]."</td></tr>";
		}
		$fecha2=split("-",$fecha);
		$dia=$fecha2[2];
		$mes=$fecha2[1];
		$ano=$fecha2[0];
		echo "<tr class='tableClara'><td align='center'><input type='button' class='botonForm' value='Aceptar' onclick=\"parent.Windows.close('edicionSimple');\"></td></tr>";
	}

?>
</table>
</div>
</body>
</html>