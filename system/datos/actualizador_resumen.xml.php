<?php 
header("Content-type: application/xml");

	extract($_GET);
	extract ($_POST);
	extract ($_REQUEST);


echo "<?xml version=\"1.0\" encoding=\"iso-8859-1\" ?>";

	include("../php/config.php");		
	
	$consulta=mysql_query("select cambio_id,cambio_det,prp_id,date_format(fecha_c,'%d-%m-%Y') as fecha from cambios");
echo '
<XML>
	<inmuebles>';

if(mysql_num_rows($consulta)){

	while ($fila=mysql_fetch_array($consulta)) {
		
		echo"<item id='$fila[prp_id]'>
				<cambio_id>$fila[cambio_id]</cambio_id>
				<accion><![CDATA[$fila[cambio_det]]]></accion>
				<fecha><![CDATA[$fila[fecha]]]></fecha>
				<detalle><![CDATA[]]></detalle>
			</item>
				
		
		";
		
	}
	
	
}
	echo "</inmuebles>";
	
	$consulta=mysql_query("select cambio_id,cambio_det,usr_id,date_format(fecha_c,'%d-%m-%Y') as fecha from cambios_pagina");
	
echo '
	<web>';
	while ($fila=mysql_fetch_array($consulta)) {
		
		echo"<item id='$fila[usr_id]'>
				<accion><![CDATA[$fila[cambio_det]]]></accion>
				<fecha><![CDATA[$fila[fecha]]]></fecha>
				<detalle><![CDATA[]]></detalle>
			</item>
				
		";
		
	}
	
	
echo 	'</web>	
</XML>';


?>
