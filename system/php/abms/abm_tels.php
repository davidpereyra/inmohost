<?php
	extract($_GET);
	extract ($_POST);
	extract ($_REQUEST);
$ind_error=0;
$ind_exito=0;
$errors=array();
$msg_exitos=array();
mysql_query("start transaction");
switch ($mod_tip)
{
	case "add":
		if (!$rub_id)
		{
			$errors[$ind_error++]="Por favor seleccione un rubro para el Telefono";
		}
		if (!$nombre)
		{
			$errors[$ind_error++]="Por favor ingrese un nombre para el Telefono";
		}
		if (!$apellido)
		{
			$errors[$ind_error++]="Por favor ingrese un apellido para el Telefono";
		}
		if (!$telefono)
		{
			$errors[$ind_error++]="Por favor ingrese un telefono para el Telefono";
		}
		$rs_max_id=mysql_query("SELECT max(nota_id) FROM notas;") or $errors[$ind_error++]="No se pudo obtener el ultimo ID de nota";
		$max_id = mysql_result($rs_max_id,0,0);
		$max_id++;
		$ins_nota="INSERT INTO notas (rub_id, nota_id, nombre, apellido, telefono, domicilio, mail, nota) VALUES ($rub_id, $max_id,'$nombre', '$apellido', '$telefono', '$domicilio', '$mail', '$nota')";
		mysql_query($ins_nota) or $errors[$ind_error++]="No se pudo guardar la nota. $ins_nota";
		if (!$errors)
		{
			$msg_exitos[$ind_exito++]="El telefono ha sido guardado";
		}
		
	break;
	case "del":
	break;
	case "edit":
		if (!$rub_id)
		{
			$errors[$ind_error++]="Por favor seleccione un rubro para el Telefono";
		}
		if (!$nombre)
		{
			$errors[$ind_error++]="Por favor ingrese un nombre para el Telefono";
		}
		if (!$apellido)
		{
			$errors[$ind_error++]="Por favor ingrese un apellido para el Telefono";
		}
		if (!$telefono)
		{
			$errors[$ind_error++]="Por favor ingrese un telefono para el Telefono";
		}
		$upd_nota="UPDATE notas SET rub_id=$rub_id, nombre='$nombre', apellido='$apellido', telefono='$telefono', domicilio='$domicilio', mail='$mail', nota='$nota' where nota_id=$nota_id";
		mysql_query($upd_nota) or $errors[$ind_error++]="No se pudo actualizar la nota. $upd_nota";
		if (!$errors)
		{
			$msg_exitos[$ind_exito++]="El telefono ha sido actualizado";
		}
	break;
	case "add_int":
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
	mysql_query("commit");
}
else 
{
	mysql_query("rollback");
}

?>