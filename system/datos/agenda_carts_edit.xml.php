<?php
header("Content-type: application/xml");

	extract ($_GET);
	extract ($_POST);
	extract ($_REQUEST);
	include("../php/config.php");	
	$xml=1;
	echo "<?xml version=\"1.0\" encoding=\"iso-8859-1\" ?>";
	$cons_nota="
			select	
				notas.*,
				rubros.*
			from 
				notas,
				rubros
			where 
				notas.nota_id='$nota_id' and 
				rubros.rub_id = notas.rub_id
	";
	$rs_nota=mysql_query($cons_nota) or print ("<error>Error al obtener datos de la nota $cons_nota ". mysql_error() . "</error>");
	$fila=mysql_fetch_array($rs_nota);
	$rub_id=$fila[rub_id];
	echo "
	<nota>
		<id>".$fila[nota_id]."</id>
		<nombre>".$fila[nombre]."</nombre>
		<apellido>".$fila[apellido]."</apellido>
		<telefono>".$fila[telefono]."</telefono>
		<domicilio>".$fila[domicilio]."</domicilio>
		<mail>".$fila[mail]."</mail>
		<nota>".$fila[nota]."</nota>
		";
	echo "<rubros>";
			$regs=" rub_id,rub_desc";
			$tablas=" rubros ";
			$xtras=" order by rub_desc ASC";
			include("../"._FILE_SCRIPT_PHP_SELECT);
			$regs="";
            $tablas="";
            $id="";
            $xtras="";
	echo "<selected>$rub_id</selected>";
	echo "</rubros>";
	echo "
	</nota>";
	
?>
