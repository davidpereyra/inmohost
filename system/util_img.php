<?php
	extract($_GET);
	extract ($_POST);
	extract ($_REQUEST);

	include ("php/config.php");
	include ("php/sec_head.php");
	
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
</head>
<body>
<?php 
	
	list($ancho, $altura, $tipo, $atr) = getimagesize($img);

?>
<div align="center" id="img">
	<img id="imagen" <?php echo $atr; ?> src="<?php echo $img; ?>" border="0" />
</div>


<div align="center" id="pie" style="bottom:0px"><input type="button" name="cerra" id="cerrar" value="cerrar" onclick="parent.Dialog.closeInfo();" onkeypress="parent.Dialog.closeInfo();" /></div>
</body>
</html>