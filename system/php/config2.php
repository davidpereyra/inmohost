<?php
	
	extract($_GET);
	extract ($_POST);
	extract ($_REQUEST);
	$usr_id=17;

	/*
	$dir = explode("/", $_SERVER['PHP_SELF']);
	$dirFull = "";
	for ($a=1; $a<(count($dir)-1); $a++){
		$dirFull .= $dir[$a]."/";
	}
	*/
	//Conexion
	include("conexion.php");
	// relativas
	if(!isset($rutaSystema)) $rutaSystema = "./";
	if(!isset($rutaInterfaz)) $rutaInterfaz = "../interfaz/";


	$limit_a_inf=abs(ip2long("10.0.0.0"));
	$limit_a_sup=abs(ip2long("10.255.255.255"));
	$limit_b_inf=abs(ip2long("172.16.0.0"));
	$limit_b_sup=abs(ip2long("172.31.255.255"));
	$limit_c_inf=abs(ip2long("192.168.0.0"));
	$limit_c_sup=abs(ip2long("192.168.255.255"));
	$limit_localhost=abs(ip2long("127.0.0.1"));
	$nip=abs(ip2long($_SERVER['REMOTE_ADDR']));
	
	// absolutas
	// Si entra x internet cambio la ruta absoluta
	$con_ip=substr($_SERVER['REMOTE_ADDR'],0,3);
	if ($_SERVER['REMOTE_ADDR']="192.168.0.26"){
		$con_ip="190";
	}
	$dominio_local=@mysql_result(mysql_query("select valor from parametros where nom_var='dominio_local'"),0,0);	

	//echo "REMOTE_ADDR: ".$_SERVER['REMOTE_ADDR']."<br>dominio_local: ".$dominio_local."<br> con_ip: ".$con_ip."<br>accesoRemoto: ".ACCESO_REMOTO;

	if (ACCESO_REMOTO)//($con_ip!="192"&&$con_ip!="127")
	//if (($nip<$limit_a_inf&&$nip>$limit_a_sup)||($nip<$limit_b_inf&&$nip>$limit_b_sup)||($nip<$limit_c_inf&&$nip>$limit_c_sup)||($nip!=$limit_localhost))
	{
		echo "<br>ENTRO DESDE INTERNET";
		$internet=1;
//||strpos($_SERVER['PHP_SELF'],"agenda_novedades_listado_head")||strpos($_SERVER['PHP_SELF'],"agenda_tasaciones_listado_head")||strpos($_SERVER['PHP_SELF'],"agenda_demanda_listado_head")||strpos($_SERVER['PHP_SELF'],"agenda_telefono_listado_head")
		if (strpos($_SERVER['PHP_SELF'],"login")||strpos($_SERVER['PHP_SELF'],"prp_listado")||strpos($_SERVER['PHP_SELF'],"imagen.php")||strpos($_SERVER['PHP_SELF'],"generico_listados.php")||strpos($_SERVER['PHP_SELF'],"/formularios/agenda_tasaciones.php")||strpos($_SERVER['PHP_SELF'],"/formularios/agenda_citas.php")||strpos($_SERVER['PHP_SELF'],"/formularios/agenda_demandas.php")||strpos($_SERVER['PHP_SELF'],"/formularios/agenda_novedades.php")||strpos($_SERVER['PHP_SELF'],"/formularios/agenda_telefonos.php")||strpos($_SERVER['PHP_SELF'],"generico_html.php")||strpos($_SERVER['PHP_SELF'],"fichaFotos.xml.php")||strpos($_SERVER['PHP_SELF'],"agenda_resumen.php")||strpos($_SERVER['PHP_SELF'],"actualizar_usrs_5.php"))
		{
			if (!isset($rutaAbsoluta)) $rutaAbsoluta = "http://".$dominio_local."/inmohostV2.0/";
		}
		else
		{
			if (!isset($rutaAbsoluta)) $rutaAbsoluta = "http://localhost/inmohostV2.0/";
		}
		$rutaAbsolutaFichaFoto="http://".$dominio_local."/inmohostV2.0/";

	}
	else
	{
		$internet=0;
		if (!isset($rutaAbsoluta)) $rutaAbsoluta = "http://".$_SERVER['HTTP_HOST']."/inmohostV2.0/";
		$rutaAbsolutaFichaFoto="http://".$_SERVER['HTTP_HOST']."/inmohostV2.0/";

	}
echo "<br>rutaAbsoluta: ".$rutaAbsoluta;
	if(!isset($rutaSystemAbs)) $rutaSystemAbs = "system/";
	if(!isset($rutaInterfazAbs)) $rutaInterfazAbs = "interfaz/";
	$FOTOS=@mysql_result(mysql_query("select valor from parametros where nom_var='fotos'"),0,0);
	$PROV_DEFAULT=@mysql_result(mysql_query("select valor from parametros where nom_var='prov_default'"),0,0);//############
	$PAIS_DEFAULT=@mysql_result(mysql_query("select valor from parametros where nom_var='pais_default'"),0,0);//############
	$INTERNET_HOST=mysql_result(mysql_query("select valor from parametros where nom_var='internet_host'"),0,0);
	$INTERNET_USR=mysql_result(mysql_query("select valor from parametros where nom_var='internet_usr'"),0,0);
	$INTERNET_PASS=mysql_result(mysql_query("select valor from parametros where nom_var='internet_pass'"),0,0);
	$INTERNET_DIR=mysql_result(mysql_query("select valor from parametros where nom_var='internet_dir'"),0,0);
	$MAIL_USR=mysql_result(mysql_query("select valor from parametros where nom_var='mail_usr'"),0,0);
	$MAIL_PASS=mysql_result(mysql_query("select valor from parametros where nom_var='mail_pass'"),0,0);
	$MAIL_SMTP=mysql_result(mysql_query("select valor from parametros where nom_var='mail_smtp'"),0,0);
	$MAIL_POP=mysql_result(mysql_query("select valor from parametros where nom_var='mail_pop'"),0,0);

	$_INMO_COLOR1 = "FF6600"; // sin numeral
	$_INMO_COLOR2 = "000000"; // sin numeral
	
	$classTemplate = "inmohost";

	define ("_NOW",date("Y-m-d H:i:s"));//ahora
	//include
	include("configArchivos.php");
	include("configInmo.php");

?>