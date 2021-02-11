<?php 
	header("Content-type: application/xml");
	extract($_GET);
	extract ($_POST);
	extract ($_REQUEST);

	include("../php/config.php");	
	echo "<?xml version=\"1.0\" encoding=\"iso-8859-1\" ?>";
	$xml=1;
	echo "<informes> ";
		
	if($tipo_inf=="propiedades")
	{
		
				   echo "
								
				<tipoCons>";
				
						$regs=" tip_id,tip_desc ";
						$tablas=" tipo_const ";
					include("../"._FILE_SCRIPT_PHP_SELECT);
						$regs="";
		                $tablas="";
		                $id="";
		                echo "<selected>$tip_id</selected>";
		
		           echo"
				</tipoCons>
				<tipoCond>";
				
						$regs=" con_id,con_desc ";
						$tablas=" condiciones ";
						//$id=$con_id;
					include("../"._FILE_SCRIPT_PHP_SELECT);
						$regs="";
		                $tablas="";
		                //$id="";
		                echo "<selected>$con_id</selected>";
		
		           echo"
				</tipoCond>
				
				<referente>";
				
						$regs="emp_id,nombre,apellido";
						$tablas=" empleados ";
						//$id=$con_id;
					include("../"._FILE_SCRIPT_PHP_SELECT);
						$regs="";
		                $tablas="";
		                //$id="";
		           echo"
				</referente>
				
				<prp_mostrar>
					<option value='0'>Indistinto</option>
					<option value='1'>Mostrar</option>
					<option value='2'>Vendida/Alquilada</option>
					<option value='3'>Suspendia</option>
				
				</prp_mostrar>
								
				";

		         echo"<fechas> 
		         				<dias>";
		         				for ($i=1;$i<=31;$i++){
		         					
		         					if($i<10){
		         						
		         						$d="0$i";
		         					}else{
		         						$d=$i;
		         						
		         					}
		         					
		         					echo "<option value='$i'>$d</option>";
		         					
		         				}
		         			
		         				echo"
		         				 </dias> 
		         				 <meses>";
		         				for ($i=1;$i<=12;$i++){
		         					
		         					if($i<10){
		         						
		         						$m="0$i";
		         					}else{
		         						$m=$i;
		         						
		         					}
		         					
		         					echo "<option value='$i'>$m</option>";
		         					
		         				}
		         			
		         				echo"
		         				 </meses> 
		         				 <anios>";
		         				
		         				
		         				for ($i=2002;$i<=date("Y",mktime(0,0,0,0,0,date("Y")+4));$i++){
		         					
		         					echo "<option value='$i'>$i</option>";
		         					
		         				}
		         			
		         				echo"
		         				 </anios> 
		         				 
		         	  </fechas>";  			
				
		}else if($tipo_inf=="propietarios"){
			
			  echo "
								
				<tipoCons>";
				
						$regs=" tip_id,tip_desc ";
						$tablas=" tipo_const ";
					include("../"._FILE_SCRIPT_PHP_SELECT);
						$regs="";
		                $tablas="";
		                $id="";
		                echo "<selected>$tip_id</selected>";
		
		           echo"
				</tipoCons>
				<tipoCond>";
				
						$regs=" con_id,con_desc ";
						$tablas=" condiciones ";
						//$id=$con_id;
					include("../"._FILE_SCRIPT_PHP_SELECT);
						$regs="";
		                $tablas="";
		                //$id="";
		                echo "<selected>$con_id</selected>";
		
		           echo"
				</tipoCond>
					
	            <provincias>";
		 			$regs=" pro_id,pro_desc ";
					$tablas=" provincias ";
					$filtro=" pai_id=$PAIS_DEFAULT";
					if(!$pro_id)
						$pro_id=$PROV_DEFAULT;
					
						
				include("../"._FILE_SCRIPT_PHP_SELECT);
					$regs="";
	                $tablas="";
	                $id="";
	                echo "<selected>$pro_id</selected>";
					
				echo "
				</provincias>
				<localidades>";
				
						$regs=" distinct loc_id,loc_desc ";
						$tablas=" localidades,provincias ";
						$filtro=" localidades.pro_id=$pro_id ";
						$xtras=" order by loc_desc ASC";
					include("../"._FILE_SCRIPT_PHP_SELECT);
						$regs="";
		                $tablas="";
		                $id="";
		                $filtro="";
		                $xtras="";
		                echo "<selected>$loc_id</selected>";
		
		           echo"
				</localidades>
				";
			
		}else if ($tipo_inf=="citas") {
			
			echo"<referente>";
				
						$regs="emp_id,nombre,apellido";
						$tablas=" empleados ";
						//$id=$con_id;
					include("../"._FILE_SCRIPT_PHP_SELECT);
						$regs="";
		                $tablas="";
		                //$id="";
		           echo"
				</referente>
			";
		}else if($tipo_inf=="tasaciones"){
			
			echo "
								
				<tipoCons>";
				
						$regs=" tip_id,tip_desc ";
						$tablas=" tipo_const ";
					include("../"._FILE_SCRIPT_PHP_SELECT);
						$regs="";
		                $tablas="";
		                $id="";
		                echo "<selected>$tip_id</selected>";
		
		           echo"
				</tipoCons>
				<tipoCond>";
				
						$regs=" con_id,con_desc ";
						$tablas=" condiciones ";
						//$id=$con_id;
					include("../"._FILE_SCRIPT_PHP_SELECT);
						$regs="";
		                $tablas="";
		                //$id="";
		                echo "<selected>$con_id</selected>";
		
		           echo"
				</tipoCond>";
									
		}else if ($tipo_inf=="demandas"){
			  print"
				
				<provincias>";
		 			$regs=" pro_id,pro_desc ";
					$tablas=" provincias ";
					if(!$pro_id)
						$pro_id=$PROV_DEFAULT;
					
					$xtras=" order by pro_desc ASC";	
				include("../"._FILE_SCRIPT_PHP_SELECT);
					$regs="";
	                $tablas="";
	                $id="";
	                $xtras="";
	                echo "<selected>$pro_id</selected>";
				
				echo "
				</provincias>
				<localidades>";
				
						$regs=" distinct loc_id,loc_desc ";
						$tablas=" localidades,provincias ";
						$filtro=" localidades.pro_id=$pro_id ";
						$xtras=" order by loc_desc ASC";							
					include("../"._FILE_SCRIPT_PHP_SELECT);
						$regs="";
		                $tablas="";
		                $id="";
		                $filtro="";
						$xtras="";			                
		                echo "<selected>$loc_id</selected>";
		
		           echo"
				</localidades>
				<tipoCons>";
			
					$regs=" tip_id,tip_desc ";
					$tablas=" tipo_const ";
					$xtras=" order by tip_desc ASC";	
					include("../"._FILE_SCRIPT_PHP_SELECT);
					$regs="";
	                $tablas="";
	                $id="";
	                $xtras="";	
	                echo "<selected>$tip_id</selected>";
	
	        	echo"
				</tipoCons>
				<tipoCond>";
			
					$regs=" con_id,con_desc ";
					$tablas=" condiciones ";
					//$id=$con_id;
					$xtras=" order by con_desc ASC";	
				include("../"._FILE_SCRIPT_PHP_SELECT);
					$regs="";
	                $tablas="";
	                $xtras="";
	                //$id="";
	                echo "<selected>$con_id</selected>";
	
	           echo"
			</tipoCond>
			";
		
		}
		else if($tipo_inf=="medios")
		{
			echo"<receptor>";
			
					$regs=" rec_id,med_raz ";
					$tablas=" receptores ";
					//$id=$con_id;
					$xtras=" order by med_raz ASC";	
				include("../"._FILE_SCRIPT_PHP_SELECT);
					$regs="";
	                $tablas="";
	                $xtras="";
	                //$id="";
	                echo "<selected>$med_id</selected>";
	
	           echo"
			</receptor>
			";
	
		}
				
	echo "</informes>";