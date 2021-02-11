<?php 

header("Content-type: application/xml");


	extract ($_GET);
	extract ($_REQUEST);

	if(!isset($page)) $page = 0;
	include("../php/config.php");	
	if($emp_id)
	{
		$filtro .= " and empleados.emp_id=$emp_id";
	}
		
	if($desdeTasacionesDia!="00" && $desdeTasacionesMes!="00" && $desdeTasacionesAno!="0000"  && (isset($desdeTasacionesDia)&&isset($desdeTasacionesMes)&&isset($desdeTasacionesAno)))
	{	//si solo viene la fecha desde (por ejemplo desde el buscar), muestra las tasaciones desde esa fecha en adelante
		$fecha_d="$desdeTasacionesAno-$desdeTasacionesMes-$desdeTasacionesDia";	
		$filtro .= " and tasaciones.tas_fecha >= '$fecha_d'";
	}
	if($desdeTasacionesDia!="00"  && $desdeTasacionesMes!="00"  && $desdeTasacionesAno!="0000"  && $hastaTasacionesDia!="00"  && $hastaTasacionesMes!="00"  && $hastaTasacionesAno!="0000"  && (isset($hastaTasacionesDia)&&isset($hastaTasacionesMes)&&isset($hastaTasacionesAno)))
	{	
		$fecha_d="$desdeTasacionesAno-$desdeTasacionesMes-$desdeTasacionesDia";	
		$fecha_h="$hastaTasacionesAno-$hastaTasacionesMes-$hastaTasacionesDia";	
		$filtro .= " and tasaciones.tas_fecha between '$fecha_d' and '$fecha_h'";

	}//fin if
	if ($tas_id)
	{
		$filtro .=" and tasaciones.tas_id=$tas_id";
	}
	if($tip_id)
	{
		$filtro .=" and tasaciones.tip_id=$tip_id";
	}//fin if
	if($con_id)
	{
		$filtro .=" and tasaciones.con_id=$con_id";
	}//fin if
	if($estado)
	{
		$filtro .=" and tasaciones.estado=$estado";
	}
	
	if($estado_dis){
		$filtro .=" and tasaciones.estado!=$estado_dis";
		
	}
	
	$datos="
				select	distinct(tasaciones.tas_id) as tas_id,
				tipo_const.tip_desc,
				condiciones.con_desc,
				tas_dom,
				date_format(tas_fecha,'%d-%m-%Y') as tas_fecha,
				CONCAT(ap_prop,', ',nom_prop) as prop,
				tel_prop,
				tasaciones.estado,
				CONCAT(empleados.nombre,' ',empleados.apellido) as referente
			from 
				tasaciones,
				empleados,
				condiciones,
				tipo_const
			where 
				tasaciones.tip_id=tipo_const.tip_id and
				tasaciones.con_id=condiciones.con_id and
				tasaciones.tas_referente=empleados.emp_id
			";
		$datos .=$filtro;

		if($orden==""){
			
			$datos .=" order by	date_format(tas_fecha,'%Y %m %d') DESC";
		
		}elseif($orden=="tas_fecha"){
	
			$datos .=" order by date_format(tas_fecha,'%Y %m %d') DESC";
	
		}else{

			$datos .=" order by	".$orden." ASC";
			
		}
		$offset=$offest;
		if (!$base) $base=0;
		if (!$offset) $offset=10;
		//print"<br> $datos <br>";	
		$limit .= " limit $base,$offset";
		$datos_tasaciones=mysql_query($datos);
		$totaldatos=mysql_numrows($datos_tasaciones);
		$datos .= $limit;
		$datos;
		$datos_tasaciones=mysql_query($datos);
		echo "<?xml version=\"1.0\" encoding=\"iso-8859-1\" ?>";
		echo "<inmodb><paginacion><offest>$offset</offest><totalDatos>$totaldatos</totalDatos><paginaActual>$page</paginaActual></paginacion><propiedades>";
		if ($datos_tasaciones)
		{
			while($fila=mysql_fetch_array($datos_tasaciones))
			{
 				switch($fila[estado])
				{
					case 1:
						$estado="Dadas de Alta";
					break;
					case 2:
						$estado="Agendada"; //antes Archivadas
					break;
					case 3:
						$estado="Pendiente"; //antes En Curso
					break;
					case 4:
						$estado="Pendientes";	
					break;
				}
				print "
					<columna>
						<tas_id><![CDATA[".$fila[tas_id]."]]></tas_id>
						<tip_desc><![CDATA[".$fila[tip_desc]."]]></tip_desc>
						<con_desc><![CDATA[".$fila[con_desc]."]]></con_desc>
						<tas_dom><![CDATA[".$fila[tas_dom]."]]></tas_dom>
						<tas_fecha><![CDATA[".$fila[tas_fecha]."]]></tas_fecha>
						<prop><![CDATA[".$fila[prop]."]]></prop>
						<tel_prop><![CDATA[".$fila[tel_prop]."]]></tel_prop>
						<estado><![CDATA[".$estado."]]></estado>
						<referente><![CDATA[".$fila[referente]."]]></referente>
						<tas_edit><![CDATA[1]]></tas_edit>
						<tas_del><![CDATA[1]]></tas_del>
					</columna>
				";
			}
		}		
		echo "</propiedades></inmodb>";
	
