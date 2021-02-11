<?php
	extract($_GET);
	extract ($_POST);
	extract ($_REQUEST);

	// Mensajes de Exito
	define("_MENS_CUPO_MAX_A", "Ha superado el <b>CUPO MAXIMO (");
	define("_MENS_CUPO_MAX_B", " Inmuebles) </b> para publicar inmuebles en el portal <b>");
	define("_MENS_LIC_VENC_A","La licencia para publicar en el portal  <b>");
	define("_MENS_LIC_VENC_B","</b> <b>ha expirado el ");
	define("_MENS_LIC_EXPIRA"," (licencia expira el ");
	define("_MENS_LIC_MAX"," (Maximo: ");
	define("_MENS_LIC_MIN",". Restan: ");
	// Mensajes de Error
	define("_MENS_PRP_EXISTE","El Inmueble ya existe en el sistema ");
	define("_MENS_INS_PRP_ERROR","Error al insertar el inmueble");
	define("_MENS_INS_PRP_ERROR_PROP","Error al insertar propietario");
	define("_MENS_INS_PRP_ERROR_PRP_PROP","Error al insertar en tabla prop_x_prp");
	define("_MENS_UPD_PRP_ERROR_PRP_PROP","Error al actualizar tabla propiedades");
	define("_MENS_SEL_CAMBIOS", "Error al obtener ultimo id de cambio");
	define("_MENS_INS_SERVICIOS", "Error al insertar en tabla ser_x_prp");
	define("_MENS_INS_PRP_ERROR_PRP_FOTO", "Error al insertar en tabla fotos");
?>