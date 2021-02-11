<?php 
header("Content-type: application/xml");
	extract($_GET);
	extract ($_POST);
	extract ($_REQUEST);

echo "<?xml version=\"1.0\" encoding=\"iso-8859-1\" ?>";

	include("../php/config.php");
	
	$cadena="select 
					usuarios.*,
					localidades.loc_desc,
					provincias.pro_desc,
					count(prp_id) as cant 
			from 
					usuarios,
					localidades,
					provincias,
					propiedades
			where
				    usuarios.loc_id=localidades.loc_id and
				    usuarios.pro_id=provincias.pro_id and
				    usuarios.usr_id=propiedades.usr_id
		   group by
		   			usuarios.usr_id
				    
				    ";
	$result=mysql_query($cadena);
	echo "
<inmodb>";
	while ($fila=mysql_fetch_array($result)) {
		$cad="select * from red_cim_sol ";		
	
		echo "
			<usuarios>
				<usr_red>0</usr_red>
		        <usr_id><![CDATA[$fila[usr_id]]]></usr_id>
		        <usr_raz><![CDATA[$fila[usr_raz]]]></usr_raz>
		        <usr_titular><![CDATA[$fila[titular]]]></usr_titular>
				<usr_logo><![CDATA[]]></usr_logo>
		        <loc_des><![CDATA[$fila[loc_desc]]]></loc_des>
		        <pro_des><![CDATA[$fila[pro_desc]]]></pro_des>
		        <pai_des><![CDATA[$fila[pai_desc]]]></pai_des>
		        <usr_dom><![CDATA[$fila[usr_dom]]]></usr_dom>
		        <usr_tel><![CDATA[$fila[usr_tel]]]></usr_tel>
		        <usr_web><![CDATA[$fila[web]]]></usr_web>
		        <usr_mail><![CDATA[$fila[usr_mail]]]></usr_mail>
		        <usr_cim><![CDATA[$fila[usr_cim]]]></usr_cim>
		        <cant_inm><![CDATA[$fila[cant]]]></cant_inm>
		        
		    </usuarios>
	";
		
	}
	    
   echo"	
</inmodb>";

?>