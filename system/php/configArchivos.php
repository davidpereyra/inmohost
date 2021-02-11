<?php
	extract($_GET);
	extract ($_POST);
	extract ($_REQUEST);

	define("_FILE_SYSTEM", "inmohost.php");	

	// class y archivos de systema
	// los xml.php que sean prosesados por SxL debe tener ruta absoluta por HTTP
	define("_FILE_XSL_CLASS", $rutaSystema."php/classes/MM_XSLTransform.class.php");
	
	//GENERICOS
	define("_FILE_XSL_GENERICO", $rutaSystema."genericoXSL.php");
	define("_FILE_IFRAME_GENERICO", $rutaAbsoluta.$rutaSystemAbs."genericoIframe.php");
	// Si viene de internet el generico siempre entra por el dominio
	
	$con_ip=substr($_SERVER['REMOTE_ADDR'],0,3);
	$dominio_local=mysql_result(mysql_query("select valor from parametros where nom_var='dominio_local'"),0,0);	

	if ($_SESSION["acceso_remoto"])//if ($con_ip!="192"&&$con_ip!="127")

	{
		define("_FILE_HTML_GENERICO", "http://".$dominio_local."/inmohostV2.0/".$rutaSystemAbs."generico_html.php");
	}
	else
	{
		define("_FILE_HTML_GENERICO", $rutaAbsoluta.$rutaSystemAbs."generico_html.php");
	}

	
	//generico listado ajax
	define("_FILE_PHP_GENERICO_LISTADOS", $rutaSystemAbs."generico_listados.php");
	define("_FILE_JAVASCRIPT_LISTADO", $rutaSystema."javascript/listados.js");

	define("_PROXY", "../proxy.php");

	// carpeta de archivos XML
	$carpetaDatos = "datos/";
	
