<?php
	extract($_GET);
	extract ($_POST);
	extract ($_REQUEST);

include(_FILE_PHP_DIR);
mysql_query("start transaction");
switch ($mod_tip)
{
	case "add":
			
			if($cant){
	
				for($i=0;$i<$cant;$i++){
					
					if($errors){
						break;					
					}
				
					$msg="msg".$i;
					$de="de".$i;
					$to="to".$i;
					$cc="cc".$i;
					$subject="subject".$i;
					$con_fotos="con_fotos".$i;
					$prp_ids="prp_ids".$i;
					$prp_fecs="prp_fecs".$i;
					$rec_id="rec_id".$i;
					if($$to){
						if($$to)
						//si solicito enviar fotos de las propiedades, las tomo y las guardo en un array
						if($$con_fotos){
							$props=split("#",$$prp_ids);
							for ($j=0;$j<count($props);$j++){
								
								if($props[$j]){
									$cadena="select fo_enl,fo_desc from propiedades,fotos where propiedades.prp_id=fotos.prp_id and propiedades.usr_id=fotos.usr_id and fotos.prp_id=$props[$j] and fotos.usr_id="._USR_ID." order by fo_nro ASC limit 1";
									$res=mysql_query($cadena);
									if(mysql_num_rows($res)){
										$att_nom[$j]="foto-ID_".$props[$j]."-"._USR_ID.".jpg";
										$att_ruta[$j]=$DOCUMENT_ROOT."/inmohostV2.0/fotos/".mysql_result($res,0,0);
									}
								}
								
							}
						}
						
							//guardo en la tabla publicaciones el historial de envios
							
							$props=split("#",$$prp_ids);
							$fecs=split("#",$$prp_fecs);
								
							for($j=0;$j<count($props)-1;$j++){
								if($props[$j]){
								
									//separo las fechas q estan desordenadas
									$_fechas=split("x",$fecs[$j]);
									
									$_fechas=array_slice($_fechas,1,count($_fechas));
							
									//las recorro una por una y las paso a milisegundos
									for ($n=0;$n<count($_fechas);$n++){
											
											$f=split("-",$_fechas[$n]);
											$fe[$n]=mktime(0,0,0,$f[1],$f[0],$f[2]);	
													
									}	
									//$fe contiene las fechas en milisegudos
									//ordeno de menor a mayor
									
									asort($fe);	
									
									//ahora las vuelvo a pasar a formato fecha
									for ($n=0;$n<count($_fechas);$n++){
									
											
										$fe[$n]=date("Y-m-d",$fe[$n]);
									}				
									
									$pub_id=max_id("publicaciones","pub_id");
									$cadena="insert into publicaciones values($pub_id,'$fe[0]','".$fe[count($fe)-1]."',0,".$$rec_id.",".$props[$j].",'".$fecs[$j]."',now())";			
								
									mysql_query($cadena) or $errors="No inserta en publicaciones".mysql_error();
									
								}
							}
						
					
						if($errors){
							
								$errors="Error al cargar publicaciones".mysql_error();		
						}else{
						
							$rs=mandar_mail(_USR_MAIL,_USR_RAZ,$$to,$$cc,$$subject,$$msg,$MAIL_SMTP,$MAIL_USR,$MAIL_PASS,$att_ruta,$att_nom);
							if($rs!=1){
								$errors="Error al enviar mails. $rs. Revise su conexión a Internet";								
							}else{
								$resultado=" Los avisos fueron enviados con exito.";
							}
							
						}
					}
				}
				
			}else{
				$errors="No existen mensjaes para enviar";
			}
   
   case "edit": 
   	
   break;
}
if (!$errors)	
{
	mysql_query("commit");
//	mysql_query("rollback");
}
else 
{
	mysql_query("rollback");
	
}


?>