<?php 
	header("Content-type: application/xml");
	extract ($_GET);
	extract ($_REQUEST);
	include("../php/config.php");	
	$xml=1;
	echo "<?xml version=\"1.0\" encoding=\"iso-8859-1\" ?>";
	//Verifico que exista la propiedad
//	$existe_propiedad=mysql_query("SELECT fotos FROM propiedades WHERE prp_id=$prp_id AND usr_id=$usr_id") or die("No se pudo recuperar el tipo de foto");	
	// Si es una modificacion recuperamos los datos de la propiedad
	if($mod_tip=="edit")
	{
		// Hay que ver si tiene fotos en -1
		$rs_ficha_nueva=@mysql_query("SELECT fotos FROM propiedades WHERE prp_id=$prp_id AND usr_id=$usr_id") or die("No se pudo recuperar el tipo de foto");
		$ficha_nueva=@mysql_result($rs_ficha_nueva,0,0);
			if ($ficha_nueva!=-1)
			{ //si ES una foto NUEVA
				$foto_nueva=1;
				$cons="select 
					propiedades.pro_id,
					propiedades.loc_id,
					propiedades.pai_id,
					propiedades.prp_bar,
					propiedades.prp_dom,
					propiedades.tip_id,
					propiedades.con_id,
					propiedades.ori_id,
					propiedades.prp_pre,
					propiedades.prp_desc,
					propiedades.prp_nota,
					propiedades.prp_pub,
					propiedades.prp_pre_dol,
					prp_llave,
					prp_cartel,
					prp_referente,
					prp_tas,
					prp_aut,
					prp_mostrar,
					propiedades.pre_inmo,
					propiedades.pre_prop,
					propiedades.pre_trans,
					propiedades.prp_insc_dom,
					propiedades.publica,
					prp_servicios,
					bar_priv_id,
					prp_vip,
					fotos,
					mos_por_1,
					mos_por_2,
					mos_por_3,
					prp_anonimo
				from 
					propiedades
				where	
					propiedades.prp_id=$prp_id and
					propiedades.usr_id=$usr_id
				";
			}
			else
			{
				$cons="select 
						propiedades.pro_id,
						propiedades.loc_id,
						propiedades.pai_id,
						propiedades.prp_bar,
						propiedades.prp_dom,
						propiedades.tip_id,
						propiedades.con_id,
						propiedades.ori_id,
						propiedades.prp_pre,
						propiedades.prp_desc,
						propiedades.prp_nota,
						foto1.fo1_enl,
						foto2.fo2_enl,
						foto3.fo3_enl,
						foto4.fo4_enl,
						propiedades.prp_pub,
						propiedades.prp_pre_dol,
						prp_llave,
						prp_cartel,
						prp_referente,
						prp_tas,
						prp_aut,
						prp_mostrar,
						propiedades.pre_inmo,
						propiedades.pre_prop,
						propiedades.pre_trans,
						propiedades.prp_insc_dom,
						propiedades.publica,
						prp_servicios,
						bar_priv_id,
						prp_vip,
						fotos,
						foto5.fo5_enl,
						foto6.fo6_enl,
						mos_por_1,
						mos_por_2,
						mos_por_3,
						prp_anonimo
					from 
						propiedades,
						foto1,
						foto2,
						foto3,
						foto4,
						foto5,
						foto6
					where	
						propiedades.prp_id=$prp_id and
						propiedades.usr_id=$usr_id and
						propiedades.fo1_id=foto1.fo1_id and
						(propiedades.usr_id=foto1.fo1_usr or foto1.fo1_usr=0) and
						propiedades.fo2_id=foto2.fo2_id and
						(propiedades.usr_id=foto2.fo2_usr or foto2.fo2_usr=0) and
						propiedades.fo3_id=foto3.fo3_id and
						(propiedades.usr_id=foto3.fo3_usr or foto3.fo3_usr=0) and
						propiedades.fo4_id=foto4.fo4_id and
						(propiedades.usr_id=foto4.fo4_usr or foto4.fo4_usr=0) and
						propiedades.fo5_id=foto5.fo5_id and
						(propiedades.usr_id=foto5.fo5_usr or foto5.fo5_usr=0) and
						propiedades.fo6_id=foto6.fo6_id and
						(propiedades.usr_id=foto6.fo6_usr or foto6.fo6_usr=0)
					";
			}
			$cons_propietario="select 
								   propietarios.prop_id,
								   propietarios.prop_nombre,
								   propietarios.prop_apellido,
								   propietarios.prop_tel,
								   propietarios.prop_dom,
								   propietarios.prop_mail,
								   propietarios.prop_nota 
			   					from 
							   	   propietarios,
								   propiedades
							    where 
					   		   	   propiedades.usr_id=$usr_id and
								   propiedades.prop_id=propietarios.prop_id and
								   propiedades.prp_id=$prp_id
			";
			$propietarios=mysql_query($cons_propietario) or die("no se muestra el propietario");			   
			$cons_prop=mysql_query($cons) or die ("No se puede mostrar el inmueble".mysql_error());
			$cons_prp=mysql_fetch_array($cons_prop);
			//Si Existe La Propiedad
			if (mysql_num_rows($cons_prop)){
				//var_dump($cons_prp);
				$pro_id=$cons_prp[pro_id];
				$loc_id=$cons_prp[loc_id];
				$prp_bar=stripslashes($cons_prp[prp_bar]);
				$prp_dom=stripslashes($cons_prp[prp_dom]);
				$tip_id=$cons_prp[tip_id];
				$con_id=$cons_prp[con_id];
				$ori_id=$cons_prp[ori_id];
				$prp_pre=$cons_prp[prp_pre];
				$prp_desc=stripslashes($cons_prp[prp_desc]);
				$prp_nota=stripslashes($cons_prp[prp_nota]);
				$prp_pub=stripslashes($cons_prp[prp_pub]);
				$prp_pre_dol=$cons_prp[prp_pre_dol];
				$prp_llave=$cons_prp[prp_llave];
				$prp_cartel=($cons_prp[prp_cartel]==1)?"SI":"NO";
				$emp_id=$cons_prp[prp_referente];
				$prp_tas=$cons_prp[prp_tas];
				$prp_aut=$cons_prp[prp_aut];
				$prp_mostrar=$cons_prp[prp_mostrar];
				$precio_inmo=$cons_prp[pre_inmo];
				$precio_prop=$cons_prp[pre_prop];
				$precio_trans=$cons_prp[pre_trans];
				$prp_insc_dom=$cons_prp[prp_insc_dom];
				$prp_publica=$cons_prp[publica];
				$prp_servicios=stripslashes($cons_prp[prp_servicios]);
				$bar_id=$cons_prp[bar_priv_id];
				$prp_vip=$cons_prp[prp_vip];
				$cantidad_fotos=$cons_prp[fotos];
				$pai_id=$cons_prp[pai_id];
				$mos_por_1=$cons_prp[mos_por_1];
				$mos_por_2=$cons_prp[mos_por_2];
				$mos_por_3=$cons_prp[mos_por_3];
				$prp_anonimo=$cons_prp[prp_anonimo];
				if(mysql_num_rows($propietarios))
				{
					$propietarios=mysql_fetch_row($propietarios); 
					$prop_nombre=$propietarios[1];
					$prop_apellido=$propietarios[2];
					$prop_tel=$propietarios[3];
					$prop_dom=$propietarios[4];
					$prop_mail=$propietarios[5];
					$prop_nota=$propietarios[6];
					$prop_id=$propietarios[0];
				}
				if ($foto_nueva)
				{
					$rs_fotos=mysql_query("SELECT * FROM FOTOS WHERE prp_id=$prp_id and usr_id=$usr_id");
					if (mysql_num_rows($rs_fotos))
					{
						while ($fila=mysql_fetch_array($rs_fotos)) 
						{
							$enlfoto="fo".$fila[fo_nro]."_enl";
							$descfoto="fo".$fila[fo_nro]."_desc";
							$$enlfoto=$fila[fo_enl];
							$$descfoto=stripslashes($fila[fo_desc]);
						}
					}
				}
				else 
				{
					$fo1_enl=$cons_prp[fo1_enl];
					$fo2_enl=$cons_prp[fo2_enl];
					$fo3_enl=$cons_prp[fo3_enl];
					$fo4_enl=$cons_prp[fo4_enl];
					$fo5_enl=$cons_prp[fo5_enl];
					$fo6_enl=$cons_prp[fo6_enl];
				}
			
			echo "
		    <XMLTEXTO>
			<datos>
				<paises>";
						$regs=" pai_id,pai_desc ";
						$tablas=" pais ";
						if(!$pai_id)
							$pai_id=$PAIS_DEFAULT;
						$xtras=" order by pai_desc ASC";						
					include("../"._FILE_SCRIPT_PHP_SELECT);
						$regs="";
		                $tablas="";
		                $id="";
		                $xtras="";
		                echo "<selected>$pai_id</selected>";
		                echo "</paises>
					
		            <provincias>";
			 			$regs=" pro_id,pro_desc ";
						$tablas=" provincias ";
						$filtro=" pai_id=$pai_id";
						if(!$pro_id)
							$pro_id=$PROV_DEFAULT;
						$xtras=" order by pro_desc ASC";						
					include("../"._FILE_SCRIPT_PHP_SELECT);
						$regs="";
		                $tablas="";
		                $id="";
		                $xtras="";
		                echo "<selected>$pro_id</selected>";
					
				echo "
				</provincias>
				<localidades>";
				
						$regs=" distinct loc_id,loc_desc ";
						$tablas=" localidades,provincias ";
						$filtro=" localidades.pro_id=$pro_id ";
						$xtras=" order by loc_desc ASC";
					include("../"._FILE_SCRIPT_PHP_SELECT);
						$regs="";
		                $tablas="";
		                $id="";
		                $filtro="";
		                $xtras="";
		                echo "<selected>$loc_id</selected>";
		
		           echo"
				</localidades>
				<tipoCons>";
				
						$regs=" tip_id,tip_desc ";
						$tablas=" tipo_const ";
						$xtras=" order by tip_desc ASC";
					include("../"._FILE_SCRIPT_PHP_SELECT);
						$regs="";
		                $tablas="";
		                $id="";
		                $xtras="";
		                echo "<selected>$tip_id</selected>";
		
		           echo"
				</tipoCons>
				<tipoCond>";
				
						$regs=" con_id,con_desc ";
						$tablas=" condiciones ";
						//$id=$con_id;
						$xtras=" order by con_desc ASC";
					include("../"._FILE_SCRIPT_PHP_SELECT);
						$regs="";
		                $tablas="";
		                //$id="";
		                $xtras="";
		                echo "<selected>$con_id</selected>";
		
		           echo"
				</tipoCond>
				<orientacion>";
				
						$regs=" ori_id,ori_desc ";
						$tablas=" orientacion ";
						//$id=$ori_id;
						$xtras=" order by ori_desc ASC";
					include("../"._FILE_SCRIPT_PHP_SELECT);
						$regs="";
		                $tablas="";
		                //$id="";
		                $xtras="";
		                echo "<selected>$ori_id</selected>";
		
		           echo"
				</orientacion>
				
				<bar_priv>";
				
						$regs=" bar_id,bar_denom ";
						$tablas=" bar_priv ";
						$xtras=" order by bar_denom ASC";
					include("../"._FILE_SCRIPT_PHP_SELECT);
						$regs="";
		                $tablas="";
		                //$id="";
		                $xtras="";
		                echo "<selected>$bar_id</selected>";
		
		           echo"
				</bar_priv>
				
				<referentes>";
						$regs=" emp_id, concat(nombre, ' ',apellido) ";
						$tablas=" empleados ";
						//$id=$ori_id;
						$xtras=" order by nombre,apellido ASC";
					include("../"._FILE_SCRIPT_PHP_SELECT);
						$regs="";
		                $tablas="";
		                //$id="";
		                $xtras="";
		                echo "<selected>$emp_id</selected>";
				if (!$prp_cartel)
				{
					$prp_cartel="NO";
				}
				if($prp_vip){
					$prp_vip="SI";					
				}else{
					$prp_vip="NO";					
				}
				
				if (!$prp_aut)
				{
					$prp_aut="0";
				}
				if (!$prp_cartel)
				{
					$prp_cartel="SI";
				}

/**************************************************************************************
 No los pongo en 1 porque cuando la propiedad no se publica en ningun portal y se accede 
 a la ficha de modificacion se muestra como si todos
 
		        if (!$prp_publica)
				{
					$prp_publica=1;
				}
		        if (!$mos_por_1)
				{
					$mos_por_1=1;
				}
				if (!$mos_por_2)
				{
					$mos_por_2=1;
				}
				if (!$mos_por_3)
				{
					$mos_por_3=1;
				}
				if (!$mos_por_4)
				{
					$mos_por_4=1;
				}
*/
		                echo "
		                </referentes>
			</datos>  
			<propiedad>
								<menuAu>1</menuAu>
								<editFicha>0</editFicha>
								<editEstado>1</editEstado>
								<editImprimir>1</editImprimir>
								<editCitas>1</editCitas>
								<editPro>1</editPro>
								<editSimil>1</editSimil>
				<prp_id>$prp_id</prp_id>
		        <usr_id>$usr_id</usr_id>
		        <pro_id>$pro_id</pro_id>
		        <usr_raz><![CDATA[$usr_raz]]></usr_raz>
		        <prp_alta>$prp_alta</prp_alta>
		        <prp_mod>$prp_mod</prp_mod>
		        <prp_pre>$prp_pre</prp_pre>
				<prp_pre_dol>$prp_pre_dol</prp_pre_dol>
				<precio_inmo>$precio_inmo</precio_inmo>
				<precio_prop>$precio_prop</precio_prop>
				<precio_trans>$precio_trans</precio_trans>
		        <tip_desc><![CDATA[$tip_desc]]></tip_desc>
		        <con_desc>$con_desc</con_desc>
		        <existencia>1</existencia>
		        <prp_dom><![CDATA[$prp_dom]]></prp_dom>
		        <prp_bar><![CDATA[$prp_bar]]></prp_bar>
		        <loc_desc><![CDATA[]]></loc_desc>
		        <pro_desc><![CDATA[]]></pro_desc>
		        <prp_desc><![CDATA[$prp_desc]]></prp_desc>
		        <prp_mostrar>$prp_mostrar</prp_mostrar>
		        <prp_servicios><![CDATA[$prp_servicios]]></prp_servicios>
		        <prp_nota><![CDATA[$prp_nota]]></prp_nota>
		        <prop_id><![CDATA[$prop_id]]></prop_id>
		        <prop_nombre><![CDATA[$prop_nombre]]></prop_nombre>
		        <prop_apellido><![CDATA[$prop_apellido]]></prop_apellido>
		        <prop_tel><![CDATA[$prop_tel]]></prop_tel>
		        <prop_dom><![CDATA[$prop_dom]]></prop_dom>
		        <prop_mail><![CDATA[$prop_mail]]></prop_mail>
		        <prop_nota><![CDATA[$prop_nota]]></prop_nota>        
		        <prp_publica><![CDATA[$prp_publica]]></prp_publica>        
		        <prp_pub><![CDATA[$prp_pub]]></prp_pub>
		        <cartel><![CDATA[$prp_cartel]]></cartel>
		        <prp_aut><![CDATA[$prp_aut]]></prp_aut>
		        <prp_llave><![CDATA[$prp_llave]]></prp_llave>
		        <prp_tas><![CDATA[$prp_tas]]></prp_tas>
		        <prp_insc_dom><![CDATA[$prp_insc_dom]]></prp_insc_dom>
		        <mos_por_1><![CDATA[$mos_por_1]]></mos_por_1>
		        <mos_por_2><![CDATA[$mos_por_2]]></mos_por_2>
		        <mos_por_3><![CDATA[$mos_por_3]]></mos_por_3>
		        <mos_por_4><![CDATA[$mos_por_3]]></mos_por_4>
		        <prp_vip>$prp_vip</prp_vip>
		        
		        ";
				
		           
		        /************************************************************************************************************
		        *************************************************   FOTOS   *************************************************
		        ************************************************************************************************************/  
		        print "<imagenes>";
		        if ($foto_nueva)
		        {
			        for ($i=1; $i<16; $i++)
			        {
		        		$enlfoto="fo".$i."_enl";
						$descfoto="fo".$i."_desc";
						if ($$enlfoto)
						{
							print "
								<foto>
									<foto_enl><![CDATA[fotos/".$$enlfoto."]]></foto_enl>
									<foto_desc>".$$descfoto."</foto_desc>
								</foto>
							";
						}
						else 
						{
								print "
								<foto>
									<foto_enl></foto_enl>
									<foto_desc></foto_desc>
								</foto>
							";
						}
			        }
		        }
		        else if ($mod_tip=="edit")
		        {
		        	for ($i=1;$i<7;$i++)
		        	{
			        	$enlfoto="fo".$i."_enl";
						$descfoto="fo".$i."_desc";
		        		if ($$enlfoto)
							{
								print "
									<foto>
										<foto_enl><![CDATA[foto$i/".$$enlfoto."]]></foto_enl>
										<foto_desc>".$$descfoto."</foto_desc>
									</foto>
								";
							}
							else 
							{
									print "
									<foto>
										<foto_enl></foto_enl>
										<foto_desc></foto_desc>
									</foto>
								";
							}
		        	}
		        	for ($i=1;$i<10;$i++)
		        	{
			        		print "
									<foto>
										<foto_enl></foto_enl>
										<foto_desc></foto_desc>
									</foto>
								";
		        	}
		        }
		        if ($mod_tip=="add")
		        {
		   			for ($i=1; $i<15; $i++)
			        {
		        		print "
								<foto>
									<foto_enl></foto_enl>
									<foto_desc></foto_desc>
								</foto>
							";
			        }
		        }
		        print "</imagenes>";
		        
				// Consulta de todos los servicios
				if (!$tip_id)
				{
					$tip_id=1;
				}
				$cons_tip=mysql_query("select 
												servicios_ihost.* 
										from 
												ser_tipo_const,
												servicios_ihost
										where
												servicios_ihost.ser_id=ser_tipo_const.ser_id and
												ser_tipo_const.tip_id=$tip_id and
												servicios_ihost.ser_id!=6 and 
												servicios_ihost.ser_id!=5
										order by servicios_ihost.ser_desc
												");	
				// Consulta de los servicios de la propiedad
				$cons_servi=mysql_query("select 
												 *
										 from
												ser_x_prp_ihost	
										 where
												prp_id=$prp_id and
												usr_id=$usr_id");
				if(mysql_num_rows($cons_tip))
				{
					print "<cantservicios>" . mysql_num_rows($cons_tip)."</cantservicios>";
					$i=0;
					print "<servicios>";
					while ($fila=mysql_fetch_array($cons_tip)) 
					{
						print "<serv>";
						if($i%2==0)
						{
							print"<serv_par>1</serv_par>";
						}
						else 
						{
							print"<serv_par>0></serv_par>";
						}
						$ser_desc=str_replace("*","",$fila[ser_desc]);
						print "<serv_num>$i></serv_num>";
						print "<serv_id>$fila[ser_id]</serv_id>";
						print "<serv_desc>$ser_desc</serv_desc>";
						if ($mod_tip=='edit')
						{
							
							// Si la propiedad ya tiene servicios vemos si este servicio ya tiene algun valor
							if(mysql_num_rows($cons_servi))
							{
								mysql_data_seek($cons_servi,0);	
								while($fila2=mysql_fetch_array($cons_servi))
								{
									if($fila2[ser_id]==$fila[ser_id])
									{
										$value=$fila2[valor];	
										break;
									}
								}
							}		
						}
						if($fila[ser_tip_dat]=="t" || $fila[ser_tip_dat]=="ss")
						{
							print"<serv_type>text</serv_type>";
							print "<serv_name>valor$i</serv_name>";
							print "<serv_valor>$value</serv_valor>";
							print "<serv_opciones></serv_opciones>";
						}
						else if($fila[ser_tip_dat]=="s")
						{
							print "<serv_type>select</serv_type>";
							print "<serv_name>valor$i</serv_name>";
							print "<serv_valor>$value</serv_valor>";
							$consulta_desde=mysql_query("select * from ser_selectores where ser_id=".$fila[ser_id]." and tipo_select='asc' order by nro_opcion");
							print "<serv_opciones>";							//print " <select name=\"desde_$i\">";
							while($cons_d=mysql_fetch_array($consulta_desde))
							{
								if($cons_d[desc_opcion]==$value)
								{
									print"<opcion selected='1'>" .$cons_d[desc_opcion]."</opcion>"; 
								}
								else 
								{
									print"<opcion selected='0'>" .$cons_d[desc_opcion]."</opcion>"; 
								}
							}//while
							print"</serv_opciones>" ;
						}
						else
						{
							print "<serv_type>checkbox</serv_type>";
							print "<serv_name>valor$i</serv_name>";
							print "<serv_opciones></serv_opciones>";
							if($value=="on")
							{
								print"<serv_valor>checked</serv_valor>";
							}
							else 	
							{
								print"<serv_valor></serv_valor>";
							}
						}
						$value="";
						print "</serv>";
						$i++;
					}//fin while	
					print "</servicios>";	
				}//fin if	
				/********************************************************************************************************
				*************************************** Servicios con CDATA *********************************************
				*********************************************************************************************************
				if(mysql_num_rows($cons_tip))
				{
					print "<cantservicios>" . mysql_num_rows($cons_tip)."</cantservicios>";
					$i=0;
					print "<servicios>";
					while ($fila=mysql_fetch_array($cons_tip)) 
					{
						print "<serv>";
						if($i%2==0)
						{
							print"<serv_par><![CDATA[1]]></serv_par>";
						}
						else 
						{
							print"<serv_par><![CDATA[0]]></serv_par>";
						}
						$ser_desc=str_replace("*","",$fila[ser_desc]);
						print "<serv_num><![CDATA[$i]]></serv_num>";
						print "<serv_id><![CDATA[$fila[ser_id]]></serv_id>";
						print "<serv_desc><![CDATA[$ser_desc]]></serv_desc>";
						// Si la propiedad ya tiene servicios vemos si este servicio ya tiene algun valor
						if(mysql_num_rows($cons_servi))
						{
							mysql_data_seek($cons_servi,0);	
							while($fila2=mysql_fetch_array($cons_servi))
							{
								if($fila2[ser_id]==$fila[ser_id])
								{
									$value=$fila2[valor];	
									break;
								}
							}
						}		
						if($fila[ser_tip_dat]=="t" || $fila[ser_tip_dat]=="ss")
						{
							print"<serv_type><![CDATA[text]]></serv_type>";
							print "<serv_name><![CDATA[valor$i]]></serv_name>";
							print "<serv_valor><![CDATA[$value]]></serv_valor>";
							print "<serv_opciones></serv_opciones>";
						}
						else if($fila[ser_tip_dat]=="s")
						{
							print "<serv_type><![CDATA[select]]></serv_type>";
							print "<serv_name><![CDATA[valor$i]]></serv_name>";
							print "<serv_valor><![CDATA[$value]]></serv_valor>";
							$consulta_desde=mysql_query("select * from ser_selectores where ser_id=".$fila[ser_id]." and tipo_select='asc' order by nro_opcion");
							print "<serv_opciones>";							//print " <select name=\"desde_$i\">";
							while($cons_d=mysql_fetch_array($consulta_desde))
							{
								if($cons_d[desc_opcion]==$value)
								{
									print"<opcion selected='1'><![CDATA[" .$cons_d[desc_opcion]."]]></opcion>"; 
								}
								else 
								{
									print"<opcion selected='0'><![CDATA[" .$cons_d[desc_opcion]."]]></opcion>"; 
								}
							}//while
							print"</serv_opciones>" ;
						}
						else
						{
							print "<serv_type><![CDATA[checkbox]]></serv_type>";
							print "<serv_name><![CDATA[valor$i]]></serv_name>";
							print "<serv_opciones></serv_opciones>";
							if($value=="on")
							{
								print"<serv_valor><![CDATA[checked]]></serv_valor>";
							}
							else 	
							{
								print"<serv_valor></serv_valor>";
							}
						}
						$value="";
						print "</serv>";
						$i++;
					}//fin while	
				}//fin if	
				
				print "</servicios>";
				*/
			//Si no Existe la Propiedad seteo propiedad = 0
			echo "</propiedad>";
			}else{
				echo "<XMLTEXTO>
						<propiedad> 0</propiedad>";
			}
		}
		else if ($mod_tip="add")
		{
			echo "
		    <XMLTEXTO>
			<datos>
				<paises>";
			 			$regs=" pai_id,pai_desc ";
						$tablas=" pais ";
						if(!$pai_id)
							$pai_id=$PAIS_DEFAULT;
						$xtras=" order by pai_desc ASC";	
					include("../"._FILE_SCRIPT_PHP_SELECT);
						$regs="";
		                $tablas="";
		                $id="";
		                $xtras="";
		                echo "<selected>$pai_id</selected>";
		            echo "</paises>
				<provincias>";
			 			$regs=" pro_id,pro_desc ";
						$tablas=" provincias ";
						$filtro=" pai_id=$pai_id";
						if(!$pro_id)
							$pro_id=$PROV_DEFAULT;
						$xtras=" order by pro_desc ASC";							
					include("../"._FILE_SCRIPT_PHP_SELECT);
						$regs="";
		                $tablas="";
		                $id="";
		                $xtras="";
		                echo "<selected>$pro_id</selected>";
					
				echo "
				</provincias>
				<localidades>";
				
						$regs=" distinct loc_id,loc_desc ";
						$tablas=" localidades,provincias ";
						$filtro=" localidades.pro_id=$pro_id ";
						$xtras=" order by loc_desc";
					include("../"._FILE_SCRIPT_PHP_SELECT);
						$regs="";
		                $tablas="";
		                $id="";
		                $filtro="";
		                $xtras="";
		                echo "<selected>$loc_id</selected>";
		
		           echo"
				</localidades>
				<tipoCons>";
				
						$regs=" tip_id,tip_desc ";
						$tablas=" tipo_const ";
						$xtras=" order by tip_desc ASC";
					include("../"._FILE_SCRIPT_PHP_SELECT);
						$regs="";
		                $tablas="";
		                $id="";
		                $xtras="";
		                echo "<selected>$tip_id</selected>";
		
		           echo"
				</tipoCons>
				<tipoCond>";
				
						$regs=" con_id,con_desc ";
						$tablas=" condiciones ";
						//$id=$con_id;
						$xtras=" order by con_desc ASC";
					include("../"._FILE_SCRIPT_PHP_SELECT);
						$regs="";
		                $tablas="";
		                //$id="";
		                $xtras="";
		                echo "<selected>$con_id</selected>";
		
		           echo"
				</tipoCond>
				<orientacion>";
				
						$regs=" ori_id,ori_desc ";
						$tablas=" orientacion ";
						//$id=$ori_id;
						$xtras=" order by ori_desc ASC";
					include("../"._FILE_SCRIPT_PHP_SELECT);
						$regs="";
		                $tablas="";
		                //$id="";
		                $xtras="";
		                echo "<selected>$ori_id</selected>";
		
		           echo"
				</orientacion>
				<bar_priv>";
				
						$regs=" bar_id,bar_denom ";
						$tablas=" bar_priv ";
						$xtras=" order by bar_denom ASC";
					include("../"._FILE_SCRIPT_PHP_SELECT);
						$regs="";
		                $tablas="";
		                $xtras="";
		                //$id="";
		               
		
		           echo"
				</bar_priv>
				<referentes>";
						$regs=" emp_id, concat(nombre, ' ',apellido) ";
						$tablas=" empleados ";
						//$id=$ori_id;
						$xtras=" order by nombre,apellido ASC";
					include("../"._FILE_SCRIPT_PHP_SELECT);
						$regs="";
		                $tablas="";
		                //$id="";
		                $xtras="";
		                echo "<selected>$emp_id</selected>";
		        echo "
		                </referentes>
			</datos>  
			<propiedad>
								<menuAu>1</menuAu>
								<editFicha>0</editFicha>
								<editEstado>1</editEstado>
								<editImprimir>1</editImprimir>
								<editCitas>1</editCitas>
								<editPro>1</editPro>
								<editSimil>1</editSimil>
								<prp_publica>1</prp_publica>
						        <usr_id>$usr_id</usr_id>
						        <pro_id>$pro_id</pro_id>
						        <mos_por_1><![CDATA[1]]></mos_por_1>
		        				<mos_por_2><![CDATA[1]]></mos_por_2>
		        				<mos_por_3><![CDATA[1]]></mos_por_3>
		        				<mos_por_4><![CDATA[1]]></mos_por_4>
		        				<cartel><![CDATA[NO]]></cartel>
		        				<prp_aut><![CDATA[0]]></prp_aut>
		        				<prp_vip><![CDATA[NO]]></prp_vip>

";
			echo "<imagenes>";
	        for ($i=1; $i<16; $i++)
	        {
		        		print "
								<foto>
									<foto_enl></foto_enl>
									<foto_desc></foto_desc>
								</foto>
							";
	        }
	        print "</imagenes>";
				// Consulta de todos los servicios
				if (!$tip_id)
				{
					$tip_id=1;
				}
				$cons_tip=mysql_query("select 
												servicios_ihost.* 
										from 
												ser_tipo_const,
												servicios_ihost
										where
												servicios_ihost.ser_id=ser_tipo_const.ser_id and
												ser_tipo_const.tip_id=$tip_id and
												servicios_ihost.ser_id!=6 and 
												servicios_ihost.ser_id!=5
										order by servicios_ihost.ser_desc
												");	
				// Consulta de los servicios de la propiedad
				if(mysql_num_rows($cons_tip))
				{
					print "<cantservicios>" . mysql_num_rows($cons_tip)."</cantservicios>";
					$i=0;
					print "<servicios>";
					while ($fila=mysql_fetch_array($cons_tip)) 
					{
						print "<serv>";
						if($i%2==0)
						{
							print"<serv_par>1</serv_par>";
						}
						else 
						{
							print"<serv_par>0></serv_par>";
						}
						$ser_desc=str_replace("*","",$fila[ser_desc]);
						print "<serv_num>$i></serv_num>";
						print "<serv_id>$fila[ser_id]</serv_id>";
						print "<serv_desc>$ser_desc</serv_desc>";
						if($fila[ser_tip_dat]=="t" || $fila[ser_tip_dat]=="ss")
						{
							print"<serv_type>text</serv_type>";
							print "<serv_name>valor$i</serv_name>";
							print "<serv_valor>$value</serv_valor>";
							print "<serv_opciones></serv_opciones>";
						}
						else if($fila[ser_tip_dat]=="s")
						{
							print "<serv_type>select</serv_type>";
							print "<serv_name>valor$i</serv_name>";
							print "<serv_valor>$value</serv_valor>";
							$consulta_desde=mysql_query("select * from ser_selectores where ser_id=".$fila[ser_id]." and tipo_select='asc' order by nro_opcion");
							print "<serv_opciones>";							//print " <select name=\"desde_$i\">";
							while($cons_d=mysql_fetch_array($consulta_desde))
							{
								if($cons_d[desc_opcion]==$value)
								{
									print"<opcion selected='1'>" .$cons_d[desc_opcion]."</opcion>"; 
								}
								else 
								{
									print"<opcion selected='0'>" .$cons_d[desc_opcion]."</opcion>"; 
								}
							}//while
							print"</serv_opciones>" ;
						}
						else
						{
							print "<serv_type>checkbox</serv_type>";
							print "<serv_name>valor$i</serv_name>";
							print "<serv_opciones></serv_opciones>";
							if($value=="on")
							{
								print"<serv_valor>checked</serv_valor>";
							}
							else 	
							{
								print"<serv_valor></serv_valor>";
							}
						}
						$value="";
						print "</serv>";
						$i++;
					}//fin while	
					print "</servicios>";	
				}
			echo "</propiedad>";
		}
		echo "
    </XMLTEXTO>";
?>