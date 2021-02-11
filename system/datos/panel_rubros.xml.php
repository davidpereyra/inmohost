<?php 
header("Content-type: application/xml");

	extract($_GET);
	extract ($_POST);
	extract ($_REQUEST);

	
	include("../php/config.php");	
echo "<?xml version=\"1.0\" encoding=\"iso-8859-1\" ?>";
$cons="SELECT * FROM rubros";

$rs_medios=mysql_query($cons) or die("ERROR al obtener rubros");
echo "
<XML>
		<rubros>
";
while ($fila=mysql_fetch_array($rs_medios))
{
	print "
			<columna>
					<rub_id><![CDATA[".$fila[rub_id]."]]></rub_id>
					<rub_desc><![CDATA[".$fila[rub_desc]."]]></rub_desc>
				</columna>";
}
print "
		</rubros>
</XML>";
?>