<?php 


	include ("../php/config.php");
	extract($_GET);
	extract ($_POST);
	extract ($_REQUEST);

switch ($op) {
     	
		default:
			$titulo = "Rubros"; //
			$destino1 = ""; // listadoPropiedades
			$url1 = "system/php/abms/abm_ajax.php";
			$parametros = "mod_edit";
         break;
         //
 }
?>
<table width="240" border="0" align="center" cellpadding="0" cellspacing="0" id="tablaMorir">
  <tr>
    <td>
      <table width="100%" border="0" cellpadding="1" cellspacing="1">
        <tr>
          <td width="150%"><h1 align="left">Rubros </h1>
              <hr /></td>
        </tr>
        
		<tr>
		  <td>
<?php

		$xml = _FILE_XML_PANEL_RUBROS;
		$xsl = "../"._FILE_XSL_PANEL_RUBROS_FORMULARIO;
		$file[0] = _FILE_PHP_GENERICO_LISTADOS;
		$file[1] = _FILE_PHP_CONTROL_RUBROS_EDIT;
		
		//agregar datos de inmo y user
	  	include("../"._FILE_XSL_GENERICO); 

?>


		  </td>
		  </tr>
		<tr>
		
        <td><div align="center" id="botonAgregar"><a href="#" onclick="displayMenu('close');position(event);ventana('edicionSimple', '&fileXML=<?echo _FILE_XML_CONTROL_RUBROS_NEW?>&fileXSL=<?echo _FILE_XSL_CONTROL_RUBROS_NEW?>', '<?php print _FILE_PHP_CONTROL_RUBROS_NEW;?>', 'Agregar Rubro');" class="menuItem" title="Agregar Rubro" tabindex="7"><img src="interfaz/inmohost/images/iconos/32/rubros.png" width="32" height="32" border="0" /><br />
            Agregar Rubro</a></div>
            
            
        <hr /></td>
	
		  </tr>
      </table>
       
    </td>
  </tr>
</table>
