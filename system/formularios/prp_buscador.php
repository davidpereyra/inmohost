<?php 

	extract($_GET);
	extract ($_POST);
	extract ($_REQUEST);

$op = "buscar";


			$titulo = "Buscar Inmuebles"; //
			$destino1 = "prp_listado"; // listadoPropiedades
			$url1 = _FILE_PHP_PRP_LISTADO;
			$destino2 = "prp_ficha"; // listadoPropiedades
			$url2 = _FILE_PHP_PRP_FICHA;
			$inmo = true; //
			$parametros = "mod_search";
			$op2=$op;
         //

?>
		<form id="prpFormBuscarRapido" name="prpFormBuscarRapido" method="post" action="" >
	 <input type="hidden" name="chequea" id="chequea" value="dom,1,prp_id,1"/>
	 <input type="hidden" name="tipoForm" id="tipoForm" value="<?php echo $op; ?>" />
	 <input type="hidden" name="orden" id="orden" value="0"/>
	 <input type="hidden" name="usr_id"  value="<?php echo $_SESSION['usr_id'];?>"/>
 	 <input type="hidden" name="estado" value="1"/>
<?php 
	if ($op="modi")
	{
		print "<input type=\"hidden\" name=\"mod_tip\" value=\"edit\"/>";
		print "<input type=\"hidden\" name=\"mod_edit\" value=\"1\"/>";
	}
?>
	 <input type="hidden" name="usr_id"  value="<?php echo $_SESSION['usr_id'];?>"/>
	 <input type="hidden" name="usr_id_sys"  value="<?php echo $_SESSION['usr_id'];?>"/>
	 <input type="hidden" name="inmo_id"  value="<?php echo $_SESSION['usr_id'];?>"/>
	 
      <table width="280" height="60" border="0" cellpadding="1" cellspacing="0">
        <tr>
          <td width="40%"><div align="right">Construcci&oacute;n: </div></td>
          <td width="25%">
            <div align="left">
              <select name="tip_id" class="inputForm" id="tip_id" tabindex="1" style="width:100px" onkeypress="if (event.keyCode == 13){$('prp_id').value=''; chequeaForm('prpFormBuscarRapido', '<?php echo $destino1; ?>', '<?php echo $titulo; ?>', '<?php echo $url1; ?>', '<?php echo $parametros; ?>');}" onfocusin="$('tip_id').style.width = '300px';" onblur="$('tip_id').style.width = '100px';" onchange="$('tip_id').style.width = '100px'; $('con_id').focus();">
                <?php
					/* REGS= ID,Descripcion  */
					$regs=" tip_id,tip_desc ";
					$tablas=" tipo_const ";
					$xtras=" order by tip_desc ";
					$id=$tip_id;
                	$xtras=" order by tip_desc ASC";
                include($rutaSystemAbs._FILE_SCRIPT_PHP_SELECT);
                	$regs="";
                	$tablas="";
                	$id="";
                	$xtras="";

                 ?>
              </select>
            </div></td>
          <td><div align="right">ID:</div></td>
          <td><div align="left">
              <input name="prp_id" type="text" class="inputForm" id="prp_id" style="width:50px" tabindex="6" onkeypress="if (event.keyCode == 13){ if(soloNumerosVar(document.prpFormBuscarRapido.prp_id.value)){ chequeaForm('prpFormBuscarRapido', '<?php echo $destino2; ?>', '<?php echo $titulo; ?>', '<?php echo $url2; ?>', '<?php echo $parametros; ?>'); document.prpFormBuscarRapido.prp_id.className = 'inputForm';} else {document.prpFormBuscarRapido.prp_id.focus(); document.prpFormBuscarRapido.prp_id.value =''; document.prpFormBuscarRapido.prp_id.className = 'botonForm';}}" />
          </div></td>
        </tr>
        <tr>
          <td><div align="right">Condici&oacute;n: </div></td>
          <td>
            <div align="left">
              <select name="con_id" class="inputForm" id="con_id" tabindex="2" style="width:100px" onkeypress="if (event.keyCode == 13){$('prp_id').value=''; chequeaForm('prpFormBuscarRapido', '<?php echo $destino1; ?>', '<?php echo $titulo; ?>', '<?php echo $url1; ?>', '<?php echo $parametros; ?>');}">
                <?php 
                	/* REGS= ID,Descripcion  */
					$regs=" con_id,con_desc ";
					$tablas=" condiciones ";
					$id=$con_id;	
                	$xtras=" order by con_desc ASC";
                include($rutaSystemAbs._FILE_SCRIPT_PHP_SELECT);
                	$regs="";
                	$tablas="";
                	$id="";
                	$xtras="";
					?>
              </select>
            </div></td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
     
        <tr>
          <td><div align="right">Domicilio:</div></td>
          <td><div align="left">
              <input name="prp_dom" type="text" class="inputForm" id="dom" style="width:100px" tabindex="3"  onkeypress="if (event.keyCode == 13){$('prp_id').value=''; chequeaForm('prpFormBuscarRapido', '<?php echo $destino1; ?>', '<?php echo $titulo; ?>', '<?php echo $url1; ?>', '<?php echo $parametros; ?>');}"/>
          </div></td>
          <td><div align="right">Precio: </div></td>
          <td><div align="left">
              <input name="pre_medio" type="text" class="inputForm" id="pre_medio" style="width:50px" tabindex="4" onkeypress="if (event.keyCode == 13){$('prp_id').value=''; chequeaForm('prpFormBuscarRapido', '<?php echo $destino1; ?>', '<?php echo $titulo; ?>', '<?php echo $url1; ?>', '<?php echo $parametros; ?>');}"/>
              <!--return handleEnter(this, event);-->
          </div></td>
        </tr>
      </table>
</form>	