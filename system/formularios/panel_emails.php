<?php 


	include ("../php/config.php");
	
	
 switch ($op) {
     default:
			$titulo = "Emails"; //
			$destino1 = "generico_listado"; // listadoPropiedades
			$url1 = _FILE_PHP_GENERICO_LISTADOS;
			$parametros = "mod_edit";
         break;
         //
 }
?>
<table width="240" border="0" align="center" cellpadding="0" cellspacing="0" id="tablaMorir">
  <tr>
    <td><form id="FormPanelEmails" name="FormPanelEmails" method="post" action="">
	<input type="hidden" name="fileXMLListado" value="<?php echo _FILE_XML_TEL_LISTADO; ?>"  />
	<input type="hidden" name="fileXMLHead" value="<?php echo _FILE_XML_TEL_HEAD; ?>"  />
      <table width="100%" border="0" cellpadding="1" cellspacing="1">
        <tr>
          <td width="100%">
            <h1 align="left">Emails</h1>
			<hr /></td>
          </tr>
      </table>
        </form>
    </td>
  </tr>
</table>


