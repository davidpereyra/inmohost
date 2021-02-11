<?php 


	include ("../php/config.php");
	extract($_GET);
	extract ($_POST);
	extract ($_REQUEST);
	
	
 switch ($op) {
     default:
			$titulo = "Generar Informes sobre Citas"; //
			$destino1 = "inf_listado"; // listadoPropiedades
			$url1 = _FILE_PHP_INF_LISTADO;
			$parametros = "mod_search";
         break;
         //
 }
?>
<table width="240" border="0" align="center" cellpadding="0" cellspacing="0" id="tablaMorir">
  <tr>
    <td><form id="FormInformesCitas" name="FormInformesCitas" method="post" action="">
      <table width="100%" border="0" cellpadding="1" cellspacing="1">
        <tr>
          <td width="100%" colspan="2">
            <h1 align="left">Generar Informes sobre Citas</h1>
			<hr />			</td>
          </tr>
		<tr>
		  <td colspan="2"><table width="100%" border="0" cellpadding="1" cellspacing="1" class="tableOscura" id="tablaListarCitas">
            <tr class="tableClara">
              <td><div align="right">Monitor:</div></td>
              <td><select name="emp_id" id="emp_id" class="inputForm" onkeypress="if (event.keyCode == 13){chequeaForm('FormInformesCitas', '<?php echo $destino1; ?>', '<?php echo $titulo; ?>', '<?php echo $url1; ?>', '<?php echo $parametros; ?>');}" tabindex="1">
                  <?php 
                /* REGS= ID,Descripcion  */
					$regs=" usr_id,usr_raz ";
					$tablas=" usuarios ";
					$id=$usr_id;
					$xtras=" order by usr_raz ASC";
                include("../"._FILE_SCRIPT_PHP_SELECT); 
                    $regs="";
                	$tablas="";
                	$id="";
                	$xtras="";
                ?>
                </select>              </td>
            </tr>
            <tr class="tableClara">
              <td><div align="right">Desde:</div></td>
              <td><input name="desdeCitas" type="text" id="desdeCitas" value="00-00-0000" class="inputFecha" readonly="readonly" />
                  <input id="desdeCitasDia" type="hidden" name="desdeCitasDia" value="00" />
                  <input id="desdeCitasMes" type="hidden" name="desdeCitasMes" value="00" />
                  <input id="desdeCitasAno" type="hidden" name="desdeCitasAno" value="0000" />
                <a href="javascript:;" title="seleccionar fecha" class="menu" onclick="position(event); toolTip('<?php echo _FILE_PHP_MEN_CALENDARIO; ?>&destino=desdeCitas',this)" tabindex="2"><img src="interfaz/inmohost/images/iconos/calendario.gif" width="16" height="15" border="0" align="absmiddle" /></a> </td>
            </tr>
            <tr class="tableClara">
              <td><div align="right">Hasta:</div></td>
              <td><input name="hastaCitas" type="text" id="hastaCitas" value="00-00-0000" class="inputFecha" readonly="readonly" />
                  <input id="hastaCitasDia" type="hidden" name="hastaCitasDia" value="00" />
                  <input id="hastaCitasMes" type="hidden" name="hastaCitasMes" value="00" />
                  <input id="hastaCitasAno" type="hidden" name="hastaCitasAno" value="0000" />
                <a href="javascript:;" title="seleccionar fecha" class="menu" onclick="position(event); toolTip('<?php echo _FILE_PHP_MEN_CALENDARIO; ?>&destino=hastaCitas',this)" tabindex="3"><img src="interfaz/inmohost/images/iconos/calendario.gif" width="16" height="15" border="0" align="absmiddle" /></a> </td>
            </tr>
            <tr class="tableClara">
              <td><div align="right">Id Inmueble:</div></td>
              <td><input name="prp_id" type="text" class="inputForm" id="prp_id" style="width:60px"  onkeypress="if (event.keyCode == 13){chequeaForm('FormInformesCitas', '<?php echo $destino1; ?>', '<?php echo $titulo; ?>', '<?php echo $url1; ?>', '<?php echo $parametros; ?>');}" tabindex="4"/></td>
            </tr>
            <tr class="tableClara">
              <td><div align="right">Estado:</div></td>
              <td><select name="estado" class="inputForm" id="estado" tabindex="5" onkeypress="if (event.keyCode == 13){chequeaForm('FormInformesCitas', '<?php echo $destino1; ?>', '<?php echo $titulo; ?>', '<?php echo $url1; ?>', '<?php echo $parametros; ?>');}">
                <option value="0">Todas</option>
                <option value="1">Canceladas</option>
                <option value="2">Sin Cancelar</option>
              </select></td>
            </tr>
            <tr class="tableClara">
              <td><div align="right">Ver:</div></td>
              <td><select name="ver_canceladas" class="inputForm" onkeypress="if (event.keyCode == 13){chequeaForm('FormInformesCitas', '<?php echo $destino1; ?>', '<?php echo $titulo; ?>', '<?php echo $url1; ?>', '<?php echo $parametros; ?>');}" tabindex="6">
                  <option value="0">Todas</option>
                  <option value="1">Canceladas</option>
                  <option value="2">Sin Cancelar</option>
                </select>              </td>
            </tr>
            <tr class="tableClara">
              <td colspan="2"><div align="right">
                  <input name="listar" type="button" class="botonForm" id="listar" value="Listar" tabindex="7" onclick="chequeaForm('FormInformesCitas', '<?php echo $destino1; ?>', '<?php echo $titulo; ?>', '<?php echo $url1; ?>', '<?php echo $parametros; ?>');" onkeypress="if (event.keyCode == 13){chequeaForm('FormInformesCitas', '<?php echo $destino1; ?>', '<?php echo $titulo; ?>', '<?php echo $url1; ?>', '<?php echo $parametros; ?>');}" />
              </div></td>
            </tr>
          </table></td>
		  </tr>
      </table>
        </form>
    </td>
  </tr>
</table>


