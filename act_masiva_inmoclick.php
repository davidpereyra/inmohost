<?php
extract($_GET);
extract ($_POST);
extract ($_REQUEST);

$rutaSystema = "system/";
$rutaInterfaz = "interfaz/";
	
include ($rutaSystema."php/config.php");

$HOST="www.inmoclick.com.ar";     
$USUARIO="inmoclick_root";
$PASSWORD="uv0282-*";
$BASE_DATOS="inmoclick_database";
$db_inmoclick=mysql_connect($HOST,$USUARIO,$PASSWORD);
mysql_select_db($BASE_DATOS,$db_inmoclick);
mysql_query("SET CHARACTER SET latin1");
mysql_query("SET NAMES latin1");

$prp_id="";
print"ID de conexion: ".$db_inmoclick."...<br>";

for ($j=9000;$j<=14000;$j++){
		$consulta = "select prp_mostrar,prp_pre,prp_pre_dol from propiedades where prp_id=".$j." and usr_id=17";
	
		$rs_consulta=mysql_query($consulta,$db);

		if (mysql_num_rows($rs_consulta)){

			$fila = mysql_fetch_array($rs_consulta); 
	
			$update="update propiedades set prp_mostrar=".$fila['prp_mostrar'].", prp_pre='".$fila['prp_pre']."', prp_pre_dol='".$fila['prp_pre_dol']."' where prp_id=".$j." and usr_id=17";
		
			print "<br>update propiedades set prp_mostrar=".$fila['prp_mostrar'].", prp_pre='".$fila['prp_pre']."', prp_pre_dol='".$fila['prp_pre_dol']."' where prp_id=".$j." and usr_id=17; .....OK";
		
			mysql_query($update,$db_inmoclick) or die('Error en Cocucci Web:'.mysql_error());

		}	
}
mysql_close($db);
print"<br><br>Finalizado.";

?>