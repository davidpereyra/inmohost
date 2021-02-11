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
		if (!$med_raz)
		{
			$errors[$ind_error++]="Por favor ingrese una Razon Social para el Medio";
		}
		if (!$nombre)
		{
			$errors[$ind_error++]="Por favor ingrese un Nombre para el receptor";
		}
		if (!$apellido)
		{
			$errors[$ind_error++]="Por favor ingrese un Apellido para el receptor";
		}
		if (!$email)
		{
			$errors[$ind_error++]="Por favor ingrese un Email para el receptor";
		}
		/*if (!$mailcc)
		{
			$errors[$ind_error++]="Por favor ingrese un Email CC para el receptor";
		}^*/
		$rs_max_id=mysql_query("SELECT max(rec_id) FROM receptores;") or $errors[$ind_error++]="No se pudo obtener el ultimo ID de receptor";
		$max_id = mysql_result($rs_max_id,0,0);
		$max_id++;
		$ins_cita="INSERT INTO receptores (rec_id, nombre, apellido, mail, mailcc, med_raz) VALUES ($max_id,'$nombre', '$apellido', '$email', '$emailcc', '$med_raz')";
		mysql_query($ins_cita) or $errors[$ind_error++]="No se pudo guardar el Medio cita. $ins_cita";
		if (!$errors)
		{
			$msg_exitos[$ind_exito++]="El Medio ha sido guardado";
		}
		
	break;
	case "del":
	break;
	case "edit":
		if (!$med_raz)
		{
			$errors[$ind_error++]="Por favor ingrese una Razon Social para el Medio";
		}
		if (!$nombre)
		{
			$errors[$ind_error++]="Por favor ingrese un Nombre para el receptor";
		}
		if (!$apellido)
		{
			$errors[$ind_error++]="Por favor ingrese un Apellido para el receptor";
		}
		if (!$mail)
		{
			$errors[$ind_error++]="Por favor ingrese un Email para el receptor";
		}
		/*if (!$mailcc)
		{
			$errors[$ind_error++]="Por favor ingrese un Email CC para el receptor";
		}*/
		$upd_citas="UPDATE receptores SET nombre='$nombre', apellido='$apellido', mail='$mail', mailcc='$mailcc', med_raz='$med_raz' WHERE rec_id=$rec_id";
		mysql_query($upd_citas) or $errors[$ind_error++]="No se pudo actualizar el medio con ID:$rec_id" . $upd_citas;
		if (!$errors)
		{
			$msg_exitos[$ind_exito++]="El medio ha sido modificado con exito";
		}
	break;
}
if (!$errors)	
{
	mysql_query("commit");
}
else 
{
	mysql_query("ROLLBACK");
}

?>