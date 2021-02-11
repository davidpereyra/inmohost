<?php 
header("Content-type: application/xml");
extract ($_GET);
extract ($_REQUEST);

include("../php/config.php");

//Ya tengo los filtros multiples. solo resta hacer la consulta en propiedades
	$regs=" prp_id,
			prp_dom,
			loc_desc,
			pro_desc,
			tip_desc,
			con_desc,
			prp_pre ";
	
	$tablas="propiedades,
			 localidades,
			 provincias,
			 tipo_const,
			 condiciones";
	
	$filtro="propiedades.pro_id=provincias.pro_id and
			 propiedades.loc_id=localidades.loc_id and
			 propiedades.tip_id=tipo_const.tip_id and
			 propiedades.con_id=condiciones.con_id and
			 propiedades.usr_id="._USR_ID." and 
			 propiedades.prp_id=$prp_id";



$cad=mysql_query("select $regs from $tablas where $filtro");
$fila=mysql_fetch_array($cad);

$msg="Estimado $dem_raz:\n\rTenemos en algrado de comunicarle que contamos un inmueble de caracterísitcas\nsimilares a la que Ud. solicitó en su momento. Si aún esta interesado en \nrecibir asesoramiento, por favor, no dude en contactarse con nosotros. Sin \nmás, le dejo una breve descripción del inmueble a continuación:\n\r
						\n\r$fila[tip_desc] - $fila[con_desc] - $fila[prp_dom] - $fila[loc_desc] - $fila[prp_pre];		
";
	

echo "<?xml version=\"1.0\" encoding=\"iso-8859-1\" ?>";
echo "<XMLTEXTO>";
echo "<to><![CDATA[$to]]> </to>";			
echo "<from><![CDATA[$MAIL_USR]]></from>";
echo "<subject><![CDATA[$subject]]></subject>";		
echo "<msg><![CDATA[$msg]]></msg>";		
echo "<dem_raz><![CDATA[$dem_raz]]></dem_raz>";		
echo "</XMLTEXTO>";

?>