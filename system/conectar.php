<?php
	extract($_GET);
	extract ($_POST);
	extract ($_REQUEST);
	$usr_id=17;

//echo "connecting...";	
include ("php/config.php");
include ("php/sec_head.php");

include (_FILE_UTIL_MEN);

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>::::::::::::</title>
<?php
	include("head.php");
	
	$ip_server="190.15.195.119";

?>
</head>
<body>

<table width="100%" border="0" cellpadding="1" cellspacing="2">
  <tr>
    <td valign="top" class="tableOscura"><h2 align="right">Conectando</h2></td>
  </tr>
  <tr>
    <td width="50%" valign="top"><h2 align="left"></h2>
    	  
    </td>
</tr>
</table>

<?
//parent.Dialog.info(\"<div style='font-size:12px;'><br><br><br>Aguarde mientras se Actualiza el sistema.</div><br> $string  \", {width:350, height:100,showprogress: true});
	if($propiedades){
		
			$conn_id = ftp_connect($INTERNET_HOST); 
			$login = ftp_login($conn_id,$INTERNET_USR,$INTERNET_PASS); 
			@ftp_pasv($conn_id,1);
		 	
		    if ((!$conn_id) || (!$login)) { 
		 	 		if(!$conn_id)
						print "Error en la conexión. Revise su conexión a Internet (Propiedades)";
					else 
						print "Error en login";
				    exit; 
		    }else{
		        print "CONECTADO";
		    }
//$fotos=mysql_query("select prp_id,cambios_fotos from cambios where cambio_det!='eliminacion'",$db);
//echo "fotos_:".$fotos;
			$script=armar_script(17);
//			echo "listo act_online<br>";

			include ("php/conexion.php");
/*		
		 	$upload = ftp_put($conn_id,"$INTERNET_DIR/act_online_"._USR_ID.".php","act_online_"._USR_ID.".php",FTP_BINARY); 
//			$chmod = @ftp_site($conn_id,"CHMOD 0777 $INTERNET_DIR/act_online_$usr_id.php");
//			echo "upload:".$upload;
			if (!$upload){ 
			        print "Error al subir las actualizaciones 1";
			        exit();
			}else if(!$script){
				print"Error al armar el script";
				exit();
					
			}else{	*/
//				print "<br>act_online OK!<br>";
				$fotos=mysql_query("select prp_id,cambios_fotos from cambios where cambio_det!='eliminacion'");
//				print "<br>db:".$db."<br>resultado consulta fotos:".$fotos;
				while($foto=mysql_fetch_array($fotos)){
					$vector=explode("x",$foto[cambios_fotos]);
//					print "<br>resultado consulta fotos:".$fotos;
					for($i=0;$i<=count($vector)-1;$i++){
						if($vector[$i]){
							$verif=mysql_query("select * from fotos where prp_id=$foto[prp_id] and usr_id=$usr_id and fo_nro=$vector[$i]") or die(mysql_error());
							
							if(mysql_num_rows($verif)){
								$id_foto=$foto[prp_id]."-".$usr_id."-".$vector[$i].".gif";
								$archivo1="$INTERNET_DIR/fotos/".$id_foto;
								$archivo2="../fotos/".$id_foto;
								//print"<br>INTERNET $archivo2 -> $archivo1 <br>";
								if (ftp_put($conn_id,"$archivo1","$archivo2",FTP_BINARY)){
									//print "<br>Se subió la Foto OK<br>";
								}else{
									print "<br>Error en la Transferencia: conn_id: ".$conn_id."<br>";
								}
								//print "<br>Resultado: ".$res;
								//$chmod = ftp_site($conn_id,"CHMOD 0777 $archivo1");	
							}
						}
					}
				}	 
//			}

			$close = ftp_close($conn_id);
/*
		//echo "http://www.inmoclick.com.ar/ftp_inmohost/act_online_"._USR_ID.".php?usr_id="._USR_ID."&usr_cim="._USR_CIM."&ip=$ip_server";
		print" 
			<script>
		 		window.location.href='http://www.inmoclick.com.ar/ftp_inmohost/act_online_"._USR_ID.".php?usr_id="._USR_ID."&usr_cim="._USR_CIM."&ip=$ip_server';
			</script>";
*/
		print "<script languaje='javascript'>location.href='./actualizador_pre.php?borrar_cache_inm=1&e=0'</script>";
				
	}//fin if propiedades

	
	if($medios){
		    	?>
			<script language="javascript">
				parent.$('pieMensajes').innerHTML='<?php echo _MENS_ACT_TEMP_2; ?>';
			</script>
		<?
		echo "
	  	<tr>
    		<td width=\"50%\" valign=\"top\"><h2 align=\"left\"> Chequeando mensajes para enviar...<br></h2></td>
		</tr>";
		$subject="Publicacion en la grafica";
		
		$diarios="select * from receptores";
		$res_dia=mysql_query($diarios);
		//recorro todos los medios para armar un mail por cada medio.
		while ($fila_diarios=mysql_fetch_array($res_dia)){
		
				$to=$fila_diarios[mail];
				
				if($fila_diarios[mailcc]){
					$cc=$fila_diarios[mailcc];
				}
				
				
				$msg="Estimados $fila_diarios[med_raz]:\r\n\r\nPróximos avisos:\r\n\r\n";
		
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
					
					$msg.="\r\nAviso $i:## $prp_pub ";
					
					for($j=0;$j<count($fechas);$j++){
						
						$msg.=$fechas[$j]." - ";
					}
					
					$i++;
					
					$msg.=" ##\r\n";
						
				}
				
				$msg.="\n\rAtte. "._USR_RAZ."\r\n";
				$msg.=_USR_DOM."\r\n";	
				$msg.=_USR_TEL."\r\n";
				
					$res=mandar_mail($from,_USR_RAZ,$to,$cc,$subject,$msg,$MAIL_SMTP,$MAIL_USR,$MAIL_PASS);
				
				if($res!=1){
					
					echo "
						<tr>
    						<td width=\"50%\" valign=\"top\"><h2 align=\"left\"> No se pudieron enviar los mensajes. <br>Revise su conexion a Internet.<br> Mensaje de Error: $res</h2></td>
						</tr>";
					echo"
						<table width=\"100%\">
						<tr>
							<td width=\"100%\" align=center><input type=\"button\" name=\"Aceptar\" value=\"Aceptar\" onclick=\"parent.Windows.close('win_actualizador')\"></td>
						</tr>
					";
					?>
						<script language="javascript">
							parent.$('pieMensajes').innerHTML='';
						</script>
					<?
				
				}
								
		}
		
		print"
			<tr>
    			<td width=\"50%\" valign=\"top\"><h2 align=\"left\"> Todos los mensajes fueron enviados.<br></h2></td>
			</tr>
			<tr>
    			<td width=\"50%\" valign=\"top\"><input type=\"button\" name=\"Aceptar\" value=\"Aceptar\" onclick=\"parent.Windows.close('win_actualizador')\"></td>
			</tr>	
			";
		?>
						<script language="javascript">
							parent.$('pieMensajes').innerHTML='<?php echo _MENS_ACT_OK; ?>';
						</script>
					<?
			
	}
	
	if($red_cim){
		
		
	}
	
	
	if($bar_priv){
		
		?>
			<script language="javascript">
				parent.$('pieMensajes').innerHTML='<?php echo _MENS_ACT_TEMP_3; ?>';
			</script>
		<?

	
			$conn_id = ftp_connect($INTERNET_HOST); 
			$login = ftp_login($conn_id,$INTERNET_USR,$INTERNET_PASS); 
			@ftp_pasv($conn_id,1);
			//$fotos=mysql_query("select fo1_id, fo2_id, fo3_id, fo4_id, fo5_id, fo6_id, cambio_fo1, cambio_fo2, cambio_fo3, cambio_fo4 from $cambios where cambio_det!='eliminacion' ");
			 	if ((!$conn_id) || (!$login)) { 
			 	 		 if(!$conn_id)
							print "Error en la conexión. Revise su conexión a Internet (Barrios Privados)";
						else 
							print "Error en login";
						
			        exit; 
			    }else{
			        print "CONECTADO";
			    }
			    
			    
			$script=armar_script_bar_priv(_USR_ID);
			
		
			$upload = @ftp_put($conn_id,"$INTERNET_DIR/act_bar_priv_"._USR_ID.".php","act_bar_priv_"._USR_ID.".php",FTP_BINARY); 
//			$chmod = @ftp_site($conn_id,"CHMOD 0777 $INTERNET_DIR/act_online_$usr_id.php");
				
			if (!$upload){ 
			        print "Error al subir las actualizaciones 2";
			        exit();
			}else if(!$script){
				print"Error al armar el script";
				exit();
					
			}else{	
				
				$fotos=mysql_query("select bar_id,cambio_fotos,bar_logo from cambios_bar_priv where cambio_det!='eliminacion' ");
				while($foto=mysql_fetch_array($fotos)){
					$vector=explode("x",$foto[cambio_fotos]);
					for($i=0;$i<=count($vector)-1;$i++){
						if($vector[$i]){
							$verif=mysql_query("select * from fotos_x_bar where bar_id=$foto[bar_id] and usr_id=$usr_id and fo_id=$vector[$i]") or die(mysql_error());
							
							if(mysql_num_rows($verif)){
								$id_foto="bar_".$foto[bar_id]."-".$usr_id."-".$vector[$i].".gif";
								$archivo1="$INTERNET_DIR/fotos/".$id_foto;
								$archivo2="../fotos/".$id_foto;
						//		print"INTERNET $archivo2 -> $archivo1 <br>";
								$res=ftp_put($conn_id,"$archivo1","$archivo2",FTP_BINARY);
//								$chmod = ftp_site($conn_id,"CHMOD 0777 $archivo1");	
							}
						}
					}
					
					if($foto[bar_logo]!=""){
						
						$archivo1="$INTERNET_DIR/logos/".$foto[bar_logo];
						$archivo2="extra/logos/".$foto[bar_logo];
				//		print"INTERNET $archivo2 -> $archivo1 <br>";
						$res=ftp_put($conn_id,"$archivo1","$archivo2",FTP_BINARY);
					}
					
				}
								
					 
			}	
		
		

		print"
			<script>
		  		window.location.href='http://www.inmoclick.com.ar/ftp_inmohost/act_bar_priv_"._USR_ID.".php?usr_id="._USR_ID."&ip=$ip_server';
			</script>";
		
	}
	
	if($usuario){
		
		?>
			<script language="javascript">
				parent.$('pieMensajes').innerHTML='<?php echo _MENS_ACT_TEMP_4; ?>';
			</script>
		<?

	
			$conn_id = ftp_connect($INTERNET_HOST); 
			$login = ftp_login($conn_id,$INTERNET_USR,$INTERNET_PASS); 
			@ftp_pasv($conn_id,1);
			
			 	if ((!$conn_id) || (!$login)) { 
			 	 		 if(!$conn_id)
							print "Error en la conexión. Revise su conexión a Internet (Empleados)";
						else 
							print "Error en login";
						
			        exit; 
			    }else{
			        print "CONECTADO";
			    }
			    
			    
			$script=armar_script_emp(_USR_ID);
		//	exit();
		
			$upload = @ftp_put($conn_id,"$INTERNET_DIR/act_emp_"._USR_ID.".php","act_emp_"._USR_ID.".php",FTP_BINARY); 
//			$chmod = @ftp_site($conn_id,"CHMOD 0777 $INTERNET_DIR/act_online_$usr_id.php");
			$close= ftp_close($conn_id);	
			if (!$upload){ 
			        print "Error al subir las actualizaciones 3";
			        exit();
			}else if(!$script){
				print"Error al armar el script";
				exit();
					
			}else{	
				
				$fotos=mysql_query("select fo_id from cambios_emp");
				
				$conn_id = ftp_connect($INTERNET_HOST);
                        	$login = ftp_login($conn_id,$INTERNET_USR,$INTERNET_PASS);
                        	ftp_pasv($conn_id,1);
				
				while($foto=mysql_fetch_array($fotos)){
					
					if($foto[fo_id]!=-1){
						$id_foto="emp_".$foto[fo_id]."-".$usr_id.".gif";
						$archivo1="$INTERNET_DIR/fotos/".$id_foto;
						$archivo2="../fotos/".$id_foto;
			//			print"INTERNET $archivo2 -> $archivo1 <br>";
						$res=ftp_put($conn_id,"$archivo1","$archivo2",FTP_BINARY);
						
					}
				}
				$close2=ftp_close($conn_id);
			}	
		//print "aaa";

		print"
			<script>
		  		window.location.href='http://www.inmoclick.com.ar/ftp_inmohost/act_emp_"._USR_ID.".php?usr_id="._USR_ID."&ip=$ip_server';
			</script>";
		
	}//if usuario

	//Print "<br>LISTO";
	
?>
</body>
</html>