<?php 
header("Content-type: application/xml");

	extract($_GET);
	extract ($_POST);
	extract ($_REQUEST);


	include("../php/config.php");
if ($inmo_id!=$usr_id)
{
	$cita=0;
}
else 
{
	$cita=1;
}
echo "<?xml version=\"1.0\" encoding=\"iso-8859-1\" ?>";
if ($mod_edit!='mod_del')
{
	echo '
	<inmodb>
			<cabezera>
				<head id="prp_id" tamano="5" link=""><![CDATA[ID]]></head>
				<head id="prp_tip" tamano="15" link=""><![CDATA[Tipo]]></head>
				<head id="prp_con" tamano="15" link=""><![CDATA[Condici&oacute;n]]></head>
				<head id="prp_dom" tamano="30" link=""><![CDATA[Domicilio]]></head>
				<head id="prp_pes" tamano="5" link=""><![CDATA[Pesos]]></head>
				<head id="prp_dol" tamano="5" link=""><![CDATA[Dolares]]></head>
				<head id="prp_llave" tamano="5" link=""><![CDATA[Llave]]></head>
				<head id="prp_inmo" tamano="10" link="inmo"><![CDATA[Inmobiliar&iacute;a]]></head>
				<head id="prp_inmoID" tamano="0" link="inmo"><![CDATA[]]></head>
				<head id="prp_citas" tamano="5" link="inmo"><![CDATA[Citas]]></head>
				<head id="prp_ficha" tamano="5" link="inmo"><![CDATA[Ficha]]></head>
			</cabezera>
	</inmodb>';
}
else 
{
	echo '
	<inmodb>
			<cabezera>
				<head id="prp_id" tamano="5" link=""><![CDATA[ID]]></head>
				<head id="prp_tip" tamano="15" link=""><![CDATA[Tipo]]></head>
				<head id="prp_con" tamano="15" link=""><![CDATA[Condici&oacute;n]]></head>
				<head id="prp_dom" tamano="30" link=""><![CDATA[Domicilio]]></head>
				<head id="prp_mos" tamano="5" link=""><![CDATA[Mostrar]]></head>
				<head id="prp_vend" tamano="5" link=""><![CDATA[Vendida/Alquilada]]></head>
				<head id="prp_susp" tamano="5" link=""><![CDATA[Suspendida]]></head>
				<head id="prp_elim" tamano="10" link="inmo"><![CDATA[Eliminar]]></head>
				<head id="prp_ficha" tamano="5" link="inmo"><![CDATA[Ficha]]></head>
			</cabezera>
	</inmodb>';
}


?>