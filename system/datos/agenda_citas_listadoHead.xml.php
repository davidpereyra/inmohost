<?php 
header("Content-type: application/xml");

	extract($_GET);
	extract ($_POST);
	extract ($_REQUEST);


	include("../php/config.php");
echo "<?xml version=\"1.0\" encoding=\"iso-8859-1\" ?>";
echo '
<inmodb>
		<cabezera>
			<head id="cita_id" tamano="0" link=""><![CDATA[Cita_id]]></head>	
			<head id="cita_fecha" tamano="4" link=""><![CDATA[Fecha]]></head>
			<head id="cita_hora" tamano="4" link=""><![CDATA[Hora]]></head>
			<head id="prp_id" tamano="4" link=""><![CDATA[ID]]></head>
			<head id="prp_desc" tamano="18" link=""><![CDATA[Detalle]]></head>
			<head id="prp_pre" tamano="6" link=""><![CDATA[precio]]></head>
			<head id="prp_llave" tamano="4" link=""><![CDATA[llave]]></head>
			<head id="cita_nota" tamano="25" link=""><![CDATA[Nota]]></head>
			<head id="cita_mon" tamano="7" link=""><![CDATA[Monitor]]></head>
			<!--head id="cita_int" tamano="10" link=""><![CDATA[Interesado]]></head-->
			<!--head id="cita_est" tamano="5" link=""><![CDATA[Estado]]></head-->
			<head id="cita_edit" tamano="3" link=""><![CDATA[Editar]]></head>
			<head id="cita_del" tamano="3" link=""><![CDATA[Elim.]]></head>
		</cabezera>
</inmodb>';

?>