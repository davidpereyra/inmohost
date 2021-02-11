<?php 
header("Content-type: application/xml");

	extract ($_GET);
	extract ($_REQUEST);
	
	include("../php/config.php");	
echo "<?xml version=\"1.0\" encoding=\"iso-8859-1\" ?>";
$cons="SELECT * FROM sectores";

$rs_medios=mysql_query($cons) or die("ERROR al obtener rubros");
echo "
<XML>
		<sectores>
";
while ($fila=mysql_fetch_array($rs_medios))
{
	print "
			<columna>
					<sec_id><![CDATA[".$fila[sec_id]."]]></sec_id>
					<sec_desc><![CDATA[".$fila[sec_desc]."]]></sec_desc>
				</columna>";
}
print "
		</sectores>
</XML>";
?>