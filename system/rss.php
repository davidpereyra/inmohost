<?php
	extract($_GET);
	extract ($_POST);
	extract ($_REQUEST);
	
	include ("php/config.php");
	include ("php/sec_head.php");

	//libreria de dreamwaeaver XLST para inclucion de archivos de XML con XSLT
	include(_FILE_XSL_CLASS);
	
	// cambio la hoja de estylos por defecto
	$otraCSS = "styleGris.css";

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>NEWS</title>
<script language="javascript" type="text/javascript" src="<?php echo _FILE_JAVASCRIPT_RSS; ?>"></script>
<?php
	
	include("head.php");
?>
</head>
<body>
<a name="inicio"></a>
<table style="width:180px;" border="0" cellspacing="2" cellpadding="0" id="rssFullNewsTable">
  <tr>
    <td width="190" valign="top">
<?php
	$menuItem_xsl = new MM_XSLTransform();
	$menuItem_xsl->setXML(_FILE_XML_RSS);
	$menuItem_xsl->setXSL(_FILE_XSL_RSS);
	echo $menuItem_xsl->Transform();
?>
	</td>
    <td id="rssFullNews" valign="top" style=" background-color:#363636; width:240px; display:none;"></td>
  </tr>
</table>
</body>
</html>
