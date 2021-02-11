<?php 
header("Content-type: application/xml");

	extract($_GET);
	extract ($_POST);
	extract ($_REQUEST);
$usr_id=17;
include("../php/config.php");
echo "<?xml version=\"1.0\" encoding=\"iso-8859-1\" ?>";
$cadena="select fotos from propiedades where prp_id=".$prp_id." and usr_id=".$usr_id;
$result=mysql_query($cadena) or die("no anda".mysql_error());
if(mysql_num_rows($result))
{
	$cons_fot_nueva=mysql_result($result,0,0);
	if ($cons_fot_nueva!=-1)
	{ 
			$foto_nueva=1;
			$consulta="
			select 
				propiedades.prp_id, 
				propiedades.usr_id,
				usuarios.usr_raz,
				propiedades.prp_dom,
				propiedades.prp_plano,
				propiedades.prp_bar,
				localidades.loc_desc,
				provincias.pro_desc,
				prp_mod,
				prp_nota,
				prp_pre,
				prp_desc,
				prp_pre_dol,
				prp_llave,
				prp_cartel,
				prp_alta,
				prp_mod,
				prp_referente,
				con_desc,
				tip_desc,
				prp_servicios,
				propiedades.con_id,
				propiedades.tip_id,
				propiedades.loc_id,
				propiedades.pro_id,
				bar_priv_id,
				prp_vip,
				fotos,
				prp_anonimo,
				prp_mostrar,
				prp_tas,
				pre_inmo,
				prp_pub,
				prp_lat,
				prp_lng
			 from 
				propiedades,
				usuarios,
				localidades,
				provincias,
				condiciones,
				tipo_const
			 where 
				 propiedades.prp_id=$prp_id and
				 propiedades.tip_id=tipo_const.tip_id and
				 propiedades.con_id=condiciones.con_id and
				 propiedades.usr_id=usuarios.usr_id and 
				 propiedades.loc_id=localidades.loc_id and
				 propiedades.pro_id=provincias.pro_id and
				 propiedades.usr_id=$usr_id 
			";
		}
		else {	
			$consulta="
			select 
				propiedades.prp_id, 
				propiedades.usr_id,
				usuarios.usr_raz,
				propiedades.prp_dom,
				propiedades.prp_plano,
				propiedades.prp_bar,
				localidades.loc_desc,
				provincias.pro_desc,
				foto1.fo1_enl,
				foto2.fo2_enl,
				date_format(prp_mod,'%d-%m-%Y'),
				prp_nota,
				prp_pre,
				prp_desc,
				prp_pre_dol,
				foto3.fo3_enl,
				foto4.fo4_enl,
				prp_llave,
				foto5.fo5_enl,
				foto6.fo6_enl,
				prp_cartel,
				date_format(prp_alta,'%d-%m-%Y') as prp_alta,
				date_format(prp_mod,'%d-%m-%Y') as prp_mod,
				prp_referente,
				condiciones.con_desc,
				tipo_const.tip_desc,
				prp_servicios,
				prp_alta,
				bar_priv_id,
				prp_vip,
				fotos,
				propiedades.tip_id,
				prp_anonimo,
				prp_mostrar,
				prp_tas,
				pre_inmo,
				prp_pub,
				prp_lat,
				prp_lng
			from
				propiedades,
				usuarios,
				localidades,
				provincias,
				foto1,
				foto2,
				foto3,
				foto4,
				foto5,
				foto6,
				condiciones,
				tipo_const
			where
				propiedades.prp_id=$prp_id and
				propiedades.usr_id=$usr_id and
				propiedades.usr_id=usuarios.usr_id and 
				propiedades.loc_id=localidades.loc_id and
				propiedades.pro_id=provincias.pro_id and
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
				(propiedades.usr_id=foto6.fo6_usr or foto6.fo6_usr=0) and
				propiedades.con_id=condiciones.con_id and
				propiedades.tip_id=tipo_const.tip_id
				";
		}	
	$cons_ficha=mysql_query($consulta) or die ("no valido");
	if(mysql_num_rows($cons_ficha))
	{
		$fila=mysql_fetch_array($cons_ficha);
		echo "
		    <XMLTEXTO>
			      <propiedad>
		 				<menuAu>1</menuAu>
						<editFicha>1</editFicha>
						<editEstado>1</editEstado>
						<editImprimir>1</editImprimir>";
						if($usr_id==_USR_ID){
							echo"<editCitas>1</editCitas>";
						}else {
							echo"<editCitas>0</editCitas>";
						}
		echo"
						<editPro>1</editPro>
						<editSimil>1</editSimil>
						<editBarPriv>";
		
								if($fila[bar_priv_id]){
									echo $fila[bar_priv_id];									
								}else{
									echo "";
								}
		
		
						echo"</editBarPriv>
						<prp_id>$prp_id</prp_id>
				        <usr_id>$usr_id </usr_id>
				        <inmo_id>$fila[usr_id]</inmo_id>
				        ";
				        if($fila[prp_cartel]){
				        	print"<prp_cartel>Si</prp_cartel>";
				        }else{
				        	print"<prp_cartel>No</prp_cartel>";
				        }
		  				echo"<usr_raz>$fila[usr_raz]</usr_raz>
		  				<prp_llave>$fila[prp_llave]</prp_llave>
				        <prp_alta>$fila[prp_alta]</prp_alta>
				        <prp_mod>$fila[prp_mod]</prp_mod>
				        <tip_desc>$fila[tip_desc]</tip_desc>
				        <con_desc>$fila[con_desc]</con_desc>
				        ";
		$cons_tip=mysql_query("select 
									servicios_ihost.* 
								from 
										ser_tipo_const,
										servicios_ihost
								where
										servicios_ihost.ser_id=ser_tipo_const.ser_id and
										ser_tipo_const.tip_id=1 and
										servicios_ihost.ser_id!=6 and 
										servicios_ihost.ser_id!=5
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
			while ($fila3=mysql_fetch_array($cons_tip)) 
			{
				print "<serv>";
				$ser_desc=str_replace("*","",$fila3[ser_desc]);
				print "<serv_desc><![CDATA[$ser_desc]]></serv_desc>";
				if ($mod_tip=='edit')
				{
					// Si la propiedad ya tiene servicios vemos si este servicio ya tiene algun valor
					if(mysql_num_rows($cons_servi))
					{
						mysql_data_seek($cons_servi,0);	
						while($fila2=mysql_fetch_array($cons_servi))
						{
							if($fila2[ser_id]==$fila3[ser_id])
							{
								$value=$fila2[valor];	
								break;
							}
						}
					}		
				}
				print "<serv_valor><![CDATA[$value]]></serv_valor>";
				$value="";
				print "</serv>";
				$i++;
			}//fin while		
			print "</servicios>";	
		}//fin if	
		echo"
		 	<prp_pre_dol>$fila[prp_pre_dol]</prp_pre_dol>
			<existencia>1</existencia>
			<prp_dom><![CDATA[" . $fila[prp_dom] . "]]></prp_dom>
			<prp_plano><![CDATA[" . $fila[prp_plano] . "]]></prp_plano>
	        <prp_bar><![CDATA[" . $fila[prp_bar] . "]]></prp_bar>
	        <loc_desc>$fila[loc_desc]</loc_desc>
	        <pro_desc>$fila[pro_desc]</pro_desc>
	        <prp_pre><![CDATA[".$fila[prp_pre]."]]></prp_pre>
	        <prp_pre_dol><![CDATA[".$fila[prp_pre_dol]."]]></prp_pre_dol>
	        <pre_inmo><![CDATA[".$fila[pre_inmo]."]]></pre_inmo>
	        <prp_desc><![CDATA[$fila[prp_desc]]]></prp_desc>
	        <prp_pub><![CDATA[$fila[prp_pub]]]></prp_pub>
	        <referente>
	        	";
					$cad_ref="select * from empleados where emp_id=$fila[prp_referente]";
					$res_ref=mysql_query($cad_ref);
					if(mysql_num_rows($res_ref)){
						$ref=mysql_fetch_array($res_ref);
						echo "
								<prp_referente>$ref[emp_id]</prp_referente>
								<nombre>$ref[nombre] $ref[apellido]</nombre>
								<telefono>$ref[tel_inmo]</telefono>
								<email>$ref[email]</email>
								<fotos>$ref[fo_id]</fotos>
								";
								echo"<foto>emp_$ref[fo_id]-"._USR_ID.".gif</foto>";
					}
					
			echo"
	        </referente>
	        <prp_servicios><![CDATA[$fila[prp_servicios]]]></prp_servicios>
	        <prp_nota><![CDATA[$fila[prp_nota]]]></prp_nota>
	        <prp_mostrar><![CDATA[$fila[prp_mostrar]]]></prp_mostrar>
	        ";
				if($fila[fotos]>0){
					$cad="select fo_enl,fo_desc from fotos where prp_id=$fila[prp_id] and usr_id="._USR_ID;
					$res=mysql_query($cad);
					$fo=mysql_fetch_array($res);
					echo "<fo_enl><![CDATA[$fo[fo_enl]]]></fo_enl>
						  <fo_desc><![CDATA[$fo[fo_desc]]]></fo_desc>
						  <amp>&#x26;</amp>	";
				}else{
					echo "<fo_enl><![CDATA[0-0-0.jpg]]></fo_enl>
							<amp>&#x26;</amp>";
				}

		$ubicacion="https://maps.google.com?t=h&q=".$fila[prp_lat].",".$fila[prp_lng];
		echo"
				<prp_lat><![CDATA[$fila[prp_lat]]]></prp_lat>
		        <prp_lng><![CDATA[$fila[prp_lng]]]></prp_lng>
				<prp_ubicacion><![CDATA[$ubicacion]]></prp_ubicacion>
			</propiedad>
		</XMLTEXTO>";
	}else{
						//no existe
						echo"
						   <XMLTEXTO>
							      <propiedad>
							       			0
							      </propiedad>
					   	    </XMLTEXTO>";
					}
	}else{
					//no existe
						echo"
						<XMLTEXTO>
					      <propiedad>
					     			0
					      </propiedad>
					    </XMLTEXTO>";
		
	}
?>
