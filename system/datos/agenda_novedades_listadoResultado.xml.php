<?php 

header("Content-type: application/xml");
	
	extract($_GET);
	extract ($_POST);
	extract ($_REQUEST);

	
	include("../php/config.php");	
	
$novedad="select 
				novedades.nov_id,
				nov_desc,
				date_format(nov_fecha,'%d-%m-%Y') as nov_fecha, 
				emp_desde,
				nov_vig,
				time_format(nov_hora,'%H:%i') as nov_hora,
				nov_x_emp.leida,
				nov_x_emp.emp_id
		from 
			    novedades,
			    nov_x_emp,
			    empleados
		where 
				novedades.nov_id!='' and
				novedades.nov_id=nov_x_emp.nov_id and
				empleados.emp_id=nov_x_emp.emp_id
		
		";

	$emp="select
				empleados.emp_id,
				empleados.nombre,
				empleados.apellido
		  from 	
		 		empleados
			 ";
	  		


$fechas=mysql_query("select nov_id,nov_fecha,nov_vig from novedades");

//tomo el id del empleado
	if($usr_login!=''){
		$cadena="select emp_id from empleados where usr_login='$usr_login'";
		$res=mysql_query($cadena);
		$emp_hacia=mysql_result($res,0,0);
			
	}


//si eligo a quien fue la novedad
if($emp_hacia){
	$novedad .=" and nov_x_emp.emp_id=$emp_hacia";
}

if($desdeNovedadesAno&&$desdeNovedadesMes&&$desdeNovedadesDia){
	
	$novedad.=" and date_format(nov_fecha,'%Y-%m-%d')>=\"".$desdeNovedadesAno."-".$desdeNovedadesMes."-".$desdeNovedadesDia."\"";
}

if($hastaNovedadesAno&&$hastaNovedadesMes&&$hastaNovedadesDia){
	
	$novedad.=" and
		date_format(nov_fecha,'%Y-%m-%d')<=\"".$hastaNovedadesAno."-".$hastaNovedadesMes."-".$hastaNovedadesDia."\"";
}


if($ayer==1){
	$dia_ant=date("Y-m-d",mktime(0,0,0,date("m"),date("d") - 1,date("Y")));
	$novedad .=" and (nov_fecha='$dia_ant' and nov_vig >= '$dia_ant')";
}else if($ayer==2){
	$novedad .=" and nov_vig >= '".date('Y-m-d')."' or nov_vig='0000-00-00'";
}
if ($estado==0){
	$novedad .=" and nov_x_emp.leida=0";
}elseif($estado==1){
	$novedad .=" and nov_x_emp.leida=1";
}

if($orden==""){
	
	$novedad.=" order by date_format(nov_fecha,'%Y %m %d') DESC, nov_hora DESC";

}elseif($orden=="nov_fecha"){

	$novedad.=" order by date_format(nov_fecha,'%Y %m %d') DESC, nov_hora DESC";

}else{

	$novedad.=" order by ".$orden." DESC";

}
//print"<br> $novedad <br>";	
$cons1=mysql_query($novedad) or die("$novedad");
$emps=mysql_query($emp);	
$cant_nov=mysql_num_rows($cons1);
if(!isset($page)) 
	$page = 0;
	$offset=$offest;
	if (!$base) $base=0;
	if (!$offset) $offset=10;
	$limit .= " limit $base,$offset";
$novedad.=$limit;
//print $novedad;
$cons1=mysql_query($novedad) or die("$novedad 2");

echo "<?xml version=\"1.0\" encoding=\"iso-8859-1\" ?>";

echo "
	<inmodb>
			<paginacion>
				<offest><![CDATA[10]]></offest>
				<totalDatos><![CDATA[$cant_nov]]></totalDatos>
				<paginaActual><![CDATA[$page]]></paginaActual>
			</paginacion>
		<propiedades>";

while($fila=mysql_fetch_array($cons1)){
	mysql_data_seek($emps,0);
	while($fil_emp=mysql_fetch_row($emps)){
				if($fil_emp[0]==$fila[emp_desde]){
					$emp_de=" $fil_emp[1] $fil_emp[2]";
					break;
				}//fin if fil_emp
	}//fin while
	mysql_data_seek($emps,0);
	while($fil_emp=mysql_fetch_row($emps)){
				if($fil_emp[0]==$fila[emp_id]){
					$emp_para=" $fil_emp[1] $fil_emp[2]";
					break;
				}//fin fil_emp
	}//fin while	
	
	if(!isset($page)) $page = 0;
		
	echo "
			<columna>
				
				<nov_id><![CDATA[".$fila[nov_id]."]]></nov_id>
				<nov_fecha><![CDATA[".$fila[nov_fecha]."]]></nov_fecha>
				<nov_hora><![CDATA[".$fila[nov_hora]."]]></nov_hora>
				<nov_de><![CDATA[".$emp_de."]]></nov_de>
				<nov_para><![CDATA[".$emp_para."]]></nov_para>
				<emp_id><![CDATA[".$fila[emp_id]."]]></emp_id>
				<nov_desc><![CDATA[".$fila[nov_desc]."]]></nov_desc>
				<nov_estado><![CDATA[".$fila[leida]."]]></nov_estado>
						
			</columna>
	";
}
echo "
	</propiedades>
	</inmodb>";
?>