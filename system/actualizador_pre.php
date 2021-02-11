<?php
	extract($_GET);
	extract ($_POST);
	extract ($_REQUEST);
	
	include ("php/config.php");
	include ("php/sec_head.php");

	//libreria de dreamwaeaver XLST para inclucion de archivos de XML con XSLT
	include(_FILE_XSL_CLASS);

	// cambio la hoja de estylos por defecto
	//$otraCSS = "styleGris.css";

	include (_FILE_UTIL_MEN);

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1"/>
<title>::::::::::::::</title>

<script language='javascript'>
//	parent.Dialog.info("<br>POR FAVOR, AGUARDE MIENTRAS SE ACTUALIZA EL SISTEMA ...", {width:200, height:100, showProgress: true});
//	hideToolTip();
</script>

<?php
	include("head.php");

	if($borrar_cache_inm==1){
		if($e==1){
			?>
				<script language="Javascript">
						parent.$('pieMensajes').innerHTML='<?php echo _MENS_ACT_OK; ?>';
						parent.Windows.close("win_actualizador");
						parent.traeURL("<?php echo _FILE_FORM_PUBLICAR_PRP_WWW; ?>", "contenidoMenuActual1");
						parent.display("menuPrincipal");
						parent.Dialog.okCallback();
						alert("Ocurrio un error al subir sus propiedades. Pongase en contacto con el soporte técnico de inmohost al telefono 0261-4200685 o desde la página web www.grupoclick.com.ar. \n\rGracias");
				</script>
			<?php 
			
		}else{
		
		
			mysql_query("delete from cambios;");
			?>
				<script language="Javascript">
						parent.$('pieMensajes').innerHTML='<?php echo _MENS_ACT_OK; ?>';
						parent.Windows.close("win_actualizador");
						parent.traeURL("<?php echo _FILE_FORM_PUBLICAR_PRP_WWW; ?>", "contenidoMenuActual1");
						parent.display("menuPrincipal");
						parent.Dialog.okCallback();
				</script>
			<?php 
		}
				
	}
	
	if($borrar_cache_bar_priv==1){
		if($e==1){
			
			?>
				<script language="Javascript">
						parent.$('pieMensajes').innerHTML='<?php echo _MENS_ACT_OK; ?>';
						parent.Windows.close("win_actualizador");
						parent.traeURL("<?php echo _FILE_PHP_BAR_PRIV_PUBLICAR ?>", "contenidoMenuActual5");
						parent.display("menuPrincipal");
						parent.Dialog.okCallback();
						alert("Ocurrio un error al subir sus barrios privados. Pongase en contacto con el soporte técnico de inmohost al telefono 0261-4200685 o desde la página web www.grupoclick.com.ar. \n\rGracias");
				</script>
			<?php 
		}else{
			mysql_query("delete from cambios_bar_priv;");
			?>
				<script language="Javascript">
						parent.$('pieMensajes').innerHTML='<?php echo _MENS_ACT_OK; ?>';
						parent.Windows.close("win_actualizador");
						parent.traeURL("<?php echo _FILE_PHP_BAR_PRIV_PUBLICAR ?>", "contenidoMenuActual5");
						parent.display("menuPrincipal");
						parent.Dialog.okCallback();
						
				</script>
			<?php 
			
		}
	}
	
	if($borrar_cache_medios==1){
		
		
		$res=mysql_query("select pub_id from cambios_medios");
		while ($fil_med=mysql_fetch_array($res)) {
			$cad_act="update publicaciones set pub_env=now() where pub_id=$fil_med[pub_id]";
			mysql_query($cad_act);
		}
		
		mysql_query("delete from cambios_medios;");
		
		
		?>
			<script language="Javascript">
					parent.$('pieMensajes').innerHTML='<?php echo _MENS_ACT_OK; ?>';
					parent.Windows.close("win_actualizador");
			</script>
		<?php 
				
	}
	
	if($borrar_cache_usuario==1){
		if($e==1){
			?>
				<script language="Javascript">
						parent.$('pieMensajes').innerHTML='<?php echo _MENS_ACT_OK; ?>';
						parent.Windows.close("win_actualizador");
						parent.traeURL("<?php echo _FILE_PHP_EMP_PUBLICAR ?>", "contenidoMenuActual5");
						parent.display("menuPrincipal");
						parent.Dialog.okCallback();
						alert("Ocurrio un error al subir sus empleados. Pongase en contacto con el soporte técnico de inmohost  al telefono 0261-4200685 o desde la página web www.grupoclick.com.ar. \n\rGracias");
				</script>
				
		<?	
		}else{
			mysql_query("delete from cambios_emp;");
			?>
			
				<script language="Javascript">
						parent.$('pieMensajes').innerHTML='<?php echo _MENS_ACT_OK; ?>';
						parent.Windows.close("win_actualizador");
						parent.traeURL("<?php echo _FILE_PHP_EMP_PUBLICAR ?>", "contenidoMenuActual5");
						parent.display("menuPrincipal");
						parent.Dialog.okCallback();
						
				</script>
			<?php 
		}			
	}
		
