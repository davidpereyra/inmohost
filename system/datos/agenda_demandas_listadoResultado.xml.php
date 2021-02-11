<?php 

header("Content-type: application/xml");


	extract ($_GET);
	extract ($_REQUEST);
	
	include("../php/config.php");	
	

$regs="		
		demandas.dem_id,
		date_format(dem_fecha,'%d-%m-%Y') as dem_fecha,
		demandas.dem_raz,
		demandas.dem_tel,
		demandas.loc_id,
		demandas.tip_id,
		demandas.con_id,
		demandas.dem_desc,
		demandas.dem_barr,
		demandas.dem_pre_min,
		demandas.dem_pre_max,
		demandas.dem_dom
	 ";
$tablas="
		demandas";
$filtro="
		DATE_SUB(CURDATE(),INTERVAL 60 DAY) <= dem_fecha AND 
		demandas.dem_id > 0";
/*
$tablas="
		demandas, 
		condiciones, 
		tipo_const";

$filtro="

		demandas.dem_id > 0 and 
		demandas.con_id=condiciones.con_id and 
		demandas.tip_id=tipo_const.tip_id";
		demandas.dem_id > 0  
	";

*/
$parametros="usr_id="._USR_ID."&op=1";

if($dem_id>0){
	$filtro .="	and demandas.dem_id=$dem_id"; 
}else{// sino se busca por ID se busca por los filtros que ingreso el usuario
	if($pro_id){
			
		$tablas .= ",provincias";			
		$regs .=" ,provincias.pro_desc ";
		$filtro .="	and demandas.pro_id=provincias.pro_id 
				and demandas.pro_id=$pro_id
				and provincias.pro_id=$pro_id";
	//	$parametros.="&pro_id=$pro_id";
	}

if($loc_id>0){
	
	$locs=$loc_id;
	
	for($i=0;$i<count($locs);$i++){
		
		$loc_ids.=" demandas.loc_id like '%x$locs[$i]x%'";
		
		if($i<count($locs)-1){
			$loc_ids.=" or ";
		}
	}
	
	
	$filtro .="	and ( $loc_ids ) ";
}


if($con_id>0){
	$cons=$con_id;
	
	if(is_array($con_id)){
		for($i=0;$i<count($cons);$i++){
			
			$con_ids.=" demandas.con_id like '%x$cons[$i]x%' ";
			
			if($i<count($cons)-1){
				$con_ids.=" or ";
			}
		}
			
		$filtro .="	and ( $con_ids ) ";
		
	}else{
		
		$filtro .=" and demandas.con_id like '%x".$con_id."x%' ";
	}
	
}

if($tip_id>0){
	
	if(is_array($tip_id)){
		$tips=$tip_id;
		
		for($i=0;$i<count($tips);$i++){
			
			$tip_ids.=" demandas.tip_id like '%x$tips[$i]x%' ";
			
			if($i<count($tips)-1){
				$tip_ids.=" or ";
			}
		}
			
		$filtro .="	and ( $tip_ids ) ";	
		
	}else{
		
		$filtro .=" and demandas.tip_id like '%x".$tip_id."x%' ";
		
	}
}	

if($otros > 0){
				
			
	$filtro .=" and !(demandas.tip_id like 'x1x')
				and !(demandas.tip_id like 'x5x')
			 	and !(demandas.tip_id like 'x6x')
			 	and !(demandas.tip_id like 'x16x')
		";
		
	
}


     
if($dem_barr){
	$filtro .=" and dem_barr like '%$dem_barr%'";
//	$parametros.="&prp_bar=$dem_barr";
}     

if($pre_max){
	$filtro .=" and dem_pre_max >= $pre_max";
//	$parametros.="&pre_medio=$pre_max";
}
if($pre_min){
	$filtro .=" and dem_pre_min <= $pre_min";
}


if($dem_dom){
	$filtro .=" and dem_dom like '%$dem_dom%'";
//	$parametros.="&prp_dom=$dem_dom";

}


//datos del demandante
if($dem_raz){
	$filtro .=" and dem_raz like '%$dem_raz%'";

}

if($dem_tel){
	$filtro .=" and dem_tel like '%$dem_tel%'";
}

if($dem_mail){
	$filtro .=" and dem_mail like '%$dem_mail%'";

}



}//fin ELSE

if($orden==""){

	$order=" order by dem_id ASC";
	
}elseif($orden=="dem_fecha"){
	
	$order=" order by date_format(dem_fecha,'%Y %m %d') DESC";
	
}else{
	
	$order=" order by ".$orden." ASC";
	
}

$cons="select  $regs from $tablas where $filtro $order";
//print"<br>$cons<br>";


