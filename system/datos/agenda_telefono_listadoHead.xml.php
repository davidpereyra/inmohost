<?php 
header("Content-type: application/xml");

	extract ($_GET);
	extract ($_REQUEST);

	include("../php/config.php");
echo "<?xml version=\"1.0\" encoding=\"iso-8859-1\" ?>";
echo '
<inmodb>
		<cabezera>
			<head id="nota_id" tamano="0" link=""><![CDATA[nota_id]]></head>
			<head id="nombre" tamano="20" link=""><![CDATA[Nombre]]></head>
			<head id="apellido" tamano="25" link=""><![CDATA[Apellido]]></head>
			<head id="telefono" tamano="20" link=""><![CDATA[Telefono]]></head>
			<head id="domicilio" tamano="5" link=""><![CDATA[Domicilio]]></head>
			<head id="mail" tamano="20" link=""><![CDATA[Mail]]></head>
			<head id="nota" tamano="20" link=""><![CDATA[Nota]]></head>
			<head id="rub_desc" tamano="20" link=""><![CDATA[Rubro]]></head>
			<head id="nota_edit" tamano="5" link=""><![CDATA[Editar]]></head>
			<head id="nota_del" tamano="5" link=""><![CDATA[Elim.]]></head>
		</cabezera>
</inmodb>';

?>