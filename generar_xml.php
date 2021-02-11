<?php

include('/home/cocucci/domains/cocucci.com.ar/public_html/v.2.0/includes/conexion.php');

function eliminar_simbolos($string){
 
// $string=utf8_encode($string1);

 /*
    $string = str_replace(
        array('á', 'à', 'ä', 'â', 'ª', 'Á', 'À', 'Â', 'Ä'),
        array('a', 'a', 'a', 'a', 'a', 'A', 'A', 'A', 'A'),
        $string
    );
*/
     $string = str_replace(
        array('á', 'à', 'ä', 'â', 'ª'),
        array('a', 'a', 'a', 'a', 'º'),
        $string
    );
	
    $string = str_replace(
        array('é', 'è', 'ë', 'ê', 'É', 'È', 'Ê', 'Ë'),
        array('e', 'e', 'e', 'e', 'E', 'E', 'E', 'E'),
        $string
    );
 
    $string = str_replace(
        array('í', 'ì', 'ï', 'î', 'Í', 'Ì', 'Ï', 'Î'),
        array('i', 'i', 'i', 'i', 'I', 'I', 'I', 'I'),
        $string
    );
 
    $string = str_replace(
        array('ó', 'ò', 'ö', 'ô', 'Ó', 'Ò', 'Ö', 'Ô'),
        array('o', 'o', 'o', 'o', 'O', 'O', 'O', 'O'),
        $string
    );
 
    $string = str_replace(
        array('ú', 'ù', 'ü', 'û', 'Ú', 'Ù', 'Û', 'Ü'),
        array('u', 'u', 'u', 'u', 'U', 'U', 'U', 'U'),
        $string
    );
 
    $string = str_replace(
        array('ñ', 'Ñ', 'ç', 'Ç'),
        array('n', 'N', 'c', 'C',),
        $string
    );
 
    $string = str_replace(
        array("\\", "¨", "~", "\"", "·", "$", "%", "<br>", "<br.>", "<br />", "</br>", "<BR>", "<BR.>", "<BR />", "</BR>", "Ã", "Â", "Æ’", "Â¿", "±", "ƒ", "\r", "a€¢" , "HcT", "", "'", "^", "¨", "´", " " ),
        ' ',
        $string
    );
return $string;
} //Fin Funcion

$cantidad=0;

$xml = new DomDocument('1.0', 'utf-8');
$propiedades = $xml->createElement('propiedades');
$propiedades = $xml->appendChild($propiedades);

//Recupero el último prp_id
$cons_max = "select max(prp_id) as prp_id from propiedades where usr_id=17";

$rs_cons_max=mysql_query($cons_max,$db);
$fila_cons_max = mysql_fetch_array($rs_cons_max); 
$prp_max=$fila_cons_max['prp_id'];

