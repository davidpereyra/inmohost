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

<form id="agendaTasacionAgregar" name="agendaTasacionAgregar" method="post" action="<?php print _FILE_PHP_ABM_MENS_TAS;?>">
 <input type="hidden" name="fileABM" value="<?echo _FILE_PHP_ABM_TAS?>">
<input type="hidden" name="nomVentana" value="<?echo $nomVentana?>">
  <table width="100%" border="0" cellspacing="0" cellpadding="0">
    <tr >
      <td colspan="2">
<?php

	$fileXML = _FILE_XML_AGENDA_TAS_NEW;
	$fileXSL = _FILE_XSL_AGENDA_TAS_NEW;
	if(isset($fileXML) && isset($fileXSL)){
		$new_xsl = new MM_XSLTransform();
		$new_xsl->setXML($fileXML);
		$new_xsl->setXSL($fileXSL);
		$new_xsl->addParameter("usr_id", $usr_id);
		$new_xsl->addParameter("FILECALENDARIO", _FILE_PHP_MEN_CALENDARIO);
		$new_xsl->addParameter("ABMTAS", _FILE_PHP_ABM_MENS_TAS);
		$new_xsl->addParameter("tas_id", $tas_id);
		$new_xsl->addParameter("desdeTasaciones", $desdeTasaciones);
		$new_xsl->addParameter("desdeTasacionesDia", $desdeTasacionesDia);
		$new_xsl->addParameter("desdeTasacionesMes", $desdeTasacionesMes);
		$new_xsl->addParameter("desdeTasacionesAno", $desdeTasacionesAno);
		$new_xsl->addparameter("hastaTasaciones", $hastaTasaciones);
		$new_xsl->addparameter("hastaTasacionesDia", $hastaTasacionesDia);
		$new_xsl->addparameter("hastaTasacionesMes", $hastaTasacionesMes);
		$new_xsl->addparameter("hastaTasacionesAno", $hastaTasacionesAno);
		$new_xsl->addparameter("ventanaDesde", $ventanaDesde);
		$new_xsl->addparameter("fechaTasacion", date("Y-m-d"));
		$new_xsl->addparameter("fechaTasacionAno", date("Y-m-d"));
		$new_xsl->addparameter("fechaTasacionMes", date("m"));
		$new_xsl->addparameter("fechaTasacionDia", date("d"));
		$new_xsl->addparameter("nomVentana", $nomVentana);
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