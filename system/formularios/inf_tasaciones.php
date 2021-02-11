<?php 


	include ("../php/config.php");
	
	
 switch ($op) {
     default:
			$titulo = "Generar Informes sobre Tasaciones"; //
			$destino1 = "inf_listado"; // listadoPropiedades
			$url1 = _FILE_PHP_INF_LISTADO;
			$parametros = "mod_search";
         break;
         //
 }
?>
<table width="240" border="0" align="center" cellpadding="0" cellspacing="0" id="tablaMorir">
  <tr>
    <td><form id="FormInformesTasaciones" name="FormInformesTasaciones" method="post" action="">
      <table width="100%" border="0" cellpadding="1" cellspacing="1">
        <tr>
          <td width="100%" colspan="2">
            <h1 align="left">Generar Informes sobre Tasaciones</h1>
			<hr />			</td>
          </tr>
		<tr>
		  <td colspan="2">
		<table width="100%" border="0" cellpadding="1" cellspacing="1" class="tableOscura" id="tablaListarTasaciones" >
              <tr class="tableClara">
                <td><div align="right">Desde:</div></td>
                <td>
				<input name="desdeTasaciones" type="text" id="desdeTasaciones" value="00-00-0000" class="inputFecha" readonly />
				<input id="desdeTasacionesDia" type="hidden" name="desdeTasacionesDia" value="00" />
				<input id="desdeTasacionesMes" type="hidden" name="desdeTasacionesMes" value="00" />
				<input id="desdeTasacionesAno" type="hidden" name="desdeTasacionesAno" value="0000" />
                  <a id="iniciaForm" href="javascript:;" title="seleccionar fecha" class="menu" onclick="position(event); toolTip('<?php echo _FILE_PHP_MEN_CALENDARIO; ?>&destino=desdeTasaciones',this)" tabindex="1"><img src="interfaz/inmohost/images/iconos/calendario.gif" width="16" height="15" border="0" align="absmiddle" /></a>				  </td>
              </tr>
              <tr class="tableClara">
                <td><div align="right">Hasta:</div></td>
                <td>
                  <input name="hastaTasaciones" type="text" id="hastaTasaciones" value="00-00-0000" class="inputFecha" readonly />
				<input id="hastaTasacionesDia" type="hidden" name="hastaTasacionesDia" value="00" />
				<input id="hastaTasacionesMes" type="hidden" name="hastaTasacionesMes" value="00" />
				<input id="hastaTasacionesAno" type="hidden" name="hastaTasacionesAno" value="0000" />
                  <a href="javascript:;" title="seleccionar fecha" class="menu" onclick="position(event); toolTip('<?php echo _FILE_PHP_MEN_CALENDARIO; ?>&destino=hastaTasaciones',this)" tabindex="2"><img src="interfaz/inmohost/images/iconos/calendario.gif" width="16" height="15" border="0" align="absmiddle" /></a>				  </td>
              </tr>
              <tr class="tableClara">
                <td><div align="right">Busco:</div></td>
                <td>
			<select name="tip_id" class="inputForm" tabindex="3" onkeypress="if (event.keyCode == 13){chequeaForm('FormInformesTasaciones', '<?php echo $destino1; ?>', '<?php echo $titulo; ?>', '<?php echo $url1; ?>', '<?php echo $parametros; ?>');}">
                <?php 
                /* REGS= ID,Descripcion  */
					$regs=" usr_id,usr_raz ";
					$tablas=" usuarios ";
					$id=$usr_id;
					
                include("../"._FILE_SCRIPT_PHP_SELECT); 
                ?>
			</select>				</td>
              </tr>
              <tr class="tableClara">
                <td><div align="right">En:</div></td>
                <td>
				<select name="con_id" class="inputForm" tabindex="4" onkeypress="if (event.keyCode == 13){chequeaForm('FormInformesTasaciones', '<?php echo $destino1; ?>', '<?php echo $titulo; ?>', '<?php echo $url1; ?>', '<?php echo $parametros; ?>');}">
                <?php 
                /* REGS= ID,Descripcion  */
					$regs=" usr_id,usr_raz ";
					$tablas=" usuarios ";
					$id=$usr_id;
					
                include("../"._FILE_SCRIPT_PHP_SELECT); 
                ?>
                                    </select>                </td>
              </tr>
              <tr class="tableClara">
                <td><div align="right">Estado:</div></td>
                <td>
			<select name="estado" class="inputForm" tabindex="5" onkeypress="if (event.keyCode == 13){chequeaForm('FormInformesTasaciones', '<?php echo $destino1; ?>', '<?php echo $titulo; ?>', '<?php echo $url1; ?>', '<?php echo $parametros; ?>');}">
                <?php 
                /* REGS= ID,Descripcion  */
					$regs=" usr_id,usr_raz ";
					$tablas=" usuarios ";
					$id=$usr_id;
					
                include("../"._FILE_SCRIPT_PHP_SELECT); 
                ?>
			</select>				</td>
              </tr>
              <tr class="tableClara">
                <td colspan="2"><div align="right">
                  <input name="listar2" type="button" class="botonForm" id="listar2" value="Listar" tabindex="6" onclick="chequeaForm('FormInformesTasaciones', '<?php echo $destino1; ?>', '<?php echo $titulo; ?>', '<?php echo $url1; ?>', '<?php echo $parametros; ?>');" onkeypress="if (event.keyCode == 13){chequeaForm('FormInformesTasaciones', '<?php echo $destino1; ?>', '<?php echo $titulo; ?>', '<?php echo $url1; ?>', '<?php echo $parametros; ?>');}" />
                </div></td>
                </tr>
          </table>
		  
		  </td>
		  </tr>
      </table>
        </form>
    </td>
  </tr>
</table>


