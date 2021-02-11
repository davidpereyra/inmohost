<?php 
	extract($_GET);
	extract ($_POST);
	extract ($_REQUEST);

	//recibe $id //parametro $_REQUEST["id"];
	include ("../config.php");
	

	if($inmo_id!=_USR_ID){
			$cadena="select usuarios.*,pro_desc,loc_desc from usuarios,provincias,localidades where usuarios.loc_id=localidades.loc_id and usuarios.pro_id=provincias.pro_id and provincias.pro_id=localidades.pro_id and usuarios.usr_id=".$inmo_id;
			$result=mysql_query($cadena);
		
		if(mysql_num_rows($result)){
			
				$datos=mysql_fetch_array($result);
				$nombre=$datos[titular];
				$apellido=$datos[usr_raz];
				$telefono=$datos[usr_tel];
				$domicilio=$datos[usr_dom]."[$datos[loc_desc]-$datos[pro_desc]]";
				$mail=$datos[usr_mail];
				$nota=$datos[web];
				
				$label1="Inmobiliaria";
				$label2="Titular";
				
		}	

	
	}else{
			$cadena="select propietarios.* from propietarios,propiedades where propietarios.prop_id=propiedades.prop_id and propiedades.prp_id=$prp_id and propiedades.usr_id="._USR_ID;
			
			$result=mysql_query($cadena);
		
			if(mysql_num_rows($result)){
			
				$datos=mysql_fetch_array($result);
				$nombre=$datos[prop_nombre];
				$apellido=$datos[prop_apellido];
				$telefono=$datos[prop_tel];
				$domicilio=$datos[prop_dom];
				$mail=$datos[prop_mail];
				$nota=$datos[prop_nota];
				
				
				$label1="Apellido";
				$label2="Nombre";
				//print "NO".$datos[prop_nombre];
		}
			
	}
	
	
	
	
	
?>
<div id="toolTipContenido" >
<table width="100%" height="100%" border="0" align="center" cellpadding="2" cellspacing="1" class="tableOscura">
  
  <tr class="tableClara" >
    <td height="25" colspan="2" align="center"><h1><strong>Datos del Propietario del inmueble n&deg;: <?php echo $prp_id; ?></strong></h1></td>
  </tr>
  <tr class="tableClara" >
    <td height="20" align="center"><div align="right"><?echo $label1?>:</div></td>
    <td height="20" ><?print $apellido?></td>
  </tr>
  <tr class="tableClara" >
    <td height="20" align="center"><div align="right"><?echo $label2?>:</div></td>
    <td height="20"><?print $nombre?></td>
  </tr>
  <tr class="tableClara" >
    <td height="20" align="center"><div align="right">Tel&eacute;fono:</div></td>
    <td height="20"><?print $telefono?></td>
  </tr>
  <tr class="tableClara" >
    <td height="20" align="center"><div align="right">Domicilio:</div></td>
    <td height="20"><?print $domicilio?></td>
  </tr>
  <tr class="tableClara" >
    <td width="30%" height="20" align="center"><div align="right">E-mail:</div></td>
    <td width="70%" height="20"><?print $mail?></td>
  </tr>
    
  <tr class="tableClara" valign="top" >
    <td height="100%" align="center"><div align="right">Nota:</div></td>
    <td height="100%" ><?print $nota?></td>
  </tr>
  <tr class="tableClara" >
    <td height="35" colspan="2" align="center" valign="middle"><input name="Submit" type="button" class="botonForm" value="Cerrar" onclick="hideToolTip()" tabindex="18" /></td></tr>
</table>
</div>