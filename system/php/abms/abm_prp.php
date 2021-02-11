<?php
	extract($_GET);
	extract ($_POST);
	extract ($_REQUEST);

$usr_id=17;
$ind_error=0;
$ind_exito=0;
$errors=array();
$msg_exitos=array();
$MAX_TAM_FOT=500000;
$link_video = str_replace('&#160;', ' ', $prp_visibilidad);
$link_video = str_replace(' ', '', $prp_visibilidad);

// Crea un nuevo recurso cURL
$ch = curl_init();

// Establece la URL y otras opciones apropiadas
curl_setopt($ch, CURLOPT_URL, "http://www.cocucci.com.ar/api/propiedad/max_id.php");

//setup request to send json via POST
$data = array('plat_id' => '1',	'usr_id' => '17','emp_id' => $_SESSION['emp_id']);
$payload = json_encode($data);
//attach encoded JSON string to the POST fields
curl_setopt($ch, CURLOPT_POSTFIELDS, $payload);
//set the content type to application/json
curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type:application/json'));
//return response instead of outputting
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
//execute the POST request
$result = curl_exec($ch);
$api = json_decode($result);
//echo "La api devuelve: ".$api->max_id;
$maximo = $api->max_id;
// Cierrar el recurso cURLy libera recursos del sistema
curl_close($ch);

mysql_query("start transaction");
		
