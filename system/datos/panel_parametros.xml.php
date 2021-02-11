<?php 
header("Content-type: application/xml");

	extract($_GET);
	extract ($_POST);
	extract ($_REQUEST);

	include("../php/config.php");
echo "<?xml version=\"1.0\" encoding=\"iso-8859-1\" ?>";
$cadena="select * from parametros";
$result=mysql_query($cadena);
echo "
<XML>
	<items>";
$i=1;
while ($fila=mysql_fetch_array($result)) {
	
	echo"<item id='$i' name='$fila[nom_var]'><![CDATA[$fila[valor]]]></item>";
	$i++;
}
$cadena="select usuarios.web from usuarios where usr_id="._USR_ID;
$res=mysql_query($cadena);
$fil=mysql_fetch_array($res);
print $fil[web];
	echo"<item id='$i' name='web'><![CDATA[$fil[web]]]></item>";

echo "
	</items>
</XML>";

?>