/************************************************/
//			ARCHIVOS POR CATEGORIAS				//
/************************************************/

	//mail
	define("_FILE_XML_SEND_MAIL", $rutaAbsoluta.$rutaSystemAbs.$carpetaDatos."send_mail.xml.php");
	define("_FILE_XSL_SEND_MAIL", $rutaSystema."send_mail.xsl");
	//menu
	define("_FILE_XML_MENU_PRINCIPAL", $rutaAbsoluta.$rutaSystemAbs.$carpetaDatos."menu.xml.php");
	define("_FILE_XSL_MENU_PRINCIPAL_ITEM", $rutaSystema."menuItem.xsl");
	define("_FILE_XSL_MENU_PRINCIPAL", $rutaSystema."menu.xsl");
	define("_FILE_MENU_PRP", "php/mensajes/prp_menu.php");
	
	//rss	
	define("_FILE_XML_RSS", $rutaAbsoluta.$rutaSystemAbs.$carpetaDatos."rss.xml.php");
	define("_FILE_XSL_RSS", $rutaSystema."rss.xsl");
	define("_FILE_XML_RSS_FULL", $rutaAbsoluta.$rutaSystemAbs.$carpetaDatos."rssFull.xml.php");
	define("_FILE_XSL_RSS_FULL", $rutaSystema."rssFull.xsl");
	define("_FILE_JAVASCRIPT_RSS", $rutaSystema."javascript/rss.php");

	//Propiedades
	define("_FILE_XML_PRP_FICHA", $rutaAbsoluta.$rutaSystemAbs.$carpetaDatos."prp_ficha.xml.php");
	define("_FILE_XSL_PRP_FICHA", $rutaSystema."prp_ficha.xsl");
	define("_FILE_XML_PRP_FOTOS", $rutaAbsoluta.$rutaSystemAbs.$carpetaDatos."prp_fichaFotos.xml.php");
	define("_FILE_PHP_PRP_FICHA", $rutaSystemAbs."prp_ficha.php");
	define("_FILE_PHP_PRP_FICHA_EDIT", $rutaSystemAbs."prp_ficha_edit.php");
	define("_FILE_PHP_PRP_FICHA_EDIT2", $rutaSystema."prp_ficha_edit.php");
	define("_FILE_XML_PRP_FICHA_EDIT", $rutaAbsoluta.$rutaSystemAbs.$carpetaDatos."prp_ficha_edit.xml.php");
	define("_FILE_XSL_PRP_FICHA_EDIT", $rutaSystema."prp_ficha_edit.xsl");
	define("_FILE_PHP_PRP_ESTADO", $rutaAbsoluta.$rutaSystemAbs."prp_edit_estado.php");
	define("_FILE_PHP_ABM_PRP", $rutaSystema."php/abms/abm_prp.php");	
		//listado de propiedades
		define("_FILE_PHP_PRP_LISTADO", $rutaSystemAbs."prp_listado.php");
		define("_FILE_XML_PRP_HEAD", $rutaAbsoluta.$rutaSystemAbs.$carpetaDatos."prp_listadoHead.xml.php");
		define("_FILE_XML_PRP_LISTADO", $rutaAbsoluta.$rutaSystemAbs.$carpetaDatos."prp_listadoResultado.xml.php");
		//publicaciones
		define("_FILE_PHP_PRP_PUBLICACIONES", $rutaSystemAbs."prp_medios.php");
		define("_FILE_XML_PRP_PUBLICACIONES", $rutaAbsoluta.$rutaSystemAbs.$carpetaDatos."prp_medios.xml.php");
		define("_FILE_XSL_PRP_PUBLICACIONES", $rutaSystema."prp_medios.xsl");
		//publicaciones
		define("_FILE_XML_PRP_PUBLICACIONES_RESUMEN_LISTADO", $rutaAbsoluta.$rutaSystemAbs.$carpetaDatos."prp_mediosResultado.xml.php");
		define("_FILE_XML_PRP_PUBLICACIONES_RESUMEN_HEAD", $rutaAbsoluta.$rutaSystemAbs.$carpetaDatos."prp_mediosHead.xml.php");
		define("_FILE_PHP_ABM_ENV_MEDIOS", $rutaSystema."php/abms/abm_env_medios.php");
		define("_FILE_PHP_MENSAJES", $rutaSystema."mensajes.php");
		
		
		
	// AGENDA
		//novedades
		define("_FILE_XML_NOVEDADES_HEAD", $rutaAbsoluta.$rutaSystemAbs.$carpetaDatos."agenda_novedades_listadoHead.xml.php");
		define("_FILE_XML_NOVEDADES_LISTADO", $rutaAbsoluta.$rutaSystemAbs.$carpetaDatos."agenda_novedades_listadoResultado.xml.php");
		define("_FILE_XML_NOVEDADES", $rutaAbsoluta.$rutaSystemAbs.$carpetaDatos."agenda_novedades.xml.php");
		define("_FILE_XSL_NOVEDADES", $rutaSystema."agenda_novedades.xsl");
		define("_FILE_PHP_NOVEDADES", $rutaAbsoluta.$rutaSystemAbs."agenda_novedades.php");
		define("_FILE_PHP_ABM_MENS_NOV", $rutaSystema."novedades_mensajes.php");	
		define("_FILE_PHP_ABM_NOV", $rutaSystema."php/abms/abm_nov.php");
		
		//demandas
		define("_FILE_XML_DEMANDAS_HEAD", $rutaAbsoluta.$rutaSystemAbs.$carpetaDatos."agenda_demandas_listadoHead.xml.php");
		define("_FILE_XML_DEMANDAS_LISTADO", $rutaAbsoluta.$rutaSystemAbs.$carpetaDatos."agenda_demandas_listadoResultado.xml.php");
		define("_FILE_XML_DEMANDAS", $rutaAbsoluta.$rutaSystemAbs.$carpetaDatos."agenda_demandas.xml.php");
		define("_FILE_XSL_DEMANDAS", $rutaSystema."agenda_demandas.xsl");
		define("_FILE_PHP_DEMANDAS", $rutaAbsoluta.$rutaSystemAbs."agenda_demandas.php");
		define("_FILE_PHP_DEMANDAS_EDIT", $rutaSystemAbs."agenda_demandas_edit.php");
		define("_FILE_XML_DEMANDAS_EDIT", $rutaAbsoluta.$rutaSystemAbs.$carpetaDatos."agenda_demandas_edit.xml.php");
		define("_FILE_XSL_DEMANDAS_EDIT", $rutaSystema."agenda_demandas_edit.xsl");
		//ABM
			define("_FILE_PHP_ABM_MENS_DEM", $rutaSystema."demandas_mensajes.php");	
			define("_FILE_PHP_ABM_DEM", $rutaSystema."php/abms/abm_dem.php");	
			
		//Citas
		define("_FILE_XML_AGENDA_CITAS", $rutaAbsoluta.$rutaSystemAbs.$carpetaDatos."agenda_citas.xml.php");
		define("_FILE_XSL_AGENDA_CITAS", $rutaSystema."agenda_citas.xsl");
		define("_FILE_PHP_AGENDA_CITAS", $rutaAbsoluta.$rutaSystemAbs."agenda_citas.php");
		define("_FILE_XML_AGENDA_CITAS_EDIT", $rutaAbsoluta.$rutaSystemAbs.$carpetaDatos."agenda_citas_edit.xml.php");
		define("_FILE_XSL_AGENDA_CITAS_EDIT", $rutaSystema."agenda_citas_edit.xsl");
		define("_FILE_PHP_AGENDA_CITAS_EDIT", $rutaAbsoluta.$rutaSystemAbs."agenda_citas_edit.php");
		define("_FILE_PHP_ABM_MENS_CITAS", $rutaSystema."citas_mensajes.php");	
		define("_FILE_PHP_ABM_CITAS", $rutaSystema."php/abms/abm_citas.php");	
			//listado
			define("_FILE_XML_CITAS_HEAD", $rutaAbsoluta.$rutaSystemAbs.$carpetaDatos."agenda_citas_listadoHead.xml.php");
			define("_FILE_XML_CITAS_LISTADO", $rutaAbsoluta.$rutaSystemAbs.$carpetaDatos."agenda_citas_listadoResultado.xml.php");
			//ABM
			define("FILE_CITAS_MEN_ABM",$rutaSystema."php/mensajes/citas_mens_abm.php");
			define("_FILE_PHP_ABM_CITAS",$rutaSystema."php/abms/abm_citas.php");
		//telefonos
		define("_FILE_XML_TEL_HEAD", $rutaAbsoluta.$rutaSystemAbs.$carpetaDatos."agenda_telefono_listadoHead.xml.php");
		define("_FILE_XML_TEL_LISTADO", $rutaAbsoluta.$rutaSystemAbs.$carpetaDatos."agenda_telefono_listadoResultado.xml.php");
		define("_FILE_XML_AGENDA_TEL_EDIT", $rutaAbsoluta.$rutaSystemAbs.$carpetaDatos."agenda_tels_edit.xml.php");
		define("_FILE_XSL_AGENDA_TEL_EDIT", $rutaSystema."agenda_tels_edit.xsl");
		define("_FILE_PHP_AGENDA_TEL_EDIT", $rutaAbsoluta.$rutaSystemAbs."agenda_tels_edit.php");
			//ABM
			define("_FILE_PHP_ABM_MENS_TELS", $rutaSystema."tel_mensajes.php");	
			define("_FILE_PHP_ABM_TELS", $rutaSystema."php/abms/abm_tels.php");	
		//carteles
		define("_FILE_XML_CART_HEAD", $rutaAbsoluta.$rutaSystemAbs.$carpetaDatos."agenda_carteles_listadoHead.xml.php");
		define("_FILE_XML_CART_LISTADO", $rutaAbsoluta.$rutaSystemAbs.$carpetaDatos."agenda_carteles_listadoResultado.xml.php");	
		define("_FILE_XML_AGENDA_CART_EDIT", $rutaAbsoluta.$rutaSystemAbs.$carpetaDatos."agenda_carts_edit.xml.php");
		define("_FILE_XSL_AGENDA_CART_EDIT", $rutaSystema."agenda_carts_edit.xsl");
		define("_FILE_PHP_AGENDA_CART_EDIT", $rutaAbsoluta.$rutaSystemAbs."agenda_carts_edit.php");
			//ABM
			define("_FILE_PHP_ABM_MENS_CARTS", $rutaSystema."cart_mensajes.php");	
			define("_FILE_PHP_ABM_CARTS", $rutaSystema."php/abms/abm_carts.php");	
		
		//tasaciones
		define("_FILE_XML_AGENDA_TAS", $rutaAbsoluta.$rutaSystemAbs.$carpetaDatos."agenda_tasaciones.xml.php");
		define("_FILE_XSL_AGENDA_TAS", $rutaSystema."agenda_tasaciones.xsl");
		define("_FILE_PHP_AGENDA_TAS", $rutaAbsoluta.$rutaSystemAbs."agenda_tasaciones.php");
		define("_FILE_XML_AGENDA_TAS_EDIT", $rutaAbsoluta.$rutaSystemAbs.$carpetaDatos."agenda_tasaciones_edit.xml.php");
		define("_FILE_XSL_AGENDA_TAS_EDIT", $rutaSystema."agenda_tasaciones_edit.xsl");
		define("_FILE_PHP_AGENDA_TAS_EDIT", $rutaAbsoluta.$rutaSystemAbs."agenda_tasaciones_edit.php");
		define("_FILE_XML_AGENDA_TAS_NEW", $rutaAbsoluta.$rutaSystemAbs.$carpetaDatos."agenda_tasaciones_new.xml.php");
		define("_FILE_XSL_AGENDA_TAS_NEW", $rutaSystema."agenda_tasaciones_new.xsl");
		define("_FILE_PHP_AGENDA_TAS_NEW", $rutaAbsoluta.$rutaSystemAbs."agenda_tasaciones_new.php");
		define("_FILE_PHP_ABM_MENS_TAS", $rutaSystema."mensajes.php");	
		define("_FILE_PHP_ABM_TAS", $rutaSystema."php/abms/abm_tas.php");	
		define("_FILE_PHP_FORM_TASACION", $rutaSystemAbs."form_tasacion.php");
		define("_FILE_XML_FORM_TASACION", $rutaAbsoluta.$rutaSystemAbs.$carpetaDatos."form_tasacion.xml.php");
		define("_FILE_XSL_FORM_TASACION", $rutaSystema."form_tasacion.xsl");
		define("_FILE_AGENDA_MEN_TAS_NEW", $rutaAbsoluta.$rutaSystemAbs."php/mensajes/agenda_tasacion_new.php");
			//listado
			define("_FILE_XML_TAS_HEAD", $rutaAbsoluta.$rutaSystemAbs.$carpetaDatos."agenda_tasaciones_listadoHead.xml.php");
			define("_FILE_XML_TAS_LISTADO", $rutaAbsoluta.$rutaSystemAbs.$carpetaDatos."agenda_tasaciones_listadoResultado.xml.php");

	//RESUMEN
		//datos
		define("_FILE_XML_RESUMEN_GENERAL", $rutaAbsoluta.$rutaSystemAbs.$carpetaDatos."agenda_resumen.xml.php");
		//principal
		define("_FILE_PHP_RESUMEN_PRINCIPAL", $rutaSystemAbs."agenda_resumen.php");
		define("_FILE_XSL_RESUMEN_PRINCIPAL", $rutaSystema."agenda_resumen.xsl");
		//menu formularios
		define("_FILE_XSL_RESUMEN_FORMULARIO", $rutaSystema."formularios/agenda_resumenFrom.xsl");

	//REDCIM
	define("_FILE_PHP_RED", $rutaSystemAbs."red_inmo.php");	
		//graficos
		define("_FILE_XML_RED_INMOBILIARIAS", $rutaAbsoluta.$rutaSystemAbs.$carpetaDatos."red_inmobiliarias.xml.php");
		define("_FILE_XSL_RED_INMOBILIARIAS", $rutaSystema."formularios/red_inmobiliarias.xsl");
	
	//INFORMES
	define("_FILE_XML_INF_HEAD", $rutaSystema.$carpetaDatos."inf_listadoHead.xml.php");
	define("_FILE_XML_INF_LISTADO", $rutaAbsoluta.$rutaSystemAbs.$carpetaDatos."inf_listadoResultado.xml.php");
	define("_FILE_XML_INF", $rutaAbsoluta.$rutaSystemAbs.$carpetaDatos."informes.xml.php");	

	define("_FILE_PHP_INF", $rutaAbsoluta.$rutaSystemAbs."inf_listado.php");
	//propiedades
	define("_FILE_XSL_INF_PRP", $rutaSystema."informes_prp.xsl");
	//propietarios	
	define("_FILE_XSL_INF_PROP", $rutaSystema."informes_prop.xsl");		
	//citas	
	define("_FILE_XSL_INF_CITAS", $rutaSystema."informes_citas.xsl");		
	//tasaciones
	define("_FILE_XSL_INF_TASA", $rutaSystema."informes_tasa.xsl");		
	define("_FILE_PHP_INF_LIST_TASA", $rutaSystemAbs."inf_list_tasa.php");
	define("_FILE_XSL_INF_LIST_TASA", $rutaSystema."inf_list_tasa.xsl");
	//demandas
	define("_FILE_XSL_INF_DEMANDAS", $rutaSystema."informes_demandas.xsl");	
	//demandas
	define("_FILE_XSL_INF_MEDIOS", $rutaSystema."informes_medios.xsl");	
	
	
	//graficos
	define("_FILE_XML_GRAF_DATOS", $rutaAbsoluta.$rutaSystemAbs.$carpetaDatos."inf_datos.xml.php");
	define("_FILE_XSL_GRAF_DATOS", $rutaSystema."inf_datos.xsl");
	define("_FILE_PHP_GRAF_DATOS", $rutaAbsoluta.$rutaSystemAbs."inf_graficos.php");

	//PANEL DE CONTROL
	
	define("_FILE_PHP_PANEL", $rutaSystemAbs."panel_control.php");
	define("_FILE_XSL_MENU_PANEL", $rutaSystema."panel_menu.xsl");
		//Parametros
		define("_FILE_XML_PANEL_PARAMETROS", $rutaAbsoluta.$rutaSystemAbs.$carpetaDatos."panel_parametros.xml.php");
		define("_FILE_XSL_PANEL_PARAMETROS", $rutaSystema."panel_parametros.xsl");
		define("_FILE_PHP_ABM_MENS_PARAMETROS", $rutaSystema."parametros_mensajes.php");
		define("_FILE_PHP_ABM_PARAMETROS", $rutaSystema."php/abms/abm_parametros.php");
		
		//rubros
		define("_FILE_FORM_PANEL_RUBROS",$rutaSystemAbs."formularios/panel_rubros.php");
		define("_FILE_XML_PANEL_RUBROS", $rutaAbsoluta.$rutaSystemAbs.$carpetaDatos."panel_rubros.xml.php");
		define("_FILE_XSL_PANEL_RUBROS_FORMULARIO", $rutaSystema."formularios/panel_rubrosForm.xsl");
		define("_FILE_XML_CONTROL_RUBROS_NEW", $rutaAbsoluta.$rutaSystemAbs.$carpetaDatos."control_rubros_new.xml.php");
		define("_FILE_XSL_CONTROL_RUBROS_NEW", $rutaSystema."control_rubros_new.xsl");
		define("_FILE_PHP_CONTROL_RUBROS_NEW", $rutaAbsoluta.$rutaSystemAbs."control_rubros_new.php");
		define("_FILE_PHP_ABM_MENS_RUBROS", $rutaSystema."rubros_mensajes.php");	
		define("_FILE_PHP_ABM_RUBROS", $rutaSystema."php/abms/abm_rubros.php");	
		define("_FILE_XML_CONTROL_RUBROS_EDIT", $rutaAbsoluta.$rutaSystemAbs.$carpetaDatos."control_rubros_edit.xml.php");
		define("_FILE_XSL_CONTROL_RUBROS_EDIT", $rutaSystema."control_rubros_edit.xsl");
		define("_FILE_PHP_CONTROL_RUBROS_EDIT", $rutaAbsoluta.$rutaSystemAbs."control_rubros_edit.php");
		
		
		//Medios Publicitarios
		define("_FILE_XML_CONTROL_MEDIOS_EDIT", $rutaAbsoluta.$rutaSystemAbs.$carpetaDatos."control_medios_edit.xml.php");
		define("_FILE_XSL_CONTROL_MEDIOS_EDIT", $rutaSystema."control_medios_edit.xsl");
		define("_FILE_PHP_CONTROL_MEDIOS_EDIT", $rutaAbsoluta.$rutaSystemAbs."control_medios_edit.php");
		define("_FILE_XML_CONTROL_MEDIOS_NEW", $rutaAbsoluta.$rutaSystemAbs.$carpetaDatos."control_medios_new.xml.php");
		define("_FILE_XSL_CONTROL_MEDIOS_NEW", $rutaSystema."control_medios_new.xsl");
		define("_FILE_PHP_CONTROL_MEDIOS_NEW", $rutaAbsoluta.$rutaSystemAbs."control_medios_new.php");
		define("_FILE_PHP_ABM_MENS_MEDIOS", $rutaSystema."medios_mensajes.php");	
		define("_FILE_PHP_ABM_MEDIOS", $rutaSystema."php/abms/abm_medios.php");	
		define("_FILE_CONTROL_MEN_MEDIOS_NEW", $rutaAbsoluta.$rutaSystemAbs."php/mensajes/control_medios_new.php");
		define("_FILE_XML_PANEL_MEDIOSPUBLICITARIOS", $rutaAbsoluta.$rutaSystemAbs.$carpetaDatos."panel_medios.xml.php");
		define("_FILE_XSL_PANEL_MEDIOSPUBLICITARIOS_FORMULARIO", $rutaSystema."formularios/panel_mediosFrom.xsl");

		//Usuarios
		define("_FILE_XML_USUARIOS", $rutaAbsoluta.$rutaSystemAbs.$carpetaDatos."control_usuarios.xml.php");
		define("_FILE_XSL_USUARIOS", $rutaSystema."control_usuarios.xsl");
		define("_FILE_PHP_USUARIOS", $rutaSystemAbs."control_usuarios.php");
		define("_FILE_XML_USUARIOS_EDIT", $rutaAbsoluta.$rutaSystemAbs.$carpetaDatos."control_usuarios_edit.xml.php");
		define("_FILE_XSL_USUARIOS_EDIT", $rutaSystema."control_usuarios_edit.xsl");
		define("_FILE_PHP_USUARIOS_EDIT", $rutaSystemAbs."control_usuarios_edit.php");
		define("_FILE_XML_PANEL_USUARIOS", $rutaAbsoluta.$rutaSystemAbs.$carpetaDatos."panel_usuarios.xml.php");
		define("_FILE_XSL_PANEL_USUARIOS_FORMULARIO", $rutaSystema."formularios/panel_usuariosFrom.xsl");
		define("_FILE_PHP_ABM_USUARIOS", $rutaSystema."php/abms/abm_usr.php");	
		define("_FILE_PHP_ABM_MENS_USUARIOS", $rutaSystema."usuarios_mensajes.php");	

		//referentes en internet
		define("_FILE_PHP_EMP_PUBLICAR", $rutaSystemAbs."formularios/control_emp_publicar.php");
		define("_FILE_XML_ACTUALIZADOR_EMP",$rutaAbsoluta.$rutaSystemAbs.$carpetaDatos."actualizador_emp.xml.php");
		define("_FILE_XSL_ACTUALIZADOR_EMP",$rutaSystema."formularios/actualizadorEmpForm.xsl");
		define("_FILE_EMP_DET", $rutaAbsoluta.$rutaSystemAbs."php/mensajes/emp_det.php");
		
		
		define("_FILE_XML_INMO", $rutaAbsoluta.$rutaSystemAbs.$carpetaDatos."control_inmo.xml.php");
		define("_FILE_XSL_INMO", $rutaSystema."control_inmo.xsl");
		define("_FILE_PHP_INMO", $rutaSystemAbs."control_inmo.php");
		define("_FILE_PHP_ABM_INMO", $rutaSystema."php/abms/abm_inmo.php");
		
		//sectores
		define("_FILE_FORM_PANEL_SECTORES",$rutaSystemAbs."formularios/panel_sectores.php");
		define("_FILE_XSL_PANEL_SECTORES_FORMULARIO", $rutaSystema."formularios/panel_sectoresForm.xsl");
		define("_FILE_XML_CONTROL_SECTORES", $rutaAbsoluta.$rutaSystemAbs.$carpetaDatos."control_sectores.xml.php");
		define("_FILE_XML_PANEL_SECTORES", $rutaAbsoluta.$rutaSystemAbs.$carpetaDatos."panel_sectores.xml.php");
		define("_FILE_XSL_CONTROL_SECTORES", $rutaSystema."control_sectores.xsl");
		define("_FILE_PHP_CONTROL_SECTORES", $rutaAbsoluta.$rutaSystemAbs."control_sectores.php");
		define("_FILE_PHP_ABM_SECTORES", $rutaSystema."php/abms/abm_sectores.php");
		
		
		define("_FILE_XML_CONTROL_RUBROS_NEW", $rutaAbsoluta.$rutaSystemAbs.$carpetaDatos."control_rubros_new.xml.php");
		
		
		define("_FILE_PHP_ABM_MENS_RUBROS", $rutaSystema."rubros_mensajes.php");	
		define("_FILE_PHP_ABM_RUBROS", $rutaSystema."php/abms/abm_rubros.php");	
		define("_FILE_XML_CONTROL_RUBROS_EDIT", $rutaAbsoluta.$rutaSystemAbs.$carpetaDatos."control_rubros_edit.xml.php");
		define("_FILE_XSL_CONTROL_RUBROS_EDIT", $rutaSystema."control_rubros_edit.xsl");
		define("_FILE_PHP_CONTROL_RUBROS_EDIT", $rutaAbsoluta.$rutaSystemAbs."control_rubros_edit.php");
		
		
		
		//Inmobiliaria
		
		
		//barrios privados
		define("_FILE_FORM_PANEL_BAR_PRIV",$rutaSystemAbs."formularios/panel_bar_priv.php");
		define("_FILE_XML_PANEL_BAR_PRIV", $rutaAbsoluta.$rutaSystemAbs.$carpetaDatos."panel_bar_priv.xml.php");
		define("_FILE_XSL_PANEL_BAR_PRIV_FORMULARIO", $rutaSystema."formularios/panel_bar_privForm.xsl");
		define("_FILE_XML_BAR_PRIV", $rutaAbsoluta.$rutaSystemAbs.$carpetaDatos."control_bar_priv.xml.php");
		define("_FILE_XSL_BAR_PRIV", $rutaSystema."control_bar_priv.xsl");
		define("_FILE_PHP_BAR_PRIV", $rutaSystemAbs."control_bar_priv.php");
		define("_FILE_XML_BAR_PRIV_DET", $rutaAbsoluta.$rutaSystemAbs.$carpetaDatos."control_bar_priv_det.xml.php");
		define("_FILE_XSL_BAR_PRIV_DET", $rutaSystema."control_bar_priv_det.xsl");		
		define("_FILE_PHP_BAR_PRIV_DET", $rutaSystemAbs."control_bar_priv_det.php");
		define("_FILE_PHP_ABM_BAR_PRIV", $rutaSystema."php/abms/abm_bar_priv.php");	
		define("_FILE_PHP_ABM_MENS_BAR_PRIV", $rutaSystema."mensajes.php");	
		
		//copia de seguridad
		define("_FILE_XML_BACKUP", $rutaAbsoluta.$rutaSystemAbs.$carpetaDatos."backup.xml.php");
		define("_FILE_XSL_HACER_BACKUP", $rutaSystema."hacer_backup.xsl");
		define("_FILE_XSL_RESTAURAR_BACKUP", $rutaSystema."restaurar_backup.xsl");
		define("_FILE_PHP_BACKUP", $rutaSystemAbs."backup.php");
		define("_FILE_PHP_ABM_BACKUP", $rutaSystema."php/abms/abm_backup.php");
		
		//barrios privados
		define("_FILE_PHP_BAR_PRIV_PUBLICAR", $rutaSystemAbs."formularios/control_bar_priv_publicar.php");
		define("_FILE_XML_ACTUALIZADOR_BAR_PRIV",$rutaAbsoluta.$rutaSystemAbs.$carpetaDatos."actualizador_bar_priv.xml.php");
		define("_FILE_XSL_ACTUALIZADOR_BAR_PRIV",$rutaSystema."formularios/actualizadorBarPrivForm.xsl");
		define("_FILE_BAR_PRIV_DET", $rutaAbsoluta.$rutaSystemAbs."php/mensajes/bar_priv_det.php");
		
		
	//ACTUALIZADOR
	define("_FILE_PHP_ACTUALIZADOR", $rutaSystemAbs."actualizador_pre.php");
		//datos
		define("_FILE_XML_ACTUALIZADOR_RESUMEN", $rutaAbsoluta.$rutaSystemAbs.$carpetaDatos."actualizador_resumen.xml.php");
		//formulario
		define("_FILE_XSL_ACTUALIZADOR_RESUMEN", $rutaSystema."formularios/actualizadorFrom.xsl");
		//ajavscript
		define("_FILE_JAVASCRIPT_ACTUALIZADOR", $rutaSystema."javascript/actualizador.php");
	
	//EXPORTACION
	define("_FILE_PHP_EXPORTACION", $rutaSystemAbs."php/exportar/exportar.php");
	
	//FUNCIONES DE IMAGENES
	define("_FILE_PHP_CLASS_UPLOAD", $rutaSystema."php/classes/class.upload.php");
	
	//FUNCION DE EMAIL
	define("_FILE_PHP_MAILER", $rutaSystema."php/classes/class.phpmailer.php");
	
	//FUNCION PARA RECORRER Y MANIPULAR DIRECTORIOS
	define("_FILE_PHP_DIR", $rutaSystema."php/classes/dir.php");
	
	
