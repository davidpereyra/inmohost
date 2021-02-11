<?php 


	include ("../php/config.php");
	
	extract($_GET);
	extract ($_POST);
	extract ($_REQUEST);
	
 switch ($op) {
     default:
			$titulo = "Generar Informes sobre Medios"; //
			$destino1 = "inf_listado"; // listadoPropiedades
			$url1 = _FILE_PHP_INF_LISTADO;
			$parametros = "mod_search";
         break;
         //
 }
?>
<table width="240" border="0" align="center" cellpadding="0" cellspacing="0" id="tablaMorir">
  <tr>
    <td><form id="FormInformesMedios" name="FormInformesMedios" method="post" action="">
      <table width="100%" border="0" cellpadding="1" cellspacing="1">
        <tr>
          <td width="100%" colspan="2">
            <h1 align="left">Generar Informes sobre Medios</h1>
			<hr />			</td>
          </tr>
		<tr>
		  <td colspan="2">
		<table width="100%" border="0" cellpadding="1" cellspacing="1" class="tableOscura" id="tablaListarMedios" >
              <tr class="tableClara">
                <td><div align="right">Desde:</div></td>
                <td>
				<input name="desdeMedios" type="text" id="desdeMedios" value="00-00-0000" class="inputFecha" readonly />
				<input id="desdeMediosDia" type="hidden" name="desdeMediosDia" value="00" />
				<input id="desdeMediosMes" type="hidden" name="desdeMediosMes" value="00" />
				<input id="desdeMediosAno" type="hidden" name="desdeMediosAno" value="0000" />
                  <a id="iniciaForm" href="javascript:;" title="seleccionar fecha" class="menu" onclick="position(event); toolTip('<?php echo _FILE_PHP_MEN_CALENDARIO; ?>&destino=desdeMedios',this)" tabindex="1"><img src="interfaz/inmohost/images/iconos/calendario.gif" width="16" height="15" border="0" align="absmiddle" /></a>				  </td>
              </tr>
              <tr class="tableClara">
                <td><div align="right">Hasta:</div></td>
                <td>
                  <input name="hastaMedios" type="text" id="hastaMedios" value="00-00-0000" class="inputFecha" readonly />
				<input id="hastaMediosDia" type="hidden" name="hastaMediosDia" value="00" />
				<input id="hastaMediosMes" type="hidden" name="hastaMediosMes" value="00" />
				<input id="hastaMediosAno" type="hidden" name="hastaMediosAno" value="0000" />
                  <a href="javascript:;" title="seleccionar fecha" class="menu" onclick="position(event); toolTip('<?php echo _FILE_PHP_MEN_CALENDARIO; ?>&destino=hastaMedios',this)" tabindex="2"><img src="interfaz/inmohost/images/iconos/calendario.gif" width="16" height="15" border="0" align="absmiddle" /></a>				  </td>
              </tr>
              <tr class="tableClara">
                <td><div align="right">Diario:</div></td>
                <td>
			<select name="tip_id" class="inputForm" tabindex="3" onkeypress="if (event.keyCode == 13){chequeaForm('FormInformesMedios', '<?php echo $destino1; ?>', '<?php echo $titulo; ?>', '<?php echo $url1; ?>', '<?php echo $parametros; ?>');}">
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
			</select>				</td>
              </tr>
              <tr class="tableClara">
                <td><div align="right">Id:</div></td>
                <td><input name="med_id" type="text" class="inputForm" id="med_id" tabindex="4" value="" /></td>
              </tr>
              
              <tr class="tableClara">
                <td colspan="2"><div align="right">
                  <input name="listar2" type="button" class="botonForm" id="listar2" value="Listar" tabindex="5" onclick="chequeaForm('FormInformesMedios', '<?php echo $destino1; ?>', '<?php echo $titulo; ?>', '<?php echo $url1; ?>', '<?php echo $parametros; ?>');" onkeypress="if (event.keyCode == 13){chequeaForm('FormInformesMedios', '<?php echo $destino1; ?>', '<?php echo $titulo; ?>', '<?php echo $url1; ?>', '<?php echo $parametros; ?>');}" />
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


