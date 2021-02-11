<?php
	extract($_GET);
	extract ($_POST);
	extract ($_REQUEST);
	$usr_id=17;

	include ("php/config.php");
	include ("php/sec_head.php");
	
	//libreria de dreamwaeaver XLST para inclucion de archivos de XML con XSLT
	include(_FILE_XSL_CLASS);
	// cambio la hoja de estylos por defecto
	$otraCSS = "styleInterno.css";

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<?php 
function hayInternet(){
	$dominio="www.google.com";
	$res="";
	$hay="";	
	$res=gethostbyname('www.google.com');
	if($res!=$dominio){
		$hay=1;
	}else{
		$hay=0;
	}
	return $hay;
}
?>
<META HTTP-EQUIV="Content-Type" CONTENT="text/html;charset=ISO-8859-1">
<title>Mapa de Google</title>
<?
if(hayInternet()){
?>
<!--<script src="https://maps.googleapis.com/maps/api/js?v=3&amp;sensor=false"></script> <!--librer�a api de google-->
<!--<script type="text/javascript" src="http://maps.google.com/maps/api/js?key=AIzaSyCsjiEiv_j5spPWwWSj1o1Qi1TIc5MagrA"></script-->


	<script type='text/javascript' src='https://maps.googleapis.com/maps/api/js?key=AIzaSyCsjiEiv_j5spPWwWSj1o1Qi1TIc5MagrA&callback=initMap'></script>


<script type="text/javascript">

var geocoder = new GClientGeocoder();
var map;
var marker;

function placeMarker(location) { // Coloca una marca donde est� el click del mouse
  marker.setVisible(true);
  marker.setPosition(location);

}

function showAddress() {// funcion que toma el texto y ubica la marca en el mapa
	marker.setVisible(true);
	var indice_loc = document.prp_edit_form.loc_id.selectedIndex;
	var indice_pro = document.prp_edit_form.pro_id.selectedIndex;
	var address= document.prp_edit_form.prp_dom.value + ' ' + document.prp_edit_form.loc_id.options[indice_loc].text + ' ' + document.prp_edit_form.pro_id.options[indice_pro].text;
    geocoder.geocode( { 'address': address}, function(results, status) {
		if (status == google.maps.GeocoderStatus.OK) {
		  map.setCenter(results[0].geometry.location);
			if ( marker ) { // si existe una marca, la cambia de posici�n
				marker.setPosition(results[0].geometry.location);
			}    
		} else {
			alert('No se reconoce la direcci�n: ' + status);
		}
	});
	var posicion = marker.getPosition();
	document.prp_edit_form.prp_lat.value = posicion.lat();
	document.prp_edit_form.prp_lng.value = posicion.lng();
}// fin funcion showAddress
		
function load(punto) { //crea el mapa y si existe lat y lng, lo deja marcado
		geocoder = new google.maps.Geocoder();
		var existeMarca=0;

		if (punto=='1'){// si quiero borrar la marca
			var mapOptions = { //opciones para crear el mapa
				zoom: 14,
				center: new google.maps.LatLng(-32.926,-68.823),
				panControl: true,
				zoomControl: true,
				mapTypeControl: true,
				scaleControl: true,
				streetViewControl: false,
				overviewMapControl: true,
				mapTypeId: google.maps.MapTypeId.HYBRID
			};
			map = new google.maps.Map(document.getElementById('map-canvas'),mapOptions); //Creo el mapa
			var marca = new google.maps.LatLng(-32.926,-68.823) // creo las coordenadas para la marca		
				marker = new google.maps.Marker({ //creo la marca asociando coordenadas con el mapa
				position: marca,
				map: map
			});
			marker.setVisible(false);
			document.prp_edit_form.prp_lat.value='';
			document.prp_edit_form.prp_lng.value='';
			//map.setCenter(-32.926,-68.823);

		}else if(document.prp_edit_form.prp_lat.value!='' && document.prp_edit_form.prp_lng.value!=''){// si existe lat y lng creo la marca en el mapa y lo centro en esa posici�n
			var mapOptions = { //opciones para crear el mapa
				zoom: 14,
				center: new google.maps.LatLng(-32.926,-68.823),
				panControl: true,
				zoomControl: true,
				mapTypeControl: true,
				scaleControl: true,
				streetViewControl: false,
				overviewMapControl: true,
				mapTypeId: google.maps.MapTypeId.HYBRID
			};
			    map = new google.maps.Map(document.getElementById('map-canvas'),mapOptions); //Creo el mapa
				var marca = new google.maps.LatLng(document.prp_edit_form.prp_lat.value,document.prp_edit_form.prp_lng.value) // creo las coordenadas para la marca		
				marker = new google.maps.Marker({ //creo la marca asociando coordenadas con el mapa
				position: marca,
				map: map
			});
			map.setCenter(marca); // centro el mapa donde estar� la marca
		}else{//si no existe marca, creo el mapa y la marca pero la hago invisible.
			var mapOptions = { //opciones para crear el mapa
				zoom: 14,
				center: new google.maps.LatLng(-32.926,-68.823),
				panControl: true,
				zoomControl: true,
				mapTypeControl: true,
				scaleControl: true,
				streetViewControl: false,
				overviewMapControl: true,
				mapTypeId: google.maps.MapTypeId.HYBRID
			};
			map = new google.maps.Map(document.getElementById('map-canvas'),mapOptions); //Creo el mapa
			var marca = new google.maps.LatLng(-32.926,-68.823) // creo las coordenadas para la marca		
				marker = new google.maps.Marker({ //creo la marca asociando coordenadas con el mapa
				position: marca,
				map: map
			});
			marker.setVisible(false);
			document.prp_edit_form.prp_lat.value='';
			document.prp_edit_form.prp_lng.value='';
		}
		
		google.maps.event.addListener(map, 'click', function(event) {//Escucho el click del mouse para hacer una nueva marca
			document.prp_edit_form.prp_lat.value=event.latLng.lat();
			document.prp_edit_form.prp_lng.value=event.latLng.lng();
			placeMarker(event.latLng);
		});
}

</script>
<?php 
}
?>

