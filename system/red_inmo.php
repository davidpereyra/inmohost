<?php
	extract($_GET);
	extract ($_POST);
	extract ($_REQUEST);
	
	include ("php/config.php");
	include ("php/sec_head.php");

	//libreria de dreamwaeaver XLST para inclucion de archivos de XML con XSLT
	include(_FILE_XSL_CLASS);
	
	// cambio la hoja de estylos por defecto
	$otraCSS = "styleRed.css";

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>INMOHOST</title>
<?php
	include("head.php");
?>
<style type="text/css">
<!--
#capa1 {
	position:absolute;
	right:50px;
	top:50px;
	width:300px;
	height:300px;
	z-index:10;
	border:#3366CC 1px dashed;

	background-color: #FFFFFF;
	filter:alpha(opacity=80);
	-moz-opacity: 0.8;
	opacity: 0.8;

}
#capa2 {
	position:absolute;
	right:50px;
	top:50px;
	width:300px;
	height:300px;
	z-index:11;
}
-->
</style>
</head>
<body style="background:url(../interfaz/inmohost/images/redcim.jpg) right bottom no-repeat">

<div id="capa1" style="display:none"></div>
<div id="capa2" style="display:none">
<table width="300" height="300" border="0" cellpadding="1" cellspacing="1">
        <tr>
          <td valign="top"><table width="100%" border="0" cellspacing="1" cellpadding="1">
            <tr >
              <td>
			  <div id="contenidoInmobiliaria">
			  </div>
			  </td>
            </tr>
          </table></td></tr>
  </table>
</div>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td>
            <h1 align="center"><br />
              RED DE CORREDORES INMOBILIARIOS DE MENDOZA
            <hr /></h1></td>
        </tr>
        
      </table></td>
  </tr>
  <tr>
    <td width="325" valign="top">
	<div align="center" id="listaInmobiliarias" style="overflow:auto; height:400px">
<?php
		$new_xsl = new MM_XSLTransform();
		$new_xsl->setXML(_FILE_XML_RED_INMOBILIARIAS);
		$new_xsl->setXSL(_FILE_XSL_RED_INMOBILIARIAS);
		$new_xsl->addParameter("fileMenInmo", _FILE_RED_MEN_INMOBILIARIA);
		echo $new_xsl->Transform();
?>  
	</div>
	</td>
    <td>&nbsp;</td>
  </tr>
</table>

</body>
</html>