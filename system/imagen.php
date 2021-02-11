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
<html xmlns="http://www.w3.org/1999/xhtml" xmlns:spry="http://ns.adobe.com/spry">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>INMOHOST</title>
<?php
	include("head.php");
?>
<script language="javascript" type="text/javascript">
function sizeImg(img, newTam, file) {

	$(img).src = file +"&tam="+newTam;
	
}
</script>
</head>
<body>
<table width="100%" border="0" cellspacing="5" cellpadding="0">
  <tr>
    <td>
    <div align="center" id="divImagen0"><img src="<?php echo "php/funciones/foto.php?foto=".$img."&tam=500"; ?>" name="imagen0" border="0" id="imagen0" /></div>
    </td>
  </tr>
  <tr>
    <td><div align="center">
      <input name="button" type="button" class="botonForm" id="button" onclick="parent.Windows.close('imagen');" value="Cerrar" />
    </div></td>
  </tr>
</table>
</body>
</html>