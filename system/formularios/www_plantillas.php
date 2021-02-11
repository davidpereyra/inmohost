<?php 


	include ("../php/config.php");
	extract($_GET);
	extract ($_POST);
	extract ($_REQUEST);
	
	
 switch ($op) {
     default:
			$titulo = "Listar Varios"; //
			$destino1 = "generico_listado"; // listadoPropiedades
			$url1 = _FILE_PHP_GENERICO_LISTADOS;
			$parametros = "mod_edit";
         break;
         //
 }
?>
<table width="240" border="0" align="center" cellpadding="0" cellspacing="0" id="tablaMorir">
  <tr>
    <td><form id="FormPanelInterfaz" name="FormPanelInterfaz" method="post" action="">
      <table width="100%" border="0" cellpadding="1" cellspacing="1">
        <tr>
          <td width="100%">
            <h1 align="left">Pagina Web </h1>
			<hr />			</td>
          </tr>
        <!--tr>
          <td><div align="center">
            <input name="Submit" type="button" class="botonForm" value="Guardar" onclick="fondoDegradado(document.getElementById('inmo_color1').value, document.getElementById('inmo_color2').value);" onkeypress="fondoDegradado(document.getElementById('inmo_color1').value, document.getElementById('inmo_color2').value);" />
          </div></td>
        </tr-->
      </table>
        </form>
    </td>
  </tr>
</table>


