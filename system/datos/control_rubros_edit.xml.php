<?php
header("Content-type: application/xml");

	extract ($_GET);
	extract ($_POST);
	extract ($_REQUEST);
	
	include("../php/config.php");	
	echo "<?xml version=\"1.0\" encoding=\"iso-8859-1\" ?>";
	$cons="
			select	
				*
			from 
				rubros
			where
				rub_id=$rub_id 
	";
	$rs=mysql_query($cons) or print ("<error>Error al obtener datos del rubro $cons ". mysql_error() . "</error>");
	$fila=mysql_fetch_array($rs);
	echo "
	<rubro>
		<rub_id>".$fila[rub_id]."</rub_id>
		<rub_desc>".$fila[rub_desc]."</rub_desc>
		";
	echo "
	</rubro>";
	
?>