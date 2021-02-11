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

<?php echo "<script language='javascript' type='text/javascript' src='"._FILE_JAVASCRIPT_SORTABLE."'></script>\n"; ?>
</script>
<script language="javascript" type="text/javascript">
var prpQuery = "<?php echo $_SERVER['QUERY_STRING']; ?>";// globalQuery
var prpMod = "<?php echo $_REQUEST['mod_edit']; ?>";// globalQuery
var prpFileListado = "<?php echo _FILE_XML_PRP_LISTADO; ?>";
var _FILE_PRP_ESTADO = "<?php echo _FILE_PHP_PRP_ESTADO; ?>";
	
</script>
<?php echo "<script language='javascript' type='text/javascript' src='"._FILE_JAVASCRIPT_LISTADO."'></script>\n"; ?>

</head>
<body onload="cargoXML('<?php echo _FILE_XML_PRP_HEAD; ?>', 'prpHeadResultados', '<?php echo "?usr_id=".$usr_id; ?>', 'head');">

<div align="center" id="prp_listadoDatos">
<form name='listado' action='<?php echo _FILE_PHP_PRP_FICHA_EDIT2; ?>' method="POST">
<input type='hidden' name="mod_tip" value="del">
<input type='hidden' name="edited" value="1">
<input type='hidden' name="estados" value="">
<table width="100%" border="0" align="center" cellpadding="3" cellspacing="0" id="tablaImprimir">
  <tr>
    <td colspan="2">
      <div align="left">
		<input name="reformularBoton" type="button" class="boton" id="reformularBoton" onclick="window.parent.window.display('menuPrincipal');" value="Reformular B&uacute;squeda" />        
      	<input name="exportarBoton" type="button" class="inputForm" id="expotarBoton" onclick="parent.ventana('exportar','&limit=10','<?php echo _FILE_PHP_EXPORTACION; ?>','Exportar Datos');" value="Exportar" />
      </div></td>
    </tr>
    <tr><td colspan=2><hr></td></tr>
  <tr>
    <!--td width="50%" class="boton"><a><h1 onclick="window.parent.window.display('menuPrincipal');"><img src="../interfaz/inmohost/images/iconos/20/buscar.png" alt="Reformular Busqueda" width="20" height="20" hspace="5" border="0" align="absmiddle" />Reformular Busqueda</h1></a></td-->
    <td width="50%"><div align="left">
      <h1> Resultados encontrados: <span id="prpTotalDatos">&nbsp;</span></h1>
    </div></td>
  </tr>
  <tr>
    <td colspan="2">

	<div align="center">
	  <table width="98%" border="0" cellspacing="1" cellpadding="0" class="sortable" id="prpHeadResultados">
		<tbody >
		</tbody>
      </table>
    </div>	</td>
  </tr>
  <tr><td colspan="2"><h1><span id="preCarga"></span></h1></td></tr>
  
  <tr id="prpPaginacion" style="display:none">
    <td colspan="2">
	<h1 align="center">p&aacute;gina actual: <span id="prpPaginaActual">&nbsp;</span> - cantidad por p&aacute;gina: <span id="prpOffest">&nbsp;</span></h1>
	<h1 align="center" id="prpPaginasTotales"></h1>	</td>
  </tr>
</table>
</form>

</div>
</body>
</html>