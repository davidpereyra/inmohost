<?php
extract($_GET);
include "include/config.php";
include "include/funciones/funciones.php";
include "actualizar_dbs.php";
?>
<link rel=stylesheet href="inmoclick.css" type=text/css>
	<div id=tabla1 width="300px;">
	<table align=center width=100% cellspacing=0 style="background:#666666;">
		<tr>
			<td style="font-family:verdana;font-size:10px;color:#FFFFFF;" colspan=6><b>Ejecutando Actualizacion en el servidor...


OK<b></td>
	</tr>
	<tr>
		<td style="font-family:verdana;font-size:10px;color:#FFFFFF;" colspan=6><b>Ejecutando Comandos...


<?php

//PRIMERO ACTUALIZAR DBS
if($usr_id==682){
	actualizar_db(array("usr_id"=>$usr_id,"db"=>"contactosite_db","usr"=>"contactosite_usr","pass"=>"contacto321"));
}

if($usr_id==773){
	actualizar_db(array("usr_id"=>$usr_id,"db"=>"stevanato_db","usr"=>"stevanato_usr","pass"=>"stevanato321"));
}

if($usr_id==17){
//	actualizar_db_cocucci(array("usr_id"=>$usr_id,"db"=>"cocucci_web","usr"=>"cocucci_usr","pass"=>"dekonoli321"));
}

	/////TERMINA//////

//$cad1="select usr_cim from usuarios where usr_id=$usr_id";
//die("pasa por aca");

$res=mysql_query("select visible from usuarios where usr_id=$usr_id");
$visible=mysql_result($res,0,0);

