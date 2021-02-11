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

<div align="center"><br/>
<form action="<?echo _FILE_PHP_MENSAJES?>" method="POST" name='formEnvMedios'>
<table class="tableOscura" width="100%" cellpadding="1" cellspacing="1">
<tr class="tableClara">
<td align="center" colspan="2" width="30%"><b>Datos del Mail</b></td>
<td align="center" width="60%"><b>Mensaje</b></td>
<td align="center" width="10%"><b>Fotos</b></td>
<input type='hidden' name='nomVentana' value='propiedadMedios'>
<input type='hidden' name='mod_tip' value='add'>
<input type='hidden' name='fileABM' value='<?echo _FILE_PHP_ABM_ENV_MEDIOS?>'>


</tr>

<?php



$ind_error=0;
$ind_exito=0;
$errors=array();
$msg_exitos=array();
mysql_query("start transaction");


if($count_pub){

	$diarios="select * from receptores";
	$res_dia=mysql_query($diarios);
	//recorro todos los medios para armar un mail por cada medio.
	$j=0;
	$l=1;
	while ($fila_diarios=mysql_fetch_array($res_dia)){
		
		$to[$j]=$fila_diarios[mail];
		$rec_id[$j]=$fila_diarios[rec_id];
				
		if($fila_diarios[mailcc]){
			$cc[$j]=$fila_diarios[mailcc];
		}
		
		$subject[$j]="Publicacion en la grafica";
			
		$cab[$j]="Estimados $fila_diarios[med_raz]:\r\n\r\nPróximos avisos:\r\n\r\n";
		$msg[$j]="";
		$med_raz[$j]=$fila_diarios[med_raz];
		
		$firma[$j]="\n\rAtte. "._USR_RAZ."\r\n";	
		$firma[$j].=_USR_DOM."\r\n";	
		$firma[$j].=_USR_TEL."\r\n";
				
		
		for($i=1;$i<=$count_pub;$i++){
		
			$check="check_".$i;
			$prp_id="prp_id_".$i;
			$prp_fecha="fecha_".$i."_".$l;
			$prp_pub="prp_pub_".$i;
			$dia_id="dia_id_".$i."_".$l;
			
			//print "diario".$$dia_id."<br>";
		//	print "dia_id_".$i."_".$k."==".$$dia_id."==$fila_diarios[rec_id]<br>";
		//	print "dia_id_".$i."_".$k."<br>";
			if($$prp_fecha){
				//Completo el mail
				$fechas=split("x",$$prp_fecha);
				
				$p_id[$j].=$$prp_id."#";
				$p_fec[$j].=$$prp_fecha."#";
			
				$msg[$j].="\r\nAviso $i:"." ID_".$$prp_id."-"._USR_ID." ## ".$$prp_pub;		
				
				for($k=0;$k<count($fechas);$k++){
					$msg[$j].=$fechas[$k]." - ";
				}		
			}
		}
		
		if($msg[$j]){
			$msg[$j]=$cab[$j].$msg[$j].$firma[$j];
		}else{
			$msg[$j]="";
		
		}
		
		
		$j++;
		$l++; //sub indice de la variable dia_id
	}
	

	if(count($msg)){	
	
		for ($i=0;$i<count($msg);$i++){
			//si hay mensajes
			if($msg[$i]){
				$hay_msg=1;
				$props=split("#",$p_id[$i]);
				$fecs=split("#",$p_fec[$i]);
					$k=0;
				for($j=0;$j<count($props);$j++){
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
						sort($fe);	
						//ahora las vuelvo a pasar a formato fecha
						for ($n=0;$n<count($_fechas);$n++){
							$fe[$n]=date("Y-m-d",$fe[$n]);
						}				
					
						$pub_id=max_id("publicaciones","pub_id");
						$cadena="insert into publicaciones values($pub_id,'$fe[0]','".$fe[count($fe)-1]."',0,".$rec_id[$i].",".$props[$j].",'".$fecs[$j]."',now())";			
						$pubs[$k]=$pub_id;	
					
						//mysql_query($cadena) or $errors="No inserta en publicaciones".mysql_error();
						$k++;
					}
				}
				
				print"
				
					<tr class='tableClara'>
				     		<td colspan='2'><b>".strtoupper($med_raz[$i])."</b></td>
				     		<td rowspan='6'><textarea name='msg$i' cols='52' rows='7'>$msg[$i]</textarea></td>
				     		<td rowspan='6' align='center'><input type='checkbox' value='1' name='con_fotos$i'></td>
							<input type='hidden' name='prp_ids$i' value='$p_id[$i]'>
							<input type='hidden' name='prp_fecs$i' value='$p_fec[$i]'>
							<input type='hidden' name='rec_id$i' value='$rec_id[$i]'>
							
					  </tr>
					  <tr class='tableClara'> 
					  	  <td>De:</td><td> <input type='text' size='30' value='"._USR_MAIL."' name='de$i'></td>		
					  </tr>
					  <tr class='tableClara'>	  
							<td>Hacia:</td><td> <input type='text' size='30' value='$to[$i]' name='to$i'></td>
					  </tr>
					  <tr class='tableClara'>		
							<td>CC:</td><td> <input type='text' size='30' value='$cc[$i]' name='cc$i'></td>
					  </tr>		
					  <tr class='tableClara'>
							<td>Asunto:</td><td> <input type='text' size='30' value='$subject[$i]' name='subject$i'></td>
					  </tr>	
					  
					    <tr class='tableClara'>
							<td colspan='2'>&nbsp;</td>
					  </tr>	
							
						 ";
				
			
			/*	if($res!=1){
					for($j=0;$j<count($pubs);$j++){	
						$cam_id=max_id("cambios_medios","cam_id");
						$cadena="insert into cambios_medios values ($cam_id,$pubs[$j])";
						 
					//	mysql_query($cadena) or $errors="No inserta en cambios_medios";
						$error=1;
					}	
				}
			*/
			}
		}
		
		echo "<input type='hidden' name='cant' value='$i'>";
		if(!$hay_msg){
			$errors="No selecciono ninguna publicacion o bien ninguna fecha para publicar";
		}
		
		
	}else{
	
		$errors="No selecciono ninguna publicacion o bien ninguna fecha para publicar";
	
	}
}else{
	$errors="No selecciono ninguna publicacion o bien ninguna fecha para publicar";
}

if (!$errors)	
{
	mysql_query("commit");
	/*if($error){
		echo "
		 Las publicaciones han sido guardadas en el servidor, en bandeja de salida.<BR>
		 Se enviarán la proxima vez que inicie el sistema o bien pueda enviarlas desde 
		 el menú de medios publicitarios cuando lo desee.<br> 
		 Recuerde conectarse a Internet antes.";
	}else{
		echo "Las publicaciones fueron enviadas a las receptorías correspondientes.";
	}*/
}
else 
{
	mysql_query("rollback");
	echo $errors;
}

?>
<tr  id='div_comp' style="display:none" class="tableClara">
  	<td colspan="3">
			  <div align="center"><img src="../interfaz/inmohost/images/precarga.gif"/><br/>
	            <strong>Conectando con el servidor. Esta operacion puede durar varios minutos </strong></div></td>       
   </tr> 
</table>
<input type="button" name="volver" value="Volver"  class="botonForm" onclick="history.back();">
		<input type="button" name="cerrar" value="Enviar" class="botonForm" onclick="document.getElementById('div_comp').style.display='';document.formEnvMedios.submit()">
	</form>
</div>
</div>


</body>
</html>