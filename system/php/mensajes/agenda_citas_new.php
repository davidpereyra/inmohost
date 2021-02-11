<?php 
	extract($_GET);
	extract ($_POST);
	extract ($_REQUEST);
$usr_id=17;
	//recibe $id //parametro $_REQUEST["id"];
	include ("../config.php");
	
	//libreria de dreamwaeaver XLST para inclucion de archivos de XML con XSLT
	//include(_FILE_XSL_CLASS);
	
	// cambio la hoja de estylos por defecto
	$otraCSS = "styleInterno.css";
?>
<script language="JavaScript">
function agrega_cita()
{
	desc=document.agendaCitaAgregar.cita_desc.value;
	prp_id=document.agendaCitaAgregar.prp_id.options[document.agendaCitaAgregar.prp_id.selectedIndex].value;
	emp_id=document.agendaCitaAgregar.emp_id.options[document.agendaCitaAgregar.emp_id.selectedIndex].value;
	if (!desc)
	{
		alert ("Por Favor ingrese una descripcion para la Cita");
		return false;
	}
	if (prp_id==0)
	{
		alert ("Por Favor seleccione un propiedad para la Cita");
		return false;
	}
	if (emp_id==0)
	{
		alert ("Por Favor seleccione un monitor para la Cita");
		return false;
	}
	document.agendaCitaAgregar.submit();
}
</script>
<div id="toolTipContenido">
<form id="agendaCitaAgregar" style="height:100%" name="agendaCitaAgregar" method="get" action="<?php echo _FILE_PHP_ABM_MENS_CITAS;?>" >
	<input type="hidden" name="mod_tip" value="add">
	<input type="hidden" name="fecha" value="<?print $fecha;?>">
<table width="100%" height="100%" border="0" align="center" cellpadding="3" cellspacing="1" class="tableOscura">
    <tr class="tableClara">
      <td align="center" colspan="2"><h1>Agendar Cita </h1></td>
    </tr>
    <tr class="tableClara" 	>
      <td width="30%" align="center"><div align="right" id="hora_div">Hora:</div></td>
      <td width="70%">
      	
      	<select name="hora">
      		<?
      			for ($i=0;$i<=23;$i++){
      				if($i<10){
      					$v="0".$i; 
      				}else{
	      				$v=$i;
      				}
      				if($i==$hora){
	      				echo "<option value='$i' selected>$v</option>";
      				}else{
	      				echo "<option value='$i'>$v</option>";
      				}
      			}
      		?>
      		
      	</select>
      <!--input name="hora" type="text" id="hora" size="2" maxlength="2" tabindex="1" value="<?php print $hora;?>"/-->
        :
        <select name="min" id="min" size="1">
        	<option value="00">00</option>	
        	<option value="15">15</option>
        	<option value="30">30</option>
			<option value="45">45</option>
        </select>
        </td>
        
    </tr>
    <tr class="tableClara" >
      <td align="center"><div align="right" id="prp_id_div">Inmueble:</div></td>
      <td >
	  
      <select name="prp_id" tabindex="3" id="prp_id" style="width:200px;" onfocusin="$('prp_id').style.width = '400px';" onblur="$('prp_id').style.width = '200px';" onchange="$('prp_id').style.width = '200px'; $('cita_desc').focus();" >
<?php 
	$regs=" prp_id,CONCAT(prp_id, ' - ',tip_desc, ' - ', con_desc,' - ',prp_dom, ' - $', prp_pre, ' - LLave: ', prp_llave)";
	$tablas=" propiedades,condiciones,tipo_const ";
	$filtro=" prp_mostrar=1 and usr_id=$usr_id and propiedades.con_id=condiciones.con_id and tipo_const.tip_id=propiedades.tip_id";
	$xtras=" order by prp_id";
	$id=$prp_id;
    include("../../"._FILE_SCRIPT_PHP_SELECT);
    $regs="";
    $tablas="";
    $filtro="";
    $xtras="";
    $id="";
?>
      </select>
      </td>
    </tr>
    <tr class="tableClara" >
      <td align="center"><div align="right" id="cita_desc_div">Detalles:</div></td>
      <td ><textarea name="cita_desc" rows="3" tabindex="4"></textarea></td>
    </tr>
    <tr class="tableClara">
	<td align="center"><div align="right" id="emp_id_div">Monitor:</div></td>
	<td>
    	<select name="emp_id" tabindex="3" id="emp_id">
		<?php 
			$regs=" emp_id,CONCAT(nombre, ' ', apellido)";
			$tablas=" empleados";
			$filtro="";
			$xtras=" order by nombre,apellido ASC";
		    include("../../"._FILE_SCRIPT_PHP_SELECT);
		    $regs="";
            $tablas="";
            $id="";
            $xtras="";
		?>
	    </select>
	</td>
    </tr>
    <tr class="tableClara" >
      <td colspan="2" align="center">
		<input name="Submit" type="button" class="botonForm" value="Cerrar" onclick="hideToolTip()" tabindex="8" />
        &nbsp;&nbsp;
		<input name="agendar" type="button" class="botonForm" id="agendar" onclick="if(verif('hora,2,Hora,prp_id,2,Inmueble,cita_desc,1,Detalles,emp_id,2,Monitor','agendaCitaAgregar'))document.agendaCitaAgregar.submit();" value="Agendar" tabindex="7" />
        </td>
    </tr>
  </table>
</form>
</div>