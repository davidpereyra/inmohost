<?php
	extract($_GET);
	extract ($_POST);
	extract ($_REQUEST);
$ind_error=0;
$ind_exito=0;
$errors=array();
$msg_exitos=array();
mysql_query("START TRANSACTION");
switch ($mod_tip)
{
	case "add":
	
	 $cad_ver="select 
						 *  
				   from 
				   		citas,
				   		cita_emp 
				   where 
				   		citas.cita_id=cita_emp.cita_id and 
				   		cita_emp.emp_id=$emp_id and 
				   		citas.cita_hora='$hora:$min:00' and
				   		citas.cita_fecha='$fecha'
				   		";
		$res_ver=mysql_query($cad_ver);		
	
		if (mysql_num_rows($res_ver))
		{
			$errors[$ind_error++]="LA CITA NO SE CARGO. Ya existe una cita agendada para ese monitor en ese horario";
		}
		else
		{
			$rs_max_id=mysql_query("SELECT max(cita_id) FROM citas;") or $errors[$ind_error++]="No se pudo obtener el ultimo ID de cita";
			$max_id = mysql_result($rs_max_id,0,0);
			$max_id++;
			$ins_cita="INSERT INTO citas (cita_id, cita_fecha, cita_hora, prp_id, cita_desc, estado) VALUES ($max_id,'$fecha', '$hora:$min:00', $prp_id, '$cita_desc', 0)";
			//$msg_exitos[$ind_exito++]="Guardando Cita. $ins_cita";
			mysql_query($ins_cita) or $errors[$ind_error++]="No se pudo guardar la cita. $ins_cita";
			$ins_monitor="INSERT INTO cita_emp VALUES ($max_id, $emp_id)";
			//$msg_exitos[$ind_exito++]="Guardando Monitor. $ins_monitor" . "<br>" . var_dump($_GET);
			mysql_query($ins_monitor) or $errors[$ind_error++]="No se pudo guardar el monitor de la cita. " .$ins_monitor;
			if (!$errors)
			{
				$msg_exitos[$ind_exito++]="La Cita ha sido guardada";

			//Si es una tasacion de VENTAS manda novedad a Marisa 
				if ($prp_id=='6584'){
					$empleado=mysql_result(mysql_query("select concat(nombre,' ',apellido) from empleados where emp_id=$emp_id"),0,0);

					$max_nov=mysql_result(mysql_query("select max(nov_id) from novedades"),0,0);
					$max_nov++;
					$date=date_create($fecha);
					$fecha_cita= date_format($date,"d/m/Y");
					
					$message="Se agendó una TASACION a $empleado para el día ".$fecha_cita." a las $hora:".$min."hs. << $cita_desc >>";			
					
					$ins_novedades=mysql_query("insert into novedades values($max_nov,'$message','24',CURDATE(),'',CURTIME());");
					$ins_nov_x_emp=mysql_query("insert into nov_x_emp values($max_nov,'111',0);");//Marisa Manuele
				}//Fin IF tasacion VENTA

			}//fin IF errores
		}//fin IF ya existe Cita
	break;
	
	case "del":
		break;
	
	case "edit":	
		$cad_ver="select 
						 *  
				   from 
				   		citas,
				   		cita_emp 
				   where 
				   		citas.cita_id=cita_emp.cita_id and 
				   		cita_emp.emp_id=$emp_id and 
				   		citas.cita_hora='$hora:$min:00' and
				   		citas.cita_fecha='$fechaCitaAno-$fechaCitaMes-$fechaCitaDia'
				   		";
		$res_ver=mysql_query($cad_ver);		
		
		if (mysql_num_rows($res_ver))
		{
		
			$cita_id_rs=mysql_result($res_ver,0,0);
			if ($cita_id!=$cita_id_rs)
			{
				$errors[$ind_error++]="LA CITA NO SE CARGO. Ya existe una cita agendada para ese monitor en ese horario";
			}
			else
			{
		
				$upd_citas="UPDATE citas SET cita_fecha='$fechaCitaAno-$fechaCitaMes-$fechaCitaDia', cita_hora='$hora:$min:00', prp_id=$prp_id, cita_desc='$cita_desc', estado='$estado' WHERE cita_id=$cita_id";
				mysql_query($upd_citas) or $errors[$ind_error++]="No se pudo actualizar la cita con ID:$cita_id" . $upd_citas;
				$upd_citas_emp="UPDATE cita_emp SET emp_id='$emp_id' WHERE cita_id='$cita_id'";
				mysql_query($upd_citas_emp) or $errors[$ind_error++]="No se pudo actualizar el empleado de la cita con ID:$cita_id";
				if (!$errors)
				{
					$msg_exitos[$ind_exito++]="La cita ha sido modificada con exito";

					//Si es una tasacion de VENTAS manda novedad a Marisa 
					if ($prp_id=='6584'){
						$empleado=mysql_result(mysql_query("select concat(nombre,' ',apellido) from empleados where emp_id=$emp_id"),0,0);

						$max_nov=mysql_result(mysql_query("select max(nov_id) from novedades"),0,0);
						$max_nov++;
						$date=date_create($fecha);
						$fecha_cita= date_format($date,"d/m/Y");
						
						$message="Se modificó una TASACION de $empleado para el día ".$fecha_cita." a las $hora:".$min."hs. << $cita_desc >>";			
						
						$ins_novedades=mysql_query("insert into novedades values($max_nov,'$message','24',CURDATE(),'',CURTIME());");
						$ins_nov_x_emp=mysql_query("insert into nov_x_emp values($max_nov,'111',0);");//Marisa Manuele
					}//fin IF tasacionVENTA
				}
			}	
		}else{
		
				$upd_citas="UPDATE citas SET cita_fecha='$fechaCitaAno-$fechaCitaMes-$fechaCitaDia', cita_hora='$hora:$min:00', prp_id=$prp_id, cita_desc='$cita_desc', estado='$estado' WHERE cita_id=$cita_id";
				mysql_query($upd_citas) or $errors[$ind_error++]="No se pudo actualizar la cita con ID:$cita_id" . $upd_citas;
				$upd_citas_emp="UPDATE cita_emp SET emp_id='$emp_id' WHERE cita_id='$cita_id'";
				mysql_query($upd_citas_emp) or $errors[$ind_error++]="No se pudo actualizar el empleado de la cita con ID:$cita_id";
				if (!$errors)
				{
					$msg_exitos[$ind_exito++]="La cita ha sido modificada con exito";

					//Si es una tasacion de VENTAS manda novedad a Marisa 
					if ($prp_id=='6584'){
						$empleado=mysql_result(mysql_query("select concat(nombre,' ',apellido) from empleados where emp_id=$emp_id"),0,0);

						$max_nov=mysql_result(mysql_query("select max(nov_id) from novedades"),0,0);
						$max_nov++;
						$date=date_create($fecha);
						$fecha_cita= date_format($date,"d/m/Y");
						
						$message="Se modificó una TASACION de $empleado para el día ".$fecha_cita." a las $hora:".$min."hs. << $cita_desc >>";			
						
						$ins_novedades=mysql_query("insert into novedades values($max_nov,'$message','24',CURDATE(),'',CURTIME());");
						$ins_nov_x_emp=mysql_query("insert into nov_x_emp values($max_nov,'111',0);");//Marisa Manuele
					}//Fin IF tasacion VENTA
				}
		}
	break;
	case "add_int":
		if (!$nombre)
		{
			$errors[$ind_error++]="Por favor ingrese el nombre del interesado";
		}
		if (!$apellido)
		{
			$errors[$ind_error++]="Por favor ingrese el apellido del interesado";
		}
		$rs_max_id=mysql_query("SELECT max(int_id) FROM interesados;") or $errors[$ind_error++]="No se pudo obtener el ultimo ID de interesado";
		$max_id = mysql_result($rs_max_id,0,0);
		$max_id++;
		$ins_cita="INSERT INTO interesados (int_id, nombre, apellido, domicilio, telefono, mail) VALUES ($max_id,'$nombre', '$apellido', '$domicilio', '$telefono', '$mail')";
		mysql_query($ins_cita) or $errors[$ind_error++]="No se pudo guardar el interesado. $ins_cita";
		
		$ins_monitor="INSERT INTO int_x_cita VALUES ($max_id, $cita_id)";
		mysql_query($ins_monitor) or $errors[$ind_error++]="No se pudo guardar en int_x_cita";
		if (!$errors)
		{
			$msg_exitos[$ind_exito++]="El interesado ha sido guardado";
		}
	break;
}
if (!$errors)	
{
	mysql_query("COMMIT");
}
else 
{
	mysql_query("ROLLBACK");
}

?>