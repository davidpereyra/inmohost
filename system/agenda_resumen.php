<?php
	
	extract($_GET);
	extract ($_POST);
	extract ($_REQUEST);

	include ("php/config.php");
	include ("php/sec_head.php");

	$usr_id=17;

	//libreria de dreamwaeaver XLST para inclucion de archivos de XML con XSLT
	include(_FILE_XSL_CLASS);
	
	// cambio la hoja de estylos por defecto
	$otraCSS = "styleGris.css";

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>NEWS</title>
<?php
	
	include("head.php");
?>
<script language="javascript" type="text/javascript" src="<?php echo _FILE_JAVASCRIPT_TOOLTIP; ?>"></script>
</head>
<body>
<table width="100%" border="0" align="center" cellpadding="0" cellspacing="2" >
  <tr>
    <td valign="top">
<?php
	// Si viene por internet cambio las rutas para agregar Citas, Tasaciones Novedades y ver Telefonos
	if ($internet)
	{
		$fileRes=str_replace($dominio_local, "localhost", _FILE_XML_RESUMEN_GENERAL);
		$fileAgenda=_FILE_PHP_AGENDA_CITAS;
		$fileTasacion=_FILE_PHP_AGENDA_TAS_NEW;
		$fileTelefonos=str_replace($dominio_local, "localhost", _FILE_AGENDA_MEN_TELEFONO_NEW);
		$fileNovedad=str_replace($dominio_local, "localhost", _FILE_XML_NOVEDADES);
		$fileNovedad.="?usr_login=".$_SESSION['usr_login'];
		$fileDemanda=str_replace($dominio_local, "localhost", _FILE_XML_DEMANDAS);
	}
	else
	{
		$fileRes=_FILE_XML_RESUMEN_GENERAL;
		$fileAgenda=_FILE_PHP_AGENDA_CITAS;
		$fileTasacion=_FILE_PHP_AGENDA_TAS_NEW;
		$fileTelefonos=_FILE_AGENDA_MEN_TELEFONO_NEW;
		$fileNovedad=_FILE_XML_NOVEDADES."?usr_login=".$_SESSION['usr_login'];
		$fileDemanda=_FILE_XML_DEMANDAS;
	}
	$cadena="select emp_id from empleados where usr_login='".$_SESSION['usr_login']."'";
	$emp_id=mysql_query($cadena);
	$emp_id=mysql_result($emp_id,0,0);

	$menuItem_xsl = new MM_XSLTransform();
	$menuItem_xsl->setXML($fileRes."?usr_login=".$_SESSION['usr_login']."&usr_id=".$usr_id);
	$menuItem_xsl->setXSL(_FILE_XSL_RESUMEN_PRINCIPAL);
	$menuItem_xsl->addParameter("prp_usr", $prp_usr);
	$menuItem_xsl->addParameter("fileAgenda", _FILE_PHP_AGENDA_CITAS);
	$menuItem_xsl->addParameter("fileDemandaXML", $fileDemanda);
	$menuItem_xsl->addParameter("fileTasacion", _FILE_PHP_AGENDA_TAS_NEW);
	$menuItem_xsl->addParameter("fileTelefonoFormulario", _FILE_FORM_AGENDA_TELEFONOS);
	$menuItem_xsl->addParameter("fileListadoGenerico", _FILE_PHP_GENERICO_LISTADOS);
	$menuItem_xsl->addParameter("fileNovedadesXMLHead", _FILE_XML_NOVEDADES_HEAD);
	$menuItem_xsl->addParameter("fileNovedadesXMLResultado", _FILE_XML_NOVEDADES_LISTADO);
	$menuItem_xsl->addParameter("fileNovedadNewPHP", _FILE_PHP_NOVEDADES);
	$menuItem_xsl->addParameter("fileNovedadNewXML",$fileNovedad);
	$menuItem_xsl->addParameter("fileNovedadNewXSL", _FILE_XSL_NOVEDADES);
	$menuItem_xsl->addParameter("fileDemandasXMLHead", _FILE_XML_DEMANDAS_HEAD);
	$menuItem_xsl->addParameter("fileDemandasXMLResultado", _FILE_XML_DEMANDAS_LISTADO);
	$menuItem_xsl->addParameter("fileTasacionesXMLHead", _FILE_XML_DEMANDAS_HEAD);
	$menuItem_xsl->addParameter("fileTasacionesXMLResultado", _FILE_XML_DEMANDAS_LISTADO);
	$menuItem_xsl->addParameter("fileMensajes", _FILE_PHP_RED);
	$menuItem_xsl->addParameter("fileTelefonoNew", $fileTelefonos);
	$menuItem_xsl->addParameter("fileXMLHeadTel", _FILE_XML_TEL_HEAD);
	$menuItem_xsl->addParameter("fileXMLListadoTel", _FILE_XML_TEL_LISTADO);
	$menuItem_xsl->addParameter("fileXMLHeadCitas", _FILE_XML_CITAS_HEAD);
	$menuItem_xsl->addParameter("fileXMLListadoCitas", _FILE_XML_CITAS_LISTADO);
	$menuItem_xsl->addParameter("fileXMLHeadTas", _FILE_XML_TAS_HEAD);
	$menuItem_xsl->addParameter("fileXMLListadoTas", _FILE_XML_TAS_LISTADO);
	$menuItem_xsl->addParameter("emp_id", $emp_id);
	$menuItem_xsl->addParameter("diaDesde", date("d"));
	$menuItem_xsl->addParameter("mesDesde", date("m"));
	$menuItem_xsl->addParameter("anoDesde", date("Y"));
	$menuItem_xsl->addParameter("fileListadoPropiedades", _FILE_PHP_PRP_LISTADO);
	$menuItem_xsl->addParameter("limite1", 5);
	echo $menuItem_xsl->Transform();
?>
	</td>
  </tr>
</table>
<!--TOOLTIP-->
<div id="toolTipBox"></div>
<!--FIN TOOLTIP-->
</body>
</html>
