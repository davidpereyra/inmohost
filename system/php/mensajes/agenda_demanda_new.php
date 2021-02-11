<?php 
	extract($_GET);
	extract ($_POST);
	extract ($_REQUEST);

	//recibe $id //parametro $_REQUEST["id"];
	include ("../config.php");
	

?>
<div id="toolTipContenido" >
<script language="javascript" type="text/javascript" src="../javascript/formularios.js"></script>
<script language="JavaScript">

	function agrega_dem(){
			document.agendaDemandaAgregar.submit();
	}

</script>
<form id="agendaDemandaAgregar" enctype="multipart/form-data" name="agendaDemandaAgregar" method="post" action="<?php print $rutaSystema."demandas_mensajes.php"; ?>" style="height:100%" >
	<input type="hidden" name="mod_tip" value="add">
	<input type="hidden" name="otro" value="22">
  <table width="100%" height="100%" border="0" cellpadding="1" cellspacing="1" class="tableOscura">
        <tr class="tableClara">
          <td width="150%" colspan="3">
            <h1 align="left">Demandas</h1>
			<hr />			</td>
          </tr>
		<tr>
		  <td colspan="3">

		<table width="100%" border="0" cellpadding="1" cellspacing="1" class="tableOscura" id="tablaListarDemandas" >
              <tr class="tableClara">
                <td><div align="right">Provincia:</div></td>
                <td><span id="div_pro_id"><select name="pro_id" class="inputForm" id="inmo" tabindex="1" onchange="act_select('loc_id,loc_desc','localidades','pro_id='+this.value,'loc_id',' multiple size=3 ','','loc_desc');" >
<?php 
                /* REGS= ID,Descripcion  */
					$regs=" pro_id,pro_desc ";
					$tablas=" provincias ";
					$id=$PROV_DEFAULT;
					$xtras=" order by pro_desc ASC";
                include("../../"._FILE_SCRIPT_PHP_SELECT); 
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
                <td><span id="div_loc_id"><select size="3" name="loc_id[]" class="inputForm" id="select" tabindex="2">
<?php 
                /* REGS= ID,Descripcion  */
					$regs=" loc_id,loc_desc ";
					$tablas=" localidades ";
					$filtro=" localidades.pro_id=$PROV_DEFAULT"; 
					$xtras=" order by loc_desc ASC";
                include("../../"._FILE_SCRIPT_PHP_SELECT); 
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
                <td><select  multiple size="3" name="tip_id[]" class="inputForm" id="select2" tabindex="3" >
<?php 
                /* REGS= ID,Descripcion  */
					$regs=" tip_id,tip_desc ";
					$tablas=" tipo_const ";
					$xtras=" order by tip_desc ASC";
                include("../../"._FILE_SCRIPT_PHP_SELECT); 
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
                <td><select size="3" name="con_id[]" class="inputForm" id="select3" tabindex="4">
<?php 
                /* REGS= ID,Descripcion  */
					$regs=" con_id,con_desc ";
					$tablas=" condiciones ";
					$xtras=" order by con_desc ASC";					
               include("../../"._FILE_SCRIPT_PHP_SELECT); 
               	$regs="";
					$tablas="";
					$filtro=""; 
					$id="";
                	$xtras="";
?>
                </select></td>
              </tr>
              <tr class="tableClara">
                <td><div align="right">Domicilio:</div></td>
                <td><input name="dem_dom" type="text" class="inputForm" id="prp_id2" tabindex="5" style="width:80px"/></td>
              </tr>
              <tr class="tableClara">
                <td><div align="right">Barrio:</div></td>
                <td><input name="dem_barr" type="text" class="inputForm" id="prp_id3" tabindex="6" style="width:80px"/></td>
              </tr>
              <tr class="tableClara">
                <td><div align="right">Rango de Precio:</div></td>
                <td><input name="dem_pre_min" type="text" class="inputForm" id="prp_id4" tabindex="7" style="width:30px" /> 
                  y
                    <input name="dem_pre_max" type="text" class="inputForm" id="prp_id5" tabindex="8" style="width:30px" /></td>
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
                <td colspan="2"><div align="center">
                  <input name="listar2" type="button" class="botonForm" id="listar2" tabindex="9" value="Cerrar" onclick="hideToolTip()" />
                  <input name="listar2" type="submit" class="botonForm" tabindex="9" value="Agregar" />
                </div></td>
                </tr>
             
          </table>
		  </td>
		  </tr>
        
      </table>
</form>
</div>