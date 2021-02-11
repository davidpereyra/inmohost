<?php 
header("Content-type: application/xml");
	extract($_GET);
	extract ($_POST);
	extract ($_REQUEST);

	include("../php/config.php");
echo "<?xml version=\"1.0\" encoding=\"iso-8859-1\" ?>";
echo "
<noticias>
	<config>
    <title>"._INMO_NAME."</title>
    <link>"._INMO_URL_RSS."</link>
    <description>"._INMO_RAZON_SOCIAL."</description>
	</config>
	<item>
		<guid>1</guid>
		<title><![CDATA[Edificios Emperador se lanza al mercado]]></title>
		<description><![CDATA[Buenos d&iacute;as se&ntilde;ores corredores inmobiliarios usuarios del sistema Inmohost. Mi nombre es Carlos Lopez encargado del &aacute;rea de venta y comercializaci&oacute;n del emprendimiento que denominamos Edificio EMPERADOR.]]></description>
		<contenido><![CDATA[Como ver&aacute;n m&aacute;s abajo en su propio sistema se muestra un banner publicitario de nuestro proyecto que haci&eacute;ndole un click obtendr&aacute;n informaci&oacute;n detallada del mismo.
Hemos utilizado este medio o canal para comunicarnos con ustedes de forma m&aacute;s efectiva y pr&aacute;ctica con el &aacute;nimo de generar un v&iacute;nculo entre ustedes corredores inmobiliarios o profesionales de la venta de inmuebles y nosotros desarrollista o constructoras con el objetivo de mantener una relaci&oacute;n productiva y duradera.
Queremos lograr a trav&eacute;s de este medio informarlos de nuestros proyectos para que ustedes los ofrezcan desde su oficina y generar una sinergia que nos beneficie a ambos.
Las condiciones de c&oacute;mo operar y las comisiones que pagaremos se encuentran haciendo clic aqu&iacute; (condiciones), en el caso de estar interesados en ofrecer nuestros proyecto tengan a bien informarnos por este medio o aceptar las condiciones que el sistema nos notificara autom&aacute;ticamente.
]]></contenido>
		<date>2007-06-21</date>
		<image>
			<title><![CDATA[Carlos Lopez encargado del &aacute;rea de venta y comercializaci&oacute;n]]></title>
			<url><![CDATA[../system/extra/rss/edificio_emperador.jpg]]></url>
		</image>
	</item>
	
		<item>
		<guid>2</guid>
		<title><![CDATA[Casa Magna y Banco Fr&aacute;nces]]></title>
		<description><![CDATA[El Grupo ECIPSA es un holding orientado a desarrollos inmobiliarios que conduce y comercializa emprendimientos en C&oacute;rdoba, Mendoza, San Juan, Neuqu&eacute;n y R&iacute;o Negro.]]></description>
		<contenido><![CDATA[El Grupo ECIPSA es la empresa l&iacute;der en desarrollos inmobiliarios del interior del pa&iacute;s, con propuestas innovadoras, transformadoras y de alto impacto. En esta oportunidad presenta CasaMagna, un complejo residencial, compuesto por 4 torres con m&aacute;s de 100 departamentos cada una. Un emprendimiento creado para la vida familiar con todos los amenities y servicios de primera l&iacute;nea, en una zona de alto crecimiento inmobiliario.
Este desarrollo, al igual que los anteriores, promete marcar un hito diferenciador en el sector inmobiliario de Mendoza y el resto del pa&iacute;s.<br />
]]></contenido>
		<date>2007-06-21</date>
		<image>
			<title><![CDATA[Prestamos Flexibles]]></title>
			<url><![CDATA[../system/extra/rss/casamagna01.jpg]]></url>
		</image>
	</item>
	
</noticias>";

?>