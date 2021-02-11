<?php

	$rutaSystema = "../";
	$rutaInterfaz = "../../interfaz/";
	
	include ($rutaSystema."php/config.php");
	
	
	// desde donde estoy hacia donde voy
	$pag_login = $rutaSystema."../login.php";
	extract($_GET);
	extract ($_POST);
	extract ($_REQUEST);
	
// funcion para redireccionar la web a destino
function errores($error){
	global $pag_login;
	
	switch ($error){
		
		case 1:
			echo "Acceso incorrecto!<br>esta intentando ingresar directamente";
			exit;
		break;
	
		case 2:
			echo "Acceso incorrecto!<br>no a cargado datos en el formulario";
			exit;
		break;
		
		case 3:
			echo "El usuario no existe";
			exit;
		break;

		case 4:
			echo "Clave incorrecta"; 	
			exit;
		break;

		case 5:
			echo "Su usuario aún no esta autorizado o esta suspendido";
			exit;
		break;

		case 6:
			echo "Error en BD(sec_chequea2).";
			exit;
		break;
		
	}

}

	$url = explode("?",$_SERVER['HTTP_REFERER']);
	$pag_referida=$url[0];
	$redir=$pag_referida;

	// chequear si se llama directo al script.
	if ($_SERVER['HTTP_REFERER'] == ""){
		errores(1);
		
	}

	// si paso los datos por el formulario sigue
	if (!$usuario && !$pass){
		errores(2); 
		
	}
	
	$consulta = mysql_query("select usr_pass,usr_login,priv_desc,usr_tpo from empleados,privilegios where usr_login='$usuario' and usr_pass='$pass' and empleados.priv_id=privilegios.priv_id") OR errores(6); 
	
	if (mysql_num_rows($consulta) == 0){
		errores(3); 
		
	}

	// genero al array de los datos de user
	$datos_user = mysql_fetch_array($consulta);

	// creo los datos de comprobacion avanzada
	$user_del = stripslashes($usuario);
//	$pass_del = md5($_POST['pass']);
	
	// me dasago lo la coneccion y los datos
	mysql_free_result($consulta);
	
	//  vuelvo a chequear el usuario con el resultado de la base de datos
	if ($datos_user['usr_login'] != $user_del){
		errores(3); 
		
	}
	
	// comparo los pass con encriptacion
	if ($datos_user['usr_pass'] != $pass){
		errores(4);
		
	}
	
	@session_start();
	
	$_SESSION['usr_login'] = $datos_user['usr_login'];
	$_SESSION['usr_tpo'] = $datos_user['usr_tpo'];

    // Paranoia: decimos al navegador que no "cachee" esta página.
    //session_cache_limiter('nocache,private');
    
    // Asignamos variables de sesión con datos del Usuario para el uso en el
    // resto de páginas autentificadas.
    $consulta_user = mysql_query("select usr_id,usr_raz,usr_cim,usr_ccpim from usuarios where usr_id=" . _USR_ID) OR errores(6); 
	$datos_usuario=mysql_fetch_array($consulta_user);
    
	if (mysql_num_rows($consulta_user) == 0){
		errores(3); 
		
		
	}
    // definimos usuarios_id como IDentificador del usuario en nuestra BD de usuarios
    $_SESSION['usr_id'] = $datos_usuario['usr_id'];

    //definimos usuario_nivel con el Nivel de acceso del usuario de nuestra BD de usuarios
    $_SESSION['usr_raz'] = $datos_usuario['usr_raz'];
    
    $_SESSION['usr_cim'] = $datos_usuario['usr_cim'];
    
    $_SESSION['usr_ccpim'] = $datos_usuario['usr_ccpim'];
    
	$_SESSION['web'] = $datos_usuario['web'];
    

    
    
       
    // definimos usuario_nivel con el Nivel de acceso del usuario de nuestra BD de usuarios
   /* $_SESSION['user_nivel'] = $datos_user['nivel'];*/
    
    //definimos usuario_nivel con el Nivel de acceso del usuario de nuestra BD de usuarios
  /*  $_SESSION['user_nombre'] = $datos_user['nombre'];*/

  
	// creo la fecha y hora de ingreso
	$_SESSION["usr_tpo_ini"] = date("Y-n-j H:i:s"); 

	echo "1";
	
?>

