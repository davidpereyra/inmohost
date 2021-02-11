<?php 
	extract($_GET);
	extract ($_POST);
	extract ($_REQUEST);

	//recibe $id //parametro $_REQUEST["id"];
	include ("../config.php");
	$arr_par=split('_',$param);
	$cita_id=$arr_par[0];
	$cita_id=str_replace('?','',$cita_id);
?>
<div id="toolTipContenido" >
<form id="agendaCitaAgregarInt" name="agendaCitaAgregarInt" method="post" action="<?php print $rutaSystema."citas_mensajes.php";?>"  style="height:100%">
    <input type="hidden" name="mod_tip" value="add_int">
    <input type="hidden" name="cita_id" value="<?php print $cita_id;?>">
    <input type="hidden" name="fecha" value="<?php print $fecha;?>">
    <input type="hidden" name="prp_id" value="<?php print $prp_id;?>">
    <input type="hidden" name="mod_tip" value="add_int">
	<table width="100%" height="100%" border="0" align="center" cellpadding="2" cellspacing="1" class="tableOscura">
    <tr class="tableClara">
      <td align="center" colspan="2"><h1>Agendar Interesado </h1></td>
    </tr>
    <tr class="tableClara" >
      <td width="30%" align="center"><div align="right">Nombre:</div></td>
      <td width="70%"><input name="nombre" type="text" maxlength="20" tabindex="1" style="width:150px;"/></td>
    </tr>
    <tr class="tableClara" >
      <td width="30%" align="center"><div align="right">Apellido:</div></td>
      <td width="70%"><input name="apellido" type="text" maxlength="20" tabindex="2" style="width:150px;"/></td>
    </tr>
    <tr class="tableClara" >
      <td width="30%" align="center"><div align="right">Domicilio:</div></td>
      <td width="70%"><input name="domicilio" type="text" maxlength="20" tabindex="2" style="width:150px;"/></td>
    </tr>
    <tr class="tableClara" >
      <td width="30%" align="center"><div align="right">Telefono</div></td>
      <td width="70%"><input name="telefono" type="text" maxlength="30" tabindex="3" style="width:150px;"/></td>
    </tr>
    <tr class="tableClara" >
      <td align="center"><div align="right">Mail:</div></td>
      <td width="70%"><input name="mail" type="text" maxlength="20" tabindex="3" style="width:150px;"/></td>
    </tr>
    <!--
	<tr class="tableClara" >
      <td align="center"><div align="right">Nota:</div></td>
      <td ><textarea name="nota" rows="3" tabindex="5"></textarea></td>
    </tr>
    -->
    <tr class="tableClara" >
      <td colspan="2" align="center">
      <input name="Submit" type="button" class="botonForm" value="Cerrar" onclick="hideToolTip()" tabindex="5" />
        &nbsp;&nbsp;
	  <input name="Agregar" type="button" class="botonForm" id="agendar" onclick="document.agendaCitaAgregarInt.submit();" value="Agregar" tabindex="4" />
	  </td>
    </tr>
  </table>
</form>
</div>