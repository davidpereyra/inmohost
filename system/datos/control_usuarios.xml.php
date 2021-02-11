<?php 
	header("Content-type: application/xml");
	extract ($_GET);
	extract ($_REQUEST);
	include("../php/config.php");	
	echo "<?xml version=\"1.0\" encoding=\"iso-8859-1\" ?>";
	
	echo "
	<usuario>
		<sec_id> 
		";
			$regs=" sec_id,sec_desc ";
			$tablas=" sectores ";
			$xtras=" order by sec_desc ASC";						
			include("../"._FILE_SCRIPT_PHP_SELECT);
			$regs="";
            $tablas="";
            $id="";
            $xtras="";
            echo "<selected>$sec_id</selected>";
		echo"	</sec_id>
		<sexo>";
		
			echo"<option value='masculino'> Masculino </option>";			
			echo"<option value='femenino'> Femenino </option>";
		echo"
		</sexo>
		<mostrar>
			";
			echo"<option value='1'> Si </option>";			
			echo"<option value='0'> No </option>";
		echo"
		</mostrar>
	</usuario>		
			";
?>