<?php 


	include ("../php/config.php");
	extract($_GET);
	extract ($_POST);
	extract ($_REQUEST);

 switch ($op) {
    default:
			$titulo = "&Uacute;ltimos Informes"; //
			$destino1 = "prp_listado"; // listadoPropiedades
			$url1 = _FILE_PHP_INF_LISTADO;
			$parametros = "mod_search";
         break;
        //
 }
?>
<table width="240" border="0" align="center" cellpadding="0" cellspacing="0" id="tablaMorir">
  <tr>
    <td>
      <table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td><h1 align="left"><?php echo $titulo; ?></h1></td>
          </tr>
        <tr>
          <td><hr /></td>
          </tr>
        <tr>
          <td><table width="98%" border="0" align="center" cellpadding="1" cellspacing="1">
            <tr>
              <td colspan="3">
<?php
			$xml = _FILE_XML_RESUMEN_GENERAL;
			$xsl = "../"._FILE_XSL_RESUMEN_FORMULARIO;
			$id = "varios";
			$file[0] = _FILE_PHP_GRAF_DATOS;
			$file[1] = _FILE_PHP_PRP_LISTADO;
			$file[2] = $usr_id;
			//agregar datos de inmo y user
		  	include("../"._FILE_XSL_GENERICO); 
?>			  </td>
            </tr>
          </table></td>
          </tr>
      </table>
    </td>
  </tr>
</table>


