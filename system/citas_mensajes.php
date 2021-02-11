<?php
	
	include ("php/config.php");
	include ("php/sec_head.php");
$usr_id=17;	
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
<script language="javascript" type="text/javascript" src="<?php echo _FILE_JAVASCRIPT_TOOLTIP; ?>"></script>
</head>
<body>
<script language="javascript">
	parent.parent.ventana('agenda_resumen','', '<?php echo _FILE_PHP_RESUMEN_PRINCIPAL; ?>', 'Resumen de movimentos');
</script>
<div id="nulo" >
<div align="center"><br/>
    <?php
	extract($_GET);
	extract($_POST);
	extract ($_REQUEST);
    // Si hay que realizar alguna operacion y ya se ha editado la entidad
	// se ejecuta el abm del modulo
	if ($mod_tip)
	{
		include(_FILE_CITAS_MEN_ABM);
		include(_FILE_PHP_ABM_CITAS);
	}
	if ($errors)
	{
		for ($i=0; $i<count($errors);$i++)
		{

			echo "".$errors[$i]."<br/>";
		}
		if($mod_tip=="edit"){
			echo "<br/><br/><input type='button' value='Volver' onclick='history.go(-1)' class='botonForm'>&nbsp;&nbsp;&nbsp;<input type='button' value='Cerrar' onclick=\"parent.Windows.close('edicionSimple');\" class='botonForm'><br/>";
		}else{
			echo "<br/><br/><input type='button' value='Volver' onclick='history.go(-1)' class='botonForm'>&nbsp;&nbsp;&nbsp;<input type='button' value='Cerrar' onclick='hideToolTip();' class='botonForm'><br/>";
		}
	}
	?>

<?php
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
		
		if ($mod_tip=="add" || $mod_tip=="add_int")
		{
			echo "<br/><br/><input class='botonForm' type='button' value='Aceptar' onclick=\"parent.hideToolTip();parent.parent.ventana('agenda_citas', '&mod_edit=1&dia=$dia&mes=$mes&ano=$ano&prp_id=$prp_id', './system/agenda_citas.php', 'Agregar Cita');\"><br/>";
		}
		else if ($mod_tip=="edit" && $ventanaDesde='agregarCitas')
		{
			echo "<br/><br/><input class='botonForm' type='button' value='Aceptar' onclick=\"parent.Windows.close('edicionSimple');parent.parent.ventana('agenda_citas', '&mod_edit=1&dia=$dia&mes=$mes&ano=$ano&prp_id=$prp_id', './system/agenda_citas.php', 'Agregar Cita'); \"><br/>";
		}
		else if ($mod_tip=="edit" && $ventanaDesde='listarCitas')
		{
			echo "<br/><br/><input class='botonForm' type='button' value='Aceptar' onclick=\"parent.Windows.close('edicionSimple');\"><br/>";
		}
	}
?>
</div>
</div>


</body>
</html>