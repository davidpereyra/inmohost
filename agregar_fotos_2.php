<?
	
extract($_GET);
extract ($_POST);
extract ($_REQUEST);

$rutaSystema = "system/";
$rutaInterfaz = "interfaz/";
	
include ($rutaSystema."php/config.php");

$prp_id="";
//$cantidad_fotos=15;
print"Iniciando...<br>";
for ($j=12732;$j<=12800;$j++){
	$cantidad_fotos=mysql_result(mysql_query("select fotos from propiedades where prp_id=".$j." and usr_id=17"),0);
	print "<br>".$j." : cantidad fotos: ".$cantidad_fotos;
	//print "OK<br>Ingreso al 1er FOR<br>";
	for($i=1;$i<=$cantidad_fotos;$i++){
		//print "Ingreso al 2do FOR<br>";
		$consulta_fotos="insert into fotos values ('".$j."-17-".$i.".gif',".$j." ,17 ,".$i." , '')";
		//$consulta_propiedades="update propiedades set fotos=".$cantidad_fotos." where prp_id=".$j;
	
		mysql_query($consulta_fotos) or die('Error en FOTOS:'. mysql_error());
		print "<br>".$consulta_fotos.".....OK";

		//mysql_query($consulta_propiedades) or die('Error en PROPIEDADES:'. mysql_error());
 		//print $consulta_propiedades.".....OK<br>";

	}//fin for 
}//fin for

?>
