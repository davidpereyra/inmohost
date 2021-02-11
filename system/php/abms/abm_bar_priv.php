<?php
	extract($_GET);
	extract ($_POST);
	extract ($_REQUEST);
$ind_error=0;
$ind_exito=0;
$MAX_TAM_FOT=70000;
mysql_query("start transaction");
switch ($mod_tip)
{
	case "add":
			
			$max_id = mysql_query ("select max(bar_id) from bar_priv"); //obtiene el id maximo de rubros para agregar en tabla
			if(mysql_num_rows($max_id) )
			{
				$max_id = mysql_result($max_id,0,0) + 1;
			}else{
				$max_id=1;
			}
			
			if (!$errors)
			{
			
		 		$verif=mysql_query("select * from bar_priv");
				if(mysql_num_rows($verif)){
					$max=mysql_query("select max(bar_id) from bar_priv");
					$max=mysql_result($max,0,0) + 1;
				}else{
					$max=1;	
				}	
				if($bar_logo!=""){
					
					if(filesize($bar_logo)<$MAX_TAM_FOT){
						
						
						copy($bar_logo,$rutaSystema."extra/logos/bar_log_"._USR_ID."_$max.gif");				
						$bar_logo="bar_log_"._USR_ID."_$max.gif";
						
					}else{
						
						redim_foto("bar_logo",$rutaSystema."extra/logos/","bar_log_"._USR_ID."_$max");
						$bar_logo="bar_log_"._USR_ID."_$max.gif";
					}
					
				}
								
				$verif=mysql_query("select * from cambios_bar_priv");
				if(mysql_num_rows($verif)){
					$max_camb=mysql_query("select max(cambio_id) from cambios_bar_priv");
					$max_camb=mysql_result($max_camb,0,0) + 1;
				}else{
					$max_camb=1;	
				}
				$cambios="insert
		 							into
		 				  cambios_bar_priv
		 							values
		 					($max,
		 					$usr_id,
		 					'$bar_denom',
		 					'$bar_sup_tot',
		 					'$bar_sup_lot',
		 					'$bar_cant_lot',
		 					'$bar_serv',
		 					'$bar_cont',
		 					'$bar_tel',
		 					'$bar_mail',
		 					'$loc_id',
		 					'$pro_id',
		 					'$pai_id',
		 					'$bar_zona',
		 					'$bar_dir',
		 					'$bar_comp_priv',
		 					'$bar_url',
		 					'$bar_logo',
		 					$max_camb,
		 					'alta',
		 					'".date("Y-m-d")."',
		 					''
		 					)";
				
		 		mysql_query($cambios) or $errors="no inserta en cambios bar priv".mysql_error().$cadena;
					
		 		$cadena="insert
		 							into
		 				  bar_priv
		 							values
		 					($max,
		 					$usr_id,
		 					'$bar_denom',
		 					'$bar_sup_tot',
		 					'$bar_sup_lot',
		 					'$bar_cant_lot',
		 					'$bar_serv',
		 					'$bar_cont',
		 					'$bar_tel',
		 					'$bar_mail',
		 					'$loc_id',
		 					'$pro_id',
		 					'$PAIS_DEFAULT',
		 					'$bar_zona',
		 					'$bar_dir',
		 					'$bar_comp_priv',
		 					'$bar_url',
		 					'$bar_logo',
		 					'$bar_desc',
							'',
							'',
							'',
							''
		 					)";
		 		
		 		mysql_query($cadena) or $errors="no inserta en bar priv".mysql_error().$cadena;
		 		
		 		
		 		$cambio_fotos="";	
		 		$x=1;
		 		$j=0;
		 		while ($x<=$cant_fotos)		//Copia las fotos en FOTOS
		 				 		{
			 			$fo="fo".$x;
				 		if($$fo!="")
				 		{	
				 			$j++;	
				 			$foto_id="fo".$x;
							$id_foto="bar_".$max_id."-".$usr_id."-".$x;
				 			$fo_enl="bar_".$max_id."-".$usr_id."-$x.gif";
				 			list($size_x,$size_y,$tipo,$atr)=getimagesize($$fo);
				 			if(filesize($$fo)<$MAX_TAM_FOT || ($size_x<600 && $size_y<600) )
							{
								copy($$fo,"../fotos/".$fo_enl);
							}
							else
							{	
								redim_foto($foto_id,"../fotos/",$id_foto);
				    		}		
				    		
		 					$cambio_fotos.="x".$j;
		 					$cad2="insert into fotos_x_bar values('',$max_id,$usr_id,$x,'$fo_enl')";
		 					mysql_query($cad2) or $errors="Error al subir fotos".mysql_error().$cad2;
		 					
						}	
						$x++;
				}//fin while
				$cant_fotos=$j;
				
		 		$cad_cambios="update cambios_bar_priv set cambio_fotos='$cambio_fotos' where bar_id=$max_id";
		 		mysql_query($cad_cambios) or $errors="Error al cambiar fotos en cambios".mysql_error()."cad_cambios";
		 		
				
			}
			
			$resultado="El barrio privado fue agregado al sistema";
   /***********************************************************************************************************************
	******************************************   FIN ALTA BARRIO  ********************************************
	***********************************************************************************************************************/
   break;
   case "edit": 
   
		if($bar_id){		
								
				$verif=mysql_query("select * from cambios_bar_priv");
				if(mysql_num_rows($verif)){
					$max_camb=mysql_query("select max(cambio_id) from cambios_bar_priv");
					$max_camb=mysql_result($max_camb,0,0) + 1;
				}else{
					$max_camb=1;	
				}
				$cambios="insert
		 							into
		 				  cambios_bar_priv
		 							values
		 					($bar_id,
		 					$usr_id,
		 					'$bar_denom',
		 					'$bar_sup_tot',
		 					'$bar_sup_lot',
		 					'$bar_cant_lot',
		 					'$bar_serv',
		 					'$bar_cont',
		 					'$bar_tel',
		 					'$bar_mail',
		 					'$loc_id',
		 					'$pro_id',
		 					'$pai_id',
		 					'$bar_zona',
		 					'$bar_dir',
		 					'$bar_comp_priv',
		 					'$bar_url',
		 					'$bar_logo',
		 					$max_camb,
		 					'modificacion',
		 					'".date("Y-m-d")."',
		 					''
		 					)";
				
		 		mysql_query($cambios) or $errors="no inserta en cambios bar priv".mysql_error().$cadena;
				
		 		 $cadena="update bar_priv 
		 						set
		 					 		bar_denom='$bar_denom',
				 					bar_sup_tot='$bar_sup_tot',
				 					bar_sup_lot='$bar_sup_lot',
				 					bar_cant_lot='$bar_cant_lot',
				 					bar_serv='$bar_serv',
				 					bar_cont='$bar_cont',
				 					bar_tel='$bar_tel',
				 					bar_mail='$bar_mail',
				 					loc_id='$loc_id',
				 					pro_id='$pro_id',
				 					pai_id='$PAIS_DEFAULT',
				 					bar_zona='$bar_zona',
				 					bar_dir='$bar_dir',
				 					bar_comp_priv='$bar_comp_priv',
				 					bar_url='$bar_url',
				 					bar_desc='$bar_desc'
				 				where
				 					bar_id=$bar_id		 					
		 					";
		 		
		 		mysql_query($cadena) or $errors="no modifica en bar priv".mysql_error().$cadena;
		 		
		 		
		 		$cambio_fotos="";	
		 		$x=1;
		 		$j=0;
		 		while ($x<=$cant_fotos)		//Copia las fotos en FOTOS
		 				 		{
			 			$fo="fo".$x;
				 		if($$fo!="")
				 		{	
				 			$j++;	
				 			$foto_id="fo".$x;
							$id_foto="bar_".$bar_id."-".$usr_id."-".$x;
				 			$fo_enl="bar_".$bar_id."-".$usr_id."-$x.gif";
				 			list($size_x,$size_y,$tipo,$atr)=getimagesize($$fo);
				 			if(filesize($$fo)<$MAX_TAM_FOT || ($size_x<600 && $size_y<600) )
							{
								copy($$fo,"../fotos/".$fo_enl);
							}
							else
							{	
								redim_foto($foto_id,"../fotos/",$id_foto);
				    		}		
				    		
		 					$cambio_fotos.="x".$j;
		 					$cad2="delete from fotos_x_bar where bar_id=$bar_id and usr_id="._USR_ID." and fo_id=$x";
		 					mysql_query($cad2) or $errors="Error al eliminar fotos".mysql_error().$cad2;
		 					$cad2="insert into fotos_x_bar values('',$bar_id,$usr_id,$x,'$fo_enl')";
		 					mysql_query($cad2) or $errors="Error al subir fotos".mysql_error().$cad2;
		 					
						}	
						$x++;
				}//fin while
				$cant_fotos=$j;
				
		 		$cad_cambios="update cambios_bar_priv set cambio_fotos='$cambio_fotos' where bar_id=$bar_id";
		 		mysql_query($cad_cambios) or $errors="Error al cambiar fotos en cambios".mysql_error()."cad_cambios";
		 		
				if($bar_logo!=""){
					
					if(filesize($bar_logo)<$MAX_TAM_FOT){
						
						
						copy($bar_logo,$rutaSystema."extra/logos/bar_log_"._USR_ID."_$bar_id.gif");				
						$bar_logo="bar_log_"._USR_ID."_$bar_id.gif";
						
					}else{
						
						redim_foto("bar_logo",$rutaSystema."extra/logos/","bar_log_"._USR_ID."_$bar_id");
						$bar_logo="bar_log_"._USR_ID."_$bar_id.gif";
					}
					
					$act_logo="update bar_priv set bar_logo='$bar_logo' where bar_id=$bar_id";
					mysql_query($act_logo) or $errors="Error al actualizar logo".mysql_error().$act_logo;
					
					$act_logo="update cambios_bar_priv set bar_logo='$bar_logo' where bar_id=$bar_id";
					mysql_query($act_logo) or $errors="Error al actualizar logo en cambios_bar priv".mysql_error().$act_logo;
					
				}
		
			
			$resultado="El barrio privado fue modificado";
		}else{
			$errors="No llega el ID";
		}
   break;
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