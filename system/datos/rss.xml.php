<?php 
header("Content-type: application/xml");
	
include("../php/config.php");	

	extract($_GET);
	extract ($_POST);
	extract ($_REQUEST);

echo "<?xml version=\"1.0\" encoding=\"iso-8859-1\" ?>";
echo "<rss version='2.0'>
  <channel>
    <title>"._INMO_NAME."</title>
    <link>"._INMO_URL_RSS."</link>
    <description>"._INMO_RAZON_SOCIAL."</description>
    <language>Spanish</language>

	<item>
		<title>Edificios Emperador</title>
		<description><![CDATA[Llegamos a todos los corredores inmobiliarios y profesionales para darles a conocer nuestro nuevo proyecto]]></description>
		<link></link>
		<pubDate>2007-06-29</pubDate>
		<guid>1</guid>
		<author>Grupo Emperador</author>
		<category domain='http://www.emperador.com/EDIFICIOS'>Edificios Emperador</category>
	</item>
	
	<item>
		<title>Nuevos Prestamos Fexibles</title>
		<description><![CDATA[Casa Magna y Banco Francés informan sobre los nuevos prestamos flexibles para particulares]]></description>
		<link></link>
		<pubDate>2007-05-21</pubDate>
		<guid>2</guid>
		<author>Grupo Emperador</author>
		<category domain='http://www.casamagna.com.ar'>Casa Magna</category>
	</item>

	<item>
		<title>Edificios Emperador</title>
		<description><![CDATA[Llegamos a todos los corredores inmobiliarios y profesionales para darles a conocer nuestro nuevo proyecto]]></description>
		<link></link>
		<pubDate>2007-06-29</pubDate>
		<guid>3</guid>
		<author>Grupo Emperador</author>
		<category domain='http://www.emperador.com/EDIFICIOS'>Edificios Emperador</category>
	</item>
	
	<item>
		<title>Nuevos Prestamos Fexibles</title>
		<description><![CDATA[Casa Magna y Banco Francés informan sobre los nuevos prestamos flexibles para particulares]]></description>
		<link></link>
		<pubDate>2007-05-21</pubDate>
		<guid>4</guid>
		<author>Grupo Emperador</author>
		<category domain='http://www.casamagna.com.ar'>Casa Magna</category>
	</item>
			
</channel>
</rss>";

?>
