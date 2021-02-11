<?php
	extract($_GET);
	extract ($_POST);
	extract ($_REQUEST);

if(!$pagina_login){
	if($_SERVER['REMOTE_ADDR']==$SERVER_ADDR&&!$HTTP_X_FORWARDED_FOR){
		$dir_remota=$SERVER_ADDR;
	}else if($_SERVER['REMOTE_ADDR']!=$SERVER_ADDR) {
		$dir_remota=$SERVER['REMOTE_ADDR'];
	}else{
		$dir_remota=$HTTP_X_FORWARDED_FOR;
	}
	

	$coneccion=mysql_query("select * from sesiones where usr_login='$usuario' and (ses_ip='$dir_remota' or ses_ip='$ip_local')") or die("fallo de conexion aca");		

	if($ingreso){
		//print"<script>alert('usuario=$usuario ses_ip=$dir_remota')</script>";	
		if($usuario<>""||$pass<>""){
			$validar_pass=mysql_query("select usr_login,priv_desc,usr_tpo from empleados,privilegios where usr_login='$usuario' and usr_pass='$pass' and empleados.priv_id=privilegios.priv_id");
				if(mysql_num_rows($validar_pass)){
					$login=mysql_query("select * from sesiones where usr_login='$usuario' and ses_ip='$dir_remota'");
					$priv=mysql_fetch_row($validar_pass);
						
							$ses_tpo=mysql_result($validar_pass,0,2);
							$ses_tpo=split(":",$ses_tpo);
							$tpo=date("Y-m-d H:i:s",mktime( date("H")+$ses_tpo[0],date("i")+$ses_tpo[1],0,date("m"),date("d"),date("Y") ));

						if(!mysql_num_rows($login)){
						
							$max=mysql_query("select max(ses_id) from sesiones");
							$max=mysql_result($max,0,0) + 1;
							
							mysql_query("insert into 
										sesiones 
										(ses_id,
										 ses_ip,
										 usr_login,
										 ses_exp)
									    
									   values( $max,
									    	    '$dir_remota',
										    '$usuario',
										    '$tpo')") or die("no se ingreso la sesion");
							$entra=1;
						}else{
							mysql_query("update sesiones set ses_exp='$tpo' where usr_login='$usuario' and ses_ip='$dir_remota'");		
							$entra=1;	
						}
			
				}else{
		
					print"<script>location.href='$rutaAbsoluta"."login.php?fallo_pass=1';</script>";
					
				}
	
		}else{
			//print"<script>alert('no llega el usuario o el pass en ingreso ')</script>";

			print"<script>location.href='$rutaAbsoluta"."login.php?fallo_pass=1';</script>";
			
		}
				
	}
	else if($usuario<>""){	
		if($actualizacion!=1){
			if(mysql_num_rows($coneccion)){
				$login=mysql_fetch_row($coneccion);
				$privilegio=mysql_query("select priv_id from empleados where usr_login='$usuario'") or die("fallo de conexion");	
				$privilegio=mysql_result($privilegio,0,0);
				
			}else{
								
				print"<script>location.href='$rutaAbsoluta"."login.php?fallo_pass=1';</script>";
			
			}
		}
	
	}else{
		print"<script> 
			
				location.href='$rutaAbsoluta"."login.php?fallo_pass=1';
			
			</script>";
		
	}	
}
?>
