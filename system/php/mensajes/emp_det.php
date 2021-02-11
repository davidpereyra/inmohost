<?php 
	extract($_GET);
	extract ($_POST);
	extract ($_REQUEST);

	//recibe $id //parametro $_REQUEST["id"];
	include ("../config.php");
	
	if($emp_id){
		$consulta="select
						  *
				  from
				  		cambios_emp
				  where 
				  		cambio_id=$cambio_id
				  		
				  ";
	}
	
	$res=mysql_query($consulta);
	
		
	$fila_v=mysql_fetch_array($res);
	
	$accion=$fila_v[cambio_det];
	
	if($accion=="modificacion"){
		
	 $consulta2="select 
							*
				   from 
					  	  empleados
				   	where 
				 		 emp_id=$emp_id
					  		
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
	        <div align="right"><strong>Nombre:</strong></div>    </td>
		    <td ><?
		    		echo $fila_n[nombre]." ".$fila_n[apellido];
		    		    		
		    		?></td>
	        <td><?
	        		echo $fila_v[nombre]." ".$fila_v[apellido];
	        		
	        		
	        		?></td>
		  </tr>
		 
		  <tr class="tableClara" >
		    <td align="center">
	        <div align="right"><strong>Domicilio:</strong></div>    </td>
		    <td ><?print $fila_n[domicilio]?></td>
	        <td><?print $fila_v[domicilio]?></td>
		  </tr>
		 <tr class="tableClara" >
		    <td align="center">
	        <div align="right"><strong>Mail:</strong></div>    </td>
		    <td ><?php echo $fila_n[email]?></td>
		    <td><?php echo $fila_v[email]?></td>
		  </tr>
		  
		  <tr class="tableClara" >
		    <td align="center">
	        <div align="right"><strong>Telefono:</strong></div>    </td>
		    <td ><?php echo $fila_n[telefono]?></td>
		    <td><?php echo $fila_v[telefono]?></td>
		  </tr>
		 
		  <tr class="tableClara" >
		    <td align="center">
	        <div align="right"><strong>Telefono Inmobiliaria:</strong></div>    </td>
		    <td ><?php echo $fila_n[tel_inmo]?></td>
		    <td><?php echo $fila_v[tel_inmo]?></td>
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
	        <div align="right"><strong>Nombre:</strong></div>    </td>
		    <td ><?
		    		echo $fila_n[nombre]." ".$fila_n[apellido];
		    		    		
		    		?></td>
	        <td><?
	        		
	        		
	        		
	        		?></td>
		  </tr>
		 
		  <tr class="tableClara" >
		    <td align="center">
	        <div align="right"><strong>Domicilio:</strong></div>    </td>
		    <td ><?print $fila_n[domicilio]?></td>
	        <td></td>
		  </tr>
		 <tr class="tableClara" >
		    <td align="center">
	        <div align="right"><strong>Mail:</strong></div>    </td>
		    <td ><?php echo $fila_n[email]?></td>
		    <td></td>
		  </tr>
		  
		  <tr class="tableClara" >
		    <td align="center">
	        <div align="right"><strong>Telefono:</strong></div>    </td>
		    <td ><?php echo $fila_n[telefono]?></td>
		    <td></td>
		  </tr>
		 
		  <tr class="tableClara" >
		    <td align="center">
	        <div align="right"><strong>Telefono Inmobiliaria:</strong></div>    </td>
		    <td ><?php echo $fila_n[tel_inmo]?></td>
		    <td></td>
		  </tr>
		  
		  
		  <tr class="tableClara" >
		    <td colspan="4" align="center"><input name="Submit" type="button" class="botonForm" value="Cerrar" onclick="hideToolTip()" /></td>
		  </tr>
		  
		  <tr class="tableClara" >
		    <td colspan="2" align="center"><input name="Submit" type="button" class="botonForm" value="Cerrar" onclick="hideToolTip()" /></td>
		  </tr>
		</table>
		</div>
	
		
		<?
	
	}
	
?>