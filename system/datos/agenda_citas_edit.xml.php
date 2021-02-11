<?php
header("Content-type: application/xml");
$xml=1;
	extract ($_GET);
	extract ($_POST);
	extract ($_REQUEST);

	$intervalo_min=15;
	include("../php/config.php");	
	echo "<?xml version=\"1.0\" encoding=\"iso-8859-1\" ?>";
	 $cons_cita="
			select	
				citas.cita_id,
				date_format(cita_fecha,'%d-%m-%Y') as cita_fecha,
				time_format(cita_hora,'%H:%i') as cita_hora,
				propiedades.prp_id,
				propiedades.prp_dom,
				condiciones.con_desc,
				tipo_const.tip_desc,
				propiedades.prp_pre,
				propiedades.prp_pre_dol,
				propiedades.prp_llave,
				citas.cita_desc,
				empleados.nombre,
				empleados.apellido,
				empleados.emp_id,
				propiedades.prp_bar,
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
				citas.cita_id=$cita_id and
				propiedades.usr_id='$usr_id'
	";
	$rs_cita=mysql_query($cons_cita) or print ("<error>Error al obtener datos de la cita $cons_cita ". mysql_error() . "</error>");
	$fila=mysql_fetch_array($rs_cita);
	$horas=split(":",$fila[cita_hora]);
	$emp_id=$fila[emp_id];
	$prp_id=$fila[prp_id];
	$fecha=$fila[cita_fecha];
	$fechas=split("-",$fila[cita_fecha]);
	echo "
	<cita>
		<id>".$fila[cita_id]."</id>
		<fecha>".$fecha."</fecha>
		<horas>"; 
				
				for ($i=0;$i<=23;$i++){
      				if($i<10){
      					$v="0".$i; 
      				}else{
	      				$v=$i;
      				}
      				
      				echo "<option value='$i'>$v</option>";
      			}
      			echo "<selected>".number_format($horas[0],0)."</selected>";
	
		echo"
		</horas>
		<min>".$horas[1]."</min>
		<dia>".$fechas[0]."</dia>
		<mes>".$fechas[1]."</mes>
		<ano>".$fechas[2]."</ano>
		<prp_id>".$fila[prp_id]."</prp_id>
		<prp_dom>".$fila[prp_dom]."</prp_dom>
		<prp_pre>".$fila[prp_pre]."</prp_pre>
		<prp_pre_dol>".$fila[prp_pre_dol]."</prp_pre_dol>
		<prp_llave>".$fila[prp_llave]."</prp_llave>
		<cita_desc>".$fila[cita_desc]."</cita_desc>
		<nombre>".$fila[nombre]."</nombre>
		<apellido>".$fila[apellido]."</apellido>
		<emp_id>".$fila[emp_id]."</emp_id>
		<prp_bar>".$fila[prp_bar]."</prp_bar>
		";
	echo "<estados>
			<option value='0'>Pendiente</option>
			<option value='1'>Cancelada</option>
			<option value='2'>Finalizada</option>
			<selected>".$fila[estado]."</selected>
		  </estados>";
	echo "<minutos>";
	for ($i=0;$i<60;$i+=$intervalo_min)
	{
		if ($i==0) $i="00";
		echo "<option value='$i'>$i</option>";
	}
	echo "<selected>".$horas[1]."</selected>";
	echo "</minutos>";
	echo "<propiedades>";
			
			$regs=" prp_id,CONCAT(prp_id,' - ',tip_desc, '-', con_desc,' - ',prp_dom, ' - $', prp_pre, ' - Llave: ', prp_llave)";
			$tablas=" propiedades,condiciones,tipo_const ";
			$filtro=" prp_mostrar=1 and usr_id='$usr_id' and propiedades.con_id=condiciones.con_id and tipo_const.tip_id=propiedades.tip_id";
			$xtras=" order by prp_id";
			include("../"._FILE_SCRIPT_PHP_SELECT);
			$regs="";
            $tablas="";
            $id="";
			$xtras="";
			
	echo "<selected>".$prp_id."</selected>";
	echo "</propiedades>";
	echo "<empleados>";

			$regs=" emp_id,CONCAT(nombre, ' ', apellido)";
			$tablas=" empleados";
			$filtro="";
			$xtras=" order by nombre,apellido ASC";			
		    include("../"._FILE_SCRIPT_PHP_SELECT);
			$regs="";
            $tablas="";
            $id="";
			$xtras="";		    
			echo "<selected>".$emp_id."</selected>";
			
	echo "</empleados>";

	echo "
	</cita>";
	
?>
