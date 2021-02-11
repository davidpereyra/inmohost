<?php
	extract($_GET);
	extract ($_POST);
	extract ($_REQUEST);

	include("../config.php");
	
	mysql_query("start transaction");
	switch ($op){
		//hay conexion
		case 1:
			if($internet_host){
		
				$conn_id=ftp_connect($internet_host);
				if($conn_id){
					
					echo 1;
				}else{
					echo 0;
				}
				
			}
			
		break;
		case 2:
			//cambiar estado
			if($estado==1){
				$cadena="update nov_x_emp set leida=0 where nov_id=$nov_id and emp_id=$emp_id";
			}else{
				
				$cadena="update nov_x_emp set leida=1 where nov_id=$nov_id and emp_id=$emp_id";
				
			}	
			

			mysql_query($cadena) or $error=1;
			
			if($error){
				echo 0;	
				mysql_query("rollback");
			}else{
				echo 1;
				mysql_query("commit");
			}
				break;
		case 3:
			//eliminar cita
			$del_cita="DELETE FROM citas WHERE cita_id=$cita_id";
			mysql_query($del_cita) or $error="0,No se Pudo eliminar la Cita";
			if (!$error)
			{
  				  $cad_ver="select 
						 *  
				   from 
				   		citas,
				   		cita_emp 
				   where 
				   		citas.cita_id=cita_emp.cita_id and 
				   		citas.cita_id=$cita_id";

				$res_cita=mysql_fetch_array(mysql_query($cad_ver));	

				//Si es una tasacion de VENTAS manda novedad a Marisa 
				if ($res_cita[emp_id]=='6584'){
					$empleado=mysql_result(mysql_query("select concat(nombre,' ',apellido) from empleados where emp_id=".$res_cita[emp_id]),0,0);

					$max_nov=mysql_result(mysql_query("select max(nov_id) from novedades"),0,0);
					$max_nov++;
					$date=date_create($res_cita[cita_fecha]);
					$fecha_cita= date_format($date,"d/m/Y");

					$message="Se elimino una TASACION de $empleado agendada para el día ".$fecha_cita." <<".$res_cita[cita_desc].">>";			
					
					$ins_novedades=mysql_query("insert into novedades values($max_nov,'$message','24',CURDATE(),'',CURTIME());");
					$ins_nov_x_emp=mysql_query("insert into nov_x_emp values($max_nov,'111',0);");//Marisa Manuele
				}//fin IF es VENTA

				$del_emp="DELETE FROM cita_emp WHERE cita_id=$cita_id";
				
				mysql_query($del_emp) or $error="0,No se Pudo eliminar el Empleado de la cita";
				if (!$error)
				{
					$del_int="DELETE FROM interesados WHERE int_id IN (SELECT int_id FROM int_x_cita WHERE cita_id=$cita_id)";
					mysql_query($del_int) or $error="0,No se Pudieron eliminar los Interesados de la cita";
					if (!$error)
					{
						print $del_int_cita="DELETE FROM int_x_cita WHERE cita_id=$cita_id";
						mysql_query($del_int_cita) or $error="0,No se Pudo eliminar de int_x_cita";
						if (!$error)
						{
							$exito="1,La cita ha sido eliminada";
						}
					}
				}
			}
			if ($exito)
			{
				echo $exito;
				mysql_query("commit");
			}
			else 
			{
				echo $error;
				mysql_query("rollback");
			}
		break;
		case 4:
			//eliminar nota
			$del_cita="DELETE FROM notas WHERE nota_id=$nota_id";
			mysql_query($del_cita) or $error="0,No se Pudo eliminar la Nota";
			if (!$error)
			{
				$exito="1,La nota ha sido eliminada";
				echo $exito;
				mysql_query("commit");
			}
			else 
			{
				echo $error;
				mysql_query("rollback");
			}
		break;
		case 5:
			//eliminar tasacion
			$del_cita="DELETE FROM tasaciones WHERE tas_id=$tas_id";
			mysql_query($del_cita) or $error="0,No se Pudo eliminar la Tasacion";
			if (!$error)
			{ 
				$exito="1,La Tasacion ha sido eliminada";
				echo $exito;
				mysql_query("commit");
			}
			else 
			{ 
				echo $error;
				mysql_query("rollback");
			}
		break;
		case 6:
			//eliminar demanda
			$del_dem="DELETE FROM demandas WHERE dem_id=$dem_id";
			mysql_query($del_dem) or $error="0,No se Pudo eliminar la Demanda";
			if (!$error)
			{
				$exito="1,La Demanda ha sido eliminada";
				echo $exito;
				mysql_query("commit");
				
			}
			else 
			{
				echo $error;
				mysql_query("rollback");
			}
		break;
		case 7:
			//eliminar medio
			$del_dem="DELETE FROM receptores WHERE rec_id=$rec_id";
			mysql_query($del_dem) or $error="0,No se Pudo eliminar el medio";
			if (!$error)
			{
				$exito="1,El medio ha sido eliminado";
				echo $exito;
				mysql_query("commit");
			}
			else 
			{
				echo $error;
				mysql_query("rollback");
			}
		break;
		
		case 8:
			
			$errores="";	
			//reviso que no sea referente de ninguna propiedad
			$verif="select * from propiedades where prp_referente=$emp_id and usr_id="._USR_ID;
			$res_v=mysql_query($verif);
			
			if(mysql_num_rows($res_v)){
				$errores="\nEl usuario es referente de las siguientes propiedades:\n";
				while ($fil=mysql_fetch_array($res_v)) {
					$errores.=" \r ID: $fil[prp_id] \n\r";					
				}
			}
			
			//reviso que no sea monitor de ninguna cita
			$verif="select * from citas,cita_emp where emp_id=$emp_id and citas.cita_id=cita_emp.cita_id";
			$res_v=mysql_query($verif);
			
			if(mysql_num_rows($res_v)){
				$errores.="El usuario es monitor de las siguientes citas:\n";
				while ($fil=mysql_fetch_array($res_v)){
					$errores.=" \r Fecha: $fil[cita_fecha]  - PRP_ID: $fil[prp_id] \n\r";					
				}
			}
			
			//reviso que no se encuentre en las novedades
			$verif="select novedades.emp_desde,date_format(novedades.nov_fecha,'%d-%m-%Y') as nov_fecha,nov_x_emp.emp_id from novedades,nov_x_emp where novedades.nov_id=nov_x_emp.nov_id and (nov_x_emp.emp_id=$emp_id or novedades.emp_desde=$emp_id)";
			$res_v=mysql_query($verif);
			
			if(mysql_num_rows($res_v)){
				$errores.="El usuario tiene las siguientes novedades:\n";
				while ($fil=mysql_fetch_array($res_v)){
					$e_desde="select nombre,apellido from empleados where emp_id=$fil[emp_desde]";
					$e_desde_res=mysql_query($e_desde) or die("se murio".$e_desde);
					$e_desde_nom=mysql_result($e_desde_res,0,0);
					$e_desde_ape=mysql_result($e_desde_res,0,1);
					
					$e_hacia="select nombre,apellido from empleados where emp_id=$fil[emp_id]";
					$e_hacia=mysql_result(mysql_query($e_desde),0,0)." ".mysql_result(mysql_query($e_desde),0,1);
					
					$errores.=" \r De: $e_desde_nom $e_desde_ape A: $e_hacia - Fecha: $fil[nov_fecha] \n\r";					
				}
			}
			
			
			if(!$errores){
				
				$max_cam=mysql_result(mysql_query("select max(cambio_id) from cambios_emp"),0,0)+1;
				$query_cam=mysql_query("select * from empleados where emp_id=$emp_id");
				
				$fila_emp=mysql_fetch_array($query_cam);
				
				$cad_cam="insert into cambios_emp
												  values( $fila_emp[emp_id],
												  		  '$fila_emp[nombre]',
												  		  '$fila_emp[apellido]',
												  		  '$fila_emp[domicilio]',
												  		  '$fila_emp[email]',
												  		  '$fila_emp[telefono]',
												  		  '$fila_emp[tel_inmo]',
												  		  '$fila_emp[fo_id]',
												  		  now(),
												  		  'eliminacion',
												  		  $max_cam )
												  		  ";
				mysql_query($cad_cam) or $error="0,Error al cargar en cambios_emp";
				//eliminar usuario
				$del_dem="DELETE FROM empleados WHERE emp_id=$emp_id";
				mysql_query($del_dem) or $error="0,No se Pudo eliminar el usuario";
			}else{
				$error="0,$errores";
			}
			
			if (!$error)
			{
				$exito="1,El usuario ha sido eliminado";
				echo $exito;
				mysql_query("commit");
			}
			else 
			{
				echo $error;
				mysql_query("rollback");
			}
		break;
		
		case 9:
			
			$verif="select * from notas where rub_id=$rub_id";
			$res_v=mysql_query($verif);
			
			if(mysql_num_rows($res_v)){
				$i=0;
				$rubs="";
				while ($fil=mysql_fetch_array($res_v)) {
					$rubs.=" \r : ".substr($fil[nota],0,50)."... - Nombre: $fil[nombre] $fil[apellido]\n\r";					
					$i++;
				}
			}
			
			if($i==0){
				//eliminar rubro
				$del="DELETE FROM rubros WHERE rub_id=$rub_id";
				mysql_query($del) or $error="0,No se Pudo eliminar el rubro";
			}else{
				$error="0,El rubro esta siendo utilizado por los siguientes Telefonos/Notas:\n".$rubs;
			}
			if (!$error)
			{
				$exito="1,El rubro ha sido eliminado";
				echo $exito;
					mysql_query("commit");
			
			}
			else 
			{
				echo $error;
					mysql_query("rollback");
			}
		break;
		
		case 10:
			
			$verif="select * from propiedades where bar_priv_id=$bar_id";
			$res_v=mysql_query($verif);
			
			if(mysql_num_rows($res_v)){
				$i=0;
				$bars="";
				while ($fil=mysql_fetch_array($res_v)) {
					$bars.=" \r :ID: $fil[prp_id] - Dom: ".substr($fil[prp_dom],0,50)."... \n\r";					
					$i++;
				}
			}
			
			if($i==0){
				//eliminar barrio
				$del="DELETE FROM bar_priv WHERE bar_id=$bar_id";
				mysql_query($del) or $error="0,No se Pudo eliminar el barrio";
				
				$cad_select="select count(fo_id) from fotos_x_bar where bar_id=$bar_id and usr_id="._USR_ID;
				$res_select=mysql_query($cad_select);
				$num_fot=mysql_result($res_select,0,0);
				
				for ($i=1;$i<=$num_fot;$i++){
					$cad_fotos.="x$i";
				}
								
				$verif=mysql_query("select * from cambios_bar_priv");
				if(mysql_num_rows($verif)){
					$max_camb=mysql_query("select max(bar_id) from bar_priv");
					$max_camb=mysql_result($max_camb,0,0) + 1;
				}else{
					$max_camb=1;	
				}
				
				$cam="insert into cambios_bar_priv (bar_id,cambio_id,cambio_det,cambio_fecha,cambio_fotos) values($bar_id,$max_camb,'baja',now(),'$cad_fotos')";
				mysql_query($cam) or $error="0,No se Pudo insertar en cambios";
				
				$del="DELETE FROM fotos_x_bar WHERE bar_id=$bar_id";
				mysql_query($del) or $error="0,No se Pudo eliminar las fotos";
				
			}else{
				$error="0,El barrio esta siendo utilizado por las siguientes Propiedades:\n".$bars;
			}
			if (!$error)
			{
				$exito="1,El barrio ha sido eliminado";
				echo $exito;
				mysql_query("commit");
			}
			else 
			{
				echo $error;
				mysql_query("rollback");
			}
		break;
		case 11:
			
			$verif="select * from empleados where sec_id=$sec_id";
			$res_v=mysql_query($verif);
			
			if(mysql_num_rows($res_v)){
				$i=0;
				$secs="";
				while ($fil=mysql_fetch_array($res_v)) {
					$secs.=" \r : Nombre: $fil[nombre] $fil[apellido]\n\r";					
					$i++;
				}
			}
			
			if($i==0){
				//eliminar sector
				$del="DELETE FROM sectores WHERE sec_id=$sec_id";
				mysql_query($del) or $error="0,No se Pudo eliminar el sector";
			}else{
				$error="0,El sector esta siendo utilizado por los siguientes Empleados:\n".$secs;
			}
			if (!$error)
			{
				$exito="1,El sector ha sido eliminado";
				echo $exito;
					mysql_query("commit");
			
			}
			else 
			{
				echo $error;
					mysql_query("rollback");
			}
		break;
		case 12:
			
			$cadena="update empleados set color1='$color1' where usr_login='$usr_login'";

			mysql_query($cadena) or $error=1;
			
			$cadena="update empleados set color2='$color2' where usr_login='$usr_login'";

			mysql_query($cadena) or $error=1;
		
			if($error){
				echo 0;	
				mysql_query("rollback");
			}else{
				echo 1;
				mysql_query("commit");
			}
			
		break;	
		case 13:
			//cambiar estado del Cartel
			if($mostrar==1){
				$cadena="update propiedades set prp_cartel=1 where prp_id=$prp_id and usr_id=17";
			}else{
				
				$cadena="update propiedades set prp_cartel=0 where prp_id=$prp_id and usr_id=17";
			}	
			
			mysql_query($cadena) or $error=1;
								
			if($error){
				echo 0;	
				mysql_query("rollback");
			}else{
				echo "1,$page";
				mysql_query("commit");
			}
				break;
	}

?>
