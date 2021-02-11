<?php 
header("Content-type: application/xml");
	extract($_GET);
	extract ($_POST);
	extract ($_REQUEST);

	
	include("../php/config.php");	
echo "<?xml version=\"1.0\" encoding=\"iso-8859-1\" ?>";
if($tip == 'parametros'){
echo '
<XML>
	<items>
		<item id="1" name="acceso_mysql"><![CDATA[www.inmoclick.com.ar]]></item>
		<item id="2" name="inicio"><![CDATA[\Inmohostv2]]></item>
		<item id="3" name="admin"><![CDATA[\Inmohostv2\nivel_1]]></item>
		<item id="4" name="usuarios"><![CDATA[/Inmohostv2/usuarios]]></item>
		<item id="5" name="imagenes"><![CDATA[/Inmohostv2/images]]></item>
		<item id="6" name="principal"><![CDATA[/Inmohostv2/inmo]]></item>
	</items>
</XML>';
} else if($tip == 'medios'){
echo '
<inmodb>
		<paginacion>
			<offest>10</offest>
			<totalDatos>65</totalDatos>
			<paginaActual>$page</paginaActual>
		</paginacion>
	<propiedades>
		<columna>
			<id>1</id>
			<med_nom><![CDATA[23-12-06]]></med_nom>
			<med_zona><![CDATA[15:35]]></med_zona>
			<edit>1</edit>
			<del>1</del>
		</columna>
	</propiedades>
</inmodb>';
} else if($tip == 'mediosHead'){
echo '
<inmodb>
		<cabezera>
			<head id="id" tamano="0" link=""><![CDATA[]]></head>
			<head id="med_nom" tamano="50" link=""><![CDATA[Nombre]]></head>
			<head id="med_zona" tamano="30" link=""><![CDATA[Zona]]></head>
			<head id="edit" tamano="10" link=""><![CDATA[-]]></head>
			<head id="del" tamano="10" link=""><![CDATA[-]]></head>
		</cabezera>
</inmodb>';
}
?>
