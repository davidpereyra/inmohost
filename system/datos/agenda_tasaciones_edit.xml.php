<?php
header("Content-type: application/xml");
$xml=1;
	extract ($_GET);
	extract ($_POST);
	extract ($_REQUEST);
	$intervalo_min=15;
	include("../php/config.php");	
	echo "<?xml version=\"1.0\" encoding=\"iso-8859-1\" ?>";
	$cons_tasacion="
			select	
				tasaciones.*,
				condiciones.con_desc,
				tipo_const.tip_desc
			from 
				tasaciones,
				condiciones,
				tipo_const
			where 
				tasaciones.con_id=condiciones.con_id and
				tasaciones.tip_id=tipo_const.tip_id and 
				tasaciones.tas_id=$tas_id 
	";
	$rs_tas=mysql_query($cons_tasacion) or print ("<error>Error al obtener datos de la tasacion $cons_tasacion ". mysql_error() . "</error>");
	$fila=mysql_fetch_array($rs_tas);
	$estado=$fila[estado];
	$emp_id=$fila[tas_referente];
	$con_id=$fila[con_id];
	$tip_id=$fila[tip_id];
	$pro_id=$fila[pro_id];
	$loc_id=$fila[loc_id];
	$fecha=$fila[tas_fecha];
	$fechas=split("-",$fila[tas_fecha]);
	echo "
	<tasacion>
		<id>".$fila[tas_id]."</id>
		<fecha>".$fecha."</fecha>
		<dia>".$fechas[0]."</dia>
		<mes>".$fechas[1]."</mes>
		<ano>".$fechas[2]."</ano>
		<tas_bar>".$fila[tas_bar]."</tas_bar>
		<tas_dom>".$fila[tas_dom]."</tas_dom>
		<nom_prop>".$fila[nom_prop]."</nom_prop>
		<ap_prop>".$fila[ap_prop]."</ap_prop>
		<tel_prop>".$fila[tel_prop]."</tel_prop>
		<tas_desc>".$fila[tas_desc]."</tas_desc>
		";
	echo "<estados>
            <option value='2'>Agendada</option>
            <option value='3'>Pendiente</option>
    		<selected>".$fila[estado]."</selected>
		  </estados>";
	/*
	echo "<estados>
            <option value='0'>Indistinto</option>
            <option value='1'>Dadas de Alta</option>
            <option value='2'>Agendada</option>
            <option value='3'>En Curso</option>
            <option value='4'>Pendiente</option>		
			<selected>".$fila[estado]."</selected>
		  </estados>";
	*/
	echo "<tipo_const>";
			$regs=" tip_id,tip_desc";
			$tablas=" tipo_const ";
			$xtras=" order by tip_desc ASC";
			include("../"._FILE_SCRIPT_PHP_SELECT);
			$regs="";
            $tablas="";
            $id="";
            $xtras="";
	echo "<selected>".$tip_id."</selected>";
	echo "</tipo_const>";
	echo "<condiciones>";
			$regs=" con_id,con_desc";
			$tablas=" condiciones ";
			$xtras=" order by con_desc ASC";
			include("../"._FILE_SCRIPT_PHP_SELECT);
			$regs="";
            $tablas="";
            $id="";
            $xtras="";
	echo "<selected>".$con_id."</selected>";
	echo "</condiciones>";
	echo "<empleados>";
			$regs=" emp_id,CONCAT(nombre, ' ', apellido)";
			$tablas=" empleados ";
			$filtro="";
			$xtras=" order by nombre,apellido ASC";
		    include("../"._FILE_SCRIPT_PHP_SELECT);
			$regs="";
            $tablas="";
            $id="";
            $xtras="";		    
			echo "<selected>".$emp_id."</selected>";
	echo "</empleados>";
	echo "<provincias>";
				if(!$pai_id)
					$pai_id=$PAIS_DEFAULT;
					
			$regs=" pro_id,pro_desc";
			$tablas=" provincias ";
			$filtro=" pai_id=$pai_id";
			$xtras=" order by pro_desc ASC";
		    include("../"._FILE_SCRIPT_PHP_SELECT);
		    $regs="";
            $tablas="";
            $id="";
            $xtras="";
			echo "<selected>".$pro_id."</selected>";
	echo "</provincias>";
	echo "<departamentos>";
			$regs=" loc_id,loc_desc";
			$tablas=" localidades ";
			$filtro=" pro_id=$pro_id";
			$xtras=" order by loc_desc ASC";
		    include("../"._FILE_SCRIPT_PHP_SELECT);
		    $regs="";
            $tablas="";
            $id="";
            $xtras="";
			echo "<selected>".$loc_id."</selected>";
	echo "</departamentos>";
	echo "
	</tasacion>";
	
?>