//Recorro todos los IDs hasta el último
for ($j=14000;$j<=$prp_max;$j++){

	//consulto los atributos de cada propiedad
	$consulta = "select 
						prp_id,
						loc_desc,
						pro_desc,
						tip_desc,
						con_desc,
						prp_desc,
						prp_dom,
						prp_bar,
						prp_nota,
						prp_pre,
						prp_pre_dol,
						prp_ocultar_precio,
						prp_servicios,
						fotos,
						propiedades.pai_id as pai_id,
						prp_lat,
						prp_lng,
						prp_mod,
						prp_alta
				from 
						propiedades,
						tipo_const,
						condiciones,
						provincias,
						localidades 
				where 
						propiedades.tip_id=tipo_const.tip_id and 
						propiedades.con_id=condiciones.con_id and 
						propiedades.pro_id=provincias.pro_id and 
						propiedades.loc_id=localidades.loc_id and 
						prp_id=".$j." and 
						usr_id=17 and
						propiedades.prp_mostrar=1 and
						propiedades.mos_por_1=1
				";

	$rs_consulta=mysql_query($consulta,$db);
	
	$consulta_servicios="select servicios_ihost.ser_desc, ser_x_prp_ihost.valor from ser_x_prp_ihost,servicios_ihost where servicios_ihost.ser_id=ser_x_prp_ihost.ser_id and ser_x_prp_ihost.prp_id=".$j." and ser_x_prp_ihost.usr_id=17";

	$rs_consulta_servicios=mysql_query($consulta_servicios,$db);

	if (mysql_num_rows($rs_consulta)){
	
		$fila = mysql_fetch_array($rs_consulta); 
		
//print "<br>Crudo: ".$fila['prp_desc']."<br>UTF8: ".utf8_encode($fila['prp_desc'])."<br>Sin Simbolos: ".eliminar_simbolos($fila['prp_desc'])."<br>";
print "<br>".$fila['prp_id'];
$cantidad=$cantidad+1;
		// Genero el elemento Propiedad
		$propiedad = $xml->createElement('propiedad');
		$propiedad = $propiedades->appendChild($propiedad);
		 
		// Agrego atributos a la propiedad
	 
		$prp_id = $xml->createElement('prp_id',$fila['prp_id']);
		$prp_id = $propiedad->appendChild($prp_id);
	 
		$loc_desc = $xml->createElement('loc_desc',$fila['loc_desc']);
		$loc_desc = $propiedad->appendChild($loc_desc);
	 
		$pro_desc = $xml->createElement('pro_desc',$fila['pro_desc']);
		$pro_desc = $propiedad->appendChild($pro_desc);
	 
		$con_desc = $xml->createElement('con_desc',$fila['con_desc']);
		$con_desc = $propiedad->appendChild($con_desc);

		$tip_desc = $xml->createElement('tip_desc',$fila['tip_desc']);
		$tip_desc = $propiedad->appendChild($tip_desc);
 
		$prp_desc = $xml->createElement('prp_desc',$fila['prp_desc']);
		$prp_desc = $propiedad->appendChild($prp_desc);

		$prp_dom = $xml->createElement('prp_dom',$fila['prp_dom']);
		$prp_dom = $propiedad->appendChild($prp_dom);

		$prp_bar = $xml->createElement('prp_bar',$fila['prp_bar']);
		$prp_bar = $propiedad->appendChild($prp_bar);

		$prp_nota = $xml->createElement('prp_nota',$fila['prp_nota']);
		$prp_nota = $propiedad->appendChild($prp_nota);

		$prp_pre = $xml->createElement('prp_pre',$fila['prp_pre']);
		$prp_pre = $propiedad->appendChild($prp_pre);

		$prp_pre_dol = $xml->createElement('prp_pre_dol',$fila['prp_pre_dol']);
		$prp_pre_dol = $propiedad->appendChild($prp_pre_dol);

		$prp_ocultar_precio = $xml->createElement('prp_ocultar_precio',$fila['prp_ocultar_precio']);
		$prp_ocultar_precio = $propiedad->appendChild($prp_ocultar_precio);

		$prp_servicios = $xml->createElement('prp_servicios',$fila['prp_servicios']);
		$prp_servicios = $propiedad->appendChild($prp_servicios);

		if (mysql_num_rows($rs_consulta_servicios)){

			while ($fila_ser = mysql_fetch_array($rs_consulta_servicios)){

				// Genero el elemento Propiedad
				$servicio = $xml->createElement('servicio');
				$servicio = $propiedad->appendChild($servicio);

				//Agrego los atributos
				$ser_desc = $xml->createElement('ser_desc',$fila_ser['ser_desc']);
				$ser_desc = $servicio->appendChild($ser_desc);

				$ser_valor = $xml->createElement('ser_valor',$fila_ser['valor']);
				$ser_valor = $servicio->appendChild($ser_valor);
			
			}//fin while

		}//fin if servicios
 
		if ($fila['fotos'] > 0){

			for($f=1;$f<=$fila['fotos'];$f++){

				// Genero el elemento Propiedad
				$fotos = $xml->createElement('fotos');
				$fotos = $propiedad->appendChild($fotos);

				//Agrego los atributos
				$fecha_mod = strtotime(date("d-m-Y H:i:00",$fila['prp_mod']));
				$fecha_alta = strtotime(date("d-m-Y H:i:00",$fila['prp_alta']));
				$fecha_del_cambio = strtotime("04-10-2018 00:00:01");

				if ($fecha_mod > $fecha_del_cambio || $fecha_alta > $fecha_del_cambio){
					$web_fotos="www.cocucci.com.ar";
				}else{
					$web_fotos="www.inmoclick.com.ar";
				}
				$url = $xml->createElement('url','http://'.$web_fotos.'/ftp_inmohost/fotos/'.$fila['prp_id'].'-17-'.$f.'.gif');
				$url = $fotos->appendChild($url);

				$descripcion = $xml->createElement('descripcion',' ');
				$descripcion = $fotos->appendChild($descripcion);
			
			}//fin for

		}//fin if fotos

		$pai_id = $xml->createElement('pai_id',$fila['pai_id']);
		$pai_id = $propiedad->appendChild($pai_id);

		$prp_lat = $xml->createElement('prp_lat',$fila['prp_lat']);
		$prp_lat = $propiedad->appendChild($prp_lat);

		$prp_lng = $xml->createElement('prp_lng',$fila['prp_lng']);
		$prp_lng = $propiedad->appendChild($prp_lng);

		$prp_mod = $xml->createElement('prp_mod',$fila['prp_mod']);
		$prp_mod = $propiedad->appendChild($prp_mod);

		$prp_alta = $xml->createElement('prp_alta',$fila['prp_alta']);
		$prp_alta = $propiedad->appendChild($prp_alta);

	}//fin If

}//fin for

//Genero el xml
$xml->formatOutput = true;
$el_xml = $xml->saveXML();
$xml->save('/home/cocucci/domains/cocucci.com.ar/public_html/propiedades_cocucci.xml');
	 
//Muestro el XML puro
echo "<p><b>El XML ha sido creado. Cantidad de propiedades: ".$cantidad."</b></p>";
// htmlentities($el_xml)."<br/><hr>";

//Cierro la DB
mysql_close($db);

?>