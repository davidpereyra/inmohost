<?php
extract($_GET);
extract ($_POST);
extract ($_REQUEST);

$rutaSystema = "system/";
$rutaInterfaz = "interfaz/";
	
include ($rutaSystema."php/config.php");

//****************************************************************************************
//CONECTAR CON COCUCCI.COM.AR PARA HACER LOS CAMBIOS
$HOST="www.cocucci.com.ar";     
$USUARIO="cocucci";
$PASSWORD="deko321nalga";
$BASE_DATOS="cocucci_dev";
$db_cocucci=mysql_connect($HOST,$USUARIO,$PASSWORD);
mysql_select_db($BASE_DATOS,$db_cocucci);
mysql_query("SET CHARACTER SET latin1");
mysql_query("SET NAMES latin1");
//****************************************************************************************

$prp_id="";
$update="";
$contador=0;
print"Iniciando...<br>";

for ($j=13290;$j<=16960;$j++){
	$consulta = "select prp_mostrar, publica, mos_por_1,mos_por_2,mos_por_3,mos_por_4,prp_anonimo,prp_pre,prp_pre_dol,prp_desc,bar_priv_id,fotos from propiedades where prp_id=".$j." and usr_id=17";
	echo "<br><br>".$consulta;
	$rs_consulta=mysql_query($consulta,$db);

	if (mysql_num_rows($rs_consulta)){
	
		$fila = mysql_fetch_array($rs_consulta); 

		if ($fila['bar_priv_id']>0){
			$bar_priv_id=1;	
		}else{
			$bar_priv_id=0;	
		}
	
		$update="update propiedades set 
										prp_mostrar=".$fila['prp_mostrar'].", 
										publica=".$fila['publica'].",
										mos_por_1=".$fila['mos_por_1'].", 
										mos_por_2=".$fila['mos_por_2'].", 
										mos_por_3=".$fila['mos_por_3'].", 
										mos_por_4=".$fila['mos_por_4'].", 
										prp_anonimo=".$fila['prp_anonimo'].", 
										prp_pre='".$fila['prp_pre']."', 
										prp_pre_dol='".$fila['prp_pre_dol']."', 
										prp_desc='".$fila['prp_desc']."', 
										bar_priv_id=".$bar_priv_id.", 
										fotos=".$fila['fotos']."
				where 
										prp_id=".$j." and 
										usr_id=17
				";
		
		print "<br>update propiedades set prp_mostrar=".$fila['prp_mostrar'].", publica=".$fila['publica'].", mos_por_1=".$fila['mos_por_1'].", mos_por_2=".$fila['mos_por_2'].", mos_por_3=".$fila['mos_por_3'].", mos_por_4=".$fila['mos_por_4'].", prp_anonimo=".$fila['prp_anonimo'].", prp_pre='".$fila['prp_pre']."', prp_pre_dol='".$fila['prp_pre_dol']."', bar_priv_id=".$bar_priv_id.", fotos=".$fila['fotos']." where prp_id=".$j." and usr_id=17; .....OK";
		
		mysql_query($update,$db_cocucci) or die('Error en Cocucci Web:'.mysql_error());
		$contador++;
	}
}//fin for

print"<br><br>Finalizado... ".$contador." propiedades actualizadas.";

mysql_close($db);

mysql_close($db_cocucci);

?>