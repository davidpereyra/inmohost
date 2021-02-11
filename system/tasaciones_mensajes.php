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
</head>
<body>
<script language="javascript">
	parent.ventana('agenda_resumen','', '<?php echo _FILE_PHP_RESUMEN_PRINCIPAL; ?>', 'Resumen de movimentos');
</script>
<div id="nulo">
	<div align="center">
	<br/><br/>
    <?php
	extract($_GET);
	extract($_POST);
    // Si hay que realizar alguna operacion y ya se ha editado la entidad
	// se ejecuta el abm del modulo
	if ($mod_tip)
	{
		//include(_FILE_TAS_MEN_ABM);
		include($fileABM);
	}
	if ($errors)
	{
		for ($i=0; $i<count($errors);$i++)
		{
			echo "".$errors[$i]."<br/>";
		}
		if($mod_tip=="edit"){
			echo "<br/><br/><input type='button' value='Cerrar' class='botonForm' onclick=\"parent.Windows.close('edicionSimple');\">";
		}else{
			echo "<br/><br/><input type='button' value='Volver' class='botonForm' onclick='window.history.back();'>";
		}
	}

	// Se realizo la operacion con exito, se muestran los mensajes correspondientes
	if ($msg_exitos && !$errors)
	{	
		for ($i=0; $i<count($msg_exitos);$i++)
		{
			echo "".$msg_exitos[$i]."<br/>";
		}
		$fecha2=split("-",$fecha);
		$dia=$fecha2[2];
		$mes=$fecha2[1];
		$ano=$fecha2[0];
			echo "<br/><br/><input type='button' value='Aceptar' onclick=\"parent.Windows.close('$nomVentana'); \">";


//			echo "<tr><td><input type='button' value='Aceptar' onclick=\"parent.Windows.close('edicionSimple');\"></td></tr>";
	}
?>


</div>
</div>

</body>
</html>