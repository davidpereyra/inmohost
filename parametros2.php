<?php
//*********************CONEXION A LA BASE DE DATOS************************************
$HOST_NERON= "localhost";     
$USUARIO_NERON="inmo";
$PASSWORD_NERON="inmo";
$BASE_DATOS_NERON="inmodb";


//******************************  FTP  *********************************************
$ftp_server = "190.183.61.37";
$ftp_usr = "tasainmu";
$ftp_psw = "G[0Vmo3xb79ZW:";
$destino = "/domains/tasainmuebles.com/public_html/dash/fotos/";
$destino2 = "/domains/tasainmuebles.com/public_html/dash/docs/";
/*
$ftp_server = "www.cocucci.com.ar";//"185.214.126.124";
$ftp_usr = "cocucci";//"u808822254.tasainmuebles";
$ftp_psw = "deko321nalga";//"HmOwuBZo";
$destino = "dash/fotos/";
$destino2 = "dash/docs/";
*/
$ftp_usr1 = "ftp_inmohost@cocucci.com.ar";//"u808822254.tasainmuebles";
$ftp_psw1 = "Socrate5";//"HmOwuBZo";


//******************************  RUTAS  *********************************************
$IMAGES="./images";
$SCRIPT="./script";
//$INICIO="http://www.inmoclick.com.ar";

//************************************************************************************

//*********************************POSICIONAMIENTO DE LAS CAPAS***********************
$width_esp_izq="0px";
$width_esp_der="0px";
$height_esp_top="200px";

$height_sub_menu="15"; //espacion entre submenues

$top_capa_inf=63;
$left_capa_inf=0;
$left_capa_sup="0px";
$top_capa_sup="0px";

$width_capas="770px";
$width_celda_sub0="96px";
$width_celda_sub1="120px";
$width_celda_sub2="140px";
$width_celda_menu="60px";

$height_celda_sub0="20px";


$top_menu0="141px";
$top_menu1="141px";
$top_menu2="141px";
$top_menu3="141px";
$top_menu4="141px";
$top_menu5="141px";
$top_menu6="141px";

$left_menu[0]=145;
for($i=1;$i<=6;$i++){
	$left_menu[$i]=$left_menu[$i-1] + 102;
	$left_menu[$i].="px";
}
$left_menu[0].="px";

$c1="#4792e6";
$c2="#FFFFFF";
$c3="#FFFFFF";
$c4="#777777";

//********************************************************************************
/*$ip_loc=mysql_query("select ses_ip from sesiones where usr_login='$usuario'") or die("murio");	
if(mysql_num_rows($ip_loc)){
	$ip_loc=mysql_result($ip_loc,0,0);
	$ip_loc=split("/",$ip_loc);
	$ip_local=$ip_loc[0];
}
*/
$CANT_HORAS=24;
$CANT_MINUTOS=60;
$valor_expiracion=mktime(date("G")+1,date("i"),date("s"),date("d"),date("m"),date("y"));
$array_exp=getdate($valor_expiracion);
$hora_expiracion=$array_exp['hours'].":".$array_exp['minutes'].":".$array_exp['seconds'];
$array_fecha=getdate();
$fecha_exp=$array_fecha['year']."-".$array_fecha['mon']."-".$array_fecha['mday'];
$array_esp=getdate(mktime(date("G")+1,date("i")+4,date("s"),date("d"),date("m"),date("y")));
$hora_espera=$array_esp['hours'].":".$array_esp['minutes'].":".$array_esp['seconds'];

//*********************TABLAS DE LA BASE DE DATOS***************************************************
$propiedades="propiedades";
$tasaciones="tasaciones";
$cambios="cambios";
$cita_emp="cita_emp";
$citas="citas";
$condiciones="condiciones";
$demanda="demandas";
$diarios="diarios";
$empleados="empleados";
$foto1="foto1";
$foto2="foto2";
$foto3="foto3";
$foto4="foto4";
$foto5="foto5";
$foto6="foto6";
$foto360="foto360";
$int_x_cita="int_x_cita";
$interesados="interesados";
$localidades="localidades";
$mensajes="mensajes";
$menu="menu";
$notas="notas";
$noticias="noticias";
$novedades="novedades";
$orientacion="orientacion";
$pais="pais";
$permitidos="permitidos";
$personaliz="personaliz";
$profesionales="profesionales";
$prop_x_prp="prop_x_prp";
$propietarios="propietarios";
$provincias="provincias";
$publicaciones="publicaciones";
$rubros="rubros";
$ser_x_dem="ser_x_dem_ihost";
$ser_x_prp="ser_x_prp_ihost";
$ser_x_tipo_const="ser_x_tipo_const";
$servicios="servicios_ihost";
$ser_tipo_const="ser_tipo_const";
$ser_selectores="ser_selectores";
$tarifas="tarifas";
$tasaciones="tasaciones";
$tipo_const="tipo_const";
$usr_online="usr_online";
$usuarios="usuarios";
$users="users";
$receptores="receptores";
$sesiones="sesiones";
$privilegios="privilegios";
$cambios_pagina="cambios_pagina";
$parametros="parametros";
$bar_priv="bar_priv";
$fotos_x_bar="fotos_x_bar";


//************************************ MENSAJES DE ERROR ********************************************
//**Errores de consultas**
$err_1000="No se modific�.";
$err_1001="Consulta Inv�lida.";
$err_1002="No verifica.";
$err_1003="No se carg� la cita.";
$err_1004="No se carg� la novedad.";
$err_1005="No se ingres� la demanda.";
$err_1006="Localidad sin acceso.";
$err_1007="No se muestra.";
$err_1008="No se agreg� a la Base de Datos.";
$err_1009="No se pudieron guardar los cambios.";
$err_1010="";
?>
