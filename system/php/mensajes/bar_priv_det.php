<?php 
	extract($_GET);
	extract ($_POST);
	extract ($_REQUEST);

	//recibe $id //parametro $_REQUEST["id"];
	include ("../config.php");
	
	if($bar_id){
		$consulta="select
						  cambios_bar_priv.*,
						  provincias.pro_desc,
						  localidades.loc_desc
						  
				  from  
				  		cambios_bar_priv,
				  		provincias,
				  		localidades
				  where 
				  		cambio_id=$cambio_id and
				  		cambios_bar_priv.pro_id=provincias.pro_id and
				  		cambios_bar_priv.loc_id=localidades.loc_id 
				  		
				  ";
	}
	
	$res=mysql_query($consulta);
	
		
	$fila_v=mysql_fetch_array($res);
	
	$accion=$fila_v[cambio_det];
	
	if($accion=="modificacion"){
		
	 $consulta2="select 
							bar_priv.*,
							provincias.pro_desc,
						    localidades.loc_desc
				   from 
				   			bar_priv,
				   			provincias,
					  		localidades
				   	where 
				   			bar_id=$bar_id and 
				   			bar_priv.pro_id=provincias.pro_id and
					  		bar_priv.loc_id=localidades.loc_id
					  		
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
	        <h1>Detalles ID:  </h1>    </td>
		  </tr>
		  <tr class="tableClara">
		    <td width="20%" align="center">&nbsp;</td>
		    <td width="40%" align="center"><h1>Modificado</h1></td>
	        <td width="40%" align="center"><h1>Antes de Modificar</h1></td>
		  </tr>
		  <tr class="tableClara" >
		    <td align="center">
	        <div align="right"><strong>Tipo de Barrio:</strong></div>    </td>
		    <td ><?
		    		if($fila_n[bar_comp_priv]==0){
		    			echo "Barrio";	
		    		}else{
		    			echo "Complejo";
		    		}
		    		    		
		    		?></td>
	        <td><?if($fila_v[bar_comp_priv]==0){
		    			echo "Barrio";	
		    		}else{
		    			echo "Complejo";
		    		}?></td>
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
	        <div align="right"><strong>Zona:</strong></div>    </td>
		    <td ><?php echo $fila_n[bar_zona]?></td>
		    <td><?php echo $fila_v[bar_zona]?></td>
		  </tr>
		  
		  <tr class="tableClara" >
		    <td align="center">
	        <div align="right"><strong>Domicilio:</strong></div>    </td>
		    <td ><?print $fila_n[bar_dir]?></td>
	        <td><?print $fila_v[bar_dir]?></td>
		  </tr>
		
		  <tr class="tableClara" >
		    <td align="center">
	        <div align="right"><strong>Denominacion:</strong></div>    </td>
		    <td ><?php echo $fila_n[bar_denom]?></td>
		    <td><?php echo $fila_v[bar_denom]?></td>
		  </tr>
		  <tr class="tableClara">
		    <td align="center">
	        <div align="right"><strong>Contacto:</strong></div>    </td>
		    <td ><?php echo $fila_n[bar_cont]?></td>
	        <td ><?php echo $fila_v[bar_cont]?></td>
		  </tr>
		  <tr class="tableClara" >
		    <td align="center">
	        <div align="right"><strong>Telefono:</strong></div>    </td>
		    <td ><?php echo $fila_n[bar_tel]?></td>
		    <td><?php echo $fila_v[bar_tel]?></td>
		  </tr>
		  <tr class="tableClara" >
		    <td align="center">
	        <div align="right"><strong>Mail:</strong></div>    </td>
		    <td ><?php echo $fila_n[bar_mail]?></td>
		    <td><?php echo $fila_v[bar_mail]?></td>
		  </tr>
		  <tr class="tableClara" >
		    <td align="center">
	        <div align="right"><strong>Superficie Total:</strong></div>    </td>
		    <td ><?php echo $fila_n[bar_sup_tot]?></td>
		    <td><?php echo $fila_v[bar_sup_tot]?></td>
		  </tr>
		    <tr class="tableClara" >
		    <td align="center">
	        <div align="right"><strong>Superficie Lote:</strong></div>    </td>
		    <td ><?php echo $fila_n[bar_sup_lot]?></td>
		    <td><?php echo $fila_v[bar_sup_lot]?></td>
		  </tr>
		  <tr class="tableClara" >
		    <td align="center">
	        <div align="right"><strong>Cantidad de lotes:</strong></div>    </td>
		    <td ><?php echo $fila_n[bar_cant_tot]?></td>
		    <td><?php echo $fila_v[bar_cant_tot]?></td>
		  </tr>
		  <tr class="tableClara" >
		    <td align="center">
	        <div align="right"><strong>Descripci&oacute;n:</strong></div>    </td>
		    <td ><?php echo $fila_n[bar_desc]?></td>
		    
		    <td><?php echo $fila_v[bar_desc]?></td>
		  </tr>
		  <tr class="tableClara" >
		    <td align="center">
	        <div align="right"><strong>Servicios:</strong></div>    </td>
		    <td ><?php echo $fila_n[bar_serv]?></td>
		    <td><?php echo $fila_v[bar_serv]?></td>
		  </tr>
		  <tr class="tableClara" >
		    <td align="center">
	        <div align="right"><strong>Web(URL):</strong></div>    </td>
		    <td ><?php echo $fila_n[bar_url]?></td>
		    <td><?php echo $fila_v[bar_url]?></td>
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
		    <td align="center">
	        <h1>Detalles</h1>    </td>
	           </td>
		  </tr>
		 
		  <tr class="tableClara" >
		    <td align="center">
	        <div align="right"><strong>Tipo de Barrio:</strong></div>    </td>
		 
	        <td><?if($fila_v[bar_comp_priv]==0){
		    			echo "Barrio";	
		    		}else{
		    			echo "Complejo";
		    		}?></td>
		  </tr>
		   <tr class="tableClara" >
		    <td align="center">
	        <div align="right"><strong>Provincia: </strong></div>    </td>
		  
		    <td><?php echo $fila_v[pro_desc]?></td>
		  </tr>
		  <tr class="tableClara" >
		    <td align="center">
	        <div align="right"><strong>Localidad:</strong></div>    </td>
		  
		    <td><?php echo $fila_v[loc_desc]?></td>
		  </tr>
		    <tr class="tableClara" >
		    <td align="center">
	        <div align="right"><strong>Zona:</strong></div>    </td>
		   
		    <td><?php echo $fila_v[bar_zona]?></td>
		  </tr>
		  
		  <tr class="tableClara" >
		    <td align="center">
	        <div align="right"><strong>Domicilio:</strong></div>    </td>
		  
	        <td><?print $fila_v[bar_dir]?></td>
		  </tr>
		
		  <tr class="tableClara" >
		    <td align="center">
	        <div align="right"><strong>Denominacion:</strong></div>    </td>
		   
		    <td><?php echo $fila_v[bar_denom]?></td>
		  </tr>
		  <tr class="tableClara">
		    <td align="center">
	        <div align="right"><strong>Contacto:</strong></div>    </td>
		   
	        <td ><?php echo $fila_v[bar_cont]?></td>
		  </tr>
		  <tr class="tableClara" >
		    <td align="center">
	        <div align="right"><strong>Telefono:</strong></div>    </td>
		 
		    <td><?php echo $fila_v[bar_tel]?></td>
		  </tr>
		  <tr class="tableClara" >
		    <td align="center">
	        <div align="right"><strong>Mail:</strong></div>    </td>
		
		    <td><?php echo $fila_v[bar_mail]?></td>
		  </tr>
		  <tr class="tableClara" >
		    <td align="center">
	        <div align="right"><strong>Superficie Total:</strong></div>    </td>
		    
		    <td><?php echo $fila_v[bar_sup_tot]?></td>
		  </tr>
		    <tr class="tableClara" >
		    <td align="center">
	        <div align="right"><strong>Superficie Lote:</strong></div>    </td>
		   
		    <td><?php echo $fila_v[bar_sup_lot]?></td>
		  </tr>
		  <tr class="tableClara" >
		    <td align="center">
	        <div align="right"><strong>Cantidad de lotes:</strong></div>    </td>
		   
		    <td><?php echo $fila_v[bar_cant_tot]?></td>
		  </tr>
		  <tr class="tableClara" >
		    <td align="center">
	        <div align="right"><strong>Descripci&oacute;n:</strong></div>    </td>
		  
		    
		    <td><?php echo $fila_v[bar_desc]?></td>
		  </tr>
		  <tr class="tableClara" >
		    <td align="center">
	        <div align="right"><strong>Servicios:</strong></div>    </td>
		   
		    <td><?php echo $fila_v[bar_serv]?></td>
		  </tr>
		  <tr class="tableClara" >
		    <td align="center">
	        <div align="right"><strong>Web(URL):</strong></div>    </td>
		
		    <td><?php echo $fila_v[bar_url]?></td>
		  </tr>
		  
		  <tr class="tableClara" >
		    <td colspan="2" align="center"><input name="Submit" type="button" class="botonForm" value="Cerrar" onclick="hideToolTip()" /></td>
		  </tr>
		</table>
		</div>
	
		
		<?
	
	}
	
?>