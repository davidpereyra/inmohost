
<?php

include ("system/php/config.php");

include ("system/php/sec_head.php");


?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">

<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />


<script language="javascript" type="text/javascript" src="<?php echo _FILE_JAVASCRIPT_RSS; ?>"></script>

<?php

	
?>

</head>

<body>

<?print"
Finalizando Descargas";
mysql_close($db);
print "<script language='javascript'>location.href='".$rutaSystemAbs."actualizador_pre.php?borrar_cache_inm=1'</script>";
print "</body></html>";
?>
