<?php
extract($_GET);
extract ($_POST);
extract ($_REQUEST);

$rutaSystema = "system/";
$rutaInterfaz = "interfaz/";
	
include ($rutaSystema."php/config.php");

//****************************************************************************************
//CONECTAR CON COCUCCI.COM.AR PARA HACER LOS CAMBIOS
$HOST="190.7.56.34";//"190.183.61.37";//"www.cocucci.com.ar";     
$USUARIO="cocucci";
$PASSWORD="deko321nalga";
$BASE_DATOS="cocucci_web";
$db_cocucci=mysql_connect($HOST,$USUARIO,$PASSWORD);
mysql_select_db($BASE_DATOS,$db_cocucci);
mysql_query("SET CHARACTER SET latin1");
mysql_query("SET NAMES latin1");
//****************************************************************************************

$prp_id="";
$sql="";
$contador=0;
print"Propiedades en Inmohost pero NO en Internet:<br>";


for ($j=14000;$j<=16400;$j++){
	$consulta = "select prp_mostrar,prp_pre,prp_pre_dol,prp_desc,bar_priv_id from propiedades where prp_id=".$j." and usr_id=17 and prp_mostrar=1 and publica=1";
	
	$rs_consulta=mysql_query($consulta,$db);

	if (mysql_num_rows($rs_consulta)){
	
		$fila = mysql_fetch_array($rs_consulta); 
	
		$sql="select prp_id, prp_mostrar from propiedades where prp_id=".$j." and usr_id=17";
		
		$res=mysql_query($sql,$db_cocucci) or die('Error en Cocucci Web:'.mysql_error());

		if(!(mysql_num_rows($res))){
				print "<br>Falta el ID: ".$j;
		}

		$contador++;
	}
}//fin for

/*
print"<br><br>Finalizado... ".$contador." propiedades revisadas.";

//**********************************************************************************************
$prp_id="";
$sql="";
$contador=0;
print"<br><br>Propiedades en Internet pero NO en Inmohost:<br>";


for ($i=7000;$i<=16400;$i++){
	
	$sql="select prp_id, prp_mostrar from propiedades where prp_id=".$i." and usr_id=17 and publica=1 and prp_mostrar=1";

	$res=mysql_query($sql,$db_cocucci) or die('Error en Inmohost:'.mysql_error());

	if (mysql_num_rows($res)){
	
		//$fila = mysql_fetch_assoc($res);

		$consulta = "select prp_mostrar,prp_pre,prp_pre_dol,prp_desc,bar_priv_id from propiedades where prp_id=".$i." and usr_id=17 and prp_mostrar=1 and publica=1";
	
		$rs_consulta=mysql_query($consulta,$db) or die('Error en Inmohost:'.mysql_error());

		if(!(mysql_num_rows($rs_consulta) ) ){
				print "<br>Falta el ID: ".$i."";// - prp_mostrar: ".$fila[prp_mostrar];
		}

		$contador++;
		//echo " - ".$contador."(".$i.")<br>"; //voy mostrando las que coinciden y se revisan
	}
}//fin for
*/
print"<br><br>Finalizado... ".$contador." propiedades revisadas.";

mysql_close($db);

mysql_close($db_cocucci);

?>