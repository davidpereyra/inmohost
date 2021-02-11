<?php 
	include("../php/config.php");	
	
header("Content-type: application/xml");

	
	extract ($_GET);
	extract ($_POST);
	extract ($_REQUEST);
	echo "<?xml version=\"1.0\" encoding=\"iso-8859-1\" ?>";
	echo "
	<XML>";	
	$cons_ints="SELECT * FROM interesados WHERE int_id IN (SELECT int_id FROM int_x_cita WHERE cita_id=$cita_id)";
	$rs_ints=mysql_query($cons_ints) or die("<interesado>No se pudieron obtener datos de los interesados</interesado>");
	while ($fila=mysql_fetch_array($rs_ints))
	{
		echo "<interesados>";
			echo "<id>".$fila[int_id]."</id>";	
			echo "<nombre>".$fila[nombre]." </nombre>";
			echo "<apellido>".$fila[apellido]."</apellido>";
			echo "<domicilio>".$fila[domicilio]."</domicilio>";
			echo "<telefono>".$fila[telefono]."</telefono>";
			echo "<mail>".$fila[mail]."</mail>";
		echo "</interesados>";
	}
	echo "</XML>";
?>
