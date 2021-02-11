<?php 


	include ("../php/config.php");
	include ("../php/sec_head.php");
	
	extract($_GET);
	extract ($_POST);
	extract ($_REQUEST);

 switch ($op) {
     case "buscar":
			$titulo = "Busqueda Avanzada"; //
			$destino1 = "prp_listado"; // listadoPropiedades
			$url1 = _FILE_PHP_PRP_LISTADO;
			$destino2 = "prp_ficha"; // listadoPropiedades
			$url2 = _FILE_PHP_PRP_FICHA;
			$inmo = true; //
			$parametros = "mod_search";
			$op2=$op;
			$selected_indistinto="";
			$selected_mostrar="selected=\"true\"";
         break;
     case "modi":
			$titulo = "Modificar Inmuebles"; //
			$destino1 = "prp_listado"; // listadoPropiedades
			$url1 = _FILE_PHP_PRP_LISTADO;
			$destino2 = "prp_ficha"; // listadoPropiedades
			$url2 = _FILE_PHP_PRP_FICHA_EDIT."?mod_edit=1&prp_id=$prp_id&usr_id=$_USR_ID";
			$inmo = false; //
			$parametros = "mod_edit";
			$op2=$op;
			$selected_indistinto="selected=\"true\"";
			$selected_mostrar="";
         break;
     case "del":
			$titulo = "Modificar Estado de los Inmuebles"; //
			$destino1 = "prp_listado"; // listadoPropiedades
			$url1 = _FILE_PHP_PRP_LISTADO;
			$destino2 = "alerta"; // listadoPropiedades
			$url2 = _FILE_PHP_PRP_LISTADO."?mod_edit=1&prp_id=$prp_id&usr_id=$_USR_ID";
			$inmo = false; //
			$parametros = "mod_del";
			$op2=$op;
			$selected_indistinto="selected=\"true\"";
			$selected_mostrar="";
         break;
     default:
         //
 }
?>
<table width="280" border="0" align="center" cellpadding="0" cellspacing="0" id="tablaMorir">
  <tr>
    <td><form id="prpFormBuscar" name="prpFormBuscar" method="post" action="" >
	 
	 <input type="hidden" name="chequea" id="chequea" value="dom,1,prp_id,1"/>
	 
	 <input type="hidden" name="tipoForm" id="tipoForm" value="<?php echo $op2; ?>" />
	 <input type="hidden" name="orden" id="orden" value="1"/>
	 <input type="hidden" name="usr_id"  value="<?php echo $_SESSION['usr_id'];?>"/>
<?php 
	if ($op2=="modi")
	{
		print "<input type=\"hidden\" name=\"mod_tip\" value=\"edit\"/>";
		print "<input type=\"hidden\" name=\"mod_edit\" value=\"1\"/>";
	}
