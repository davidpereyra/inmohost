<?php
	extract($_GET);
	extract ($_POST);
	extract ($_REQUEST);

	include ("php/config.php");
	include ("php/sec_head.php");

	//libreria de dreamwaeaver XLST para inclusion de archivos de XML con XSLT
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
<script language="javascript">
		

		function pagina(a){
			document.infTasaciones.base.value=eval((a)*10)
			//alert(document.infTasaciones.base.value)
			document.infTasaciones.submit()
		}


</script>
<script language="javascript" type="text/javascript" src="<?php echo _FILE_JAVASCRIPT_TOOLTIP; ?>"></script>
</head>
<body>

<form id="infTasaciones" enctype="multipart/form-data" name="infTasaciones" method="post" style="height:100%" action="<?echo $PHP_SELF?>">
	
	<input type="hidden" name="desdeMosDia" value="<?echo $desdeMosDia?>">
	<input type="hidden" name="desdeMosMes" value="<?echo $desdeMosMes?>">
	<input type="hidden" name="desdeMosAno" value="<?echo $desdeMosAno?>">
	<input type="hidden" name="hastaMosDia" value="<?echo $hastaMosDia?>">
	<input type="hidden" name="hastaMosMes" value="<?echo $hastaMosMes?>">
	<input type="hidden" name="hastaMosAno" value="<?echo $hastaMosAno?>">
	<input type="hidden" name="tip_id" value="<?echo $tip_id?>">
	<input type="hidden" name="con_id" value="<?echo $con_id?>">
	<input type="hidden" name="est_can" value="<?echo $est_can?>">
	<input type="hidden" name="fileXMLListado" value="<?echo $fileXMLListado?>">
	<input type="hidden" name="fileXSLListado" value="<?echo $fileXSLListado?>">
	<input type="hidden" name="tipo_inf" value="<?echo $tipo_inf?>">
	<input type="hidden" name="base">

	
  <table width="100%" border="0" cellspacing="0" cellpadding="0">
    <tr >
      <td colspan="2"><h1>&nbsp;</h1></td>
    </tr>
    <tr >
      <td colspan="2">
<?php
		
	if(isset($fileXMLListado) && isset($fileXSLListado)){
		$new_xsl = new MM_XSLTransform();
		$new_xsl->setXML($fileXMLListado."?tipo_inf=$tipo_inf&base=$base&desdeMosDia=$desdeMosDia&desdeMosMes=$desdeMosMes&desdeMosAno=$desdeMosAno&hastaMosDia=$hastaMosDia&hastaMosMes=$hastaMosMes&hastaMosAno=$hastaMosAno&con_id=$con_id&tip_id=$tip_id&est_can=$est_can");
		$new_xsl->setXSL($fileXSLListado);
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