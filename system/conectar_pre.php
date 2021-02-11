<?php
	extract($_GET);
	extract ($_POST);
	extract ($_REQUEST);
include ("php/config.php");
include ("php/sec_head.php");

	

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />

<?php
	include("head.php");
?>
</head>
<body onload="location.href='conectar.php'">
<table width="100%" border="0" cellpadding="1" cellspacing="2">
  <tr>
    <td valign="top" class="tableOscura"><h2 align="center">Conectando</h2></td>
  </tr>
  <tr>
    <td width="50%" valign="top"><h2 align="center">Publicando sus propiedades en internet</h2>
    	  
    </td>
</tr>
	
</table>
</body>
</html>