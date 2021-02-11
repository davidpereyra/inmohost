<?php 
	extract($_GET);
	extract ($_POST);
	extract ($_REQUEST);

	//recibe $id //parametro $_REQUEST["id"];
	include ("../config.php");
	

	if($inmo_id==_USR_ID){
						
			$cadena="select propiedades.pre_inmo, propiedades.pre_trans from propiedades where propiedades.prp_id=$prp_id and propiedades.usr_id="._USR_ID;
			
			$result=mysql_query($cadena);
		
			if(mysql_num_rows($result)){
			
				$datos=mysql_fetch_array($result);
				$tasacion_pesos=$datos[pre_inmo];
				$tasacion_dolares=$datos[pre_trans];				
				$label1="Valor en $";
				$label2="Valor en U\$S";
				
				//print "NO".$datos[prop_nombre];
		}
			
	}		
	
?>
<div id="toolTipContenido" >
<table width="100%" height="100%" border="0" align="center" cellpadding="2" cellspacing="1" class="tableOscura">
  
  <tr class="tableClara" >
    <td height="25" colspan="2" align="center"><h1><strong>Valor de la Tasaci&oacute;n </strong></h1></td>
  </tr>
  <tr class="tableClara" >
    <td height="20" width="100px" align="center"><div align="right"><?echo $label1?>:</div></td>
    <td height="20" ><?print $tasacion_pesos?></td>
  </tr>
  <tr class="tableClara" >
    <td height="20" align="center"><div align="right"><?echo $label2?>:</div></td>
    <td height="20"><?print $tasacion_dolares?></td>
  </tr>
  <tr class="tableClara" >
    <td height="35" colspan="2" align="center" valign="middle"><input name="Submit" type="button" class="botonForm" value="Cerrar" onclick="hideToolTip()" tabindex="18" /></td></tr>
</table>
</div>