switch ($mod_tip)
{
	case "add":

		if ($mos_por_1=='on'){
			$mos_por_1=1;
		}else{
			$mos_por_1=0;
		}


		if ($mos_por_2=='on'){
			$mos_por_2=1;
		}else{
			$mos_por_2=0;
		}

		if ($mos_por_3=='on'){
			$mos_por_3=1;
		}else{
			$mos_por_3=0;
		}


		if ($mos_por_4=='on'){
			$mos_por_4=1;
		}else{
			$mos_por_4=0;
		}
	
/*		//SECCION PARA VERIFICAR LA CANTIDAD DE PROPIEDADES QUE SE PUBLICAN EN LOS OTROS PORTALES
		//tomo la cantidad de propiedades que se publican actualmente para cada portal. Se le suma
		//uno por la propiedad actual que esta agregando en este momento
		$cadena="select sum(mos_por_1) as mos_por_1,sum(mos_por_2) as mos_por_2,sum(mos_por_3) as mos_por_3,sum(mos_por_4) as mos_por_4 from propiedades where prp_mostrar=1 and publica=1 and usr_id=$usr_id";
		$cant_pubs=mysql_query($cadena);
		$cant_por_1=mysql_result($cant_pubs,0,0) + 1;
		$cant_por_2=mysql_result($cant_pubs,0,1) + 1;
		$cant_por_3=mysql_result($cant_pubs,0,2) + 1;
		$cant_por_4=mysql_result($cant_pubs,0,3) + 1;
		//tomo las fechas de expiraci�n para cada portal
		$cadena="select por_exp,max_prp,por_nom from portales where usr_id=$usr_id order by por_id asc";
		$por_exps=mysql_query($cadena);
		//tomo las fechas de expiraci�n para cada portal
		//tomo las fechas de expiraci�n para cada portal
		$por_exp1=mysql_result($por_exps,0,0);
		if($por_exp1=="0000-00-00")
		{
			$fec_exp1=-1;
		}
		else 
		{
			$por_exp1=split("-",$por_exp1);
			$fec_exp1=mktime(0,0,0,$por_exp1[1],$por_exp1[2],$por_exp1[0]);
		}
		$por_exp2=mysql_result($por_exps,1,0);
		if ($por_exp2=="0000-00-00")
		{
			$fec_exp2=-1;
		}
		else 
		{
			$por_exp2=split("-",$por_exp2);
			$fec_exp2=mktime(0,0,0,$por_exp2[1],$por_exp2[2],$por_exp2[0]);
		}
		$por_exp3=mysql_result($por_exps,2,0);
		if ($por_exp3=="0000-00-00")
		{
			$fec_exp3=-1;
		}
		else 
		{
			$por_exp3=split("-",$por_exp3);
			$fec_exp3=mktime(0,0,0,$por_exp3[1],$por_exp3[2],$por_exp3[0]);
		}
		$por_exp4=mysql_result($por_exps,3,0);
		if ($por_exp4=="0000-00-00")
		{
			$fec_exp4=-1;
		}
		else 
		{
			$por_exp4=split("-",$por_exp4);
			$fec_exp4=mktime(0,0,0,$por_exp4[1],$por_exp4[2],$por_exp4[0]);
		}
		//tomo la cantidades m�ximas permitidas por portal
		$max_prp1=mysql_result($por_exps,0,1);
		$max_prp2=mysql_result($por_exps,1,1);
		$max_prp3=mysql_result($por_exps,2,1);
		$max_prp4=mysql_result($por_exps,3,1);
		//fecha actual
		$fec_act=mktime(0,0,0,date("m"),date("d"),date("Y"));
		//tomo los nombres de los portales
		$nom_por1=mysql_result($por_exps,0,2);
		$nom_por2=mysql_result($por_exps,1,2);
		$nom_por3=mysql_result($por_exps,2,2);
		$nom_por4=mysql_result($por_exps,3,2);
		//ahora hago la verificaci�n
		//si la suma de propiedades actuales supera el m�ximo y el numero m�ximo no es cero(ilimitados)
		if($mos_por_1=="on"){
			if($cant_por_1 > $max_prp1 && $max_prp1!=0){
				//no se puede mostrar en el portal 1
				$mos_por_1=0;	
				$msg_exitos[$ind_exito++]=_MENS_CUPO_MAX_A . $max_prp1 . _MENS_CUPO_MAX_A . strtoupper($nom_por1). "</b><br>";
			}else if($fec_exp1 < $fec_act && $fec_exp1!=-1){ //o si la fecha de expiraci�n es mayor que la actual y no esta en cero(ilimitado)
				//no se puede mostrar en el portal 1
				$mos_por_1=0;
				$msg_exitos[$ind_exito++]=_MENS_LIC_VENC_A . strtoupper($nom_por1). _MENS_LIC_VENC_B . "$por_exp1[2]-$por_exp1[1]-$por_exp1[0]</b><br>";
			}else{
				if($fec_exp1!=-1)
					$mens2=_MENS_LIC_EXPIRA . "$por_exp1[2]-$por_exp1[1]-$por_exp1[0])";
				if($max_prp1!=0){
					$restan=$max_prp1 - $cant_por_1;
					$mens=_MENS_CUPO_MAX_A . $max_prp1 . _MENS_CUPO_MAX_B . "$restan)";
				}	
				$mos_por_1=1;
				$msg_exitos[$ind_exito++]="El inmueble se publica en <b>".strtoupper($nom_por1)." $mens $mens2</b><br>";
			} 
		}else{
				$mos_por_1=0;
				$msg_exitos[$ind_exito++]="El inmueble <b>NO</b> se publica en <b>".strtoupper($nom_por1)."</b><br>";
		}
		$mens="";
		$mens2="";
		$restan="";
		//si la suma de propiedades actuales supera el m�ximo y el numero m�ximo no es cero(ilimitados)
		if($mos_por_2=="on"){
			if($cant_por_2 > $max_prp2 && $max_prp2!=0){
				//no se puede mostrar en el portal 2
				$mos_por_2=0;	
				$msg_exitos[$ind_exito++]=_MENS_CUPO_MAX_A . $max_prp2 . _MENS_CUPO_MAX_A . strtoupper($nom_por2). "</b><br>";
			}else if($fec_exp2 < $fec_act && $fec_exp2!=-1){ //o si la fecha de expiraci�n es mayor que la actual y no esta en cero(ilimitado)
				//no se puede mostrar en el portal 2
				$mos_por_2=0;
				$msg_exitos[$ind_exito++]="La licencia para publicar en el portal  <b>".strtoupper($nom_por2)."</b><b> ha expirado el $por_exp2[2]-$por_exp2[1]-$por_exp2[0]</b><br>";
			}else{
				if($fec_exp2!=-1)
					$mens2=_MENS_LIC_EXPIRA . "$por_exp2[2]-$por_exp2[1]-$por_exp2[0])";
				if($max_prp2!=0){
					$restan=$max_prp2 - $cant_por_2;
					$mens=_MENS_CUPO_MAX_A . $max_prp2 . _MENS_CUPO_MAX_B . "$restan)";
				}	
				$mos_por_2=1;
				$msg_exitos[$ind_exito++]="El inmueble se publica en <b>".strtoupper($nom_por2)." $mens $mens2</b><br>";
			}  
		}else{
				$mos_por_2=0;
				$msg_exitos[$ind_exito++]="El inmueble  <b>NO</b> se publica en <b>".strtoupper($nom_por2)."</b><br>";
		}	
		$mens="";
		$mens2="";
		$restan="";
		//si la suma de propiedades actuales supera el m�ximo y el numero m�ximo no es cero(ilimitados)
		if($mos_por_3=="on"){
			if($cant_por_3 > $max_prp3 && $max_prp3!=0){
				//no se puede mostrar en el portal 3
				$mos_por_3=0;	
				$msg_exitos[$ind_exito++]=_MENS_CUPO_MAX_A . $max_prp3 . _MENS_CUPO_MAX_A . strtoupper($nom_por3). "</b><br>";
			}else if($fec_exp3 < $fec_act && $fec_exp3!=-1){ //o si la fecha de expiraci�n es mayor que la actual y no esta en cero(ilimitado)
				//no se puede mostrar en el portal 3
				$mos_por_3=0;
				$msg_exitos[$ind_exito++]="La licencia para publicar en el portal  <b>".strtoupper($nom_por3)."</b><b> ha expirado el $por_exp3[2]-$por_exp3[1]-$por_exp3[0]</b><br>";
			}else{
				if($fec_exp3!=-1)
					$mens2=_MENS_LIC_EXPIRA . "$por_exp2[2]-$por_exp2[1]-$por_exp2[0])";
					
				if($max_prp3!=0){
					$restan=$max_prp3 - $cant_por_3;
					$mens=_MENS_CUPO_MAX_A . $max_prp3 . _MENS_CUPO_MAX_B . "$restan)";
				}	
				
				$mos_por_3=1;
				$msg_exitos[$ind_exito++]="El inmueble se publica en <b>".strtoupper($nom_por3)." $mens $mens2</b><br>";
			}  
		}else{
				$mos_por_3=0;
				$msg_exitos[$ind_exito++]="El inmueble  <b>NO</b> se publica en <b>".strtoupper($nom_por3)." </b><br>";
		}	
		$mens="";
		$mens2="";
		$restan="";
		//si la suma de propiedades actuales supera el m�ximo y el numero m�ximo no es cero(ilimitados)
		if($mos_por_4=="on"){
			if($cant_por_4 > $max_prp4 && $max_prp4!=0){
				//no se puede mostrar en el portal 4
				$mos_por_4=0;	
			}else if($fec_exp4 < $fec_act && $fec_exp4!=-1){ //o si la fecha de expiraci�n es mayor que la actual y no esta en cero(ilimitado)
				//no se puede mostrar en el portal 4
				$mos_por_4=0;
				//$msg_exitos[$ind_exito++]="La licencia para publicar en el portal  <b>".strtoupper($nom_por4)."</b> <b>ha expirado el $por_exp4[2]-$por_exp4[1]-$por_exp4[0]</b><br>";
			}else{
				if($fec_exp4!=-1)
					$msg_exitos[$ind_exito++]=" (licencia expira el $por_exp4[2]-$por_exp4[1]-$por_exp4[0])";
				
				if($max_prp4!=0){
					$restan=$max_prp4 - $cant_por_4;
					$msg_exitos[$ind_exito++]=" (Maximo de inmuebles: $max_prp4. Restan $restan)";
				}	
				$mos_por_4=1;
			} 
		}else{
				$mos_por_4=0;
		}	

*/

		$filtro_verif="	
						prp_dom=$prp_dom and 
						con_id=$con_id and
						tip_id=$tip_id and
						pro_id=$pro_id and
						loc_id=$loc_id";
		if ($prp_pre!=""){
					$filtro_verif .= " and prp_pre=$prp_pre";
		}
		if ($prp_pre_dol!=""){
					$filtro_verif .= " and prp_pre_dol=$prp_pre_dol";
		}
		$verif=mysql_query("select * from propiedades where $filtro_verif");
		if (mysql_num_rows($verif))
		{
			$errors[$ind_error++]=_MENS_PRP_EXISTE;
		}
		else 
		{
			/*
			$max_id = mysql_query ("select max(prp_id) from propiedades where usr_id=$usr_id"); //obtiene maximo de propiedades para agregar en tabla
			if(@ mysql_num_rows($max_id) )
			{
				$max_id = mysql_result($max_id,0,0) + 1;
			}else{
				$max_id=1;
			}*/
			$max_id=$maximo;
			//Formatea la cadena para ser insertada en la base de datos sin que los caracteres "\" � "'" la da�en.
			$prp_desc=addslashes($prp_desc);
			$prp_dom=addslashes($prp_dom);
			$prp_bar=addslashes($prp_bar);
			$prp_nota=addslashes($prp_nota);
			$prp_pub=addslashes($prp_pub);
			$prp_servicios=addslashes($prp_servicios);
			if($publica=="on")
				$publica=1;
			else 	
				$publica=0;	
			$max_prop=mysql_query("select max(prop_id) from propietarios");
			$max_prop=mysql_result($max_prop,0,0) + 1;
			$propietarios="insert 
							into 
						    	propietarios 
							values ( $max_prop,
									'$prop_nombre',
									'$prop_apellido',
									'$prop_tel',
									'$prop_dom',
									'$prop_mail',
									'$prop_nota')";	
			mysql_query($propietarios) or $errors[$ind_error++]=_MENS_INS_PRP_ERROR_PROP.mysql_error();				
			$nota=nl2br($prp_nota);
			$desc=nl2br($prp_desc);
			$insertar="insert into propiedades (prp_id,
												prp_dom,
												prp_bar,
												loc_id,
												pro_id,
												pai_id,
												ori_id,
												con_id,
												prp_desc,
												prp_visitas,
												usr_id,
												tip_id,
												prp_mod,
												prp_nota,
												prp_pre,
												prp_pub,
												prp_mostrar,
												prp_pre_dol,
												prp_llave,	
												prp_alta,
												prp_cartel,
												prp_referente,
												prp_tas,
												prp_aut,
												pre_inmo,
												pre_prop,
												pre_trans,
												prp_insc_dom,
												publica,
												prp_servicios,
												bar_priv_id,
												fotos,
												mos_por_1,
												mos_por_2,
												mos_por_3,
												mos_por_4,
												prp_anonimo,
												prop_id,
												prp_vip,
												prp_lat,
												prp_lng,
												prp_plano,
												prp_destacado,
												prp_visibilidad) 
											values (
												$max_id,
												'$prp_dom',
												'$prp_bar',
												$loc_id,
												$pro_id,
												$pai_id,
												'$ori_id',
												$con_id,
												'$desc',
												1,
												$usr_id,
												$tip_id,
												now(),
												'$nota',
												'$prp_pre',
												'$prp_pub',
												1,
												'$prp_pre_dol',
												'$prp_llave',
												now(),
												'$prp_cartel',
												'$emp_id',
												'$prp_tas',
												'$prp_aut',
												'$precio_inmo',
												'$precio_prop',
												'$precio_trans',
												'$prp_insc_dom',
												$publica,
												'$prp_servicios',
												$bar_id,
												'$cant_fotos',
												'$mos_por_1',
												'$mos_por_2',
												'$mos_por_3',
												'$mos_por_4',
												'$prp_anonimo',
												$max_prop,
												'$prp_vip',
												'$prp_lat',
												'$prp_lng',
												'$prp_plano',
												0,
												'$link_video'
											)";
			$msg_exitos[$ind_exito++]="El inmueble se ingreso con exito en con el identificador $max_id";
			mysql_query($insertar) or $errors[$ind_error++]=_MENS_INS_PRP_ERROR . mysql_error() . $insertar;	
			$cambio_fotos="";	
	 		$x=1;
	 		$j=0;
	 		while ($x<=$cant_fotos)		//Copia las fotos en FOTOS y actualiza la tabla fotos
	 		{
		 			//$fo="fo".$x;
			 		if($_FILES['fo'.$x]['tmp_name']!="")
			 		{	
			 			$j++;	
			 			$foto_id="fo".$x;
						$id_foto=$max_id."-".$usr_id."-".$x;
			 			$fo_enl=$max_id."-".$usr_id."-".$x.".gif";
			 			list($size_x,$size_y,$tipo,$atr)=getimagesize($$fo);
			 			if(filesize($_FILES['fo'.$x]['tmp_name'])<$MAX_TAM_FOT || ($size_x<600 && $size_y<600) )
						{
							move_uploaded_file($_FILES['fo'.$x]['tmp_name'],"../fotos/".$fo_enl);
							//copy($$fo,"../fotos/".$fo_enl);
						}
						else
						{	
							redim_foto($_FILES['fo'.$x]['tmp_name'],"../fotos/",$id_foto);
			    		}		
			    		$fo_desc='fo_desc'.$x;
	 					$cadena="insert into fotos values('$fo_enl',".$max_id.",$usr_id,".$x.",'".$$fo_desc."')";
	 					mysql_query($cadena) or $errors[$ind_error++]=_MENS_INS_PRP_ERROR_FOTO."<br>".$cadena."<br>".mysql_error();	
	 					$cadena_altas_online.=$cadena.";";
	 					$cambio_fotos.="x".$j;
					}	
					$x++;
			}//fin while
			$cant_fotos=$j;
			mysql_query("update propiedades set fotos=$cant_fotos where usr_id=$usr_id and prp_id=$max_id") or $errors[$ind_error++]=_MENS_UPD_PRP_ERROR_PRP_PROP . "<br>" . mysql_error();
			if(!$prp_cartel)
			{
				$prp_cartel=0;
			}
			$cadena_altas_online.=$insertar;
			$detalles=mysql_query("select loc_desc,pro_desc,con_desc from localidades,provincias,condiciones where localidades.loc_id=$loc_id and provincias.pro_id=$pro_id and condiciones.con_id=$con_id");
			$detalles=mysql_fetch_row($detalles);
				$max_camb=mysql_query("select max(cambio_id) from cambios") or $errors[$ind_error++]=_MENS_SEL_CAMBIOS . "<br>" . mysql_error();
				$max_camb=mysql_result($max_camb,0,0)+1;
				$ins="insert into cambios
							 values($max_id,
								'$prp_dom',
								'$prp_bar',
								$loc_id,
								$pro_id,	
								1,
								$ori_id,
								$con_id,	
								'$prp_desc',	
								1,
								$usr_id,	
								$tip_id,
								$max_id,
								$max_id,
								$max_id,
								$max_id,
								-1,
								'$prp_mod',
								'$prp_nota',
								'$prp_pre',
								'$prp_pub',
								1,
								'$prp_pre_dol',
								'$prp_llave',
								'$prp_alta',
								'$prp_cartel',
								'$prp_referente',
								'$prp_tas',
								'$prp_aut',
								$max_camb,
								'alta',
								'".date("Y/m/d")."',
								'$max_id',
								'$max_id',
								'$precio_inmo',
								'$precio_prop',
								'$precio_transaccion',
								'$prp_insc_dom',
								$publica,
								'$prp_servicios',
								'".$cambio_fo[1]."',
								'".$cambio_fo[2]."',
								'".$cambio_fo[3]."',
								'".$cambio_fo[4]."',
								'$mos_por_1',
								'$mos_por_2',
								'$mos_por_3',
								'$mos_por_4',
								'$cambio_fotos',
								'$prp_lat',
								'$prp_lng',
								'$prp_plano'
								)";
					//print "$ins";
					mysql_query($ins) or $errors[$ind_error++]=_MENS_INS_CAMBIOS . "<br>" . mysql_error();
				//**************************************** nuevos servicios ***********************************
				$cons_tip=mysql_query("select 
									servicios_ihost.* 
								from 
									ser_tipo_const,
									servicios_ihost
								where
									servicios_ihost.ser_id=ser_tipo_const.ser_id and
									ser_tipo_const.tip_id=$tip_id and
									servicios_ihost.ser_id!=6 and 
									servicios_ihost.ser_id!=5 
								ORDER BY
									servicios_ihost.ser_desc");	
				if(mysql_num_rows($cons_tip)){
							//print "<input type=hidden name=num_ser value=".mysql_num_rows($cons_tip).">";
							$i=0;
							while ($fila=mysql_fetch_array($cons_tip)) {
								if($fila[ser_tip_dat]=="t" || $fila[ser_tip_dat]=="ss"){
									$valor="valor".$i;
									$insertar="insert into ser_x_prp_ihost values($max_id,".$fila[ser_id].",'".$$valor."',$usr_id)";
									$cadena_altas_online.=$insertar.";";				
								}else if($fila[ser_tip_dat]=="s"){
									$desde="valor".$i;
									$insertar="insert into ser_x_prp_ihost values($max_id,".$fila[ser_id].",'".$$desde."',$usr_id)";
									$cadena_altas_online.=$insertar.";";										
								}else{
									$valor="valor".$i;
									$insertar="insert into ser_x_prp_ihost values($max_id,".$fila[ser_id].",'".$$valor."',$usr_id)";
									$cadena_altas_online.=$insertar.";";										
								}
								//print"<input type=hidden name=ser_id$i value=$fila[ser_id]>";
								mysql_query($insertar) or $errors[$ind_error++]=_MENS_INS_SERVICIOS . "<br>" . mysql_error();
								$i++;
							}//while
						}//if 	
						
						
			//MANDA NOVEDAD PARA COLOCAR CARTEL
			
			
			$res=mysql_fetch_array(mysql_query("select loc_id,pro_id,con_id,prp_dom,prp_bar,prp_cartel from propiedades where usr_id='17' and prp_id=$max_id"));
				
			$localidad=mysql_result(mysql_query("select loc_desc from localidades where loc_id=$res[loc_id] and pro_id=$res[pro_id]"),0,0);
			$condicion=mysql_result(mysql_query("select con_desc from condiciones where con_id=$res[con_id]"),0,0);
			$domicilio=$res[prp_dom]." - ".$res[prp_bar]." - ".$localidad;

			$max_nov=mysql_result(mysql_query("select max(nov_id) from novedades"),0,0);
				
				$max_nov++;
				
				$message="Se di� de alta una nueva propiedad en $condicion, ID $max_id, ubicada en $domicilio. ";				
				
				$ins_novedades=mysql_query("insert into novedades values($max_nov,'$message','24',CURDATE(),'',CURTIME());");
				//si es un inmueble de ventas
				if($res[con_id]==1){
					$ins_nov_x_emp=mysql_query("insert into nov_x_emp values($max_nov,'111',0);");//Marisa Manuele
					$ins_nov_x_emp=mysql_query("insert into nov_x_emp values($max_nov,'97',0);");//Antonella Herrera
					$ins_nov_x_emp=mysql_query("insert into nov_x_emp values($max_nov,'117',0);");//Chiara
				}
				$ins_nov_x_emp=mysql_query("insert into nov_x_emp values($max_nov,'88',0);");//Alta Carteles
							
			}
		
		buscar_coincidencia(0,$max_id);	
	break;
	/***********************************************************************************************************************
	***********************************************   FIN ALTA DE PROPIEDAD  ***********************************************
	***********************************************************************************************************************/
		
	/***********************************************************************************************************************
	************************************   BAJA DE PROPIEDAD (MODIFICACION de ESTADO) **************************************
	***********************************************************************************************************************/
	case "del":
		$arr_estados=split(':',$estados);
		for ($i=0;$i<count($arr_estados)-1;$i++)
		{
			$borrar=0;	
			$prp_mostrar=0;		
			$valores=split(',',$arr_estados[$i]);
			$prp_id=$valores[0];
			
			// Si cambio de valor hago los cambios
			if ($valores[1]!=$valores[2])
			{
				$res=mysql_fetch_array(mysql_query("select loc_id,pro_id,con_id,prp_dom,prp_bar,prp_cartel from propiedades where usr_id='17' and prp_id=$prp_id"));

				if($res[prp_cartel]=="1"){
					$cartel="CON";
				}else{
					$cartel="SIN";
				}
				$localidad=mysql_result(mysql_query("select loc_desc from localidades where loc_id=$res[loc_id] and pro_id=$res[pro_id]"),0,0);
				$condicion=mysql_result(mysql_query("select con_desc from condiciones where con_id=$res[con_id]"),0,0);
				$domicilio=$res[prp_dom]." - ".$res[prp_bar]." - ".$localidad;
				$to="bajas@cocucci.com.ar";
				$subject="Cambio de Estado de Inmueble";
				$header="From: Inmohost <info@inmohost.com.ar> \r\n";
				if(($valores[1]=="prp_vend")&&($condicion=="Alquiler")){
						$estado="ALQUILADA";	
				}elseif(($valores[1]=="prp_vend")&&($condicion=="Venta")){
						$estado="VENDIDA";
				}elseif($valores[1]=="prp_mos"){
						$estado="MOSTRAR";
				}elseif($valores[1]=="prp_susp"){
						$estado="SUSPENDIDA";
				}else{
						$estado="ELIMINADA";
				}
				
				$max_nov=mysql_result(mysql_query("select max(nov_id) from novedades"),0,0);
				
				$max_nov++;
				
				$message="La propiedad en $condicion ID $prp_id ($cartel CARTEL), ubicada en $domicilio, ha cambiado al estado => $estado. ";				
				
				if($estado=="MOSTRAR"){
					$ins_novedades=mysql_query("insert into novedades values($max_nov,'$message','24',CURDATE(),'',CURTIME());");
					
					//si es un inmueble de ventas
					if($res[con_id]==1){
						$ins_nov_x_emp=mysql_query("insert into nov_x_emp values($max_nov,'111',0);");//Marisa Manuele
						$ins_nov_x_emp=mysql_query("insert into nov_x_emp values($max_nov,'97',0);");//Antonella Herrera
						$ins_nov_x_emp=mysql_query("insert into nov_x_emp values($max_nov,'117',0);");//Chiara
					}
					$ins_nov_x_emp=mysql_query("insert into nov_x_emp values($max_nov,'88',0);");//Alta Cartel
					
				}else{
					
					$ins_novedades=mysql_query("insert into novedades values($max_nov,'$message','24',CURDATE(),'',CURTIME());");
					
					//si es un inmueble de ventas
					if($res[con_id]==1){
						$ins_nov_x_emp=mysql_query("insert into nov_x_emp values($max_nov,'111',0);");//Marisa Manuele
						$ins_nov_x_emp=mysql_query("insert into nov_x_emp values($max_nov,'97',0);");//Antonella Herrera
						$ins_nov_x_emp=mysql_query("insert into nov_x_emp values($max_nov,'109',0);");//Veronica Porcel
						$ins_nov_x_emp=mysql_query("insert into nov_x_emp values($max_nov,'117',0);");//Chiara
					}

					$ins_nov_x_emp=mysql_query("insert into nov_x_emp values($max_nov,'89',0);");//Baja Cartel

					
					//mail($to,$subject,$message,$header);				
					//mail('aldo@cocucci.com.ar',$subject,$message,$header);			
								
				}
				
				switch($valores[1])
				{
					case 'prp_mos':
						$prp_mostrar=1;
						$cad_msg="mostrar";
					break;
					case 'prp_vend':
						$prp_mostrar=2;
						$cad_msg="vendida/alquilada";
					break;
					case 'prp_susp':
						$prp_mostrar=3;
						$cad_msg="suspendida";
					break;
					case 'prp_elim':
						$borrar=1;
					break;
				}
				if (!$borrar && $prp_mostrar)
				{
					$str_upd="UPDATE propiedades SET prp_mostrar=$prp_mostrar WHERE prp_id=$prp_id AND usr_id=$usr_id";
					mysql_query($str_upd) or $errors[$ind_error++]="NO SE PUDO Actualizar el estado de la propiedad con ID: $prp_id";
							$cons1="select
								 * 
							from 	
								propiedades	
							where 
								prp_id=$prp_id
								and usr_id=$usr_id";
					$cons1=mysql_query($cons1)or $errors[$ind_error++]="NO se pudieron obtener los datos de la propiedad con ID:$prp_id para CAMBIAR SU ESTADO";
					$cons1=mysql_fetch_row($cons1);
					$max=mysql_query("select max(cambio_id) from cambios");
					$max=mysql_result($max,0,0)+1;
					//Agrego las Fotos por las dudas
					$z=1;
					$cambio_fotos_estado="";
					//print"<br>FOTOS:".$cons1[39]."<br>";
					while ($z<=$cons1[39]){		//actualiza la tabla fotos
	 					$cambio_fotos_estado.="x".$z;
						$z++;
					}//fin while

					$eli="insert 
							into 
								cambios 
							values(
								'".$cons1[0]."',
								'$prp_dom',
								'$prp_bar',
								'".$cons1[3]."',
								'".$cons1[4]."',
								'".$cons1[5]."',
								'".$cons1[6]."',
								'".$cons1[7]."',
								'$prp_desc',
								'".$cons1[9]."' ,
								'".$cons1[10]."',
								'".$cons1[11]."',
								'".$cons1[12]."',
								'".$cons1[13]."',
								'".$cons1[14]."',
								'".$cons1[15]."',
								'".$cons1[16]."',
								'".$cons1[17]."',
								'$prp_nota',
								'".$cons1[19]."',
								'".$cons1[20]."',
								'".$cons1[21]."',
								'".$cons1[22]."',
								'".$cons1[23]."',
								'".$cons1[24]."',
								'".$cons1[25]."',
								'".$cons1[26]."',
								'".$cons1[27]."',
								'".$cons1[28]."',
								$max,
								'modificacion',
								'".date("y/m/d")."',
								'".$cons1[29]."',
								'".$cons1[30]."',
								'".$prp_mostrar."',
								'".$cons1[32]."',
								'".$cons1[33]."',
								'".$cons1[34]."',
								'".$cons1[35]."',
								'$prp_servicios',
								'".$cambio_fo[1]."',
								'".$cambio_fo[2]."',
								'".$cambio_fo[3]."',
								'".$cambio_fo[4]."',
								'$cons1[mos_por_1]',
								'$cons1[mos_por_2]',
								'$cons1[mos_por_3]',
								'$cons1[mos_por_4]',
								'".$cambio_fotos_estado."',
								'$prp_lat',
								'$prp_lng',
								'$prp_plano'
								)";
					mysql_query($eli) or $errors[$ind_error++]="NO se pudieron crear los cambios de la propiedad con ID:$prp_id para modificarla";
					$msg_exitos[$ind_exito++]="El estado de la Propiedad con ID: $prp_id ha sido modificado a " . $cad_msg;
				}
				else if ($borrar && !$prp_mostrar)
				{
					$cons1="select
								 * 
							from 	
								propiedades	
							where 
								prp_id=$prp_id
								and usr_id=$usr_id";
					$cons1=mysql_query($cons1)or $errors[$ind_error++]="NO se pudieron obtener los datos de la propiedad con ID:$prp_id para ELIMINARLA";
					$cons1=mysql_fetch_row($cons1);
					$max=mysql_query("select max(cambio_id) from cambios");
					$max=mysql_result($max,0,0)+1;
					$eli="insert 
							into 
								cambios 
							values(
								'".$cons1[0]."',
								'$prp_dom',
								'$prp_bar',
								'".$cons1[3]."',
								'".$cons1[4]."',
								'".$cons1[5]."',
								'".$cons1[6]."',
								'".$cons1[7]."',
								'$prp_desc',
								'".$cons1[9]."' ,
								'".$cons1[10]."',
								'".$cons1[11]."',
								'".$cons1[12]."',
								'".$cons1[13]."',
								'".$cons1[14]."',
								'".$cons1[15]."',
								'".$cons1[16]."',
								'".$cons1[17]."',
								'$prp_nota',
								'".$cons1[19]."',
								'".$cons1[20]."',
								'".$cons1[21]."',
								'".$cons1[22]."',
								'".$cons1[23]."',
								'".$cons1[24]."',
								'".$cons1[25]."',
								'".$cons1[26]."',
								'".$cons1[27]."',
								'".$cons1[28]."',
								$max,
								'eliminacion',
								'".date("y/m/d")."',
								'".$cons1[29]."',
								'".$cons1[30]."',
								'".$cons1[31]."',
								'".$cons1[32]."',
								'".$cons1[33]."',
								'".$cons1[34]."',
								'".$cons1[35]."',
								'$prp_servicios',
								'".$cambio_fo[1]."',
								'".$cambio_fo[2]."',
								'".$cambio_fo[3]."',
								'".$cambio_fo[4]."',
								'$cons1[mos_por_1]',
								'$cons1[mos_por_2]',
								'$cons1[mos_por_3]',
								'$cons1[mos_por_4]',
								'f',
								'$prp_lat',
								'$prp_lng',
								'$prp_plano'
								)";
					mysql_query($eli) or $errors[$ind_error++]="NO se pudieron crear los cambios de la propiedad con ID:$prp_id";
					$del_serv="DELETE FROM ser_x_prp_ihost WHERE prp_id=$prp_id AND usr_id=$usr_id";
					mysql_query($del_serv) or $errors[$ind_error++]="NO se pudieron borrar los servicios de la propiedad con ID:$prp_id";
					$del_prop="DELETE FROM propietarios WHERE prop_id=" . $cons1[45];
					mysql_query($del_prop) or $errors[$ind_error++]="NO se pudo borrar el propietario de la propiedad con ID:$prp_id";
					$del_pub="DELETE FROM publicaciones WHERE prp_id=$prp_id";
					mysql_query($del_pub) or $errors[$ind_error++]="NO se pudieron borrar las publicaciones de la propiedad con ID:$prp_id";
					// Borrado de FOTOS
					// mysql_query("delete from foto1 where fo1_id=$prp_id and (fo1_usr=$usr_id or fo1_usr=0)");
					// mysql_query("delete from foto2 where fo2_id=$prp_id and (fo2_usr=$usr_id or fo2_usr=0)");
					// mysql_query("delete from foto3 where fo3_id=$prp_id and (fo3_usr=$usr_id or fo3_usr=0)");
					// mysql_query("delete from foto4 where fo4_id=$prp_id and (fo4_usr=$usr_id or fo4_usr=0)");
					// mysql_query("delete from foto5 where fo5_id=$prp_id and (fo5_usr=$usr_id or fo5_usr=0)");
					// mysql_query("delete from foto6 where fo6_id=$prp_id and (fo6_usr=$usr_id or fo6_usr=0)");
					mysql_query("delete from fotos where prp_id=$prp_id and usr_id=$usr_id");
					
					$del_citas="DELETE FROM citas WHERE prp_id=$prp_id";
					mysql_query($del_citas) or $errors[$ind_error++]="NO se pudieron borrar las citas de la propiedad con ID:$prp_id";
					$del_prp="DELETE FROM propiedades WHERE prp_id=$prp_id AND usr_id=$usr_id";
					mysql_query($del_prp) or $errors[$ind_error++]="NO se pudo borrar la propiedad con ID:$prp_id";
					$msg_exitos[$ind_exito++]="La Propiedad con ID: $prp_id ha sido eliminada";
				}
				else 
				{
					$errors[$ind_error++]="Ocurrio un error al actualizar el estado de la propiedad con ID: " . $valores[0];
				}
			}
			$borrar=0;
			$prp_mostrar=0;
		}
		if (!$msg_exitos && !$errors)
		{
			$msg_exitos[$ind_exito++]="No se modifico el estado de ninguna propiedad";
		}
	break;
	/***********************************************************************************************************************
	***********************************************   FIN BAJA DE PROPIEDAD  ***********************************************
	***********************************************************************************************************************/
	
	/***********************************************************************************************************************
	********************************************   MODIFICACION DE PROPIEDAD  **********************************************
	***********************************************************************************************************************/	
	case "edit":

		if ($mos_por_1=='on'){
			$mos_por_1=1;
		}else{
			$mos_por_1=0;
		}


		if ($mos_por_2=='on'){
			$mos_por_2=1;
		}else{
			$mos_por_2=0;
		}

		if ($mos_por_3=='on'){
			$mos_por_3=1;
		}else{
			$mos_por_3=0;
		}


		if ($mos_por_4=='on'){
			$mos_por_4=1;
		}else{
			$mos_por_4=0;
		}

		$seg_prop=mysql_query("select * from propiedades where usr_id=$usr_id and prp_id=$prp_id") or $errors[$ind_error++]="No se pudieron obtener datos de la Propiedad";	
		if (!mysql_num_rows($seg_prop))
		{
				$errors[$ind_error++]="No es su propiedad";
		}
		// Ahora se guardan los datos anteriores de la propiedad en cambios
//cambio la leyenda modificacion a alta		
		$max=mysql_query("select max(cambio_id) from cambios");
		$max=mysql_result($max,0,0)+1;
		$cons1=mysql_query("select * from propiedades where prp_id=$prp_id and usr_id=$usr_id");	
		$cons1=mysql_fetch_array($cons1);	
		$mod="insert 
			into 
				cambios 
			values(
				'".$cons1[0]."',
				'".$cons1[1]."',
				'".$cons1[2]."',
				'".$cons1[3]."',
				'".$cons1[4]."',
				'".$cons1[5]."',
				'".$cons1[6]."',
				'".$cons1[7]."',
				'".$cons1[8]."',
				'".$cons1[9]."' ,
				'".$cons1[10]."',
				'".$cons1[11]."',
				'".$cons1[12]."',
				'".$cons1[13]."',
				'".$cons1[14]."',
				'".$cons1[15]."',
				'".$cons1[16]."',
				'".$cons1[17]."',
				'".$cons1[18]."',
				'".$cons1[19]."',
				'".$cons1[20]."',
				'".$prp_mostrar."',
				'".$cons1[22]."',
				'".$cons1[23]."',
				'".$cons1[24]."',
				'".$cons1[25]."',
				'".$cons1[26]."',
				'".$cons1[27]."',
				'".$cons1[28]."',
				$max,
				'modificacion',
				'".date("y/m/d")."',
				'".$cons1[29]."',
				'".$cons1[30]."',
				'".$cons1[31]."',
				'".$cons1[32]."',
				'".$cons1[33]."',
				'".$cons1[34]."',
				'".$cons1[35]."',
				'".$cons1[36]."',
				'".$cambio_fo[1]."',
				'".$cambio_fo[2]."',
				'".$cambio_fo[3]."',
				'".$cambio_fo[4]."',
				'".$mos_por_1."',
				'".$mos_por_2."',
				'".$mos_por_3."',
				'".$mos_por_4."',
				'".$cambio_fotos."',
				'".$prp_lat."',
				'".$prp_lng."',
				'".$prp_plano."'
				)";
		mysql_query($mod) or $errors[$ind_error++]="Error al guardar los cambios".mysql_error().$mod;

		if($prop_id>0)
		{
				$act_prop="
				update 
					propietarios
				set
					prop_nombre='$prop_nombre',
					prop_apellido='$prop_apellido',
					prop_tel='$prop_tel',
					prop_dom='$prop_dom',
					prop_mail='$prop_mail',
					prop_nota='$prop_nota'
				where 
					propietarios.prop_id=$prop_id
		
			";

			mysql_query($act_prop) or $errors[$ind_error++]="Error al modificar Propietarios";
		}
		else if($prop_apellido)
		{
			$prop_id=mysql_query("select max(prop_id) from propietarios");
			$prop_id=mysql_result($max_prop,0,0) + 1;
			$propietarios="insert 
				into 
					propietarios 
				values ($prop_id,
					'$prop_nombre',
					'$prop_apellido',
					'$prop_tel',
					'$prop_dom',
					'$prop_mail',
					'$prop_nota')";
			mysql_query($propietarios) or $errors[$ind_error++]="No se pudieron ingresar los datos del Propietario";
		}
		//MANEJO DE FOTOS
		//pregunta si tiene fotos con el nuevo formato
		$modif_fotos=0;
		$cant_fotos_act=mysql_result(mysql_query("select fotos from propiedades where usr_id=$usr_id and prp_id=$prp_id"),0,0);
		$foto_nueva=0;
		if ($cant_fotos_act!=-1){ //si ES una foto NUEVA
			$foto_nueva=1;
		}else{
			$cant_fotos_viejas=0;
			// $cons_foto_vieja=mysql_query("select fo1_id,fo2_id,fo3_id,fo4_id,fo5_id,fo6_id from propiedades where prp_id=$prp_id and usr_id=$usr_id");
			// while($res_cons=mysql_fetch_array($cons_foto_vieja))
			// {
			// 	if ($res_cons[0]!=-1)
			// 	{
			// 		copy("../foto1/$prp_id-$usr_id.gif","../fotos/$prp_id-$usr_id-1.gif");
			// 		$fo1="../foto1/$prp_id-$usr_id.gif";
			// 	}
			// 	if ($res_cons[1]!=-1)
			// 	{
			// 		copy("../foto2/$prp_id-$usr_id.gif","../fotos/$prp_id-$usr_id-2.gif");
			// 		$fo2="../foto2/$prp_id-$usr_id.gif";
			// 	}
			// 	if ($res_cons[2]!=-1)
			// 	{
			// 		copy("../foto3/$prp_id-$usr_id.gif","../fotos/$prp_id-$usr_id-3.gif");
			// 		$fo3="../foto3/$prp_id-$usr_id.gif";
			// 	}
			// 	if ($res_cons[3]!=-1)
			// 	{
			// 		copy("../foto4/$prp_id-$usr_id.gif","../fotos/$prp_id-$usr_id-4.gif");
			// 		$fo4="../foto4/$prp_id-$usr_id.gif";
			// 	}
			// 	if ($res_cons[4]!=-1)
			// 	{
			// 		copy("../foto5/$prp_id-$usr_id.gif","../fotos/$prp_id-$usr_id-5.gif");
			// 		$fo5="../foto5/$prp_id-$usr_id.gif";
			// 	}
			// 	if ($res_cons[5]!=-1){
			// 		copy("../foto6/$prp_id-$usr_id.gif","../fotos/$prp_id-$usr_id-6.gif");
			// 		$fo6="../foto6/$prp_id-$usr_id.gif";
			// 	}				
			// }//while
		}//if
		$cambio_fotos="";
		$num_fotos=mysql_query("select count(fo_nro) from fotos where prp_id=$prp_id and usr_id=$usr_id");
		$num_fotos=mysql_result($num_fotos,0,0);

		for ($i=1;$i<=15;$i++)
		{
			$foto_id="fo".$i;
			$id_foto=$prp_id."-".$usr_id."-".$i;
			$cambio_fo[$i]=0;
			$check="quitar_fo".$i;
			$fo_desc="fo_desc".$i;

			if($$check){
					
					$modif_fotos=1;
					if($foto_nueva){
						mysql_query("delete from fotos where prp_id=$prp_id and usr_id=$usr_id and fo_nro=".$i.";");
						$cadena_modif_online.="delete from fotos where prp_id=$prp_id and usr_id=$usr_id and fo_nro=".$i.";";
						$comando="rm ../fotos/".$id_foto.".gif";
						exec($comando);
					}else{
						mysql_query("update propiedades set fo".$i."_id=-1 where prp_id=$prp_id and usr_id=$usr_id;");
						$cadena_modif_online.="update propiedades set fo".$i."_id=-1 where prp_id=$prp_id and usr_id=$usr_id;";
					}	
					$cambio_fotos.="x".$i;
			}
			else if ( ($i<=$num_fotos) || ($_FILES['fo'.$i]['tmp_name']!=""))
			{
					$modif_fotos=1;
					$nueva=$id_foto.".gif";
					list($size_x,$size_y,$tipo,$atr)=getimagesize($_FILES['fo'.$i]['tmp_name']);
			 		if(filesize($_FILES['fo'.$i]['tmp_name'])<$MAX_TAM_FOT || ($size_x<600 && $size_y<600) )
			 		{
						move_uploaded_file($_FILES['fo'.$i]['tmp_name'],"../fotos/".$id_foto.".gif");
					//	copy($_FILES['fo'.$i]['tmp_name'],"../fotos/".$id_foto.".gif");
					}else{	
						 redim_foto($foto_id,"../fotos/",$id_foto);
						//redim_foto($foto_id,"../fotos/",$id_foto);
						//busq_binaria($$foto_id,"../../../fotos/".$id_foto.".gif");
			    	}	
					mysql_query("delete from fotos where prp_id=$prp_id and usr_id=$usr_id and fo_nro=$i");
					mysql_query("insert into fotos values('".$id_foto.".gif',$prp_id,$usr_id,$i,'".$$fo_desc."');");
					$cadena_modif_online.="insert into fotos values('".$id_foto.".gif',$prp_id,$usr_id,$i,'');";
					$cambio_fo[$i]=1;
					$cambio_fotos.="x".$i;
			}//fin else
			$cadena="update fotos set fo_desc='".$$fo_desc."' where prp_id=$prp_id and usr_id=$usr_id and fo_nro=$i";
			mysql_query($cadena);			
		}//fin for
		$upd_cambios="update cambios set cambios_fotos='$cambio_fotos' where cambio_id=$max and usr_id=$usr_id and prp_id=$prp_id";
		$rs_cambios = mysql_query($upd_cambios) or $errors[$ind_error++]="ERROR al actualizar cambios_fotos en la tabla cambios <br>".$upd_cambios;
	
		
		
		//**************************************** nuevos servicios ***********************************			
		$cadena="delete from ser_x_prp_ihost where prp_id=$prp_id and usr_id=$usr_id";
		mysql_query($cadena) or $errors[$ind_error++]="No se pudieron borrar servicios";
		
		$cons_tip=mysql_query("select 
									servicios_ihost.* 
								from 
									ser_tipo_const,
									servicios_ihost
								where
									servicios_ihost.ser_id=ser_tipo_const.ser_id and
									ser_tipo_const.tip_id=$tip_id and
									servicios_ihost.ser_id!=6 and 
									servicios_ihost.ser_id!=5 
								ORDER BY
									servicios_ihost.ser_desc");	
										
		if(mysql_num_rows($cons_tip))
		{
			//print "<input type=hidden name=num_ser value=".mysql_num_rows($cons_tip).">";
			$i=0;
			while ($fila=mysql_fetch_array($cons_tip)) 
			{
				if($fila[ser_tip_dat]=="t" || $fila[ser_tip_dat]=="ss")
				{
					$valor="valor".$i;
					$insertar="insert into ser_x_prp_ihost values($prp_id,".$fila[ser_id].",'".$$valor."',$usr_id)";
				}
				else if($fila[ser_tip_dat]=="s")
				{
					$desde="valor".$i;
					$insertar="insert into ser_x_prp_ihost values($prp_id,".$fila[ser_id].",'".$$desde."',$usr_id)";
				}
				else
				{
					$valor="valor".$i;
					$insertar="insert into ser_x_prp_ihost values($prp_id,".$fila[ser_id].",'".$$valor."',$usr_id)";
				}
				mysql_query($insertar) or $errors[$ind_error++]="No se pudieron cargar los Servicios<br>$insertar";
				$cadena_modif_online.=$insertar.";";
				$i++;
				}//while
			}//if 
	//************************************ fin nuevos servicios ***********************************

	if($publica=="on")
		$publica=1;
	else 	
		$publica=0;	
	$prp_desc=addslashes($prp_desc);
	$prp_dom=addslashes($prp_dom);
	$prp_bar=addslashes($prp_bar);
	$prp_nota=addslashes($prp_nota);
	$prp_pub=addslashes($prp_pub);
	$prp_servicios=addslashes($prp_servicios);
	$act_prp="update propiedades set 
							fotos=$num_fotos,
							loc_id=$loc_id,
							pro_id=$pro_id,
							prp_bar='$prp_bar',
							prp_dom='$prp_dom',
							pai_id='$pai_id',
							con_id='$con_id',
							tip_id='$tip_id',
							prp_pre=$prp_pre,
							prp_desc='$prp_desc',
							prp_nota='$prp_nota',
							prp_mod=now(),
							ori_id=$ori_id,
							prp_pub='$prp_pub',
							prp_pre_dol='$prp_pre_dol',
							prp_llave='$prp_llave',
							prp_cartel='$prp_cartel',
							prp_referente='$emp_id',
							prp_tas='$prp_tas',
							prp_aut='$prp_aut',
							pre_inmo='$precio_inmo',
							pre_prop='$precio_prop',
							pre_trans='$precio_trans',
							prp_insc_dom='$prp_insc_dom',
							publica=$publica,
							prp_servicios='$prp_servicios',
							bar_priv_id=$bar_id,
							prp_mostrar=$prp_mostrar,
							prp_anonimo='$prp_anonimo',
							prop_id='$prop_id',
							prp_vip='$prp_vip',
							mos_por_1='$mos_por_1',
							mos_por_2='$mos_por_2',
							mos_por_3='$mos_por_3',
							prp_lat='$prp_lat',
							prp_lng='$prp_lng',
							prp_plano='$prp_plano',
							prp_destacado=0,
							prp_visibilidad='$link_video' 
				where 
							prp_id=$prp_id and 
							(usr_id=$usr_id or usr_id=0);
				"; 
	//print "<br>Actualizacion: ".$act_prp;
	mysql_query($act_prp) or $errors[$ind_error++]="Error al modificar Propiedades".mysql_error();
	/*
	//#################################################################################################		
	//SECCION PARA VERIFICAR LA CANTIDAD DE PROPIEDADES QUE SE PUBLICAN EN LOS OTROS PORTALES
	//tomo la cantidad de propiedades que se publican actualmente para cada portal. 
	$cadena="select sum(mos_por_1) as mos_por_1,sum(mos_por_2) as mos_por_2,sum(mos_por_3) as mos_por_3,sum(mos_por_4) as mos_por_4 from propiedades where prp_mostrar=1 and publica=1 and usr_id=$usr_id";
	$cant_pubs=mysql_query($cadena);
	$cant_por_1=mysql_result($cant_pubs,0,0);
	$cant_por_2=mysql_result($cant_pubs,0,1);
	$cant_por_3=mysql_result($cant_pubs,0,2);
	$cant_por_4=mysql_result($cant_pubs,0,3);
	//tomo las fechas de expiraci�n para cada portal
	$cadena="select por_exp,max_prp,por_nom from portales where usr_id=$usr_id order by por_id asc";
	$por_exps=mysql_query($cadena);
	//tomo las fechas de expiraci�n para cada portal
	$por_exp1=mysql_result($por_exps,0,0);
	if ($por_exp1=="0000-00-00")
	{
		$fec_exp1=-1;
	}
	else 
	{
		$por_exp1=split("-",$por_exp1);
		$fec_exp1=mktime(0,0,0,$por_exp1[1],$por_exp1[2],$por_exp1[0]);
	}
	$por_exp2=mysql_result($por_exps,1,0);
	if ($por_exp2=="0000-00-00")
	{
		$fec_exp2=-1;
	}
	else 
	{
		$por_exp2=split("-",$por_exp2);
		$fec_exp2=mktime(0,0,0,$por_exp2[1],$por_exp2[2],$por_exp2[0]);
	}
	$por_exp3=mysql_result($por_exps,2,0);
	if ($por_exp3=="0000-00-00")
	{
		$fec_exp3=-1;
	}
	else 
	{
		$por_exp3=split("-",$por_exp3);
		$fec_exp3=mktime(0,0,0,$por_exp3[1],$por_exp3[2],$por_exp3[0]);
	}
	$por_exp4=mysql_result($por_exps,3,0);
	if ($por_exp4=="0000-00-00")
	{
		$fec_exp4=-1;
	}
	else 
	{
		$por_exp4=split("-",$por_exp4);
		$fec_exp4=mktime(0,0,0,$por_exp4[1],$por_exp4[2],$por_exp4[0]);
	}
	
	//tomo la cantidades m�ximas permitidas por portal
	$max_prp1=mysql_result($por_exps,0,1);
	$max_prp2=mysql_result($por_exps,1,1);
	$max_prp3=mysql_result($por_exps,2,1);
	$max_prp4=mysql_result($por_exps,3,1);
	//fecha actual
	$fec_act=mktime(0,0,0,date("m"),date("d"),date("Y"));
	//tomo los nomres de los portales
	$nom_por1=mysql_result($por_exps,0,2);
	$nom_por2=mysql_result($por_exps,1,2);
	$nom_por3=mysql_result($por_exps,2,2);
	$nom_por4=mysql_result($por_exps,3,2);
	//ahora hago la verificaci�n
	//si la suma de propiedades actuales supera el m�ximo y el numero m�ximo no es cero(ilimitados)
	if($mos_por_1=="on"){
		if($cant_por_1 > $max_prp1 && $max_prp1!=0){
			//no se puede mostrar en el portal 1
			$mos_por_1=0;	
			$msg_exitos[$ind_exito++]="Ha superado el <b>CUPO MAXIMO ($max_prp1 Inmuebles)</b> para publicar inmuebles en el portal <b>".strtoupper($nom_por1)."</b><br>";
		}else if($fec_exp1 < $fec_act && $fec_exp1!=-1){ //o si la fecha de expiraci�n es mayor que la actual y no esta en cero(ilimitado)
			//no se puede mostrar en el portal 1
			$mos_por_1=0;
			$msg_exitos[$ind_exito++]="La licencia para publicar en el portal  <b>".strtoupper($nom_por1)."</b> <b>ha expirado el $por_exp1[2]-$por_exp1[1]-$por_exp1[0]</b><br>";
		}else{
			if($fec_exp1!=-1)
				$mens2=" (licencia expira el $por_exp1[2]-$por_exp1[1]-$por_exp1[0])";
				
			if($max_prp1!=0){
				$restan=$max_prp1 - $cant_por_1;
				$mens=" (Maximo: $max_prp1. Restan:$restan)";
			}	
			
			$mos_por_1=1;
			$msg_exitos[$ind_exito++]="El inmueble se publica en <b>".strtoupper($nom_por1)." $mens $mens2</b><br>";
		} 
	}else{
			$mos_por_1=0;
			$msg_exitos[$ind_exito++]="El inmueble <b>NO</b> se publica en <b>".strtoupper($nom_por1)."</b><br>";
	}
	$mens="";
	$mens2="";
	$restan="";
	//si la suma de propiedades actuales supera el m�ximo y el numero m�ximo no es cero(ilimitados)
	if($mos_por_2=="on"){
		if($cant_por_2 > $max_prp2 && $max_prp2!=0){
			//no se puede mostrar en el portal 2
			$mos_por_2=0;	
				$msg_exitos[$ind_exito++]="Ha superado el <b>CUPO MAXIMO ($max_prp2 Inmuebles)</b> para publicar inmuebles en el portal <b>".strtoupper($nom_por2)."</b><br>";
			}else if($fec_exp2 < $fec_act && $fec_exp2!=-1){ //o si la fecha de expiraci�n es mayor que la actual y no esta en cero(ilimitado)
				//no se puede mostrar en el portal 2
				$mos_por_2=0;
				$msg_exitos[$ind_exito++]="La licencia para publicar en el portal  <b>".strtoupper($nom_por2)."</b><b> ha expirado el $por_exp2[2]-$por_exp2[1]-$por_exp2[0]</b><br>";
			}else{
				if($fec_exp2!=-1)
					$mens2=" (licencia expira el $por_exp2[2]-$por_exp2[1]-$por_exp2[0])";
					
				if($max_prp2!=0){
					$restan=$max_prp2 - $cant_por_2;
					$mens=" (Maximo: $max_prp2. Restan: $restan)";	
				}	
				$mos_por_2=1;
				$msg_exitos[$ind_exito++]="El inmueble se publica en <b>".strtoupper($nom_por2)." $mens $mens2</b><br>";
			}  
		}else{
				$mos_por_2=0;
				$msg_exitos[$ind_exito++]="El inmueble  <b>NO</b> se publica en <b>".strtoupper($nom_por2)."</b><br>";
		}	
		$mens="";
		$mens2="";
		$restan="";
		//si la suma de propiedades actuales supera el m�ximo y el numero m�ximo no es cero(ilimitados)
		if($mos_por_3=="on"){
			if($cant_por_3 > $max_prp3 && $max_prp3!=0){
				//no se puede mostrar en el portal 3
				$mos_por_3=0;	
				$msg_exitos[$ind_exito++]="Ha superado el <b>CUPO MAXIMO ($max_prp3 Inmuebles)</b> para publicar inmuebles en el portal <b>".strtoupper($nom_por3)."</b><br>";
			}else if($fec_exp3 < $fec_act && $fec_exp3!=-1){ //o si la fecha de expiraci�n es mayor que la actual y no esta en cero(ilimitado)
				//no se puede mostrar en el portal 3
				$mos_por_3=0;
				$msg_exitos[$ind_exito++]="La licencia para publicar en el portal  <b>".strtoupper($nom_por3)."</b><b> ha expirado el $por_exp3[2]-$por_exp3[1]-$por_exp3[0]</b><br>";
			}else{
				if($fec_exp3!=-1)
					$mens2=" (licencia expira el $por_exp3[2]-$por_exp3[1]-$por_exp3[0])";
					
				if($max_prp3!=0){
					$restan=$max_prp3 - $cant_por_3;
					$mens=" (Maximo de inmuebles: $max_prp3. Restan: $restan)";	
				}	
				
				$mos_por_3=1;
				$msg_exitos[$ind_exito++]="El inmueble se publica en <b>".strtoupper($nom_por3)." $mens $mens2</b><br>";
			}  
		}else{
				$mos_por_3=0;
				$msg_exitos[$ind_exito++]="El inmueble  <b>NO</b> se publica en <b>".strtoupper($nom_por3)." </b><br>";
		}	
		$mens="";
		$mens2="";
		$restan="";
		//si la suma de propiedades actuales supera el m�ximo y el numero m�ximo no es cero(ilimitados)
		if($mos_por_4=="on"){
			if($cant_por_4 > $max_prp4 && $max_prp4!=0){
				//no se puede mostrar en el portal 4
				$mos_por_4=0;	
				//$msg_exitos[$ind_exito++]="Ha superado el <b>CUPO MAXIMO ($max_prp4 Inmuebles)</b> para publicar inmuebles en el portal <b>".strtoupper($nom_por4)."</b><br>";
			}else if($fec_exp4 < $fec_act && $fec_exp4!=-1){ //o si la fecha de expiraci�n es mayor que la actual y no esta en cero(ilimitado)
				//no se puede mostrar en el portal 4
				$mos_por_4=0;
				//$msg_exitos[$ind_exito++]="La licencia para publicar en el portal  <b>".strtoupper($nom_por4)."</b> <b>ha expirado el $por_exp4[2]-$por_exp4[1]-$por_exp4[0]</b><br>";
			}else{
				if($fec_exp4!=-1)
					$mens2=" (licencia expira el $por_exp4[2]-$por_exp4[1]-$por_exp4[0])";
				if($max_prp4!=0){
					$restan=$max_prp4 - $cant_por_4;
					$mens=" (Maximo de inmuebles: $max_prp4. Restan $restan)";
				}	
				$mos_por_4=1;
				//$msg_exitos[$ind_exito++]="El inmueble se publica en <b>".strtoupper($nom_por4)." $mens $mens2</b><br>";
			} 
		}
		else
		{
				$mos_por_4=0;
		}			
		//#################################################################################################				
		$cadena="update propiedades set mos_por_1='$mos_por_1',mos_por_2='$mos_por_2',mos_por_3='$mos_por_3',mos_por_4='$mos_por_4' where usr_id=$usr_id and prp_id=$prp_id";
		mysql_query($cadena);
		*/

		//consulta para sacar tipo de construccion
		$cons_tip=mysql_query("select tip_id from propiedades where prp_id=$prp_id and usr_id=$usr_id");
		        
		
		$msg_exitos[$ind_exito++]="La propiedad ha sido modificada";
		buscar_coincidencia(0,$prp_id);	
	break;
	/***********************************************************************************************************************
	******************************************   FIN MODIFICACION DE PROPIEDAD  ********************************************
	***********************************************************************************************************************/
}

if (!$errors)	
{
	mysql_query("commit");
}
else 
{
	mysql_query("rollback");
}

?>
