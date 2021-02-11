<?php 
header("Content-type: application/xml");

	extract ($_GET);
	extract ($_REQUEST);

echo "<?xml version=\"1.0\" encoding=\"iso-8859-1\" ?>";

	include("../php/config.php");		
	
	$consulta=mysql_query("select emp_id,nombre,apellido,cambio_id,cambio_det,date_format(fecha,'%d-%m-%Y') as fecha from cambios_emp");
	
echo '
<XML>
	<emp>';

	if(mysql_num_rows($consulta)){
	
		while ($fila=mysql_fetch_array($consulta)) {
			
			echo"<item>
					<nombre>$fila[nombre] $fila[apellido]</nombre>
					<cambio_det><![CDATA[$fila[cambio_det]]]></cambio_det>
					<fecha><![CDATA[$fila[fecha]]]></fecha>
					<emp_id><![CDATA[$fila[emp_id]]]></emp_id>
					<cambio_id><![CDATA[$fila[cambio_id]]]></cambio_id>
				</item>
			";
		}
	}
	echo "</emp>
	
	
</XML>";


?>