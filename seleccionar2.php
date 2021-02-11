<?php 
	extract($_POST);
	include "./parametros2.php";

	$db = mysqli_connect($HOST_NERON,$USUARIO_NERON,$PASSWORD_NERON,$BASE_DATOS_NERON);

	$prp_nro = $_POST[prp_id];
	$usr_id = 17;
	$fecha = date("Y-m-d");
	//limpio la tabla de fotos para esta propiedad
		$q_fotos = "DELETE FROM fotos WHERE prp_id = '".$prp_nro."' ";
		$fotos_cons = mysqli_query($db,$q_fotos) or die ("Error al insertar fotos: ".$q_fotos);

	//armo arreglo fotos
		$foto1 = $_POST[fo1];
		$foto2 = $_POST[fo2];
		$foto3 = $_POST[fo3];
		$foto4 = $_POST[fo4];
		$foto5 = $_POST[fo5];
		$foto6 = $_POST[fo6];
		$foto7 = $_POST[fo7];
		$foto8 = $_POST[fo8];
		$foto9 = $_POST[fo9];
		$foto10 = $_POST[fo10];
		$foto11 = $_POST[fo11];
		$foto12 = $_POST[fo12];
		$foto13 = $_POST[fo13];
		$foto14 = $_POST[fo14];
		$foto15 = $_POST[fo15];
		$fotos = array($foto1,$foto2,$foto3,$foto4,$foto5,$foto6,$foto7,$foto8,$foto9,$foto10,$foto11,$foto12,$foto13,$foto14,$foto15);

    $conn_id = ftp_connect($ftp_server);
                
    $log_result = ftp_login($conn_id, $ftp_usr, $ftp_psw);
	ftp_set_option($ftp_conn, FTP_USEPASVADDRESS, false);
    ftp_pasv($conn_id, true);
    
    if ((!$conn_id) || (!$log_result)) { 
        echo "La conexion a fallado <br>";
    } 

	ftp_chdir($conn_id, "public_html/dash/fotos/".$prp_nro);
	
	$j=0;
	foreach($fotos as $key => $val){ 
		if ($val != "" && $val != NULL) {

			$j++ ;
			$fo_nro = $j;
			$fo_enl = $prp_nro."-17-".$j.".gif";
			$cambios_fotos .= "x".$fo_nro;

			$q_fotos = "INSERT INTO fotos(prp_id, usr_id, fo_nro, fo_enl) VALUES ('".$prp_nro."', '".$usr_id."', '".$fo_nro."', '".$fo_enl."')";
			$fotos_cons = mysqli_query($db,$q_fotos) or die ("Error al insertar fotos: ".$q_fotos);

		    $imagen_tasa = $val;
		    $imagen_ihost = "./fotos/".$fo_enl;
			//si existe imagen_tasa en tasainmuebles, la copio a la carpeta de fotos			
			$existe_ftp = ftp_size($conn_id,$imagen_tasa);
			if ($existe_ftp != -1){
				//echo "<br><b>EXISTE $imagen_tasa en tasainmuebles; hay que guardarla</b><br>";
				if(ftp_get($conn_id,$imagen_ihost,$imagen_tasa,FTP_BINARY)){
					echo "<br><b>Se ha guardado satisfactoriamente $fo_enl </b><br>";
				}else {
					echo "<br>Error al guardar $fo_enl\n <br>";
				}
				
			}	
		}				
	}

	//actualizo la cantidad de fotos para la propiedad

		$q_prp= "UPDATE propiedades 
	             SET fotos = '".$j."'
	             WHERE prp_id = '".$prp_nro."'       
	            ";    
	    $prp_cons = mysqli_query($db,$q_prp) or die ("Error al actualizar propiedad: ".$q_prp);

	// agregar el cambio a la tabla cambios

		$q_cambios = "INSERT INTO cambios (fecha_c,cambio_det,prp_id,usr_id,cambios_fotos) VALUES ('".$fecha."','modificacion',".$prp_nro.",".$usr_id.",'".$cambios_fotos."')"; 
		//echo "Cambios: ".$q_cambios;
		$cambios_cons = mysqli_query($db,$q_cambios) or die ("Error al insertar modificacion en tabla cambios");				 
	
		ftp_close($conn_id);

?>
<link rel="stylesheet" href="./css/select.css">
<link rel="stylesheet" href="./css/bootstrap.css">

<div class="alert alert-info" role="alert">
  La propiedad ha sido modificada existosamente.
</div>

<div class="row">
	<div class="col-5"></div>
	<div class="col-4">
	<input type="submit" class="btnok" value="Aceptar" onclick="parent.Windows.close('win1');"/>
	</div>
	<div class="col-3"></div>
</div>