/*
$novedad="select 
		nov_id,
		nov_desc,
		nov_fecha, 
		emp_desde,
		emp_hacia,
		nov_vig,
		leida,
		time_format(nov_hora,'%H:%i') as nov_hora
	from 
		novedades
	where 
		nov_id!='' and
		date_format(nov_fecha,'%Y-%m-%d')>=\"".$desdeNovedadesAno."-".$desdeNovedadesMes."-".$desdeNovedadesDia."\" and
		date_format(nov_fecha,'%Y-%m-%d')<=\"".$hastaNovedadesAno."-".$hastaNovedadesMes."-".$hastaNovedadesDia."\"
	";

//		nov_fecha>=\"".$desdeNovedadesAno."-".$desdeNovedadesMes."-".$desdeNovedadesDia."\" and
//		nov_fecha<=\"".$hastaNovedadesAno."-".$hastaNovedadesMes."-".$hastaNovedadesDia."\"

$emp=" select
		empleados.emp_id,
		empleados.nombre,
		empleados.apellido
	  from 	
	 	empleados
		 ";
	  		

$fechas=mysql_query("select nov_id,nov_fecha,nov_vig from novedades");

if($emp_id){
	$novedad .=" and emp_hacia=$emp_id";
	}

if($emp_hacia){
	$novedad .=" and emp_hacia=$emp_hacia";
	}
if($ayer==1){
	$dia_ant=date("Y-m-d",mktime(0,0,0,date("m"),date("d") - 1,date("Y")));
	$novedad .=" and (nov_fecha='$dia_ant' and nov_vig >= '$dia_ant')";
}else if($ayer==2){
	$novedad .=" and nov_vig >= '".date('Y-m-d')."' or nov_vig='0000-00-00'";
}
if ($estado==0){
	$novedad .=" and leida=0";
}elseif($estado==1){
	$novedad .=" and leida=1";
}

$novedad.=" order by nov_fecha desc";

$cons1=mysql_query($novedad) or die("$novedad");
$emps=mysql_query($emp);	

$cant_nov=mysql_num_rows($cons1);

echo "<?xml version=\"1.0\" encoding=\"iso-8859-1\" ?>";

echo "
<inmodb>
			<paginacion>
				<offest><![CDATA[10]]></offest>
				<totalDatos><![CDATA[$cant_nov]]></totalDatos>
				<paginaActual><![CDATA[$page]]></paginaActual>
			</paginacion>
		<propiedades>";

	
	echo "
		<columna>
			<cit_fecha><![CDATA[-dfg-]]></cit_fecha>
			<cit_hora><![CDATA[-dfg-]]></cit_hora>
			<prp_id><![CDATA[-sdfg-]]></prp_id>
			<prp_desc><![CDATA[-sdfg-]]></prp_desc>
			<prp_pre><![CDATA[-dfg-]]></prp_pre>
			<prp_llav><![CDATA[-dfg-]]></prp_llav>
			<cit_nota><![CDATA[-fg-]]></cit_nota>
			<cit_monitor><![CDATA[-dfg-]]></cit_monitor>
			<cit_int><![CDATA[-dfg-]]></cit_int>
			<cit_est><![CDATA[1]]></cit_est>
			<cit_edit><![CDATA[1]]></cit_edit>
			<cit_del><![CDATA[1]]></cit_del>
		</columna>

		<columna>
			<cit_fecha><![CDATA[--]]></cit_fecha>
			<cit_hora><![CDATA[--]]></cit_hora>
			<prp_id><![CDATA[--]]></prp_id>
			<prp_desc><![CDATA[--]]></prp_desc>
			<prp_pre><![CDATA[--]]></prp_pre>
			<prp_llav><![CDATA[--]]></prp_llav>
			<cit_nota><![CDATA[--]]></cit_nota>
			<cit_monitor><![CDATA[--]]></cit_monitor>
			<cit_int><![CDATA[--]]></cit_int>
			<cit_est><![CDATA[0]]></cit_est>
			<cit_edit><![CDATA[0]]></cit_edit>
			<cit_del><![CDATA[0]]></cit_del>
		</columna>
";
echo "
	</propiedades>
</inmodb>";
*/
?>