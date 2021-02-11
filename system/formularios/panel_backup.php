<?php 


	include ("../php/config.php");
	
	
 switch ($op) {
     default:
			$titulo = "Barrios / Complejos privados"; //
			$destino1 = "generico_listado"; // listadoPropiedades
			$url1 = _FILE_PHP_GENERICO_LISTADOS;
			$parametros = "mod_edit";
         break;
         //
 }
?>
<table width="240" border="0" align="center" cellpadding="0" cellspacing="0" id="tablaMorir">
  <tr>
    <td><form id="FormPanelVarios" name="FormPanelVarios" method="post" action="">
	
      <table width="100%" border="0" cellpadding="1" cellspacing="1">
        <tr>
          <td colspan="2">
            <h1 align="left">Copia de Seguridad</h1>
			<hr />			</td>
          </tr>
        
        <tr>
         <td valign="top"><div align="center"><a href="javascript:display('menuPrincipal');ventana('panel_backup','&amp;fileXML=<?php echo _FILE_XML_BACKUP; ?>&amp;fileXSL=<?php echo _FILE_XSL_HACER_BACKUP;?>&amp;tipo=1&amp;mod_tip=add&amp;nomVentana=panel_backup', '<?php echo _FILE_PHP_BACKUP; ?>', 'Hacer copia de seguridad');" class="menuItem"><img src="interfaz/inmohost/images/iconos/32/recuperar.png" width="32" height="32" border="0" /><br />
            Realizar copia de seguridad</a></div></td>
          <td width="50%" valign="top"><div align="center"><a href="javascript:display('menuPrincipal');ventana('panel_backup','&amp;fileXML=<?php echo _FILE_XML_BACKUP; ?>&amp;fileXSL=<?php echo _FILE_XSL_RESTAURAR_BACKUP; ?>&amp;tipo=2&amp;mod_tip=edit&amp;nomVentana=panel_backup', '<?php echo _FILE_PHP_BACKUP; ?>', 'Restaurar copia de seguridad');" class="menuItem" ><img src="interfaz/inmohost/images/iconos/32/atras.png" width="32" height="32" border="0" /><br />
            Restaurar copia de seguridad</a></div></td>
        </tr>
      </table>
        </form>
    </td>
  </tr>
</table>


