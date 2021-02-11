<?php

	extract($_GET);
	extract ($_POST);
	extract ($_REQUEST);

include "../parametros.php";
						mysql_query("start transaction");
mysql_query("insert into bar_priv  values(25,
																		  17,
																			'Chacras de Farrell',
																			'0',
																			'0',
																			'0',
																			'',
																			'',
																			'4392212',
																			'',
																			'502',
																			'21',
																			'1',
																			'',
																			'Besares',
																			'0',
																			'',
																			'',
																			''
																			)
																			
																			") or $error="Consulta: insert 25 - 17".mysql_error();
mysql_query("update bar_priv set 
																	bar_denom='Chacras de Farrell',
																	bar_sup_tot='0',
																	bar_sup_lot='0',
																	bar_cant_lot='0',
																	bar_serv='',
																	bar_cont='',
																	bar_tel='4392212',
																	bar_mail='',
																	loc_id='502',
																	pro_id='21',
																	pai_id='1',
																	bar_zona='',
																	bar_dir='Besares',
																	bar_comp_priv='0',
																	bar_url='',
																	bar_logo='',
																	bar_desc=''
															 where bar_id=25 and usr_id=17)") or $error="Consulta: update 25 - 17".mysql_error();
mysql_query("delete from fotos_x_bar where bar_id=25 and usr_id=17") or $error="Consulta: delete from fotos_x_bar where bar_id=25 and usr_id=17".mysql_error();
mysql_query("insert into bar_priv  values(26,
																		  17,
																			'Country de Chacras  ',
																			'0',
																			'0',
																			'0',
																			'',
																			'',
																			'4392212',
																			'',
																			'502',
																			'21',
																			'1',
																			'',
																			'Viamonte 4900',
																			'0',
																			'',
																			'',
																			''
																			)
																			
																			") or $error="Consulta: insert 26 - 17".mysql_error();
mysql_query("insert into bar_priv  values(27,
																		  17,
																			'Solar del Plata',
																			'0',
																			'0',
																			'0',
																			'',
																			'',
																			'4392212',
																			'',
																			'8',
																			'21',
																			'1',
																			'Vistalba',
																			'Roque Saez Peña',
																			'0',
																			'',
																			'',
																			''
																			)
																			
																			") or $error="Consulta: insert 27 - 17".mysql_error();
mysql_query("insert into bar_priv  values(28,
																		  17,
																			'" Yacopini"',
																			'0',
																			'0',
																			'0',
																			'',
																			'',
																			'4-392212',
																			'',
																			'502',
																			'21',
																			'1',
																			'',
																			'Alzaga casi Pueyrredón',
																			'0',
																			'',
																			'',
																			''
																			)
																			
																			") or $error="Consulta: insert 28 - 17".mysql_error();
mysql_query("insert into bar_priv  values(29,
																		  17,
																			'Villa Palmares',
																			'0',
																			'0',
																			'0',
																			'',
																			'',
																			'0',
																			'',
																			'1',
																			'21',
																			'1',
																			'',
																			'Panamericana',
																			'1',
																			'',
																			'',
																			''
																			)
																			
																			") or $error="Consulta: insert 29 - 17".mysql_error();
mysql_query("insert into bar_priv  values(30,
																		  17,
																			'Huerto Privado',
																			'0',
																			'0',
																			'0',
																			'',
																			'',
																			'4392212',
																			'',
																			'8',
																			'21',
																			'1',
																			'',
																			'Huerto Privado',
																			'0',
																			'',
																			'',
																			''
																			)
																			
																			") or $error="Consulta: insert 30 - 17".mysql_error();
mysql_query("insert into bar_priv  values(31,
																		  17,
																			'RINCON DE ARAOZ',
																			'0',
																			'0',
																			'0',
																			'',
																			'',
																			'0',
																			'',
																			'502',
																			'21',
																			'1',
																			'',
																			'Araoz metros Acceso Sur',
																			'0',
																			'',
																			'',
																			''
																			)
																			
																			") or $error="Consulta: insert 31 - 17".mysql_error();
