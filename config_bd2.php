<?php 
extract($_POST);
extract($_GET);
$HOST="localhost";     
$USUARIO="inmo";
$PASSWORD="inmo";
$BASE_DATOS="inmodb";
$db=mysql_connect($HOST,$USUARIO,$PASSWORD);
mysql_select_db($BASE_DATOS,$db);
if ($reload)
{
	 $ins_usr="INSERT INTO usuarios (usr_id, usr_raz, usr_dom, usr_tel, usr_mail, usr_cim, pro_id,web,loc_id) VALUES ($usr_id,'$usr_raz','$usr_dom','$usr_tel','$email','$usr_cim','$pro_id','$web','$loc_id')";

	mysql_query($ins_usr) or die("SE PRODUJO UN ERROR AL INSERTAR el USUARIO <br>$ins_usr");
	$upd_par="UPDATE parametros SET valor='$usr_id' WHERE nom_var='usr_inmo'";
	mysql_query($upd_par) or die("SE PRODUJO UN ERROR AL ACTUALIZAR los PARAMETROS<br>$upd_par");
	$upd_port="UPDATE portales SET usr_id='$usr_id'";
	mysql_query($upd_port) or die("SE PRODUJO UN ERROR AL ACTUALIZAR la tabla PORTALES<br>$upd_par");
	$upd_prov="UPDATE parametros SET valor='$pro_id' where nom_var='prov_default'";
	mysql_query($upd_prov) or die("SE PRODUJO UN ERROR AL ACTUALIZAR la tabla PARAMETROS<br>$upd_prov");
	
	// Borramos el empleado x defecto
	$del_emp="DELETE FROM empleados";
	mysql_query($del_emp) or die("ERROR AL BORRAR EMPLEADOS x DEFECTO. <br>DELETE FROM empleados");
	$usr_tpo="$hh_s:$mm_s:00";
   $insertar="insert into empleados (emp_id,
										nombre,
										apellido,
										telefono,
										email,
										domicilio,
										usr_login,
										usr_pass,
										priv_id,
										usr_tpo
										)
								values (
										1,
										'$nombre',
										'$apellido',
										'$telefono',
										'$email-emp',
										'$domicilio',
										'$usr_login',
										'$usr_pass',
										$priv_id,
										'$usr_tpo'
										);";
	mysql_query("$insertar") or die("Error al intentar cargar el usuario".mysql_error().$insertar);	
	
	
	
	if (!$errors)
	{
		print "<br>La instalación ha finalizado con exito<br>
		<script>document.location.href='http://localhost/inmohostV2.0/';</script>";
	}
	else
	{
		print $errors;
	}
	
}

?>

