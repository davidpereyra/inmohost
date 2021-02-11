<?php 
	header("Content-type: application/xml");
	extract ($_GET);
	extract ($_REQUEST);
	include("../php/config.php");	
	echo "<?xml version=\"1.0\" encoding=\"iso-8859-1\" ?>";
	$xml=1;
	echo "<bar_priv> ";
		
	if($mod_tip=="edit")
	{
		$cadena="select 	
						bar_priv.*,
						pro_desc,
						loc_desc 
					from 
							bar_priv,
							provincias,
							localidades
					where 
							bar_id=$bar_id and
							bar_priv.pro_id=provincias.pro_id and
							bar_priv.loc_id=localidades.loc_id and
							provincias.pro_id=localidades.pro_id
									";
			$result=mysql_query($cadena);			
			
			while ($fila_bar=mysql_fetch_array($result)) {
				
				
					$pro_id=$fila_bar[pro_id];
					$loc_id=$fila_bar[loc_id];
				
				   echo "
					
		            <provincias>";
			 			$regs=" pro_id,pro_desc ";
						$tablas=" provincias ";
						$filtro=" pai_id=$PAIS_DEFAULT";
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
				";
				
				
					//datos para mostrar el detalle
					echo"<bar_comp_priv_desc>";
					
						if($fila_bar[bar_comp_priv]==0){
							echo "Barrio";
						}else{
							echo "Complejo";
						}
					echo"</bar_comp_priv_desc>";	 
						
					echo"
					
						<bar_comp_priv>
								<option value='0'>Barrio</option>
								<option value='1'>Complejo</option>
						
								<selected>".$fila_bar[bar_comp_priv]."</selected>
						
						</bar_comp_priv>
						<pro_desc>$fila_bar[pro_desc]</pro_desc>
						<loc_desc>$fila_bar[loc_desc]</loc_desc>
						<bar_zona>$fila_bar[bar_zona]</bar_zona>
						<bar_dir>$fila_bar[bar_dir]</bar_dir>
						<bar_denom>$fila_bar[bar_denom]</bar_denom>
						<bar_cont>$fila_bar[bar_cont]</bar_cont>
						<bar_tel>$fila_bar[bar_tel]</bar_tel>
						<bar_mail>$fila_bar[bar_mail]</bar_mail>
						<bar_sup_tot>$fila_bar[bar_sup_tot]</bar_sup_tot>
						<bar_sup_lot>$fila_bar[bar_sup_lot]</bar_sup_lot>
						<bar_cant_lot>$fila_bar[bar_cant_lot]</bar_cant_lot>
						<bar_desc>$fila_bar[bar_desc]</bar_desc>
						<bar_serv>$fila_bar[bar_serv]</bar_serv>
						<bar_url>$fila_bar[bar_url]</bar_url>
						<bar_logo>$fila_bar[bar_logo]</bar_logo>
						<imagenes>";
							$cad_fotos="select * from fotos_x_bar where bar_id=$bar_id and usr_id="._USR_ID;
							$res_fotos=mysql_query($cad_fotos);
							$i=0;
							while ($fil_fotos=mysql_fetch_array($res_fotos)) {
								echo "<foto>
											<fo_enl>$fil_fotos[fo_desc]</fo_enl>
										</foto>
								";
								$i++;
							}
							
							
					
							for ($j=$i; $j<10; $j++)
						        {
							        		print "
													<foto>
														<foto_enl></foto_enl>
														
													</foto>
												";
						    }
							
						echo"
						</imagenes>
						";
				
			}
		
	}else if ($mod_tip=="add"){
		
		echo "<bar_comp_priv>
								<option value='0'>Barrio</option>
								<option value='1'>Complejo</option>
						</bar_comp_priv>";
			
		echo	"<provincias>";
			 			$regs=" pro_id,pro_desc ";
						$tablas=" provincias ";
						$filtro=" pai_id=$PAIS_DEFAULT";
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
						$xtras=" order by loc_desc";
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
		     echo "<imagenes>";
	        for ($i=1; $i<11; $i++)
	        {
		        		print "
								<foto>
									<foto_enl></foto_enl>
									
								</foto>
							";
	        }
	        print "</imagenes>";
		           
		           

	}
	echo "</bar_priv>";
	
?>