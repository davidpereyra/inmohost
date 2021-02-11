<?php 
	header("Content-type: application/xml");
	extract($_GET);
	extract ($_POST);
	extract ($_REQUEST);

	include("../php/config.php");	
	echo "<?xml version=\"1.0\" encoding=\"iso-8859-1\" ?>";
	$xml=1;
	
	echo "<inmobiliaria>";
	if($mod_tip=="edit")
	{
		 $cadena="select 
        				usuarios.*,
        				loc_desc,
        				pro_desc 
        		 from 
        		 		usuarios,
        		 		provincias,
        		 		localidades
        		 where 
        		 		usuarios.loc_id=localidades.loc_id and
        		 		usuarios.pro_id=provincias.pro_id and
        		 		localidades.pro_id=provincias.pro_id and
        		 		usr_id="._USR_ID;
        
			 $res=mysql_query($cadena);
        		
			$pai_id=1;
			
			while ($fil=mysql_fetch_array($res)) {
				$pro_id=$fil[pro_id];
				$loc_id=$fil[loc_id];
					echo"
						<usr_id><![CDATA[$fil[usr_id]]]> </usr_id>
						<titular><![CDATA[$fil[titular]]]></titular>
						<usr_raz><![CDATA[$fil[usr_raz]]]></usr_raz>
						<usr_dom><![CDATA[$fil[usr_dom]]]></usr_dom>";
					
					echo"
					 <provincias>";
			 			$regs=" pro_id,pro_desc ";
						$tablas=" provincias ";
						$filtro=" pai_id=$pai_id";
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
					
						<usr_tel><![CDATA[$fil[usr_tel]]]></usr_tel>
						<usr_mail><![CDATA[$fil[usr_mail]]]></usr_mail>
						<web><![CDATA[$fil[web]]]></web>
						
						";
			}
	}	
	echo "</inmobiliaria>";
	
?>