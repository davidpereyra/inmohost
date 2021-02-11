<?php
	extract($_GET);
	extract ($_POST);
	extract ($_REQUEST);
	
	include ("php/config.php");
	include ("php/sec_head.php");

	//libreria de dreamwaeaver XLST para inclucion de archivos de XML con XSLT
	include(_FILE_XSL_CLASS);
	
	// cambio la hoja de estylos por defecto
	$otraCSS = "styleInterno.css";

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>INMOHOST</title>
<?php

	include("head.php");
?>
</head>
<body>

<div align="center" id="prp_listadoDatos">
  <table width="100%" border="0" cellspacing="0" cellpadding="0">
    <tr>
      <td width="12%">&nbsp;</td>
      <td width="88%"><div align="right">
          <h1>&nbsp;</h1>
      </div></td>
    </tr>
    <tr>
      <td><table width="130" border="0" cellpadding="3" cellspacing="1" class="tableOscura">
          <tr class="tr1" onclick="">
            <td><a title="Listar Medios Publicitarios"><img src="../interfaz/inmohost/images/iconos/20/listar.png" width="20" height="20" hspace="10" align="absmiddle" />Listar</a></td>
          </tr>
          <tr class="tr1" onclick="">
            <td><a title="Agregar Medio Publicitario"><img src="../interfaz/inmohost/images/iconos/20/agregar.png" width="20" height="20" hspace="10" align="absmiddle" />Agregar</a></td>
          </tr>
          <tr class="tr1" onclick="">
            <td><a title="Administrar Medios Publicitarios"><img src="../interfaz/inmohost/images/iconos/20/medios.png" width="20" height="20" hspace="10" align="absmiddle" />Administrar</a></td>
          </tr>
      </table></td>
      <td valign="top" id="tdContendios"><?php if($mod == 'listado'){ ?>
          <div align="center" id="listadoDatos">
            <table width="100%" border="0" align="center" cellpadding="3" cellspacing="0">
              <tr>
                <td><a></a>
                    <div align="right">
                      <h1>resultados encontrados: <span id="prpTotalDatos">&nbsp;</span></h1>
                    </div></td>
              </tr>
              <tr>
                <td><div align="center">
                    <table width="98%" border="0" cellspacing="1" cellpadding="2" class="tabla">
                      <tr id="HeadResultados" class="tr1">
                        <td>&nbsp;</td>
                      </tr>
                      <tbody id="ListadoResultado">
                      </tbody>
                    </table>
                </div></td>
              </tr>
              <tr id="prpPaginacion" style="display:none">
                <td><h1 align="center">p&aacute;gina actual: <span id="prpPaginaActual">&nbsp;</span> - cantidad por p&aacute;gina: <span id="prpOffest">&nbsp;</span></h1>
                    <h1 align="center" id="prpPaginasTotales"></h1></td>
              </tr>
            </table>
          </div>
        <?php } ?>
      </td>
    </tr>
  </table>
</div>

</body>
</html>