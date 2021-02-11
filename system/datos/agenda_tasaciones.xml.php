<?php 
header("Content-type: application/xml");

	extract ($_GET);
	extract ($_POST);
	extract ($_REQUEST);
	
	include("../php/config.php");	
	
	echo "<?xml version=\"1.0\" encoding=\"iso-8859-1\" ?>";
	// Tiempo minimo entre citas
	$intervalo_min=15;
	// Hora de inicio de la agenda
	$hora_inicio=8;
	// Hora de fin de la agenda
	$hora_fin=24;
	$hora_actual=$hora_inicio;
	if (!$dia || !$mes || !$ano )
	{
		$dia=date("d");
		$mes=date("m");
		$ano=date("Y");
	}
	echo "
	<XML>
		<datos>
			<dia><![CDATA[$dia]]></dia>
			<mes><![CDATA[$mes]]></mes>
			<ano><![CDATA[$ano]]></ano>
		</datos>";	
	while ($hora_actual<$hora_fin)
	{
		print "<hora id=\"$hora_actual\">";
		for($min_actual=0;$min_actual<60-$intervalo_min+1;$min_actual+=$intervalo_min)
		{
			if ($min_actual==0)
			{
				$min_inicio=0;
			}
			else
			{
				$min_inicio=$min_actual;
			}
			$cons_citas="
						select	
							distinct(citas.cita_id) as cita_id,
							date_format(cita_fecha,'%d-%m-%Y') as cita_fecha,
							cita_hora,
							propiedades.prp_id,
							propiedades.prp_dom,
							tipo_const.tip_desc,
							condiciones.con_desc,
							propiedades.prp_pre,
							propiedades.prp_pre_dol,
							propiedades.prp_llave,
							citas.cita_desc,
							empleados.nombre,
							empleados.apellido,
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
							propiedades.usr_id=$usr_id and
							cita_fecha='$ano-$mes-$dia' and 
							citas.cita_hora between '$hora_actual:" . $min_inicio . ":00' and '$hora_actual:" . ($min_actual+$intervalo_min-1) . ":59'";
				//print $cons_citas;
			$rs_citas=mysql_query($cons_citas);
			if ($rs_citas)
			{
				if (mysql_num_rows($rs_citas))
				{
					$cont=0;
					while($fila=mysql_fetch_array($rs_citas))
					{
						$cons_int = "SELECT COUNT(*) FROM int_x_cita WHERE cita_id='".$fila[cita_id]."'";
						$rs_int=mysql_query($cons_int);
						$cant_int=mysql_result($rs_int,0,0);
						if ($min_actual==0)
						{
							$min_print="00";
						}
						else 
						{
							$min_print=$min_actual;
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
						
						$new_fecha = explode (":", $fila[cita_hora]);
		
						print "
								<item id=\"$cont\" hora=\"".$new_fecha[0].":".$new_fecha[1]."\" prp_id=\"".$fila[3]."\" llave=\"".$fila[9]."\" cita_id=\"".$fila[0]."\" interesados=\"$cant_int\">
									<detalles>
										<![CDATA[".$fila[prp_dom]."]]>
									</detalles>
									<precio>
										<![CDATA[".$fila[prp_pre]."]]>
									</precio>
									<nota>
									<![CDATA[".$fila[cita_desc]."]]>
									</nota>
									<monitor>
										<![CDATA[".$fila[nombre] ." " . $fila[apellido]."]]>
									</monitor>
									<interesados>
										<![CDATA[$cant_int]]>
									</interesados>
									<estado>
										<![CDATA[".$estado."]]>
									</estado>
								</item>";
						$cont++;
					}
				}
			}
		}
		$hora_actual++;
		print "</hora>";
	}
	echo "</XML>";
?>
