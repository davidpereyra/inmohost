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
			<head id="tas_id" tamano="5" link=""><![CDATA[ID]]></head>	
			<head id="tip_desc" tamano="5" link=""><![CDATA[Inmueble]]></head>
			<head id="con_desc" tamano="5" link=""><![CDATA[Condicion]]></head>
			<head id="tas_dom" tamano="5" link=""><![CDATA[Domicilio]]></head>
			<head id="tas_fecha" tamano="20" link=""><![CDATA[Fecha]]></head>
			<head id="prop" tamano="5" link=""><![CDATA[Propietario]]></head>
			<head id="tel_prop" tamano="5" link=""><![CDATA[Telefono]]></head>
			<head id="estado" tamano="20" link=""><![CDATA[Estado]]></head>
			<head id="referente" tamano="10" link=""><![CDATA[Referente]]></head>
			<head id="tas_edit" tamano="10" link=""><![CDATA[Editar]]></head>
			<head id="tas_del" tamano="10" link=""><![CDATA[Elim.]]></head>
		</cabezera>
</inmodb>';

?>