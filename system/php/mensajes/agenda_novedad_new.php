<?php 
	extract($_GET);
	extract ($_POST);
	extract ($_REQUEST);

	//recibe $id //parametro $_REQUEST["id"];
	include ("../config.php");
	

?>
<div id="toolTipContenido" >
<script language="javascript" type="text/javascript" src="../javascript/formularios.js"></script>
  <table width="100%" height="100%" border="0" align="center" cellpadding="3" cellspacing="1" class="tableOscura">
    <tr class="tableClara">
      <td align="center" colspan="2"><h1>La Novedad fue agregada </h1></td>
    </tr>
    <tr class="tableClara" height="32">
      <td colspan="2" ><div align="center">
        <input name="Submit" type="button" class="botonForm" value="Cerrar" onclick="hideToolTip()" tabindex="8" />

      </div></td>
    </tr>
  </table>
