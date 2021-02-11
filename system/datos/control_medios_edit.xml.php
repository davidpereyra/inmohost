<?php
header("Content-type: application/xml");

	extract ($_GET);
	extract ($_POST);
	extract ($_REQUEST);
	$intervalo_min=15;
	include("../php/config.php");	
	echo "<?xml version=\"1.0\" encoding=\"iso-8859-1\" ?>";
	$cons_cita="
			select	
				*
			from 
				receptores
			where
				rec_id=$rec_id 
	";
	$rs_cita=mysql_query($cons_cita) or print ("<error>Error al obtener datos del receptor $cons_cita ". mysql_error() . "</error>");
	$fila=mysql_fetch_array($rs_cita);
	echo "
	<medio>
		<rec_id>".$fila[rec_id]."</rec_id>
		<nombre>".$fila[nombre]."</nombre>
		<apellido>".$fila[apellido]."</apellido>
		<mail>".$fila[mail]."</mail>
		<mailcc>".$fila[mailcc]."</mailcc>
		<med_raz>".$fila[med_raz]."</med_raz>
		";
	echo "
	</medio>";
	
?>
