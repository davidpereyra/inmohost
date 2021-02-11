<?php 
	extract($_GET);
	extract ($_POST);
	extract ($_REQUEST);

	//recibe $id //parametro $_REQUEST["id"];
	include ("../config.php");


?>
<div id="toolTipContenido" >
<table width="100%" height="100%" border="0" align="center" cellpadding="2" cellspacing="1" class="tableOscura">
  
  <tr class="tableClara" >
    <td height="25" colspan="2" align="center"><h1>Apellido Nombre </h1></td>
  </tr>
  <tr class="tableClara" >
    <td height="20" align="center"><div align="right">Rubro:</div></td>
    <td height="20" >$rubro</td>
  </tr>
  <tr class="tableClara" >
    <td height="20" align="center"><div align="right">Tel&eacute;fono:</div></td>
    <td height="20">$telefono</td>
  </tr>
  <tr class="tableClara" >
    <td height="20" align="center"><div align="right">Domicilio:</div></td>
    <td height="20">$domicilio</td>
  </tr>
  <tr class="tableClara" >
    <td width="30%" height="20" align="center"><div align="right">E-mail:</div></td>
    <td width="70%" height="20">$email</td>
  </tr>
    
  <tr class="tableClara" valign="top" >
    <td height="100%" align="center"><div align="right">Nota:</div></td>
    <td height="100%" >$nota</td>
  </tr>
  <tr class="tableClara" >
    <td height="35" colspan="2" align="center" valign="middle"><input name="Submit" type="button" class="botonForm" value="Cerrar" onclick="hideToolTip()" tabindex="18" /></td></tr>
</table>
</div>