<?php 

	include ("../php/config.php");
	extract($_GET);
	extract ($_POST);
	extract ($_REQUEST);

	
 switch ($op) {
 	default:
			$titulo = "Listar Citas"; //
			$destino1 = "generico_listado"; 
			$url1 = _FILE_PHP_GENERICO_LISTADOS;
			$parametros = "mod_edit";
         break;
         //
 }

if ($internet){
	$FILE_XML_CITAS_LISTADO = str_replace("localhost",$dominio_local,_FILE_XML_CITAS_LISTADO);	
	$FILE_XML_CITAS_HEAD = str_replace("localhost",$dominio_local,_FILE_XML_CITAS_HEAD);	
}else{
	$FILE_XML_CITAS_LISTADO =_FILE_XML_CITAS_LISTADO;
	$FILE_XML_CITAS_HEAD = _FILE_XML_CITAS_HEAD;
}

?>
<table width="240" border="0" align="center" cellpadding="0" cellspacing="0" id="tablaMorir">
  <tr>
    <td><form id="FormAgendaCitas" name="FormAgendaCitas" method="post" action="">
	<input type="hidden" name="fileXMLListado" value="<?php echo $FILE_XML_CITAS_LISTADO; ?>"  />
	<input type="hidden" name="fileXMLHead" value="<?php echo $FILE_XML_CITAS_HEAD; ?>"  />
      <table width="100%" border="0" cellpadding="1" cellspacing="1">
        <tr>
          <td colspan="2">
            <h1 align="left">Citas</h1>
			
			</td>
          </tr>
		<tr>
		  <td colspan="2">
		<?php

	// Si ingresa por internet cambio la ruta de resumen general
	if ($internet)
		{
			$xml = str_replace("localhost",$dominio_local,_FILE_XML_RESUMEN_GENERAL);
			$xsl = "../"._FILE_XSL_RESUMEN_FORMULARIO;
		}
		else
		{
			$xml = _FILE_XML_RESUMEN_GENERAL;
			$xsl = "../"._FILE_XSL_RESUMEN_FORMULARIO;			
		}

			$id = "citas";
			$file[0] = _FILE_PHP_AGENDA_CITAS;
			//agregar datos de inmo y user

		  //	include("../"._FILE_XSL_GENERICO); 

		?>
		<table width="100%" border="0" cellpadding="1" cellspacing="1" class="tableOscura" id="tablaListarCitas" style="display:none">
              <tr class="tableClara">
                <td><div align="right">Monitor:</div></td>
                <td>
				<select name="emp_id" id="emp_id" class="inputForm" onkeypress="if (event.keyCode == 13){chequeaForm('FormAgendaCitas', '<?php echo $destino1; ?>', '<?php echo $titulo; ?>', '<?php echo $url1; ?>', '<?php echo $parametros; ?>');}" tabindex="1">
                <?php 
                /* REGS= ID,Descripcion  */
					$regs=" emp_id,CONCAT(nombre,' ',apellido) ";
					$tablas=" empleados ";
					$id=$usr_id;
					$xtras=" order by nombre,apellido ASC";
                include("../"._FILE_SCRIPT_PHP_SELECT); 
                	$regs="";
					$tablas="";
					$filtro=""; 
					$id="";
					$xtras="";                
                ?>
                </select>
				</td>
              </tr>
              <tr class="tableClara">
                <td><div align="right">Desde:</div></td>
                <td>
				<input name="desdeCitas" type="text" id="desdeCitas" value="00-00-0000" class="inputFecha" readonly />
				<input id="desdeCitasDia" type="hidden" name="desdeCitasDia" value="00" />
				<input id="desdeCitasMes" type="hidden" name="desdeCitasMes" value="00" />
				<input id="desdeCitasAno" type="hidden" name="desdeCitasAno" value="0000" />
                  <a href="javascript:;" title="seleccionar fecha" class="menu" onclick="position(event); toolTip('<?php echo _FILE_PHP_MEN_CALENDARIO; ?>&destino=desdeCitas',this)" tabindex="2"><img src="interfaz/inmohost/images/iconos/calendario.gif" width="16" height="15" border="0" align="absmiddle" /></a>
				  </td>
              </tr>
              <tr class="tableClara">
                <td><div align="right">Hasta:</div></td>
                <td>
                  <input name="hastaCitas" type="text" id="hastaCitas" value="00-00-0000" class="inputFecha" readonly />
				<input id="hastaCitasDia" type="hidden" name="hastaCitasDia" value="00" />
				<input id="hastaCitasMes" type="hidden" name="hastaCitasMes" value="00" />
				<input id="hastaCitasAno" type="hidden" name="hastaCitasAno" value="0000" />
                  <a href="javascript:;" title="seleccionar fecha" class="menu" onclick="position(event); toolTip('<?php echo _FILE_PHP_MEN_CALENDARIO; ?>&destino=hastaCitas',this)" tabindex="3"><img src="interfaz/inmohost/images/iconos/calendario.gif" width="16" height="15" border="0" align="absmiddle" /></a>
				  </td>
              </tr>
              <tr class="tableClara">
                <td><div align="right">Id Inmueble:</div></td>
                <td><input name="prp_id" type="text" class="inputForm" id="prp_id" style="width:60px"  onkeypress="if (event.keyCode == 13){chequeaForm('FormAgendaCitas', '<?php echo $destino1; ?>', '<?php echo $titulo; ?>', '<?php echo $url1; ?>', '<?php echo $parametros; ?>');}" tabindex="4"/></td>
              </tr>
              <tr class="tableClara">
                <td><div align="right">Estado:</div></td>
                <td><select name="ver_canceladas" class="inputForm" onkeypress="if (event.keyCode == 13){chequeaForm('FormAgendaCitas', '<?php echo $destino1; ?>', '<?php echo $titulo; ?>', '<?php echo $url1; ?>', '<?php echo $parametros; ?>');}" tabindex="5">
					  <option value="3">Todas</option>
                      <option value="0">Pendientes</option>
                      <option value="1">Canceladas</option>
                      <option value="2">Finalizadas</option>
                     </select>
					</td>
              </tr>
             <tr class="tableClara">
                <td colspan="2">
				<div align="right">
				  <input name="listar" type="button" class="botonForm" id="listar" value="Listar" tabindex="6" onclick="chequeaForm('FormAgendaCitas', '<?php echo $destino1; ?>', '<?php echo $titulo; ?>', '<?php echo $url1; ?>', '<?php echo $parametros; ?>');" onkeypress="if (event.keyCode == 13){chequeaForm('FormAgendaCitas', '<?php echo $destino1; ?>', '<?php echo $titulo; ?>', '<?php echo $url1; ?>', '<?php echo $parametros; ?>');}" />
				</div></td>
              </tr>
          </table>
		  </td>
		  </tr>
        
        <tr>
          <td colspan="2"><hr /></td>
          </tr>
        <tr>
          <td width="50%">
            <div align="center" id="botonListarCitas"><a href="javascript:display('botonListarCitas');display('botonResumenCitas');display('tablaListarCitas');display('tablaResumenCitas');document.getElementById('emp_id').focus();" title="Listar Citas" class="menuItem" tabindex="7"><img src="interfaz/inmohost/images/iconos/32/listar.png" width="32" height="32" border="0" /><br />
            Listar Citas</a></div>
            <div align="center" id="botonResumenCitas" style="display:none"><a href="javascript:display('botonListarCitas');display('botonResumenCitas');display('tablaListarCitas');display('tablaResumenCitas');" title="Resumen de Citas" class="menuItem" tabindex="7"><img src="interfaz/inmohost/images/iconos/32/citas.png" width="32" height="32" border="0" /><br />
            Resumen de Citas</a></div>
			</td>
          <td width="50%"><div align="center"><a href="javascript:display('menuPrincipal'); ventana('agenda_citas', '&prp_usr=<?php echo $prp_usr; ?>&mod_edit=1', '<?php echo _FILE_PHP_AGENDA_CITAS; ?>', 'Agregar Cita');" onclick="" title="Agregar Cita" class="menuItem" tabindex="8"><img src="interfaz/inmohost/images/iconos/32/citas.png" width="32" height="32" border="0" /><br />
            Agregar Cita</a></div></td>
        </tr>

      </table>
        </form>
    </td>
  </tr>
</table>


