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

<script language="javascript" type="text/javascript" src="<?php echo _FILE_JAVASCRIPT_RSS; ?>"></script>
<?php
	include("head.php");
	
	$conn_id = ftp_connect($INTERNET_HOST); 
	$login = ftp_login($conn_id,$INTERNET_USR,$INTERNET_PASS); 
	
?>
</head>
<body>
<table width="100%" border="0" cellpadding="1" cellspacing="2">
  <tr>
    <td valign="top" class="tableOscura">
    <?php
		if ($conn_id&&$login) {
			print "<script languaje='javascript'>location.href='./actualizador_pre.php?borrar_cache_inm=1&e=0'</script>";
		}else{
			print "No se pudo realizar la conexion para descargar los archivos de actualizacion";
			exit;
		}
	?>
	</td>
  </tr>
</table>
</body>
</html>
