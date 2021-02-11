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
<script language="javascript" type="text/javascript" src="<?php echo _FILE_JAVASCRIPT_TOOLTIP; ?>"></script>
</head>
<body>

<?php 

//require (_FILE_MENU_PANEL); 

?>
<form name="panelControl" method="POST" action="<?echo _FILE_PHP_ABM_MENS_PARAMETROS?>">
	<input type="hidden" name="mod_tip" value="edit">
  <table width="100%" border="0" cellspacing="0" cellpadding="0">
    <tr>
      <td><a title="abrir Panel de control">
        <h1><img src="../interfaz/inmohost/images/iconos/20/configurar.png" width="20" height="20" hspace="10" vspace="2" border="0" align="absmiddle" />Panel de control</h1>
      </a> </td>
    </tr>
    <tr>
      <td>
	<?php
		if(isset($fileXML) && isset($fileXSL)){
			$new_xsl = new MM_XSLTransform();
			$new_xsl->setXML($fileXML);
			$new_xsl->setXSL($fileXSL);
			echo $new_xsl->Transform();
		}
	?>
	  </td>
    </tr>
  </table>
  </form>
<br />
<br />
</body>
</html>