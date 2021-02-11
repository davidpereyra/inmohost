<?php 


	include ("../php/config.php");
	extract($_GET);
	extract ($_POST);
	extract ($_REQUEST);
	

?>
<table width="240" border="0" align="center" cellpadding="0" cellspacing="0" id="tablaMorir">
  <tr>
    <td colspan="4" ><h1 align="left">Publicar Propiedades en internet</h1>
      <hr /></td>
  </tr>
  <?
  $consulta=mysql_query("select cambio_id,cambio_det,prp_id,date_format(fecha_c,'%d-%m-%Y') from cambios");
//REVISAR CONEXION A INTERNET
if(mysql_num_rows($consulta)){
	?>
 <tr>
   <td>
<?php
		$xml = _FILE_XML_ACTUALIZADOR_RESUMEN."?tipo=inmuebles";
		$xsl = "../"._FILE_XSL_ACTUALIZADOR_RESUMEN;
		$id = "inmuebles";
		$file[0] = _FILE_PRP_MEN_WWW;
		//agregar datos de inmo y user
	  	include("../"._FILE_XSL_GENERICO); 
?>
   </td>
 </tr>
 <tr>
   <td><div align="center"> <a href="javascript:ventana('actualizador','propiedades=1&medios=0', '<?php echo _FILE_PHP_ACTUALIZADOR; ?>', 'Actualizando el Sistema'); display('menuPrincipal');" class="menuItem"><img src="interfaz/inmohost/images/iconos/32/actualizar.png" alt="Actualizar" width="32" height="32" hspace="3" vspace="5" border="0" align="absmiddle" /><br />
    Actualizar</a></div></td>
 </tr>
<?	
}else{
?>
	<tr>
  <td>
    	No hay propiedades para actualizar</td>
 </tr>
	
<?
}
  ?>
</table>


