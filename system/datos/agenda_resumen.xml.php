<?php 
header("Content-type: application/xml");
	extract($_GET);
	extract ($_POST);
	extract ($_REQUEST);


echo "<?xml version=\"1.0\" encoding=\"iso-8859-1\" ?>";

	include("../php/config.php");		
	
	switch($id)
	{
		case "citas":
			$fecha= date('Y-m-d');
			//print "select empleados.nombre, empleados.apellido, empleados.emp_id, citas.cita_fecha, cita_emp.emp_id from empleados, citas, cita_emp where cita_emp.emp_id=empleados.emp_id and citas.cita_id=cita_emp.cita_id and citas.estado='0' and citas.cita_fecha>=CURRENT_DATE order by empleados.emp_id";
			$res1=mysql_query("select empleados.nombre, empleados.apellido, empleados.emp_id, citas.cita_fecha, cita_emp.emp_id from empleados, citas, cita_emp where cita_emp.emp_id=empleados.emp_id and citas.cita_id=cita_emp.cita_id and citas.estado='0' and citas.cita_fecha>=CURRENT_DATE order by empleados.emp_id");
			echo "<XML>
					<citas>";
			if ($res1){//si la consulta devuelve algun registro, entonces los muestra
				$id="null";
				$i=0;
				while($fila=mysql_fetch_row($res1)){//mientras queden registros, los muestra
					if ($id!=$fila[2]){	//si es un id de empleado diferente al anterior, lo muestra
						$i++;
						$id=$fila[2];
						$consulta_cant=mysql_query("select citas.cita_id from cita_emp, citas where emp_id=$id and citas.cita_id=cita_emp.cita_id and citas.estado='0' and citas.cita_fecha>=CURRENT_DATE " ); //consulta para contar la cantidad de citas
						$cant=mysql_num_rows($consulta_cant);
						print "<item id='$i' cant='$cant'><![CDATA[" . ucfirst($fila[0]) . " " . ucfirst($fila[1]) . "]]></item>";
						$i++;
					}
				}
			}
			else 
			{
				print "<item>$err_citas</item>"; 
			}
			echo "</citas>
			      </XML>";
			
		break;
		case "novedades":
			 $cadena="
						select 
									count(novedades.nov_id),
									nombre,
									apellido 
							from 
									empleados, 
									novedades,
									nov_x_emp 
							where 
									usr_login='$usr_login' and
									empleados.emp_id=nov_x_emp.emp_id and
									novedades.nov_id=nov_x_emp.nov_id and
									nov_x_emp.leida=0
							group by
									nombre	
				";
					$result=mysql_query($cadena);
					if(mysql_num_rows($result)){
						$num=mysql_result($result,0,0);
						$nom=mysql_result($result,0,1);
						$ape=mysql_result($result,0,2);
					}else{

						$cadena="
								select 
											nombre,
											apellido 
									from 
											empleados 
									where 
											usr_login='$usr_login' 
								";
				
						
						$result=mysql_query($cadena);
						$nom=mysql_result($result,0,0);
						$ape=mysql_result($result,0,1);
						$num=220;					
					}
			 // Citas de Alquileres	
			 $cadena="
						select 
									count(novedades.nov_id),
									nombre,
									apellido 
							from 
									empleados, 
									novedades,
									nov_x_emp 
							where 
									usr_login='citas' and
									empleados.emp_id=nov_x_emp.emp_id and
									novedades.nov_id=nov_x_emp.nov_id and
									nov_x_emp.leida=0
							group by
									nombre	
				";
			 
					$result=mysql_query($cadena);
					if(mysql_num_rows($result)){
						$num_alq=mysql_result($result,0,0);
						$nom_alq=mysql_result($result,0,1);
						$ape_alq=mysql_result($result,0,2);
					}else{
							
						$cadena="
								select 
											nombre,
											apellido 
									from 
											empleados 
									where 
											usr_login='citas' 
								";
						$result=mysql_query($cadena);
						$nom_alq=mysql_result($result,0,0);
						$ape_alq=mysql_result($result,0,1);
						$num_alq=0;					
					}	
			// Fin Citas de Alquileres
			// Citas de Ventas
			 $cadena="
						select 
									count(novedades.nov_id),
									nombre,
									apellido 
							from 
									empleados, 
									novedades,
									nov_x_emp 
							where 
									usr_login='citasv' and
									empleados.emp_id=nov_x_emp.emp_id and
									novedades.nov_id=nov_x_emp.nov_id and
									nov_x_emp.leida=0
							group by
									nombre	
				";
					$result=mysql_query($cadena);
					if(mysql_num_rows($result)){
						$num_ventas=mysql_result($result,0,0);
						$nom_ventas=mysql_result($result,0,1);
						$ape_ventas=mysql_result($result,0,2);
					}else{
							
						$cadena="
								select 
											nombre,
											apellido 
									from 
											empleados 
									where 
											usr_login='citasv' 
								";
				
						
						$result=mysql_query($cadena);
						$nom_ventas=mysql_result($result,0,0);
						$ape_ventas=mysql_result($result,0,1);
						$num_ventas=0;					
					}	
				// FIN Citas de Ventas
			 // Citas WEB	
			 $cadena="
						select 
									count(novedades.nov_id),
									nombre,
									apellido 
							from 
									empleados, 
									novedades,
									nov_x_emp 
							where 
									usr_login='citasw' and
									empleados.emp_id=nov_x_emp.emp_id and
									novedades.nov_id=nov_x_emp.nov_id and
									nov_x_emp.leida=0
							group by
									nombre	
				";
			 
					$result=mysql_query($cadena);
					if(mysql_num_rows($result)){
						$num_web=mysql_result($result,0,0);
						$nom_web=mysql_result($result,0,1);
						$ape_web=mysql_result($result,0,2);
					}else{
							
						$cadena="
								select 
											nombre,
											apellido 
									from 
											empleados 
									where 
											usr_login='citasw' 
								";
						$result=mysql_query($cadena);
						$nom_web=mysql_result($result,0,0);
						$ape_web=mysql_result($result,0,1);
						$num_web=0;					
					}	
			// Fin Citas de WEB
				/* Citas de Carteles
			 $cadena="
						select 
									count(novedades.nov_id),
									nombre,
									apellido 
							from 
									empleados, 
									novedades,
									nov_x_emp 
							where 
									usr_login='citasc' and
									empleados.emp_id=nov_x_emp.emp_id and
									novedades.nov_id=nov_x_emp.nov_id and
									nov_x_emp.leida=0
							group by
									nombre	
				";
					$result=mysql_query($cadena);
					if(mysql_num_rows($result)){
						$num_carteles=mysql_result($result,0,0);
						$nom_carteles=mysql_result($result,0,1);
						$ape_carteles=mysql_result($result,0,2);
					}else{
							
						$cadena="
								select 
											nombre,
											apellido 
									from 
											empleados 
									where 
											usr_login='citasc' 
								";
				
						
						$result=mysql_query($cadena);
						$nom_carteles=mysql_result($result,0,0);
						$ape_carteles=mysql_result($result,0,1);
						$num_carteles=0;					
					}	
				// FIN Citas de carteles
				*/
				// Altas Carteles
			 $cadena="
						select 
									count(novedades.nov_id),
									nombre,
									apellido 
							from 
									empleados, 
									novedades,
									nov_x_emp 
							where 
									usr_login='alta' and
									empleados.emp_id=nov_x_emp.emp_id and
									novedades.nov_id=nov_x_emp.nov_id and
									nov_x_emp.leida=0
							group by
									nombre	
				";
					$result=mysql_query($cadena);
					if(mysql_num_rows($result)){
						$num_altas=mysql_result($result,0,0);
						$nom_altas=mysql_result($result,0,1);
						$ape_altas=mysql_result($result,0,2);
					}else{
							
						$cadena="
								select 
											nombre,
											apellido 
									from 
											empleados 
									where 
											usr_login='alta' 
								";
				
						
						$result=mysql_query($cadena);
						$nom_altas=mysql_result($result,0,0);
						$ape_altas=mysql_result($result,0,1);
						$num_altas=0;					
					}	
				// FIN Altas carteles
				// Bajas Carteles
			 $cadena="
						select 
									count(novedades.nov_id),
									nombre,
									apellido 
							from 
									empleados, 
									novedades,
									nov_x_emp 
							where 
									usr_login='baja' and
									empleados.emp_id=nov_x_emp.emp_id and
									novedades.nov_id=nov_x_emp.nov_id and
									nov_x_emp.leida=0
							group by
									nombre	
				";
					$result=mysql_query($cadena);
					if(mysql_num_rows($result)){
						$num_bajas=mysql_result($result,0,0);
						$nom_bajas=mysql_result($result,0,1);
						$ape_bajas=mysql_result($result,0,2);
					}else{
							
						$cadena="
								select 
											nombre,
											apellido 
									from 
											empleados 
									where 
											usr_login='baja' 
								";
				
						
						$result=mysql_query($cadena);
						$nom_bajas=mysql_result($result,0,0);
						$ape_bajas=mysql_result($result,0,1);
						$num_bajas=0;					
					}	
				//FIN Baja carteles
				echo "
							<novedades>
								<item id=\"1\" cant=\"$num\" emp=\"$emp_id\">
								<![CDATA[$nom $ape]]>
								</item>
								<item id=\"2\" cant=\"$num_alq\" emp=\"38\">
								<![CDATA[$nom_alq $ape_alq]]>
								</item>
								<item id=\"3\" cant=\"$num_ventas\" emp=\"39\">
								<![CDATA[$nom_ventas $ape_ventas]]>
								</item>
								<item id=\"4\" cant=\"$num_web\" emp=\"96\">
								<![CDATA[$nom_web $ape_web]]>
								</item>
								<item id=\"5\" cant=\"$num_altas\" emp=\"88\">
								<![CDATA[$nom_altas $ape_altas]]>
								</item>
								<item id=\"6\" cant=\"$num_bajas\" emp=\"89\">
								<![CDATA[$nom_bajas $ape_bajas]]>
								</item>
							</novedades>
						"; /*<item id=\"4\" cant=\"$num_carteles\" emp=\"85\">
								<![CDATA[$nom_carteles $ape_carteles]]>
								</item>
							*/
							
		break;
		case "tasaciones":
			$cadena="
						SELECT count( tasaciones.tas_id ) AS cant, CONCAT( nombre, ' ', apellido ) AS nom, emp_id
						FROM empleados, tasaciones
						WHERE empleados.emp_id = tas_referente and estado=3 and (tas_referente=78 or tas_referente=79 or tas_referente=80)
						GROUP BY tas_referente
				";
			$res=mysql_query($cadena) or die("ERROR al obtener tasaciones");
			echo "<XML><tasaciones>";
			while ($fila=mysql_fetch_array($res))
			{
				$emp_id=$fila[emp_id];
				$nombre=$fila[nom];
				$cant=$fila[cant];
				echo "<item emp_id='$emp_id' cant='$cant'><![CDATA[$nombre]]></item>";
			}
			echo "</tasaciones></XML>";
		break;			
		case "demandas":
			
			$cadena="select count(dem_id) from demandas where DATE_SUB(CURDATE(),INTERVAL 60 DAY) <= dem_fecha AND "; 
			// Casas en venta
			 $fil=" demandas.con_id like '%x1x%' and tip_id like '%x1x%'"; 
 		 	 $cont_casa_v=mysql_result(mysql_query($cadena.$fil),0,0);
			//Casas en alquiler
			 $fil=" demandas.con_id like '%x2x%' and tip_id like '%x1x%'"; 
 		 	 $cont_casa_a=mysql_result(mysql_query($cadena.$fil),0,0);
 		 	 
 		 	 //Deptos en venta
   			 $fil=" demandas.con_id like '%x1x%' and tip_id like '%x5x%'"; 
 		 	 $cont_depto_v=mysql_result(mysql_query($cadena.$fil),0,0);
 		 	 //Deptos en alquiler
			 $fil=" demandas.con_id like '%x2x%' and tip_id like '%x5x%'"; 
 		 	 $cont_depto_a=mysql_result(mysql_query($cadena.$fil),0,0);
		
 		 	 if($PROV_DEFAULT==21){
	 		 	  //Fincas en venta
	   			 $fil=" demandas.con_id like '%x1x%' and tip_id like '%x16x%'"; 
	 		 	 $cont_finca_v=mysql_result(mysql_query($cadena.$fil),0,0);
	 		 	 //Fincas en alquiler
				 $fil=" demandas.con_id like '%x2x%' and tip_id like '%x16x%'"; 
	 		 	 $cont_finca_a=mysql_result(mysql_query($cadena.$fil),0,0);
 		 		 $tip_d="Fincas";
 		 	 }else{
 		 	 	 //Chalets en venta
	   			 $fil=" demandas.con_id like '%x1x%' and tip_id like '%x29x%'"; 
	 		 	 $cont_finca_v=mysql_result(mysql_query($cadena.$fil),0,0);
	 		 	 //Fincas en alquiler
				 $fil=" demandas.con_id like '%x2x%' and tip_id like '%x29x%'"; 
	 		 	 $cont_finca_a=mysql_result(mysql_query($cadena.$fil),0,0);
	 		 	 $tip_d="Chalets";
 		 	 }
 		 	 
			
 		 	 
 		 	 
 		 	 //Lotes en venta
   			 $fil=" demandas.con_id like '%x1x%' and tip_id like '%x6x%'"; 
 		 	 $cont_lote_v=mysql_result(mysql_query($cadena.$fil),0,0);
 		 	 //Lotes en alquiler
			 $fil=" demandas.con_id like '%x2x%' and tip_id like '%x6x%'"; 
 		 	 $cont_lote_a=mysql_result(mysql_query($cadena.$fil),0,0);
 		 	 
 		 	  //Otros en venta
   			 $fil=" demandas.con_id like '%x1x%' and 
					!(demandas.tip_id like '%x1x%') and 
					!(demandas.tip_id like '%x5x%') and 
					!(demandas.tip_id like '%x6x%') and 
					!(demandas.tip_id like '%x16x%')
   			 		"; 
   			 $cadena.$fil;
   			 
   			 $cont_otro_v=mysql_result(mysql_query($cadena.$fil),0,0);
 		 	 //Otros en alquiler
			$fil=" demandas.con_id like '%x2x%' and 
					!(demandas.tip_id like '%x1x%') and 
					!(demandas.tip_id like '%x5x%') and 
					!(demandas.tip_id like '%x6x%') and 
					!(demandas.tip_id like '%x16x%')
   			 		";
					
 		 	 $cont_otro_a=mysql_result(mysql_query($cadena.$fil),0,0);
 		 	
			print "<XML>
						<demandas>
								<item cant1='$cont_casa_v' cant2='$cont_casa_a' tip='1' otr='0'><![CDATA[Casas]]></item>
								<item cant1='$cont_depto_v' cant2='$cont_depto_a' tip='5' otr='0'><![CDATA[Deptos]]></item>
								<item cant1='$cont_finca_v' cant2='$cont_finca_a' tip='16' otr='0'><![CDATA[$tip_d]]></item>
								<item cant1='$cont_lote_v' cant2='$cont_lote_a' tip='6' otr='0'><![CDATA[Lotes]]></item>
								<item cant1='$cont_otro_v' cant2='$cont_otro_a' tip='0' otr='1'><![CDATA[Otros]]></item>
						</demandas>
					</XML>";
			
		break;
		case "varios":
			if (isset($us_id))
			{
				$usr_id=$us_id;
			}
			echo "<XML>";
			$cadena="
						select 
								*
						from 
							tipo_const
			";
			$res=mysql_query($cadena) or die("ERROR al obtener tipo_const");
			echo "<varios>";
			while ($fila=mysql_fetch_array($res))
			{
				$tip_id=$fila[tip_id];
				$tip_desc=$fila[tip_desc];
				$alquiladas = $vendidas = $alquiler =$venta=0;
				$con_id=$fila[con_id];
				$con_desc=$fila[con_desc];
				$cons_prop="SELECT count(distinct(prp_id)) as cant,prp_mostrar,con_id FROM propiedades WHERE tip_id=$tip_id and con_id=1 and usr_id=$usr_id and prp_mostrar=1 GROUP BY con_id";	
				$res3=mysql_query($cons_prop) or die("ERROR 1 al obtener propiedades<br>$cons_prop");
				if (mysql_num_rows($res3))
				{
					$venta=mysql_result($res3,0,0);
					$tot_venta+=$venta;
				}
				$cons_prop2="SELECT count(distinct(prp_id)) as cant,prp_mostrar,con_id FROM propiedades WHERE tip_id=$tip_id and con_id=2 and usr_id=$usr_id and prp_mostrar=1 GROUP BY con_id";	
				$res4=mysql_query($cons_prop2) or die("ERROR 2 al obtener propiedades<br>$cons_prop2");
				if (mysql_num_rows($res4))
				{
					$alquiler=mysql_result($res4,0,0);
					$tot_alquiler+=$alquiler;
				}
				$cons_prop3="SELECT count(distinct(prp_id)) as cant,prp_mostrar,con_id FROM propiedades WHERE tip_id=$tip_id and con_id=1 and usr_id=$usr_id and prp_mostrar=2 GROUP BY con_id";	
				$res5=mysql_query($cons_prop3) or die("ERROR 3 al obtener propiedades<br>$cons_prop3");
				if (mysql_num_rows($res5))
				{
					$vendidas=mysql_result($res5,0,0);
					$tot_vendidas+=$vendidas;
				}
				$cons_prop4="SELECT count(distinct(prp_id)) as cant,prp_mostrar,con_id FROM propiedades WHERE tip_id=$tip_id and con_id=2 and usr_id=$usr_id and prp_mostrar=2 GROUP BY con_id";	
				$res6=mysql_query($cons_prop4) or die("ERROR 4 al obtener propiedades<br>$cons_prop4");
				if (mysql_num_rows($res6))
				{
					$alquiladas=mysql_result($res6,0,0);
					$tot_alquiladas+=$alquiladas;
				}
				echo "<item venta='$venta' alquiler='$alquiler' vendidas='$vendidas' alquiladas='$alquiladas'>
						<desc><![CDATA[$tip_desc]]></desc>
					</item>";
			}
			echo "
				<tot_venta><![CDATA[$tot_venta]]></tot_venta>	
				<tot_alquiler><![CDATA[$tot_alquiler]]></tot_alquiler>	
				<tot_vendidas><![CDATA[$tip_vendidas]]></tot_vendidas>	
				<tot_alquiladas><![CDATA[$tip_alquiladas]]></tot_alquiladas>";
			echo "</varios>";			
			echo "</XML>";
		break;
		default:
			$fecha= date('Y-m-d');
			//print "select empleados.nombre, empleados.apellido, empleados.emp_id, citas.cita_fecha, cita_emp.emp_id, empleados.sexo from empleados, citas, cita_emp where cita_emp.emp_id=empleados.emp_id and citas.cita_id=cita_emp.cita_id and citas.cancelada='0' and citas.cita_fecha>=CURRENT_DATE order by empleados.emp_id";
			$res1=mysql_query("select empleados.nombre, empleados.apellido, empleados.emp_id, citas.cita_fecha, cita_emp.emp_id from empleados, citas, cita_emp where cita_emp.emp_id=empleados.emp_id and citas.cita_id=cita_emp.cita_id and citas.estado='0' and citas.cita_fecha>=CURRENT_DATE order by empleados.emp_id");
			echo "<XML>
					<citas>";
			if ($res1){//si la consulta devuelve algun registro, entonces los muestra
				$id="null";
				$i=0;
				while($fila=mysql_fetch_row($res1)){//mientras queden registros, los muestra
					if ($id!=$fila[2]){	//si es un id de empleado diferente al anterior, lo muestra
						$i++;
						$id=$fila[2];
						$consulta_cant=mysql_query("select citas.cita_id from cita_emp, citas where emp_id=$id and citas.cita_id=cita_emp.cita_id and citas.estado='0' and citas.cita_fecha>=CURRENT_DATE " ); //consulta para contar la cantidad de citas
						$cant=mysql_num_rows($consulta_cant);
						print "<item id='$i' cant='$cant' emp_id='$id'><![CDATA[" . ucfirst($fila[0]) . " " . ucfirst($fila[1]) . "]]></item>";
						$i++;
					}
				}
			}
			else 
			{
				print "<item>$err_citas</item>"; 
			}
			echo "</citas>
			      ";
				 $cadena="
						select 
									count(novedades.nov_id),
									nombre,
									apellido,
									empleados.emp_id 
							from 
									empleados, 
									novedades,
									nov_x_emp 
							where 
									usr_login='$usr_login' and
									empleados.emp_id=nov_x_emp.emp_id and
									novedades.nov_id=nov_x_emp.nov_id and
									nov_x_emp.leida=0
							group by
									nombre	
				";
				
				$result=mysql_query($cadena);
					if(mysql_num_rows($result)){
						$num=mysql_result($result,0,0);
						$nom=mysql_result($result,0,1);
						$ape=mysql_result($result,0,2);
						$emp_id=mysql_result($result,0,3);
					}else{
							
						$cadena="
								select 
											nombre,
											apellido 
									from 
											empleados 
									where 
											usr_login='$usr_login' 
								";
				
						
						$result=mysql_query($cadena);
						$nom=mysql_result($result,0,0);
						$ape=mysql_result($result,0,1);
						$num=0;					
					}	
				



			 // Citas de Alquileres	
			 $cadena="
						select 
									count(novedades.nov_id),
									nombre,
									apellido 
							from 
									empleados, 
									novedades,
									nov_x_emp 
							where 
									usr_login='citas' and
									empleados.emp_id=nov_x_emp.emp_id and
									novedades.nov_id=nov_x_emp.nov_id and
									nov_x_emp.leida=0
							group by
									nombre	
				";
				$result=mysql_query($cadena);

					if(mysql_num_rows($result)){
						$num_alq=mysql_result($result,0,0);
						$nom_alq=mysql_result($result,0,1);
						$ape_alq=mysql_result($result,0,2);
					}else{
							
						$cadena="
								select 
											nombre,
											apellido 
									from 
											empleados 
									where 
											usr_login='citas' 
								";
				
						
						$result=mysql_query($cadena);
						$nom_alq=mysql_result($result,0,0);
						$ape_alq=mysql_result($result,0,1);
						$num_alq=0;					
					}	
			// Fin Citas de Alquileres
			
			// Citas de Ventas
			 		$cadena="
						select 
									count(novedades.nov_id),
									nombre,
									apellido 
							from 
									empleados, 
									novedades,
									nov_x_emp 
							where 
									usr_login='citasv' and
									empleados.emp_id=nov_x_emp.emp_id and
									novedades.nov_id=nov_x_emp.nov_id and
									nov_x_emp.leida=0
							group by
									nombre	
				";
								$result=mysql_query($cadena);

					if(mysql_num_rows($result)){
						$num_ventas=mysql_result($result,0,0);
						$nom_ventas=mysql_result($result,0,1);
						$ape_ventas=mysql_result($result,0,2);
					}else{
							
						$cadena="
								select 
											nombre,
											apellido 
									from 
											empleados 
									where 
											usr_login='citasv' 
								";
				
						
						$result=mysql_query($cadena);
						$nom_ventas=mysql_result($result,0,0);
						$ape_ventas=mysql_result($result,0,1);
						$num_ventas=0;					
					}	
				// FIN Citas de Ventas
				
			 // Citas WEB	
			 $cadena="
						select 
									count(novedades.nov_id),
									nombre,
									apellido 
							from 
									empleados, 
									novedades,
									nov_x_emp 
							where 
									usr_login='citasw' and
									empleados.emp_id=nov_x_emp.emp_id and
									novedades.nov_id=nov_x_emp.nov_id and
									nov_x_emp.leida=0
							group by
									nombre	
				";
			 
					$result=mysql_query($cadena);
					if(mysql_num_rows($result)){
						$num_web=mysql_result($result,0,0);
						$nom_web=mysql_result($result,0,1);
						$ape_web=mysql_result($result,0,2);
					}else{
							
						$cadena="
								select 
											nombre,
											apellido 
									from 
											empleados 
									where 
											usr_login='citasw' 
								";
						$result=mysql_query($cadena);
						$nom_web=mysql_result($result,0,0);
						$ape_web=mysql_result($result,0,1);
						$num_web=0;					
					}	
			// Fin Citas de WEB


				/* Citas de Carteles
			 		$cadena="
						select 
									count(novedades.nov_id),
									nombre,
									apellido 
							from 
									empleados, 
									novedades,
									nov_x_emp 
							where 
									usr_login='citasc' and
									empleados.emp_id=nov_x_emp.emp_id and
									novedades.nov_id=nov_x_emp.nov_id and
									nov_x_emp.leida=0
							group by
									nombre	
				";
								$result=mysql_query($cadena);

					if(mysql_num_rows($result)){
						$num_carteles=mysql_result($result,0,0);
						$nom_carteles=mysql_result($result,0,1);
						$ape_carteles=mysql_result($result,0,2);
					}else{
							
						$cadena="
								select 
											nombre,
											apellido 
									from 
											empleados 
									where 
											usr_login='citasc' 
								";
				
						
						$result=mysql_query($cadena);
						$nom_carteles=mysql_result($result,0,0);
						$ape_carteles=mysql_result($result,0,1);
						$num_carteles=0;					
					}	
				// FIN Citas de Carteles
				*/
				// Altas Carteles
			 $cadena="
						select 
									count(novedades.nov_id),
									nombre,
									apellido 
							from 
									empleados, 
									novedades,
									nov_x_emp 
							where 
									usr_login='alta' and
									empleados.emp_id=nov_x_emp.emp_id and
									novedades.nov_id=nov_x_emp.nov_id and
									nov_x_emp.leida=0
							group by
									nombre	
				";
					$result=mysql_query($cadena);
					if(mysql_num_rows($result)){
						$num_altas=mysql_result($result,0,0);
						$nom_altas=mysql_result($result,0,1);
						$ape_altas=mysql_result($result,0,2);
					}else{
							
						$cadena="
								select 
											nombre,
											apellido 
									from 
											empleados 
									where 
											usr_login='alta' 
								";
				
						
						$result=mysql_query($cadena);
						$nom_altas=mysql_result($result,0,0);
						$ape_altas=mysql_result($result,0,1);
						$num_altas=0;					
					}	
				// FIN Altas carteles
				// Bajas Carteles
			 $cadena="
						select 
									count(novedades.nov_id),
									nombre,
									apellido 
							from 
									empleados, 
									novedades,
									nov_x_emp 
							where 
									usr_login='baja' and
									empleados.emp_id=nov_x_emp.emp_id and
									novedades.nov_id=nov_x_emp.nov_id and
									nov_x_emp.leida=0
							group by
									nombre	
				";
					$result=mysql_query($cadena);
					if(mysql_num_rows($result)){
						$num_bajas=mysql_result($result,0,0);
						$nom_bajas=mysql_result($result,0,1);
						$ape_bajas=mysql_result($result,0,2);
					}else{
							
						$cadena="
								select 
											nombre,
											apellido 
									from 
											empleados 
									where 
											usr_login='baja' 
								";
				
						
						$result=mysql_query($cadena);
						$nom_bajas=mysql_result($result,0,0);
						$ape_bajas=mysql_result($result,0,1);
						$num_bajas=0;					
					}	
				//FIN Baja carteles
				echo "
							<novedades>
								<item id=\"1\" cant=\"$num\" emp=\"$emp_id\">
								<![CDATA[$nom $ape]]>
								</item>
								<item id=\"2\" cant=\"$num_alq\" emp=\"38\">
								<![CDATA[$nom_alq $ape_alq]]>
								</item>
								<item id=\"3\" cant=\"$num_ventas\" emp=\"39\">
								<![CDATA[$nom_ventas $ape_ventas]]>
								</item>
								<item id=\"4\" cant=\"$num_web\" emp=\"96\">
								<![CDATA[$nom_web $ape_web]]>
								</item>
								<item id=\"5\" cant=\"$num_altas\" emp=\"88\">
								<![CDATA[$nom_altas $ape_altas]]>
								</item>
								<item id=\"6\" cant=\"$num_bajas\" emp=\"89\">
								<![CDATA[$nom_bajas $ape_bajas]]>
								</item>
							</novedades>
							";
									/*<item id=\"4\" cant=\"$num_carteles\" emp=\"85\">
								<![CDATA[$nom_carteles $ape_carteles]]>
								</item>*/

				/*
				echo "
					
							<novedades>
								<item id=\"1\" cant=\"$num\" emp_id=\"$emp_id\">
								<![CDATA[$nom $ape]]>
								</item>
							</novedades>";
				*/
			
			$cadena="select count(dem_id) from demandas where DATE_SUB(CURDATE(),INTERVAL 60 DAY) <= dem_fecha AND "; 
			// Casas en venta
			 $fil=" demandas.con_id like '%x1x%' and tip_id like '%x1x%'"; 
 		 	 $cont_casa_v=mysql_result(mysql_query($cadena.$fil),0,0);
			//Casas en alquiler
			 $fil=" demandas.con_id like '%x2x%' and tip_id like '%x1x%'"; 
 		 	 $cont_casa_a=mysql_result(mysql_query($cadena.$fil),0,0);
 		 	 
 		 	 //Deptos en venta
   			 $fil=" demandas.con_id like '%x1x%' and tip_id like '%x5x%'"; 
 		 	 $cont_depto_v=mysql_result(mysql_query($cadena.$fil),0,0);
 		 	 //Deptos en alquiler
			 $fil=" demandas.con_id like '%x2x%' and tip_id like '%x5x%'"; 
 		 	 $cont_depto_a=mysql_result(mysql_query($cadena.$fil),0,0);
		
			 if($PROV_DEFAULT==21){
	 		 	  //Fincas en venta
	   			 $fil=" demandas.con_id like '%x1x%' and tip_id like '%x16x%'"; 
	 		 	 $cont_finca_v=mysql_result(mysql_query($cadena.$fil),0,0);
	 		 	 //Fincas en alquiler
				 $fil=" demandas.con_id like '%x2x%' and tip_id like '%x16x%'"; 
	 		 	 $cont_finca_a=mysql_result(mysql_query($cadena.$fil),0,0);
 		 	 	 $tip_d="Fincas";
 		 	 }else{
 		 	 	 //Chalets en venta
	   			 $fil=" demandas.con_id like '%x1x%' and tip_id like '%x29x%'"; 
	 		 	 $cont_finca_v=mysql_result(mysql_query($cadena.$fil),0,0);
	 		 	 //Fincas en alquiler
				 $fil=" demandas.con_id like '%x2x%' and tip_id like '%x29x%'"; 
	 		 	 $cont_finca_a=mysql_result(mysql_query($cadena.$fil),0,0);
	 		 	 $tip_d="Chalets";
 		 	 }
 		 	 
 		 	 
 		 	 //Lotes en venta
   			 $fil=" demandas.con_id like '%x1x%' and tip_id like '%x6x%'"; 
 		 	 $cont_lote_v=mysql_result(mysql_query($cadena.$fil),0,0);
 		 	 //Lotes en alquiler
			 $fil=" demandas.con_id like '%x2x%' and tip_id like '%x6x%'"; 
 		 	 $cont_lote_a=mysql_result(mysql_query($cadena.$fil),0,0);
 		 	 
 		 	  //Otros en venta
   			 $fil=" demandas.con_id like '%x1x%' and 
					!(demandas.tip_id like '%x1x%') and 
					!(demandas.tip_id like '%x5x%') and 
					!(demandas.tip_id like '%x6x%') and 
					!(demandas.tip_id like '%x16x%')
   			 		"; 
   			 
   			 $cont_otro_v=mysql_result(mysql_query($cadena.$fil),0,0);
 		 	 //Otros en alquiler
			$fil=" demandas.con_id like '%x2x%' and 
					!(demandas.tip_id like '%x1x%') and 
					!(demandas.tip_id like '%x5x%') and 
					!(demandas.tip_id like '%x6x%') and 
					!(demandas.tip_id like '%x16x%')
   			 		"; 
 		 	 $cont_otro_a=mysql_result(mysql_query($cadena.$fil),0,0);
			
			print "
						<demandas>
								<item cant1='$cont_casa_v' cant2='$cont_casa_a' tip='1' otr='0'><![CDATA[Casas]]></item>
								<item cant1='$cont_depto_v' cant2='$cont_depto_a' tip='5' otr='0'><![CDATA[Deptos]]></item>
								<item cant1='$cont_finca_v' cant2='$cont_finca_a' tip='16' otr='0'><![CDATA[$tip_d]]></item>
									<item cant1='$cont_lote_v' cant2='$cont_lote_a' tip='6' otr='0'><![CDATA[Lotes]]></item>
								<item cant1='$cont_otro_v' cant2='$cont_otro_a' tip='0' otr='1'><![CDATA[Otros]]></item>
						</demandas>
					";
				
			$cadena="
						SELECT count( tasaciones.tas_id ) AS cant, CONCAT( nombre, ' ', apellido ) AS nom, emp_id
						FROM empleados, tasaciones
						WHERE empleados.emp_id = tas_referente and estado=3 AND (tas_referente=78 OR tas_referente=79 OR tas_referente=80)
						GROUP BY tas_referente
				";
			$res=mysql_query($cadena) or die("ERROR al obtener tasaciones");
			echo "<tasaciones>";
			while ($fila=mysql_fetch_array($res))
			{
				$emp_id=$fila[emp_id];
				$nombre=$fila[nom];
				$cant=$fila[cant];
				echo "<item emp_id='$emp_id' cant='$cant'><![CDATA[$nombre]]></item>";
			}
			echo "</tasaciones>";
			$cadena="
						select 
								*
						from 
							tipo_const
			";
			$res=mysql_query($cadena) or die("ERROR al obtener tipo_const");
			echo "<varios>";
			while ($fila=mysql_fetch_array($res))
			{
				$tip_id=$fila[tip_id];
				$tip_desc=$fila[tip_desc];
				$alquiladas = $vendidas = $alquiler =$venta=0;
				$con_id=$fila[con_id];
				$con_desc=$fila[con_desc];
				$cons_prop="SELECT count(distinct(prp_id)) as cant,prp_mostrar,con_id FROM propiedades WHERE tip_id=$tip_id and con_id=1 and usr_id=$usr_id and prp_mostrar=1 GROUP BY con_id";	
				$res3=mysql_query($cons_prop) or die("ERROR al obtener propiedades 1<br>$cons_prop");
				if (mysql_num_rows($res3))
				{
					$venta=mysql_result($res3,0,0);
					$tot_venta+=$venta;
				}
				$cons_prop2="SELECT count(distinct(prp_id)) as cant,prp_mostrar,con_id FROM propiedades WHERE tip_id=$tip_id and con_id=2 and usr_id=$usr_id and prp_mostrar=1 GROUP BY con_id";	
				$res4=mysql_query($cons_prop2) or die("ERROR al obtener propiedades 2<br>$cons_prop2");
				if (mysql_num_rows($res4))
				{
					$alquiler=mysql_result($res4,0,0);
					$tot_alquiler+=$alquiler;
				}
				$cons_prop3="SELECT count(distinct(prp_id)) as cant,prp_mostrar,con_id FROM propiedades WHERE tip_id=$tip_id and con_id=1 and usr_id=$usr_id and prp_mostrar=2 GROUP BY con_id";	
				$res5=mysql_query($cons_prop3) or die("ERROR al obtener propiedades 3<br>$cons_prop3");
				if (mysql_num_rows($res5))
				{
					$vendidas=mysql_result($res5,0,0);
					$tot_vendidas+=$vendidas;
				}
				$cons_prop4="SELECT count(distinct(prp_id)) as cant,prp_mostrar,con_id FROM propiedades WHERE tip_id=$tip_id and con_id=2 and usr_id=$usr_id and prp_mostrar=2 GROUP BY con_id";	
				$res6=mysql_query($cons_prop4) or die("ERROR al obtener propiedades 4<br>$cons_prop4");
				if (mysql_num_rows($res6))
				{
					$alquiladas=mysql_result($res6,0,0);
					$tot_alquiladas+=$alquiladas;
				}
				echo "<item venta='$venta' alquiler='$alquiler' vendidas='$vendidas' alquiladas='$alquiladas'>
						<desc><![CDATA[$tip_desc]]></desc>
					</item>";
			}
			echo "
				<tot_venta><![CDATA[$tot_venta]]></tot_venta>	
				<tot_alquiler><![CDATA[$tot_alquiler]]></tot_alquiler>	
				<tot_vendidas><![CDATA[$tip_vendidas]]></tot_vendidas>	
				<tot_alquiladas><![CDATA[$tip_alquiladas]]></tot_alquiladas>";
			echo "</varios>";			
			echo"
				</XML>	
			";

		break;
	}
?>				