mysql_query("insert into bar_priv  values(32,
																		  17,
																			'Club de Campo Mendoza',
																			'0',
																			'0',
																			'0',
																			'',
																			'',
																			'431 5966',
																			'',
																			'2',
																			'21',
																			'1',
																			'Dorrego',
																			'Elpidio Gonzales',
																			'0',
																			'',
																			'',
																			''
																			)
																			
																			") or $error="Consulta: insert 32 - 17".mysql_error();
mysql_query("insert into bar_priv  values(33,
																		  17,
																			'Centro',
																			'0',
																			'0',
																			'0',
																			'',
																			'',
																			'4429900',
																			'',
																			'19',
																			'21',
																			'1',
																			'',
																			'Centro Godoy Cruz',
																			'0',
																			'',
																			'',
																			''
																			)
																			
																			") or $error="Consulta: insert 33 - 17".mysql_error();
mysql_query("update bar_priv set 
																	bar_denom='Centro',
																	bar_sup_tot='0',
																	bar_sup_lot='0',
																	bar_cant_lot='0',
																	bar_serv='',
																	bar_cont='',
																	bar_tel='4429900',
																	bar_mail='',
																	loc_id='19',
																	pro_id='21',
																	pai_id='1',
																	bar_zona='',
																	bar_dir='Centro Godoy Cruz',
																	bar_comp_priv='0',
																	bar_url='',
																	bar_logo='',
																	bar_desc=''
															 where bar_id=33 and usr_id=17)") or $error="Consulta: update 33 - 17".mysql_error();
mysql_query("delete from fotos_x_bar where bar_id=33 and usr_id=17") or $error="Consulta: delete from fotos_x_bar where bar_id=33 and usr_id=17".mysql_error();
mysql_query("insert into bar_priv  values(34,
																		  17,
																			'La Vacherie Country Golf',
																			'0',
																			'0',
																			'0',
																			'',
																			'',
																			'4429900',
																			'',
																			'7',
																			'21',
																			'1',
																			'',
																			'Azcuenaga 2002 - Lunlunta',
																			'0',
																			'',
																			'',
																			''
																			)
																			
																			") or $error="Consulta: insert 34 - 17".mysql_error();

								
					if($error){
						$e=1;
						mysql_query("rollback");
						?>
							<link rel=stylesheet href="inmoclick.css" type=text/css>
							<div id=tabla1 class=celda_2 style='position:absolute;left:25%;top:20%;'>
								<table align=center border=0 width=60% cellspacing=0 style="border-top:1px solid #990000;border-bottom:1px solid #990000;border-left:1px solid #990000;border-right:1px solid #990000;">
									<tr>
										<td style="font-family:verdana;font-size:11px;font-color:#DDDDDD;" colspan=6><b>Ocurrio un error en la consulta. La actualización no se pudo llevar a cabo. <?print $error?></b></td>
									</tr>
									<tr>
										<td style="font-family:verdana;font-size:11px;font-color:#DDDDDD;" colspan=6><b><? 
											mail("aldo@cocucci.com.ar","Informe de error usuario $usr_id $usr_raz ","El usuario $usr_id $usr_raz no ha podido actualizar sus barrios privados en internet:$error");					
											
										?>Se ha enviado un informe de error.</b></b></td>
									</tr>
								</table>		
							</div>
							
							<?
					}else{
							
							$e=0;
							mysql_query("commit");
					}		
							
						
						
						?>
							
						
							<script language="javascript">
									location.href="http://<?print $ip?>/inmohostV2.0/system/actualizador_pre.php?usr_id=<?print $usr_id?>&borrar_cache_bar_priv=1&e=<?print $e?>";
							</script>
						
						<?
					
					
					?>
				