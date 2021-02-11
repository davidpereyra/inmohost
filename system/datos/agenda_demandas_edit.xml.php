<?php 
	header("Content-type: application/xml");
	extract($_GET);
	extract ($_POST);
	extract ($_REQUEST);

	include("../php/config.php");	
	echo "<?xml version=\"1.0\" encoding=\"iso-8859-1\" ?>";
	$xml=1;
	if($dem_id){
	
		$cadena="select * from demandas where dem_id=$dem_id";
		$result=mysql_query($cadena);
		
		$fil=mysql_fetch_array($result);
	
	echo "
    <XMLTEXTO>
			<datos> 
			<paises>";
	 			$regs=" pai_id,pai_desc ";
				$tablas=" pais ";
				if(!$pai_id)
					$pai_id=$PAIS_DEFAULT;
				$xtras=" order by pai_desc_id ASC";	
			include("../"._FILE_SCRIPT_PHP_SELECT);
				$regs="";
                $tablas="";
                $id="";
                $xtras="";
                echo "<selected>$pai_id</selected>";
            echo "
            </paises>
			<provincias>";
		 			$regs=" pro_id,pro_desc ";
					$tablas=" provincias ";
					if(!$pro_id)
						$pro_id=$PROV_DEFAULT;
					$filtro=" pai_id=$pai_id";
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
						//RECUPERO LOCALIDADES
					
					$locs=split("x",$fil[loc_id]); //separo las localidades
						
					$regs=" distinct loc_id,loc_desc ";
					$tablas=" localidades,provincias ";
					$filtro=" localidades.pro_id=$pro_id ";
					$xtras=" order by loc_desc ASC";
				include("../"._FILE_SCRIPT_PHP_SELECT);
					$regs="";
	                $tablas="";
	              	$xtras="";
	                $filtro="";
	               	for ($i=0;$i<count($locs);$i++){
	              	  echo "<selected>$locs[$i]</selected>";
	               	} 
	
	           echo"
			</localidades>
			<tipoCons>";
	           
	           
					$tips=split("x",$fil[tip_id]);
			
					$regs=" tip_id,tip_desc ";
					$tablas=" tipo_const ";
					$xtras=" order by tip_desc ASC";
				include("../"._FILE_SCRIPT_PHP_SELECT);
					$regs="";
	                $tablas="";
	                $xtras="";
	               	for ($i=0;$i<count($tips);$i++){
	              	  echo "<selected>$tips[$i]</selected>";
	               	}
	
	           echo"
			</tipoCons>
			<tipoCond>";
	           //RECUPERO CONDICIONES
				
				//$id_array=split("x",$fil[con_id]);
					$cons=split("x",$fil[con_id]);
			
					$regs=" con_id,con_desc ";
					$tablas=" condiciones ";
					$xtras=" order by con_desc ASC";
					//$id=$con_id;
				include("../"._FILE_SCRIPT_PHP_SELECT);
					$regs="";
	                $tablas="";
	                $xtras="";
	              	for ($i=0;$i<count($cons);$i++){
	                	echo "<selected>$cons[$i]</selected>";
	              	}
	                $id_array="";
	
	           echo"
			</tipoCond>
			<dem_dom>
				<![CDATA[$fil[dem_dom]]]>
			</dem_dom>
			<dem_barr>
				<![CDATA[$fil[dem_barr]]]>
			</dem_barr>
			<dem_pre_min>
				<![CDATA[$fil[dem_pre_min]]]>
			</dem_pre_min>
			<dem_pre_max>
				<![CDATA[$fil[dem_pre_max]]]>
			</dem_pre_max>
			<dem_desc>
				<![CDATA[$fil[dem_desc]]]>
			</dem_desc>
			<dem_raz>
				<![CDATA[$fil[dem_raz]]]>
			</dem_raz>
			<dem_tel>
				<![CDATA[$fil[dem_tel]]]>
			</dem_tel>
			<dem_mail>
				<![CDATA[$fil[dem_id]]]>
			</dem_mail>
			<dem_id><![CDATA[$fil[dem_id]]]>
			</dem_id>
		</datos>
	</XMLTEXTO>	
			
			
			
			";
	}