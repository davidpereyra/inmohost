<?php 
header("Content-type: application/xml");

	extract ($_GET);
	extract ($_REQUEST);
	
	include("../php/config.php");	
echo "<?xml version=\"1.0\" encoding=\"iso-8859-1\" ?>";
$cons_medios="SELECT * FROM receptores";
$rs_medios=mysql_query($cons_medios) or die("ERROR al obtener medios");
echo "
<XML>
		<medios>
";
while ($fila=mysql_fetch_array($rs_medios))
{
	print "
			<columna>
					<rec_id><![CDATA[".$fila[rec_id]."]]></rec_id>
					<med_name><![CDATA[".$fila[med_raz]."]]></med_name>
				</columna>";
}
print "
		</medios>
</XML>";
?>
