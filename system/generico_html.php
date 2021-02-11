<?php
	extract($_GET);
	extract ($_POST);
	extract ($_REQUEST);
	
	$rutaSystema = "./";
	$rutaInterfaz = "../interfaz/";

	include ($rutaSystema."php/config.php");
	include ($rutaSystema."php/sec_head.php");	


?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>INMOHOST</title>
<?php include($rutaSystema."head.php"); ?>
<script language="javascript" type="text/javascript" src="<?php echo _FILE_JAVASCRIPT_TOOLTIP; ?>">
</script>
</head>
<body>
<?php
		$parametros = strstr($_SERVER['QUERY_STRING'], '&');
		@readfile($file."?".$parametros);
?>
</body>
</html>
