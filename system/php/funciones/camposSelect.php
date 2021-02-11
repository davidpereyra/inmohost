<?php
	extract($_GET);
	extract ($_POST);
	extract ($_REQUEST);

		if (!$db)
		{
			include"../conexion.php";
		}
				
		if(!$filtro)
			$cadena="select $regs from $tablas $xtras";	
		else
			$cadena="select $regs from $tablas where $filtro $xtras";		
			
		if(!$inicial){
			$inicial="Indistinto";			
		}	
		
		if(!$sinIndistinto){
			echo "<option value='0'>$inicial</option>";
		}
		
		if($tablas == " tipo_const "){
			$res=mysql_query($cadena) or die("ALGO NO ANDA $cadena".mysql_error());
			echo "<OPTGROUP label='Frecuentes' style='background-color:#FFFFCC'>";
			while ($fila=mysql_fetch_array($res)){
					if($fila[0] == 1 || $fila[0] == 5 || $fila[0] == 6 || $fila[0] == 16){
							echo "<option value='$fila[0]'>$fila[1]</option>";
					}
			}
			echo "</OPTGROUP>";
		}
		$res=mysql_query($cadena) or die("ALGO NO ANDA $cadena".mysql_error());

			if(trim($tablas)=="empleados" && trim($filtro)==""){ // me aseguro que no se muestren en la alta de tasaciones
		
				echo "<option value='100'>Dpto. Administracion</option>";
				echo "<option value='102'>Dpto. Comercial</option>";
				echo "<option value='101'>Dpto. Rural/Lotes</option>";
								
			}	

		while ($fila=mysql_fetch_array($res)){
				
			if($fila[2]){
				$aux=" $fila[2]";				
			}
			
			if($xml==1){
			
				if(!$id_array){
					if($fila[0]==$id){
						if($fila[0] == $usr_id){
							echo "<option value='$fila[0]' selected style='background-color:#FFFFCC'><![CDATA[$fila[1] $aux]]></option>";
						} else {
							echo "<option value='$fila[0]' selected ><![CDATA[$fila[1] $aux]]></option>";
						}
					}else{
						if($fila[0] == $usr_id){
							echo "<option value='$fila[0]' style='background-color:#FFFFCC'><![CDATA[$fila[1] $aux]]></option>";
						} else {
							echo "<option value='$fila[0]'><![CDATA[$fila[1] $aux]]></option>";
						}
					}
				}else{
					if(array_key_exists($fila[0],$id_array)){
						echo "<option value='$fila[0]' selected><![CDATA[$fila[1] $aux]]></option>";
					}else{
						echo "<option value='$fila[0]'><![CDATA[$fila[1] $aux]]></option>";
					}
				}
				
			}else{
				if(!$id_array){
					if($fila[0]==$id){
						if($fila[0] == $usr_id){
							echo "<option value='$fila[0]' selected style='background-color:#FFFFCC'>$fila[1] $aux</option>";
						} else {
							echo "<option value='$fila[0]' selected >$fila[1] $aux</option>";
						}
					}else{
						if($fila[0] == $usr_id){
							echo "<option value='$fila[0]' style='background-color:#FFFFCC'>$fila[1] $aux</option>";
						} else {
							echo "<option value='$fila[0]'>$fila[1] $aux</option>";
						}
					}
				}else{
					if(array_key_exists($fila[0],$id_array)){
						echo "<option value='$fila[0]' selected>$fila[1] $aux</option>";
					}else{
						echo "<option value='$fila[0]'>$fila[1] $aux</option>";
					}
				}
			
			}
		}	

	
?>
