<?php 


	include ("../php/config.php");
	extract($_GET);
	extract ($_POST);
	extract ($_REQUEST);
	
 switch ($op) {
     default:
			$titulo = "Listar Tasaciones"; //
			$destino1 = "generico_listado"; // listadoPropiedades
			$url1 = _FILE_PHP_GENERICO_LISTADOS;
			$parametros = "mod_edit";
         break;
         //
 }	
?>
<table width="240" border="0" align="center" cellpadding="0" cellspacing="0" id="tablaMorir">
  <tr>
    <td><form id="FormAgendaTasaciones" name="FormAgendaTasaciones" method="post" action="">
	<input type="hidden" name="fileXMLListado" value="<?php echo _FILE_XML_TAS_LISTADO; ?>"  />
	<input type="hidden" name="fileXMLHead" value="<?php echo _FILE_XML_TAS_HEAD; ?>"  />
      <table width="100%" border="0" cellpadding="1" cellspacing="1">
        <tr>
          <td width="150%" colspan="3">
            <h1 align="left">Tasaciones</h1>
			<hr />			</td>
          </tr>
		<tr>
		  <td colspan="3">

<?php
	// Si ingresa por internet cambio la ruta de resumen general

	if ($internet)
		{
			
			$xml = str_replace($dominio_local,"localhost",_FILE_XML_RESUMEN_GENERAL);
			$xsl = "../"._FILE_XSL_RESUMEN_FORMULARIO;			
		}
		else
		{
			$xml = _FILE_XML_RESUMEN_GENERAL;
			$xsl = "../"._FILE_XSL_RESUMEN_FORMULARIO;			
		}
	
		$id = "tasaciones";
		$file[0] = _FILE_PHP_GENERICO_LISTADOS;
		$file[1] = _FILE_XML_TAS_HEAD;
		$file[2] = _FILE_XML_TAS_LISTADO;
		//agregar datos de inmo y user
	  	include("../"._FILE_XSL_GENERICO); 
