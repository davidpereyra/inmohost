<?php 


	include ("../php/config.php");
	extract($_GET);
	extract ($_POST);
	extract ($_REQUEST);

switch ($op) {
     	
		default:
			$titulo = "Medios Publicitarios"; //
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
          <td width="150%"><h1 align="left">Medios Publicitarios Gr&aacute;ficos </h1>
              <hr /></td>
        </tr>
        
		<tr>
		  <td>
<?php

		$xml = _FILE_XML_PANEL_MEDIOSPUBLICITARIOS;
		$xsl = "../"._FILE_XSL_PANEL_MEDIOSPUBLICITARIOS_FORMULARIO;
		$file[0] = _FILE_PHP_GENERICO_LISTADOS;
		$file[1] = _FILE_PHP_CONTROL_MEDIOS_EDIT;
		
		//agregar datos de inmo y user
	  	include("../"._FILE_XSL_GENERICO); 

?>


		  </td>
		  </tr>
		<tr>
		
        <td><div align="center" id="botonAgregarMedios"><a href="#" onclick="displayMenu('close');position(event);ventana('edicionSimple', '&fileXML=<?echo _FILE_XML_CONTROL_MEDIOS_NEW?>&fileXSL=<?echo _FILE_XSL_CONTROL_MEDIOS_NEW?>', '<?php print _FILE_PHP_CONTROL_MEDIOS_NEW;?>', 'Agregar Medio');" class="menuItem" title="Agregar Medio" tabindex="7"><img src="interfaz/inmohost/images/iconos/32/medios.png" width="32" height="32" border="0" /><br />
            Agregar Medio</a></div>
            <div align="center" id="botonResumenMedios" style="display:none"><a href="javascript:document.FormMediosEdit.op.value='edit_ajax';document.FormMediosEdit.agregar.value='Modificar';display('botonAgregarMedios');display('botonResumenMedios');display('tablaEditMedios');display('tablaResumenMedios');" title="Editar Medios" class="menuItem" tabindex="7" ><img src="interfaz/inmohost/images/iconos/32/medios.png" width="32" height="32" border="0" /><br />
            Editar Medios</a></div>
        <hr /></td>
		<!--  
		<td><div align="center" id="botonAgregarMedios"><a href="javascript:document.FormMediosEdit.op.value='add_ajax';document.FormMediosEdit.agregar.value='Agregar';display('botonAgregarMedios');display('botonResumenMedios');display('tablaEditMedios');display('tablaResumenMedios');" class="menuItem" title="Agregar Medio" tabindex="7"><img src="interfaz/inmohost/images/iconos/32/medios.png" width="32" height="32" border="0" /><br />
            Agregar Medio</a></div>
            <div align="center" id="botonResumenMedios" style="display:none"><a href="javascript:document.FormMediosEdit.op.value='edit_ajax';document.FormMediosEdit.agregar.value='Modificar';display('botonAgregarMedios');display('botonResumenMedios');display('tablaEditMedios');display('tablaResumenMedios');" title="Editar Medios" class="menuItem" tabindex="7" ><img src="interfaz/inmohost/images/iconos/32/medios.png" width="32" height="32" border="0" /><br />
            Editar Medios</a></div>
              <hr /></td>
		-->
		  </tr>
      </table>
       
    </td>
  </tr>
</table>

