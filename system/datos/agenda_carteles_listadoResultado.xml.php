<?php 

header("Content-type: application/xml");


	extract ($_GET);
	extract ($_REQUEST);
	
	include("../php/config.php");	
	
if ($prp_id_cartel){
	$propiedades="select 
				prp_id,
				prp_dom,
				prp_cartel
		from 
			    propiedades
		where 
				usr_id=17 and
				prp_mostrar=1 AND
				prp_id=$prp_id_cartel
		";
}else{
	$propiedades="select 
				prp_id,
				prp_dom,
				prp_cartel
		from 
			    propiedades
		where 
				usr_id=17 and
				prp_mostrar=1
		order by 
				prp_id
		";	
}
//print"<br> $novedad <br>";	
$cons1=mysql_query($propiedades) or die("$propiedades");
$cant_prop=mysql_num_rows($cons1);
if(!isset($page)){ 
	$page = 0;
}
$offset=$offest;
if (!$base) {
	$base=0;
}
if (!$offset) {
	$offset=15;
}
$limit .= " limit $base,$offset";
$propiedades.=$limit;

$cons1=mysql_query($propiedades) or die("$propiedades 2");

echo "<?xml version=\"1.0\" encoding=\"iso-8859-1\" ?>";

echo "
	<inmodb>
			<paginacion>
				<offest><![CDATA[15]]></offest>
				<totalDatos><![CDATA[$cant_prop]]></totalDatos>
				<paginaActual><![CDATA[$page]]></paginaActual>
			</paginacion>
		<propiedades>";

while($fila=mysql_fetch_array($cons1)){
	
	if(!isset($page)) $page = 0;
		
	echo "
			<columna>
				
				<prp_id><![CDATA[".$fila[prp_id]."]]></prp_id>
				<prp_dom><![CDATA[".$fila[prp_dom]."]]></prp_dom>
				<prp_cartel><![CDATA[".$fila[prp_cartel]."]]></prp_cartel>
						
			</columna>
	";
}
echo "
	</propiedades>
	</inmodb>";
?>