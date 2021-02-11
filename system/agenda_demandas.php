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
<input type="hidden" name="fileABM" value="<?echo _FILE_PHP_ABM_DEM?>">
<input type="hidden" name="nomVentana" value="<?echo $nomVentana?>">
<input type="hidden" name="mod_tip" value="<?echo $mod_tip?>">
<input type="hidden" name="dem_id" value="<?echo $dem_id?>">

  <table width="100%" border="0" cellspacing="0" cellpadding="0">
    <tr >
      <td colspan="2"><h1>&nbsp;</h1></td>
    </tr>
    <tr >
      <td colspan="2">
<?php

	if($mod_tip=="edit"){
		$fileXML=_FILE_XML_DEMANDAS;
		$fileXSL=_FILE_XSL_DEMANDAS;
	}

	if(isset($fileXML) && isset($fileXSL)){
		
		$new_xsl = new MM_XSLTransform();
		$new_xsl->addParameter(demandas_mensajes,_FILE_PHP_ABM_MENS_DEM);
		$new_xsl->setXML($fileXML."?mod_tip=$mod_tip&dem_id=$dem_id");
		$new_xsl->setXSL($fileXSL);
		$new_xsl->addParameter("mod_tip",$mod_tip);
		echo $new_xsl->Transform();
	}
?></td>
    </tr>
  </table>

<br />
<br />
<!--TOOLTIP-->
<div id="toolTipBox">
<iframe id="iframeToolTip" name="iframeToolTip" src="about:blank" scrolling="no" frameborder="0" style="margin:0px; padding:0px; border:none;" ></iframe>
</div>
<!--FIN TOOLTIP-->
</body>
</html>