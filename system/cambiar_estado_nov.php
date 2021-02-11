<?php
	extract($_GET);
	extract ($_POST);
	extract ($_REQUEST);

	include("php/config.php");
	
	if($estado==1){
		$cadena="update novedades set leida=0 where nov_id=$nov_id";
	}else{
		$cadena="update novedades set leida=1 where nov_id=$nov_id";
		
	}	
	
	mysql_query($cadena) or $error=1;
	
	if($error){
		echo 0;	
	}else{
		echo 1;
	}
	
	

?>