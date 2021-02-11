<?php 


	include ("../php/config.php");
	extract($_GET);
	extract ($_POST);
	extract ($_REQUEST);


?>
<table width="240" border="0" align="center" cellpadding="0" cellspacing="0" id="tablaMorir">
  <tr>
    <td colspan="4" ><h1 align="left">Publicar cambios de p&aacute;gina web </h1>
      <hr /></td>
  </tr>
 <tr><td>
<?php
		$xml = _FILE_XML_ACTUALIZADOR_RESUMEN."?tipo=web";
		$xsl = "../"._FILE_XSL_ACTUALIZADOR_RESUMEN;
		$id = "web";
		$file[0] = _FILE_WWW_MEN_PUBLICAR;
		//agregar datos de inmo y user
	  	include("../"._FILE_XSL_GENERICO); 
?>

 </td>
 </tr>
 <tr>
   <td><div align="center"><a href="javascript:ventana('actualizador','', '<?php echo _FILE_PHP_ACTUALIZADOR; ?>', 'Actualizando el Sistema');" class="menuItem"><img src="interfaz/inmohost/images/iconos/32/actualizar.png" alt="Actualizar" width="32" height="32" hspace="3" vspace="5" border="0" align="absmiddle" /><br />
    Actualizar</a></div></td>
 </tr>
</table>


