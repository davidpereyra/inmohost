<?php 
header("Content-type: application/xml");

	extract($_GET);
	extract ($_POST);
	extract ($_REQUEST);

	
	include("../php/config.php");	
echo "<?xml version=\"1.0\" encoding=\"iso-8859-1\" ?>";
$cons="SELECT * FROM bar_priv";

$rs=mysql_query($cons) or die("ERROR al obtener barrios privados");
echo "

		<bar_priv>
";
while ($fila=mysql_fetch_array($rs))
{
		print "
			<columna>
					<bar_id><![CDATA[".$fila[bar_id]."]]></bar_id>
					<bar_denom><![CDATA[".$fila[bar_denom]."]]></bar_denom>
					<bar_comp_priv><![CDATA[".$fila[bar_comp_priv]."]]></bar_comp_priv>
				</columna>";
}
print "
		</bar_priv>
";
?>