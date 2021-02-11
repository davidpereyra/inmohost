<?php
	extract($_GET);
	extract ($_POST);
	extract ($_REQUEST);
$ind_error=0;
$ind_exito=0;

mysql_query("start transaction");
switch ($mod_tip)
{
	case "edit":
			
			$cad1="select * from parametros";
			$res1=mysql_query($cad1);
			
			for ($i=1;$i<=mysql_num_rows($res1);$i++){
				$nom_var="nom_var".$i;
				$valor="valor".$i;
				if($$nom_var){
					$cadena="update parametros set valor='".$$valor."' where nom_var='".$$nom_var."' ";
					mysql_query($cadena) or $errors="Error al editar parametros".mysql_error().$cadena;	
				}
			}
				
				$valor="valor".$i;
				$cadena="update usuarios set web='".$$valor."' where usr_id="._USR_ID;
				mysql_query($cadena) or $errors="Error no se cargo la pagina web del usuario";
				
				
			$resultado="Los parametros fueron actualizados";
			
   /***********************************************************************************************************************
	******************************************   FIN EDITAR PARAMETROS  ********************************************
	***********************************************************************************************************************/
   
  
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
