<?php

	extract($_GET);
	extract ($_POST);
	extract ($_REQUEST);

	//recibe $id //parametro $_REQUEST["id"];
	include ("../config.php");


?>
<div id="toolTipContenido" >
<table width="100%" height="100%" border="0" align="center" cellpadding="2" cellspacing="1" class="tableOscura">
  <tr class="tableClara">
    <td align="center" colspan="2">
      <h1>Detalles</h1>    </td>
  </tr>
  <tr class="tableClara" >
    <td width="86" align="center">
      <div align="right">Atributos:</div>    </td>
    <td width="153">prueba </td>
  </tr>
  <tr class="tableClara" >
    <td align="center">
      <div align="right">Raz&oacute;n Social:</div>    </td>
    <td >Inmobiliaria</td>
  </tr>
  <tr class="tableClara" >
    <td align="center">
      <div align="right">Domicilio:</div>    </td>
    <td >--------</td>
  </tr>
  <tr class="tableClara" >
    <td align="center">
      <div align="right">Tel&eacute;fono: </div>    </td>
    <td >--------</td>
  </tr>
  <tr class="tableClara" >
    <td align="center">
      <div align="right">E-mail:</div>    </td>
    <td >--------</td>
  </tr>
  <tr class="tableClara" >
    <td align="center">
      <div align="right">Localidad:</div>    </td>
    <td >--------</td>
  </tr>
  <tr class="tableClara" >
    <td align="center">
      <div align="right">Provincia:</div>    </td>
    <td >--------</td>
  </tr>
  <tr class="tableClara" >
    <td align="center">
      <div align="right">Servicios:</div>    </td>
    <td >--------</td>
  </tr>
  <tr class="tableClara" >
    <td align="center">
      <div align="right">Informac&oacute;n:</div>    </td>
    <td >--------<br />
    --------<br />
    --------<br />
    --------</td>
  </tr>
  <tr class="tableClara" >
    <td align="center">
      <div align="right">Foto1:</div>    </td>
    <td >--------</td>
  </tr>
  <tr class="tableClara" >
    <td align="center">
      <div align="right">Foto2:</div>    </td>
    <td >--------</td>
  </tr>
  <tr class="tableClara" >
    <td align="center">
      <div align="right">Foto3:</div>    </td>
    <td >--------</td>
  </tr>
  <tr class="tableClara" >
    <td colspan="2" align="center"><input name="Submit" type="button" class="botonForm" value="Cerrar" onclick="hideToolTip()" /></td>
  </tr>
</table>
</div>