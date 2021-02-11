  <?php
	extract($_GET);
	extract ($_POST);
	extract ($_REQUEST);

	$rutaSystema = "system/";
	$rutaInterfaz = "interfaz/";
	define('ACCESO_REMOTO', 'true'); 

	include ($rutaSystema."php/config2.php");
	include ($rutaSystema."php/sec_head.php");	

	include (_FILE_UTIL_MEN);

	//libreria de dreamwaeaver XLST para inclucion de archivos de XML con XSLT
	include(_FILE_XSL_CLASS);

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html lang="ar" dir="ltr" xmlns="http://www.w3.org/1999/xhtml">

<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>INMOHOST</title>
<?php include($rutaSystema."head.php"); ?>
<script language="javascript" type="text/javascript" src="<?php echo _FILE_JAVASCRIPT_SWF_OBJECT; ?>"></script>
<script language="javascript" type="text/javascript" src="<?php echo _FILE_JAVASCRIPT_TOOLTIP; ?>"></script>
<script language="javascript">

function abrir_red(){
		ventana('red_inmobiliarios', '', '<?php echo _FILE_PHP_RED; ?>', 'Red de Inmobiliarias'); displayMenu('close','','')
}

</script>
<?php

//REVISAR SI HAY ALGO PARA ACTUALIZAR
$consulta=mysql_query("select cambio_id,cambio_det,prp_id,date_format(fecha_c,'%d-%m-%Y') from cambios");
//REVISAR CONEXION A INTERNET
if(mysql_num_rows($consulta)){
	$hayDatos = 0;
}
?>

</head>
<body onload="fondoDegradado('<?php echo $_INMO_COLOR1; ?>', '<?php echo $_INMO_COLOR2; ?>'); <?php if($hayDatos){ echo "buscarServidor('$hayDatos');";} ?>" onresize="fondoDegradado('<?php echo $_INMO_COLOR1; ?>', '<?php echo $_INMO_COLOR2; ?>'); pageSize = WindowUtilities.getPageSize();" >

<!--BUSCADOR SUPERIOR-->
<div id="menuPrincipalSuperior">
  <table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="100%" valign="top" >
	<div  class="menuPrincipalSuperiorBuscador" id="menuPrincipalSuperiorBuscador">
<?php include(_FILE_FORM_BUSCAR_PROPIEDADES); ?>
	</div>	</td>
    <td width="55" valign="top"><img src="interfaz/inmohost/images/barraBuscador/solapa.png" width="55" height="75" border="0" usemap="#Map" /></td>
  </tr>
</table>
</div>
<!--FIN BUSCADOR-->

<iframe id="iframeMenuPrincipal" name="iframeMenuPrincipal" src="interfaz/inmohost/index.html" scrolling="no" frameborder="0" style="margin:0px; padding:0px; border:none; display:none"></iframe>  
<div id="menuPrincipal" style="display:none">
  <table width="400" height="350" border="0" cellpadding="0" cellspacing="0" id="menu">
    <tr>
      <td width="12"><img src="interfaz/inmohost/images/menu/esquinaIzqSup.png" width="12" height="22" /></td>
      <td width="100%" class="bordeMenuPrincipalSuperior"><a href="javascript:display('menuPrincipal');" onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('closeMenu','','interfaz/inmohost/images/botones/miniN10.png',1)"><img src="interfaz/inmohost/images/botones/miniG10.png" alt="Minimizar Menu" name="closeMenu" width="10" height="10" border="0" align="right" id="closeMenu" /></a><samp id="menuTituloActual" style="font-weight:bold">Inmuebles</samp></td>
      <td width="14"><img src="interfaz/inmohost/images/menu/esquinaDerSup.png" width="12" height="22" /></td>
    </tr>
   
    <tr>
      <td valign="top" class="bordeMenuPrincipalIzquierda">&nbsp;</td>
      <td bgcolor="#999999" valign="top"> 
<?php
	
	$menuItem_xsl = new MM_XSLTransform();
	$menuItem_xsl->setXML(_FILE_XML_MENU_PRINCIPAL."?usr_login=".$_SESSION['usr_login']);
	$menuItem_xsl->setXSL(_FILE_XSL_MENU_PRINCIPAL_ITEM);
	echo $menuItem_xsl->Transform();
?>      </td>
      <td valign="top" class="bordeMenuPrincipalDerecha">&nbsp;</td>
    </tr>
    <tr>
      <td height="7"><img src="interfaz/inmohost/images/menu/esquinaIzqInf.png" width="12" height="7" /></td>
      <td background="interfaz/inmohost/images/menu/inferior.png"><img src="interfaz/inmohost/images/menu/inferior.png" width="2" height="7" /></td>
      <td><img src="interfaz/inmohost/images/menu/esquinaDerInf.png" width="12" height="7" /></td>
    </tr> 
  </table>
</div>

