<?php 
header("Content-type: application/xml");

	extract ($_GET);
	extract ($_REQUEST);

	include("../php/config.php");
echo "<?xml version=\"1.0\" encoding=\"iso-8859-1\" ?>";
echo '
<inmodb>
		<cabezera>
			
			<<head id="pub_fecha" tamano="25" link=""><![CDATA[Fecha]]></head>
			<head id="prp_id" tamano="15" link=""><![CDATA[ID inmueble]]></head>
			<head id="pub_id" tamano="0" link=""><![CDATA[]]></head>
			<head id="pub_med" tamano="20" link=""><![CDATA[Medio]]></head>
			<head id="pub_cant" tamano="20" link=""><![CDATA[Cant. palabras]]></head>
			<head id="pub_num" tamano="10" link=""><![CDATA[Numero]]></head>
			<head id="pub_dat" tamano="10" link=""><![CDATA[Detalles]]></head>
		</cabezera>
</inmodb>';


?>