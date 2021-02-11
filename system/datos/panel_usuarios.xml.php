<?php 
header("Content-type: application/xml");

	extract ($_GET);
	extract ($_REQUEST);
	
	include("../php/config.php");	
echo "<?xml version=\"1.0\" encoding=\"iso-8859-1\" ?>";


echo "
<inmodb>";

	$cadena="select * from empleados";
	$res=mysql_query($cadena);
	
	while ($fila=mysql_fetch_array($res)) {
		
		echo "<empleados>
				<emp_id>$fila[emp_id]</emp_id>
				<usr_login>$fila[usr_login]</usr_login>
		        <nombre>$fila[nombre] $fila[apellido]</nombre>
		        <priv_id>$fila[priv_id]</priv_id>
		        <usr_tpo>$fila[usr_tpo]</usr_tpo>
	  		</empleados>
		";	
	
	
	}
	echo"</inmodb>";
	
?>
