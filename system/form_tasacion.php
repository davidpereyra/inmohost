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
<script language="JavaScript1.2" type="text/javascript" src="<?php echo _FILE_JAVASCRIPT_AJAX; ?>"></script>

<!--MENUEXTRA-->
<script language="JavaScript1.2" type="text/javascript" src="<?php echo _FILE_JAVASCRIPT_MENUEXTRA; ?>"></script>
<?php echo "<style type=\"text/css\" media=\"screen\">
	@import url(\""._FILE_CSS_MENUEXTRA."\");
</style>\n"; ?>
<!--//MENUEXTRA-->
<script language="javascript" type="text/javascript" src="<?php echo _FILE_JAVASCRIPT_TOOLTIP; ?>"></script>
</head>
<body <?php if (!$mod_tip || !$edited) echo "onload=\"contar_palabras('prp_pub');\""; ?>>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  
  <tr>
    <td>
    
    <?php

    // Si hay que realizar alguna operacion y ya se ha editado la entidad
	// se ejecuta el abm del modulo
	
	
	
	?>	</td>
  </tr>
  <tr>
  <td>  </td>
 	<td>
<?php

	// Si no se ejecuto ninguna operacion ($msg_exitos no definido) o si se ejecuto la operacion pero con errores
	// se muestran de nuevo los datos de la propiedad
	if (!$msg_exitos)
	{
		$Item_xsl = new MM_XSLTransform();
		//print _FILE_XML_PRP_FICHA_EDIT."?".$query_string;
		$Item_xsl->setXML(_FILE_XML_FORM_TASACION."?".$query_string);
		$Item_xsl->setXSL(_FILE_XSL_FORM_TASACION);
		$Item_xsl->addParameter("prp_fotosXML", _PROXY."?tip=prp_foto"); //_FILE_XML_PRP_FOTOS."?prp_id=$prp_id&usr_id=$usr_id&mod_edit=$mod_edit");
		$Item_xsl->addParameter("mod_edit", $mod_edit);
		$Item_xsl->addParameter("prp_id", $prp_id);
		$Item_xsl->addParameter("mod_tip", $mod_tip);
		$Item_xsl->addParameter("usr_id", $usr_id);
		$Item_xsl->addParameter("fileFicha", _FILE_PHP_PRP_FICHA);
		$Item_xsl->addParameter("fileFichaEdit", _FILE_PHP_PRP_FICHA_EDIT);
		$Item_xsl->addParameter("fileFichaEstado", _FILE_PHP_PRP_LISTADO);
		$Item_xsl->addParameter("fileCita", _FILE_PHP_AGENDA_CITAS);
		$Item_xsl->addParameter("fileExportar", _FILE_PHP_EXPORTACION);
		$Item_xsl->addParameter("filePropietario", _FILE_PRP_PROPIETARIOS);
		$Item_xsl->addParameter("carpetaFotos", $carpetaFotos);
		echo $Item_xsl->Transform();
	}
	else 
	{
		// Se realizo la operacion con exito, se muestran los mensajes correspondientes
		if ($msg_exitos && !$errors)
		{	?>
		<tr>
			<script language="javascript">
				parent.ventana('agenda_resumen','', '<?php echo _FILE_PHP_RESUMEN_PRINCIPAL; ?>', 'Resumen de movimentos');
			</script>
		  <td class='destacado'><h1 align="center"><br>LOS CAMBIOS SE HAN REALIZADO CON EXITO</h1></td>
		</tr>
		<?php
			for ($i=0; $i<count($msg_exitos);$i++)
			{ ?>
				<tr><td class='destacado' >&nbsp;</td></tr>
				<tr><td class='destacado' >&nbsp;&nbsp;&bull;&nbsp;<?php echo $msg_exitos[$i]; ?></td></tr>
			<?php
			}
		}?>
		<tr><td class='destacado' >&nbsp;</td></tr>
		<?php 
			if ($mod_tip=="del")
			{
		?>
			<tr><td align=center><input type="button" name="aceptar" value="Aceptar" onclick="parent.Windows.close('listadoPropiedades')">&nbsp; <input type="button" name="subir" value="Publicar en Pagina Web" onclick="javascript:parent.ventana('actualizador','propiedades=1&medios=0', '<?php echo _FILE_PHP_ACTUALIZADOR; ?>', 'Actualizando el Sistema');"></td></tr>
		<?php
			}
			else 
			{
			?>
				<tr><td align=center><input type="button" name="aceptar" value="Aceptar" onclick="parent.Windows.close('propiedad')">&nbsp; <input type="button" name="subir" value="Publicar en Pagina Web" onclick="javascript:parent.ventana('actualizador','propiedades=1&medios=0', '<?php echo _FILE_PHP_ACTUALIZADOR; ?>', 'Actualizando el Sistema');"></td></tr>
		<?php
			}
		?>
		
		<?
	}
?>	</td>
  </tr>
</table>

<!--TOOLTIP-->
<div id="toolTipBox">
<iframe id="iframeToolTip" name="iframeToolTip" src="about:blank" scrolling="no" frameborder="0" style="margin:0px; padding:0px; border:none;" ></iframe>
</div>
<!--FIN TOOLTIP-->

</body>
</html>