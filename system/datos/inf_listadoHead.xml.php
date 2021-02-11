<?php 
header("Content-type: application/xml");

	extract($_GET);
	extract ($_POST);
	extract ($_REQUEST);


	include("../php/config.php");
echo "<?xml version=\"1.0\" encoding=\"iso-8859-1\" ?>";

switch ($tipo_inf){
	
	case "propiedades":
		
		echo '
		<inmodb>
				<cabezera>
					<head id="prp_mod" tamano="10" link=""><![CDATA[Modificaci&oacute;n]]></head>
					<head id="prp_id" tamano="10" link=""><![CDATA[ID]]></head>
					<head id="prp_dom" tamano="5" link=""><![CDATA[Domicilio]]></head>
					<head id="cond" tamano="10" link=""><![CDATA[Condicion]]></head>
					<head id="prp_pre" tamano="10" link=""><![CDATA[Precio]]></head>
					<head id="prp_llave" tamano="5" link=""><![CDATA[Llave]]></head>
					<head id="prp_tas" tamano="5" link=""><![CDATA[Tasacion]]></head>
					<head id="prp_alta" tamano="10" link=""><![CDATA[Ingreso]]></head>
					<head id="prp_referente" tamano="5" link=""><![CDATA[Referente]]></head>
					<head id="citas" tamano="10" link=""><![CDATA[Visitas]]></head>
				</cabezera>
		</inmodb>';
		
		break;
		
	case "propietarios":
		
		echo '
		<inmodb>
				<cabezera>
					<head id="prop_nombre" tamano="10" link=""><![CDATA[Nombre]]></head>
					<head id="prop_apellido" tamano="10" link=""><![CDATA[Apellido]]></head>
					<head id="prop_tel" tamano="5" link=""><![CDATA[Telefono]]></head>
					<head id="prop_dom" tamano="10" link=""><![CDATA[Domicilio]]></head>
					<head id="prop_mail" tamano="10" link=""><![CDATA[Email]]></head>
					<head id="prop_id" tamano="5" link=""><![CDATA[Inm.ID]]></head>
					
					
				</cabezera>
		</inmodb>';
		
	break;
	case "citas":
		
		echo '
		<inmodb>
				<cabezera>
					<head id="cita_fecha" tamano="10" link=""><![CDATA[Fecha]]></head>
					<head id="cita_hora" tamano="10" link=""><![CDATA[Hora]]></head>
					<head id="prp_id" tamano="5" link=""><![CDATA[Id. Inm]]></head>
					<head id="cita_desc" tamano="10" link=""><![CDATA[Deatlles]]></head>
					<head id="prp_pre" tamano="10" link=""><![CDATA[Precio]]></head>
					<head id="prp_llave" tamano="5" link=""><![CDATA[Nro LLave]]></head>
					<head id="prp_nota" tamano="5" link=""><![CDATA[Nota]]></head>
					<head id="monitor" tamano="5" link=""><![CDATA[Monitor]]></head>
					<head id="interesado" tamano="5" link=""><![CDATA[Interesado]]></head>
					<head id="estado" tamano="5" link=""><![CDATA[estado]]></head>
				</cabezera>
		</inmodb>';
		
	break;
	case "tasaciones":
		
		echo '
		<inmodb>
				<cabezera>
					<head id="tas_id" tamano="10" link=""><![CDATA[ID]]></head>
					<head id="tip_id" tamano="10" link=""><![CDATA[Tipo/Cond]]></head>
					<head id="precio_prop" tamano="5" link=""><![CDATA[Pre. Propuesto]]></head>
					<head id="precio_tas" tamano="10" link=""><![CDATA[Pre. Tasacion]]></head>
					<head id="precio_inmo" tamano="10" link=""><![CDATA[Pre. Propietario]]></head>
					<head id="propietario" tamano="5" link=""><![CDATA[Propietario]]></head>
					<head id="prop_tel" tamano="5" link=""><![CDATA[Telefono]]></head>
					<head id="referente" tamano="5" link=""><![CDATA[Referente]]></head>
					<head id="tas_fecha" tamano="5" link=""><![CDATA[Fecha]]></head>
					<head id="precio_transaccion" tamano="5" link=""><![CDATA[Valor Transaccion]]></head>
					<head id="Domicilio" tamano="5" link=""><![CDATA[Domicilio]]></head>
					<head id="Descripcion" tamano="5" link=""><![CDATA[Descripcion]]></head>
					<head id="Estado" tamano="5" link=""><![CDATA[estado]]></head>
				</cabezera>
		</inmodb>';
		case "demandas":
		
		echo '
		<inmodb>
				<cabezera>
					<head id="dem_id" tamano="2" link=""><![CDATA[ID]]></head>
					<head id="dem_fecha" tamano="5" link=""><![CDATA[Fecha]]></head>
					<head id="dem_raz" tamano="10" link=""><![CDATA[Interesado]]></head>
					<head id="dem_tel" tamano="10" link=""><![CDATA[Telefono]]></head>
					<head id="dem_mail" tamano="10" link=""><![CDATA[Mail]]></head>
					<head id="inmueble" tamano="5" link=""><![CDATA[Inmueble]]></head>
					<head id="condicion" tamano="5" link=""><![CDATA[Condicion]]></head>
					<head id="precio" tamano="15" link=""><![CDATA[Precio]]></head>
					<head id="dem_desc" tamano="20" link=""><![CDATA[Demanda]]></head>
					<head id="dem_dom" tamano="20" link=""><![CDATA[Domicilio]]></head>
					
				</cabezera>
		</inmodb>';
		
	break;
	case "medios":
		
		echo '
		<inmodb>
				<cabezera>
					<head id="pub_ini" tamano="2" link=""><![CDATA[Inicio]]></head>
					<head id="pub_fin" tamano="10" link=""><![CDATA[Fin]]></head>
					<head id="med_raz" tamano="10" link=""><![CDATA[Medio]]></head>
					<head id="prp_id" tamano="10" link=""><![CDATA[Prop ID]]></head>
					<head id="prp_dom" tamano="10" link=""><![CDATA[Domicilio]]></head>
					<head id="con_desc" tamano="10" link=""><![CDATA[En]]></head>
					
					
					
				</cabezera>
		</inmodb>';
		
	break;
	
}


?>