<?php 
header("Content-type: application/xml");

	extract ($_GET);
	extract ($_REQUEST);
	
	include("../php/config.php");	
	if(!isset($page)) $page = 0;
	
	
	$cadena="select 
					pub_id,
					receptores.med_raz,
					prp_id,
					med_raz as dia_desc,
					pub_dia,
					date_format(pub_env,\"%d-%m-%Y\") as pub_env
			 from 
			 		publicaciones,
			 		receptores
			 where
			 		publicaciones.dia_id=receptores.rec_id";
	if($prp_id){
	
		$cadena.=" and publicaciones.prp_id=$prp_id";
	}
	
	$result=mysql_query($cadena);

	$cantidad_resultados=mysql_num_rows($result);
	
echo "<?xml version=\"1.0\" encoding=\"iso-8859-1\" ?>";
echo "
<inmodb>
		<paginacion>
			<offest>10</offest>
			<totalDatos>$cantidad_resultados</totalDatos>
			<paginaActual>$page</paginaActual>
		</paginacion>
	<propiedades>";

	while ($fila=mysql_fetch_array($result)) {
		
		print"
			<columna>
				<pub_fecha><![CDATA[$fila[pub_env]]]></pub_fecha>
				<prp_id><![CDATA[$fila[prp_id]]]></prp_id>
				<pub_med><![CDATA[$fila[dia_desc]]]></pub_med>
				<pub_id><![CDATA[$fila[pub_id]]]></pub_id>
				<pub_cant><![CDATA[15]]></pub_cant>
				<pub_num><![CDATA[$fila[pub_id]]]></pub_num>
				<pub_dat><![CDATA[3]]></pub_dat>
			</columna>
			";
	}
	print"
	</propiedades>
</inmodb>";

?>