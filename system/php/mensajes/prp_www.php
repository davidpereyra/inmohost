<?php 
	extract($_GET);
	extract ($_POST);
	extract ($_REQUEST);

	//recibe $id //parametro $_REQUEST["id"];
	include ("../config.php");
	
	if($id){
		$consulta="select
						  cambios.*,
						  provincias.pro_desc,
						  localidades.loc_desc,
						  condiciones.con_desc,
						  tipo_const.tip_desc 
				  from  
				  		cambios,
				  		provincias,
				  		localidades,
				  		condiciones,
				  		tipo_const 
				  where 
				  		cambio_id=$cambio_id and
				  		cambios.pro_id=provincias.pro_id and
				  		cambios.loc_id=localidades.loc_id and
				  		cambios.con_id=condiciones.con_id and
				  		cambios.tip_id=tipo_const.tip_id
				  		
				  ";
	}
	
	$res=mysql_query($consulta);
	
		
	$fila_v=mysql_fetch_array($res);
	
	$accion=$fila_v[cambio_det];
	
	if($accion=="modificacion"){
		
	$consulta2="select 
							propiedades.*,
							provincias.pro_desc,
						    localidades.loc_desc,
						    condiciones.con_desc,
						    tipo_const.tip_desc  
				   from 
				   			propiedades,
				   			provincias,
					  		localidades,
					  		condiciones,
					  		tipo_const 
				   	where 
				   			prp_id=$id and 
				   			usr_id="._USR_ID." and
				   			propiedades.pro_id=provincias.pro_id and
					  		propiedades.loc_id=localidades.loc_id and
					  		propiedades.con_id=condiciones.con_id and
					  		propiedades.tip_id=tipo_const.tip_id
				   			";
		$res2=mysql_query($consulta2);
		
		if(mysql_num_rows($res2)){
			$fila_n=mysql_fetch_array($res2);
			
		}				
		

	?>
			
		<div id="toolTipContenido" >
		<table width="100%" height="100%" border="0" align="center" cellpadding="2" cellspacing="1" class="tableOscura">
		  <tr class="tableClara">
		    <td align="center" colspan="4">
	        <h1>Detalles ID: <?php echo $id; ?> </h1>    </td>
		  </tr>
		  <tr class="tableClara">
		    <td width="20%" align="center">&nbsp;</td>
		    <td width="40%" align="center"><h1>Modificada</h1></td>
	        <td width="40%" align="center"><h1>Antes de Modificar</h1></td>
		  </tr>
		  
		  <tr class="tableClara" >
		    <td align="center">
	        <div align="right"><strong>Domicilio:</strong></div>    </td>
		    <td ><?print $fila_n[prp_dom]?></td>
	        <td><?print $fila_v[prp_dom]?></td>
		  </tr>
		  <tr class="tableClara" >
		    <td align="center">
	        <div align="right"><strong>Barrio:</strong></div>    </td>
		    <td ><?php echo $fila_n[prp_bar]?></td>
		    <td><?php echo $fila_v[prp_bar]?></td>
		  </tr>
		  <tr class="tableClara" >
		    <td align="center">
	        <div align="right"><strong>Provincia: </strong></div>    </td>
		    <td ><?php echo $fila_n[pro_desc]?></td>
		    <td><?php echo $fila_v[pro_desc]?></td>
		  </tr>
		  <tr class="tableClara" >
		    <td align="center">
	        <div align="right"><strong>Localidad:</strong></div>    </td>
		    <td ><?php echo $fila_n[loc_desc]?></td>
		    <td><?php echo $fila_v[loc_desc]?></td>
		  </tr>
		  <tr class="tableClara" >
		    <td align="center">
	        <div align="right"><strong>Orientacion:</strong></div>    </td>
		    <td ><?
		    	 	if($fila_n[ori_id]){
		    		$cons_ori="select ori_desc from orientacion where ori_id=$fila_n[ori_id]";
		    		$res_ori=mysql_query($cons_ori);
		    		
		    			echo mysql_result($res_ori,0,0);
		    	 	}else{
		    	 		echo "indistinto";
		    	 	}
		    		?>		    </td>
		    <td ><?
		    		if($fila_v[ori_id]){
		    		$cons_ori="select ori_desc from orientacion where ori_id=$fila_v[ori_id]";
		    		$res_ori=mysql_query($cons_ori);
		    		
		    			echo mysql_result($res_ori,0,0);
		    	 	}else{
		    	 		echo "indistinto";
		    	 	}
		    		?>		    </td>
		  </tr>
		  <tr class="tableClara" >
		    <td align="center">
	        <div align="right"><strong>Precio:</strong></div>    </td>
		    <td ><?php echo $fila_n[prp_pre]?></td>
		    <td><?php echo $fila_v[prp_pre]?></td>
		  </tr>
		  <tr class="tableClara" >
		    <td align="center">
	        <div align="right"><strong>Precio u$s:</strong></div>    </td>
		    <td ><?php echo $fila_n[prp_pre_dol]?></td>
	        <td ><?php echo $fila_v[prp_pre_dol]?></td>
		  </tr>
		  <tr class="tableClara" >
		    <td align="center">
	        <div align="right"><strong>Descripci&oacute;n:</strong></div>    </td>
		    <td ><?php echo $fila_n[prp_desc]?></td>
		    
		    <td><?php echo $fila_v[prp_desc]?></td>
		  </tr>
		  <tr class="tableClara" >
		    <td align="center">
	        <div align="right"><strong>Nota:</strong></div>    </td>
		    <td ><?php echo $fila_n[prp_nota]?></td>
		    <td><?php echo $fila_v[prp_nota]?></td>
		  </tr>
		  
		  <tr class="tableClara" >
		    <td colspan="4" align="center"><input name="Submit" type="button" class="botonForm" value="Cerrar" onclick="hideToolTip()" /></td>
		  </tr>
		</table>
		</div>
	
	
	
	<?
	}else{

		?>
			<div id="toolTipContenido" >
		<table width="100%" height="100%" border="0" align="center" cellpadding="0" cellspacing="1" class="tableOscura">
		  <tr class="tableClara">
		    <td align="center" colspan="2">
	        <h1>Detalles ID: <?php echo $id; ?></h1>    </td>
		  </tr>
		 
		  <tr class="tableClara" >
		    <td width="30%" align="center">
		      <div align="right">Domicilio:</div>    </td>
		    <td width="70%"><?print $fila_v[prp_dom]?></td>
		  </tr>
		  <tr class="tableClara" >
		    <td align="center">
		      <div align="right">Barrio:</div>    </td>
		    <td><?php echo $fila_v[prp_bar]?></td>
		  </tr>
		  <tr class="tableClara" >
		    <td align="center">
		      <div align="right">Provincia: </div>    </td>
		    <td><?php echo $fila_v[pro_desc]?></td>
		  </tr>
		  <tr class="tableClara" >
		    <td align="center">
		      <div align="right">Localidad:</div>    </td>
		    <td><?php echo $fila_v[loc_desc]?></td>
		  </tr>
		  <tr class="tableClara" >
		    <td align="center">
		      <div align="right">Orientacion:</div>    </td>
		    <td ><?
		    	 	if($fila_v[ori_id]){
		    		$cons_ori="select ori_desc from orientacion where ori_id=$fila_v[ori_id]";
		    		$res_ori=mysql_query($cons_ori);
		    		
		    			echo mysql_result($res_ori,0,0);
		    	 	}else{
		    	 		echo "indistinto";
		    	 	}
		    		?>		    </td>
		  </tr>
		  <tr class="tableClara" >
		    <td align="center">
		      <div align="right">Precio:</div>    </td>
		    <td><?php echo $fila_v[prp_pre]?></td>
		  </tr>
		  <tr class="tableClara" >
		    <td align="center">
		      <div align="right">Precio u$s:</div>    </td>
		    <td ><?php echo $fila_v[prp_pre_dol]?></td>
		  </tr>
		  <tr class="tableClara" >
		    <td align="center">
		      <div align="right">Descripci&oacute;n:</div>    </td>
		    <td><?php echo $fila_v[prp_desc]?></td>
		  </tr>
		  <tr class="tableClara" >
		    <td align="center">
		      <div align="right">Nota:</div>    </td>
		    <td><?php echo $fila_v[prp_nota]?></td>
		  </tr>
		  
		  <tr class="tableClara" >
		    <td colspan="2" align="center"><input name="Submit" type="button" class="botonForm" value="Cerrar" onclick="hideToolTip()" /></td>
		  </tr>
		</table>
		</div>
	
		
		<?
	
	}
	
	
	
?>


