<?php
	extract($_GET);
	extract ($_POST);
	extract ($_REQUEST);

include (_FILE_PHP_CLASS_UPLOAD);
include (_FILE_PHP_MAILER);

//TOMAR EL ULTIMO ID
 function max_id($tabla,$campo){
 //	print "select max($campo) from $tabla";
 	   $num=mysql_query("select max($campo) from $tabla") or die(mysql_error());
 	   $max=mysql_result($num,0,0) + 1;
   return $max;
 }
 
function buscar_coincidencia($dem_id,$prp_id){
	session_start();
	if($dem_id){
		$cad="select * from demandas where dem_id=$dem_id";
		$res=mysql_query($cad);
		$cant=mysql_num_rows($res);
		if($cant>0){
			$fila=mysql_fetch_array($res);
			
			//RECUPERO LOCALIDADES
			$filt_loc="";
			$locs=split("x",$fila[loc_id]); //separo las localidades
			for ($i=0;$i<count($locs);$i++){ //recorro el array
			//	echo $locs[$i]."*$i*";
				if($locs[$i]!=""){ //por cada localidad armo el filtro
					$filt_loc.=" propiedades.loc_id=$locs[$i]";
					if($i<count($locs)-2){
						$filt_loc.=" or ";
					}
				}
			}
			
			
			//RECUPERO TIPOS DE CONSTRUCCION
			$filt_tip="";
			//echo $fila[loc_id];
			$tips=split("x",$fila[tip_id]);
			for ($i=0;$i<count($tips);$i++){
			//	echo $locs[$i]."*$i*";
				if($tips[$i]!=""){
					$filt_tip.=" propiedades.tip_id=$tips[$i]";
					if($i<count($tips)-2){
						$filt_tip.=" or ";
					}
				}
			}
			
			
			//RECUPERO CONDICIONES
			$filt_con="";
			//echo $fila[loc_id];
			$conds=split("x",$fila[con_id]);
			for ($i=0;$i<count($conds);$i++){
			//	echo $locs[$i]."*$i*";
				if($conds[$i]!=""){
					$filt_con.=" propiedades.con_id=$conds[$i]";
					if($i<count($conds)-2){
						$filt_con.=" or ";
					}
				}
			}
			
			
			//Ya tengo los filtros multiples. solo resta hacer la consulta en propiedades
			$regs=" prp_id,
					prp_dom,
					loc_desc,
					pro_desc,
					tip_desc,
					con_desc,
					prp_pre ";
			
			$tablas="propiedades,
					 localidades,
					 provincias,
					 tipo_const,
					 condiciones";
			
			$filtro="propiedades.pro_id=provincias.pro_id and
					 propiedades.loc_id=localidades.loc_id and
					 propiedades.tip_id=tipo_const.tip_id and
					 propiedades.con_id=condiciones.con_id and 
					 propiedades.prp_mostrar=1 and 
					 propiedades.usr_id="._USR_ID;
			
			
			if($fila[dem_dom]){
				$filtro.=" and (propiedades.prp_dom like '%$fila[dem_dom]%' or propiedades.prp_bar like '%$fila[dem_dom]%')";		
			}
			/*
			if($fila[dem_barr]){
				$filtro.=" and (propiedades.prp_bar like '%$fila[dem_barr]%' or propiedades.prp_dom like '%$fila[dem_barr]%')";		
			}*/
			
			/*if($fila[dem_pre_min]){
				$filtro.=" and (propiedades.prp_pre >= $fila[dem_pre_min] or propiedades.pre_inmo >= $fila[dem_pre_min])";
			}
			
			if($fila[dem_pre_max]){
				$filtro.=" and (propiedades.prp_pre <= $fila[dem_pre_max] or propiedades.pre_inmo <= $fila[dem_pre_max])";
			}*/
			if($fila[dem_pre_min] && $fila[dem_pre_max]){
				$filtro.=" and( (propiedades.prp_pre >= $fila[dem_pre_min] and propiedades.prp_pre <= $fila[dem_pre_max]) or (propiedades.pre_inmo >= $fila[dem_pre_min] and propiedades.pre_inmo <= $fila[dem_pre_max]) )";
			}
			
			if($fila[pro_id]){
				$filtro.=" and propiedades.pro_id=$fila[pro_id] ";
			}
			
			if($filt_con){
				$filtro.="and ($filt_con)";		
			}
			
			if($filt_loc){
				$filtro.="and ($filt_loc)";		
			}
			
			if($filt_tip){
				$filtro.="and ($filt_tip)";		
			}
			
			//print"select $regs from $tablas where $filtro";
			$result=mysql_query("select $regs from $tablas where $filtro");
			if(mysql_num_rows($result)){
			
				$string="<table><tr><td colspan=5 style='font-weight:bold;border:2px solid #CCCCCC'>Coincidencias</td><td colspan=2 colspan=5 style='font-weight:bold;border:2px solid #CCCCCC'>Demandante</td></tr><tr><td style='font-weight:bold'> PRP_ID </td><td style='font-weight:bold'> Domicilio </td> <td style='font-weight:bold'> Inmueble </td><td style='font-weight:bold'> Condicion </td> <td style='font-weight:bold'> Precio  </td><td style='font-weight:bold'> Contacto </td><td style='font-weight:bold'> Enviar Mail</td></tr>";
				while ($fil_res=mysql_fetch_array($result)) {
					
					$string.="<tr><td style='border:1px solid #CCCCCC;'><a href=\\\"javascript:ventana('prp_ficha', '&mod_edit=1&prp_id=$fil_res[prp_id]&usr_id="._USR_ID."', 'system/prp_ficha.php', 'Ficha de Propiedad');\\\">$fil_res[prp_id]</a></td><td style='border:1px solid #CCCCCC;'> $fil_res[prp_dom] - [$fil_res[loc_desc] - $fil_res[pro_desc]] </td> <td style='border:1px solid #CCCCCC;'> $fil_res[tip_desc] </td><td style='border:1px solid #CCCCCC;'> $fil_res[con_desc] </td> <td style='border:1px solid #CCCCCC;'> $fil_res[prp_pre]  </td><td style='border:1px solid #CCCCCC;'> $fila[dem_raz] - Tel: $fila[dem_tel] </td><td style='border:1px solid #CCCCCC;'><a href=\\\"javascript:ventana('env_mail', 'prp_id=$fil_res[prp_id]&usr_id="._USR_ID."&to=$fila[dem_mail]&subject=Solicitud de inmueble&dem_raz=$fila[dem_raz]', 'system/send_mail.php', 'Enviar Mail - Notificar Demanda');\\\"> $fila[dem_mail] </a></td></tr></tr>";
					
				}
				
					$string.="</table>";
				print "
					<script language='javascript'>
							parent.Dialog.alert(\"<div style='font-size:12px;'><br>Estimado <b>".$_SESSION['usr_login']."</b>, Ud. acaba de agregar o modificar una demanda que coincide con una o m�s propiedades.<br><br>A trav�s del siguiente listado Ud. podr� comunicarse por telefono con el interesado o hacer click en<br>ENVIAR MAIL y el sistema enviar� automaticamente un aviso al interesado del inmueble en cartera.<br></div><br> $string  \", {windowParameters: {className:\"alert\", width:700, height:400}, 				
							okLabel: \"Cerrar\"
							 });
						hideToolTip();
					</script>
				";
				$volver=1;
			}else{
				$volver=0;
			}
		}	
	}else{
		
	$cad="select * from demandas where DATE_SUB(CURDATE(),INTERVAL 60 DAY) <= dem_fecha ;";
		$res=mysql_query($cad);
		
		while ($fila=mysql_fetch_array($res)){
						
				//RECUPERO LOCALIDADES
				$filt_loc="";
				$cad_loc="";
				$locs=split("x",$fila[loc_id]); //separo las localidades
				for ($i=0;$i<count($locs);$i++){ //recorro el array
				//	echo $locs[$i]."*$i*";
					if($locs[$i]!=""){ //por cada localidad armo el filtro
						/*
							comparo con domicilios
						*/
							$c=mysql_query("select loc_desc from localidades where loc_id=$locs[$i]");
							$r=mysql_result($c,0,0);
							$filt_loc_dom=" propiedades.prp_dom like '%$r%'";							
						/*
						fin
						*/
					
						$filt_loc.=" propiedades.loc_id=$locs[$i]";
					
						$loc_desc=mysql_result(mysql_query("select loc_desc from localidades where loc_id=$locs[$i]"),0,0);
						$cad_loc.="$loc_desc";
						if($i<count($locs)-2){
							$filt_loc.=" or ";
							$filt_loc_dom.=" or ";
							$cad_loc.=" o ";
						}
					}
				}
			//	print $filt_loc;
				
				//RECUPERO TIPOS DE CONSTRUCCION
				$filt_tip="";
				$cad_tip="";
				$tips=split("x",$fila[tip_id]);
				for ($i=0;$i<count($tips);$i++){
				//	echo $locs[$i]."*$i*";
					if($tips[$i]!=""){
						$filt_tip.=" propiedades.tip_id=$tips[$i]";
						$tip_desc=mysql_result(mysql_query("select tip_desc from tipo_const where tip_id=$tips[$i]"),0,0);
						$cad_tip.="$tip_desc";
						if($i<count($tips)-2){
							$filt_tip.=" or ";
							$cad_tip.=" o ";
						}
					}
				}
				
				
				//RECUPERO CONDICIONES
				$filt_con="";
				//echo $fila[loc_id];
				$cad_con="";
				$conds=split("x",$fila[con_id]);
				for ($i=0;$i<count($conds);$i++){
				//	echo $locs[$i]."*$i*";
					if($conds[$i]!=""){
						$filt_con.=" propiedades.con_id=$conds[$i]";
						$con_desc=mysql_result(mysql_query("select con_desc from condiciones where con_id=$conds[$i]"),0,0);
						$cad_con.="$con_desc";
						if($i<count($conds)-2){
							$filt_con.=" or ";
							$cad_con.=" o ";
						}
					}
				}												
				
				//Ya tengo los filtros. solo resta hacer la consulta en propiedades para el id q acabo de cargar o modificar
				$regs=" prp_id, 
						prp_dom,
						loc_desc,
						pro_desc,
						tip_desc,
						con_desc,
						prp_pre ";
				
				$tablas="propiedades,
						 localidades,
						 provincias,
						 tipo_const,
						 condiciones";
				
				$filtro="propiedades.pro_id=provincias.pro_id and
						 propiedades.loc_id=localidades.loc_id and
						 propiedades.tip_id=tipo_const.tip_id and
						 propiedades.con_id=condiciones.con_id and
						 propiedades.usr_id="._USR_ID." ";
				
				if($prp_id){
					$filtro.=" and propiedades.prp_id=$prp_id ";
				}
				

				if($fila[dem_dom]){
					$filtro.=" and (propiedades.prp_dom like '%$fila[dem_dom]%' or propiedades.prp_bar like '%$fila[dem_dom]%'"; 
					
					if($filt_loc_dom){
						 
						$filtro.=" or $filt_loc_dom ";
					}
					$filtro.= ")";		
				}
								
				/*
				if($fila[dem_barr]){
					$filtro.=" and (propiedades.prp_bar like '%$fila[dem_barr]%' or propiedades.prp_dom like '%$fila[dem_barr]%')";		
				}*/
				
				/*if($fila[dem_pre_min]){
					$filtro.=" and (propiedades.prp_pre >= $fila[dem_pre_min] or propiedades.pre_inmo >= $fila[dem_pre_min]) ";
				}
				
				if($fila[dem_pre_max]){
					$filtro.=" and (propiedades.prp_pre <= $fila[dem_pre_max] or propiedades.pre_inmo <= $fila[dem_pre_min]) ";
				}*/
				
				if($fila[dem_pre_min] && $fila[dem_pre_max]){
					$filtro.=" and( (propiedades.prp_pre >= $fila[dem_pre_min] and propiedades.prp_pre <= $fila[dem_pre_max]) or (propiedades.pre_inmo >= $fila[dem_pre_min] and propiedades.pre_inmo <= $fila[dem_pre_max]) )";
				}
				
				if($fila[pro_id]){
					$filtro.=" and propiedades.pro_id=$fila[pro_id] ";
				}
				
				if($filt_con){
					$filtro.="and ($filt_con)";		
				}
				
				if($filt_loc){
					$filtro.="and ($filt_loc)";		
				}
				
				if($filt_tip){
					$filtro.="and ($filt_tip)";		
				}
									
				//print "<Br> $prp_id select $regs from $tablas where $filtro <br>";		
				
				$result=mysql_query("select $regs from $tablas where $filtro");
				
				if(mysql_num_rows($result)){ //si encontro una demanda q satisface esa propiedad. 
					//print"--$fila[dem_id] --select $regs from $tablas where $filtro<br><br>";
					while ($fil_res=mysql_fetch_array($result)) {
						$string.="<tr><td  style='border:1px solid #CCCCCC;'> $fila[dem_dom] - $cad_loc </td> <td style='border:1px solid #CCCCCC;'> $cad_tip </td><td style='border:1px solid #CCCCCC;'> $cad_con </td> <td style='border:1px solid #CCCCCC;'> $fila[dem_pre_min] y $fila[dem_pre_max]  </td><td style='border:1px solid #CCCCCC;'> $fila[dem_raz] - Tel: $fila[dem_tel] </td><td style='border:1px solid #CCCCCC;'><a href=\\\"javascript:ventana('env_mail', 'prp_id=$fil_res[prp_id]&usr_id="._USR_ID."&to=$fila[dem_mail]&subject=Solicitud de inmueble&dem_raz=$fila[dem_raz]', 'system/send_mail.php', 'Enviar Mail - Notificar Demanda');\\\"> $fila[dem_mail] </a></td></tr></tr>";
						
					}
					
									
				}
		}
		
		if($string){  
		
			$string="<table width='100%'><tr><td colspan=4 style='font-weight:bold;border:2px solid #CCCCCC'>Coincidencias</td><td colspan=2 colspan=5 style='font-weight:bold;border:2px solid #CCCCCC'>Demandante</td></tr><tr><td style='font-weight:bold' width='145px;'> Domicilio </td> <td style='font-weight:bold' width='125px;'> Inmueble </td><td width='105px;' style='font-weight:bold'> Condicion </td> <td style='font-weight:bold' width='80px;'> Precio  </td><td  width='150px; 'style='font-weight:bold'> Contacto </td><td  width='100px;' style='font-weight:bold'> Enviar Mail</td></tr>".$string;
			$string.="</table>";
			print "
				<script language='javascript'>
						parent.Dialog.alert(\"<div style='font-size:12px;'><br>Estimado <b>".$_SESSION['usr_login']."</b>, Ud. acaba de agregar o modificar un inmueble que coincide con una o m�s demandas pendientes.<br><br>A trav�s del siguiente listado Ud. podr� comunicarse por telefono con el interesado o hacer click en<br>ENVIAR MAIL y el sistema enviar� automaticamente un aviso al interesado del inmueble en cartera.<br></div><br> $string \", {windowParameters: {className:\"alert\", width:700, height:400}, 
						okLabel: \"Cerrar\"
						 });
					hideToolTip();
				</script>
			";
			$volver=1;
		}else{
			$volver=0;
		}
		
	}
	
	return $volver;
	
}