?>
	 <input type="hidden" name="usr_id_sys"  value="<?php echo $_SESSION['usr_id'];?>"/>
	 
      <table width="100%" border="0" cellspacing="0" cellpadding="1">
        <tr>
          <td colspan="2"><h1 align="left"><?php echo $titulo;?></h1><hr /></td>
          </tr>
       <? if($op!="modi" && $op!="del" ){ ?>
         <tr>
          <td><div align="right">Inmobiliaria:</div></td>
          <td>
              <div align="left">
                <select style="width:190px" name="inmo_id" class="inputForm" id="inmo_id" tabindex="14" onkeypress="if (event.keyCode == 13){$('prp_id').value='';  chequeaForm('prpFormBuscar', '<?php echo $destino1; ?>', '<?php echo $titulo; ?>', '<?php echo $url1; ?>', '<?php echo $parametros; ?>');}">
                <?php  
					 /* REGS= ID,Descripcion  */
					$regs=" usr_id,usr_raz ";
					$tablas=" usuarios ";
					$id=_USR_ID;
					$xtras=" order by usr_raz ASC";					
                include("../"._FILE_SCRIPT_PHP_SELECT); 
               	 	$regs="";
                	$tablas="";
                	$id="";
                	$xtras="";

				?>
                </select>
          </div></td>
        </tr> 
        <?}else{
        ?>
        <input type="hidden" name="inmo_id" value="<?echo _USR_ID?>">
        
		<?}
        ?>
        <tr>
          <td colspan="2"><hr /></td>
        </tr>         
        <tr>
          <td><div align="right">Tipo de construcci&oacute;n: </div></td>
          <td>
            <div align="left">
              <select style="width:190px" name="tip_id" class="inputForm" id="tip_id" tabindex="2" onkeypress="if (event.keyCode == 13){$('prp_id').value=''; chequeaForm('prpFormBuscar', '<?php echo $destino1; ?>', '<?php echo $titulo; ?>', '<?php echo $url1; ?>', '<?php echo $parametros; ?>');}">
                <?php
					/* REGS= ID,Descripcion  */
					$regs=" tip_id,tip_desc ";
					$tablas=" tipo_const ";
					$xtras=" order by tip_desc ";
					$id=$tip_id;
                	$xtras=" order by tip_desc ASC";
                include("../"._FILE_SCRIPT_PHP_SELECT);
                	$regs="";
                	$tablas="";
                	$id="";
                	$xtras="";

                 ?>
              </select>
            </div></td></tr>
        <tr>
          <td><div align="right">Condici&oacute;n: </div></td>
          <td>
            <div align="left">
              <select style="width:190px" name="con_id" class="inputForm" id="con_id" tabindex="3" onkeypress="if (event.keyCode == 13){$('prp_id').value=''; chequeaForm('prpFormBuscar', '<?php echo $destino1; ?>', '<?php echo $titulo; ?>', '<?php echo $url1; ?>', '<?php echo $parametros; ?>');}">
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
              </div></td></tr>
        <tr>
          <td><div align="right">Precio $</div></td>
          <td>
            <div align="right">
              entre
                <input name="pes_ent" type="text" class="inputForm" id="pes_ent" style="width:65px" tabindex="4" onkeypress="if (event.keyCode == 13){$('prp_id').value=''; chequeaForm('prpFormBuscar', '<?php echo $destino1; ?>', '<?php echo $titulo; ?>', '<?php echo $url1; ?>', '<?php echo $parametros; ?>');}"/><!--return handleEnter(this, event);-->
              y <input name="pes_y" type="text" class="inputForm" id="pes_y" style="width:65px" tabindex="5" onkeypress="if (event.keyCode == 13){$('prp_id').value=''; chequeaForm('prpFormBuscar', '<?php echo $destino1; ?>', '<?php echo $titulo; ?>', '<?php echo $url1; ?>', '<?php echo $parametros; ?>');}"/><!--return handleEnter(this, event);-->
          </div>          </td>
        </tr>
         <tr>
          <td><div align="right">Precio U$S</div></td>
          <td>
            <div align="right">
              entre 
                <input name="dol_ent" type="text" class="inputForm" id="dol_ent" style="width:65px" tabindex="6" onkeypress="if (event.keyCode == 13){$('prp_id').value=''; chequeaForm('prpFormBuscar', '<?php echo $destino1; ?>', '<?php echo $titulo; ?>', '<?php echo $url1; ?>', '<?php echo $parametros; ?>');}"/><!--return handleEnter(this, event);-->
              y <input name="dol_y" type="text" class="inputForm" id="dol_y" style="width:65px" tabindex="7" onkeypress="if (event.keyCode == 13){$('prp_id').value=''; chequeaForm('prpFormBuscar', '<?php echo $destino1; ?>', '<?php echo $titulo; ?>', '<?php echo $url1; ?>', '<?php echo $parametros; ?>');}"/><!--return handleEnter(this, event);-->
          </div>          </td>
        </tr>
        <tr>
          <td><div align="right">Domicilio:</div></td>
          <td>
            <div align="left">
              <input name="prp_dom" type="text" class="inputForm" id="dom" style="width:186px" tabindex="8"  onkeypress="if (event.keyCode == 13){$('prp_id').value=''; chequeaForm('prpFormBuscar', '<?php echo $destino1; ?>', '<?php echo $titulo; ?>', '<?php echo $url1; ?>', '<?php echo $parametros; ?>');}"/>
              </div></td></tr>
		<tr>
          <td><div align="right">Estado:</div></td>
          <td><div align="left"><select style="width:190px" name='estado' class="inputForm"  id='estado'>
          			<option value='0' <?print $selected_indistinto?>>Indistinto</option>
          			<option value='2' >Alquilada/Vendida</option>
          			<option value='1' <?print $selected_mostrar?>>Mostrar</option>          			
          			<option value='3'>Suspendida</option></select>
          </div></td>
		</tr>              

        <tr>
          <td><div align="right">Ordenar por:</div></td>
          <td><div align="left">
            <select style="width:100px" name="orden" class="inputForm" id="orden" tabindex="10" onkeypress="if (event.keyCode == 13){$('prp_id').value=''; chequeaForm('prpFormBuscar', '<?php echo $destino1; ?>', '<?php echo $titulo; ?>', '<?php echo $url1; ?>', '<?php echo $parametros; ?>');}" >
              <option value="4">Barrio</option>
              <option value="6">Foto/Sin Foto</option>
              <option value="7">ID</option>              
              <option value="3">Localidad</option>              
              <option value="1">Modificacion</option>              
              <option value="5" selected="selected">Precio</option>
              <option value="2">Provincia</option>                                         
            </select>
            <select style="width:86px" name="sentido" class="inputForm" id="sentido" tabindex="11" onkeypress="if (event.keyCode == 13){$('prp_id').value=''; chequeaForm('prpFormBuscar', '<?php echo $destino1; ?>', '<?php echo $titulo; ?>', '<?php echo $url1; ?>', '<?php echo $parametros; ?>');}" >
              <option value="ASC">Ascendente</option>
              <option value="DESC">Descendente</option>
                                    </select>
          </div></td>
          </tr>
        <tr>
          <td width="40%"><div align="right">Por p&aacute;gina:</div></td>
          <td>          
              <div align="left">
                <select style="width:100px" name="offest" class="inputForm" id="offest" tabindex="12" onkeypress="if (event.keyCode == 13){$('prp_id').value=''; chequeaForm('prpFormBuscar', '<?php echo $destino1; ?>', '<?php echo $titulo; ?>', '<?php echo $url1; ?>', '<?php echo $parametros; ?>');}" >
                  <option value="10" selected="selected">10</option>
                  <option value="50">50</option>
                  <option value="100">100</option>
                </select>
              </div></td>
        </tr>
        <!--tr>
          <td colspan="3" align="right"><input name="buscar" type="button" class="botonForm" id="buscar" value=" Buscar " tabindex="13" onclick="$('prp_id').value=''; chequeaForm('prpFormBuscar', '<?php echo $destino1; ?>', '<?php echo $titulo; ?>', '<?php echo $url1; ?>', '<?php echo $parametros; ?>');" onkeypress="if (event.keyCode == 13){$('prp_id').value=''; chequeaForm('prpFormBuscar', '<?php echo $destino1; ?>', '<?php echo $titulo; ?>', '<?php echo $url1; ?>', '<?php echo $parametros; ?>');}" style="right:0px; position:static" /></td>
         </tr-->
  
