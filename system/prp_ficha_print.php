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
</head>
<body>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td>
<?php
	// Para que muestre los servicios
	$query=$_SERVER['QUERY_STRING']."&mod_tip=edit";
	$Item_xsl = new MM_XSLTransform();
	$Item_xsl->setXML(_FILE_XML_PRP_FICHA."?".$query);
	$Item_xsl->setXSL(_FILE_XSL_PRP_FICHA);
	$Item_xsl->addParameter("prp_fotosXML", _PROXY); //_FILE_XML_PRP_FOTOS."?prp_id=$prp_id&usr_id=$usr_id&mod_edit=$mod_edit");
	$Item_xsl->addParameter("mod_edit", $mod_edit);
	$Item_xsl->addParameter("prp_id", $prp_id);
	$Item_xsl->addParameter("mod_tip", $mod_tip);
	$Item_xsl->addParameter("usr_id", $usr_id);
	$Item_xsl->addParameter("fileFicha", _FILE_PHP_PRP_FICHA);
	$Item_xsl->addParameter("fileFichaEdit", _FILE_PHP_PRP_FICHA_EDIT);
	$Item_xsl->addParameter("fileFichaEstado", _FILE_PHP_PRP_LISTADO);
	$Item_xsl->addParameter("fileCita", _FILE_PHP_AGENDA_CITAS);
	$Item_xsl->addParameter("fileExportar", _FILE_PHP_EXPORTACION);
	$Item_xsl->addParameter("filePropietario", _FILE_PRP_PROPIETARIOS."&prp_id=$prp_id");
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