?>
<script language="JavaScript">

	function comprobar_acts(){
		
	<?php 
	
		if($propiedades==1||$medios==1||$bar_priv==1||$usuario==1){

			if($medios==1){
			
				$cadena="select * from cambios_medios";
				$res=mysql_query($cadena);
				
				if(mysql_num_rows($res)){
					echo "parent.$('pieMensajes').innerHTML='"._MENS_ACT_COMENZANDO."'; 
					location.href='conectar.php?propiedades=$propiedades&medios=$medios&red_cim=$red_cim';"; 
				}else{
					echo "alert('No existen publicaciones pendientes');";
					echo "parent.$('pieMensajes').innerHTML='';";
					echo "parent.Windows.close('win_actualizador');";
				}
			
			}else if($bar_priv==1){
				echo "parent.$('pieMensajes').innerHTML='"._MENS_ACT_COMENZANDO."'; 
					location.href='conectar.php?propiedades=$propiedades&medios=$medios&red_cim=$red_cim&bar_priv=$bar_priv';"; 
			
			}else if($usuario==1){
				echo "parent.$('pieMensajes').innerHTML='"._MENS_ACT_COMENZANDO."'; 
					location.href='conectar.php?usuario=$usuario';"; 
			
			}else{	
				echo "parent.$('pieMensajes').innerHTML='"._MENS_ACT_COMENZANDO."'; 
				location.href='conectar.php?propiedades=$propiedades&medios=$medios&red_cim=$red_cim';"; 
			
			}
		}
	?>
}//fin funcion comprobar acts
</script>
</head>
<body onload="parent.$('pieMensajes').innerHTML='';comprobar_acts()">
<table width="100%" height="50" border="0" cellpadding="0" cellspacing="0">
  <tr class="tableOscura">
    <td ><h2 align="left">&nbsp;Ultima Modificaci&oacute;n <?php echo formato_fecha (_NOW, 'fechaAll'); ?></h2></td>
    <td ><div align="center" id="idAmpDetalles"><a href="javascript:;parent.WinActualizador.setSize(400, 200);$('tablaDetallesAct').show();$('idAmpDetalles').hide();" class="menuItem">[Ampliar datos]</a></div></td>
  </tr>
  <tr>
    <td>
	<div  align="right" ></div>
	<h2><?php echo "&nbsp;-&nbsp;". _MENS_ACT_ENCONTRADO; ?></h2>
    <h2><?php echo "&nbsp;-&nbsp;"._MENS_ACT_COMENZANDO; ?></h2>	</td>
    <td width="90" class="tableClara" style="border:1px #000000 solid;" >
		<div align="center" ><img src="../interfaz/inmohost/images/precarga.gif" width="50px" height="50px" border="0" /></div>  
		<a href="javascript:parent.Windows.close('win_actualizador')"> Cancelar </a>
		</td>
  </tr>
</table>

<table width="100%" border="0" cellpadding="1" cellspacing="2" id="tablaDetallesAct" style="display:none">
  
  <tr>
    <td width="50%" valign="top"><h2 align="left">Publicar Propiedades en internet</h2>
      <br />
    <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
      <tr>
        <td>

<?php	
	$Item_xsl = new MM_XSLTransform();
	$Item_xsl->setXML(_FILE_XML_ACTUALIZADOR_RESUMEN."?tipo=inmuebles");
	$Item_xsl->setXSL(_FILE_XSL_ACTUALIZADOR_RESUMEN);
	$Item_xsl->addParameter("file0", _FILE_PRP_MEN_WWW);
	$Item_xsl->addParameter("id", "inmueblesFull");
	echo $Item_xsl->Transform();
	
?> </td>
   </tr>
</table></td>
</tr>
	<tr><td><hr /></td></tr>
  <tr>
    <td valign="top"><h2 align="left">Publicar cambios de p&aacute;gina web </h2>
        <br />
        <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0" >
          <tr>
            <td>
		<?php
			$Item1_xsl = new MM_XSLTransform();
			$Item1_xsl->setXML(_FILE_XML_ACTUALIZADOR_RESUMEN."?tipo=web");
			$Item1_xsl->setXSL(_FILE_XSL_ACTUALIZADOR_RESUMEN);
			$Item1_xsl->addParameter("file0", _FILE_WWW_MEN_PUBLICAR);
			$Item1_xsl->addParameter("id", "webFull");
			echo $Item1_xsl->Transform();
		?></td>
          </tr>
      </table></td>
  </tr>
  <tr>
    <td><div align="center"><a href="javascript:;parent.WinActualizador.setSize(350, 65);$('tablaDetallesAct').hide();$('idAmpDetalles').show();" class="menuItem">[Ocultar datos]</a></div></td>
  </tr>
</table>

</body>
</html>
