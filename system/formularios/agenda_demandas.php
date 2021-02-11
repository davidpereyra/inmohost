<?php 


	include ("../php/config.php");
		extract($_GET);
	extract ($_POST);
	extract ($_REQUEST);

	
 switch ($op) {
     default:
			$titulo = "Listar Demandas"; //
			$destino1 = "generico_listado"; // listadoPropiedades
			$url1 = _FILE_PHP_GENERICO_LISTADOS;
			$parametros = "mod_edit";
         break;
         //
 }
?>
<table width="240" border="0" align="center" cellpadding="0" cellspacing="0" id="tablaMorir">
  <tr>
    <td><form id="FormAgendaDemandas" name="FormAgendaDemandas" method="post" action="">
	<input type="hidden" name="fileXMLListado" value="<?php echo _FILE_XML_DEMANDAS_LISTADO; ?>"  />
	<input type="hidden" name="fileXMLHead" value="<?php echo _FILE_XML_DEMANDAS_HEAD; ?>"  />
      <table width="100%" border="0" cellpadding="1" cellspacing="1">
        <tr>
          <td width="150%" colspan="3">
            <h1 align="left">Demandas</h1>
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
			$filedem = str_replace($dominio_local,"localhost",_FILE_XML_DEMANDAS);
			$file_dem=$filedem;
		}
		else
		{
			$xml = _FILE_XML_RESUMEN_GENERAL;
			$xsl = "../"._FILE_XSL_RESUMEN_FORMULARIO;			
			$file_dem=_FILE_XML_DEMANDAS;		
		}
	
		$id = "demandas";
		$file[0] = _FILE_PHP_GENERICO_LISTADOS;
		$file[1] = _FILE_XML_DEMANDAS_HEAD;
		$file[2] = _FILE_XML_DEMANDAS_LISTADO;
		//agregar datos de inmo y user
	  	include("../"._FILE_XSL_GENERICO); 
		?>

		<table width="100%" border="0" cellpadding="1" cellspacing="1" class="tableOscura" id="tablaListarDemandas" style="display:none" >
              <tr class="tableClara">
                <td><div align="right">Provincia:</div></td>
                <td><span id="div_pro_id"><select name="pro_id" class="inputForm" id="inmo" tabindex="1" onchange="act_select('loc_id,loc_desc','localidades','pro_id='+this.value,'loc_id','multiple size=3','<?echo $rutaSystemAbs."php/funciones"?>','loc_desc');">
		<?php 
                /* REGS= ID,Descripcion  */
					$regs=" pro_id,pro_desc ";
					$tablas=" provincias ";
					$id=$PROV_DEFAULT;
					$xtras=" order by pro_desc ASC";
                include("../"._FILE_SCRIPT_PHP_SELECT); 
                	$regs="";
					$tablas="";
					$filtro=""; 
					$id="";
					$xtras="";
	?>
                </select></span></td>
              </tr>
              <tr class="tableClara">
                <td><div align="right">Localidad:</div></td>
                <td><span id="div_loc_id"><select multiple size="3" name="loc_id" class="inputForm" id="loc_id" >
<?php 
                /* REGS= ID,Descripcion  */
					$regs=" loc_id,loc_desc ";
					$tablas=" localidades ";
					$filtro=" localidades.pro_id=$PROV_DEFAULT"; 
					$xtras=" order by loc_desc ASC";
                include("../"._FILE_SCRIPT_PHP_SELECT); 
                	$regs="";
					$tablas="";
					$filtro=""; 
					$id="";
					$xtras="";
                
                
?>
                </select></span></td>
              </tr>
              <tr class="tableClara">
                <td><div align="right">Tipo de Cons.:</div></td>
                <td><select  multiple size="3" name="tip_id" class="inputForm" id="tip_id" tabindex="3" onkeypress="if (event.keyCode == 13){chequeaForm('FormAgendaDemandas', '<?php echo $destino1; ?>', '<?php echo $titulo; ?>', '<?php echo $url1; ?>', '<?php echo $parametros; ?>');}" >
<?php 
                /* REGS= ID,Descripcion  */
					$regs=" tip_id,tip_desc ";
					$tablas=" tipo_const ";
					$xtras=" order by tip_desc ASC";
                include("../"._FILE_SCRIPT_PHP_SELECT); 
                	$regs="";
					$tablas="";
					$filtro=""; 
					$id="";
					$xtras="";
