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
	//echo $fileXMLHead."<br> Vs <br>"._FILE_XML_CITAS_HEAD;
	//Recibe 3 valores
	// $fileXMLHead => archivo xml.php con la estructura
	// $fileXMLListado => archivo xml.php con los datos
	// $mod_edit => tipo de edicion a utilizar en _FILE_JAVASCRIPT_LISTADO

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

var prpQuery = "<?php echo $_SERVER['QUERY_STRING']; ?>";// globalQuery
var prpMod = "<?php echo $_REQUEST['mod_edit']; ?>";// globalQuery
var prpFileListado = "<?php echo $fileXMLListado; ?>";
var fileMenAgendaTelefonoNew = "<?php echo _FILE_AGENDA_MEN_TELEFONO_NEW."?mod_edit=1"; ?>"; // tool tip de telefonos
var fileMenAgendaTelefonoDato = "<?php echo _FILE_AGENDA_MEN_TELEFONO_DATO."?mod_edit=1"; ?>"; // tool tip de telefonos
var filePrpPublicacionesDato = "<?php echo _FILE_PRP_PUBLICACIONES."?mod_edit=1"; ?>"; // tool tip de telefonos
var fileCitasEdit =  "<?php echo _FILE_PHP_AGENDA_CITAS_EDIT."?mod_edit=1"; ?>"; // tool tip de citas a agregar
var fileNotasEdit =  "<?php echo _FILE_PHP_AGENDA_TEL_EDIT."?mod_edit=1"; ?>"; // tool tip de tels editar 
var fileTasEdit =  "<?php echo _FILE_PHP_AGENDA_TAS_EDIT."?mod_edit=1"; ?>"; // tool tip de tas editar 
var fileDemEdit = "<?php echo _FILE_PHP_DEMANDAS_EDIT."?mod_edit=1"; ?>"; // tool tip de Demandas a editar
var fileCartEdit = "<?php echo _FILE_PHP_CARTELES_EDIT."?mod_edit=1"; ?>"; // tool tip de Carteles a editar
var fileNovEdit = "<?php echo _FILE_PHP_NOVEDADES_EDIT."?mod_edit=1"; ?>"; // tool tip de Novedades a editar

<?
	if($fileXMLHead==_FILE_XML_CITAS_HEAD || $fileXMLHead == _FILE_XML_TAS_HEAD || $fileXMLHead == _FILE_XML_NOVEDADES_HEAD || $fileXMLHead == _FILE_XML_DEMANDAS_HEAD){	
?>
	
	parent.ventana('agenda_resumen','', '<?php echo _FILE_PHP_RESUMEN_PRINCIPAL; ?>', 'Resumen de movimentos');
	<?
	
	}
?>


</script>
<script language="javascript" type="text/javascript" src="<?php echo _FILE_JAVASCRIPT_LISTADO; ?>"></script>
<script language="javascript" type="text/javascript" src="<?php echo _FILE_JAVASCRIPT_TOOLTIP; ?>"></script>
<?php echo "<script language='javascript' type='text/javascript' src='"._FILE_JAVASCRIPT_SORTABLE."'></script>\n"; ?>
</head>

<body onload="cargoXML('<?php echo $fileXMLHead; ?>', 'HeadResultados', '', 'head');">
<div align="center" id="listadoDatos">
<table width="100%" border="0" align="center" cellpadding="3" cellspacing="0">
  <tr>
    <td width="50%"><a><h1 onclick="window.parent.window.display('menuPrincipal');"><img src="../interfaz/inmohost/images/iconos/20/buscar.png" alt="Reformular Busqueda" width="20" height="20" hspace="5" border="0" align="absmiddle" />Reformular Busqueda</h1></a>
    		
    </td>
    
    <td width="50%"><div align="right">
      <h1>resultados encontrados: <span id="prpTotalDatos">&nbsp;</span></h1>
    </div></td>
  </tr>
  <tr>
    <td colspan="2">

	<div align="center">
	  <table width="98%" border="0" cellspacing="1" cellpadding="0" class="tabla" id="HeadResultados">
		<tbody >
		</tbody>
      </table>
    </div>
	</td>
  </tr>
  <tr><td colspan="2"><h1><span id="preCarga"></span></h1></td></tr>
 
  <tr id="prpPaginacion" style="display:none">
    <td colspan="2">
	<h1 align="center">p&aacute;gina actual: <span id="prpPaginaActual">&nbsp;</span> - cantidad por p&aacute;gina: <span id="prpOffest">&nbsp;</span></h1>
	<h1 align="center" id="prpPaginasTotales"></h1>	</td>
  </tr>
  <tr>
    <td align="right">
    	<input name="imprimirBoton" type="button" class="boton" id="imprimirBoton" onclick="if (confirm('Imprimir Listado?')){ window.print(); };" value="Imprimir" />
    </td>
    <?
  
    if( substr($fileXMLHead,-40) == substr(_FILE_XML_NOVEDADES_HEAD,-40) ){
    print"
    	<td>
    		<input name=\"LeidasBoton\" type=\"button\" class=\"boton\" id=\"leidasBoton\" onclick=\"marcar_leidas(".$_SESSION['emp_id'].");location.reload();\" value=\"Leídas\" />
	    </td>
	";
    }elseif($fileXMLHead == _FILE_XML_CART_HEAD){
    ?>
     	<!--td>
    		<input name="ModifBoton" type="button" class="boton" id="modifBoton" onclick="marcar_carteles(".$_SESSION['emp_id'].");location.reload();" value="Modificar" />
    	</td-->
	<?
    }else{
    ?>
     	<td>
    		<input name="Cerrar" type="button" class="boton" id="imprimirBoton" onclick="parent.Windows.close('generico_listado')" value="Cerrar" />
    	</td>
	<?}?>
  </tr>
</table>
</div>
<!--TOOLTIP-->
<div id="toolTipBox">
<iframe id="iframeToolTip" name="iframeToolTip" src="about:blank" scrolling="no" frameborder="0" style="margin:0px; padding:0px; border:none;" ></iframe>
</div>
<!--FIN TOOLTIP-->
</body>
</html>