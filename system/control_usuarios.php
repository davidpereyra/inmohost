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
	 
	function agregar_usr(){
	 	if(document.controlUsuarioAgregar.usr_pass.value==document.controlUsuarioAgregar.usr_pass2.value){
	 		if(verif('nombre,1,Nombre,apellido,1,Apellido,usr_login,1,Login,usr_pass,1,Contraseña,usr_pass2,1,Contraseña Nuevamente','controlUsuarioAgregar')){
	 			document.controlUsuarioAgregar.submit();
	 		}
	 	}else{
	 		alert("Las contraseñas ingresadas no coinciden");
	 	}
	 }
	 
</script>
<script language="javascript" type="text/javascript" src="<?php echo _FILE_JAVASCRIPT_TOOLTIP; ?>"></script>
</head>
<body>

<form id="controlUsuarioAgregar" name="controlUsuarioAgregar" method="post" enctype="multipart/form-data" style="height:100%" action="<?echo _FILE_PHP_ABM_MENS_USUARIOS?>">
  <table width="100%" border="0" cellspacing="0" cellpadding="0">
    <tr >
      <td colspan="2"><h1>&nbsp;</h1></td>
    </tr>
    <tr >
      <td colspan="2">
<?php
	if(isset($fileXML) && isset($fileXSL)){
		
		$new_xsl = new MM_XSLTransform();
		$new_xsl->setXML($fileXML);
		$new_xsl->setXSL($fileXSL);
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