function formato_fecha ($datetime, $modo){

		$datos = explode (" ", $datetime);
	
	switch ($modo){
	
		case "fecha":
			$new_fecha= substr($datos[0],8,2).'-'.substr($datos[0],5,2);
		break;

		case "fechaAll":
			$new_fecha= substr($datos[0],8,2).'-'.substr($datos[0],5,2).'-'.substr($datos[0],0,4);
		break;
		
		case "hora":
			$new_fecha = substr($datos[1],0,5);
		break;

		case "all":
			$new_fecha= substr($datos[0],8,2).'-'.substr($datos[0],5,2).' ('.substr($datos[1],0,5).')';
		break;

		case "trozoFecha":
			$new_fecha= explode ("-", $datos[0]);
		break;

		case "trozoHora":
			$new_fecha= explode (":", $datos[1]);
		break;
		
		default:
			$new_fecha = $datetime;
		break;
	}
	
	
	return $new_fecha;

}

function FUNC_brouserUsr(){ //echo FUNC_brouserUsr();
	if((ereg("Nav", $_SERVER["HTTP_USER_AGENT"])) || (ereg("Gold", $_SERVER["HTTP_USER_AGENT"])) || (ereg("X11", $_SERVER["HTTP_USER_AGENT"])) || (ereg("Mozilla", $_SERVER["HTTP_USER_AGENT"])) || (ereg("Netscape", $_SERVER["HTTP_USER_AGENT"])) AND (!ereg("MSIE", $_SERVER["HTTP_USER_AGENT"]) AND (!ereg("Konqueror", $_SERVER["HTTP_USER_AGENT"])))) $browser = "Netscape"; 

		elseif(ereg("MSIE", $_SERVER["HTTP_USER_AGENT"])) $browser = "MSIE";

		elseif(ereg("Lynx", $_SERVER["HTTP_USER_AGENT"])) $browser = "Lynx";

		elseif(ereg("Opera", $_SERVER["HTTP_USER_AGENT"])) $browser = "Opera";

		elseif(ereg("Netscape", $_SERVER["HTTP_USER_AGENT"])) $browser = "Netscape";

		elseif(ereg("Konqueror", $_SERVER["HTTP_USER_AGENT"])) $browser = "Konqueror";

		elseif((eregi("bot", $_SERVER["HTTP_USER_AGENT"])) || (ereg("Google", $_SERVER["HTTP_USER_AGENT"])) || (ereg("Slurp", $_SERVER["HTTP_USER_AGENT"])) || (ereg("Scooter", $_SERVER["HTTP_USER_AGENT"])) || (eregi("Spider", $_SERVER["HTTP_USER_AGENT"])) || (eregi("Infoseek", $_SERVER["HTTP_USER_AGENT"]))) $browser = "Bot";

		else $browser = "Other";
	
		return $browser;
}

