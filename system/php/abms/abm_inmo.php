<?php

	extract($_GET);
	extract ($_POST);
	extract ($_REQUEST);

mysql_query("start transaction");

switch ($mod_tip)
{
	
   case "edit": 
   			
      			$cadena="update 
	   							usuarios  set
							     	 	  titular='$titular',
							     	 	  usr_raz='$usr_raz',
							     	 	  usr_dom='$usr_dom',
							     	 	  pro_id=$pro_id,
							     	 	  loc_id=$loc_id,
							     	 	  usr_tel='$usr_tel',
							     	 	  usr_mail='$usr_mail',
							     	 	  web='$web'
			      					 where 
			      					 	  usr_id="._USR_ID;
      			
      			mysql_query($cadena) or $errors="Error al modificar usuarios".mysql_error();
      			$resultado="Los datos de la inmobiliaria han sido modificados";
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