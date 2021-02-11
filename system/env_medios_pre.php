<?php
	extract($_GET);
	extract ($_POST);
	extract ($_REQUEST);
	
include ("php/config.php");
include ("php/sec_head.php");

$otraCSS = "styleInterno.css";
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>::::::::::::</title>
<?php
	include("head.php");
		
?>
</head>
<body>

<div id="nulo" >
<div align="center"><br/>
<?php
$ind_error=0;
$ind_exito=0;
$errors=array();
$msg_exitos=array();





mysql_query("start transaction");


if($count_pub){
		
	for($i=1;$i<=$count_pub;$i++){
	
		$check="check_".$i;
		$prp_id="prp_id_".$i;
		$prp_fecha="fecha_".$i;
		$prp_pub="prp_pub_".$i;
		$dia_id="dia_id_".$i;
		
	
		if($$check==1&&$$prp_fecha){
			
			echo "Chequeando mensajes para enviar..<br>";
			$diarios="select * from receptores where rec_id=".$$dia_id."";
			$res_dia=mysql_query($diarios) or die("adfdafdsa");
			$fila_diarios=mysql_fetch_array($res_dia);			
			$subject="Publicacion en la grafica";
		
		
			
					$to=$fila_diarios[mail];
					
					if($fila_diarios[mailcc]){
						$cc=$fila_diarios[mailcc];
					}
					
					
					$msg.="Estimados $fila_diarios[med_raz]:\r\n\r\nPróximos avisos:\r\n\r\n";
			
					
					$i=1;
					
						
						//Completo el mail
						$fechas=split("x",$$prp_fecha);
						
						$msg.="\r\nAviso: $prp_pub ";
						
						for($i=0;$i<count($fechas);$i++){
							
							$msg.=$fechas[$i]." - ";
						}
						
						$i++;
						
						$msg.=" ##\r\n";
							
				
					
					$msg.="\n\rAtte. "._USR_RAZ."\r\n";	
					$msg.=_USR_DOM."\r\n";	
					$msg.=_USR_TEL."\r\n";
					$from=_USR_MAIL;
					
						//die(mandar_mail($from,_USR_RAZ,$to,$cc,$subject,$msg));
					if(($dev=mandar_mail($from,_USR_RAZ,$to,$cc,$subject,$msg,$MAIL_SMTP,$MAIL_USR,$MAIL_PASS))!=1){
						$error=1;
						die($dev);
						//die("$from,_USR_RAZ,$to,$cc,$subject,$msg");
					}
			}else{
			
				$errors="No se cargaron las fechas de publicacion";
			
			
			}
			
			//print $$prp_id."-".$$prp_fecha."-".$$prp_pub."<br>";
			$pub_id=max_id("publicaciones","pub_id");
			$cadena="insert into publicaciones values($pub_id,'','',0,".$$dia_id.",".$$prp_id.",'".$$prp_fecha."',now())";			
			mysql_query($cadena) or $errors="No inserta en publicaciones";
			
			if($error){
				$cam_id=max_id("cambios_medios","cam_id");
				$cadena="insert into cambios_medios values ($cam_id,$pub_id)";
				mysql_query($cadena) or $errors="No inserta en cambios_medios";
			}
			
			
		
	}
}	

if (!$errors)	
{
	mysql_query("rollback");
	if($error){
		echo "Las publicaciones han sido guardades en el servidor, en bandeja de salida.
		 Se enviarán la proxima vez que inicie el sistema y bien puede enviarlas desde 
		 el menu de medios publicitarios cuando lo desee. 
		 Recuerde conectarse a Internet antes.";
	}else{
		echo "Las publicaciones fueron enviadas a las receptorías correspondientes.";
	}
}
else 
{
	mysql_query("rollback");
	echo $errors;
}

?>
</div>
</div>


</body>
</html>