/*	
	function redim_foto($foto,$dest)
	{
        $dim=@getimagesize($foto);
        $tama�o=@filesize($foto);
        $tam=640;
        $calidad=100;
        while($tama�o>70000)
        {
				$img_f=@ImageCreateFromJpeg($foto);//crea una variable para manejar la imagen
                $prop=@($tam/@imagesx($img_f));//calcula proporci�n
                $tam_x=$prop*(@imagesx($img_f));//recalcula los nuevos tama�os
                $tam_y=$prop*(@imagesy($img_f));
                $img_d=@imagecreate($tam_x,$tam_y);//crea imagen
                @ImageCopyResized($img_d,$img_f,0,0,0,0,$tam_x,$tam_y,imagesx($img_f),imagesy($img_f));//copia cambia
                @imageJpeg($img_d,$dest);
                clearstatcache();
                $tama�o=@filesize($dest);
                $tam-=1;
 		}
	}
*/
	function busq_binaria($foto,$dest)
	{
 		
		$upload=new upload();	
		
		/*$width=640;
		$prop = 0.5;
		$target_size = 70000;
		$tolerance = 10000;
		$inc=0.1;
		$i=0;
		$cad='';
		do{
			$img_f=ImageCreateFromJpeg($foto);//crea una variable para manejar la imagen
     		$tam_x=$prop*(imagesx($img_f));//recalcula los nuevos tama�os
   			$tam_y=$prop*(imagesy($img_f));
    		$img_d=imagecreatetruecolor($tam_x,$tam_y);//crea imagen
     		ImageCopyResized($img_d,$img_f,0,0,0,0,$tam_x,$tam_y,imagesx($img_f),imagesy($img_f));//copia cambia
			imagejpeg($img_d,$dest,10);
			clearstatcache();
			$diff = filesize($dest) - $target_size;
			if($diff > 0)
				$prop = $prop / (1.5 + $inc);
			else
				$prop = $prop * (1.5 - $inc);
			$inc=$inc+0.1;	
			$cad.="<br>Bucle: $i <\t>diff:$diff<\t>tolerance:$tolerance<\t>tam_x:$tam_x<\t>tam_y:$tam_y<\t>prop:$prop";
		}while(abs($diff) > $tolerance);
		*/
	}
	function redimensionar_foto($foto,$dest)
	{
		$fo = new Upload($_FILES[$foto]);
		if ($fo->uploaded) 
		{
		  // Guarda la foto sin cambios
		  $fo->Process($dest);
		  if ($fo->processed) { 
		    echo 'Foto original: copiada'; 
		  } else {
		    echo 'error : ' . $fo->error;
		  }
		  /*
		  // guarda la foto con un nuevo nombre
		  $fo->file_new_name_body = 'foto_nueva';
		  $fo->Process($dest);
		  if ($fo->processed) {
		    echo 'foto renombrada a foto_nueva: copiada';
		  } else { 
		    echo 'error : ' . $fo->error; 
		  }
		  
		  // guarda la foto con un nuevo nombre y tama�o de 100px de ancho
		  $fo->file_new_name_body = 'foto_modificada';
		  $fo->image_resize = true;
		  $fo->image_convert = jpg;
		  $fo->image_x = 100;
		  $fo->jpeg_quality = 50;
		  $fo->image_ratio_y = true;
		  $fo->Process($dest);
		  if ($fo->processed) {
		    echo 'foto renombrada, achicada, y convertida a JPG';
		    $fo->Clean();
		  } else {
		    echo 'error : ' . $fo->error;
		  }
		}		
		*/
		}
		return "FOTO $foto subida a $dest";
	}
	
	function redim_foto($foto,$dest,$nom_foto){
		
		$fo = new Upload($_FILES[$foto]);
		if ($fo->uploaded) {
		  // guarda la foto con un nuevo nombre y tama�o de 100px de ancho
		  $fo->file_new_name_body = $nom_foto;
		  $fo->image_resize = true;
		  $fo->image_convert = jpg;
		  $fo->image_ratio=true;
		  $fo->image_x = 640;
		  $fo->image_y = 480;
		  $fo->jpeg_quality = 70;
		  //$fo->image_ratio_x = true;
		  $fo->Process($dest);
		  echo "A: ".$fo->processed;
		  if ($fo->processed) {
		  	 //echo '<BR>foto renombrada, achicada, y convertida a JPG';
		    $fo->Clean();
		  } else {
		    echo 'Error al achicar la foto: ' . $fo->error." Foto: ".$foto ." _FILES=".$_FILES[$foto];
		  }
		
		  //Renombra la Foto achicada
			unlink($dest.$nom_foto.".gif");
			rename($dest.$nom_foto.".jpg" , $dest.$nom_foto.".gif");	
			

		}else{
			print "<br>Error : " . $fo->error ." Foto: ".$foto ." _FILES=".$_FILES[$foto];
		}		
	}	




