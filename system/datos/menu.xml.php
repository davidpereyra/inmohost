<?php 
header("Content-type: application/xml");
echo "<?xml version=\"1.0\" encoding=\"iso-8859-1\" ?>";

	include("../php/config.php");

	extract($_GET);
	extract ($_POST);
	extract ($_REQUEST);


// Si ingresa por internet cambio la ruta de resumen general
function getUserIP()
{
    $client  = @$_SERVER['HTTP_CLIENT_IP'];
    $forward = @$_SERVER['HTTP_X_FORWARDED_FOR'];
    $remote  = $_SERVER['REMOTE_ADDR'];

    if(filter_var($client, FILTER_VALIDATE_IP)){$ip = $client;}
    elseif(filter_var($forward, FILTER_VALIDATE_IP)){$ip = $forward;}
    else{$ip = $remote;}

    return $ip;
}

$ip = getUserIP();

if ($ip!="192.168.0.22"){
	//$ip="ENTRO:".$ip;
	//$xml_inf="http://190.15.195.119/inmohostV2.0/".$rutaSystemAbs.$carpetaDatos."informes.xml.php";	
	$xml_inf= $rutaAbsoluta.$rutaSystemAbs.$carpetaDatos."informes.xml.php";
	$php_inf= "http://190.15.195.119/inmohostV2.0/".$rutaSystemAbs."inf_listado.php";

}else{
	
	$xml_inf= $rutaAbsoluta.$rutaSystemAbs.$carpetaDatos."informes.xml.php";
	$php_inf= $rutaAbsoluta.$rutaSystemAbs."inf_listado.php";
}

