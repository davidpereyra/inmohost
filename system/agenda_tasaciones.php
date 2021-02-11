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
<script language="javascript" type="text/javascript">
	var paginaCitasActual = "<?php echo $_SERVER['PHP_SELF']; ?>?usr_id=<?php echo $usr_id; ?>";
</script>
<script language="javascript" type="text/javascript" src="<?php echo _FILE_JAVASCRIPT_TOOLTIP; ?>"></script>
</head>
<body>

<form id="panelParametros" name="panelParametros" method="post" action="">
  <table width="100%" border="0" cellspacing="0" cellpadding="0">
    <tr >
      <td colspan="2"><h1>&nbsp;</h1></td>
    </tr>
    <tr >
      <td colspan="2">
<?php

	print $fileXML = _FILE_XML_AGENDA_CITAS;
	print $fileXSL = _FILE_XSL_AGENDA_CITAS;
	
	// pasar el dia o declarar en base a _NOW == HOY
	$trozo = formato_fecha(_NOW, "trozoFecha");
	if($dia =="") $dia = $trozo[2];
	if($mes =="") $mes = $trozo[1];
	if($ano =="") $ano = $trozo[0];
	if(isset($fileXML) && isset($fileXSL)){
		$new_xsl = new MM_XSLTransform();
		$new_xsl->setXML($fileXML."?prp_usr=".$prp_usr."&dia=".$dia."&mes=".$mes."&ano=".$ano."&usr_id=".$usr_id);
		$new_xsl->setXSL($fileXSL);
		$new_xsl->addParameter("fileCalendario", _FILE_PHP_MEN_CALENDARIO);
		$new_xsl->addParameter("fileAgendaCitasNew", _FILE_AGENDA_MEN_CITA_NEW);
		$new_xsl->addParameter("fileAgendaCitasEdit", _FILE_PHP_AGENDA_CITAS_EDIT);
		$new_xsl->addParameter("fileAgendaCitasInteresados", _FILE_AGENDA_MEN_CITA_INTERESADOS);
		$new_xsl->addParameter("fileAgendaCitasVerInt",_FILE_AGENDA_MEN_CITA_VER_INT);
		$new_xsl->addParameter("prp_id", $prp_id);
		$new_xsl->addParameter("usr_id", $usr_id);
		$new_xsl->addParameter("acc_internet", $internet);
		echo $new_xsl->Transform();
	}
?></td>
    </tr>
  </table>
</form>
<br />
<br />
<!--TOOLTIP-->
<div id="toolTipBox">
<iframe id="iframeToolTip" name="iframeToolTip" src="about:blank" scrolling="no" frameborder="0" style="margin:0px; padding:0px; border:none;" ></iframe>
</div>
<!--FIN TOOLTIP-->
</body>
</html>