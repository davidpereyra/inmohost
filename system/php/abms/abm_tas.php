<?php
	extract($_GET);
	extract ($_POST);
	extract ($_REQUEST);$ind_error=0;
$ind_exito=0;
$errors=array();
$msg_exitos=array();
mysql_query("START TRANSACTION");
switch ($mod_tip)
{
	case "add":
		$tas_fecha=$fechaTasacionAno."-".$fechaTasacionMes."-".$fechaTasacionDia;
		if (!$tas_fecha)
		{
			$errors[$ind_error++]="Por favor ingrese una fecha para la tasacion";
		}
		if (!$tip_id)
		{
			$errors[$ind_error++]="Por favor seleccione un tipo de construccion para la tasacion";
		}
		if (!$con_id)
		{
			$errors[$ind_error++]="Por favor ingrese una condicion para la propiedad de la tasacion";
		}
		if (!$tas_referente)
		{
			$errors[$ind_error++]="Por favor ingrese un referente para la tasacion";
		}
		if (!$pro_id)
		{
			$errors[$ind_error++]="Por favor ingrese una provincia para la tasacion";
		}
		if (!$loc_id)
		{
			$errors[$ind_error++]="Por favor ingrese una localidad para la tasacion";
		}
		if (!$ap_prop)
		{
			$errors[$ind_error++]="Por favor ingrese un apellido para la tasacion";
		}
		$rs_max_id=mysql_query("SELECT max(tas_id) FROM tasaciones;") or $errors[$ind_error++]="No se pudo obtener el ultimo ID de tasaciones";
		$max_id = mysql_result($rs_max_id,0,0);
		$max_id++;
		$ins_cita="INSERT INTO tasaciones (tas_id, tas_fecha, tip_id, con_id, tas_referente, pro_id, loc_id, tas_bar, tas_dom, nom_prop, ap_prop, tel_prop, tas_desc, estado) VALUES ('$max_id', '$tas_fecha', '$tip_id', '$con_id', '$tas_referente', '$pro_id', '$loc_id', '$tas_bar', '$tas_dom', '$nom_prop', '$ap_prop', '$tel_prop', '$tas_desc', '3')";
		//$msg_exitos[$ind_exito++]="Guardando Cita. $ins_cita";
		mysql_query($ins_cita) or $errors[$ind_error++]="No se pudo guardar la tasacion. $ins_cita";
		if (!$errors)
		{
			$resultado="La Tasacion ha sido guardada ";
		}
	break;
	case "del":
	break;
	case "edit":
				$tas_fecha=$fechaTasacionAno."-".$fechaTasacionMes."-".$fechaTasacionDia;
		if (!$tas_fecha)
		{
			$errors[$ind_error++]="Por favor ingrese una fecha para la tasacion";
		}
		if (!$tip_id)
		{
			$errors[$ind_error++]="Por favor seleccione un tipo de construccion para la tasacion";
		}
		if (!$con_id)
		{
			$errors[$ind_error++]="Por favor ingrese una condicion para la propiedad de la tasacion";
		}
		if (!$tas_referente)
		{
			$errors[$ind_error++]="Por favor ingrese un referente para la tasacion";
		}
		if (!$pro_id)
		{
			$errors[$ind_error++]="Por favor ingrese una provincia para la tasacion";
		}
		if (!$loc_id)
		{
			$errors[$ind_error++]="Por favor ingrese una localidad para la tasacion";
		}
		if (!$ap_prop)
		{
			$errors[$ind_error++]="Por favor ingrese un apellido para la tasacion";
		}
		$upd_citas="UPDATE tasaciones SET tas_fecha='$tas_fecha',  tip_id='$tip_id', con_id='$con_id', tas_referente='$tas_referente', pro_id='$pro_id', loc_id='$loc_id', tas_bar='$tas_bar', tas_dom='$tas_dom', nom_prop='$nom_prop', ap_prop='$ap_prop', tel_prop='$tel_prop', tas_desc='$tas_desc', estado='$estado' WHERE tas_id=$tas_id";
		mysql_query($upd_citas) or $errors[$ind_error++]="No se pudo actualizar la tasacion con ID:$tas_id" . $upd_citas;
		if (!$errors)
		{
			$msg_exitos[$ind_exito++]="La tasacion ha sido modificada con exito";
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