//print"$cons";
$todo = mysql_query($cons) or die ("$err_1001<br>$cons");
$cant_dem=mysql_num_rows($todo);
echo "<?xml version=\"1.0\" encoding=\"iso-8859-1\" ?>";


if(!isset($page)) $page = 0;
	$offset=$offest;
	if (!$base) $base=0;
	if (!$offset) $offset=10;
	//print"<br> $datos <br>";	
	$limit .= " limit $base,$offset";
$cons.=$limit;

//print $cons;

$todo = mysql_query($cons) or die ("Error al ejecutar consulta<br>$cons");

echo "
	<inmodb>
			<paginacion>
				<offest><![CDATA[10]]></offest>
				<totalDatos><![CDATA[$cant_dem]]></totalDatos>
				<paginaActual><![CDATA[$page]]></paginaActual>
			</paginacion>
		<propiedades>";


while($fila=mysql_fetch_array($todo)){
	
	//RECUPERO LOCALIDADES
	$filt="";
	//echo $fila[loc_id];
	$locs=split("x",$fila[loc_id]);
	for ($i=0;$i<count($locs);$i++){
	//	echo $locs[$i]."*$i*";
		if($locs[$i]!=""){
			$filt.=" localidades.loc_id=$locs[$i]";
			if($i<count($locs)-2){
				$filt.=" or ";
			}
		}
	}
	
	if($i>1){
		$cad_loc="select loc_desc from localidades where $filt";
		$res_loc=mysql_query($cad_loc) or die($cad_loc."----".mysql_error());
	}

	
	//RECUPERO TIPOS DE CONSTRUCCION
	$filt="";
	//echo $fila[loc_id];
	$tips=split("x",$fila[tip_id]);
	for ($i=0;$i<count($tips);$i++){
	//	echo $locs[$i]."*$i*";
		if($tips[$i]!=""){
			$filt.=" tipo_const.tip_id=$tips[$i]";
			if($i<count($tips)-2){
				$filt.=" or ";
			}
		}
	}
	
	if($i>1){
		$cad_tip="select tip_desc from tipo_const where $filt";
		$res_tip=mysql_query($cad_tip) or die($cad_tip."----".mysql_error());
	}
	
	
	//RECUPERO CONDICIONES
	$filt="";
	//echo $fila[loc_id];
	$conds=split("x",$fila[con_id]);
	for ($i=0;$i<count($conds);$i++){
	//	echo $locs[$i]."*$i*";
		if($conds[$i]!=""){
			$filt.=" condiciones.con_id=$conds[$i]";
			if($i<count($conds)-2){
				$filt.=" or ";
			}
		}
	}
	
	if($i>1){
		$cad_con="select con_desc from condiciones where $filt";
		$res_con=mysql_query($cad_con) or die($cad_con."----".mysql_error());
	}
	
			
	echo "
			<columna>
				
				<dem_id><![CDATA[".$fila[dem_id]."]]></dem_id>
				<dem_fecha><![CDATA[".$fila[dem_fecha]."]]></dem_fecha>
				<dem_raz><![CDATA[".$fila[dem_raz]."]]></dem_raz>
				<dem_tel><![CDATA[".$fila[dem_tel]."]]></dem_tel>
				<fileABM><![CDATA["._FILE_PHP_ABM_DEM."]]></fileABM>
				<tip_desc><![CDATA[";
					$j=0;
					while ($fil=mysql_fetch_array($res_tip)) {
							echo $fil[tip_desc];					
							
							if($j<mysql_num_rows($res_tip)-1){
								echo " o ";
							}
							$j++;
					}
			print"	]]></tip_desc>
				<con_desc><![CDATA[";
					$j=0;
					while ($fil=mysql_fetch_array($res_con)) {
							echo $fil[con_desc];					
							
							if($j<mysql_num_rows($res_con)-1){
								echo " o ";
							}
							$j++;
					}
			print"]]></con_desc>
				<dem_desc><![CDATA[".$fila[dem_desc]."]]></dem_desc>
				<dem_dom><![CDATA[".$fila[dem_dom]." 
				";
					$j=0;
					while ($fil=mysql_fetch_array($res_loc)) {
							echo $fil[loc_desc];					
							
							if($j<mysql_num_rows($res_loc)-1){
								echo " o ";
							}
							$j++;
					}
			print"								
				]]>
				
				
				</dem_dom>
				<dem_pre_min><![CDATA[Entre ".$fila[dem_pre_min]." y ".$fila[dem_pre_max]."]]></dem_pre_min>				
				<dem_edit><![CDATA[1]]></dem_edit>
				<dem_del><![CDATA[1]]></dem_del>
				<dem_coin><![CDATA[1]]></dem_coin>
				
						
			</columna>
	";
}
echo "
	</propiedades>
	</inmodb>";
?>