<?php
header("Content-type: application/xml");

	extract ($_GET);
	extract ($_POST);
	extract ($_REQUEST);
	include("../php/config.php");
	$xml=1;	
	echo "<?xml version=\"1.0\" encoding=\"iso-8859-1\" ?>";
	$estado=0;
	$emp_id=0;
	$con_id=0;
	$tip_id=0;
	$pro_id=$PROV_DEFAULT;
	$fecha=date("d-m-Y");
	$fechas=split("-",$fila[tas_fecha]);
	echo "
	<tasacion>
		<id>".$fila[tas_id]."</id>
		<fecha>".$fecha."</fecha>
		<dia>".$fechas[0]."</dia>
		<mes>".$fechas[1]."</mes>
		<ano>".$fechas[2]."</ano>
		";
	echo "<estados>
            <option value='0'>Indistinto</option>
            <option value='1'>Dadas de Alta</option>
            <option value='2'>Archivadas</option>
            <option value='3'>En Curso</option>
            <option value='4'>Pendiente</option>		
			<selected>".$estado."</selected>
		  </estados>";
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
			$filtro="emp_id=78 OR emp_id=79 OR emp_id=80"; //sólo cargo tasaciones a los sectores, no a los empleados
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
