<?php
	extract($_GET);
	extract ($_POST);
	extract ($_REQUEST);
$ind_error=0;
$ind_exito=0;

mysql_query("start transaction");
switch ($mod_tip)
{
	case "add":
			
			$max_id = mysql_query ("select max(rub_id) from rubros"); //obtiene el id maximo de rubros para agregar en tabla
			if(mysql_num_rows($max_id) )
			{
				$max_id = mysql_result($max_id,0,0) + 1;
			}else{
				$max_id=1;
			}
			// Me fijo que el rubro no exista ya en la base de datos
			$errors=0;
			$cons="SELECT rub_desc FROM rubros WHERE rub_desc='$rub_desc'";
			$rs=mysql_query($cons) or $errors="Error al verificar existencia de rubro<br>$cons";
			
			if (mysql_num_rows($rs))
			{
				$errors="Ya existe un rubro '$rub_desc' en el sistema. No se ha creado un el nuevo rubro";
			}
			if (!$errors)
			{
				
				$insertar="insert into rubros (rub_id,rub_desc)
											values (
													$max_id,
													'$rub_desc'
													);";
				mysql_query("$insertar") or $errors="Error al intentar cargar el Rubro".mysql_error().$insertar;	
			}
			
			$resultado="El Rubro fue agregado al sistema";
   /***********************************************************************************************************************
	******************************************   FIN ALTA USUARIO  ********************************************
	***********************************************************************************************************************/
   
   case "edit": 

   			if($rub_id){
   				$cadena="
   							update 
   									rubros
   							 set
   							 		rub_desc='$rub_desc'
   							 where 
   							 		rub_id=$rub_id
  				
   				";   				
   				mysql_query($cadena) or $errors="Error al modificar el rubro.".mysql_error()."<br>".$cadena;
   				$resultado="El rubro fue modificado";
   				
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