?>
                </select></td>
              </tr>
              <tr class="tableClara">
                <td><div align="right">Condici&oacute;n:</div></td>
                <td><select multiple size="3" name="con_id" class="inputForm" id="con_id" tabindex="4" onkeypress="if (event.keyCode == 13){chequeaForm('FormAgendaDemandas', '<?php echo $destino1; ?>', '<?php echo $titulo; ?>', '<?php echo $url1; ?>', '<?php echo $parametros; ?>');}" >
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
                </select></td>
              </tr>
              <tr class="tableClara">
                <td><div align="right">Domicilio/Barrio:</div></td>
                <td><input name="dem_dom" type="text" class="inputForm" id="prp_id2" tabindex="5" style="width:100px" onkeypress="if (event.keyCode == 13){chequeaForm('FormAgendaDemandas', '<?php echo $destino1; ?>', '<?php echo $titulo; ?>', '<?php echo $url1; ?>', '<?php echo $parametros; ?>');}" /></td>
              </tr>
              <!--tr class="tableClara">
                <td><div align="right">Barrio:</div></td>
                <td><input name="dem_barr" type="text" class="inputForm" id="prp_id3" tabindex="6" style="width:80px" onkeypress="if (event.keyCode == 13){chequeaForm('FormAgendaDemandas', '<?php echo $destino1; ?>', '<?php echo $titulo; ?>', '<?php echo $url1; ?>', '<?php echo $parametros; ?>');}"/></td>
              </tr-->
              <tr class="tableClara">
                <td><div align="right">Rango de Precio:</div></td>
                <td><input name="pre_min" type="text" class="inputForm" id="prp_id4" tabindex="7" style="width:30px" onkeypress="if (event.keyCode == 13){chequeaForm('FormAgendaDemandas', '<?php echo $destino1; ?>', '<?php echo $titulo; ?>', '<?php echo $url1; ?>', '<?php echo $parametros; ?>');}"/> 
                  y
                    <input name="pre_max" type="text" class="inputForm" id="prp_id5" tabindex="8" style="width:30px" onkeypress="if (event.keyCode == 13){chequeaForm('FormAgendaDemandas', '<?php echo $destino1; ?>', '<?php echo $titulo; ?>', '<?php echo $url1; ?>', '<?php echo $parametros; ?>');}"/></td>
              </tr>
              <tr class="tableClara">
                <td><div align="right">Demanda:</div></td>
                <td><textarea cols="17" rows="2" name="dem_desc"></textarea> </td>
              </tr>
               <tr class="tableClara">
		          <td width="150%" colspan="3">
		            <h1 align="left">Datos del demandante</h1>
					<hr />			
					</td>
		          </tr>
				<tr>
				 <tr class="tableClara">
	                <td><div align="right">Razon Social:</div></td>
	                <td> <input type="text" name="dem_raz" size="15"> </td>
              	</tr>
              	 <tr class="tableClara">
	                <td><div align="right">Telefono:</div></td>
	                <td> <input type="text" name="dem_tel" size="15"> </td>
              	</tr>
              	<tr class="tableClara">
	                <td><div align="right">E-Mail:</div></td>
	                <td> <input type="text" name="dem_mail" size="15"> </td>
              	</tr>
              
             <tr class="tableClara">
                <td colspan="2"><div align="right"><input name="listar" type="button" tabindex="11" class="botonForm" id="listar" value="Listar" onclick="chequeaForm('FormAgendaDemandas', '<?php echo $destino1; ?>', '<?php echo $titulo; ?>', '<?php echo $url1; ?>', '<?php echo $parametros; ?>');" onkeypress="if (event.keyCode == 13){chequeaForm('FormAgendaDemandas', '<?php echo $destino1; ?>', '<?php echo $titulo; ?>', '<?php echo $url1; ?>', '<?php echo $parametros; ?>');"/></div></td>
              </tr>
          </table>
		  </td>
		  </tr>
        <tr>
          <td><div align="center" id="botonListarDemandas"><a href="javascript:display('botonListarDemandas');display('botonResumenDemandas');display('tablaListarDemandas');display('tablaResumenDemandas');document.getElementById('inmo').focus();" title="Listar Demandas" class="menuItem" tabindex="12"><img src="interfaz/inmohost/images/iconos/20/listar.png" width="20" height="20" border="0" /><br />
            Listar<br />
            Demandas</a></div>
            <div align="center" id="botonResumenDemandas" style="display:none"><a href="javascript:display('botonListarDemandas');display('botonResumenDemandas');display('tablaListarDemandas');display('tablaResumenDemandas');" title="Resumen de Demandas" class="menuItem" tabindex="12"><img src="interfaz/inmohost/images/iconos/20/demanda.png" width="20" height="20" border="0" /><br />
            Resumen</a></div>
			</td>
          <!--td><div align="center"><a href="#" title="Agregar Demanda" class="menuItem" tabindex="13" onclick="display('menuPrincipal');ventana('alt_dem','mod_tip=add&ventana=alt_dem&fileXML=<?echo $file_dem?>&fileXSL=<?echo _FILE_XSL_DEMANDAS?>','<?echo _FILE_PHP_DEMANDAS?>','Alta de Demanda');"><img src="interfaz/inmohost/images/iconos/20/demanda.png" width="20" height="20" border="0" /><br /-->
          <td><div align="center"><a href="#" title="Agregar Demanda" class="menuItem" tabindex="13" onclick="display('menuPrincipal');ventana('alt_dem','&mod_tip=add&fileXML=<?echo $file_dem?>&fileXSL=<?echo _FILE_XSL_DEMANDAS?>','<?echo _FILE_PHP_DEMANDAS?>','Alta de Demanda');"><img src="interfaz/inmohost/images/iconos/20/demanda.png" width="20" height="20" border="0" /><br />
            Agregar<br />
            Demanda</a></div></td>
       </tr>
      </table>
        </form>
    </td>
  </tr>
</table>


