<?php 


	include ("../php/config.php");
	extract($_GET);
	extract ($_POST);
	extract ($_REQUEST);
	
	
 switch ($op) {
     default:
			$titulo = "Generar Informes sobre Propiedades"; //
			$destino1 = "inf_listado"; // listadoPropiedades
			$url1 = _FILE_PHP_INF_LISTADO;
			$parametros = "mod_search";
         break;
         //
 }
?>
<table width="240" border="0" align="center" cellpadding="0" cellspacing="0" id="tablaMorir">
  <tr>
    <td><form id="FormInformesPropiedades" name="FormInformesPropiedades" method="post" action="">
    <input type="hidden" name="inf_tip" value="prp">  
    <table width="100%" border="0" cellpadding="1" cellspacing="1">
        <tr>
          <td width="100%" colspan="2"><h1>Generar Informes de Propiedades</h1>
            <hr />			</td></tr>
		<tr>
		  <td colspan="2">
		<table width="100%" border="0" cellpadding="1" cellspacing="1" class="tableOscura" id="tablaListarPropiedades" >
              <tr class="tableClara">
                <td colspan="2"><strong>Inmueble:</strong></td>
              </tr>
              <tr class="tableClara">
                <td><div align="right">Tipo de Const.:</div></td>
                <td><select name="tip_id" class="inputForm" id="select2" tabindex="1" onkeypress="if (event.keyCode == 13){chequeaForm('FormInformesDemandas', '<?php echo $destino1; ?>', '<?php echo $titulo; ?>', '<?php echo $url1; ?>', '<?php echo $parametros; ?>');}" >
                    <?php 
                /* REGS= ID,Descripcion  */
					$regs=" tip_id,tip_desc";
					$tablas=" tipo_const ";
					$id=$usr_id;
					$xtras=" order by tip_desc ASC";
                include("../"._FILE_SCRIPT_PHP_SELECT); 
                	$regs="";
                	$tablas="";
                	$id="";
                	$xtras="";
                </select></td>
              </tr>
              <tr class="tableClara">
                <td><div align="right">Condici&oacute;n:</div></td>
                <td><select name="con_id" class="inputForm" id="select3" style="width:120px;" tabindex="2" onkeypress="if (event.keyCode == 13){chequeaForm('FormInformesDemandas', '<?php echo $destino1; ?>', '<?php echo $titulo; ?>', '<?php echo $url1; ?>', '<?php echo $parametros; ?>');}" >
                    <?php 
                /* REGS= ID,Descripcion  */
					$regs=" con_id,con_desc ";
					$tablas=" condiciones ";
					$id=$usr_id;
					$xtras=" order by con_desc ASC";
                include("../"._FILE_SCRIPT_PHP_SELECT); 
                	$regs="";
                	$tablas="";
                	$id="";
                	$xtras="";
?>
                </select></td>
              </tr>
              
              <tr class="tableClara">
                <td><div align="right">Estado:</div></td>
                <td><select name="prp_mostrar" class="inputForm" id="estado" style="width:120px;" tabindex="3" onkeypress="if (event.keyCode == 13){chequeaForm('FormInformesCitas', '<?php echo $destino1; ?>', '<?php echo $titulo; ?>', '<?php echo $url1; ?>', '<?php echo $parametros; ?>');}">
                    <option value="0">Indistinto</option>
                    <option value="1">Mostrar</option>
                    <option value="2">Vendido/Alquilado</option>
                    <option value="3">Suspendido</option>
                    </select></td>
              </tr>
              <tr class="tableClara">
                <td><div align="right">Referente:</div></td>
                <td><select name="prp_referente" class="inputForm" id="referente" tabindex="4" onkeypress="if (event.keyCode == 13){chequeaForm('FormInformesCitas', '<?php echo $destino1; ?>', '<?php echo $titulo; ?>', '<?php echo $url1; ?>', '<?php echo $parametros; ?>');}">
                <?php 
                /* REGS= ID,Descripcion  */
					$regs=" emp_id, concat(nombre,\" \", apellido) ";
					$tablas=" empleados ";
					$id=$emp_id;
					$xtras=" order by nombre,apellido ASC";
                include("../"._FILE_SCRIPT_PHP_SELECT); 
                	$regs="";
                	$tablas="";
                	$id="";
                	$xtras="";
