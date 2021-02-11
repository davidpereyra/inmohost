<?php
	extract($_GET);
	extract ($_POST);
	extract ($_REQUEST);

	//Inicio la sesi�n 
	@session_start('inmohost'); 

	$error="";
	//COMPRUEBA QUE EL USUARIO ESTA AUTENTIFICADO 
	if (!isset($_SESSION['usr_login']) ) { 
		
		//si no existe, envio a la p�gina de autentificacion 
		//header("Location: $rutaAbsoluta"."login.php?error=".$_SESSION['usr_login']); 
	    //ademas salgo de este script 
	  	// exit(); 
	  $error=1;
	$_INMO_COLOR1="FFFFFF";
	$_INMO_COLOR2="FFFFFF";	  
	}else{
	//Personalizo el escritorio del empleado que inicia la sesion
	
	$_INMO_COLOR1=mysql_result(mysql_query("select color1 from empleados where usr_login='".$_SESSION['usr_login']."'"),0,0);
	$_INMO_COLOR2=mysql_result(mysql_query("select color2 from empleados where usr_login='".$_SESSION['usr_login']."'"),0,0);

	}
	
	// chequeo actividad de session // tiempo que lleva dentro del sistema
    $hora_ingreso = $_SESSION["usr_tpo_ini"]; 
    $hora_actual = _NOW; 
    $tiempo_activo = (@strtotime($hora_actual)-@strtotime($hora_ingreso)); 
	
    $usr_tpo= $_SESSION["usr_tpo"];
    
	$usr_tiempo=explode(":",$usr_tpo);
	
	//print $usr_tiempo[1];
	$sum=$usr_tiempo[0]*3600;
	$sum+=$usr_tiempo[1]*60;
	$sum+=$usr_tiempo[2];
	
	$segs=$sum;
	
       
    	//echo "$tiempo_activo > ".$segs."<BR>";
	
    	if ($tiempo_activo > $segs){
		// destroyu la seccion
		@session_destroy();
		$error=1;
		
		
		
		
		//header("Location:  $rutaAbsoluta"."login.php?error=tiempo"); 
		//exit;
		} 
	
		if($error==1){
			
			if($isAjax){
				echo 0;
			}else{
				?>
<!--				<script language="javascript">
						parent.destruirSesion();
					</script>
-->                
				<?
			}
		}else{
			if($isAjax){
				echo 1;			
			}
		}
?>
