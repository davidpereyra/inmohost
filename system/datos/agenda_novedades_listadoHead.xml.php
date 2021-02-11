<?php 
header("Content-type: application/xml");
	extract($_GET);
	extract ($_POST);
	extract ($_REQUEST);


	include("../php/config.php");
echo "<?xml version=\"1.0\" encoding=\"iso-8859-1\" ?>";
echo '
<inmodb>
		<cabezera>
			
			<head id="nov_id" tamano="5" link=""><![CDATA[ID]]></head>
			<head id="nov_fecha" tamano="10" link=""><![CDATA[Fecha]]></head>
			<head id="nov_hora" tamano="10" link=""><![CDATA[Hora]]></head>
			<head id="nov_de" tamano="15" link=""><![CDATA[de]]></head>
			<head id="nov_para" tamano="15" link=""><![CDATA[para]]></head>
			<head id="nov_desc" tamano="45" link=""><![CDATA[Detalle]]></head>
			<head id="emp_id" tamano="0" link=""><![CDATA[]]></head>
			<head id="nov_estado" tamano="5" link=""><![CDATA[Leída]]></head>
			
			
		
			
		</cabezera>
</inmodb>';

?>