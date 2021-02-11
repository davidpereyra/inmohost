<?php 
header("Content-type: application/xml");

	extract ($_GET);
	extract ($_REQUEST);

	include("../php/config.php");	
echo "<?xml version=\"1.0\" encoding=\"iso-8859-1\" ?>";

$cadena="select * from fotos where usr_id=$usr_id and prp_id=$prp_id";

$result=mysql_query($cadena);
echo "
<XML>
	<img mod_edit=\"$mod_edit\">";
if (!mysql_num_rows($result))
{
	print "
			<imagen>
				<src><![CDATA[0-0-0.jpg]]></src>
				<desc><![CDATA[Fotos No Disponibles]]></desc>
			</imagen>
	";
}
else 
{
	while ($fila=mysql_fetch_array($result))
	{
		echo "		
			<imagen> 
					<src><![CDATA[".$fila[fo_enl]."]]></src>
					<desc><![CDATA[".$fila[fo_desc]."]]></desc>
					<src2><![CDATA[".$rutaAbsoluta."fotos/".$fila[fo_enl]."]]></src2>
			</imagen>";
	}
}
echo "
	</img>
</XML>";

?>
