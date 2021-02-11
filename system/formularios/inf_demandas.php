<?php 


	include ("../php/config.php");
	extract($_GET);
	extract ($_POST);
	extract ($_REQUEST);
	
	
 switch ($op) {
     default:
			$titulo = "Generar Informes sobre Demandas"; //
			$destino1 = "inf_listado"; // listadoPropiedades
			$url1 = _FILE_PHP_INF_LISTADO;
			$parametros = "mod_search";
         break;
         //
 }
?>
<table width="240" border="0" align="center" cellpadding="0" cellspacing="0" id="tablaMorir">
  <tr>
    <td><form id="FormInformesDemandas" name="FormInformesDemandas" method="post" action="">
      <table width="100%" border="0" cellpadding="1" cellspacing="1">
        <tr>
          <td width="100%" colspan="2">
            <h1 align="left">Generar Informes sobre Demandas</h1>
			<hr />			</td>
          </tr>
		<tr>
		  <td colspan="2">
		<table width="100%" border="0" cellpadding="1" cellspacing="1" class="tableOscura" id="tablaListarDemandas" >
              <tr class="tableClara">
                <td><div align="right">Provincia:</div></td>
                <td><select name="inmo" class="inputForm" id="inmo" tabindex="1" onkeypress="if (event.keyCode == 13){chequeaForm('FormInformesDemandas', '<?php echo $destino1; ?>', '<?php echo $titulo; ?>', '<?php echo $url1; ?>', '<?php echo $parametros; ?>');}" >
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
                </select></td>
              </tr>
              <tr class="tableClara">
                <td><div align="right">Departamento:</div></td>
                <td><select name="select" class="inputForm" id="select" tabindex="2" onkeypress="if (event.keyCode == 13){chequeaForm('FormInformesDemandas', '<?php echo $destino1; ?>', '<?php echo $titulo; ?>', '<?php echo $url1; ?>', '<?php echo $parametros; ?>');}" >
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
                </select></td>
              </tr>
              <tr class="tableClara">
                <td><div align="right">Tipo de Cons.:</div></td>
                <td><select name="select2" class="inputForm" id="select2" tabindex="3" onkeypress="if (event.keyCode == 13){chequeaForm('FormInformesDemandas', '<?php echo $destino1; ?>', '<?php echo $titulo; ?>', '<?php echo $url1; ?>', '<?php echo $parametros; ?>');}" >
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
                </select></td>
              </tr>
              <tr class="tableClara">
                <td><div align="right">Condici&oacute;n:</div></td>
                <td><select name="select3" class="inputForm" id="select3" tabindex="4" onkeypress="if (event.keyCode == 13){chequeaForm('FormInformesDemandas', '<?php echo $destino1; ?>', '<?php echo $titulo; ?>', '<?php echo $url1; ?>', '<?php echo $parametros; ?>');}" >
<?php 
                /* REGS= ID,Descripcion  */
					$regs=" usr_id,usr_raz ";
					$tablas=" usuarios ";
					$id=$usr_id;
					$xtras=" order by usr_raz ASC";
                include("../"._FILE_SCRIPT_PHP_SELECT); 
?>
                </select></td>
              </tr>
              <tr class="tableClara">
                <td><div align="right">Domicilio:</div></td>
                <td><input name="prp_id2" type="text" class="inputForm" id="prp_id2" tabindex="5" style="width:80px" onkeypress="if (event.keyCode == 13){chequeaForm('FormInformesDemandas', '<?php echo $destino1; ?>', '<?php echo $titulo; ?>', '<?php echo $url1; ?>', '<?php echo $parametros; ?>');}" /></td>
              </tr>
              <tr class="tableClara">
                <td><div align="right">Barrio:</div></td>
                <td><input name="prp_id3" type="text" class="inputForm" id="prp_id3" tabindex="6" style="width:80px" onkeypress="if (event.keyCode == 13){chequeaForm('FormInformesDemandas', '<?php echo $destino1; ?>', '<?php echo $titulo; ?>', '<?php echo $url1; ?>', '<?php echo $parametros; ?>');}"/></td>
              </tr>
              <tr class="tableClara">
                <td><div align="right">Rango de Precio:</div></td>
                <td><input name="prp_id4" type="text" class="inputForm" id="prp_id4" tabindex="7" style="width:30px" onkeypress="if (event.keyCode == 13){chequeaForm('FormInformesDemandas', '<?php echo $destino1; ?>', '<?php echo $titulo; ?>', '<?php echo $url1; ?>', '<?php echo $parametros; ?>');}"/> 
                  y
                    <input name="prp_id5" type="text" class="inputForm" id="prp_id5" tabindex="8" style="width:30px" onkeypress="if (event.keyCode == 13){chequeaForm('FormInformesDemandas', '<?php echo $destino1; ?>', '<?php echo $titulo; ?>', '<?php echo $url1; ?>', '<?php echo $parametros; ?>');}"/></td>
              </tr>
              <tr class="tableClara">
                <td colspan="2"><div align="right">
                  <input name="listar2" type="button" class="botonForm" id="listar2" tabindex="9" value="Listar" onclick="chequeaForm('FormInformesDemandas', '<?php echo $destino1; ?>', '<?php echo $titulo; ?>', '<?php echo $url1; ?>', '<?php echo $parametros; ?>');" onkeypress="if (event.keyCode == 13){chequeaForm('FormInformesDemandas', '<?php echo $destino1; ?>', '<?php echo $titulo; ?>', '<?php echo $url1; ?>', '<?php echo $parametros; ?>');}" />
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


