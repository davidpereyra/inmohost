<?php 


	include ("../php/config.php");
	

?>
<table width="240" border="0" align="center" cellpadding="0" cellspacing="0" id="tablaMorir">
  <tr>
    <td colspan="4" ><h1 align="left">Publicar Barrios en internet</h1>
      <hr /></td>
  </tr>
  <?
  $consulta=mysql_query("select cambio_id,cambio_det,bar_id,date_format(cambio_fecha,'%d-%m-%Y') from cambios_bar_priv");

if(mysql_num_rows($consulta)){
	?>
 <tr>
   <td>
<?php
		$xml = _FILE_XML_ACTUALIZADOR_BAR_PRIV;
		$xsl = "../"._FILE_XSL_ACTUALIZADOR_BAR_PRIV;
		
		$file[0] = _FILE_BAR_PRIV_DET;
		//agregar datos de inmo y user
	  	include("../"._FILE_XSL_GENERICO); 
?>
   </td>
 </tr>
 <tr>
   <td><div align="center"> <a href="javascript:ventana('actualizador','propiedades=0&medios=0&usuario=0&bar_priv=1', '<?php echo _FILE_PHP_ACTUALIZADOR; ?>', 'Actualizando el Sistema'); display('menuPrincipal');" class="menuItem"><img src="interfaz/inmohost/images/iconos/32/actualizar.png" alt="Actualizar" width="32" height="32" hspace="3" vspace="5" border="0" align="absmiddle" /><br />
    Actualizar</a></div></td>
 </tr>
<?	
}else{
?>
	<tr>
  <td>
    	No hay barrios para actualizar</td>
 </tr>
	
<?
}
  ?>
</table>