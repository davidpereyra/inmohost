<?php 
header("Content-type: application/xml");

	extract ($_GET);
	extract ($_REQUEST);
	
	include("../php/config.php");	
	if(!isset($page)) $page = 0;
	
echo "<?xml version=\"1.0\" encoding=\"iso-8859-1\" ?>";
echo "
<inmodb>
		<paginacion>
			<offest>10</offest>
			<totalDatos>15</totalDatos>
			<paginaActual>$page</paginaActual>
		</paginacion>
	<propiedades>
		<columna>
			<pub_fecha><![CDATA[12/12/2006]]></pub_fecha>
			<prp_id><![CDATA[165]]></prp_id>
			<pub_med><![CDATA[UNO]]></pub_med>
			<pub_cant><![CDATA[15]]></pub_cant>
			<pub_num><![CDATA[3]]></pub_num>
			<pub_dat><![CDATA[1]]></pub_dat>
		</columna>
		<columna>
			<pub_fecha><![CDATA[21/01/2007]]></pub_fecha>
			<prp_id><![CDATA[985]]></prp_id>
			<pub_med><![CDATA[UNO]]></pub_med>
			<pub_cant><![CDATA[15]]></pub_cant>
			<pub_num><![CDATA[4]]></pub_num>
			<pub_dat><![CDATA[0]]></pub_dat>
		</columna>
		<columna>
			<pub_fecha><![CDATA[12/02/2007]]></pub_fecha>
			<prp_id><![CDATA[755]]></prp_id>
			<pub_med><![CDATA[UNO]]></pub_med>
			<pub_cant><![CDATA[15]]></pub_cant>
			<pub_num><![CDATA[5]]></pub_num>
			<pub_dat><![CDATA[1]]></pub_dat>
		</columna>
		<columna>
			<pub_fecha><![CDATA[12/02/2007]]></pub_fecha>
			<prp_id><![CDATA[165]]></prp_id>
			<pub_med><![CDATA[UNO]]></pub_med>
			<pub_cant><![CDATA[15]]></pub_cant>
			<pub_num><![CDATA[6]]></pub_num>
			<pub_dat><![CDATA[1]]></pub_dat>
		</columna>
		<columna>
			<pub_fecha><![CDATA[19/01/2007]]></pub_fecha>
			<prp_id><![CDATA[167]]></prp_id>
			<pub_med><![CDATA[UNO]]></pub_med>
			<pub_cant><![CDATA[15]]></pub_cant>
			<pub_num><![CDATA[7]]></pub_num>
			<pub_dat><![CDATA[1]]></pub_dat>
		</columna>
		<columna>
			<pub_fecha><![CDATA[12/02/2007]]></pub_fecha>
			<prp_id><![CDATA[165]]></prp_id>
			<pub_med><![CDATA[UNO]]></pub_med>
			<pub_cant><![CDATA[15]]></pub_cant>
			<pub_num><![CDATA[8]]></pub_num>
			<pub_dat><![CDATA[0]]></pub_dat>
		</columna>
	</propiedades>
</inmodb>";

?>