<div id="menuBarra" >
  <table width="100%" height="35" border="0" cellpadding="0" cellspacing="0" >
    <tr style="background:url(interfaz/inmohost/images/barra/fondo1.png) repeat-x;" height="35">
      <td width="420" valign="middle"><div id="menuBarraLeft"><?php
			$menu_xsl = new MM_XSLTransform();
			$menu_xsl->setXML(_FILE_XML_MENU_PRINCIPAL);
			$menu_xsl->setXSL(_FILE_XSL_MENU_PRINCIPAL);
			echo $menu_xsl->Transform();
		?>
      </div></td>
      <td width="54" ><img src="interfaz/inmohost/images/barra/solapa.png" width="54" height="35" border="0"  /></td>
      <td width="38" valign="top"><a href="javascript:abrir_red();" title="Red de Corredores Inmobiliarios"><img src="interfaz/inmohost/images/barra/icono_red.png" border="0" width="38" height="35" align="left" /></a></td>
      <td width="100%"><div align="center" style="height:15px; color:#FF6600; font-size:12px; font-weight:bold;" id="pieMensajes"></div></td>
      <td width="79"><div align="right"><a href="javascript:cerrarSesion();" onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('cerrar','','interfaz/inmohost/images/barra/close_f2.png',1)"><img src="interfaz/inmohost/images/barra/close.png" alt="cerrar sesion" name="cerrar" width="79" height="35" border="0" id="cerrar" /></a></div></td>
    </tr>
  </table>
</div>

<!--BANNER-->
<div id="bannerPrincipal" >
  <div id="bannerPrincipalSWF" style="height:100%; width:100%;">  </div>
</div>

<script type="text/JavaScript">
	var so = new SWFObject("<?php echo _FILE_SWF_BANNER_PRINCIPAL;?>", "bannerPrincipalSWF", "100%", "100%", "8", "#FFFFFF");
	so.addParam("scale", "noscale");
	so.addParam("quality", "high");
	so.addParam("wmode", "transparent");
	so.addParam("salign", "lt");
	so.addVariable("fileXML", "<?php echo "proxy.php?tip=banner_principal"; ?>");
	so.addVariable("fileSWF_LOGO", "<?php echo _FILE_SWF_LOGO_INMO; ?>");
	so.addVariable("usr_raz", "<?php echo _USR_RAZ; ?>");
	so.write("bannerPrincipalSWF");
</script>
<!--FIN-->

<!--FONDO DREGRADADO-->
<div style="position: relative;">
	<div id="fondoDegradado" style="position:absolute; top:0; left:0;"></div>
	<div id="general" style="position:absolute; top:0; left:0;"></div>
</div>
<!--FIN FONDO DREGRADADO-->

<script type="text/javascript">
	//maximizo la pantalla
	maximizar();
	// levanto las noticias
//	ventana('news', '', '', '');
	//levntato el modulo resumen del sistema
	ventana('agenda_resumen','', '<?php echo _FILE_PHP_RESUMEN_PRINCIPAL; ?>', 'Resumen de movimentos');
</script>

<!--TOOLTIP-->
<div id="toolTipBox">
<iframe id="iframeToolTip" name="iframeToolTip" src="about:blank" scrolling="no" frameborder="0" ></iframe>
</div>
<!--FIN TOOLTIP-->

<!--CerraSesion-->
<div id="cerrarSesion"  style="display:none">
  <div align="center" class="aclaraciones2" style="width:98%" ><h3><img src="interfaz/inmohost/images/iconos/alertas/alert1.png" width="32" height="33" align="absmiddle" hspace="10" /> Desea cerrar su sesi&oacute;n </h3></div>
</div>
<!--CerraSesion-->

<!--IngresoASesion-->
<div id="ingresoASesion"  style="display:none" >
<div align="center" id="login2Error" style="display:none; width:345px; height:35px" class="aclaraciones2"><img src="interfaz/inmohost/images/iconos/alertas/alert1.png" width="32" height="33" align="left"><span id="login2ErrorText"></span></div>
  <div align="center"  style="width:345px">
<form id="ingreso" name="ingreso" method="post" action="">
            <table width="200" border="0" align="center" cellpadding="0" cellspacing="5">
           		<tr>
                <td colspan="2" align="center">
					<h1>Su sesi&oacute;n ha finalizado</h1>             	
    	        </td>
                
              </tr>
              <tr>
                <td width="50%">
                	<div align="right">
	                    usuario:
    	            </div>
    	        </td>
                <td width="50%"><input name="userLogin" type="text" class="inputForm" id="userLogin" tabindex="1" style="width:100px" onkeypress="if (event.keyCode == 13){renovarSesion();}" /></td>
              </tr>
              <tr>
                <td>
                	<div align="right">
                   		contrase&ntilde;a:
               	 	</div>
                </td>
                <td>
                	<input name="pass" type="password" class="inputForm" id="passLogin" tabindex="2" style="width:100px" onkeypress="if (event.keyCode == 13){renovarSesion();}"/>
                </td>
              </tr>
            </table>
    </form>
  </div>
</div>
<!--IngresoASesion-->


<map name="Map" id="Map">
"if (event.keyCode == 13){renovarSesion();}"
	<area shape="circle" coords="26,36,25" href="javascript:chequeaForm('prpFormBuscarRapido', '<?php echo $destino1; ?>', '<?php echo $titulo; ?>', '<?php echo $url1; ?>', '<?php echo $parametros; ?>');" title="Buscar" tabindex="6" />
</map>

</body>
</html>