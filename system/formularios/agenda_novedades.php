<?php 


	include ("../php/config.php");
	include ("../php/sec_head.php");
	extract($_GET);
	extract ($_POST);
	extract ($_REQUEST);

 switch ($op) {
     default:
			$titulo = "Listar Novedades"; //
			$destino1 = "generico_listado"; // listadoPropiedades
			$url1 = _FILE_PHP_GENERICO_LISTADOS;
			$parametros = "mod_edit";
         break;
         //
 }
?>

<table width="240" border="0" align="center" cellpadding="0" cellspacing="0" id="tablaMorir">
  <tr>
    <td>
      <form id="FormAgendaNovedades" name="FormAgendaNovedades" method="post" action="">
        <input type="hidden" name="fileXMLListado" value="<?php echo _FILE_XML_NOVEDADES_LISTADO; ?>"  />
        <input type="hidden" name="fileXMLHead" value="<?php echo _FILE_XML_NOVEDADES_HEAD; ?>"  />
      <table width="100%" border="0" cellpadding="1" cellspacing="1">
        <tr>
          <td colspan="2">
            <h1 align="left">Novedades</h1>

			</td>
          </tr>
		<tr>
		  <td colspan="2">

 <?php	
 		
		// Si ingresa por internet cambio la ruta de resumen general y alta de novedades
		if ($internet)
		{
			$xml = str_replace($dominio_local,"localhost",_FILE_XML_RESUMEN_GENERAL);
			$filenov = str_replace($dominio_local,"localhost",_FILE_XML_NOVEDADES);
			$file_nov=$filenov."?usr_login=".$usr_login;
			$xsl = "../"._FILE_XSL_RESUMEN_FORMULARIO;			
		}
		else
		{
			$xml = _FILE_XML_RESUMEN_GENERAL;
			$xsl = "../"._FILE_XSL_RESUMEN_FORMULARIO;	
			$file_nov=_FILE_XML_NOVEDADES."?usr_login=".$usr_login;		
		}
      $id = "novedades";
      $file[0] = _FILE_PHP_NOVEDADES;
      //agregar datos de inmo y user
        include("../"._FILE_XSL_GENERICO); 
/*
		$id = "novedades";	
		$file[0] = _FILE_PHP_GENERICO_LISTADOS;
		$file[1] = _FILE_XML_NOVEDADES_HEAD;
		$file[2] = _FILE_XML_NOVEDADES_LISTADO;

		//agregar datos de inmo y user
	  	include("../"._FILE_XSL_GENERICO); 
      */
