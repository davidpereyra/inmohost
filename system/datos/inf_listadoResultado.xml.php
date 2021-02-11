<?php 
header("Content-type: application/xml");

	extract ($_GET);
	extract ($_REQUEST);
	
	include("../php/config.php");	
	
	
echo "<?xml version=\"1.0\" encoding=\"iso-8859-1\" ?>";

$offset=$offest;
	if (!$offset)
	{
		$offset=10;
	}
	
	if (!$base){
		$base=0;
	}
switch ($tipo_inf)
{
	case 'propiedades':
	/* CONSULTA A LA BASE DE DATOS 	*/
	
	//variable ppal. a la que se le agregan los registros de las demas consultas
	$regs = "propiedades.prp_id,
			 prp_mod,
			 date_format(propiedades.prp_mod,'%d-%m%-%Y') as prp_mod_form,		 
			 CONCAT(propiedades.prp_dom, ' - ',prp_bar,' - ',localidades.loc_desc) as prp_dom,		 
			 CONCAT(tipo_const.tip_desc,' ', condiciones.con_desc) as cond,
			 CONCAT(prp_pre,' U\$S',prp_pre_dol) as prp_pre,
			 prp_llave,
		     date_format(prp_alta,'%d-%m%-%Y') as prp_alta_form,
		     prp_alta,
		     prp_referente
			 
		";
	$tablas = "	propiedades,
				condiciones,
				tipo_const,
				localidades,
				provincias,
				usuarios
			";		
	$filtro = "	    propiedades.pro_id=provincias.pro_id and
					propiedades.loc_id=localidades.loc_id and
					provincias.pro_id=localidades.pro_id and
					propiedades.usr_id=usuarios.usr_id and
					propiedades.con_id=condiciones.con_id and
					propiedades.tip_id=tipo_const.tip_id and
					propiedades.usr_id="._USR_ID."
				";
	//condicion 
	if ($con_id!=0)
		$filtro .= " and propiedades.con_id=$con_id";
	//tipo de construccion
	if ($tip_id!=0)
		$filtro .= " and propiedades.tip_id=$tip_id ";
	//estado
	if ($prp_mostrar)
	{
		$filtro .= " and propiedades.prp_mostrar=$prp_mostrar ";
	}
	//referente
	if ($emp_id)
	{
		$filtro .= " and propiedades.prp_referente=$emp_id ";
	}
	
	//mostrado desde

	if($desdeMosDia!="00"&&$desdeMosMes!="00"&&$desdeMosAno!="0000"){

		$filtro.=" and propiedades.prp_id=citas.prp_id 
				   and citas.cita_fecha >= '$desdeMosAno-$desdeMosMes-$desdeMosDia'";
		$tablas.=",citas";
		
	}
	
	if($hastaMosDia!="00"&&$hastaMosMes!="00"&&$hastaMosAno!="0000"){

		$filtro.=" and propiedades.prp_id=citas.prp_id
				   and citas.cita_fecha <= '$hastaMosAno-$hastaMosMes-$hastaMosDia'";
		
		if(!stristr($tablas,",citas")){
			$tablas.=",citas";
		}
				
	}
	
	
	//un monitor para la cita especifico
	if($emp_id_m){
		$filtro.=" and propiedades.prp_id=citas.prp_id 
					and citas.cita_id=cita_emp.cita_id 
					and cita_emp.emp_id=empleados.emp_id  and
					cita_emp.emp_id=$emp_id_m and
					citas.estado=2";
		
		if(!stristr($tablas,",citas")){
			$tablas.=",citas";
		}
		if(!stristr($tablas,",empleados")){
			$tablas.=",empleados";
		}	
		
		$tablas.=",cita_emp";
	}
		
	
	// Fecha de alta	
	if($desdeIngDia!="00"&&$desdeIngMes!="00"&&$desdeIngAno!="0000"){
		 
		  $filtro .= " and propiedades.prp_alta>='$desdeIngAno-$desdeIngMes-$desdeIngDia' ";
	}
	
	if($hastaIngDia!="00"&&$hastaIngMes!="00"&&$hastaIngAno!="0000")
	{
		$filtro .= " and propiedades.prp_alta<='$hastaIngAno-$hastaIngMes-$hastaIngDia'";
	}
	
	//cartel
	if ($prp_cartel==1)
	{
		$filtro .= " and propiedades.prp_cartel=1";
	}
	else if ($prp_cartel==2)
	{
		$filtro .= " and propiedades.prp_cartel=0";
	}
	//autorizacion
	if ($prp_aut==1)
	{
		$filtro .= " and propiedades.prp_aut=1";
	}
	else if ($prp_aut==2)
	{
		$filtro .= " and propiedades.prp_aut=0";
	}
	//publicacion
	if ($prp_pub==1)
	{
		$filtro .= " and propiedades.prp_pub!=''";
	}
	else if ($prp_pub==2)
	{
		$filtro .= " and propiedades.prp_pub=''";
	}
	//fotos
	if ($fotos==1)
	{
		$filtro .= " and propiedades.fotos>0";
	}
	else if ($fotos==2)
	{
		$filtro .= " and (propiedades.fotos=-1 or propiedades.fotos=0)";
	}
	//modificado 
	// Fecha de modificacion	
	if($desdeModDia!="00"&&$desdeModMes!="00"&&$desdeModAno!="0000"){
		 
		  $filtro .= " and propiedades.prp_mod>='$desdeModAno-$desdeModMes-$desdeModDia' ";
	}
	
	if($hastaModDia!="00"&&$hastaModMes!="00"&&$hastaModAno!="0000")
	{
		$filtro .= " and propiedades.prp_mod<='$hastaModAno-$hastaModMes-$hastaModDia'";
	}

	if(!$orden){
		$orden="prp_id";		
	}
	
	$limit .= " limit $base,$offset ";
	//echo "select $regs from $tablas where $filtro order by prp_id $limit";
	$consulta = "select distinct $regs from $tablas where $filtro order by $orden $limit";
	$cons=mysql_query($consulta) or die("Consulta propiedades".mysql_error()."$consulta");
	
	$consulta2 = "select distinct $regs from $tablas where $filtro";
	$cons2=mysql_query($consulta2) or die("Consulta cantidad".mysql_error());
	if(!isset($page)) $page = 0;
	
	echo "
	<inmodb>
			<paginacion>
				<offest>$offset</offest>
				<base>$base</base>
				<totalDatos>   ".mysql_num_rows($cons2)."</totalDatos>
				<paginaActual>$page</paginaActual>
				<usr_id>$usr_id</usr_id>
			</paginacion>
		<propiedades>";
		while ($fila=mysql_fetch_array($cons)) 
		{
			echo "
			<columna>
				<prp_mod>$fila[prp_mod_form]</prp_mod>
				<prp_id><![CDATA[$fila[prp_id]]]></prp_id>
				<prp_dom><![CDATA[$fila[prp_dom]]]></prp_dom>
				<cond><![CDATA[$fila[cond]]]></cond>
				<prp_pre><![CDATA[$fila[prp_pre]]]></prp_pre>
				<prp_llave><![CDATA[$fila[prp_llave]]]></prp_llave>
				<prp_tas><![CDATA[$fila[prp_tas]]]></prp_tas>
				<prp_alta><![CDATA[$fila[prp_alta_form]]]></prp_alta>
				";
			
			$cad_ref="select nombre,apellido from empleados where emp_id=$fila[prp_referente]";
			$res_ref=mysql_query($cad_ref);
			echo"<prp_referente>";
			if(mysql_num_rows($res_ref)){
				$fil_ref=mysql_fetch_array($res_ref);
				echo"<![CDATA[$fil_ref[nombre] $fil_ref[apellido]]]>";
			}else{
			 echo"<![CDATA[Sin referente]]>";	
				
			}
			echo"</prp_referente>";
			
			$cad_citas_mos="select count(cita_id) from citas where prp_id=$fila[prp_id] and estado=2";
			$res_citas_mos=mysql_query($cad_citas_mos);
			$citas_mos=mysql_result($res_citas_mos,0,0);
			
			$cad_citas_tot="select count(cita_id) from citas where prp_id=$fila[prp_id]";
			$res_citas_tot=mysql_query($cad_citas_tot);
			$citas_tot=mysql_result($res_citas_tot,0,0);
			
				echo"<citas><![CDATA[$citas_mos de $citas_tot]]></citas>
			</columna>
			";
		}
		echo "</propiedades></inmodb>";
	
	break;
	case "propietarios":
		
			//variable ppal. a la que se le agregan los registros de las demas consultas
		$regs = "
				 propietarios.prop_nombre,
				 propietarios.prop_apellido,
				 propietarios.prop_tel,
				 propietarios.prop_dom,
				 propietarios.prop_mail,
				 propietarios.prop_id
				 		";
		$tablas = "
					propietarios
				";		
		$filtro = "
					propietarios.prop_id!=''					
					";
		
		
		if ($prop_nombre)
		{
			$filtro .= " and (propietarios.prop_nombre like '%$prop_nombre%' or propietarios.prop_apellido like '%$prop_nombre%')";
		}
		
		if ($prop_apellido)
		{
			$filtro .= " and (propietarios.prop_nombre like '%$prop_apellido%' or propietarios.prop_apellido like '%$prop_apellido%')";
		}
		
		if($prop_tel==1){
			$filtro.=" and propietarios.prop_tel!=''";	
		}else if($prop_tel==2){
			$filtro.=" and propietarios.prop_tel=''";	
		}
		
		
		if($prop_mail==1){
			$filtro.=" and propietarios.prop_mail!=''";	
		}else if($prop_mail==2){
			$filtro.=" and propietarios.prop_mail=''";	
		}
		
		
		//seccion inmuebles
		if($pro_id){
			
			$filtro.=" and propiedades.prop_id=propietarios.prop_id and
						propiedades.pro_id=$pro_id";
			if(!stristr($tablas,",propiedades")){			
				$tablas.=",propiedades";
			}
		}
		
		if($loc_id){
			
			$filtro.=" and propiedades.prop_id=propietarios.prop_id and
						propiedades.loc_id=$loc_id";			
			
			if(!stristr($tablas,",propiedades")){
				$tablas.=",propiedades";
			}
			
		}
		
		
		if($con_id){
			
			$filtro.=" and propiedades.prop_id=propietarios.prop_id and
						propiedades.con_id=$con_id";			
			
			if(!stristr($tablas,",propiedades")){
				$tablas.=",propiedades";
			}
		}
		
		
		if($tip_id){
			
			$filtro.=" and propiedades.prop_id=propietarios.prop_id and
						propiedades.tip_id=$tip_id";			
			if(!stristr($tablas,",propiedades")){
				$tablas.=",propiedades";
			}
		}
		
		if($prp_dom){
			
			$filtro.=" and propiedades.prop_id=propietarios.prop_id and
						(propiedades.prp_dom like '%$prp_dom%' or propiedades.prp_dom like '%$prp_dom%')";			
			if(!stristr($tablas,",propiedades")){
				$tablas.=",propiedades";
			}			
		}
			
		
		if($prp_bar){
			
			$filtro.=" and propiedades.prop_id=propietarios.prop_id and
						(propiedades.prp_bar like '%$prp_bar%' or propiedades.prp_dom like '%$prp_bar%')";			
			if(!stristr($tablas,",propiedades")){
				$tablas.=",propiedades";
			}			
		}
		
		if(!$orden){
			if(stristr($tablas,",propiedades")){
				$orden="prp_id";		
			}else{
				$orden="prop_id";
			}
		}
	
		$limit .= " limit $base,$offset ";
//		echo "select $regs from $tablas where $filtro order by prp_id $limit";
		$consulta = "select distinct $regs from $tablas where $filtro order by $orden $limit";
		$cons=mysql_query($consulta) or die("Consulta 1".mysql_error()."$consulta");
		
		$consulta2 = "select distinct $regs from $tablas where $filtro";
		$cons2=mysql_query($consulta2) or die("Consulta cantidad".mysql_error());
		if(!isset($page)) $page = 0;
		
		
		echo "
	<inmodb>
			<paginacion>
				<offest>$offset</offest>
				<base>$base</base>
				<totalDatos>   ".mysql_num_rows($cons2)."</totalDatos>
				<paginaActual>$page</paginaActual>
				<usr_id>$usr_id</usr_id>
			</paginacion>
		<propiedades>";
		while ($fila=mysql_fetch_array($cons)) 
		{
			echo "
			<columna>
						
			
				<prop_nombre>$fila[prop_nombre]</prop_nombre>
				<prop_apellido><![CDATA[$fila[prop_apellido]]]></prop_apellido>
				<prop_tel><![CDATA[$fila[prop_tel]]]></prop_tel>
				<prop_dom><![CDATA[$fila[prop_dom]]]></prop_dom>
				<prop_mail><![CDATA[$fila[prop_mail]]]></prop_mail>
					
				";
				$cad="select prp_id from propiedades where prop_id=$fila[prop_id] and usr_id="._USR_ID;
				$res=mysql_query($cad);
				
				if(mysql_num_rows($res)){
					$id=mysql_result($res,0,0);	
				}else{
					$id="";
				}
				
			echo"	<prop_id><![CDATA[$id]]></prop_id>
				
						
			</columna>
			";
		}
		echo "</propiedades>
		
		</inmodb>";
		
		
	break;
	case "citas":
		
		$regs=" 
				citas.cita_id,
				date_format(citas.cita_fecha,'%d-%m%-%Y') as cita_fecha_form,
				citas.cita_fecha,
				citas.cita_hora,
				citas.prp_id,
				citas.cita_desc,
				CONCAT(propiedades.prp_pre,' U\$S',propiedades.prp_pre_dol) as prp_pre,
				propiedades.prp_llave,
				propiedades.prp_nota,
				CONCAT(empleados.nombre,' ',empleados.apellido) as monitor,
				citas.estado
				
		";
		
		$tablas="  citas
				  ,propiedades
				  ,empleados
				  ,cita_emp
				  
		";
		
		$filtro=" 
				 citas.prp_id=propiedades.prp_id and
				 citas.cita_id=cita_emp.cita_id and
				 cita_emp.emp_id=empleados.emp_id and
				 propiedades.usr_id="._USR_ID;			 
			
		
		//referente
		if ($emp_id)
		{
			$filtro .= " and cita_emp.emp_id=$emp_id";
		}
		
		//mostrado desde

		if($desdeMosDia!="00"&&$desdeMosMes!="00"&&$desdeMosAno!="0000"){
			$filtro.=" and citas.cita_fecha >= '$desdeMosAno-$desdeMosMes-$desdeMosDia'";
		}
		//mostrado hasta
		if($hastaMosDia!="00"&&$hastaMosMes!="00"&&$hastaMosAno!="0000"){
			$filtro.=" and citas.cita_fecha <= '$hastaMosAno-$hastaMosMes-$hastaMosDia'";
		}
		
		if($prp_id){
			$filtro.=" and citas.prp_id=$prp_id";
		}
		
		if($est_mos==1){
			$filtro.=" and citas.estado=2";
		}else if($est_mos==2){
			$filtro.=" and citas.estado=0";
		}else if($est_mos==3){
			$filtro.=" and citas.estado=1";
		}
		
		if(!$orden){
			$orden="prp_id";		
		}
	
		$limit .= " limit $base,$offset ";
		//echo "select $regs from $tablas where $filtro order by prp_id $limit";
		$consulta = "select distinct $regs from $tablas where $filtro order by $orden $limit";
		$cons=mysql_query($consulta) or die("Consulta 1".mysql_error()."$consulta");
		
		$consulta2 = "select distinct $regs from $tablas where $filtro";
		$cons2=mysql_query($consulta2) or die("Consulta cantidad".mysql_error());
		if(!isset($page)) $page = 0;
		
			echo "
	<inmodb>
			<paginacion>
				<offest>$offset</offest>
				<base>$base</base>
				<totalDatos>   ".mysql_num_rows($cons2)."</totalDatos>
				<paginaActual>$page</paginaActual>
				<usr_id>$usr_id</usr_id>
			</paginacion>
		<propiedades>";
		while ($fila=mysql_fetch_array($cons)) 
		{
			echo "
			<columna>
					
				<cita_fecha>$fila[cita_fecha_form]</cita_fecha>
				<cita_hora><![CDATA[$fila[cita_hora]]]></cita_hora>
				<prp_id><![CDATA[$fila[prp_id]]]></prp_id>
				<cita_desc><![CDATA[$fila[cita_desc]]]></cita_desc>
				<prp_pre><![CDATA[$fila[prp_pre]]]></prp_pre>
				<prp_llave><![CDATA[$fila[prp_llave]]]></prp_llave>
				<prp_nota><![CDATA[$fila[prp_nota]]]></prp_nota>
				<monitor><![CDATA[$fila[monitor]]]></monitor> ";
				$cad_int="select 
								 CONCAT(interesados.nombre,' ',interesados.apellido) as interesado
						from 
								interesados,int_x_cita,citas 
						where
								citas.cita_id=int_x_cita.cita_id and
								citas.cita_id=$fila[cita_id] and
								int_x_cita.int_id=interesados.int_id	 	
								";
				
				$res_int=mysql_query($cad_int);
				$int="";
				while ($fil_int=mysql_fetch_array($res_int)) {
					
					$int.=$fil_int[interesado]."<br>";
					
				}
				 if($int==""){
				 	$int="Sin Interesado";
				 }
			echo"
				<interesado><![CDATA[$int]]></interesado> ";
				
				if($fila[estado]==1){
					$estado="Cancelada";
				}else if($fila[estado]==2){
					$estado="Mostrada";
				}else{
					$estado="A mostrar";
				}
			echo"
				<estado><![CDATA[$estado]]></estado> 
											
			</columna>
			";
		}
		echo "</propiedades>
		
		</inmodb>";
		
	break;
	case "tasaciones":

		$regs=" tasaciones.tas_id,
				tipo_const.tip_desc,
				condiciones.con_desc,
				tasaciones.precio_prop,
				tasaciones.precio_tas,
				tasaciones.precio_inmo,
				CONCAT(tasaciones.nom_prop,' ',tasaciones.ap_prop) as propietario,
				tasaciones.tel_prop,
				CONCAT(empleados.nombre,' ',empleados.apellido) as referente,
				date_format(tasaciones.tas_fecha,'%d-%m-%Y') as tas_fecha,
				tasaciones.tas_fecha,
				tasaciones.precio_transaccion,
				CONCAT(tasaciones.tas_dom,'[',loc_desc,'-',pro_desc) as domicilio,
				tasaciones.tas_desc,
				tasaciones.estado
		";
		
		$tablas=" tasaciones,
				  provincias,
				  localidades,
				  empleados,
				  tipo_const,
				  condiciones
		";
		
		$filtro=" tasaciones.pro_id=provincias.pro_id and
				  tasaciones.loc_id=localidades.loc_id and
				  localidades.pro_id=provincias.pro_id and
				  tasaciones.tas_referente=empleados.emp_id and
				  tasaciones.tip_id=tipo_const.tip_id and
				  tasaciones.con_id=condiciones.con_id";
		
		//mostrado desde

		if($desdeMosDia!=""&&$desdeMosMes!=""&&$desdeMosAno!=""){
			$filtro.=" and tasaciones.tas_fecha >= '$desdeMosAno-$desdeMosMes-$desdeMosDia'";
		}
		//mostrado hasta
		if($hastaMosDia!=""&&$hastaMosMes!=""&&$hastaMosAno!=""){
			$filtro.=" and tasaciones.tas_fecha <= '$hastaMosAno-$hastaMosMes-$hastaMosDia'";
		}
		
		if($con_id){
			$filtro.=" and tasaciones.con_id=$con_id";			
		}
		
		
		if($tip_id){
			$filtro.=" and tasaciones.tip_id=$tip_id";			
		}
		
		if($est_can){
			$filtro.=" and tasaciones.estado=$est_can";
		}
		
		if(!$orden){
			$orden="tas_id";		
		}
	
		$limit .= " limit $base,$offset ";
		//echo "select $regs from $tablas where $filtro order by prp_id $limit";
		$consulta = "select distinct $regs from $tablas where $filtro order by $orden $limit";
		$cons=mysql_query($consulta) or die("Consulta 1".mysql_error()."$consulta");
		$consulta2 = "select distinct $regs from $tablas where $filtro";
		$cons2=mysql_query($consulta2) or die("Consulta cantidad".mysql_error());
		echo "	<inmodb> 
					
					<paginacion>
							<offest>$offset</offest>
							<base>$base</base>
							<totalDatos>".mysql_num_rows($cons2)."</totalDatos>
					";
				$j=0;
				for($i=0;$i<(mysql_num_rows($cons2)/$offset);$i++){
					
					echo"<links>";
					
					print "<nro>$i</nro>";
							
							print " <link><![CDATA[pagina($i)]]></link>";
					
					if(($base/$offset)==$i){
						$j=$i;
						print "<sel>1</sel>";
						
					}else{
						print "<sel>0</sel>";
					}
					
					echo"</links>";
				}
				echo "<links>
						";
					if($j==($i-1)){
						echo"<nro></nro>";
					}else{
						echo"<nro>>></nro>";
					}	
					echo"	
						
						<link><![CDATA[pagina(($base+$offset)/$offset)]]></link>
						<sel>0</sel>
					 </links>	
						";
		
		echo"
					</paginacion>
		
					<propiedades>";
		while ($fila=mysql_fetch_array($cons)) {
			echo"
					  <columna>
						<tas_id><![CDATA[$fila[tas_id]]]></tas_id> 
						<tip_desc><![CDATA[$fila[tip_desc]]]></tip_desc>
						<con_desc><![CDATA[$fila[con_desc]]]></con_desc>
						<precio_prop><![CDATA[$$fila[precio_prop]]]></precio_prop>
						<precio_tas><![CDATA[$$fila[precio_tas]]]></precio_tas>
						<precio_inmo><![CDATA[$$fila[precio_inmo]]]></precio_inmo>
						<propietario><![CDATA[$fila[propietario]]]></propietario>
						<prop_tel><![CDATA[$fila[tel_prop]]]></prop_tel>
						<referente><![CDATA[$fila[referente]]]></referente>
						<tas_fecha><![CDATA[$fila[tas_fecha]]]></tas_fecha>
						<precio_transaccion><![CDATA[$$fila[precio_transaccion]]]></precio_transaccion>
						<domicilio><![CDATA[$fila[domicilio]]]></domicilio>							
						<tas_desc><![CDATA[$fila[tas_desc]]]></tas_desc>";
			
				 switch ($fila[estado]){
				 	case 1:
				 		$est="Dada de Alta";
				 		break;
				 	case 2:
				 		$est="Archivada";
				 	break;
				 	case 3:
				 		$est="En Curso";
				 	break;
				 	case 4:
				 		$est="Pendiente";
				 	break;
				 	default:
				 		$est="";
				 		break;
				 }
			
					
			echo"
						<estado><![CDATA[$est]]></estado>
					</columna>
					";
		}
			
		echo "</propiedades>
		
		</inmodb>";
	break;
	case "demandas":
	
	//variable ppal. a la que se le agregan los registros de las demas consultas
		$regs = "
				 demandas.dem_id,
				 demandas.dem_raz,
				 demandas.dem_tel,
				 demandas.dem_mail,
				 demandas.dem_dom,
				 demandas.dem_barr,
				 demandas.dem_desc,
				 dem_pre_min,
				 dem_pre_max,
				 date_format(dem_fecha,'%d-%m-%Y') as dem_fecha,
				 demandas.loc_id,
				 demandas.tip_id,
				 demandas.con_id,
				 provincias.pro_desc
				 		";
		$tablas = "
					demandas,
					provincias
					
				";		
		$filtro = "
				demandas.pro_id=provincias.pro_id  
										
					";
		
		
		if ($dem_dom)
		{
			$filtro .= " and (demandas.dem_dom like '%$dem_dom%' or demandas.dem_barr like '%$dem_dom%')";
		}
		
		if ($dem_barr)
		{
			$filtro .= " and (demandas.dem_dom like '%$dem_barr%' or demandas.dem_barr like '%$dem_barr%')";
		}
		
		if($dem_pre_min){
			$filtro .= " and demandas.dem_pre_min >=$dem_pre_min";
		}
		
		if($dem_pre_max){
			$filtro .= " and demandas.dem_pre_max <=$dem_pre_max";
		}		
		
		if($pro_id){
			$filtro .= " and demandas.pro_id=$pro_id";
		}
		
		
		$locs=$aux_loc_id;
		if(count($locs)>0){
			$filtro.=" and (";
			for($i=0;$i<count($locs);$i++){
				
				if($i!=0){
				$filtro.=" or ";
				}
				$filtro .=" demandas.loc_id like '%x$aux_loc_id[$i]x%'";
			}
			$filtro.=" ) ";
		}

			
		$tips=$aux_tip_id;
		if(count($tips)>0){
			$filtro.=" and (";
			for($i=0;$i<count($tips);$i++){
				
				if($i!=0){
				$filtro.=" or ";
				}
				$filtro .=" demandas.tip_id like '%x$aux_tip_id[$i]x%'";
			}
			$filtro.=" ) ";
			
		}		
		
		$conds=$aux_con_id;
		if(count($conds)>0){
			$filtro.=" and (";
			for($i=0;$i<count($conds);$i++){
				
				if($i!=0){
				$filtro.=" or ";
				}
				$filtro .=" demandas.con_id like '%x$aux_con_id[$i]x%'";
			}
			$filtro.=" ) ";
		}
		
		if(!$orden){
			$orden="dem_id";		
		}
	
		$limit .= " limit $base,$offset ";
		//echo "select $regs from $tablas where $filtro order by prp_id $limit";
		$consulta = "select distinct $regs from $tablas where $filtro order by $orden $limit";
		$cons=mysql_query($consulta) or die("Consulta 1".mysql_error()."$consulta");
		
		$consulta2 = "select distinct $regs from $tablas where $filtro";
		$cons2=mysql_query($consulta2) or die("Consulta cantidad".mysql_error());
		if(!isset($page)) $page = 0;
		
		
		echo "
	<inmodb>
			<paginacion>
				<offest>$offset</offest>
				<base>$base</base>
				<totalDatos>   ".mysql_num_rows($cons2)."</totalDatos>
				<paginaActual>$page</paginaActual>
				<usr_id>$usr_id</usr_id>
			</paginacion>
		<propiedades>";
		while ($fila=mysql_fetch_array($cons)) 
		{
		
			//cadena de localidades
			$cad=split("x",$fila[loc_id]);
			
			if(count($cad)){
				for ($i=0;$i<=count($cad);$i++){
					if($cad[$i]!=""){
						$cons_loc="select loc_desc from localidades where loc_id=$cad[$i]";
						$locs_desc.=mysql_result(mysql_query($cons_loc),0,0)." - ";	
					}	
				}
			}
			//
			$domicilio.="$fila[dem_dom] $fila[dem_barr] [$fila[pro_desc] - $locs_desc]";
			
			
			//cadena tipo_const
			$cad=split("x",$fila[tip_id]);
			
			if(count($cad)){
				for ($i=0;$i<=count($cad);$i++){
					if($cad[$i]!=""){
						$cons_tip="select tip_desc from tipo_const where tip_id=$cad[$i]";
						$tips_desc.=mysql_result(mysql_query($cons_tip),0,0)." - ";	
					}
				}
			}
			//
		
			//cadena condiciones
			$cad=split("x",$fila[con_id]);
			
			if(count($cad)){
				for ($i=0;$i<=count($cad);$i++){
					if($cad[$i]!=""){
						$cons_cond="select con_desc from condiciones where con_id=$cad[$i]";
						$cond_desc.=mysql_result(mysql_query($cons_cond),0,0)." - ";	
					}	
				}
			}
			//
			
			
			echo "
			<columna>
			  	 		<dem_id><![CDATA[$fila[dem_id]]]></dem_id>		
						<dem_fecha><![CDATA[$fila[dem_fecha]]]></dem_fecha>						
						<dem_raz><![CDATA[$fila[dem_raz]]]></dem_raz>
						<dem_tel><![CDATA[$fila[dem_tel]]]></dem_tel>
						<dem_mail><![CDATA[$fila[dem_mail]]]></dem_mail>
						<inmueble><![CDATA[$tips_desc]]></inmueble>
						<condicion><![CDATA[$cond_desc]]></condicion>
						<precio><![CDATA[entre $fila[dem_pre_min] y $fila[dem_pre_max]]]></precio>
						<dem_desc><![CDATA[$fila[dem_desc]]]></dem_desc>
						<dem_dom><![CDATA[$domicilio]]></dem_dom>
										
			</columna>
			";
			$domicilio="";
			$tips_desc="";
			$cond_desc="";
			$locs_desc="";
						
		}
		echo "</propiedades>
		
		</inmodb>";
	
	
	break;
		case "medios":

		$regs = " publicaciones.pub_dia,
				  receptores.med_raz,
				  publicaciones.prp_id,
				  propiedades.prp_dom,
				  condiciones.con_desc,
				  publicaciones.pub_ini,
				  publicaciones.pub_fin,
 				  date_format(publicaciones.pub_ini,'%d-%m-%Y') as pub_ini_c,
 				  date_format(publicaciones.pub_fin,'%d-%m-%Y') as pub_fin_c

				 		";
		$tablas = "	publicaciones,
					receptores,
					propiedades,
					condiciones					
				";		
		$filtro = "
					publicaciones.prp_id=propiedades.prp_id and
					propiedades.con_id=condiciones.con_id and
					receptores.rec_id=publicaciones.dia_id and
					propiedades.usr_id="._USR_ID;
	
		//mostrado desde

		if($desdeMosDia!=""&&$desdeMosMes!=""&&$desdeMosAno!=""){
			$filtro.=" and publicaciones.pub_ini >= '$desdeMosAno-$desdeMosMes-$desdeMosDia'";
		}
		//mostrado hasta
		if($hastaMosDia!=""&&$hastaMosMes!=""&&$hastaMosAno!=""){
			$filtro.=" and publicaciones.pub_fin <= '$hastaMosAno-$hastaMosMes-$hastaMosDia'";
		}
	
		if($prp_id){
			$filtro.=" and propiedades.prp_id=$prp_id";
		}
				
		if($dia_id){
			$filtro.=" and receptores.rec_id=$dia_id";
		}
	
		if(!$orden){
			$orden="med_raz";		
		}
	
		$limit .= " limit $base,$offset ";
		//echo "select $regs from $tablas where $filtro order by prp_id $limit";
		$consulta = "select distinct $regs from $tablas where $filtro order by $orden $limit";
		$cons=mysql_query($consulta) or die("Consulta 1".mysql_error()."$consulta");
		
		$consulta2 = "select distinct $regs from $tablas where $filtro";
		$cons2=mysql_query($consulta2) or die("Consulta cantidad".mysql_error());
		if(!isset($page)) $page = 0;
		
		
		echo "
	<inmodb>
			<paginacion>
				<offest>$offset</offest>
				<base>$base</base>
				<totalDatos>   ".mysql_num_rows($cons2)."</totalDatos>
				<paginaActual>$page</paginaActual>
				<usr_id>$usr_id</usr_id>
			</paginacion>
		<propiedades>";
		while ($fila=mysql_fetch_array($cons)) 
		{
		
			echo "
			<columna>
					
				<pub_ini><![CDATA[$fila[pub_ini_c]]]></pub_ini>
				<pub_fin><![CDATA[$fila[pub_fin_c]]]></pub_fin>
				<med_raz><![CDATA[$fila[med_raz]]]></med_raz>
				<prp_id><![CDATA[$fila[prp_id]]]></prp_id>
				<prp_dom><![CDATA[$fila[prp_dom]]]></prp_dom>
				<con_desc><![CDATA[$fila[con_desc]]]></con_desc>
											
			</columna>
			";
		}
		echo "</propiedades>
		
		</inmodb>";
				
	break;
	default:
		exit();	
	break;
}
?>