<?php
	extract($_GET);
	extract ($_POST);
	extract ($_REQUEST);
$ind_error=0;
$ind_exito=0;

include(_FILE_PHP_DIR);
mysql_query("start transaction");

switch ($mod_tip)
{
	case "add":
			$sec_id=max_id("sectores","sec_id");
			$cadena="insert into sectores values($sec_id,'$sec_desc','$etiqueta_org','$sec_mostrar')";
			mysql_query($cadena) or $errors="Error al agregar sectores".mysql_error();
			
			$resultado="El sector ha sido agregado con éxito";
   /***********************************************************************************************************************
	******************************************   ********************************************
	***********************************************************************************************************************/
   break;
   case "edit": 
   			
      			$cadena="update sectores set sec_desc='$sec_desc',etiqueta_org='$etiqueta_org',sec_mostrar='$sec_mostrar' where sec_id=$sec_id";
      			mysql_query($cadena) or $errors="Error al modificar sectores".mysql_error();
      			$resultado="El sector ha sido modificado";
      			
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