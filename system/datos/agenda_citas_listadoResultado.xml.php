<?php 

header("Content-type: application/xml");

	extract($_GET);
	extract ($_POST);
	extract ($_REQUEST);


	if(!isset($page)) $page = 0;
	include("../php/config.php");	
	if($emp_id)
	{
		$filtro .= " and empleados.emp_id=$emp_id";
	}
		
	if($desdeCitasDia!="00" && $desdeCitasMes!="00" && $desdeCitasAno!="0000")
	{	//si solo viene la fecha desde (por ejemplo desde el buscar), muestra las citas desde esa fecha en adelante
		$fecha_d="$desdeCitasAno-$desdeCitasMes-$desdeCitasDia";	
		$filtro .= " and citas.cita_fecha >= '$fecha_d'";
	}
	if($desdeCitasDia!="00"  && $desdeCitasMes!="00"  && $desdeCitasAno!="0000"  && $hastaCitasDia!="00"  && $hastaCitasMes!="00"  && $hastaCitasAno!="0000" )
	{	
		$fecha_d="$desdeCitasAno-$desdeCitasMes-$desdeCitasDia";	
		$fecha_h="$hastaCitasAno-$hastaCitasMes-$hastaCitasDia";	
		$filtro .= " and citas.cita_fecha between '$fecha_d' and '$fecha_h'";

	}//fin if
	if($prp_id)
	{
		$filtro .=" and citas.prp_id=$prp_id";
	}//fin if
	
	if ($ver_canceladas==3)
	{
		$filtro.=" and (estado=0 or estado=1 or estado=2)";
	}
	else 
	{
		$filtro.=" and estado=$ver_canceladas";	
	}

	$datos="
			select	distinct(citas.cita_id) as cita_id,
				date_format(cita_fecha,'%d/%m/%y') as cita_fecha,
				date_format(cita_fecha,'%d/%m') as cita_fecha_reducida,
				time_format(cita_hora,'%H:%i') as cita_hora,
				propiedades.prp_id,
				propiedades.prp_dom,
				tipo_const.tip_desc,
				condiciones.con_desc,
				propiedades.prp_pre,
				propiedades.pre_inmo,
				propiedades.prp_llave,
				citas.cita_desc,
				empleados.nombre,
				empleados.apellido,
				propiedades.prp_bar,
				propiedades.prp_plano,
				citas.estado
			from 
				citas,
				cita_emp,
				propiedades,
				empleados,
				condiciones,
				tipo_const
			where 
				citas.prp_id=propiedades.prp_id and
				citas.cita_id=cita_emp.cita_id and
				cita_emp.emp_id=empleados.emp_id and 
				propiedades.con_id=condiciones.con_id and
				propiedades.tip_id=tipo_const.tip_id and 
				propiedades.usr_id="._USR_ID.
				"";
		$datos .=$filtro;
	
		if ($orden==""){
			
			$datos .=" order by date_format(cita_fecha,'%Y %m %d') ASC, cita_hora ASC";	
		
		}elseif($orden=="cita_fecha"){
	
			$datos .=" order by date_format(cita_fecha,'%Y %m %d') DESC, cita_hora DESC";
	
		}else{
		
			$datos .=" order by ".$orden." ASC";	
			
		}
		
		$offset=$offest;
		if (!$base) $base=0;
		if (!$offset) $offset=20;
		//print"<br> $datos <br>";	
		$limit .= " limit $base,$offset";
		$datos_citas=mysql_query($datos);
		$totaldatos=mysql_numrows($datos_citas);
		$datos .= $limit;
		
		$datos_citas=mysql_query($datos);
		echo "<?xml version=\"1.0\" encoding=\"iso-8859-1\" ?>";
		echo "<inmodb><paginacion><offest>$offset</offest><totalDatos>$totaldatos</totalDatos><paginaActual>$page</paginaActual></paginacion><propiedades>";
		if ($datos_citas)
		{
			while($fila=mysql_fetch_array($datos_citas))
			{
 				$rs_int=mysql_query("select interesados.apellido, interesados.nombre, interesados.telefono, int_x_cita.int_id from interesados, int_x_cita where int_x_cita.cita_id=$fila[0] and interesados.int_id=int_x_cita.int_id;");
				$inter="";
				if(mysql_num_rows($rs_int))
				{                         //si tiene interesados cargados
					while($datos_int=mysql_fetch_row($rs_int)){  //mientras existan interesados para esta cita
						$inter .= "$datos_int[0] $datos_int[1] $datos_int[2];<br>";
					}
				}
				else
				{                            //si no tiene interesados 
					$inter="Sin Interesado";
				}
				switch($fila[estado])
				{
					case 0:
						$estado="A mostrar";	
					break;
					case 1:
						$estado="Cancelada";
					break;
					case 2:
						$estado="Mostrada";
					break;
				}
				print "
					<columna>
					<cita_id><![CDATA[".$fila[cita_id]."]]></cita_id>
					<cita_fecha><![CDATA[".$fila[cita_fecha]."]]></cita_fecha>
					<cita_hora><![CDATA[".$fila[cita_hora]."]]></cita_hora>
					<prp_id><![CDATA[".$fila[prp_id]."]]></prp_id>
					<prp_desc><![CDATA[".$fila[prp_dom]." ".$fila[prp_plano ]." ".$fila[prp_bar]."]]></prp_desc>
					<prp_pre><![CDATA[ \$".$fila[prp_pre]."<br>Expensas \$".$fila[pre_inmo]."]]></prp_pre>
					<prp_llave><![CDATA[".$fila[prp_llave]."]]></prp_llave>
					<cita_nota><![CDATA[".$fila[cita_desc]."]]></cita_nota>
					<cita_mon><![CDATA[".$fila[nombre]."<br>".$fila[apellido]."]]></cita_mon>
					<!--cita_int><![CDATA[".$inter."]]></cita_int-->
					<!--cita_est><![CDATA[".$estado."]]></cita_est-->
					<cita_edit><![CDATA[1]]></cita_edit>
					<cita_del><![CDATA[1]]></cita_del>
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