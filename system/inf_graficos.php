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
	
	if(!isset($graf)){
		$graf="torta";
		$grafW=300;
		$grafH=300;
	} else if($graf=="lineal"){
		$grafW=550;
		$grafH=400;
	}
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
</head>
<body>
<div align="center">
<table width="100%" border="0" cellpadding="0" cellspacing="0">
<tr>
<td>
<div id="grafico"> &nbsp;</div>
<script type="text/JavaScript">
	var so = new SWFObject("extra/graficos/<?php echo $graf; ?>/final.swf", "GRAF", "<?php echo $grafW; ?>", "<?php echo $grafH; ?>", "7", "#FFFFFF");
	so.addParam("scale", "noscale");
	so.addParam("quality", "high");
	so.addParam("wmode", "opaque");
	so.addVariable("xml", "<?php echo _FILE_XML_GRAF_DATOS; ?>");
	so.addVariable("graf", "<?php echo $graf; ?>");
	so.write("grafico");
</script>
</td>
<td width="200" valign="top" >
<?php
if ($graf=='torta'){

//	$Item_xsl = new MM_XSLTransform();
//	$Item_xsl->setXML(_FILE_XML_GRAF_DATOS);
//	$Item_xsl->setXSL(_FILE_XSL_GRAF_DATOS);
//	echo $Item_xsl->Transform();

}
?>
		</td>
	</tr>
</table>
</div>
</body>
</html>