/************************************************************/
//	FORMULARIOS Y MENSAJES EMERGENTES DEL MENU PRINCIPAL	//
/************************************************************/

	//formularios
		//Propiedas
		define("_FILE_FORM_BUSCAR_PROPIEDADES", $rutaSystemAbs."formularios/prp_buscador.php");
		define("_FILE_FORM_BUSCAR_PROPIEDADES_AV", $rutaSystemAbs."formularios/prp_buscador_av.php");
		define("_FILE_FORM_PUBLICAR_PRP_WWW", $rutaSystemAbs."formularios/prp_publicar_www.php");
		define("_FILE_FORM_PUBLICAR_WWW", $rutaSystemAbs."formularios/www_publicar.php");
		define("_FILE_FORM_PRP_MEDIOS", $rutaSystemAbs."formularios/prp_medios.php");
		
		//Agenda
		define("_FILE_FORM_AGENDA_TELEFONOS", $rutaSystemAbs."formularios/agenda_telefonos.php");
		define("_FILE_FORM_AGENDA_NOVEDADES", $rutaSystemAbs."formularios/agenda_novedades.php");
		define("_FILE_FORM_AGENDA_TASACIONES", $rutaSystemAbs."formularios/agenda_tasaciones.php");
		define("_FILE_FORM_AGENDA_CITAS", $rutaSystemAbs."formularios/agenda_citas.php");
		define("_FILE_FORM_AGENDA_DEMANDAS", $rutaSystemAbs."formularios/agenda_demandas.php");
		define("_FILE_FORM_AGENDA_CARTELES", $rutaSystemAbs."formularios/agenda_carteles.php");
		//Web
		define("_FILE_FORM_WWW_CONF", $rutaSystemAbs."formularios/www_configurar.php");
		define("_FILE_FORM_WWW_PLANTILLAS", $rutaSystemAbs."formularios/www_plantillas.php");
		//INFORMES
			//propiedades
			
			
		define("_FILE_FORM_INF_VARIOS", $rutaSystemAbs."formularios/inf_varios.php");
		
		define("_FILE_FORM_INF_PROPIETARIOS", $rutaSystemAbs."formularios/inf_propietarios.php");
		define("_FILE_FORM_INF_CITAS", $rutaSystemAbs."formularios/inf_citas.php");
		define("_FILE_FORM_INF_DEMANDAS", $rutaSystemAbs."formularios/inf_demandas.php");
		define("_FILE_FORM_INF_TASACIONES", $rutaSystemAbs."formularios/inf_tasaciones.php");
		define("_FILE_FORM_INF_MEDIOS", $rutaSystemAbs."formularios/inf_medios.php");
		//Panel
		define("_FILE_FORM_PANEL_VARIOS", $rutaSystemAbs."formularios/panel_varios.php");
		define("_FILE_FORM_PANEL_INTERFAZ", $rutaSystemAbs."formularios/panel_interfaz.php");
		define("_FILE_FORM_PANEL_USUARIOS", $rutaSystemAbs."formularios/panel_usuarios.php");
		define("_FILE_FORM_PANEL_BACKUP", $rutaSystemAbs."formularios/panel_backup.php");
		define("_FILE_FORM_PANEL_EMAILS", $rutaSystemAbs."formularios/panel_emails.php");
		define("_FILE_FORM_PANEL_MEDIOS", $rutaSystemAbs."formularios/panel_medios.php");
		define("_FILE_FORM_PANEL_INMO", $rutaSystemAbs."formularios/panel_inmo.php");
		
	//MENSAJES DEL SISTEMA
		//Propiedades
		define("_FILE_PRP_MEN_WWW", $rutaAbsoluta.$rutaSystemAbs."php/mensajes/prp_www.php");
		define("_FILE_PRP_MEN_ABM", $rutaSystema."php/mensajes/prp_mens_abm.php");
		define("_FILE_PRP_PUBLICACIONES", $rutaAbsoluta.$rutaSystemAbs."php/mensajes/prp_publicaciones.php");
		define("_FILE_PRP_PROPIETARIOS", $rutaAbsoluta.$rutaSystemAbs."php/mensajes/prp_propietario_dato.php");
		define("_FILE_PRP_TASACION", $rutaAbsoluta.$rutaSystemAbs."php/mensajes/prp_tasacion_dato.php");
		define("_FILE_PRP_MEDIOS_ALTA", $rutaAbsoluta.$rutaSystemAbs."php/mensajes/prp_medios_alta.php");
		
		//Agenda
			//citas
			define("_FILE_AGENDA_MEN_CITA_NEW", $rutaAbsoluta.$rutaSystemAbs."php/mensajes/agenda_citas_new.php");
			define("_FILE_AGENDA_MEN_CITA_VER_INT", $rutaAbsoluta.$rutaSystemAbs."php/mensajes/agenda_citas_ver_int.php");
			define("_FILE_AGENDA_XSL_CITA_VER_INT",  $rutaSystema."php/mensajes/agenda_citas_int.xsl");
			define("_FILE_AGENDA_XML_CITA_VER_INT", $rutaAbsoluta.$rutaSystemAbs.$carpetaDatos."agenda_citas_int.xml.php");
			define("_FILE_AGENDA_MEN_CITA_INTERESADOS", $rutaAbsoluta.$rutaSystemAbs."php/mensajes/agenda_citas_interesados.php");
			//telefono
			define("_FILE_AGENDA_MEN_TELEFONO_NEW", $rutaAbsoluta.$rutaSystemAbs."php/mensajes/agenda_telefono_new.php");
			define("_FILE_AGENDA_MEN_TELEFONO_DATO", $rutaAbsoluta.$rutaSystemAbs."php/mensajes/agenda_telefono_dato.php");
			//novedades
			define("_FILE_AGENDA_MEN_NOVEDAD_NEW", $rutaAbsoluta.$rutaSystemAbs."php/mensajes/agenda_novedad_new.php");
			define("_FILE_AGENDA_DEMANDA", $rutaAbsoluta.$rutaSystemAbs."agenda_demanda.php");
			//Carteles
			define("_FILE_AGENDA_MEN_CARTELES_NEW", $rutaAbsoluta.$rutaSystemAbs."php/mensajes/agenda_carteles_new.php");
			define("_FILE_AGENDA_MEN_CARTELES_DATO", $rutaAbsoluta.$rutaSystemAbs."php/mensajes/agenda_carteles_dato.php");
			
		
		//Web
		define("_FILE_WWW_MEN_PUBLICAR", $rutaAbsoluta.$rutaSystemAbs."php/mensajes/www_www.php");
		
		//UTIL
		define("_FILE_UTIL_MEN", $rutaSystema."php/mensajes/util_mens.php");
		
		//varios
		
		define("_FILE_PHP_MEN_CALENDARIO", $rutaAbsoluta.$rutaSystemAbs."extra/calendario.php");
		define("_FILE_SWF_MEN_CALENDARIO", $rutaAbsoluta.$rutaSystemAbs."extra/calendario_form.php");
		define("_FILE_SWF_MEN_CALENDARIO", $rutaAbsoluta.$rutaSystemAbs."extra/calendario.swf");
		define("_FILE_PHP_MEN_PALETA", $rutaAbsoluta.$rutaSystemAbs."extra/paleta.php");
		define("_FILE_SWF_MEN_PALETA", $rutaAbsoluta.$rutaSystemAbs."extra/paleta.swf");

		//RED
		define("_FILE_RED_MEN_INMOBILIARIA", $rutaAbsoluta.$rutaSystemAbs."php/mensajes/red_inmobiliaria.php");
	
