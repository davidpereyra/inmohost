<?php 
header("Content-type: application/xml");

	extract($_GET);
	extract ($_POST);
	extract ($_REQUEST);


echo "<?xml version=\"1.0\" encoding=\"iso-8859-1\" ?>";

	include("../php/config.php");		
	
	$consulta=mysql_query("select bar_id,bar_denom,cambio_id,cambio_det,date_format(cambio_fecha,'%d-%m-%Y') as fecha from cambios_bar_priv");
	
echo '
<XML>
	<bar_priv>';

if(mysql_num_rows($consulta)){

	while ($fila=mysql_fetch_array($consulta)) {
		
		echo"<item>
				<bar_denom>$fila[bar_denom]</bar_denom>
				<cambio_det><![CDATA[$fila[cambio_det]]]></cambio_det>
				<fecha><![CDATA[$fila[fecha]]]></fecha>
				<bar_id><![CDATA[$fila[bar_id]]]></bar_id>
				<cambio_id><![CDATA[$fila[cambio_id]]]></cambio_id>
				
			</item>
		";
	}
}
	echo "</bar_priv>
	
	
</XML>";


?>