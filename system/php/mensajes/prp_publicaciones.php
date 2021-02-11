<?php 
	extract($_GET);
	extract ($_POST);
	extract ($_REQUEST);

	//recibe $pub_id //parametro $_REQUEST["id"];
	include ("../config.php");
	
	$cadena="select 
					date_format(publicaciones.pub_env,'%d-%m-%Y %h:%i:%s') as pub_env,
					publicaciones.pub_dia
			from 
					publicaciones
			where
					pub_id=$pub_id";
	$res=mysql_query("$cadena");
	$fila=mysql_fetch_array($res);
	
	$fechas=split("x",$fila[pub_dia]);
	
	
		
	

?>
<div id="toolTipContenido" >
<table width="100%" height="100%" border="0" align="center" cellpadding="2" cellspacing="1" class="tableOscura">
  
  <tr class="tableClara" >
    <td height="25" colspan="2" align="center"><h1>Publicacion </h1></td>
  </tr>
  <tr class="tableClara" >
    <td width="30%" height="20" align="center"><div align="right">Dias que se publico:</div></td>
    <td width="70%" height="20" ><?
    for ($i=0;$i<count($fechas);$i++){
    
			echo $fechas[$i]."<br>";
    
    }
    ?></td>

  </tr>
  <tr class="tableClara" >
    <td height="20" align="center"><div align="right">Envío de las Publicaciones:</div></td>
    <td height="20"><?
    		echo $fila[pub_env];
    ?></td>
  </tr>
  
  <tr class="tableClara" >
    <td height="35" colspan="2" align="center" valign="middle"><input name="Submit" type="button" class="botonForm" value="Cerrar" onclick="hideToolTip()" tabindex="18" /></td></tr>
</table>
</div>