function armar_script_web($usr_id){

	$str="<? include \"../parametros.php\";
			mysql_query(\"start transaction\");\n\r";	
	
	$cadena="select cambio_id,usr_id,cam_per_fot1,cam_per_fot2,cam_per_fot3,cam_per_logo from cambios_pagina";
	$result=mysql_query($cadena);

	while ($fila=mysql_fetch_array($result)) {
		$cadena="select 	
						per_denom,
						per_info,
						per_serv,
						per_pag,
						per_fot1,
						per_fot2,
						per_fot3,
						per_logo,
						usr_raz,
						usr_dom,
						usr_tel,
						usr_mail,
						pro_id,
						loc_id,
						fecha_act
				   from
						usuarios,
						personaliz
					where
						usuarios.usr_id=personaliz.usr_id and
						usuarios.usr_id=$usr_id
					
		";
	
		
		
		$res1=mysql_query($cadena);
		
		if(mysql_num_rows($res1)){
				$web=mysql_fetch_array($res1);
				//print mysql_num_fields($res1)."aa";
				$per_denom=addslashes($web[per_denom]);
				$per_info=addslashes($web[per_info]);
				$per_serv=addslashes($web[per_serv]);
				$per_pag=addslashes($web[per_pag]);
				$usr_raz=addslashes($web[usr_raz]);
				$usr_dom=addslashes($web[usr_dom]);
				$usr_tel=addslashes($web[usr_tel]);
				$usr_mail=addslashes($web[usr_mail]);
				
				$cadena="update usuarios set loc_id=$web[loc_id],pro_id=$web[pro_id],usr_raz='$usr_raz',usr_dom='$usr_dom',usr_tel='$usr_tel',usr_mail='$usr_mail',fecha_act='$web[fecha_act]' where usr_id=$usr_id";
				$str.="mysql_query(\"$cadena\") or \$error=\"Consulta: $cadena\".mysql_error();\r\n";		
				
				$cadena="update personaliz set per_denom='$per_denmo',per_info='$per_info',per_serv='$per_serv',per_pag='$per_pag',per_fot1='$web[per_fot1]',per_fot2='$web[per_fot2]',per_fot3='$web[per_fot3]',per_logo='$web[per_logo]' where usr_id=$usr_id";
				$str.="mysql_query(\"$cadena\") or \$error=\"Consulta: $cadena\".mysql_error();\r\n";		
				
		}
	
	}
	
	
			$str.="
								
					if(\$error){
						mysql_query(\"rollback\");
						?>
							<link rel=stylesheet href=\"inmoclick.css\" type=text/css>
							<div id=tabla1 class=celda_2 style='position:absolute;left:25%;top:20%;'>
								<table align=center border=0 width=60% cellspacing=0 style=\"border-top:1px solid #990000;border-bottom:1px solid #990000;border-left:1px solid #990000;border-right:1px solid #990000;\">
									<tr>
										<td style=\"font-family:verdana;font-size:11px;font-color:#DDDDDD;\" colspan=6><b>Ocurrio un error en la consulta. La actualizaci�n no se pudo llevar a cabo. <?print \$error?></b></td>
									</tr>
									<tr>
										<td style=\"font-family:verdana;font-size:11px;font-color:#DDDDDD;\" colspan=6><b><? 
											mail(\"aldo@cocucci.com.ar\",\"Informe de error usuario \$usr_id\ - \$usr_raz\",\"El usuario \$usr_id - \$usr_raz no ha podido actualizar sus inmuebles en internet:\$error\");				mail(\"nicolas@puntosero.com\",\"Informe de error usuario \$usr_id\ - \$usr_raz\",\"El usuario \$usr_id - \$usr_raz no ha podido actualizar sus inmuebles en internet:\$error\");	
											
										?>Se ha enviado un informe de error.</b></b></td>
									</tr>
								</table>		
							</div>
							
							<?
					}else{
						
						
						mysql_query(\"commit\");
						//mysql_query(\"rollback\");
					//	print\"actualizo joya\";
					//	print \$usr_cim;
					//	exit();
						?>
							<script language=\"javascript\">
									location.href='http://<?print \$ip?><?print \$ADMIN?>/detalle_modif_web.php?usr_id=<?print \$usr_id?>&usuario=<?print \$usuario?>&actualizacion=1&ip_local=<?print \$ip?>';
							</script>
						
						<?
					}
					
					?>
				";
				
				if($fp2=fopen("../inmo$usr_id/act_web_$usr_id.php","w+")){
					fputs($fp2,$str);
					return 1;
				}else{
					return 0;
				}


}


function armar_script_bar_priv($usr_id){
	
	$str="<? include \"../parametros.php\";
						mysql_query(\"start transaction\");\n\r";	
		
				$cadena="select cambio_id,cambio_det,bar_id,usr_id,cambio_fotos from cambios_bar_priv";
				
				$result=mysql_query($cadena);
				$str2="";
				$j=0;
				
				//Cuando se instale en cocucci, hay q agregar el campo usr_id en bar_priv en internet. y probar la subida. 
				while ($fila=mysql_fetch_array($result)){
				//while (0){
					$cadena="select * from bar_priv where usr_id=$fila[usr_id] and bar_id=$fila[bar_id]";
					$res1=mysql_query($cadena);
					
	//				print $cadena."<br>";
					
					switch ($fila[cambio_det]){
						case "alta":
								if(mysql_num_rows($res1)){
									
									$prp=mysql_fetch_array($res1);
									$cadena="insert into bar_priv  values($prp[bar_id],
																		  $prp[usr_id],
																			'$prp[bar_denom]',
																			'$prp[bar_sup_tot]',
																			'$prp[bar_sup_lot]',
																			'$prp[bar_cant_lot]',
																			'$prp[bar_serv]',
																			'$prp[bar_cont]',
																			'$prp[bar_tel]',
																			'$prp[bar_mail]',
																			'$prp[loc_id]',
																			'$prp[pro_id]',
																			'$prp[pai_id]',
																			'$prp[bar_zona]',
																			'$prp[bar_dir]',
																			'$prp[bar_comp_priv]',
																			'$prp[bar_url]',
																			'$prp[bar_logo]',
																			'$prp[bar_desc]'
																			)
																			
																			";
									$str.="mysql_query(\"$cadena\") or \$error=\"Consulta: insert $prp[bar_id] - $prp[usr_id]\".mysql_error();\r\n";	

									//fotos	
									$res_alt=mysql_query("select * from fotos_x_bar where bar_id=$fila[bar_id] and usr_id=$fila[usr_id]");	
									
									while ($fila_fot=mysql_fetch_array($res_alt)){
											$cadena="delete from fotos_x_bar where bar_id=$fila[bar_id] and usr_id=$fila[usr_id] and fo_id='$fila_fot[fo_id]'";
											$str.="mysql_query(\"$cadena\") or \$error=\"Consulta: $cadena\".mysql_error();\r\n";	
											$cadena="insert into fotos_x_bar values('',$fila[bar_id],$fila[usr_id],$fila_fot[fo_id],'$fila_fot[fo_desc]')";							
											$str.="mysql_query(\"$cadena\") or \$error=\"Consulta: $cadena\".mysql_error();\r\n";	
									}	
										
								}//fin if mysql_num_rows
												  	
							break;	
							case "modificacion":
						
								if(mysql_num_rows($res1)){
						
									$prp=mysql_fetch_array($res1);
																														
									$cadena="update bar_priv set 
																	bar_denom='$prp[bar_denom]',
																	bar_sup_tot='$prp[bar_sup_tot]',
																	bar_sup_lot='$prp[bar_sup_lot]',
																	bar_cant_lot='$prp[bar_cant_lot]',
																	bar_serv='$prp[bar_serv]',
																	bar_cont='$prp[bar_cont]',
																	bar_tel='$prp[bar_tel]',
																	bar_mail='$prp[bar_mail]',
																	loc_id='$prp[loc_id]',
																	pro_id='$prp[pro_id]',
																	pai_id='$prp[pai_id]',
																	bar_zona='$prp[bar_zona]',
																	bar_dir='$prp[bar_dir]',
																	bar_comp_priv='$prp[bar_comp_priv]',
																	bar_url='$prp[bar_url]',
																	bar_logo='$prp[bar_logo]',
																	bar_desc='$prp[bar_desc]'
															 where bar_id=$fila[bar_id] and usr_id=$fila[usr_id])";
									$str.="mysql_query(\"$cadena\") or \$error=\"Consulta: update $prp[bar_id] - $prp[usr_id]\".mysql_error();\r\n";		
									
									//fotos	
									$res_alt=mysql_query("select * from fotos_x_bar where bar_id=$fila[bar_id] and usr_id=$fila[usr_id]");	
									$cadena="delete from fotos_x_bar where bar_id=$fila[bar_id] and usr_id=$fila[usr_id]";
									$str.="mysql_query(\"$cadena\") or \$error=\"Consulta: $cadena\".mysql_error();\r\n";	
									while ($fila_fot=mysql_fetch_array($res_alt)){
											
											$cadena="insert into fotos_x_bar values('',$fila[bar_id],$fila[usr_id],$fila_fot[fo_id],'$fila_fot[fo_desc]')";							
											$str.="mysql_query(\"$cadena\") or \$error=\"Consulta: $cadena\".mysql_error();\r\n";	
									}
									
									$vector=explode("x",$fila[cambios_fotos]);
									//print "VECTOR - ".count($vector);
									for($i=1;$i<=count($vector)-1;$i++){
										$verif=mysql_query("select * from fotos_x_bar where bar_id=$fila[bar_id] and usr_id=$fila[usr_id] and fo_id=$vector[$i]") or die(mysql_error());
										if(!mysql_num_rows($verif)){
											
												$str2.="exec('rm ./fotos/$fila[bar_id]-$fila[usr_id]-$vector[$i].gif');\r\n";
										}
									}					
									
									
								}	
								
								
							break;
							
							case "eliminacion":
								
									$cadena="delete from bar_priv where usr_id=$fila[usr_id] and bar_id=$fila[bar_id]";
									$str.="mysql_query(\"$cadena\") or \$error=\"Consulta: $cadena\".mysql_error();\r\n";	
									
								//fotos	
								$res_alt=mysql_query("select * from fotos where bar_id=$fila[bar_id] and usr_id=$fila[usr_id]");	
								while ($fila_fot=mysql_fetch_array($res_alt)){
										$str2.="exec('rm ./fotos/$fila_fot[fo_desc]');\r\n";
								}	
									
										
								$cadena="delete from fotos_x_bar where usr_id=$fila[usr_id] and bar_id=$fila[bar_id]";					
								$str.="mysql_query(\"$cadena\") or \$error=\"Consulta: $cadena\".mysql_error();\r\n";	
								
							break;
					}
				}
		
			/*	$str.="\n
						\$command=\"chmod -R 777 ./fotos/*\";
						exec(\$command);
						\n";	
				*/
				
							
				$str.="
								
					if(\$error){
						\$e=1;
						mysql_query(\"rollback\");
						?>
							<link rel=stylesheet href=\"inmoclick.css\" type=text/css>
							<div id=tabla1 class=celda_2 style='position:absolute;left:25%;top:20%;'>
								<table align=center border=0 width=60% cellspacing=0 style=\"border-top:1px solid #990000;border-bottom:1px solid #990000;border-left:1px solid #990000;border-right:1px solid #990000;\">
									<tr>
										<td style=\"font-family:verdana;font-size:11px;font-color:#DDDDDD;\" colspan=6><b>Ocurrio un error en la consulta. La actualizaci�n no se pudo llevar a cabo. <?print \$error?></b></td>
									</tr>
									<tr>
										<td style=\"font-family:verdana;font-size:11px;font-color:#DDDDDD;\" colspan=6><b><? 
											mail(\"aldo@cocucci.com.ar\",\"Informe de error usuario \$usr_id \$usr_raz \",\"El usuario \$usr_id \$usr_raz no ha podido actualizar sus barrios privados en internet:\$error\");		
											mail(\"nicolas@puntosero.com\",\"Informe de error usuario \$usr_id \$usr_raz \",\"El usuario \$usr_id \$usr_raz no ha podido actualizar sus barrios privados en internet:\$error\");	
											
										?>Se ha enviado un informe de error.</b></b></td>
									</tr>
								</table>		
							</div>
							
							<?
					}else{
							$str2
							\$e=0;
							mysql_query(\"commit\");
					}		
							";
	
				$str.="
						
						
						?>
							
						
							<script language=\"javascript\">
									location.href=\"http://<?print \$ip?>/inmohostV2.0/system/actualizador_pre.php?usr_id=<?print \$usr_id?>&borrar_cache_bar_priv=1&e=<?print \$e?>\";
							</script>
						
						<?
					
					
					?>
				";
				
				
				
			
				if($fp2=fopen("act_bar_priv_$usr_id.php","w+")){
					fputs($fp2,$str);
					return 1;
				}else{
					return 0;
				}
	
	
}

function armar_script_emp($usr_id){
	
	$str="<? include \"../parametros.php\";
						mysql_query(\"start transaction\");\n\r";	
		
				$cadena="select cambio_id,cambio_det,emp_id from cambios_emp";
				
				$result=mysql_query($cadena);
				$str2="";
				$j=0;
				
				//Cuando se instale en cocucci, hay q agregar el campo usr_id en bar_priv en internet. y probar la subida. 
				while ($fila=mysql_fetch_array($result)){
				//while (0){
					
					$cadena="select * from empleados where emp_id=$fila[emp_id]";
					$res1=mysql_query($cadena);
					
	//				print $cadena."<br>";
					$prp=mysql_fetch_array($res1);
					switch ($fila[cambio_det]){
						case "alta":
								if(mysql_num_rows($res1)){
									
								
									$cadena="delete from empleados where emp_id=$prp[emp_id] and usr_id=$usr_id";	
									$str.="mysql_query(\"$cadena\") or \$error=\"Consulta: delete before insert $prp[emp_id] - $usr_id\".mysql_error();\r\n";	
									
									$cadena="insert into empleados  values( $prp[emp_id],
																		    '$prp[nombre]',
																			'$prp[apellido]',
																			'$prp[telefono]',
																			'$prp[domicilio]',
																			'$prp[email]',
																			'$prp[usr_login]',
																			'$prp[usr_pass]',
																			'$prp[priv_id]',
																			'$prp[usr_tpo]',
																			'$prp[fo_id]',
																			'$prp[tel_inmo]',
																			'$prp[sexo]',
																			'$prp[emp_adm]',
																			'$prp[mostrar]',
																			'$prp[sec_id]',
																			'$prp[descripcion]',
																			$usr_id
																			)
																			
																			";
									$str.="mysql_query(\"$cadena\") or \$error=\"Consulta: insert $prp[emp_id] - $usr_id\".mysql_error();\r\n";	

									
										
								}//fin if mysql_num_rows
												  	
							break;	
							case "modificacion":
														
								if(mysql_num_rows($res1)){
									//print "modificacion<br>";
									$prp=mysql_fetch_array($res1);
								
																								
									$cadena="update empleados set 
																	nombre='$prp[nombre]',
																	apellido='$prp[apellido]',
																	telefono='$prp[telefono]',
																	email='$prp[email]',
																	domicilio='$prp[domicilio]',
																	usr_login='$prp[usr_login]',
																	usr_pass='$prp[usr_pass]',
																	usr_tpo='$prp[usr_tpo]',
																	priv_id='$prp[priv_id]',
																	fo_id='$prp[fo_id]',
																	sexo='$prp[sexo]',
																	tel_inmo='$prp[tel_inmo]',
																	emp_adm='$prp[emp_adm]',
																	mostrar='$prp[mostrar]',
																	sector='$prp[sec_id]',
																	descripcion='$prp[descripcion]'
															 where emp_id=$fila[emp_id] and usr_id=$usr_id
															 ";
									$str.="mysql_query(\"$cadena\") or \$error=\"Consulta: update $prp[emp_id] - $prp[usr_id]\".mysql_error();\r\n";		
									
								}	
								
								
							break;
							
							case "eliminacion":
								
									$cadena="delete from empleados where usr_id=$usr_id and emp_id=$fila[emp_id]";
									$str.="mysql_query(\"$cadena\") or \$error=\"Consulta: $cadena\".mysql_error();\r\n";	
									
								
								
							break;
					}
				}
		
							
				$str.="
					if(\$error){
						mysql_query(\"rollback\");
						\$e=1;
						?>
							<link rel=stylesheet href=\"inmoclick.css\" type=text/css>
							<div id=tabla1 class=celda_2 style='position:absolute;left:25%;top:20%;'>
								<table align=center border=0 width=60% cellspacing=0 style=\"border-top:1px solid #990000;border-bottom:1px solid #990000;border-left:1px solid #990000;border-right:1px solid #990000;\">
									<tr>
										<td style=\"font-family:verdana;font-size:11px;font-color:#DDDDDD;\" colspan=6><b>Ocurrio un error en la consulta. La actualizaci�n no se pudo llevar a cabo. <?print \$error?></b></td>
									</tr>
									<tr>
										<td style=\"font-family:verdana;font-size:11px;font-color:#DDDDDD;\" colspan=6><b><? 
											mail(\"aldo@cocucci.com.ar\",\"Informe de error usuario \$usr_id \$usr_raz \",\"El usuario \$usr_id \$usr_raz no ha podido actualizar sus empleados en internet:\$error\");		
											mail(\"nicolas@puntosero.com\",\"Informe de error usuario \$usr_id \$usr_raz \",\"El usuario \$usr_id \$usr_raz no ha podido actualizar sus empleados en internet:\$error\");	
											
										?>Se ha enviado un informe de error.</b></b></td>
									</tr>
								</table>		
							</div>
							
							<?
					}else{
							$str2
						mysql_query(\"commit\");	
						\$e=0;
					}		";
					
				$str.="
						
						
						?>
							
						
							<script language=\"javascript\">
									location.href=\"http://<?print \$ip?>/inmohostV2.0/system/actualizador_pre.php?usr_id=$usr_id&borrar_cache_usuario=1&e=<?print \$e?>\";
							</script>
						
						<?
					
					
					?>
				";
				
				
				
			
				if($fp2=fopen("act_emp_$usr_id.php","w+")){
					fputs($fp2,$str);
					return 1;
				}else{
					return 0;
				}
}


function armar_script($usr_id){
				
				$HOST_GD="www.cocucci.com.ar";     
				$USUARIO_GD="cocucci_usr";
				$PASSWORD_GD="dekonoli321";
				$BASE_DATOS_GD="cocucci_web";
		
				$str="<?
						extract(\$_GET); 
						include \"../parametros.php\";
					    include \"../include/funciones/funciones.php\";
						mysql_query(\"start transaction\");\n\r";	
		
				$cadena="select cambio_id,cambio_det,prp_id,usr_id,cambios_fotos from cambios";
	            $result=mysql_query($cadena);
				$str2="";
				$j=0;
				
				while ($fila=mysql_fetch_array($result)){
					
					$cadena="select * from propiedades where usr_id=$fila[usr_id] and prp_id=$fila[prp_id]";
					$res1=mysql_query($cadena);
		
					switch ($fila[cambio_det]){

						case "alta":
								if(mysql_num_rows($res1)){
									
									$prp=mysql_fetch_array($res1);
								
									$prp_desc=$prp[prp_desc];
									$prp_servicios=$prp[prp_servicios];
									$prp_dom=$prp[prp_dom];
									$prp_nota=$prp[prp_nota];
									$prp_bar=$prp[prp_bar];
									$prp_visibilidad=$prp[prp_visibilidad];
									//Manejo de Barrio Privado para busqueda por filtros en inmoclick
									if ($prp[bar_priv_id]>0){
										$bar_priv_id=1;	
									}else{
										$bar_priv_id=0;	
									}									

									//borro fotos	
									$cadena="delete from fotos where prp_id=$fila[prp_id] and usr_id=$fila[usr_id]";
									$str.="mysql_query(\"$cadena\") or \$error=\"Consulta: $cadena\".mysql_error();\r\n";		
									$godaddy[0]=$cadena;

									//borro servicios
									$cadena="delete from ser_x_prp_ihost where prp_id=$fila[prp_id] and usr_id=$fila[usr_id]";
									$str.="mysql_query(\"$cadena\") or \$error=\"Consulta: $cadena\".mysql_error();\r\n";	
									$godaddy[1]=$cadena;

									//borro propiedad
									$cadena="delete from propiedades where prp_id=$prp[prp_id] and usr_id=$prp[usr_id]";
									$str.="mysql_query(\"$cadena\") or \$error=\"Consulta: delete prp $prp[prp_id] - $prp[usr_id]\".mysql_error();\r\n";	
									$godaddy[2]=$cadena;

									//inserto propiedad
									$cadena="insert into propiedades (prp_id,prp_dom,prp_bar,loc_id,pro_id,pai_id,ori_id,con_id,prp_desc,prp_visitas,usr_id,tip_id,prp_mod,prp_nota,prp_pre,prp_pub,prp_mostrar,prp_pre_dol,prp_llave,prp_alta,prp_cartel,prp_referente,prp_tas,prp_aut,pre_inmo,pre_prop,pre_trans,prp_insc_dom,publica,prp_visibilidad,prp_servicios,bar_priv_id,fotos,mos_por_1,mos_por_2,mos_por_3,mos_por_4,prp_anonimo,prp_vip,prp_lat,prp_lng,prp_plano,tipo_aviso_id) values($prp[prp_id],'$prp_dom','$prp_bar',$prp[loc_id],$prp[pro_id],$prp[pai_id],$prp[ori_id],$prp[con_id],'$prp_desc',$prp[prp_visitas],$prp[usr_id],$prp[tip_id],'$prp[prp_mod]','$prp_nota','$prp[prp_pre]','$prp[prp_pub]',$prp[prp_mostrar],$prp[prp_pre_dol],$prp[prp_llave],'$prp[prp_alta]','$prp[prp_cartel]',$prp[prp_referente],'$prp[prp_tas]','$prp[prp_aut]','$prp[pre_inmo]','$prp[pre_prop]','$prp[pre_trans]','$prp[prp_insc_dom]',$prp[publica],'$prp_visibilidad','$prp_servicios',$bar_priv_id,$prp[fotos],$prp[mos_por_1],$prp[mos_por_2],$prp[mos_por_3],$prp[mos_por_4],$prp[prp_anonimo],'$prp[prp_vip]','$prp[prp_lat]','$prp[prp_lng]','$prp[prp_plano]','8')";
									$str.="mysql_query(\"$cadena\") or \$error=\"Consulta: insert $prp[prp_id] - $prp[usr_id]\".mysql_error();\r\n";	
									$godaddy[3]=$cadena;

									$cant_fotos_gd=4;
									//inserto en servicios
									$res_alt=mysql_query("select * from ser_x_prp_ihost where prp_id=$fila[prp_id] and usr_id=$fila[usr_id]");	
									while ($fila_ser=mysql_fetch_array($res_alt)){
											
											$cadena="insert into ser_x_prp_ihost (prp_id,ser_id,valor,usr_id) values('$fila[prp_id]',$fila_ser[ser_id],'$fila_ser[valor]',$fila[usr_id])";							
											$str.="mysql_query(\"$cadena\") or \$error=\"Consulta: $cadena\".mysql_error();\r\n";	
											$godaddy[$cant_fotos_gd]=$cadena;	
											$cant_fotos_gd++;
									}

									//inserto en fotos
									$res_alt=mysql_query("select * from fotos where prp_id=$fila[prp_id] and usr_id=$fila[usr_id]");					
									while ($fila_fot=mysql_fetch_array($res_alt)){
											$cadena="insert into fotos (fo_enl,prp_id,usr_id,fo_nro,fo_desc) values('$fila_fot[fo_enl]',$fila[prp_id],$fila[usr_id],$fila_fot[fo_nro],'$fila_fot[fo_desc]')";		
											$str.="mysql_query(\"$cadena\") or \$error=\"Consulta: $cadena\".mysql_error();\r\n";	
											$godaddy[$cant_fotos_gd]=$cadena;
											$cant_fotos_gd++;
									}
										
								}//fin if mysql_num_rows

								//CONECTO CON COCUCCI SERVER
								$db_gd=mysql_connect($HOST_GD,$USUARIO_GD,$PASSWORD_GD);
								if (!$db_gd) {
								    die('<br>No pudo conectarse para dar de Alta: '.mysql_error());
								}
								mysql_select_db($BASE_DATOS_GD,$db_gd);
								mysql_query("SET CHARACTER SET latin1");
								mysql_query("SET NAMES latin1");
								//RECORRO EL VECTOR Y EJECUTO LOS CAMBIOS
								for($j=0;$j<$cant_fotos_gd;$j++){
										$res=mysql_query($godaddy[$j]) or die(mysql_error("<br>ERROR: ".$godaddy[$j].";"));
								}//fin for
								//DESCONECTO CON GODADDY
								mysql_close($db_gd);

												  	
							break;	
							case "modificacion":

								if(mysql_num_rows($res1)){
								//	print "modificacion<br>";
									$prp=mysql_fetch_array($res1);
								
									$prp_desc=$prp[prp_desc];
									$prp_servicios=$prp[prp_servicios];
									$prp_dom=$prp[prp_dom];
									$prp_nota=$prp[prp_nota];
									$prp_bar=$prp[prp_bar];
									$prp_visibilidad=$prp[prp_visibilidad];
									
									//Manejo de Barrio Privado para busqueda por filtros en inmoclick
									if ($prp[bar_priv_id]>0){
										$bar_priv_id=1;	
									}else{
										$bar_priv_id=0;	
									}

									$cadena="update propiedades set fotos='$prp[fotos]',loc_id=$prp[loc_id],pro_id=$prp[pro_id],prp_bar='$prp_bar',prp_dom='$prp_dom',pai_id='$prp[pai_id]',con_id='$prp[con_id]',tip_id='$prp[tip_id]',prp_pre=$prp[prp_pre],prp_desc='$prp_desc',prp_nota='$prp_nota',prp_mod='$prp[prp_mod]',ori_id=$prp[ori_id],prp_pub='$prp[prp_pub]',prp_pre_dol='$prp[prp_pre_dol]',prp_llave='$prp[prp_llave]',prp_cartel='$prp[prp_cartel]',prp_referente='$prp[prp_referente]',prp_tas='$prp[prp_tas]',prp_aut='$prp[prp_aut]',pre_inmo='$prp[pre_inmo]',pre_prop='$prp[pre_prop]',pre_trans='$prp[pre_trans]',prp_insc_dom='$prp[prp_insc_dom]',publica=$prp[publica],prp_visibilidad='$prp_visibilidad',prp_servicios='$prp_servicios',prp_mostrar=$prp[prp_mostrar],mos_por_1=$prp[mos_por_1],mos_por_2=$prp[mos_por_2],mos_por_3=$prp[mos_por_3],mos_por_4=$prp[mos_por_4],prp_anonimo=$prp[prp_anonimo],prp_vip='$prp[prp_vip]',prp_lat='$prp[prp_lat]', prp_lng='$prp[prp_lng]', prp_plano='$prp[prp_plano]', bar_priv_id=$bar_priv_id where prp_id=$fila[prp_id] and (usr_id=$fila[usr_id] or usr_id=0)";
									$str.="mysql_query(\"$cadena\") or \$error=\"Consulta: update insert $prp[prp_id] - $prp[usr_id]\".mysql_error();\r\n";	
									$godaddy[0]=$cadena;

									//fotos	
									$res_alt=mysql_query("select * from fotos where prp_id=$fila[prp_id] and usr_id=$fila[usr_id]");	
									$cadena="delete from fotos where prp_id=$fila[prp_id] and usr_id=$fila[usr_id]";
									$str.="mysql_query(\"$cadena\") or \$error=\"Consulta: $cadena\".mysql_error();\r\n";	
									$godaddy[1]=$cadena;
									
									$cant_fotos_gd=2;
									while ($fila_fot=mysql_fetch_array($res_alt)){
											
											$cadena="insert into fotos (fo_enl,prp_id,usr_id,fo_nro,fo_desc) values('$fila_fot[fo_enl]',$fila[prp_id],$fila[usr_id],$fila_fot[fo_nro],'$fila_fot[fo_desc]')";							
											$str.="mysql_query(\"$cadena\") or \$error=\"Consulta: $cadena\".mysql_error();\r\n";
											$godaddy[$cant_fotos_gd]=$cadena;
											$cant_fotos_gd++;
									}
									
									$vector=explode("x",$fila[cambios_fotos]);
									//print "VECTOR - ".count($vector);
									for($i=1;$i<=count($vector)-1;$i++){
										$verif=mysql_query("select * from fotos where prp_id=$fila[prp_id] and usr_id=$fila[usr_id] and fo_nro=$vector[$i]") or die(mysql_error());
										if(!mysql_num_rows($verif)){
											
												$str2.="exec('rm ../fotos/$fila[prp_id]-$fila[usr_id]-$vector[$i].gif');\r\n";
										}
									}					
									
									
									//servicios
									$res_alt=mysql_query("select * from ser_x_prp_ihost where prp_id=$fila[prp_id] and usr_id=$fila[usr_id]");	
									$cadena="delete from ser_x_prp_ihost where prp_id=$fila[prp_id] and usr_id=$fila[usr_id]";
									$str.="mysql_query(\"$cadena\") or \$error=\"Consulta: $cadena\".mysql_error();\r\n";	
									$godaddy[$cant_fotos_gd]=$cadena;

									$cant_fotos_gd++;
									while ($fila_ser=mysql_fetch_array($res_alt)){
											
											$cadena="insert into ser_x_prp_ihost (prp_id,ser_id,valor,usr_id) values('$fila[prp_id]',$fila_ser[ser_id],'$fila_ser[valor]',$fila[usr_id])";							
											$str.="mysql_query(\"$cadena\") or \$error=\"Consulta: $cadena\".mysql_error();\r\n";
											$godaddy[$cant_fotos_gd]=$cadena;
											$cant_fotos_gd++;
									}
									
								}// fin if	

								//CONECTO CON COCUCCI SERVER
								$db_gd=mysql_connect($HOST_GD,$USUARIO_GD,$PASSWORD_GD);
								if (!$db_gd) {
								    die('<br>No pudo conectarse para Modificar: '.mysql_error());
								}
								mysql_select_db($BASE_DATOS_GD,$db_gd);
								mysql_query("SET CHARACTER SET latin1");
								mysql_query("SET NAMES latin1");
								//RECORRO EL VECTOR Y EJECUTO LOS CAMBIOS EN GODADDY
								for($j=0;$j<$cant_fotos_gd;$j++){
										$res=mysql_query($godaddy[$j]) or die(mysql_error("<br>ERROR: ".$godaddy[$j].";"));
								}//fin for			
								//DESCONECTO CON GODADDY
								mysql_close($db_gd);

							break;
							
							case "eliminacion":

								//fotos	
								$res_alt=mysql_query("select * from fotos where prp_id=$fila[prp_id] and usr_id=$fila[usr_id]");	
								while ($fila_fot=mysql_fetch_array($res_alt)){
										$str2.="exec('rm ./fotos/$fila_fot[fo_enl]');\r\n";
								}	
									
										
								$cadena="delete from fotos where usr_id=$fila[usr_id] and prp_id=$fila[prp_id]";					
								$str.="mysql_query(\"$cadena\") or \$error=\"Consulta: $cadena\".mysql_error();\r\n";	
								$godaddy[0]=$cadena;

								$cadena="delete from ser_x_prp_ihost where usr_id=$fila[usr_id] and prp_id=$fila[prp_id]";
								$str.="mysql_query(\"$cadena\") or \$error=\"Consulta: $cadena\".mysql_error();\r\n";	
								$godaddy[1]=$cadena;

								$cadena="delete from propiedades where usr_id=$fila[usr_id] and prp_id=$fila[prp_id]";
								$str.="mysql_query(\"$cadena\") or \$error=\"Consulta: $cadena\".mysql_error();\r\n";	
								$godaddy[2]=$cadena;

								//CONECTO CON EL SERVER COCUCCI
								$db_gd=mysql_connect($HOST_GD,$USUARIO_GD,$PASSWORD_GD);
								if (!$db_gd) {
								    die('<br>No pudo conectarse para Eliminar: '.mysql_error());
								}
								mysql_select_db($BASE_DATOS_GD,$db_gd);
								mysql_query("SET CHARACTER SET latin1");
								mysql_query("SET NAMES latin1");
								//RECORRO EL VECTOR Y EJECUTO LOS CAMBIOS
								for($j=0;$j<3;$j++){
										$res=mysql_query($godaddy[$j]) or die(mysql_error("<br>ERROR: ".$godaddy[$j].";"));
								}//fin for
								//DESCONECTO CON GODADDY
								mysql_close($db_gd);

							break;

					}// Fin Switch

				}//fin while

				$str.="\n
				//		\$command=\"chmod -R 777 ./fotos/*\";
				//		exec(\$command);
						\n";	
				
				
					/*	$cad="select distinct prp_id from cambios";
						$result=mysql_query($cad);
						
							$str.="
									\$usuarios=get_usuarios(\$usr_id);
									for(\$i=0;\$i<count(\$usuarios);\$i++){
							";
										$str.="mysql_query(\"insert into cam_red_cim values(\$usuarios[\$i],0,$usr_id)\");\r\n";
									
							$str.="}
								
							";		
				*/
				
				
				$usr_cim=mysql_result(mysql_query("select usr_cim from usuarios where usr_id=$usr_id"),0,0);
				$usr_raz=mysql_result(mysql_query("select usr_raz from usuarios where usr_id=$usr_id"),0,0);
	
				$str.="
								
				\$cad1=\"select usr_cim,usr_raz from usuarios where usr_id=\$usr_id\";
				\$usr_cim=mysql_result(mysql_query(\$cad1),0,0);
				\$usr_raz=mysql_result(mysql_query(\$cad1),0,1);


					if(\$error){
						mysql_query(\"rollback\");
						\$e=1;
						?>
							<link rel=stylesheet href=\"inmoclick.css\" type=text/css>
							<div id=tabla1 class=celda_2 style='position:absolute;left:25%;top:20%;'>
								<table align=center border=0 width=60% cellspacing=0 style=\"border-top:1px solid #990000;border-bottom:1px solid #990000;border-left:1px solid #990000;border-right:1px solid #990000;\">
									<tr>
										<td style=\"font-family:verdana;font-size:11px;font-color:#DDDDDD;\" colspan=6><b>Ocurrio un error en la consulta. La actualizaci�n no se pudo llevar a cabo. <?print \$error?></b></td>
									</tr>
									<tr>
										<td style=\"font-family:verdana;font-size:11px;font-color:#DDDDDD;\" colspan=6><b><? 
											mail(\"aldo@cocucci.com.ar\",\"Informe de error usuario \$usr_raz (\$usr_id) \",\"El usuario \$usr_raz (\$usr_id) no ha podido actualizar sus inmuebles en internet:\n\r \$error \n\r \");	
											
										?>Se ha enviado un informe de error.</b></b></td>
									</tr>
								</table>		
							</div>
							
							<?
					}else{
							$str2
							mysql_query(\"commit\");
							\$e=0;
					 }		";
				
				$str.="
						
						?>
							<script language=\"javascript\">
								location.href=\"../act_inmohost.php?usr_id=17&ip=192.168.0.22&e=<?print \$e?>\";
							</script>
						
						<?
					
					
					?>
				";
				
				
				if($fp2=fopen("act_online_$usr_id.php","w+")){
					fputs($fp2,$str);
					return 1;
				}else{
					return 0;
				}
}
	
function armar_script_medios($usr_id){

	$mails="";
	
	$str="<? include \"../parametros.php\r\n \";
	
				
			\$cad=mysql_query(\"select * from usuarios where usr_id="._USR_ID."\") or \$error=\"No selecciona usuarios\";
			\$res=mysql_fetch_array(\$cad);
			
			\$header = \"From: "._USR_RAZ." <\$res[usr_mail]>\";\r\n
			\$header.= \"Reply-To: "._USR_RAZ." <\$res[usr_mail]>\";\r\n
			\$subject=\"Publicacion en la grafica\";
			
			";	

	$diarios="select * from receptores";
	$res_dia=mysql_query($diarios);
//recorro todos los medios para armar un mail por cada medio.
	while ($fila_diarios=mysql_fetch_array($res_dia)){
		
		$str.="		
				\$to=\"$fila_diarios[mail]\";
			";
		if($fila_diarios[mailcc]){
		
			$str.=" 
				\$header=\"Cc: $fila_diarios[mailcc]\r\n\";
			";
		}
		
		//comienzo a armar el mail
		$mails.="Estimados $fila_diarios[med_raz]:\r\n\r\nPr�ximos avisos:\r\n\r\n";
				
		$cadena="select 
						cambios_medios.*,
						publicaciones.*
				 from 
					  cambios_medios,
					  publicaciones
				 where
				 	  cambios_medios.pub_id=publicaciones.pub_id and
				 	  publicaciones.dia_id=$fila_diarios[rec_id]";
		
		$result=mysql_query($cadena);	
		//recorro todas las publicaciones que hay para ese medio
		$i=1;
		while ($fila_cambios=mysql_fetch_array($result)){

			$cadena=" select 	
						propiedades.prp_pub
				   from
						propiedades
				   where
						propiedades.prp_id=$fila_cambios[prp_id] and
						propiedades.usr_id="._USR_ID."
				";
			 $res_pubs=mysql_query($cadena);
			 $prp_pub=mysql_result($res_pubs,0,0);
			
			//Completo el mail
			$fechas=split("x",$fila_cambios[pub_dia]);
			
			$mails.="\r\nAviso $i:## $prp_pub ";
			
			for($i=0;$i<count($fechas);$i++){
				
				$mails.=$fechas[$i]." - ";
			}
			
			$i++;
			
			$mails.=" ##\r\n";
				
		}				
		
				
			$mails.="\n\rAtte. "._USR_RAZ."\r\n";	
			$mails.=_USR_DOM."\r\n";	
			$mails.=_USR_TEL."\r\n";
		
		$str.="\$message=\"$mails\";\r\n
		
		\$res_env_mail=mail(\$to,\$subject,\$message,\$header);\r\n
		
		";	
				
					
	}
		$str.="?>
		
			<body onload=\"location.href='http://<?print \$ip?>/inmohostV2.0/system/actualizador_pre.php?borrar_cache_medios=1';\">
			</body>
		
		";		
	
		if($fp2=fopen("act_medios_$usr_id.php","w+")){
			fputs($fp2,$str);
			return 1;
		}else{
			return 0;
		}
}

function mandar_mail($From,$FromName,$to,$cc,$subject,$msg,$MAIL_SMTP,$MAIL_USR,$MAIL_PASS,$att_ruta,$att_nom){				
		
		$mail = new PHPMailer();
		$mail->SetLanguage("es","c:/wamp/www/inmohostV2.0/system/php/classes/language/");
		//$mail->Timeout=60;
		//$mail->SMTPDebug=true;
		$mail->IsSMTP();  // set mailer to use SMTP
		$mail->Host = $MAIL_SMTP;  // specify main and backup server
		$mail->SMTPAuth = true;     // turn on SMTP authentication
		$mail->Username = $MAIL_USR;  // SMTP username
		$mail->Password = $MAIL_PASS; // SMTP password
		
		$mail->From=$From;
		$mail->FromName=$FromName;
		$mail->AddAddress($to, $FromName);
		$mail->AddReplyTo($From);
		if($cc){
			$mail->AddCC($cc, $FromName);
		}


		if(count($att_nom)){
			for ($i=0;$i<count($att_nom);$i++){
				$mail->AddAttachment($att_ruta[$i],$att_nom[$i]);
				//print "$att_ruta[$i],$att_nom[$i]";
			}	
		}
		
		$mail->IsHTML(true);     //set email format to HTML
		
		$mail->Subject = $subject;
		$mail->Body=nl2br(htmlentities($msg));
		
		if(!$mail->Send())
		{
		    return $mail->ErrorInfo;
		}else{
			return 1;
		}
}


function comprimir ($archivo)
{
$fptr = fopen($archivo, "rb");
$dump = fread($fptr, filesize($archivo));
fclose($fptr);

//Comprime al m�ximo nivel, 9
$gzbackupData = gzencode($dump,9);

$fptr = fopen($archivo, "wb");
fwrite($fptr, $gzbackupData);
fclose($fptr);
//Devuelve el nombre del archivo comprimido
return $archivo;
} 

if (!function_exists('gzdecode')) {
    function gzdecode ($data) {
    	print "aaa";
        $flags = ord(substr($data, 3, 1));
        $headerlen = 10;
        $extralen = 0;
        $filenamelen = 0;
        if ($flags & 4) {
            $extralen = unpack('v' ,substr($data, 10, 2));
            $extralen = $extralen[1];
            $headerlen += 2 + $extralen;
        }
        if ($flags & 8) // Filename
            $headerlen = strpos($data, chr(0), $headerlen) + 1;
        if ($flags & 16) // Comment
            $headerlen = strpos($data, chr(0), $headerlen) + 1;
        if ($flags & 2) // CRC at end of file
            $headerlen += 2;
        $unpacked = gzinflate(substr($data, $headerlen));
        if ($unpacked === FALSE)
              $unpacked = $data;
        return $unpacked;
     }
}
//--------------------------------------------------------------------------------------------------
function descomprimir($archivo){

	$fptr = fopen($archivo, "rb");
	$dump = fread($fptr, filesize($archivo));
	fclose($fptr);
	
	$str=gzdecode($dump);
	
	$fptr = fopen($archivo, "wb");
	fwrite($fptr, $str);
	fclose($fptr);

}
//---------------------------------------------------------------------------------------------------
	
?> 
