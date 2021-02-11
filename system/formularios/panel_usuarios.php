<?php 


	include ("../php/config.php");
	extract($_GET);
	extract ($_POST);
	extract ($_REQUEST);

switch ($op) {
     default:
			$titulo = "Usuarios"; //
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
          <td width="150%" colspan="2"><h1 align="left">Administraci&oacute;n de Usuarios </h1>
              <hr /></td>
        </tr>
        
		<tr>
		  <td colspan="2">
<?php
		$xml = _FILE_XML_PANEL_USUARIOS;
		$xsl = "../"._FILE_XSL_PANEL_USUARIOS_FORMULARIO;

		$file[0] = _FILE_PHP_GENERICO_LISTADOS;
		$file[1] = _FILE_PHP_USUARIOS_EDIT;

		//agregar datos de inmo y user
	  	include("../"._FILE_XSL_GENERICO); 
?>
	
		  </td>
		  </tr>
		<tr>
          <td>
          	<div align="center" id="botonAgregarUsuarios"><a href="javascript:display('menuPrincipal');ventana('edicionSimple','&fileXML=<?echo _FILE_XML_USUARIOS?>&fileXSL=<?echo _FILE_XSL_USUARIOS?>','<?echo _FILE_PHP_USUARIOS?>','Alta de Usuario');" class="menuItem" title="Agregar Usuario" tabindex="7"><img src="interfaz/inmohost/images/iconos/32/usuario.png" width="32" height="32" border="0" /><br />
            Agregar Usuario</a></div>
           </td>
           <td> 
            <div align="center" id="botonResumenUsuarios"><a href="javascript:traeURL('<?echo _FILE_PHP_EMP_PUBLICAR?>','contenidoMenuActual5');" class="menuItem"><img src="interfaz/inmohost/images/iconos/32/actualizar.png" width="32" height="32" border="0" /><br />
            Publicar Usuarios en la Web</a></div>
             </td>	
            <tr> 
             <td colspan="2"> <hr/></td>
             </tr>
		  </tr>
      </table>
       
    </td>
  </tr>
</table>