echo "
<XMLMENU>
      <contenido id='1' icono='interfaz/inmohost/images/iconos/20/inmueble.png' inicio='1'>
        <titulo><![CDATA[Inmuebles]]></titulo>
        <web_default>"._FILE_FORM_BUSCAR_PROPIEDADES_AV."?op=buscar</web_default>
		<items>
			<item id='1'  icono='interfaz/inmohost/images/iconos/32/buscar.png' estado='1' destino='traeURL(\""._FILE_FORM_BUSCAR_PROPIEDADES_AV."?op=buscar\", \"contenidoMenuActual1\")' inicio='1'>
				<![CDATA[Buscar]]>
			</item>
			<item id='2'  icono='interfaz/inmohost/images/iconos/32/agregar.png' estado='1' destino='ventana(\"prp_agregar\", \"&amp;mod_edit=1&amp;mod_tip=add\", \""._FILE_PHP_PRP_FICHA_EDIT."\", \"Agregar un Inmueble\"); display(\"menuPrincipal\");' inicio='0'>
				<![CDATA[Agregar]]>
			</item>
			<item id='3'  icono='interfaz/inmohost/images/iconos/32/editar.png' estado='1' destino='traeURL(\""._FILE_FORM_BUSCAR_PROPIEDADES_AV."?op=modi\", \"contenidoMenuActual1\")' inicio='0'>
				<![CDATA[Modificar]]>
			</item>
			<item id='4'  icono='interfaz/inmohost/images/iconos/32/eliminar.png' estado='1' destino='traeURL(\""._FILE_FORM_BUSCAR_PROPIEDADES_AV."?op=del\", \"contenidoMenuActual1\")' inicio='0'>
				<![CDATA[Modificar Estado]]>
			</item>
			<item id='5'  icono='interfaz/inmohost/images/iconos/32/publicar.png' estado='1' destino='traeURL(\""._FILE_FORM_PUBLICAR_PRP_WWW."\", \"contenidoMenuActual1\")' inicio='0'>
				<![CDATA[Publicar en Web]]>
			</item>
			<item id='6'  icono='interfaz/inmohost/images/iconos/32/medios.png' estado='1' destino='traeURL(\""._FILE_FORM_PRP_MEDIOS."\", \"contenidoMenuActual1\");' inicio='0'>
				<![CDATA[Medios Publicitarios]]>
			</item>
		</items>
      </contenido>
      <contenido id='2'  icono='interfaz/inmohost/images/iconos/20/archivo.png' inicio='0'>
        <titulo><![CDATA[Agenda]]></titulo>
         <web_default>"._FILE_FORM_AGENDA_CITAS."</web_default>
		<items>
			<item id='1'  icono='interfaz/inmohost/images/iconos/32/novedades.png' estado='1' destino='traeURL(\""._FILE_FORM_AGENDA_NOVEDADES."?usr_login=$usr_login\", \"contenidoMenuActual2\")' inicio='0'>
				<![CDATA[Novedades]]>
			</item>
			<item id='2'  icono='interfaz/inmohost/images/iconos/32/citas.png' estado='1' destino='traeURL(\""._FILE_FORM_AGENDA_CITAS."\", \"contenidoMenuActual2\")' inicio='0'>
				<![CDATA[Citas]]>
			</item>
			<item id='3'  icono='interfaz/inmohost/images/iconos/32/tasaciones.png' estado='1' destino='traeURL(\""._FILE_FORM_AGENDA_TASACIONES."\", \"contenidoMenuActual2\")' inicio='0'>
				<![CDATA[Tasaciones]]>
			</item>
			<item id='4'  icono='interfaz/inmohost/images/iconos/32/demanda.png' estado='1' destino='traeURL(\""._FILE_FORM_AGENDA_DEMANDAS."\", \"contenidoMenuActual2\")' inicio='0'>
				<![CDATA[Demandas]]>
			</item>
			<item id='5'  icono='interfaz/inmohost/images/iconos/32/telefono.png' estado='1' destino='traeURL(\""._FILE_FORM_AGENDA_TELEFONOS."\", \"contenidoMenuActual2\");' inicio='0'>
				<![CDATA[Teléfonos]]>
			</item>
			<item id='6'  icono='interfaz/inmohost/images/iconos/32/listar.png' estado='1' destino='traeURL(\""._FILE_FORM_AGENDA_CARTELES."\", \"contenidoMenuActual2\")' inicio='0'>
				<![CDATA[Carteles]]>
			</item>			
		</items>
      </contenido>
      <contenido id='3' icono='interfaz/inmohost/images/iconos/20/inmueble.png' inicio='0'>
        <titulo><![CDATA[Web]]></titulo>
         <web_default>"._FILE_FORM_WWW_PLANTILLAS."</web_default>
		<items>
			<item id='1'  icono='interfaz/inmohost/images/iconos/32/www.png' estado='1' destino='ventana(\"urlExterna\", \"\", \"http://"._USR_WWW."\", \""._USR_WWW."\"); display(\"menuPrincipal\");' inicio='0'>
				<![CDATA[Mi Página Web]]>
			</item>";
		
		if(strcmp(_USR_WEBMAIL,_USR_WWW."/mail")!=0){
			echo"
				<item id='2' icono='interfaz/inmohost/images/iconos/32/publicar.png' estado='1' destino='ventana(\"editor\",\"\", \"http://"._USR_WEBMAIL."\", \"Consultas\"); display(\"menuPrincipal\");' inicio='0'>
				<![CDATA[Revisar Consultas]]>";
		}else {
			echo"
				<item id='2' icono='interfaz/inmohost/images/iconos/32/publicar.png' estado='1' destino='ventana(\"editor\", \"&amp;f_email=$MAIL_USR&amp;f_pass=$MAIL_PASS&amp;lng=es&amp;tem=default\", \"http://"._USR_WEBMAIL."/process.php\", \"Consultas\"); display(\"menuPrincipal\");' inicio='0'>
				<![CDATA[Revisar Consultas]]>";
		}
				
		echo"
			</item>
			<!--item id='3'  icono='interfaz/inmohost/images/iconos/32/nosotros.png' estado='1' destino='ventana(\"editor\", \"\", \""._FILE_LIB_EDITOR."\", \"Editar Servicios\"); display(\"menuPrincipal\");' inicio='0'>
				<![CDATA[Rev]]>
			</item>
			<item id='5'  icono='interfaz/inmohost/images/iconos/32/interfaz.png' estado='1' destino='traeURL(\""._FILE_FORM_WWW_PLANTILLAS."\", \"contenidoMenuActual3\")' inicio='0'>
				<![CDATA[Interfaz Web]]>
			</item>
			<item id='5'  icono='interfaz/inmohost/images/iconos/32/configurar.png' estado='1' destino='traeURL(\""._FILE_FORM_WWW_CONF."\", \"contenidoMenuActual3\")' inicio='0'>
				<![CDATA[Configurar]]>
			</item>
			<item id='6'  icono='interfaz/inmohost/images/iconos/32/publicar.png' estado='1' destino='traeURL(\""._FILE_FORM_PUBLICAR_WWW."\", \"contenidoMenuActual3\")' inicio='0'>
				<![CDATA[Publicar en Internet]]>
			</item-->
		</items>
      </contenido>   
      <contenido id='4' icono='interfaz/inmohost/images/iconos/20/informes.png' inicio='0'>
        <titulo><![CDATA[Informes]]></titulo>
        <web_default></web_default>
		<items>
			<item id='1'  icono='interfaz/inmohost/images/iconos/32/barrios.png' estado='1' destino='ventana(\"inf_listado\", \"&amp;fileXML=".$xml_inf."&amp;fileXSL="._FILE_XSL_INF_PRP."&amp;tipo_inf=propiedades\", \"".$php_inf."\", \"Informe de Inmuebles\"); display(\"menuPrincipal\");' inicio='0'>
				<![CDATA[Inmuebles]]>
			</item>
			<item id='2'  icono='interfaz/inmohost/images/iconos/32/propietario.png' estado='1' destino='ventana(\"inf_listado\", \"&amp;fileXML=".$xml_inf."&amp;fileXSL="._FILE_XSL_INF_PROP."&amp;tipo_inf=propietarios\", \"".$php_inf."\", \"Informe de Propietarios\"); display(\"menuPrincipal\");' inicio='0'>
				<![CDATA[Propietarios]]>
			</item>m>
			<item id='3'  icono='interfaz/inmohost/images/iconos/32/citas.png' estado='1' destino='ventana(\"inf_listado\", \"&amp;fileXML=".$xml_inf."&amp;fileXSL="._FILE_XSL_INF_CITAS."&amp;tipo_inf=citas\", \"".$php_inf."\", \"Informe de Citas\"); display(\"menuPrincipal\");' inicio='0'>
				<![CDATA[Citas]]>
			</item>
			<item id='4'  icono='interfaz/inmohost/images/iconos/32/tasaciones.png' estado='1' destino='ventana(\"inf_listado\", \"&amp;fileXML=".$xml_inf."&amp;fileXSL="._FILE_XSL_INF_TASA."&amp;tipo_inf=tasaciones\", \"".$php_inf."\", \"Informe de Tasaciones\"); display(\"menuPrincipal\");' inicio='0'>
				<![CDATA[Tasaciones]]>
			</item>
			<item id='5'  icono='interfaz/inmohost/images/iconos/32/demanda.png' estado='1' destino='ventana(\"inf_listado\", \"&amp;fileXML=".$xml_inf."&amp;fileXSL="._FILE_XSL_INF_DEMANDAS."&amp;tipo_inf=demandas\", \"".$php_inf."\", \"Informe de Demandas\"); display(\"menuPrincipal\");' inicio='0'>
				<![CDATA[Demandas]]>
			</item>
			<item id='6'  icono='interfaz/inmohost/images/iconos/32/medios.png' estado='1' destino='ventana(\"inf_listado\", \"&amp;fileXML=".$xml_inf."&amp;fileXSL="._FILE_XSL_INF_MEDIOS."&amp;tipo_inf=medios\", \"".$php_inf."\", \"Informe de Publicaciones\"); display(\"menuPrincipal\");' inicio='0'>
				<![CDATA[Medios]]>
			</item>
			<item id='7'  icono='interfaz/inmohost/images/iconos/32/archivo.png' estado='1' destino='traeURL(\""._FILE_FORM_INF_VARIOS."?us_id=\"+_USR_ID, \"contenidoMenuActual4\");' inicio='0'>
				<![CDATA[Resumen]]>
			</item>
		</items>
      </contenido>
      <contenido id='5' icono='interfaz/inmohost/images/iconos/20/configurar.png' inicio='0'>
        <titulo><![CDATA[Control]]></titulo>
        <web_default>"._FILE_FORM_PANEL_INMO."</web_default>
		<items>
			<item id='1'  icono='interfaz/inmohost/images/iconos/32/inmueble.png' estado='1' destino='traeURL(\""._FILE_FORM_PANEL_INMO."\", \"contenidoMenuActual5\");' inicio='0'>
				<![CDATA[Inmobiliaria]]>
			</item>
			<item id='2'  icono='interfaz/inmohost/images/iconos/32/usuario.png' estado='1' destino='traeURL(\""._FILE_FORM_PANEL_USUARIOS."\", \"contenidoMenuActual5\");' inicio='0'>
				<![CDATA[Usuarios]]>
			</item>
			<item id='3'  icono='interfaz/inmohost/images/iconos/32/copiadeseguridad.png' estado='1' destino='traeURL(\""._FILE_FORM_PANEL_BACKUP."\", \"contenidoMenuActual5\");' inicio='0'>
				<![CDATA[Copia de Seguridad]]>
			</item>
			<item id='4'  icono='interfaz/inmohost/images/iconos/32/vercitas.png' estado='1' destino='traeURL(\""._FILE_FORM_PANEL_INTERFAZ."\", \"contenidoMenuActual5\");' inicio='0'>
				<![CDATA[Interfaz]]>
			</item>
			<item id='5'  icono='interfaz/inmohost/images/iconos/32/medios.png' estado='1' destino='traeURL(\""._FILE_FORM_PANEL_MEDIOS."\", \"contenidoMenuActual5\");' inicio='0'>
				<![CDATA[Medios Publicitarios]]>
			</item>
			<item id='6'  icono='interfaz/inmohost/images/iconos/32/barrios.png' estado='1' destino='traeURL(\""._FILE_FORM_PANEL_VARIOS."\", \"contenidoMenuActual5\");' inicio='0'>
				<![CDATA[Varios]]>
			</item>
		</items>
      </contenido>
      <contenido id='6' icono='interfaz/inmohost/images/iconos/20/ayuda.png' inicio='0'>
        <titulo><![CDATA[Ayuda]]></titulo>
		<items>
		</items>
      </contenido>
</XMLMENU>";

?>