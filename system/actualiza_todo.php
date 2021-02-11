<?php
include ("./php/conexion.php");
$usr_id="17";
		
				$fp2=fopen("sql_todo.php","w+");

				$cadena="select prp_id,usr_id from propiedades where usr_id='17' and (prp_id>2000 and prp_id<=2100)";
	            $result=mysql_query($cadena);
				$str2="";
				$j=0;
				print "<br>Comenzando...<br>".$result;
$vuelta=1;
				while ($fila=mysql_fetch_array($result)){
					print "<br>Vuelta ".$vuelta;
					$vuelta++;
					$cadena="select * from propiedades where usr_id=17 and prp_id=".$fila[prp_id];
					//print "<br>".$cadena;

				//	$res1=;
						
									$prp=mysql_fetch_array(mysql_query($cadena));

									$prp_desc=$prp[prp_desc];
									$prp_servicios=$prp[prp_servicios];
									$prp_dom=$prp[prp_dom];
									$prp_nota=$prp[prp_nota];
									$prp_bar=$prp[prp_bar];
									
									print "<br>ID: ".$fila[prp_id];
									
									//borro fotos	
									$cadena="delete from fotos where prp_id=".$fila[prp_id]." and usr_id=17;";
									//$str.="mysql_query(\"$cadena\") or \$error=\"Consulta: $cadena\".mysql_error();\r\n";		
									$godaddy[0]=$cadena;

									//borro servicios
									$cadena="delete from ser_x_prp_ihost where prp_id=".$fila[prp_id]." and usr_id=17;";
									//$str.="mysql_query(\"$cadena\") or \$error=\"Consulta: $cadena\".mysql_error();\r\n";	
									$godaddy[1]=$cadena;

									//borro propiedad
									$cadena="delete from propiedades where prp_id=".$fila[prp_id]." and usr_id=17;";
									//$str.="mysql_query(\"$cadena\") or \$error=\"Consulta: delete prp $prp[prp_id] - $prp[usr_id]\".mysql_error();\r\n";	
									$godaddy[2]=$cadena;

									//inserto propiedad
									$cadena="insert into propiedades (prp_id,prp_dom,prp_bar,loc_id,pro_id,pai_id,ori_id,con_id,prp_desc,prp_visitas,usr_id,tip_id,fo1_id,fo2_id,fo3_id,fo4_id,fo360_id,prp_mod,prp_nota,prp_pre,prp_pub,prp_mostrar,prp_pre_dol,prp_llave,prp_alta,prp_cartel,prp_referente,prp_tas,prp_aut,fo5_id,fo6_id,pre_inmo,pre_prop,pre_trans,prp_insc_dom,publica,prp_servicios,fotos,mos_por_1,mos_por_2,mos_por_3,mos_por_4,prp_anonimo,prp_vip,prp_lat,prp_lng,tipo_aviso_id) values(".$fila[prp_id].",'".$prp_dom."','".$prp_bar."',".$prp[loc_id].",".$prp[pro_id].",".$prp[pai_id].",".$prp[ori_id].",".$prp[con_id].",'".$prp_desc."',".$prp[prp_visitas].",".$prp[usr_id].",".$prp[tip_id].",".$prp[fo1_id].",".$prp[fo2_id].",".$prp[fo3_id].",".$prp[fo4_id].",".$prp[fo360_id].",'".$prp[prp_mod]."','".$prp_nota."','".$prp[prp_pre]."','".$prp[prp_pub]."',".$prp[prp_mostrar].",".$prp[prp_pre_dol].",".$prp[prp_llave].",'".$prp[prp_alta]."','".$prp[prp_cartel]."',".$prp[prp_referente].",'".$prp[prp_tas]."','".$prp[prp_aut]."',".$prp[fo5_id].",".$prp[fo6_id].",'".$prp[pre_inmo]."','".$prp[pre_prop]."','".$prp[pre_trans]."','".$prp[prp_insc_dom]."',".$prp[publica].",'".$prp_servicios."',".$prp[fotos].",".$prp[mos_por_1].",".$prp[mos_por_2].",".$prp[mos_por_3].",".$prp[mos_por_4].",".$prp[prp_anonimo].",'".$prp[prp_vip]."','".$prp[prp_lat]."','".$prp[prp_lng]."','8');";
									//$str.="mysql_query(\"$cadena\") or \$error=\"Consulta: insert $prp[prp_id] - $prp[usr_id]\".mysql_error();\r\n";	
									$godaddy[3]=$cadena;

									$cant_fotos_gd=4;
									//inserto en servicios
									$res_alt=mysql_query("select * from ser_x_prp_ihost where prp_id=".$fila[prp_id]." and usr_id=17");	
									while ($fila_ser=mysql_fetch_array($res_alt)){
											//print "<br> SERVICIOS ".mysql_num_rows($res_alt).": select * from ser_x_prp_ihost where prp_id=".$fila[prp_id]." and usr_id=17";
											$cadena="insert into ser_x_prp_ihost (prp_id,ser_id,valor,usr_id) values('".$fila[prp_id]."',".$fila_ser[ser_id].",'".$fila_ser[valor]."',17);";							
											//$str.="mysql_query(\"$cadena\") or \$error=\"Consulta: $cadena\".mysql_error();\r\n";	
											$godaddy[$cant_fotos_gd]=$cadena;	
											$cant_fotos_gd++;
									}

									//inserto en fotos
									$res_alt=mysql_query("select * from fotos where prp_id=".$fila[prp_id]." and usr_id=17");					
									$restar=0;
									while ($fila_fot=mysql_fetch_array($res_alt)){
										//$restar=1;
										if (mysql_num_rows($res_alt)>0){
											//print "<br> FOTOS ".mysql_num_rows($res_alt).": select * from fotos where prp_id=".$fila[prp_id]." and usr_id=17";
											$cadena="insert into fotos (fo_enl,prp_id,usr_id,fo_nro,fo_desc) values('".$fila_fot[fo_enl]."',".$fila[prp_id].",".$fila[usr_id].",".$fila_fot[fo_nro].",'".$fila_fot[fo_desc]."');";		
											//$str.="mysql_query(\"$cadena\") or \$error=\"Consulta: $cadena\".mysql_error();\r\n";	
											$godaddy[$cant_fotos_gd]=$cadena;
											$cadena="";
											$cant_fotos_gd++;
											}
									}
									//if ($restar){$cant_fotos_gd--;}	
								//}//fin if mysql_num_rows

								//CONECTO CON GODADDY
							/*	$HOST_GD="www.cocucci.com.ar";     
								$USUARIO_GD="cocucci_usr";
								$PASSWORD_GD="dekonoli321";
								$BASE_DATOS_GD="cocucci_web";
								$db_gd=mysql_connect($HOST_GD,$USUARIO_GD,$PASSWORD_GD);
								mysql_select_db($BASE_DATOS_GD,$db_gd);
								mysql_query("SET CHARACTER SET latin1");
								mysql_query("SET NAMES latin1");
							*/	//RECORRO EL VECTOR Y EJECUTO LOS CAMBIOS EN GODADDY
							
					
								for($j=0;$j<$cant_fotos_gd;$j++){
										//$res=mysql_query($godaddy[$j]);
										print"<br>SQL: ".$godaddy[$j];
										fputs($fp2,$godaddy[$j]);
								}//fin for			
								//DESCONECTO CON GODADDY
							//	mysql_close($db_gd);

					
				}//fin while
?>	