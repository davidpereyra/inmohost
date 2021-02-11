<?
						extract($_GET); 
						include "../parametros.php";
					    include "../include/funciones/funciones.php";
						mysql_query("start transaction");
mysql_query("update propiedades set fotos='15',loc_id=594,pro_id=21,prp_bar='Portal Vistalba',prp_dom='Saenz Peña Lujan',pai_id='1',con_id='1',tip_id='6',prp_pre=0,prp_desc='COCUCCI INMOBILIARIA COMERCIALIZA: LOTES EN PORTAL VISTALBA.<br />
Desde 1.000m2.<br />
Terrenos Isla con mas de 20 metros de frente, algunos de estos cuentan con salida a dos calles internas del loteo.<br />
FINANCIACIÓN SIN INTERÉS. En dólares.<br />
El loteo es cerrado con vigilancia permanente, los terrenos cuentan con agua, luz, gas y derecho de riego.<br /> 
Muy buena organización administrativa, ya que el loteo cuenta con muy buen mantenimiento de sus espacios.<br />
El loteo se ubica por calle Guardia Vieja hacia el sur luego por Saenz Peña hacia el Oeste unos 1000 metros de vereda Sur.<br /> 
Dos años de plazo de edificación.<br />          ',prp_nota='Se paga el 50 por ciento del terreo, se escritura y el resto se financia hasta en 12 cuotas en dolares y sin interés. Los terrenos van de los  1000 a los 1400 m2. El valor de los mismos es de  usd 36 el m2.<br />
Expensas: 5,37 por m2.<br />          ',prp_mod='2021-01-08',ori_id=2,prp_pub='PORTAL VISTALBA, Desde 1000m2, Servicios, lotes islas, Seguridad. COCUCCI (Mat.228) www.cocucci.com.ar 4429900.               ',prp_pre_dol='36000',prp_llave='0',prp_cartel='1',prp_referente='49',prp_tas='0',prp_aut='0',pre_inmo='0',pre_prop='0',pre_trans='0',prp_insc_dom='',publica=1,prp_visibilidad='',prp_servicios='               ',prp_mostrar=1,mos_por_1=1,mos_por_2=1,mos_por_3=1,mos_por_4=0,prp_anonimo=0,prp_vip='0',prp_lat='-33.034139531135786', prp_lng='-68.93165588378906', prp_plano='', bar_priv_id=1 where prp_id=3360 and (usr_id=17 or usr_id=0)") or $error="Consulta: update insert 3360 - 17".mysql_error();
mysql_query("delete from fotos where prp_id=3360 and usr_id=17") or $error="Consulta: delete from fotos where prp_id=3360 and usr_id=17".mysql_error();
mysql_query("insert into fotos (fo_enl,prp_id,usr_id,fo_nro,fo_desc) values('3360-17-1.gif',3360,17,1,'')") or $error="Consulta: insert into fotos (fo_enl,prp_id,usr_id,fo_nro,fo_desc) values('3360-17-1.gif',3360,17,1,'')".mysql_error();
mysql_query("insert into fotos (fo_enl,prp_id,usr_id,fo_nro,fo_desc) values('3360-17-2.gif',3360,17,2,'')") or $error="Consulta: insert into fotos (fo_enl,prp_id,usr_id,fo_nro,fo_desc) values('3360-17-2.gif',3360,17,2,'')".mysql_error();
mysql_query("insert into fotos (fo_enl,prp_id,usr_id,fo_nro,fo_desc) values('3360-17-3.gif',3360,17,3,'')") or $error="Consulta: insert into fotos (fo_enl,prp_id,usr_id,fo_nro,fo_desc) values('3360-17-3.gif',3360,17,3,'')".mysql_error();
mysql_query("insert into fotos (fo_enl,prp_id,usr_id,fo_nro,fo_desc) values('3360-17-4.gif',3360,17,4,'')") or $error="Consulta: insert into fotos (fo_enl,prp_id,usr_id,fo_nro,fo_desc) values('3360-17-4.gif',3360,17,4,'')".mysql_error();
mysql_query("insert into fotos (fo_enl,prp_id,usr_id,fo_nro,fo_desc) values('3360-17-5.gif',3360,17,5,'')") or $error="Consulta: insert into fotos (fo_enl,prp_id,usr_id,fo_nro,fo_desc) values('3360-17-5.gif',3360,17,5,'')".mysql_error();
mysql_query("insert into fotos (fo_enl,prp_id,usr_id,fo_nro,fo_desc) values('3360-17-6.gif',3360,17,6,'')") or $error="Consulta: insert into fotos (fo_enl,prp_id,usr_id,fo_nro,fo_desc) values('3360-17-6.gif',3360,17,6,'')".mysql_error();
mysql_query("insert into fotos (fo_enl,prp_id,usr_id,fo_nro,fo_desc) values('3360-17-7.gif',3360,17,7,'')") or $error="Consulta: insert into fotos (fo_enl,prp_id,usr_id,fo_nro,fo_desc) values('3360-17-7.gif',3360,17,7,'')".mysql_error();
mysql_query("insert into fotos (fo_enl,prp_id,usr_id,fo_nro,fo_desc) values('3360-17-8.gif',3360,17,8,'')") or $error="Consulta: insert into fotos (fo_enl,prp_id,usr_id,fo_nro,fo_desc) values('3360-17-8.gif',3360,17,8,'')".mysql_error();
mysql_query("insert into fotos (fo_enl,prp_id,usr_id,fo_nro,fo_desc) values('3360-17-9.gif',3360,17,9,'')") or $error="Consulta: insert into fotos (fo_enl,prp_id,usr_id,fo_nro,fo_desc) values('3360-17-9.gif',3360,17,9,'')".mysql_error();
mysql_query("insert into fotos (fo_enl,prp_id,usr_id,fo_nro,fo_desc) values('3360-17-10.gif',3360,17,10,'')") or $error="Consulta: insert into fotos (fo_enl,prp_id,usr_id,fo_nro,fo_desc) values('3360-17-10.gif',3360,17,10,'')".mysql_error();
mysql_query("insert into fotos (fo_enl,prp_id,usr_id,fo_nro,fo_desc) values('3360-17-11.gif',3360,17,11,'')") or $error="Consulta: insert into fotos (fo_enl,prp_id,usr_id,fo_nro,fo_desc) values('3360-17-11.gif',3360,17,11,'')".mysql_error();
mysql_query("insert into fotos (fo_enl,prp_id,usr_id,fo_nro,fo_desc) values('3360-17-12.gif',3360,17,12,'')") or $error="Consulta: insert into fotos (fo_enl,prp_id,usr_id,fo_nro,fo_desc) values('3360-17-12.gif',3360,17,12,'')".mysql_error();
mysql_query("insert into fotos (fo_enl,prp_id,usr_id,fo_nro,fo_desc) values('3360-17-13.gif',3360,17,13,'')") or $error="Consulta: insert into fotos (fo_enl,prp_id,usr_id,fo_nro,fo_desc) values('3360-17-13.gif',3360,17,13,'')".mysql_error();
mysql_query("insert into fotos (fo_enl,prp_id,usr_id,fo_nro,fo_desc) values('3360-17-14.gif',3360,17,14,'')") or $error="Consulta: insert into fotos (fo_enl,prp_id,usr_id,fo_nro,fo_desc) values('3360-17-14.gif',3360,17,14,'')".mysql_error();
mysql_query("insert into fotos (fo_enl,prp_id,usr_id,fo_nro,fo_desc) values('3360-17-15.gif',3360,17,15,'')") or $error="Consulta: insert into fotos (fo_enl,prp_id,usr_id,fo_nro,fo_desc) values('3360-17-15.gif',3360,17,15,'')".mysql_error();
mysql_query("delete from ser_x_prp_ihost where prp_id=3360 and usr_id=17") or $error="Consulta: delete from ser_x_prp_ihost where prp_id=3360 and usr_id=17".mysql_error();
mysql_query("insert into ser_x_prp_ihost (prp_id,ser_id,valor,usr_id) values('3360',2,'Desde 1.000m2',17)") or $error="Consulta: insert into ser_x_prp_ihost (prp_id,ser_id,valor,usr_id) values('3360',2,'Desde 1.000m2',17)".mysql_error();
mysql_query("insert into ser_x_prp_ihost (prp_id,ser_id,valor,usr_id) values('3360',3,'',17)") or $error="Consulta: insert into ser_x_prp_ihost (prp_id,ser_id,valor,usr_id) values('3360',3,'',17)".mysql_error();
mysql_query("insert into ser_x_prp_ihost (prp_id,ser_id,valor,usr_id) values('3360',4,'Indistinto',17)") or $error="Consulta: insert into ser_x_prp_ihost (prp_id,ser_id,valor,usr_id) values('3360',4,'Indistinto',17)".mysql_error();
mysql_query("insert into ser_x_prp_ihost (prp_id,ser_id,valor,usr_id) values('3360',7,'',17)") or $error="Consulta: insert into ser_x_prp_ihost (prp_id,ser_id,valor,usr_id) values('3360',7,'',17)".mysql_error();
mysql_query("insert into ser_x_prp_ihost (prp_id,ser_id,valor,usr_id) values('3360',8,'',17)") or $error="Consulta: insert into ser_x_prp_ihost (prp_id,ser_id,valor,usr_id) values('3360',8,'',17)".mysql_error();
mysql_query("insert into ser_x_prp_ihost (prp_id,ser_id,valor,usr_id) values('3360',9,'Indistinto',17)") or $error="Consulta: insert into ser_x_prp_ihost (prp_id,ser_id,valor,usr_id) values('3360',9,'Indistinto',17)".mysql_error();
mysql_query("insert into ser_x_prp_ihost (prp_id,ser_id,valor,usr_id) values('3360',10,'Indistinto',17)") or $error="Consulta: insert into ser_x_prp_ihost (prp_id,ser_id,valor,usr_id) values('3360',10,'Indistinto',17)".mysql_error();
mysql_query("insert into ser_x_prp_ihost (prp_id,ser_id,valor,usr_id) values('3360',12,'Si',17)") or $error="Consulta: insert into ser_x_prp_ihost (prp_id,ser_id,valor,usr_id) values('3360',12,'Si',17)".mysql_error();
mysql_query("insert into ser_x_prp_ihost (prp_id,ser_id,valor,usr_id) values('3360',13,'',17)") or $error="Consulta: insert into ser_x_prp_ihost (prp_id,ser_id,valor,usr_id) values('3360',13,'',17)".mysql_error();
mysql_query("insert into ser_x_prp_ihost (prp_id,ser_id,valor,usr_id) values('3360',14,'Si',17)") or $error="Consulta: insert into ser_x_prp_ihost (prp_id,ser_id,valor,usr_id) values('3360',14,'Si',17)".mysql_error();
mysql_query("insert into ser_x_prp_ihost (prp_id,ser_id,valor,usr_id) values('3360',15,'Si',17)") or $error="Consulta: insert into ser_x_prp_ihost (prp_id,ser_id,valor,usr_id) values('3360',15,'Si',17)".mysql_error();
mysql_query("insert into ser_x_prp_ihost (prp_id,ser_id,valor,usr_id) values('3360',17,'',17)") or $error="Consulta: insert into ser_x_prp_ihost (prp_id,ser_id,valor,usr_id) values('3360',17,'',17)".mysql_error();
mysql_query("insert into ser_x_prp_ihost (prp_id,ser_id,valor,usr_id) values('3360',18,'No',17)") or $error="Consulta: insert into ser_x_prp_ihost (prp_id,ser_id,valor,usr_id) values('3360',18,'No',17)".mysql_error();
mysql_query("insert into ser_x_prp_ihost (prp_id,ser_id,valor,usr_id) values('3360',22,'Indistinto',17)") or $error="Consulta: insert into ser_x_prp_ihost (prp_id,ser_id,valor,usr_id) values('3360',22,'Indistinto',17)".mysql_error();
mysql_query("insert into ser_x_prp_ihost (prp_id,ser_id,valor,usr_id) values('3360',23,'Indistinto',17)") or $error="Consulta: insert into ser_x_prp_ihost (prp_id,ser_id,valor,usr_id) values('3360',23,'Indistinto',17)".mysql_error();


				//		$command="chmod -R 777 ./fotos/*";
				//		exec($command);
						

								
				$cad1="select usr_cim,usr_raz from usuarios where usr_id=$usr_id";
				$usr_cim=mysql_result(mysql_query($cad1),0,0);
				$usr_raz=mysql_result(mysql_query($cad1),0,1);


					if($error){
						mysql_query("rollback");
						$e=1;
						?>
							<link rel=stylesheet href="inmoclick.css" type=text/css>
							<div id=tabla1 class=celda_2 style='position:absolute;left:25%;top:20%;'>
								<table align=center border=0 width=60% cellspacing=0 style="border-top:1px solid #990000;border-bottom:1px solid #990000;border-left:1px solid #990000;border-right:1px solid #990000;">
									<tr>
										<td style="font-family:verdana;font-size:11px;font-color:#DDDDDD;" colspan=6><b>Ocurrio un error en la consulta. La actualizaciï¿½n no se pudo llevar a cabo. <?print $error?></b></td>
									</tr>
									<tr>
										<td style="font-family:verdana;font-size:11px;font-color:#DDDDDD;" colspan=6><b><? 
											mail("aldo@cocucci.com.ar","Informe de error usuario $usr_raz ($usr_id) ","El usuario $usr_raz ($usr_id) no ha podido actualizar sus inmuebles en internet:
 $error 
 ");	
											
										?>Se ha enviado un informe de error.</b></b></td>
									</tr>
								</table>		
							</div>
							
							<?
					}else{
							
							mysql_query("commit");
							$e=0;
					 }		
						
						?>
							<script language="javascript">
								location.href="../act_inmohost.php?usr_id=17&ip=192.168.0.22&e=<?print $e?>";
							</script>
						
						<?
					
					
					?>
				