/*********************************/
//	SCRIPT Y RECURSOS VARIOS	//
/********************************/

	//varios javascript
	define("_FILE_JAVASCRIPT_SWF_OBJECT", $rutaSystema."javascript/swfobject.js");
	define("_FILE_JAVASCRIPT_TOOLTIP", $rutaSystema."javascript/toolTipBox.js");

	//generico menu extra
	define("_FILE_JAVASCRIPT_MENUEXTRA", $rutaSystema."javascript/mm_css_menu.js");
	define("_FILE_CSS_MENUEXTRA", $rutaInterfaz.$classTemplate."/css/menuExtra.css");

	//BANNER
	define("_FILE_XML_BANNER_PRINCIPAL", $rutaAbsoluta.$rutaSystemAbs.$carpetaDatos."bannerInferior.xml.php");
	define("_FILE_SWF_BANNER_PRINCIPAL", $rutaSystema."extra/bannerPrincipal.swf");
	
	
	//INTERFAZ INMO LOGO BANNER
	define("_FILE_SWF_LOGO_INMO", $rutaSystema."extra/logoInmo.swf");
	
	//varios script PHP
	define("_FILE_SCRIPT_PHP_SELECT", "php/funciones/camposSelect.php");
	define("_FILE_LIB_EDITOR", $rutaSystemAbs."editor.php");
	define("_FILE_PHP_VARIAS_FUN", "php/funciones/varias.php");
	define("_FILE_PHP_LOG", "php/funciones/log.php");
	define("_FILE_LOG_PHP", "log/php.log");
	define("_FILE_LOG_JAVASCRIPT", "log/javascript.log");
	
	// ajax
	define("_FILE_JAVASCRIPT_AJAX", $rutaSystema."javascript/ajax.js");
	// clase para ordenar una tabla html por columnas
	define("_FILE_JAVASCRIPT_SORTABLE", $rutaSystema."javascript/sorttable.js");
	
?>