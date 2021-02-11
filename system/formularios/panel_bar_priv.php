<?php 


	include ("../php/config.php");

switch ($op) {
     default:
			$titulo = "Barrios Privados"; //
			$destino1 = ""; // 
			$url1 = "";
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
          <td colspan="2" width="150%"><h1 align="left">Administraci&oacute;n de Barrios Privados</h1>
              <hr /></td>
        </tr>
        
		<tr>
		  <td colspan="2">
<?php
		$xml = _FILE_XML_PANEL_BAR_PRIV;
		$xsl = "../"._FILE_XSL_PANEL_BAR_PRIV_FORMULARIO;

		$file[0] = _FILE_XML_BAR_PRIV;
		$file[1] = _FILE_PHP_BAR_PRIV;
		$file[2] = _FILE_XSL_BAR_PRIV_DET;
		$file[3] = _FILE_PHP_BAR_PRIV_DET;

		//agregar datos de inmo y user
	  	include("../"._FILE_XSL_GENERICO); 
?>
	
		  </td>
		  </tr>
		<tr>
          <td>
          	<div align="center" id="botonAgregar"><a href="javascript:display('menuPrincipal');ventana('bar_priv','&fileXML=<?echo _FILE_XML_BAR_PRIV?>&mod_tip=add&nomVentana=bar_priv&fileXSL=<?echo _FILE_XSL_BAR_PRIV?>','<?echo _FILE_PHP_BAR_PRIV?>','Alta de Barrio Privado');" class="menuItem" title="Agregar Barrio Privado" tabindex="7"><img src="interfaz/inmohost/images/iconos/32/barrios.png" width="32" height="32" border="0" /><br>
            Agregar Barrio Privado</a></div>
            </td>
            <td>
            
	            <div align="center" id="botonResumen"><a href="javascript:traeURL('<?echo _FILE_PHP_BAR_PRIV_PUBLICAR?>','contenidoMenuActual5');" title="Actualizar Barrios en Internet" class="menuItem" tabindex="7"><img src="interfaz/inmohost/images/iconos/32/actualizar.png" width="32" height="32" border="0" /><br />
	            Actualizar en Internet</a></div>
              </td>
		  </tr>
		  <tr>
          <td colspan="2">
          	<hr/>
            </td>
		  </tr>
      </table>
    </td>
  </tr>
</table>
