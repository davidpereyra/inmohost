<?php
	extract($_GET);
	extract ($_POST);
	extract ($_REQUEST);
$ind_error=0;
$ind_exito=0;

date_default_timezone_set("America/Argentina/Mendoza");

mysql_query("start transaction");
switch ($mod_tip)
{
	case "add":
			
			$max_id = mysql_query ("select max(nov_id) from novedades"); //obtiene el id maximo de novedades para agregar en tabla
			if(mysql_num_rows($max_id) )
			{
				$max_id = mysql_result($max_id,0,0) + 1;
			}else{
				$max_id=1;
			}
			//Formatea la cadena para ser insertada en la base de datos sin que los caracteres "\" ó "'" la dañen.
			$nov_desc=addslashes($nov_desc);
			
			$insertar="insert into novedades (nov_id,
												nov_desc,
												emp_desde,
												nov_fecha,
												nov_vig,
												nov_hora)
										values (
												$max_id,
												'$nov_desc',
												$emp_desde,
												'".date('Y-m-d')."',
												'0000-00-00',
												'".date('H:i:s')."');";
			
		mysql_query("$insertar") or $errors="Error al intentar cargar la novedad".mysql_error().$insertar;	
			
			
			$sels=$_POST["emp_hacia"];
			
			if($sels[0]=="0"){ //Todos
			
				$cad="select emp_id from empleados where emp_id!=88 and emp_id!=89";
				$result=mysql_query($cad) or $errors="Error al intentar cargar novedades para todos".mysql_error().$cad;	
				while ($fila=mysql_fetch_array($result)) {
					
					$cad="insert into nov_x_emp values($max_id,$fila[emp_id],0)";
					mysql_query($cad) or $errors="Error en la carga de novedades nov_x_emp: ".$cad;
				
				}
				
			}elseif ($sels[0]=="100"){ // Administracion
				$cad="select emp_id from empleados where sec_id=5";
				$result=mysql_query($cad) or $errors="Error al intentar cargar novedades para Dpto Administracion".mysql_error().$cad;	
				while ($fila=mysql_fetch_array($result)) {
					
					$cad="insert into nov_x_emp values($max_id,$fila[emp_id],0)";
					mysql_query($cad) or $errors="Error en la carga de novedades nov_x_emp: ".$cad;
				
				}				
			}elseif ($sels[0]=="101"){ // Sector Lotes y Fincas

				$cad="select emp_id from empleados where sec_id=7";
				$result=mysql_query($cad) or $errors="Error al intentar cargar novedades para Dpto Rural/Lotes".mysql_error().$cad;	
				while ($fila=mysql_fetch_array($result)) {
					
					$cad="insert into nov_x_emp values($max_id,$fila[emp_id],0)";
					mysql_query($cad) or $errors="Error en la carga de novedades nov_x_emp: ".$cad;
				
				}							
			}
			elseif ($sels[0]=="102"){ //Sector  Comercial

				$cad="select emp_id from empleados where sec_id=3";
				$result=mysql_query($cad) or $errors="Error al intentar cargar novedades para Dpto Comercial".mysql_error().$cad;	
				while ($fila=mysql_fetch_array($result)) {
					
					$cad="insert into nov_x_emp values($max_id,$fila[emp_id],0)";
					mysql_query($cad) or $errors="Error en la carga de novedades nov_x_emp: ".$cad;
				
				}							
			}else{
			
				for ($i=0;$i<count($sels);$i++){
					
					$cad="insert into nov_x_emp values($max_id,$sels[$i],0)";
					mysql_query($cad) or $errors="Error en la carga de novedades nov_x_emp: ".$cad;
					
				}
			}
		$mensaje="La Novedad ha sido agregada con éxito";		
			
			
   /***********************************************************************************************************************
	******************************************   FIN ALTA NOVEDAD  ********************************************
	***********************************************************************************************************************/
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
