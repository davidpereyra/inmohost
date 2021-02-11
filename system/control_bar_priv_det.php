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
<script language="javascript" type="text/javascript" src="<?php echo _FILE_JAVASCRIPT_SWF_OBJECT; ?>"></script>

<!--MENUEXTRA-->
<script language="JavaScript1.2" type="text/javascript" src="<?php echo _FILE_JAVASCRIPT_MENUEXTRA; ?>"></script>
<?php echo "<style type=\"text/css\" media=\"screen\">
	@import url(\""._FILE_CSS_MENUEXTRA."\");
</style>\n"; ?>
<!--//MENUEXTRA-->

<script language="javascript" type="text/javascript" src="<?php echo _FILE_JAVASCRIPT_TOOLTIP; ?>"></script>

<link rel="stylesheet" type="text/css" media="print" href="../interfaz/inmohost/css/styleInternoPrint.css" />

</head>
<?
if($imprimir){
?>
<body onload="focus();print();">
<?
}else{
	echo "<body>";
}
?>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td>
<?php
	

	$Item_xsl = new MM_XSLTransform();
	$Item_xsl->setXML(_FILE_XML_BAR_PRIV."?mod_tip=edit&bar_id=$bar_id");
	$Item_xsl->setXSL(_FILE_XSL_BAR_PRIV_DET);
	$Item_xsl->addParameter("bar_id", $bar_id);
	$Item_xsl->addParameter("usr_id", $usr_id);
	$Item_xsl->addParameter("mod_tip", "edit");
	$Item_xsl->addParameter("nomVentana", "bar_priv");
	$Item_xsl->addParameter("bar_id", "$bar_id");
	$Item_xsl->addParameter("fileEdit",_FILE_PHP_BAR_PRIV);
	$Item_xsl->addParameter("rutaAbsoluta",$rutaAbsoluta);
	$Item_xsl->addParameter("rutaSystem",$rutaSystemAbs);
	
	if($imprimir){
		$Item_xsl->addParameter("display", "none");
	}else{
		$Item_xsl->addParameter("display", "");
	}
		
	echo $Item_xsl->Transform();
?>	</td>
  </tr>
</table>
<!--TOOLTIP-->
<div id="toolTipBox">
<iframe id="iframeToolTip" name="iframeToolTip" src="about:blank" scrolling="no" frameborder="0" style="margin:0px; padding:0px; border:none;" ></iframe>
</div>
<!--FIN TOOLTIP-->
</body>
</html>