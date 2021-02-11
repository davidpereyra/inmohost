<?php 
header("Content-type: application/xml");
echo "<?xml version=\"1.0\" encoding=\"iso-8859-1\" ?>";
	extract ($_GET);
	extract ($_REQUEST);
	include("../php/config.php");	
	if(!isset($page)) $page = 0;
	if(!isset($offset)) $offset = 10;
	if(!isset($base)) $base = 0;
	$cons = "SELECT *,rubros.* FROM notas INNER JOIN rubros ON notas.rub_id=rubros.rub_id ";
	if ($txtBuscar&&!$nombre)
	{
		$nombre=$txtBuscar;
	}
	if ($rub_id)
	{
		$cons.=" and notas.rub_id=$rub_id";
	}
	if ($nombre)
	{
		$cons.=" and (nombre LIKE '%$nombre%' or apellido LIKE '%$nombre%' or domicilio LIKE '%$nombre%')";
	}
	$rs_notas = mysql_query($cons) or die("ERROR AL CONSULTAR NOTAS para sacar TOTAL");
	$totaldatos=mysql_num_rows($rs_notas);
	$cons .=" limit $base,$offset";
	//print $cons;
	$rs_notas = mysql_query($cons) or die("ERROR AL CONSULTAR NOTAS");
	echo "<inmodb><paginacion><offest>$offset</offest><totalDatos>$totaldatos</totalDatos><paginaActual>$page</paginaActual></paginacion>
	<propiedades>";
	while ($fila=mysql_fetch_array($rs_notas))
	{
			print "
					<columna>
						<nota_id><![CDATA[".$fila[nota_id]."]]></nota_id>
						<nombre><![CDATA[".$fila[nombre]."]]></nombre>
						<apellido><![CDATA[".$fila[apellido]."]]></apellido>
						<telefono><![CDATA[".$fila[telefono]."]]></telefono>
						<domicilio><![CDATA[".$fila[domicilio]."]]></domicilio>
						<mail><![CDATA[".$fila[mail]."]]></mail>
						<nota><![CDATA[".$fila[nota]."]]></nota>
						<rub_desc><![CDATA[".$fila[rub_desc]."]]></rub_desc>
						<nota_edit><![CDATA[1]]></nota_edit>
						<nota_del><![CDATA[1]]></nota_del>
					</columna>";
	}
	echo "</propiedades></inmodb>";


/*echo "
<inmodb>
		<paginacion>
			<offest>3</offest>
			<totalDatos>65</totalDatos>
			<paginaActual>$page</paginaActual>
		</paginacion>
	<propiedades>
		<columna>
			<pro_id>1</pro_id>
			<pro_name><![CDATA[Nombre Apellido]]></pro_name>
			<pro_tel><![CDATA[4589652]]></pro_tel>
			<pro_dom><![CDATA[Domicilio sd]]></pro_dom>
			<pro_rub><![CDATA[Rubro]]></pro_rub>
			<pro_dat>1</pro_dat>
			<pro_edit>1</pro_edit>
			<pro_del>1</pro_del>
		</columna>
		<columna>
			<pro_id>2</pro_id>
			<pro_name><![CDATA[Nombre Apellido]]></pro_name>
			<pro_tel><![CDATA[4589652]]></pro_tel>
			<pro_dom><![CDATA[Domicilio sd]]></pro_dom>
			<pro_rub><![CDATA[Rubro]]></pro_rub>
			<pro_dat>1</pro_dat>
			<pro_edit>1</pro_edit>
			<pro_del>1</pro_del>
		</columna>		<columna>
			<pro_id>3</pro_id>
			<pro_name><![CDATA[Nombre Apellido]]></pro_name>
			<pro_tel><![CDATA[4589652]]></pro_tel>
			<pro_dom><![CDATA[Domicilio sd]]></pro_dom>
			<pro_rub><![CDATA[Rubro]]></pro_rub>
			<pro_dat>1</pro_dat>
			<pro_edit>0</pro_edit>
			<pro_del>0</pro_del>
		</columna>		<columna>
			<pro_id>4</pro_id>
			<pro_name><![CDATA[Nombre Apellido]]></pro_name>
			<pro_tel><![CDATA[4589652]]></pro_tel>
			<pro_dom><![CDATA[Domicilio sd]]></pro_dom>
			<pro_rub><![CDATA[Rubro]]></pro_rub>
			<pro_dat>1</pro_dat>
			<pro_edit>1</pro_edit>
			<pro_del>0</pro_del>
		</columna>
	</propiedades>
</inmodb>";
*/
?>