<?php 
        ?>
        <tr>
          <td colspan="2"><hr /></td>
        </tr>
        <tr>
          <td>
          	<div align="right">Aviso:</div>
          </td>
          <td>
            <div align="left">
              <input name="prp_pub" type="text" class="inputForm" id="prp_pub" style="width:186px" tabindex="8"  onkeypress="if (event.keyCode == 13){$('prp_id').value=''; chequeaForm('prpFormBuscar', '<?php echo $destino1; ?>', '<?php echo $titulo; ?>', '<?php echo $url1; ?>', '<?php echo $parametros; ?>');}"/>
            </div></td>
        </tr>
        <tr>
          <td colspan="2"><hr /></td>
        </tr>      

            
<?php if($parametros == "mod_del"){ ?>
        <tr>
          <td><div align="right">ID: </td>
          <td><input class="inputForm" type="text" name="prp_id" style="width:100px" onkeypress="if(event.keyCode==13){if (soloNumerosVar(document.prpFormBuscar.prp_id.value) || document.prpFormBuscar.prp_id.value==''){chequeaForm('prpFormBuscar', '<?php echo $destino2; ?>', '<?php echo $titulo; ?>', '<?php echo $url2; ?>', '<?php echo $parametros; ?>'); } else { alert('Ingrese un N&uacute;mero de ID V&aacute;lido'); }}"></div></td>
         </tr>
         <tr> 
          <td colspan="2">
              <div align="right">
                <input name="buscar2" type="button" class="botonForm" id="buscar2" value=" Buscar " tabindex="16" 
	    	    	onclick="if (soloNumerosVar(document.prpFormBuscar.prp_id.value) || document.prpFormBuscar.prp_id.value==''){chequeaForm('prpFormBuscar', '<?php echo $destino1; ?>', '<?php echo $titulo; ?>', '<?php echo $url1; ?>', '<?php echo $parametros; ?>'); } else { alert('Ingrese un N&uacute;mero de ID V&aacute;lido'); }"/>
              </div></td>
          </tr>
<?php } else { ?>
        <tr>
          <td><div align="right">ID: </div></td>
          <td>
              <div align="left">
                <input name="prp_id" type="text" class="inputForm" id="prp_id" style="width:100px" tabindex="15"  	onkeypress="if (event.keyCode == 13){if (soloNumerosVar(document.prpFormBuscar.prp_id.value)||document.prpFormBuscar.prp_id.value==''){ chequeaForm('prpFormBuscar', '<?php echo $destino1; ?>', '<?php echo $titulo; ?>', '<?php echo $url1; ?>', '<?php echo $parametros; ?>');} else { alert('Ingrese un N&uacute;mero de ID V&aacute;lido');}}"/>
                <!--input name="prp_id" type="text" class="inputForm" id="prp_id" style="width:100px" tabindex="15" onkeypress="if (event.keyCode == 13){ if(soloNumerosVar(document.prpFormBuscar.prp_id.value)){ dialogos('alerta', '&mod_edit=1&prp_id='+document.prpFormBuscar.prp_id.value+'&usr_id='+_USR_ID+'', '<?php echo _FILE_PHP_PRP_ESTADO; ?>', 'Modificar Estado');} else document.prpFormBuscar.prp_id.focus();}"/-->
              </div> </td>
        </tr>
        <tr>      
         <td colspan=2 align="right">
        	   <!--input name="buscar23" type="button" class="botonForm" id="buscar23" value=" Buscar " tabindex="16" onclick="if (soloNumerosVar(document.prpFormBuscar.prp_id.value)||document.prpFormBuscar.prp_id.value=='' ){ chequeaForm('prpFormBuscar', '<?php echo $destino2; ?>', '<?php echo $titulo; ?>', '<?php echo $url2; ?>', '<?php echo $parametros; ?>');} else { alert('Ingrese un N&uacute;mero de ID V&aacute;lido');}"-->
        	   <input name="buscar" type="button" class="botonForm" id="buscar" value=" Buscar " tabindex="13" onclick="if (soloNumerosVar(document.prpFormBuscar.prp_id.value)||document.prpFormBuscar.prp_id.value=='' ){ chequeaForm('prpFormBuscar', '<?php echo $destino1; ?>', '<?php echo $titulo; ?>', '<?php echo $url1; ?>', '<?php echo $parametros; ?>');} else { alert('Ingrese un N&uacute;mero de ID V&aacute;lido');}"/>
		</td>
          </tr>
	<?php } ?>
      </table>
        </form>
    </td>
  </tr>
</table>


