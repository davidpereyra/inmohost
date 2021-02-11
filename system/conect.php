<?php
	
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
	
	$ip_server=$HTTP_HOST;

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
	if($propiedades){
		?>
			<script language="javascript">
				parent.$('pieMensajes').innerHTML='<?php echo _MENS_ACT_TEMP_1; ?>';
			</script>
		<?
		
			$conn_id = ftp_connect($INTERNET_HOST); 
			$login = ftp_login($conn_id,$INTERNET_USR,$INTERNET_PASS); 
			ftp_pasv($conn_id,1);
		 	
		    if ((!$conn_id) || (!$login)) { 
		 	 		 if(!$conn_id)
						print "Error en la conexión. Revise su conexión a Internet (Propiedades)";
					else 
						print "Error en login";
					
		        exit; 
		    }else{
		        print "CONECTADO";
		    }
			    
			$script=armar_script(_USR_ID);
			echo "listo act_online<br>";

		 	$upload = ftp_put($conn_id,"$INTERNET_DIR/act_online_"._USR_ID.".php","act_online_"._USR_ID.".php",FTP_BINARY); 
			
			if (!$upload){ 
			        print "Error al subir las actualizaciones 1";
			        exit();
			}else if(!$script){
				print"Error al armar el script";
				exit();
					
			}else{	
				print "act_online OK!<br>";
				$fotos=mysql_query("select prp_id,cambios_fotos from cambios where cambio_det!='eliminacion' ");
				while($foto=mysql_fetch_array($fotos)){
					$vector=explode("x",$foto[cambios_fotos]);
					for($i=0;$i<=count($vector)-1;$i++){
						if($vector[$i]){
							$verif=mysql_query("select * from fotos where prp_id=$foto[prp_id] and usr_id=$usr_id and fo_nro=$vector[$i]") or die(mysql_error());
							
							if(mysql_num_rows($verif)){
								$id_foto=$foto[prp_id]."-".$usr_id."-".$vector[$i].".gif";
								$archivo1="$INTERNET_DIR/fotos/".$id_foto;
								$archivo2="../fotos/".$id_foto;
								//print"INTERNET $archivo2 -> $archivo1 <br>";
								//$res=ftp_put($conn_id,"$archivo1","$archivo2",FTP_BINARY);
								print "<br>".$archivo1;
								//$chmod = ftp_site($conn_id,"CHMOD 0777 $archivo1");	
							}
						}
					}
				}	 
			}	
		//echo "http://www.inmoclick.com.ar/ftp_inmohost/act_online_"._USR_ID.".php?usr_id="._USR_ID."&usr_cim="._USR_CIM."&ip=$ip_server";
		print" 
			<script>
		 		window.location.href='http://www.inmoclick.com.ar/ftp_inmohost/act_online_"._USR_ID.".php?usr_id="._USR_ID."&usr_cim="._USR_CIM."&ip=$ip_server';
			</script>";
	}//fin if propiedades
	
?>
</body>
</html>
