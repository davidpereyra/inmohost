<?php 


	include ("../php/config.php");
	extract($_GET);
	extract ($_POST);
	extract ($_REQUEST);
	
	
 switch ($op) {
     default:
			$titulo = "Buscar Tel&eacute;fonos"; //
			$destino1 = "generico_listado"; // listadoPropiedades
			$url1 = _FILE_PHP_GENERICO_LISTADOS;
			$parametros = "mod_edit";
         break;
         //
 }
 if ($internet)
 {
	$tel_new=str_replace($dominio_local,"localhost",_FILE_AGENDA_MEN_TELEFONO_NEW);
 }
 else
 {
 	$tel_new=_FILE_AGENDA_MEN_TELEFONO_NEW;
 }
?>
<script>
	document.getElementById("rub_id").chatin=true;
</script>

<table width="240" border="0" align="center" cellpadding="0" cellspacing="0" id="tablaMorir">
  <tr>
    <td><form id="FormAgendaTelefonos" name="FormAgendaTelefonos" method="post" action="">
	<input type="hidden" name="fileXMLListado" value="<?php echo _FILE_XML_TEL_LISTADO; ?>"  />
	<input type="hidden" name="fileXMLHead" value="<?php echo _FILE_XML_TEL_HEAD; ?>"  />
	<input type="hidden" name="mod_edit" value="<?php echo $parametros; ?>"  />
      <table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td colspan="2">
            <h1 align="left">Agenda de Tel&eacute;fonos </h1><hr /></td>
          </tr>
		<tr>
          <td width="50%">
            <div align="right">Rubro:</div>
          </td>
          <td width="50%"><div align="left">
              <select name="rub_id" class="inputForm" id="rub_id" tabindex="1" onkeypress="if (event.keyCode == 13){chequeaForm('prpFormBuscar', '<?php echo $destino1; ?>', '<?php echo $titulo; ?>', '<?php echo $url1; ?>', '<?php echo $parametros; ?>');}" >
		<?php 
                /* REGS= ID,Descripcion  */
					$regs=" rub_id,rub_desc ";
					$tablas=" rubros ";
					$id=$rub_id;
					$xtras=" order by rub_desc ASC";
                include("../"._FILE_SCRIPT_PHP_SELECT); 
                	$regs="";
                	$tablas="";
                	$id="";
                	$xtras="";
		?>
              </select>
         </div></td>
        </tr>
        <tr>
          <td><div align="right">Nombre/Apellido:
            </div></td>
          <td>
            <div align="left">
              <input name="txtBuscar" type="text" class="inputForm" id="txtBuscar" style="width:80px" tabindex="4" onkeypress="if (event.keyCode == 13){chequeaForm('FormAgendaTelefonos', '<?php echo $destino1; ?>', '<?php echo $titulo; ?>', '<?php echo $url1; ?>', '<?php echo $parametros; ?>');}"/><!--return handleEnter(this, event);-->
          </div></td>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td>
            <div align="right">
              <input name="buscar" type="button" class="botonForm" id="buscar" value="Listar" tabindex="7" onclick="chequeaForm('FormAgendaTelefonos', '<?php echo $destino1; ?>', '<?php echo $titulo; ?>', '<?php echo $url1; ?>', '<?php echo $parametros; ?>');" onkeypress="if (event.keyCode == 13){chequeaForm('FormAgendaTelefonos', '<?php echo $destino1; ?>', '<?php echo $titulo; ?>', '<?php echo $url1; ?>', '<?php echo $parametros; ?>');}" />
            </div></td>
        </tr>
        <tr>
          <td colspan="2"><hr /></td>
          </tr>
        <tr>
          <td colspan="2">
            <div align="center"><a href="javascript:;" onclick="position(event); toolTip('<?php echo $tel_new; ?>',this)" title="Agregar Tel&eacute;fono" class="menuItem"><img src="interfaz/inmohost/images/iconos/32/telefono.png" width="32" height="32" border="0" /><br />
            Agregar Tel&eacute;fono</a></div>
          </td>
          </tr>
      </table>
        </form>
    </td>
  </tr>
</table>