?>
                </select></td>                

              </tr>
              
              <tr class="tableClara">
                <td colspan="2"><strong>Ingresado:</strong></td>
                </tr>
              <tr class="tableClara">
                <td><div align="right">Entre:</div></td>
                <td>
				<input name="desdePropiedades" type="text" id="desdePropiedades" value="00-00-0000" class="inputFecha" readonly />
				<input id="desdePropiedadesDia" type="hidden" name="desdePropiedadesDia" value="00" />
				<input id="desdePropiedadesMes" type="hidden" name="desdePropiedadesMes" value="00" />
				<input id="desdePropiedadesAno" type="hidden" name="desdePropiedadesAno" value="0000" />
                  <a id="iniciaForm" href="javascript:;" title="seleccionar fecha" class="menu" onclick="position(event); toolTip('<?php echo _FILE_PHP_MEN_CALENDARIO; ?>&destino=desdePropiedades',this)" tabindex="5"><img src="interfaz/inmohost/images/iconos/calendario.gif" width="16" height="15" border="0" align="absmiddle" /></a>				  </td>
              </tr>
              <tr class="tableClara">
                <td><div align="right">y el:</div></td>
                <td>
                  <input name="hastaPropiedades" type="text" id="hastaPropiedades" value="00-00-0000" class="inputFecha" readonly />
				<input id="hastaPropiedadesDia" type="hidden" name="hastaPropiedadesDia" value="00" />
				<input id="hastaPropiedadesMes" type="hidden" name="hastaPropiedadesMes" value="00" />
				<input id="hastaPropiedadesAno" type="hidden" name="hastaPropiedadesAno" value="0000" />
                  <a href="javascript:;" title="seleccionar fecha" class="menu" onclick="position(event); toolTip('<?php echo _FILE_PHP_MEN_CALENDARIO; ?>&destino=hastaPropiedades',this)" tabindex="6"><img src="interfaz/inmohost/images/iconos/calendario.gif" width="16" height="15" border="0" align="absmiddle" /></a>				  </td>
              </tr>
              <tr class="tableClara">
                <td><div align="right">Cartel:</div></td>
                <td>
			<select name="prp_cartel" class="inputForm" id="cartel" tabindex="7" onkeypress="if (event.keyCode == 13){chequeaForm('FormInformesPropiedades', '<?php echo $destino1; ?>', '<?php echo $titulo; ?>', '<?php echo $url1; ?>', '<?php echo $parametros; ?>');}">
					<option value="0">Indistinto</option>
					<option value="1">Con</option>
					<option value="2">Sin</option>
			</select>				</td>
              </tr>
              
              <tr class="tableClara">
                <td><div align="right">Autorizaci&oacute;n:</div></td>
                <td><select name="prp_aut" class="inputForm" id="autorizacion" tabindex="8" onkeypress="if (event.keyCode == 13){chequeaForm('FormInformesPropiedades', '<?php echo $destino1; ?>', '<?php echo $titulo; ?>', '<?php echo $url1; ?>', '<?php echo $parametros; ?>');}">
                    <option value="0">Indistinto</option>
                    <option value="1">Con</option>
                    <option value="2">Sin</option>
                  </select>          
				</td>
              </tr>
              <tr class="tableClara">
                <td><div align="right">Publicaci&oacute;n:</div></td>
                <td><select name="prp_pub" class="inputForm" id="publicacion" tabindex="9" onkeypress="if (event.keyCode == 13){chequeaForm('FormInformesPropiedades', '<?php echo $destino1; ?>', '<?php echo $titulo; ?>', '<?php echo $url1; ?>', '<?php echo $parametros; ?>');}">
                    <option value="0">Con/Sin</option>
                    <option value="1">Con</option>
                    <option value="2">Sin</option>
                  </select>                </td>
              </tr>
              <tr class="tableClara">
                <td><div align="right">Fotos:</div></td>
                <td><select name="fotos" class="inputForm" id="foto" tabindex="10" onkeypress="if (event.keyCode == 13){chequeaForm('FormInformesPropiedades', '<?php echo $destino1; ?>', '<?php echo $titulo; ?>', '<?php echo $url1; ?>', '<?php echo $parametros; ?>');}">
                    <option value="0">Con/Sin</option>
                    <option value="1">Con</option>
                    <option value="2">Sin</option>
                  </select>                </td>
              </tr>
              <!--tr class="tableClara">
                <td colspan="2"><strong>Modificado:</strong></td>
              </tr>
              <tr class="tableClara">
                <td><div align="right">Entre:</div></td>
                <td><input name="desdeModiPropiedades" type="text" id="desdeModiPropiedades" value="00-00-0000" class="inputFecha" readonly="readonly" />
                    <input id="desdeModiPropiedadesDia" type="hidden" name="desdeModiPropiedadesDia" value="00" />
                    <input id="desdeModiPropiedadesMes" type="hidden" name="desdeModiPropiedadesMes" value="00" />
                    <input id="desdeModiPropiedadesAno" type="hidden" name="desdeModiPropiedadesAno" value="0000" />
                  <a id="iniciaForm" href="javascript:;" title="seleccionar fecha" class="menu" onclick="position(event); toolTip('<?php echo _FILE_PHP_MEN_CALENDARIO; ?>&destino=desdeModiPropiedades',this)" tabindex="11"><img src="interfaz/inmohost/images/iconos/calendario.gif" width="16" height="15" border="0" align="absmiddle" /></a> </td>
              </tr>
              <tr class="tableClara">
                <td><div align="right">y el:</div></td>
                <td><input name="hastaModiPropiedades" type="text" id="hastaModiPropiedades" value="00-00-0000" class="inputFecha" readonly="readonly" />
                    <input id="hastaModiPropiedadesDia" type="hidden" name="hastaModiPropiedadesDia" value="00" />
                    <input id="hastaModiPropiedadesMes" type="hidden" name="hastaModiPropiedadesMes" value="00" />
                    <input id="hastaModiPropiedadesAno" type="hidden" name="hastaModiPropiedadesAno" value="0000" />
                  <a href="javascript:;" title="seleccionar fecha" class="menu" onclick="position(event); toolTip('<?php echo _FILE_PHP_MEN_CALENDARIO; ?>&destino=hastaModiPropiedades',this)" tabindex="12"><img src="interfaz/inmohost/images/iconos/calendario.gif" width="16" height="15" border="0" align="absmiddle" /></a> </td>
              </tr>
              <tr class="tableClara">
                <td colspan="2"><label>
                  <strong>
                  <input name="mostrado" type="checkbox" class="inputForm" id="mostrado" tabindex="14" value="1" />
                  Mostrado:</strong></label></td>
              </tr>
              <tr class="tableClara">
                <td><div align="right">Entre:</div></td>
                <td><input name="desdeMostradoPropiedades" type="text" id="desdeMostradoPropiedades" value="00-00-0000" class="inputFecha" readonly="readonly" />
                    <input id="desdeMostradoPropiedadesDia" type="hidden" name="desdeMostradoPropiedadesDia" value="00" />
                    <input id="desdeMostradoPropiedadesMes" type="hidden" name="desdeMostradoPropiedadesMes" value="00" />
                    <input id="desdeMostradoPropiedadesAno" type="hidden" name="desdeMostradoPropiedadesAno" value="0000" />
                  <a id="iniciaForm" href="javascript:;" title="seleccionar fecha" class="menu" onclick="position(event); toolTip('<?php echo _FILE_PHP_MEN_CALENDARIO; ?>&destino=desdeMostradoPropiedades',this)" tabindex="15"><img src="interfaz/inmohost/images/iconos/calendario.gif" width="16" height="15" border="0" align="absmiddle" /></a> </td>
              </tr>
              <tr class="tableClara">
                <td><div align="right">y el:</div></td>
                <td><input name="hastaMostradoPropiedades" type="text" id="hastaMostradoPropiedades" value="00-00-0000" class="inputFecha" readonly="readonly" />
                    <input id="hastaMostradoPropiedadesDia" type="hidden" name="hastaMostradoPropiedadesDia" value="00" />
                    <input id="hastaMostradoPropiedadesMes" type="hidden" name="hastaMostradoPropiedadesMes" value="00" />
                    <input id="hastaMostradoPropiedadesAno" type="hidden" name="hastaMostradoPropiedadesAno" value="0000" />
                  <a href="javascript:;" title="seleccionar fecha" class="menu" onclick="position(event); toolTip('<?php echo _FILE_PHP_MEN_CALENDARIO; ?>&destino=hastaMostradoPropiedades',this)" tabindex="16"><img src="interfaz/inmohost/images/iconos/calendario.gif" width="16" height="15" border="0" align="absmiddle" /></a> </td>
              </tr>
              <tr class="tableClara">
                <td><div align="right">Monitor:</div></td>
                <td><select name="monitor" class="inputForm" id="monitor" tabindex="17" onkeypress="if (event.keyCode == 13){chequeaForm('FormInformesPropiedades', '<?php echo $destino1; ?>', '<?php echo $titulo; ?>', '<?php echo $url1; ?>', '<?php echo $parametros; ?>');}">
<?php 
                // REGS= ID,Descripcion  
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
                  </select>
                </td>
              </tr-->
              
              <tr class="tableClara">
                <td colspan="2"><div align="right">
                  <input name="listar2" type="button" class="botonForm" id="listar2" value="Listar" tabindex="18" onclick="chequeaForm('FormInformesPropiedades', '<?php echo $destino1; ?>', '<?php echo $titulo; ?>', '<?php echo $url1; ?>', '<?php echo $parametros; ?>');" onkeypress="if (event.keyCode == 13){chequeaForm('FormInformesPropiedades', '<?php echo $destino1; ?>', '<?php echo $titulo; ?>', '<?php echo $url1; ?>', '<?php echo $parametros; ?>');}" />
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