?>
	
	
			<table width="100%" border="0" cellpadding="1" cellspacing="1" class="tableOscura" id="tablaListarNovedades" style="display:none">
              <tr class="tableClara">
                <td><div align="right">Desde:</div></td>
                <td>
				<input name="desdeNovedades" type="text" id="desdeNovedades" value="00-00-0000" class="inputFecha" readonly />
				<input id="desdeNovedadesDia" type="hidden" name="desdeNovedadesDia" value="" />
				<input id="desdeNovedadesMes" type="hidden" name="desdeNovedadesMes" value="" />
				<input id="desdeNovedadesAno" type="hidden" name="desdeNovedadesAno" value="" />
                  <a id="iniciaForm" href="javascript:;" title="seleccionar fecha" class="menu" onclick="position(event); toolTip('<?php echo _FILE_PHP_MEN_CALENDARIO; ?>&destino=desdeNovedades',this)" tabindex="1"><img src="interfaz/inmohost/images/iconos/calendario.gif" width="16" height="15" border="0" align="absmiddle" /></a></td>
              </tr>
              <tr class="tableClara">
                <td><div align="right">Hasta:</div></td>
                <td>
                <input name="hastaNovedades" type="text" id="hastaNovedades" value="00-00-0000" class="inputFecha" readonly />
				<input id="hastaNovedadesDia" type="hidden" name="hastaNovedadesDia" value="" />
				<input id="hastaNovedadesMes" type="hidden" name="hastaNovedadesMes" value="" />
				<input id="hastaNovedadesAno" type="hidden" name="hastaNovedadesAno" value="" />
                  <a href="javascript:;" title="seleccionar fecha" class="menu" onclick="position(event); toolTip('<?php echo _FILE_PHP_MEN_CALENDARIO;?>&destino=hastaNovedades',this)" tabindex="2"><img src="interfaz/inmohost/images/iconos/calendario.gif" width="16" height="15" border="0" align="absmiddle" /></a></td>
              </tr>
              <tr class="tableClara">
                <td><div align="right">Novedades para:</div></td>
                <td><select name="emp_hacia" class="inputForm" onkeypress="if (event.keyCode == 13){chequeaForm('FormAgendaNovedades', '<?php echo $destino1; ?>', '<?php echo $titulo; ?>', '<?php echo $url1; ?>', '<?php echo $parametros; ?>');}" tabindex="3">
                <?php 
                /* REGS= ID,Descripcion  */
					$regs=" emp_id, concat(nombre,\" \", apellido) ";
					$tablas=" empleados ";
					$id=$emp_id;
					$xtras=" order by nombre,apellido ASC";
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
                <td><select name="estado" class="inputForm" onkeypress="if (event.keyCode == 13){chequeaForm('FormAgendaNovedades', '<?php echo $destino1; ?>', '<?php echo $titulo; ?>', '<?php echo $url1; ?>', '<?php echo $parametros; ?>');}" tabindex="4">
                    <option value="2">Todas</option>
                    <option value="1">Le&iacute;da</option>
                    <option value="0">No Le&iacute;da</option>
                  </select>
				  </td>
              </tr>
             <tr class="tableClara">
                <td colspan="2"><div align="right"><input name="listar" type="button" class="botonForm" id="listar" value="Listar" tabindex="5" onclick="chequeaForm('FormAgendaNovedades', '<?php echo $destino1; ?>', '<?php echo $titulo; ?>', '<?php echo $url1; ?>', '<?php echo $parametros; ?>');" onkeypress="if (event.keyCode == 13){chequeaForm('FormAgendaNovedades', '<?php echo $destino1; ?>', '<?php echo $titulo; ?>', '<?php echo $url1; ?>', '<?php echo $parametros; ?>');}" />
                </div></td>
              </tr>
          </table>
		</form>
		
		  </td>
		  </tr>
	       
        <tr>
          <td colspan="2"><hr /></td>
          </tr>
        <tr>
          <td width="50%">
            <div align="center" id="botonListarNovedades"><a href="javascript:display('botonListarNovedades');display('botonResumenNovedades');display('tablaListarNovedades');display('tablaResumenNovedades');document.getElementById('iniciaForm').focus();" title="Listar Novedades" class="menuItem" tabindex="6"><img src="interfaz/inmohost/images/iconos/32/listar.png" width="32" height="32" border="0" /><br />
            Listar Novedades</a></div>
            <div align="center" id="botonResumenNovedades" style="display:none"><a href="javascript:display('botonListarNovedades');display('botonResumenNovedades');display('tablaListarNovedades');display('tablaResumenNovedades');" title="Resumen de Novedades" class="menuItem" tabindex="6" ><img src="interfaz/inmohost/images/iconos/32/novedades.png" width="32" height="32" border="0" /><br />
            Resumen de Novedades</a></div>
			</td>
          <td width="50%">
            <div align="center" id="botonNewNovedad"><a href="javascript:display('menuPrincipal');ventana('alt_nov','&fileXML=<?echo $file_nov?>&fileXSL=<?echo _FILE_XSL_NOVEDADES?>','<?echo _FILE_PHP_NOVEDADES?>','Alta de Novedad');" title="Agregar Novedad" class="menuItem" tabindex="6"><img src="interfaz/inmohost/images/iconos/32/novedades.png" width="32" height="32" border="0" /><br />
            Agregar Novedad</a></div>
		  </td>
        </tr>

      </table>
        </form>
    </td>
  </tr>
</table>


