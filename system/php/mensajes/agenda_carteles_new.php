<?php 
 	extract($_GET);
	extract ($_POST);
	extract ($_REQUEST);
	//recibe $id //parametro $_REQUEST["id"];
	include ("../config.php");

	
if ($mod_edit == "1") {
			$titulo = "Modificar Carteles"; //
			$destino1 = ""; // listado
			$url1 = "";
			$parametros = "mod_edit";
} else {
			$titulo = "Agregar Cartel"; //
			$destino1 = ""; // listadoPropiedades
			$url1 = "";
			$parametros = "mod_new";
}
?>
<div id="toolTipContenido" >
<form id="agendaTelAgregar" name="agendaTelAgregar" method="post" action="<?php print _FILE_PHP_ABM_MENS_CARTS;?>" style="height:100%" >
<input type="hidden" name="mod_tip" value="add">
<table width="100%" border="0" align="center" cellpadding="2" cellspacing="1" class="tableOscura" height="100%">
    <tr class="tableClara">
      <td align="center" colspan="2"><h1><?php echo $titulo;?>&nbsp;</h1></td>
    </tr>
    <tr class="tableClara" >
      <td align="center"><div align="right" id="rub_id_div">Rubro:</div></td>
      <td><span id="div_rub_id"><select name="rub_id" tabindex="10" id="rubro_id">
          <?php 
	/* REGS= ID,Descripcion  */
	$regs=" rub_id,rub_desc ";
	$tablas=" rubros ";
	$xtras=" order by rub_desc ASC";
    include("../../"._FILE_SCRIPT_PHP_SELECT);
	$regs="";
	$tablas="";
	$filtro=""; 
	$id="";
    $xtras="";    
?>
              </select>  </span>    </td>
    </tr>
    <tr class="tableClara" >
      <td align="center"><div align="right" id="nombre_div">Nombre:</div></td>
      <td><span id="div_nombre"><input name="nombre" type="text" id="nombre" tabindex="11" size="10" maxlength="20" /></span></td>
    </tr>
    <tr class="tableClara" >
      <td align="center"><div align="right" id="apellido_div">Apellido:</div></td>
      <td><span id="div_apellido"><input name="apellido" type="text" id="apellido" tabindex="12" size="10" maxlength="20" /></span></td>
    </tr>
    <tr class="tableClara" >
      <td align="center"><div align="right" id="carteles_div">Cartel:</div></td>
      <td><span id="div_telefono"><input name="Cartel" type="text" id="telefono" tabindex="13" size="10" maxlength="20" /></span></td>
    </tr>
    <tr class="tableClara" >
      <td align="center"><div align="right" id="domicilio_div">Domicilio:</div></td>
      <td><span id="div_domicilio"><input name="domicilio" type="text" id="domicilio" tabindex="14" size="10" maxlength="50" /></span></td>
    </tr>
    <tr class="tableClara" >
      <td width="30%" align="center"><div align="right" id="mail_div">E-mail:</div></td>
      <td width="70%"><span id="div_mail"><input name="mail" type="text" id="mail" tabindex="15" size="10" maxlength="50" /></span></td>
    </tr>
    
    <tr class="tableClara" >
      <td align="center"><div align="right" id="nota_div">Nota:</div></td>
      <td><span id="div_nota"><textarea name="nota" id="nota" tabindex="16"></textarea></span></td>
    </tr>
    <tr class="tableClara" >
      <td colspan="2" align="center">
        <input name="Submit" type="button" class="botonForm" value="Cerrar" onclick="hideToolTip()" tabindex="18" />
        &nbsp;&nbsp;
      	<input name="agendar" type="button" class="botonForm" id="agendar" onclick="valida_formulario('rub_id,2,Rubro,nombre,1,Nombre,apellido,1,Apellido,telefono,1,Telefono','agendaTelAgregar');" value="Agregar" tabindex="17" />
      </td>
    </tr>
  </table>
</form>
</div>