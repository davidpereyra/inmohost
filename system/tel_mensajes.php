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
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td>
    <?php
	extract($_GET);
	extract($_POST);
    // Si hay que realizar alguna operacion y ya se ha editado la entidad
	// se ejecuta el abm del modulo
	if ($mod_tip)
	{
		include(_FILE_PHP_ABM_TELS);
	}
	if ($errors)
	{
		for ($i=0; $i<count($errors);$i++)
		{
			echo "<tr><td  class='destacado2'>".$errors[$i]."</td></tr>";
		}
		if ($mod_tip=="add")
		{
			echo "<tr><td><input type='button' value='Volver' onclick=\"history.go(-1);\"></td></tr>";
		}
		else if ($mod_tip=="edit")		
		{
			echo "<tr><td><input type='button' value='Volver' onclick=\"history.go(-1);\"></td></tr>";
		}
		
	}
	?>
	</td>
  </tr>
  <tr>
  <td>
  </td>
 	<td>
<?php
	// Se realizo la operacion con exito, se muestran los mensajes correspondientes
	if ($msg_exitos && !$errors)
	{	
		for ($i=0; $i<count($msg_exitos);$i++)
		{
			echo "<tr><td>".$msg_exitos[$i]."</td></tr>";
		}
		if ($mod_tip=="add")
		{
			echo "<tr><td><input type='button' value='Aceptar' onclick=\"hideToolTip();\"></td></tr>";
		}
		else if ($mod_tip=="edit")		
		{
			echo "<tr><td><input type=\"button\" style=\"margin-right: 10px;\" value=\"Cerrar\" onclick=\"parent.Windows.close('edicionSimple');\" id=\"Cerrar\" class=\"botonForm\" name=\"Cerrar\"/></td></tr>";
		}
	}
?>	</td>
  </tr>
</table>
</body>
</html>