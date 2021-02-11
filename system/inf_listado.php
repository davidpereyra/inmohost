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


// Si ingresa por internet cambio la ruta de resumen general
function getUserIP()
{
    $client  = @$_SERVER['HTTP_CLIENT_IP'];
    $forward = @$_SERVER['HTTP_X_FORWARDED_FOR'];
    $remote  = $_SERVER['REMOTE_ADDR'];

    if(filter_var($client, FILTER_VALIDATE_IP)){$ip = $client;}
    elseif(filter_var($forward, FILTER_VALIDATE_IP)){$ip = $forward;}
    else{$ip = $remote;}

    return $ip;
}

$ip = getUserIP();

if ($ip=="192.168.0.26"){

	$xml_listado = "http://190.15.195.119/inmohostV2.0/system/datos/inf_listadoResultado.xml.php";

}else{
	$xml_listado = 	_FILE_XML_INF_LISTADO;
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
<script language="javascript" type="text/javascript">
	function seleccionar(form,a){
	
		var i;
		var existe_seleccion=0;
		
		total=eval('document.'+form+'.'+a+'.options.length');
	
		for (i=0;i<total;i++){
	
				if (eval("document."+form+"."+a+".options["+i+"].text")){
					(eval("document."+form+"."+a+".options["+i+"].selected = 'TRUE'"));
					
				}
	
		}
	
	}


</script>
<script language="javascript" type="text/javascript" src="<?php echo _FILE_JAVASCRIPT_TOOLTIP; ?>"></script>
</head>
<body>


  <table width="100%" border="0" cellspacing="0" cellpadding="0">
    <tr >
      <td colspan="2"><h1>&nbsp;</h1></td>
    </tr>
    <tr >
      <td colspan="2">
      
    <form id="informesPrp" name="informesPrp" method="post" >
   		<input type="hidden" name="fileXMLListado" value="<?php echo $xml_listado; ?>"  />
		<input type="hidden" name="fileXMLHead" value="<?php echo _FILE_XML_INF_HEAD; ?>"  />
		<input type="hidden" name="tipo_inf" value="<?php echo $tipo_inf ?>"  />
	
	
<?php

if($tipo_inf!="tasaciones"){
	if(isset($fileXML) && isset($fileXSL)){
		$new_xsl = new MM_XSLTransform();
		$new_xsl->setXML($fileXML."?tipo_inf=$tipo_inf");
		$new_xsl->setXSL($fileXSL);
		$new_xsl->addParameter("destino1","generico_listado");
		$new_xsl->addParameter("titulo","Informe de $tipo_inf");
		$new_xsl->addParameter("url",_FILE_PHP_GENERICO_LISTADOS);
		$new_xsl->addParameter("parametros","mod_inf");
		$new_xsl->addParameter("fileCalendario",_FILE_PHP_MEN_CALENDARIO);
		$new_xsl->addParameter("acc_internet", $internet);
		echo $new_xsl->Transform();
	}
}else{
	?>
	 
	 <input type="hidden" name="fileXSLListado" value="<?php echo _FILE_XSL_INF_LIST_TASA ?>" />
	
	<?
	if(isset($fileXML) && isset($fileXSL)){
		$new_xsl = new MM_XSLTransform();
		$new_xsl->setXML($fileXML."?tipo_inf=$tipo_inf");
		$new_xsl->setXSL($fileXSL);
		$new_xsl->addParameter("destino1","generico_listado");
		$new_xsl->addParameter("titulo","Informe de $tipo_inf");
		$new_xsl->addParameter("url",_FILE_PHP_INF_LIST_TASA);
		$new_xsl->addParameter("parametros","mod_inf");
		$new_xsl->addParameter("fileCalendario",_FILE_PHP_MEN_CALENDARIO);
		$new_xsl->addParameter("acc_internet", $internet);
		echo $new_xsl->Transform();
	}
	
}
?>
</form>
</td>
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