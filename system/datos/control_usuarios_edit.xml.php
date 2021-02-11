<?php
header("Content-type: application/xml");

	extract ($_GET);
	extract ($_POST);
	extract ($_REQUEST);
	
	include("../php/config.php");	
	echo "<?xml version=\"1.0\" encoding=\"iso-8859-1\" ?>";
	$cons_emp="
			select	
					empleados.*,
					date_format(usr_tpo,'%i') as minu,
					date_format(usr_tpo,'%H') as hora
			from 
				empleados
			where
				emp_id=$emp_id 
	";
	$rs_emp=mysql_query($cons_emp) or print ("<error>Error al obtener datos del usuario $cons_emp ". mysql_error() . "</error>");
	$fil=mysql_fetch_array($rs_emp);
	echo "
	<usuario>
		<emp_id>$emp_id</emp_id>
		<usr_login>".$fil[usr_login]."</usr_login>
		<nombre>".$fil[nombre]."</nombre>
		<apellido>".$fil[apellido]."</apellido>
		<domicilio>".$fil[domicilio]."</domicilio>
		<telefono>".$fil[telefono]."</telefono>

		<tel_inmo>".$fil[tel_inmo]."</tel_inmo>
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
            echo "<selected>".$fil[sec_id]."</selected>";
            
		echo"	</sec_id>
		<sexo>";
		
			echo"<option value='masculino'> Masculino </option>";			
			echo"<option value='femenino'> Femenino </option>";
			echo"<selected>$fil[sexo]</selected>";
		echo"
		</sexo>
		<mostrar>
			";
			echo"<option value='1'> Si </option>";			
			echo"<option value='0'> No </option>";
			echo"<selected>$fil[mostrar]</selected>";
		echo"
		</mostrar>
		<email>".$fil[email]."</email>
		<hora>";
						
		for ($i=0;$i<=23;$i++){
			if($i<10){
				$numer="0".$i;
			}else{
				$numer=$i;
				}
			echo "<option value='$numer'>$numer</option>";
		}
		
			echo "<selected>$fil[hora]</selected>";
		echo"</hora>
		
		<minuto>";
						
		
			for ($i=0;$i<=60;$i+=5){
				if($i<10){
					$numer="0".$i;
				}else{
					$numer=$i;
				}
				echo "<option value='$numer'>$numer</option>";
			}
		
			echo "
			
			
				<selected>".$fil[minu]."</selected>
			
			</minuto>
		
		
		
		<priv_id>
				"; 
			
			echo"	<option value='1'>Admin</option>
					<option value='2'>Usuario</option>
					<selected>".$fil[priv_id]."</selected>
			
			</priv_id>
		";
	echo "
	</usuario>";
	
?>
