<?php 
header("Content-type: application/xml");

	extract ($_GET);
	extract ($_REQUEST);
	
	
	include("../php/config.php");	
	
	
//consulta diarios
$cons_dia = mysql_query("select * from receptores") or die ("receptores");

//consulta tarifas
$cons_tar=mysql_query("select * from tarifas");

//consulta avisos
$cons= "select 
	      propiedades.prp_id,
	      propiedades.prp_pub,
	      condiciones.con_desc,
	      tipo_const.tip_desc,
	      localidades.loc_desc,
	      fotos 
       from 
      	  propiedades,
	      condiciones,
	      tipo_const,
	      localidades
       where 
          usr_id="._USR_ID." and 
	      prp_pub!='' and 
	      prp_mostrar=1 and
	      propiedades.loc_id=localidades.loc_id ";

if($prp_id){
	$cons .="and propiedades.prp_id=$prp_id ";
	$cons .=" and tipo_const.tip_id=propiedades.tip_id ";
	$cons .=" and condiciones.con_id=propiedades.con_id ";
}else if($tip_id || $con_id){
	
	if($tip_id){
		$cons .=" and tipo_const.tip_id=$tip_id ";
		$cons .=" and propiedades.tip_id=$tip_id ";
	}else{
		$cons .=" and propiedades.tip_id=tipo_const.tip_id "; 
	}
	
	if($con_id){
		$cons .=" and condiciones.con_id=$con_id ";
		$cons .=" and propiedades.con_id=$con_id ";
	}else{
		$cons .=" and propiedades.con_id=condiciones.con_id ";
	}
}
else{
	$cons.=" and propiedades.con_id=condiciones.con_id ";
	$cons.=" and propiedades.tip_id=tipo_const.tip_id";
}


$cons .=" order by propiedades.prp_id ";

$cons_avi=mysql_query($cons) or die("No se pueden leer las publicaciones".$cons);
$num_diarios=mysql_num_rows($cons_dia);
	
	
echo "<?xml version=\"1.0\" encoding=\"iso-8859-1\" ?>";
echo "
<XML>
		<paginacion>
			<offest>10</offest>
			<totalDatos>65</totalDatos>
			<paginaActual>$page</paginaActual>
		</paginacion>

	";

	echo"<medios>";
	while ($fila1=mysql_fetch_array($cons_dia)){
		echo "
			<columna>
				<med_id><![CDATA[$fila1[rec_id]]]></med_id>
				<med_name><![CDATA[$fila1[med_raz]]]></med_name>
			</columna>
			
		";
		
	}
	echo"</medios>";
	echo"<propiedades>";
	echo"<consulta> $cons</consulta>";
while ($fila=mysql_fetch_array($cons_avi)) {
	echo "<columna>
			<prp_id><![CDATA[$fila[prp_id]]]></prp_id>
			<prp_tip><![CDATA[$fila[tip_desc]]]></prp_tip>
			<prp_con><![CDATA[$fila[con_desc]]]></prp_con>
			<prp_txtmedios><![CDATA[$fila[prp_pub]]]></prp_txtmedios>
			";
			if($fila[fotos]>0){
				$cad="select fo_enl from fotos where prp_id=$fila[prp_id] and usr_id="._USR_ID;
				$res=mysql_query($cad);
				$fo=mysql_fetch_array($res);
				echo "<fo_enl><![CDATA[$fo[fo_enl]]]></fo_enl>";
			}else{
				echo "<fo_enl><![CDATA[0-0-0.jpg]]></fo_enl>";
			}
	echo"
		</columna>";
}
echo"
	</propiedades>

</XML>";

?>
