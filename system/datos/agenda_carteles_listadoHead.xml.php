<?php 
header("Content-type: application/xml");

	extract ($_GET);
	extract ($_REQUEST);

	include("../php/config.php");
echo "<?xml version=\"1.0\" encoding=\"iso-8859-1\" ?>";
echo '
<inmodb>
		<cabezera>
			
			<head id="prp_id" tamano="5" link=""><![CDATA[ID]]></head>
			<head id="prp_dom" tamano="50" link=""><![CDATA[Domicilio]]></head>
			<head id="prp_cartel" tamano="10" link=""><![CDATA[Cartel]]></head>
								
		</cabezera>
</inmodb>';

?>