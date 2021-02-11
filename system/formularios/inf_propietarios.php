<?php 


	include ("../php/config.php");
	extract($_GET);
	extract ($_POST);
	extract ($_REQUEST);
	
	
 switch ($op) {
     default:
			$titulo = "Generar Informes sobre Propietarios"; //
			$destino1 = "inf_listado"; // listadoPropietarios
			$url1 = _FILE_PHP_INF_LISTADO;
			$parametros = "mod_search";
         break;
         //
 }
?>
<table width="240" border="0" align="center" cellpadding="0" cellspacing="0" id="tablaMorir">
  <tr>
    <td><form id="FormInformesPropietarios" name="FormInformesPropietarios" method="post" action="">
      <table width="100%" border="0" cellpadding="1" cellspacing="1">
        <tr>
          <td width="100%" colspan="2"><h1>Generar Informes de Propietarios</h1>
            <hr />			</td></tr>
		<tr>
		  <td colspan="2">
		<table width="100%" border="0" cellpadding="1" cellspacing="1" class="tableOscura" id="tablaListarPropietarios" >
              <tr class="tableClara">
                <td colspan="2"><strong>Propietario:</strong></td>
              </tr>
              <tr class="tableClara">
                <td><div align="right">Apellido:</div></td>
                <td><input name="apellido" type="text" class="inputForm" id="apellido" maxlength="50" tabindex="1" style="width:80px" onkeypress="if (event.keyCode == 13){chequeaForm('FormInformesDemandas', '<?php echo $destino1; ?>', '<?php echo $titulo; ?>', '<?php echo $url1; ?>', '<?php echo $parametros; ?>');}"/></td>
              </tr>
              <tr class="tableClara">
                <td><div align="right">Nombre:</div></td>
                <td><input name="nombre" type="text" class="inputForm" id="nombre" maxlength="50" tabindex="2" style="width:80px" onkeypress="if (event.keyCode == 13){chequeaForm('FormInformesDemandas', '<?php echo $destino1; ?>', '<?php echo $titulo; ?>', '<?php echo $url1; ?>', '<?php echo $parametros; ?>');}"/></td>
              </tr>
              <tr class="tableClara">
                <td><div align="right">Tel&eacute;fono:</div></td>
                <td><select name="telefono" class="inputForm" id="telefono" tabindex="3" onkeypress="if (event.keyCode == 13){chequeaForm('FormInformesPropietarios', '<?php echo $destino1; ?>', '<?php echo $titulo; ?>', '<?php echo $url1; ?>', '<?php echo $parametros; ?>');}">
                  <option value="0">Con/Sin</option>
                  <option value="1">Con</option>
                  <option value="2">Sin</option>
                </select></td>
              </tr>
              <tr class="tableClara">
                <td><div align="right">E-mail:</div></td>
                <td><select name="email" class="inputForm" id="email" tabindex="4" onkeypress="if (event.keyCode == 13){chequeaForm('FormInformesPropietarios', '<?php echo $destino1; ?>', '<?php echo $titulo; ?>', '<?php echo $url1; ?>', '<?php echo $parametros; ?>');}">
                  <option value="0">Con/Sin</option>
                  <option value="1">Con</option>
                  <option value="2">Sin</option>
                </select></td>
              </tr>
              <tr class="tableClara">
                <td colspan="2"><strong>Datos del Inmueble:</strong></td>
              </tr>
              <tr class="tableClara">
                <td><div align="right">Id:</div></td>
                <td><input name="prp_id" type="text" class="inputForm" id="prp_id" maxlength="10" tabindex="5" style="width:50px" onkeypress="if (event.keyCode == 13){chequeaForm('FormInformesDemandas', '<?php echo $destino1; ?>', '<?php echo $titulo; ?>', '<?php echo $url1; ?>', '<?php echo $parametros; ?>');}"/></td>
              </tr>
              <tr class="tableClara">
                <td><div align="right">Provincia:</div></td>
                <td><select name="inmo" class="inputForm" id="inmo" tabindex="6" onkeypress="if (event.keyCode == 13){chequeaForm('FormInformesDemandas', '<?php echo $destino1; ?>', '<?php echo $titulo; ?>', '<?php echo $url1; ?>', '<?php echo $parametros; ?>');}" >
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
                <td><select name="select" class="inputForm" id="select" tabindex="7" onkeypress="if (event.keyCode == 13){chequeaForm('FormInformesDemandas', '<?php echo $destino1; ?>', '<?php echo $titulo; ?>', '<?php echo $url1; ?>', '<?php echo $parametros; ?>');}" >
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
                <td><select name="select2" class="inputForm" id="select2" tabindex="8" onkeypress="if (event.keyCode == 13){chequeaForm('FormInformesDemandas', '<?php echo $destino1; ?>', '<?php echo $titulo; ?>', '<?php echo $url1; ?>', '<?php echo $parametros; ?>');}" >
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
                <td><select name="select3" class="inputForm" id="select3" tabindex="9" onkeypress="if (event.keyCode == 13){chequeaForm('FormInformesDemandas', '<?php echo $destino1; ?>', '<?php echo $titulo; ?>', '<?php echo $url1; ?>', '<?php echo $parametros; ?>');}" >
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
                <td><div align="right">Domicilio:</div></td>
                <td><input name="prp_id2" type="text" class="inputForm" id="prp_id2" style="width:80px" tabindex="10" onkeypress="if (event.keyCode == 13){chequeaForm('FormInformesDemandas', '<?php echo $destino1; ?>', '<?php echo $titulo; ?>', '<?php echo $url1; ?>', '<?php echo $parametros; ?>');}" maxlength="50" /></td>
              </tr>
              <tr class="tableClara">
                <td><div align="right">Barrio:</div></td>
                <td><input name="prp_id3" type="text" class="inputForm" id="prp_id3" style="width:80px" tabindex="11" onkeypress="if (event.keyCode == 13){chequeaForm('FormInformesDemandas', '<?php echo $destino1; ?>', '<?php echo $titulo; ?>', '<?php echo $url1; ?>', '<?php echo $parametros; ?>');}" maxlength="50"/></td>
              </tr>
              
              
              
              <tr class="tableClara">
                <td colspan="2"><div align="right">
                  <input name="listar2" type="button" class="botonForm" id="listar2" value="Listar" tabindex="12" onclick="chequeaForm('FormInformesPropietarios', '<?php echo $destino1; ?>', '<?php echo $titulo; ?>', '<?php echo $url1; ?>', '<?php echo $parametros; ?>');" onkeypress="if (event.keyCode == 13){chequeaForm('FormInformesPropietarios', '<?php echo $destino1; ?>', '<?php echo $titulo; ?>', '<?php echo $url1; ?>', '<?php echo $parametros; ?>');}" />
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