//SI NO ESTA VISIBLE AUTOMATICAMENTE LE DESHABILITA EL INMOHOST
if (!$visible) {

		$cadena='
					<?php

						include ("php/config.php");
						include ("php/sec_head.php");

						?>\\r\\n
						<!DOCTYPE html PUBLIC \"-//W3C//DTD XHTML 1.0 Transitional//EN\" \"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd\">\r\n
						<html xmlns=\"http://www.w3.org/1999/xhtml\">\r\n
						<head>
						<meta http-equiv=\"Content-Type\" content=\"text/html; charset=iso-8859-1\" />\r\n

						<script language=\"javascript\" type=\"text/javascript\" src=\"<?php echo _FILE_JAVASCRIPT_RSS; ?>\"></script>\r\n
						<?php\r\n
							include(\"head.php\");\r\n
						?>\r\n
						</head>\r\n
						<body>\r\n
						<?

						rename(\"c:\wamp\www\inmohostV2.0\inmohost.php\",\"c:\wamp\www\inmohostV2.0\i__.php\");
						rename(\"c:\wamp\www\inmohostV2.0\descargar_5.php\",\"c:\wamp\www\inmohostV2.0\inmohost.php\");



						;'."\r\n";

						$cadena.="print \"<script languaje='javascript'>parent.location.href='\".\$rutaAbsoluta.\"inmohost.php?usr_id=\$usr_id'</script>\";"."\r\n";
							$cadena.="print \"</body></html>\";"."\r\n";
							$cadena.="?>"."\r\n";

							//genera el script con lo almacenado en la variable "cadena"
						/*	$fp=fopen("./ftp_inmohost/inmo$usr_id/actualizar_usrs_5.php","w");
							fputs($fp,$cadena);
							fclose($fp);
							*/
							//conexion
							$conn_id = ftp_connect("localhost");
							$login = ftp_login($conn_id,"inmohost@inmoclick.com.ar","S0crate5-*");
							$temp = tmpfile();
							//Upload the temporary file to server
							ftp_fput($conn_id, '/inmo'.$usr_id.'/actualizar_usrs_5.php', $temp, FTP_ASCII);

							//Make the file writable by all
							ftp_site($conn_id,"CHMOD 0644 /inmo$usr_id/actualizar_usrs_5.php");
							//Write to file
							$fp=fopen("./ftp_inmohost/inmo$usr_id/actualizar_usrs_5.php","w");
							fputs($fp,$cadena);

							//Make the file writable only to owner
							ftp_site($conn_id,"CHMOD 0644 /inmo$usr_id/actualizar_usrs_5.php");

							fclose($fp);



							//ARMO EL ARCHIVO descargar_5

							$cadena="";

							$cadena='

						<?php
							if ($codigo_restauracion) {


								$db=mysql_connect("localhost","inmo",$codigo_restauracion);

								if (is_resource($db)) {
										mysql_select_db("inmodb",$db);
										mysql_query("set password for inmo@localhost = password($codigo_restauracion)");
										rename("c:\wamp\www\inmohostV2.0\inmohost.php","c:\wamp\www\inmohostV2.0\descargar_5.php");
										rename("c:\wamp\www\inmohostV2.0\i__.php","c:\wamp\www\inmohostV2.0\inmohost.php");
										?>
											<script> location.href="inmohost.php"</script>
										<?php
								}else{

								 ?>
								 	<h1>Codigo Incorrecto</h1>
								 <?php

								}

							}

						?>


						<?php
							$rutaSystema = "system/";
							$rutaInterfaz = "interfaz/";

							include ($rutaSystema."php/config.php");


							include (_FILE_UTIL_MEN);

							//libreria de dreamwaeaver XLST para inclusion de archivos de XML con XSLT
							include(_FILE_XSL_CLASS);

						?>
						<!DOCTYPE html PUBLIC \"-//W3C//DTD XHTML 1.0 Transitional//EN\" \"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd\">
						<html xmlns=\"http://www.w3.org/1999/xhtml\">
						<head>
						<meta http-equiv=\"Content-Type\" content=\"text/html; charset=iso-8859-1\" />
						<title>INMOHOST</title>

						</head>
						<body>
						<!--IngresoASesion-->
						<div id=\"ingresoASesion\" >
						<div align=\"center\" id=\"login2Error\" class=\"aclaraciones2\"><img src=\"interfaz/inmohost/images/iconos/alertas/alert1.png\" width=\"32\" height=\"33\" align=\"left\"><span id=\"login2ErrorText\"></span></div>
						  <div align=\"center\"  style=\"width:345px\">
						<form id=\"ingreso\" name=\"ingreso\" method=\"post\" action=\"inmohost.php\">
						            <table width=\"500\" border=\"0\" align=\"center\" cellpadding=\"0\" cellspacing=\"5\">
						           		<tr>
						                <td colspan=\"2\" align=\"center\">
											<h1>El sistema se ha deshabilitado automaticamente por falta de pago</h1>

											<br>
											<font color=\"Red\">
											Por favor comuniquese con el servicio de inmohost parar regularizar su situaci�n. Si por algun motivo ud. ya tiene sus pagos al dia
											le rogamos nos disculpe los inconvenientes causados.
											Tel: 0261 - 4397268
											<br>
											La Gerencia
											</font>
						    	        </td>

						              </tr>
						              <tr>
						                <td width=\"50%\">
						                	<div align=\"right\">
							                    C�digo de Restauraci�n:
						    	            </div>
						    	        </td>
						                <td width=\"50%\"><input name=\"codigo_restauracion\" type=\"password\" class=\"inputForm\" id=\"userLogin\" tabindex=\"1\" style=\"width:100px\" /></td>
						              </tr>

						            </table>
						            <input type=\"submit\" name=\"Enviar\" value=\"Enviar\">
						    </form>
						  </div>
						</div>
						<!--IngresoASesion-->



						</body>
						</html>

						';


						//print $cadena;

							//conexion
							$conn_id = ftp_connect("localhost");
							$login = ftp_login($conn_id,"inmohost@inmoclick.com.ar","S0crate5-*");
							$temp = tmpfile();
							//Upload the temporary file to server
							@ftp_fput($conn_id, '/inmo'.$usr_id.'/descargar_5.php', $temp, FTP_ASCII);

							//Make the file writable by all
							ftp_site($conn_id,"CHMOD 0644 /inmo$usr_id/descargar_5.php");
							//Write to file
							$fp=fopen("./ftp_inmohost/inmo$usr_id/descargar_5.php","w");
							fputs($fp,$cadena);

							//Make the file writable only to owner
							ftp_site($conn_id,"CHMOD 0644 /inmo$usr_id/descargar_5.php");

							fclose($fp);

						?>

						<body onload="location.href='http://<?php print $ip?>/inmohostV2.0/system/actualizar_4.php'">
						</body>
						<?php

}else{
//TERMINA DESHABILITACION DE USUARIO



		//funcion que lee las las redes y los usuarios relacionados y devuelve los usuarios
		$usuarios=get_usuarios($usr_id);


		//ya tengo los usuarios de los que hay que descargar la red



		//Con la variable cadena armamos una Pagina Web para actualizar los USUARIOS;
		$cadena.="<?php
		\r\n
		include (\"php/config.php\");\r\n
		include (\"php/sec_head.php\");\r\n

		?>\r\n
		<!DOCTYPE html PUBLIC \"-//W3C//DTD XHTML 1.0 Transitional//EN\" \"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd\">\r\n
		<html xmlns=\"http://www.w3.org/1999/xhtml\">\r\n
		<head>
		<meta http-equiv=\"Content-Type\" content=\"text/html; charset=iso-8859-1\" />\r\n

		<script language=\"javascript\" type=\"text/javascript\" src=\"<?php echo _FILE_JAVASCRIPT_RSS; ?>\"></script>\r\n
		<?php\r\n
			include(\"head.php\");\r\n
		?>\r\n
		</head>\r\n
		<body>\r\n
		<?
		";

		$cadena .= "mysql_query(\"DELETE FROM usuarios where usr_id!=$usr_id\");"."\r\n";



		for ($i=0;$i<count($usuarios);$i++){

		  if($usuarios[$i]){

				$cad_usuarios="select
									 distinct
											usuarios.*
										 from
											 usuarios,
											 propiedades
										 where
											 usuarios.usr_id=propiedades.usr_id and
											 propiedades.mos_por_1=1 and
											 propiedades.prp_mostrar=1 and
											 usuarios.usr_id=$usuarios[$i]";
				//tomo los datos del usuario[$i]
				$cons=mysql_query($cad_usuarios);


				//si hay propiedades para el usuario
				if (mysql_num_rows($cons)){


					//escribe el archivo con los inserts de las tablas
					while($fila=mysql_fetch_array($cons)) {

						$cadena .="mysql_query(\"INSERT INTO usuarios (usr_id,usr_raz,usr_usr,usr_pass,usr_dom,usr_tel,usr_mail,usr_tipo,usr_acc,loc_id,pro_id,pai_id,fecha_act,visible,usr_cim,usr_fot,usr_ccpim,web,titular) VALUES (".$fila[usr_id].",'".$fila[usr_raz]."','".$fila[usr_usr]."','".$fila[usr_pass]."','".$fila[usr_dom]."','".$fila[usr_tel]."','".$fila[usr_mail]."','".$fila[usr_tipo]."','".$fila[usr_acc]."','".$fila[loc_id]."','".$fila[pro_id]."',".$fila[pai_id].",'".$fila[fecha_act]."',".$fila[visible].",'".$fila[usr_cim]."','".$fila[usr_fot]."','".$fila[usr_ccpim]."','".$fila[web]."','".$fila[titular]."')\");";

					}//fin while

				//  manda por ftp el archivo
				//	$archivo1=$ruta."/nivel_1/actualizar_usrs.sql";
				//	$archivo2="actualizar_usrs.sql";
				//	ftp_put($conexion,"$archivo1","$archivo2",FTP_BINARY);
				}
		  }
		//FIN ACTUALIZA INMOBILIARIAS DE LA RED CIM

		//###################################################################################
		}

		//$cadena.=" descomprimir(\"../descargar_5.php\");  ";

		$cadena.="print \"<script languaje='javascript'>location.href='\".\$rutaAbsoluta.\"descargar_5.php?usr_id=\$usr_id'</script>\";"."\r\n";
			$cadena.="print \"</body></html>\";"."\r\n";
			$cadena.="?>"."\r\n";

			//genera el script con lo almacenado en la variable "cadena"
		/*	$fp=fopen("./ftp_inmohost/inmo$usr_id/actualizar_usrs_5.php","w");
			fputs($fp,$cadena);
			fclose($fp);
			*/
			//conexion
			$conn_id = ftp_connect("localhost");
			$login = ftp_login($conn_id,"inmohost@inmoclick.com.ar","S0crate5-*");
			$temp = tmpfile();
			//Upload the temporary file to server
			ftp_fput($conn_id, '/inmo'.$usr_id.'/actualizar_usrs_5.php', $temp, FTP_ASCII);

			//Make the file writable by all
			ftp_site($conn_id,"CHMOD 0644 /inmo$usr_id/actualizar_usrs_5.php");
			//Write to file
			$fp=fopen("./ftp_inmohost/inmo$usr_id/actualizar_usrs_5.php","w");
			fputs($fp,$cadena);

			//Make the file writable only to owner
			ftp_site($conn_id,"CHMOD 0644 /inmo$usr_id/actualizar_usrs_5.php");

			fclose($fp);



		?> OK</b></td></tr>
			<tr>
					<td style="font-family:verdana;font-size:10px;color:#FFFFFF;" colspan=6><b>Comprobando si hay propiedades...
		<?php






		$todos=1;
		//$ruta=str_replace("*@","\\",$ruta);
		$cadena="";
		$k=0;
		//Con la variable cadena armamos una Pagina Web para descargar las propiedades;
		$cadena="<?php\r\n
		include (\"system/php/config.php\");\r\n
		include (\"system/php/sec_head.php\");\r\n

		?>\r\n
		<!DOCTYPE html PUBLIC \"-//W3C//DTD XHTML 1.0 Transitional//EN\" \"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd\">\r\n
		<html xmlns=\"http://www.w3.org/1999/xhtml\">\r\n
		<head>
		<meta http-equiv=\"Content-Type\" content=\"text/html; charset=iso-8859-1\" />\r\n

		<script language=\"javascript\" type=\"text/javascript\" src=\"<?php echo _FILE_JAVASCRIPT_RSS; ?>\"></script>\r\n
		<?php\r\n

		?>\r\n
		</head>\r\n
		<body>\r\n
		<?print\"
		Finalizando Descargas\";"."\r\n";


		$verif_act_red="select act_pri_vez from cam_red_cim_temp where usr_id=$usr_id";

		$act_pri_vez=mysql_result(mysql_query($verif_act_red),0,0);
		//echo "Aaaaaaaaaaaa".$act_pri_vez;
		//si son nuevos entonces la primera vez se bajan toda la red cim, si no solo lo que hay buscar en la tabla cambios
		//$act_pri_vez es igual a cero cdo son nuevos, luego se cambia a uno
		if($act_pri_vez){

			for ($i=0;$i<count($usuarios);$i++){

			  if($usuarios[$i]){


				$result="select * from usuarios where usr_id=$usuarios[$i]";
				$cons_usrs=mysql_query($result);

				if (mysql_num_rows($cons_usrs)) {
					$datos_usr=mysql_fetch_array($cons_usrs);
				}

				$user_id=$usuarios[$i];
						//tomo los usuarios que han actualizado recientemente

							$consulta="select * from cam_red_cim where usr_id=$user_id and inmo_id=$usr_id";




						$cons=mysql_query($consulta);
						if (mysql_num_rows($cons)){

							//escribe el archivo con los inserts de las tablas


							//$cons_prop=mysql_query("select usr_raz, usr_dom, usr_tel, usr_mail from usuarios where usr_id='$inmo_id'");
						//	$res=mysql_fetch_row($cons_prop);
						//	$cadena .="mysql_query(\"DELETE FROM propietarios where prop_id=$inmo_id\");"."\r\n";
						//	$cadena .="mysql_query(\"INSERT INTO propietarios VALUES (".$inmo_id.",'Inmobiliaria','".$res[0]."','".$res[2]."','".$res[1]."','".$res[3]."','Propietario externo')\");"."\r\n";
							$cadena .="mysql_query(\"UPDATE usuarios set fecha_act='".date('Y-m-d')."' where usr_id=".$user_id."\");"."\r\n";

							while($fila=mysql_fetch_array($cons)){

									//primero q nada borro
									$cadena .= "mysql_query(\"DELETE FROM propiedades WHERE usr_id=".$fila[usr_id]."\");"."\r\n";
									//luego tomo todas las propiedades del usuario

									if($datos_usr[pro_id]==21){
										$verif_mostrar="select * from propiedades where usr_id=$fila[usr_id] and prp_mostrar=1 and mos_por_2=1 and mos_por_3=1";
									}else{
										$verif_mostrar="select * from propiedades where usr_id=$fila[usr_id] and prp_mostrar=1 and mos_por_4=1";
									}
									$res_verif=mysql_query($verif_mostrar);

									if(mysql_num_rows($res_verif)){
									//	print "ENTRA 1<br>";
										while($prp=mysql_fetch_array($res_verif)){;

											/*	$cadena="select * from fotos where usr_id=$fila[usr_id] and prp_id=$fila[prp_id]";
												$res_fotos=mysql_query($cadena);
												*/
												$cad="select * from ser_x_prp_ihost where usr_id=$prp[usr_id] and prp_id=$prp[prp_id]";
												$res_ser=mysql_query($cad);


												$domicilio=addslashes($prp[prp_dom]);
												$barrio=addslashes($prp[prp_bar]);
												$descripcion=addslashes($prp[prp_desc]);
												$nota=addslashes($prp[prp_nota]);
												$publicidad=addslashes($prp[prp_pub]);
												$servicios=addslashes($prp[prp_servicios]);


											 	$cadena .="mysql_query(\"INSERT INTO propiedades (prp_id,prp_dom,prp_bar,loc_id,pro_id,pai_id,ori_id,con_id,prp_desc,prp_visitas,usr_id,tip_id,fo1_id,fo2_id,fo3_id,fo4_id,fo360_id,prp_mod,prp_nota,prp_pre,prp_pub,prp_mostrar,prp_pre_dol,prp_llave,prp_alta,prp_cartel,prp_referente,prp_tas,prp_aut,fo5_id,fo6_id,pre_inmo,pre_prop,pre_trans,prp_insc_dom,publica,prp_servicios) VALUES (".$prp[prp_id].",'$domicilio','$barrio',".$prp[loc_id].",".$prp[pro_id].",".$prp[pai_id].",".$prp[ori_id].",".$prp[con_id].",'$descripcion',".$prp[prp_visitas].",".$prp[usr_id].",".$prp[tip_id].",".$prp[fo1_id].",".$prp[fo2_id].",".$prp[fo3_id].",".$prp[fo4_id].",".$prp[fo360_id].",'".DATE('Y-m-d')."','$nota',".$prp[prp_pre].",'".$publicidad."',".$prp[prp_mostrar].",".$prp[prp_pre_dol].",0,'".$prp[prp_alta]."',0,0,0,0,".$prp[29].",".$prp[30].",0,0,0,'".$prp[34]."',".$prp[35].",'$servicios' )\");"."\r\n";

												//$cadena .="mysql_query(\"INSERT INTO prop_x_prp values(".$prp[0].",$inmo_id,$inmo_id)\");"."\r\n";


												//##### B O R R A R
												//$cadena .= "mysql_query(\"UPDATE propiedades set fo1_id=-1, fo2_id=-1, fo3_id=-1, fo4_id=-1, fo5_id=-1, fo6_id=-1 WHERE prp_id=".$prp[0]." AND usr_id=".$user_id." \");"."\r\n";
												//##### F I N 	B O R R A R

												//##### H A B I L I T A R
												$cadena .="mysql_query(\"DELETE FROM ser_x_prp_ihost where usr_id=$prp[usr_id] and prp_id=$prp[prp_id]\");"."\r\n";
												while($fila_ser=mysql_fetch_array($res_ser)){

													$cadena .="mysql_query(\"INSERT INTO ser_x_prp_ihost values($fila_ser[prp_id],$fila_ser[ser_id],'$fila_ser[valor]',$fila_ser[usr_id])\");"."\r\n";

												}
												//##### F I N H A B I L I T A R
										}
									}
							}//fin while


						}//fin if mysql_num_rows()

				//exit();
				}
			}
			//print"delete from cam_red_cim where inmo_id=$usr_id";
				mysql_query("delete from cam_red_cim where inmo_id=$usr_id");

		}else{
			$cadena.= "mysql_query(\"DELETE FROM propiedades WHERE usr_id!=".$usr_id."\");";

			for ($i=0;$i<count($usuarios);$i++){
				if($usuarios[$i]){
				$user_id=$usuarios[$i];
				$result="select * from usuarios where usr_id=$usuarios[$i]";
				$cons_usrs=mysql_query($result);
				if (mysql_num_rows($cons_usrs)) {
					$datos_usr=mysql_fetch_array($cons_usrs);
				}

				$consulta="select * from propiedades where usr_id=$user_id";
				//print "<br>$consulta<br>";
				//print $usuarios[$i];

						$cons=mysql_query($consulta);
						if (mysql_num_rows($cons)){
							//escribe el archivo con los inserts de las tablas


						//	$cons_prop=mysql_query("select usr_raz, usr_dom, usr_tel, usr_mail from usuarios where usr_id='$inmo_id'");
						//	$res=mysql_fetch_row($cons_prop);
						//	$cadena .="mysql_query(\"INSERT INTO propietarios VALUES (".$inmo_id.",'Inmobiliaria','".$res[0]."','".$res[2]."','".$res[1]."','".$res[3]."','Propietario externo')\");";
							$cadena .="mysql_query(\"UPDATE usuarios set fecha_act='".date('Y-m-d')."' where usr_id=".$user_id."\");";

							while($fila=mysql_fetch_array($cons)){

							//		$cadena .= "mysql_query(\"DELETE FROM propiedades WHERE prp_id=".$fila[0]." and usr_id=".$user_id."\");";
							//		$cadena .= "mysql_query(\"DELETE FROM prop_x_prp WHERE prp_id=".$fila[0]." and usr_id=".$inmo_id."\");";



									$mos_por_2=$fila[mos_por_2];
									$mos_por_3=$fila[mos_por_3];
									$mos_por_4=$fila[mos_por_4];

							//	print "Mos por 2:".$mos_por_2."----";
							//	print "Mos por 3:".$mos_por_3."----";


									if( ($datos_usr[pro_id]==21&&$fila[prp_mostrar]==1&&($mos_por_2==1 || $mos_por_3==1)) || ($datos_usr[pro_id]==6&&$fila[prp_mostrar]==1&&$mos_por_4==1)){

											$domicilio=addslashes($fila[prp_dom]);
											$barrio=addslashes($fila[prp_bar]);
											$descripcion=addslashes($fila[prp_desc]);
											//print $descripcion;
											$nota=addslashes($fila[prp_nota]);
											$publicidad=addslashes($fila[prp_pub]);
											//$cadena .="\$descripcion=addslashes(\"$descripcion\");";
											$servicios=addslashes($fila[prp_servicios]);

											$cad="select * from ser_x_prp_ihost where usr_id=$fila[usr_id] and prp_id=$fila[prp_id]";
											$res_ser=mysql_query($cad);


									 	   $cadena .="mysql_query(\"INSERT INTO propiedades (prp_id,prp_dom,prp_bar,loc_id,pro_id,pai_id,ori_id,con_id,prp_desc,prp_visitas,usr_id,tip_id,fo1_id,fo2_id,fo3_id,fo4_id,fo360_id,prp_mod,prp_nota,prp_pre,prp_pub,prp_mostrar,prp_pre_dol,prp_llave,prp_alta,prp_cartel,prp_referente,prp_tas,prp_aut,fo5_id,fo6_id,pre_inmo,pre_prop,pre_trans,prp_insc_dom,publica,prp_servicios) VALUES (".$fila[prp_id].",'$domicilio','$barrio',".$fila[loc_id].",".$fila[pro_id].",".$fila[pai_id].",".$fila[ori_id].",".$fila[con_id].",'$descripcion',".$fila[prp_visitas].",".$fila[usr_id].",".$fila[tip_id].",-1,-1,-1,-1,-1,'".$fila[prp_mod]."','$nota',".$fila[prp_pre].",'".$publicidad."',".$fila[prp_mostrar].", ".$fila[prp_pre_dol].",0,'".$fila[prp_alta]."',0,0,0,0,-1,-1,0,0,0,'".$fila[prp_insc_dom]."',".$fila[publica].",'$servicios')\");";

											//##### H A B I L I T A R

										//$cadena .= "mysql_query(\"UPDATE propiedades set fo1_id=-1, fo2_id=-1, fo3_id=-1, fo4_id=-1, fo5_id=-1, fo6_id=-1,fotos=0 WHERE prp_id=".$fila[0]." AND usr_id=".$user_id." \");";

											$cadena .="mysql_query(\"DELETE FROM ser_x_prp_ihost where usr_id=$user_id and prp_id=$fila[prp_id]\");";
											while($fila_ser=mysql_fetch_array($res_ser)){

												$cadena .="mysql_query(\"INSERT INTO ser_x_prp_ihost values($fila_ser[prp_id],$fila_ser[ser_id],'$fila_ser[valor]',$fila_ser[usr_id])\");";

											}

											//##### F I N H A B I L I T A R
									}
							}//fin while


						}//fin if mysql_num_rows()
				}
			}

			mysql_query("update cam_red_cim_temp set act_pri_vez=1 where usr_id=$usr_id");


		}


		/*
		if ($usr_id==1257 || $usr_id==1469 || $usr_id==1470) {
			//RED DE DISANTO
			switch ($usr_id){

				case 1257:
					$cad_d="select * from propiedades where usr_id=1469 || usr_id=1470";
					break;
				case 1469:
					$cad_d="select * from propiedades where usr_id=1257 || usr_id=1470";
					break;
				case 1470:
					echo $cad_d="select * from propiedades where usr_id=1257 || usr_id=1469";
					break;
				default:
					break;
			}

				$cadena.="mysql_query(\"DELETE FROM propiedades where usr_id=$fila_d[usr_id] and prp_id=$fila_d[prp_id]\");";

				$res_d=mysql_query($cad_d);

				while ($fila_d=mysql_fetch_array($res_d)){

					$domicilio=addslashes($fila_d[prp_dom]);
					$barrio=addslashes($fila_d[prp_bar]);
					$descripcion=addslashes($fila_d[prp_desc]);

					$nota=addslashes($fila_d[prp_nota]);
					$publicidad=addslashes($fila_d[prp_pub]);

					$servicios=addslashes($fila_d[prp_servicios]);

					$cad="select * from ser_x_prp_ihost where usr_id=$fila_d[usr_id] and prp_id=$fila_d[prp_id]";
					$res_ser=mysql_query($cad);
			  	    $cadena .="mysql_query(\"INSERT INTO propiedades VALUES (".$fila_d[prp_id].",'$domicilio','$barrio',".$fila_d[loc_id].",".$fila_d[pro_id].",".$fila_d[pai_id].",".$fila_d[ori_id].",".$fila_d[con_id].",'$descripcion',".$fila_d[prp_visitas].",".$fila_d[usr_id].",".$fila_d[tip_id].",-1,-1,-1,-1,-1,'".$fila_d[prp_mod]."','$nota',".$fila_d[prp_pre].",'".$publicidad."',".$fila_d[prp_mostrar].", ".$fila_d[prp_pre_dol].",0,'".$fila_d[prp_alta]."',0,0,0,0,-1,-1,0,0,0,'".$fila_d[prp_insc_dom]."',".$fila_d[publica].",'$servicios',0,0,0,0,0,0,0,0,0)\");";

			  	    $cadena .="mysql_query(\"DELETE FROM ser_x_prp_ihost where usr_id=$fila_d[usr_id] and prp_id=$fila_d[prp_id]\");";
					while($fila_ser=mysql_fetch_array($res_ser)){

						$cadena .="mysql_query(\"INSERT INTO ser_x_prp_ihost values($fila_ser[prp_id],$fila_ser[ser_id],'$fila_ser[valor]',$fila_ser[usr_id])\");";

					}
					echo "entra";
				}
		}
		*/


		if($usr_id!=17&&$usr_id!=887&&$usr_id!=820&&$usr_id!=874&&$usr_id!=750&&$usr_id!=442&&$usr_id!=883){
			$cadena_ftp=comp_act2($usr_id);
				//print "entra <br>$cadena_ftp";
			//	exit();
			//print $cadena_ftp;
			//print "entra ftp";
			//exit;
			if($cadena_ftp!=""){
				$cadena.=$cadena_ftp;

			}

		}


		mysql_close($db);

		$comando="c:\wamp\www\svn\bin\svn.exe update c:\wamp\www\inmohostV2.0";
		if($usr_id!=852&&$usr_id!=17){
		$cadena.="
			  	  \$WshShell = new COM(\"WScript.Shell\");
		          \$oExec = \$WshShell->Run(\"cmd /C c:\wamp\www\svn\bin\svn.exe update c:\wamp\www\inmohostV2.0\", 0, false);

		";
		}

		$cadena.="mysql_close(\$db);"."\r\n";
		//$cadena.="print \" <font style=\'font-family:verdana;font-size:11px;font-color:#DDDDDD;\'><b>Descargando actualizaciones pendientes...</b></font>\";";
		$cadena.="print \"<script language='javascript'>location.href='\".\$rutaSystemAbs.\"actualizador_pre.php?borrar_cache_inm=1&e=$e'</script>\";"."\r\n";
		$cadena.="print \"</body></html>\";"."\r\n";
		$cadena.="?>"."\r\n";

		//print $cadena;

		/*	$fp=fopen("./ftp_inmohost/inmo$usr_id/descargar_5.php","w");
			exec("chmod 0644 ./ftp_inmohost/inmo$usr_id/descargar_5.php");
			fputs($fp,$cadena);
			fclose($fp);
			*/
			//conexion
			$conn_id = ftp_connect("localhost");
			$login = ftp_login($conn_id,"inmohost@inmoclick.com.ar","S0crate5-*");
			$temp = tmpfile();
			//Upload the temporary file to server
			@ftp_fput($conn_id, '/inmo'.$usr_id.'/descargar_5.php', $temp, FTP_ASCII);

			//Make the file writable by all
			ftp_site($conn_id,"CHMOD 0644 /inmo$usr_id/descargar_5.php");
			//Write to file
			$fp=fopen("./ftp_inmohost/inmo$usr_id/descargar_5.php","w");
			fputs($fp,$cadena);

			//Make the file writable only to owner
			ftp_site($conn_id,"CHMOD 0644 /inmo$usr_id/descargar_5.php");

			fclose($fp);

		   // comprimir("./ftp_inmohost/inmo$usr_id/descargar_5.php");

		//FIN ACTUALIZACION DE PROPIEDADES PARA CADA INMOBILIARIA
}
?>
  OK</b></td>
		</tr>
	<tr>
			<td style="font-family:verdana;font-size:10px;color:#FFFFFF;" colspan=6><b>Descargando Propiedades de la Red...<b></td>
		</tr>
<!--script language="JavaScript">

			alert("ESTIMADOS USUARIOS. EL SERVICIO PARA PUBLICAR EN INTERNET SE ENCONTRAR� DEHABILITADO DURANTE LA TARDE POR TAREAS DE MANTENIMIENTO. \r\nSEPAN DISCULPAR LAS MOLESTIAS\r\n GRUPOCLICK S.A.");

	</script-->

<body onload="location.href='http://<?print $ip?>/inmohostV2.0/system/actualizar_4.php'">
</body>
