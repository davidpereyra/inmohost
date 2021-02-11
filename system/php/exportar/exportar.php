<?php
	extract($_GET);
	extract ($_POST);
	extract ($_REQUEST);

	$rutaSystema ="../../";
	$rutaInterfaz = "../../../interfaz/";
	
	include ("../config.php");
include ("../sec_head.php");


	// cambio la hoja de estylos por defecto
	$otraCSS = "styleGris.css";

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>NEWS</title>
<script language="javascript" type="text/javascript" src="<?php echo _FILE_JAVASCRIPT_RSS; ?>"></script>
<?php
	include("../../head.php");
?>
</head>
<body>
<form id="exportar" name="exportar" method="post" action="">
  <table width="100%" border="0" cellpadding="1" cellspacing="1" class="tableClara">
<?php if($limit) { ?>
    <tr class="tableOscura">
      <td colspan="2"><h1>Cantidad de datos </h1></td>
    </tr>
    <tr class="tableOscura">
      <td width="20%"><div align="center">
        <input name="cantidad" type="radio" value="paginados" checked="checked" />
      </div></td>
      <td width="80%"><h2>Exportar solo los $n resultados mostrados </h2></td>
    </tr>
    <tr class="tableOscura">
      <td><div align="center">
          <input name="cantidad" type="radio" value="todos" />
      </div></td>
      <td><h2>Exportar el total de los resultados ($total). </h2></td>
    </tr>
<?php } ?>
    
	<tr class="tableOscura">
      <td colspan="2"><h1>Formato</h1></td>
    </tr>
    <tr class="tableOscura">
      <td><div align="center">
        <input name="formata" type="radio" value="print" checked="checked" />
      </div></td>
      <td><h2>Impresi&oacute;n</h2></td>
    </tr>
    <tr class="tableOscura">
      <td><div align="center">
        <input name="formata" type="radio" value="excel" />
      </div></td>
      <td><h2>Excel</h2></td>
    </tr>
    <tr class="tableOscura">
      <td><div align="center">
        <input name="formata" type="radio" value="word" />
      </div></td>
      <td><h2>Word</h2></td>
    </tr>
    <tr class="tableOscura">
      <td><div align="center">
        <input name="formata" type="radio" value="PDF" />
      </div></td>
      <td><h2>PDF</h2></td>
    </tr>
    
    <tr class="tableOscura">
      <td colspan="2"><div align="center"><a href="javascript:ventana('prp_ficha', '&mod_edit=0&mod_tip=print&prp_id=<?php print $prp_id;?>&usr_id=<?php print $usr_id;?>', 'system/prp_ficha_print.php', 'Imprimir Ficha - ID:<?php print $prp_id;?>');" title="Exportar" style="width:60px; height:50px;" class="menuItem"><img src="../../../interfaz/inmohost/images/iconos/32/recuperar.png" width="32" height="32" border="0" /><br />
      Exportar</a></div></td>
    </tr>
  </table>
</form>
</body>
</html>
