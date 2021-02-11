<?php 


	include ("../php/config.php");
		extract($_GET);
	extract ($_POST);
	extract ($_REQUEST);

	
 switch ($op) {
     default:
			$titulo = "Carteles"; //
			$destino1 = "generico_listado"; // listadoPropiedades
			$url1 = _FILE_PHP_GENERICO_LISTADOS;
			$parametros = "mod_edit";
         break;
         //
 }
 if ($internet)
 {
	$cart_new=str_replace($dominio_local,"localhost",_FILE_AGENDA_MEN_CARTELES_DATO);
 }
 else
 {
 	$cart_new=_FILE_AGENDA_MEN_CARTELES_DATO;
 }
?>
<script>
	document.getElementById("rub_id").chatin=true;
</script>

<table width="240" border="0" align="center" cellpadding="0" cellspacing="0" id="tablaMorir">
  <tr>
    <td><form id="FormAgendaTelefonos" name="FormAgendaTelefonos" method="post" action="">
	<input type="hidden" name="fileXMLListado" value="<?php echo _FILE_XML_CART_LISTADO; ?>"  />
	<input type="hidden" name="fileXMLHead" value="<?php echo _FILE_XML_CART_HEAD; ?>"  />
	<input type="hidden" name="mod_edit" value="<?php echo $parametros; ?>"  />
		
      <table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td colspan="2">
            <h1 align="left">Carteles </h1><hr/></td>
          </tr>
          <tr>
          <td align="center">
          <div>
              	<br>
                ID:&nbsp;<input name="prp_id_cartel" type="text" class="inputForm" id="prp_id_cartel" style="width:50px" tabindex="4" />
         </div>
         </td>
          </tr>
          <tr> 
          <td><br>
            <div align="center">
                <input name="buscar2" type="button" class="botonForm" id="buscar2" value="Listar" tabindex="7" onclick="chequeaForm('FormAgendaTelefonos', '<?php echo $destino1; ?>', '<?php echo $titulo; ?>', '<?php echo $url1; ?>', '<?php echo $parametros; ?>');" onkeypress="if (event.keyCode == 13){chequeaForm('FormAgendaTelefonos', '<?php echo $destino1; ?>', '<?php echo $titulo; ?>', '<?php echo $url1; ?>', '<?php echo $parametros; ?>');}" />
            </div></td>
        </tr>
      </table>
        </form>
    </td>
  </tr>
</table>