?>

		<table width="100%" border="0" cellpadding="1" cellspacing="1" class="tableOscura" id="tablaListarTasaciones" style="display:none">
              <tr class="tableClara">
                <td><div align="right">Desde:</div></td>
                <td>
				<input name="desdeTasaciones" type="text" id="desdeTasaciones" value="00-00-0000" class="inputFecha" readonly />
				<input id="desdeTasacionesDia" type="hidden" name="desdeTasacionesDia" value="00" />
				<input id="desdeTasacionesMes" type="hidden" name="desdeTasacionesMes" value="00" />
				<input id="desdeTasacionesAno" type="hidden" name="desdeTasacionesAno" value="0000" />
                  <a id="iniciaForm" href="javascript:;" title="seleccionar fecha" class="menu" onclick="position(event); toolTip('<?php echo _FILE_PHP_MEN_CALENDARIO; ?>&destino=desdeTasaciones',this)" tabindex="1"><img src="interfaz/inmohost/images/iconos/calendario.gif" width="16" height="15" border="0" align="absmiddle" /></a>
				  </td>
              </tr>
              <tr class="tableClara">
                <td><div align="right">Hasta:</div></td>
                <td>
                  <input name="hastaTasaciones" type="text" id="hastaTasaciones" value="00-00-0000" class="inputFecha" readonly />
				<input id="hastaTasacionesDia" type="hidden" name="hastaTasacionesDia" value="00" />
				<input id="hastaTasacionesMes" type="hidden" name="hastaTasacionesMes" value="00" />
				<input id="hastaTasacionesAno" type="hidden" name="hastaTasacionesAno" value="0000" />
                  <a href="javascript:;" title="seleccionar fecha" class="menu" onclick="position(event); toolTip('<?php echo _FILE_PHP_MEN_CALENDARIO; ?>&destino=hastaTasaciones',this)" tabindex="2"><img src="interfaz/inmohost/images/iconos/calendario.gif" width="16" height="15" border="0" align="absmiddle" /></a>
				  </td>
              </tr>
              <tr class="tableClara">
                <td><div align="right">Busco:</div></td>
                <td>
			<select name="tip_id" class="inputForm" tabindex="3" onkeypress="if (event.keyCode == 13){chequeaForm('FormAgendaTasaciones', '<?php echo $destino1; ?>', '<?php echo $titulo; ?>', '<?php echo $url1; ?>', '<?php echo $parametros; ?>');}">
                <?php 
                /* REGS= ID,Descripcion  */
					$regs=" tip_id,tip_desc ";
					$tablas=" tipo_const ";
					$id=$usr_id;
					$xtras=" order by tip_desc ASC";
                include("../"._FILE_SCRIPT_PHP_SELECT); 
                	$regs="";
					$tablas="";
					$filtro=""; 
					$id="";
					$xtras="";
                ?>
			</select>				</td>
              </tr>
              <tr class="tableClara">
                <td><div align="right">En:</div></td>
                <td>
				<select name="con_id" class="inputForm" tabindex="4" onkeypress="if (event.keyCode == 13){chequeaForm('FormAgendaTasaciones', '<?php echo $destino1; ?>', '<?php echo $titulo; ?>', '<?php echo $url1; ?>', '<?php echo $parametros; ?>');}">
                <?php 
                /* REGS= ID,Descripcion  */
					$regs=" con_id,con_desc ";
					$tablas=" condiciones ";
					$xtras=" order by con_desc ASC";
                include("../"._FILE_SCRIPT_PHP_SELECT); 
                	$regs="";
					$tablas="";
					$filtro=""; 
					$id="";
					$xtras="";
                ?>
                                    </select>                </td>
              </tr>
              <tr class="tableClara">
                <td><div align="right">Estado:</div></td>
                <td>
			<select name="estado" class="inputForm" tabindex="5" onkeypress="if (event.keyCode == 13){chequeaForm('FormAgendaTasaciones', '<?php echo $destino1; ?>', '<?php echo $titulo; ?>', '<?php echo $url1; ?>', '<?php echo $parametros; ?>');}">
                <option value="0" selected="true">Indistinto</option>
                <!--option value="1">Dadas de Alta</option-->
                <option value="2">Agendada</option>
                <option value="3">Pendiente</option>
                <!--option value="4">Pendiente</option-->
			</select>				</td>
              </tr>
              <tr class="tableClara">
                <td colspan="2"><div align="right">
                  <input name="listar2" type="button" class="botonForm" id="listar2" value="Listar" tabindex="6" onclick="chequeaForm('FormAgendaTasaciones', '<?php echo $destino1; ?>', '<?php echo $titulo; ?>', '<?php echo $url1; ?>', '<?php echo $parametros; ?>');" onkeypress="if (event.keyCode == 13){chequeaForm('FormAgendaTasaciones', '<?php echo $destino1; ?>', '<?php echo $titulo; ?>', '<?php echo $url1; ?>', '<?php echo $parametros; ?>');}" />
                </div></td>
                </tr>
              <tr class="tableClara">
                <td><div align="right">Id Tasaci&oacute;n:</div></td>
                <td><input name="tas_id" type="text" class="inputForm" id="prp_id" style="width:60px" tabindex="7"  onkeypress="if (event.keyCode == 13){chequeaForm('FormAgendaTasaciones', '<?php echo $destino1; ?>', '<?php echo $titulo; ?>', '<?php echo $url1; ?>', '<?php echo $parametros; ?>');}" /></td>
              </tr>
              
             <tr class="tableClara">
                <td colspan="2"><div align="right"><input name="listar" type="button" class="botonForm" id="listar" value="Listar" tabindex="8" onclick="chequeaForm('FormAgendaTasaciones', '<?php echo $destino1; ?>', '<?php echo $titulo; ?>', '<?php echo $url1; ?>', '<?php echo $parametros; ?>');" onkeypress="if (event.keyCode == 13){chequeaForm('FormAgendaTasaciones', '<?php echo $destino1; ?>', '<?php echo $titulo; ?>', '<?php echo $url1; ?>', '<?php echo $parametros; ?>');}" /></div></td>
              </tr>
          </table>
		  </td>
		  </tr>
           <tr>
          <td width="30%">
            <div align="center" id="botonListarTasaciones" ><a href="javascript:display('botonListarTasaciones');display('botonResumenTasaciones');display('tablaListarTasaciones');display('tablaResumenTasaciones');document.getElementById('iniciaForm').focus();" title="Listar Tasaci&oacute;n" class="menuItem" tabindex="9"><img src="interfaz/inmohost/images/iconos/20/listar.png" width="20" height="20" border="0" /><br />
            Listar<br />
            Tasaciones</a></div>
            <div align="center" id="botonResumenTasaciones" style="display:none"><a href="javascript:display('botonListarTasaciones');display('botonResumenTasaciones');display('tablaListarTasaciones');display('tablaResumenTasaciones');" title="Resumen de Tasaciones" class="menuItem" tabindex="9"><img src="interfaz/inmohost/images/iconos/20/tasaciones.png" width="20" height="20" border="0" /><br />
            Resumen</a></div>
			</td>
          <td width="40%"><div align="center"><a href="#" onclick="displayMenu('close');position(event); 
          	ventana('alta_tasacion', '&nomVentana=alta_tasacion', '<?php print _FILE_PHP_AGENDA_TAS_NEW?>', 'Agregar Tasacion');" 
            title="Agregar Tasaci&oacute;n" class="menuItem" tabindex="10"><img src="interfaz/inmohost/images/iconos/20/tasaciones.png" width="20" height="20" border="0" /><br />
            Agregar<br />
          Tasaci&oacute;n</a></div></td>
          <td width="30%"><div align="center"><a href="#" onclick="ventana('prp_listado', '', '<?php print _FILE_PHP_FORM_TASACION?>' , 'Imprimir Formulario');" title="Imprimir Formulario" class="menuItem" tabindex="11"><img src="interfaz/inmohost/images/iconos/20/imprimir.png" width="20" height="20" border="0" /><br />
            Imprimir<br/>
            Formulario </a></div></td>
        </tr>
      </table>
        </form>
    </td>
  </tr>
</table>