<title>INMOHOST</title>
<?php
	include("head.php");
?>
<script language="JavaScript1.2" type="text/javascript" src="<?php echo _FILE_JAVASCRIPT_AJAX; ?>"></script>

<!--MENUEXTRA-->
<script language="JavaScript1.2" type="text/javascript" src="<?php echo _FILE_JAVASCRIPT_MENUEXTRA; ?>"></script>
<?php echo "<style type=\"text/css\" media=\"screen\">
	@import url(\""._FILE_CSS_MENUEXTRA."\");
</style>\n"; ?>
<!--//MENUEXTRA-->
<script language="javascript" type="text/javascript" src="<?php echo _FILE_JAVASCRIPT_TOOLTIP; ?>"></script>
</head>
<body <?php if (!$mod_tip || !$edited){ echo "onload=\"contar_palabras('prp_pub');load('0');\"";}else{ echo "onload=\"load('0');\"";} ?>>

<table width="100%" border="0" cellspacing="0" cellpadding="0">
  
  <tr>
    <td>
    
    <?php

    // Si hay que realizar alguna operacion y ya se ha editado la entidad
	// se ejecuta el abm del modulo
	
	if ($mod_tip && $edited)
	{

		include(_FILE_PRP_MEN_ABM);
		include(_FILE_PHP_ABM_PRP);

	}
	if ($errors)
	{
		for ($i=0; $i<count($errors);$i++)
		{
			echo "<tr><td  class='destacado2'>".$errors[$i]."</td></tr>";
		}
	}
			// Para que funcionen las modificaciones por ID -- Atilio 
	if ($mod_edit=='mod_edit')
	{
		$mod_edit=1;
		$query_string="&mod_edit=$mod_edit&mod_tip=$mod_tip&prp_id=$prp_id&usr_id=$usr_id" ;
	}
	else 
	{
		$query_string=$_SERVER['QUERY_STRING'];
	}
	?>	</td>
  </tr>
  <tr>
  <td>  </td>
 	<td>
<?php

	// Si no se ejecuto ninguna operacion ($msg_exitos no definido) o si se ejecuto la operacion pero con errores
	// se muestran de nuevo los datos de la propiedad
	
	if (!$msg_exitos)
	{
		$Item_xsl = new MM_XSLTransform();
		//print _FILE_XML_PRP_FICHA_EDIT."?".$query_string;
		$Item_xsl->setXML(_FILE_XML_PRP_FICHA_EDIT."?".$query_string);
		$Item_xsl->setXSL(_FILE_XSL_PRP_FICHA_EDIT);
		$Item_xsl->addParameter("prp_fotosXML", _PROXY."?tip=prp_foto"); //_FILE_XML_PRP_FOTOS."?prp_id=$prp_id&usr_id=$usr_id&mod_edit=$mod_edit");
		$Item_xsl->addParameter("mod_edit", $mod_edit);
		$Item_xsl->addParameter("mod_tip", $mod_tip);
		$Item_xsl->addParameter("prp_id", $prp_id);
		$Item_xsl->addParameter("usr_id", $usr_id);
		$Item_xsl->addParameter("fileFicha", _FILE_PHP_PRP_FICHA);
		$Item_xsl->addParameter("fileFichaEdit", _FILE_PHP_PRP_FICHA_EDIT);
		$Item_xsl->addParameter("fileFichaEstado", _FILE_PHP_PRP_LISTADO);
		$Item_xsl->addParameter("fileCita", _FILE_PHP_AGENDA_CITAS);
		$Item_xsl->addParameter("fileExportar", _FILE_PHP_EXPORTACION);
		$Item_xsl->addParameter("filePropietario", _FILE_PRP_PROPIETARIOS);
		$Item_xsl->addParameter("carpetaFotos", $carpetaFotos);
		echo $Item_xsl->Transform();

	}
	else 
	{ 	
		// Se realizo la operacion con exito, se muestran los mensajes correspondientes
		if ($msg_exitos && !$errors)
		{	?>
		<tr>
			<script language="javascript">
				parent.ventana('agenda_resumen','', '<?php echo _FILE_PHP_RESUMEN_PRINCIPAL; ?>', 'Resumen de movimentos');
			</script>
		  <td class='destacado'><h1 align="center"><br>LOS CAMBIOS SE HAN REALIZADO CON EXITO</h1></td>
		</tr>
		<?php
			for ($i=0; $i<count($msg_exitos);$i++)
			{ ?>
				<tr><td class='destacado' >&nbsp;</td></tr>
				<tr><td class='destacado' >&nbsp;&nbsp;&bull;&nbsp;<?php echo $msg_exitos[$i]; ?></td></tr>
			<?php
			}
		}?>
		<tr><td class='destacado' >&nbsp;</td></tr>
		<?php 
			if ($mod_tip=="del")
			{
		?>
			<tr><td align=center><input type="button" name="aceptar" value="Aceptar" onclick="parent.Windows.close('listadoPropiedades')">&nbsp; <input type="button" name="subir" value="Publicar en Pagina Web" onclick="javascript:parent.ventana('actualizador','propiedades=1&medios=0', '<?php echo _FILE_PHP_ACTUALIZADOR; ?>', 'Actualizando el Sistema');"></td></tr>
		<?php
			}
			else 
			{
			?>
				<tr><td align=center><input type="button" name="aceptar" value="Aceptar" onclick="parent.Windows.close('propiedad')">&nbsp; <input type="button" name="subir" value="Publicar en Pagina Web" onclick="javascript:parent.ventana('actualizador','propiedades=1&medios=0', '<?php echo _FILE_PHP_ACTUALIZADOR; ?>', 'Actualizando el Sistema');"></td></tr>
		<?php
			}
		?>
		
		<?
	}
?>	</td>
  </tr>
</table>

<!--TOOLTIP-->
<div id="toolTipBox">
<iframe id="iframeToolTip" name="iframeToolTip" src="about:blank" scrolling="no" frameborder="0" style="margin:0px; padding:0px; border:none;" ></iframe>
</div>
<!--FIN TOOLTIP-->

</body>
</html>