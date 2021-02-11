<?php 


	include ("../php/config.php");
	extract($_GET);
	extract ($_POST);
	extract ($_REQUEST);
	
 switch ($op) {
     default:
			$titulo = "Medios Publicitarios"; //
			$destino1 = "prp_medios"; // listadoPropiedades
			$url1 = _FILE_PHP_PRP_PUBLICACIONES;
			$parametros = "ventana";
         break;
         //
 }
 
?>
<table width="240" border="0" align="center" cellpadding="0" cellspacing="0" id="tablaMorir">
  <tr>
    <td colspan="6" ><h1 align="left">Publicaciones en gr&aacute;fica </h1>
      <hr /></td>
  </tr>
  <tr>
    <td colspan="3"><div align="center" id="tablaBannerMedios"></div>
	<form id="FormPrpMedios" name="FormPrpMedios" method="post" action="" onsubmit="event.returnValue=false;">
			<table width="100%" border="0" cellpadding="1" cellspacing="1" class="tableOscura" id="tablaListarPrpMedios">
              <tr class="tableClara">
                <td colspan="2"><h1><strong>Filtrar Inmuebles</strong></h1></td>
              </tr>
              <tr class="tableClara">
                <td><div align="right">Tipo de cons.: </div></td>
                <td><div align="left">
                    <select name="tip_id" class="inputForm" id="tip_id" tabindex="2" onkeypress="if (event.keyCode == 13){chequeaForm('FormPrpMedios', '<?php echo $destino1; ?>', '<?php echo $titulo; ?>', '<?php echo $url1; ?>', '<?php echo $parametros; ?>');}">
                      <?php
					/* REGS= ID,Descripcion  */
					$regs=" tip_id,tip_desc ";
					$tablas=" tipo_const ";
					$xtras=" order by tip_desc ";
					$id=$tip_id;
                
                include("../"._FILE_SCRIPT_PHP_SELECT);
                
                	$regs="";
                	$tablas="";
                	$id="";
                	$xtras="";

                 ?>
                    </select>
                </div></td>
              </tr>
              <tr class="tableClara">
                <td><div align="right">Condici&oacute;n: </div></td>
                <td><div align="left">
                    <select name="con_id" class="inputForm" id="con_id" tabindex="3" onkeypress="if (event.keyCode == 13){chequeaForm('FormPrpMedios', '<?php echo $destino1; ?>', '<?php echo $titulo; ?>', '<?php echo $url1; ?>', '<?php echo $parametros; ?>');}">
                      <?php 
                	/* REGS= ID,Descripcion  */
					$regs=" con_id,con_desc ";
					$tablas=" condiciones ";
					$id=$con_id;	
					$xtras=" order by con_desc ASC";                
                include("../"._FILE_SCRIPT_PHP_SELECT);

                	$regs="";
                	$tablas="";
                	$id="";
                	$xtras="";
					?>
                    </select>
                </div></td>
              </tr>
              <tr class="tableClara">
                <td><div align="right">Suspendidos:</div></td>
                <td><div align="left">
                  <input name="prp_mostrar" type="checkbox" class="inputForm" value="true" tabindex="6" id="prp_susp"  onkeypress="if (event.keyCode == 13){chequeaForm('FormPrpMedios', '<?php echo $destino1; ?>', '<?php echo $titulo; ?>', '<?php echo $url1; ?>', '<?php echo $parametros; ?>');}"/>
                </div></td>
              </tr>
             <tr class="tableClara">
                <td colspan="2"><div align="right"><input name="listar" type="button" class="botonForm" id="listar" value="Listar" tabindex="5" onclick="chequeaForm('FormPrpMedios', '<?php echo $destino1; ?>', '<?php echo $titulo; ?>', '<?php echo $url1; ?>', '<?php echo $parametros; ?>');" onkeypress="if (event.keyCode == 13){chequeaForm('FormPrpMedios', '<?php echo $destino1; ?>', '<?php echo $titulo; ?>', '<?php echo $url1; ?>', '<?php echo $parametros; ?>');}" />
                </div></td>
              </tr>
             <tr class="tableClara">
               <td colspan="2"><div align="right">
                 <input name="buscar22" type="button" class="botonForm" id="buscar22" value="Mostrar Todos" tabindex="9" onclick="chequeaForm('FormPrpMedios', '<?php echo $destino1; ?>', '<?php echo $titulo; ?>', '<?php echo $url1; ?>', '<?php echo $parametros; ?>');" onkeypress="if (event.keyCode == 13){chequeaForm('FormPrpMedios', '<?php echo $destino1; ?>', '<?php echo $titulo; ?>', '<?php echo $url1; ?>', '<?php echo $parametros; ?>');}" />
               </div></td>
             </tr>
             <tr class="tableClara">
               <td><div align="right">ID:</div></td>
               <td><div align="left">
                   <input name="prp_id" type="text" class="inputForm" id="prp_id" value="" tabindex="10" style="width:80px;" onkeypress="if (event.keyCode == 13){chequeaForm('FormPrpMedios', '<?php echo $destino1; ?>', '<?php echo $titulo; ?>', '<?php echo $url1; ?>', '<?php echo $parametros; ?>');}" />
               </div></td>
             </tr>
             <tr class="tableClara">
               <td>&nbsp;</td>
               <td><div align="right">
                   <input name="buscar2" type="button" class="botonForm" id="buscar2" value="Mostrar" tabindex="11" onclick="if (soloNumerosVar(document.FormPrpMedios.prp_id.value)){ chequeaForm('FormPrpMedios', '<?php echo $destino1; ?>', '<?php echo $titulo; ?>', '<?php echo $url1; ?>', '<?php echo $parametros; ?>');} else document.FormPrpMedios.prp_id.focus();" onkeypress="if (event.keyCode == 13){ if (soloNumerosVar(document.FormPrpMedios.prp_id.value)){ chequeaForm('FormPrpMedios', '<?php echo $destino1; ?>', '<?php echo $titulo; ?>', '<?php echo $url1; ?>', '<?php echo $parametros; ?>'); } else document.FormPrpMedios.prp_id.focus();}" />
				   </div></td>
             </tr>
          </table>
	  </form>	
	  </td>
  </tr>
  <tr>
   <td colspan="3"><div align="center">
     <hr />
   </div></td>
 </tr>
</table>