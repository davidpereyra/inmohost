<?php 


	include ("../php/config.php");
	extract($_GET);
	extract ($_POST);
	extract ($_REQUEST);

switch ($op){
     	
		default:
			$titulo = "Sectores"; //
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
          <td width="150%"><h1 align="left">Sectores</h1>
              <hr /></td>
        </tr>
        
		<tr>
		  <td>
<?php
		
		$xml = _FILE_XML_PANEL_SECTORES;
		$xsl = "../"._FILE_XSL_PANEL_SECTORES_FORMULARIO;
		$file[0] = _FILE_PHP_GENERICO_LISTADOS;
		$file[1] = _FILE_PHP_CONTROL_SECTORES;
		$file[2] = _FILE_XML_CONTROL_SECTORES;
		$file[3] = _FILE_XSL_CONTROL_SECTORES;
		
		//agregar datos de inmo y user
	  	include("../"._FILE_XSL_GENERICO); 

?>

		  </td>
		  </tr>
		<tr>
		
        <td><div align="center" id="botonAgregar"><a href="#" onclick="displayMenu('close');position(event);ventana('edicionSimple', '&fileXML=<?echo _FILE_XML_CONTROL_SECTORES?>&fileXSL=<?echo _FILE_XSL_CONTROL_SECTORES?>&mod_tip=add&nomVentana=edicionSimple', '<?php print _FILE_PHP_CONTROL_SECTORES;?>', 'Agregar Sector');" class="menuItem" title="Agregar Sector" tabindex="7"><img src="interfaz/inmohost/images/iconos/32/rubros.png" width="32" height="32" border="0" /><br />
            Agregar Sector</a></div>
           <hr/></td>
	
		  </tr>
      </table>
       
    </td>
  </tr>
</table>
