<?php
	extract($_GET);
	extract ($_POST);
	extract ($_REQUEST);

	// Mensajes de Exito
	define("_MENS_ACT_BUSCANDO", "Intentando conectar con el servidor...");
	define("_MENS_ACT_ENCONTRADO","Conexión establecida.");
	define("_MENS_ACT_COMENZANDO","Comenzando a enviar datos...");
	define("_MENS_ACT_OK","Se ha actualizado el sistema.");

	// Mensajes Temporales
	define("_MENS_ACT_TEMP_1","Actualizando Inmuebles...");
	define("_MENS_ACT_TEMP_2","Enviando Avisos a los medios Gráficos");
	define("_MENS_ACT_TEMP_3","Actualizando Barrios Privados");
	define("_MENS_ACT_TEMP_4","Actualizando Referentes");
	define("_MENS_ACT_TEMP_5","");

	// Mensajes de Error
	define("_MENS_ACT_ERROR","No hay conexión con el servidor.");
	
?>