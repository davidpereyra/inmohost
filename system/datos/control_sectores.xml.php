<?php 
	header("Content-type: application/xml");
	extract ($_GET);
	extract ($_REQUEST);
	include("../php/config.php");	
	echo "<?xml version=\"1.0\" encoding=\"iso-8859-1\" ?>";
	$xml=1;
	echo "<sectores>";
		
	if($mod_tip=="edit")
	{
		$cadena="select 	
						* 
					from 
						sectores
					where 
						sec_id=$sec_id
									";
			$result=mysql_query($cadena);			
			
			while ($fila=mysql_fetch_array($result)) {
					echo"
						<sec_id><![CDATA[$fila[sec_id]]]> </sec_id>
						<sec_desc><![CDATA[$fila[sec_desc]]]> </sec_desc>
						<etiqueta_org><![CDATA[$fila[etiqueta_org]]]> </etiqueta_org>";
					
					echo" <sec_mostrar><![CDATA[$fila[sec_mostrar]]]></sec_mostrar>
						";
			}
		
	}
	echo "</sectores>";
	
?>