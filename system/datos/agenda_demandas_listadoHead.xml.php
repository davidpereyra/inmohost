<?php 
header("Content-type: application/xml");

	extract ($_GET);
	extract ($_REQUEST);

	include("../php/config.php");
echo "<?xml version=\"1.0\" encoding=\"iso-8859-1\" ?>";
echo '
<inmodb>
		<cabezera>
			
			<head id="dem_id" tamano="5" link=""><![CDATA[ID]]></head>
			<head id="dem_fecha" tamano="10" link=""><![CDATA[Fecha]]></head>
			<head id="dem_raz" tamano="15" link=""><![CDATA[Interesado]]></head>
			<head id="dem_tel" tamano="10" link=""><![CDATA[Telefono]]></head>
			<head id="tip_desc" tamano="15" link=""><![CDATA[Inmueble]]></head>
			<head id="con_desc" tamano="10" link=""><![CDATA[Condicion]]></head>
			<head id="dem_pre_min" tamano="20" link=""><![CDATA[Precio ($)]]></head>
			<head id="dem_desc" tamano="15" link=""><![CDATA[Demanda]]></head>
			<head id="dem_dom" tamano="25" link=""><![CDATA[Domicilio]]></head>
			<head id="dem_edit" tamano="10" link=""><![CDATA[Editar]]></head>
			<head id="dem_del" tamano="10" link=""><![CDATA[Eliminar]]></head>
			<head id="dem_coin" tamano="10" link=""><![CDATA[Coincidencias]]></head>
			
		</cabezera>
</inmodb>';

?>