<?php
	extract($_GET);
	extract ($_POST);
	extract ($_REQUEST);

	//revisar el log de errores

if($error == "javascript"){
		
	include("../config.php");

	if(file_exists("../../"._FILE_LOG_JAVASCRIPT)){		
		$ddf = fopen("../../"._FILE_LOG_JAVASCRIPT,'a');
		fwrite($ddf,"[".date("r")."] Error -:$texto ($archivo:$linea)\n");
		fclose($ddf);
	}
}
	
function error($numero,$texto, $archivo, $linea){
	if(file_exists(_FILE_LOG_PHP)){
		$ddf = fopen(_FILE_LOG_PHP,'a');
		fwrite($ddf,"[".date("r")."] Error $numero:$texto ($archivo:$linea)\n");
		fclose($ddf);
	}
}
	//Esto lo conseguiremos indicando al interprete Zend que llame a la función error() cada vez que el código PHP contenga un error con la función set_error_handler:
	set_error_handler('error');
	
	//error(0,$texto, $archivo, $linea);
	
?>