<?Php

class Propiedad{

    // database connection and table name
    private $conn;
    private $table_name = "propiedades";
 
    // object properties
    public $inputSearch;
    public $id;
    public $prp_id;
    public $prp_dom;
    public $prp_bar;
    public $loc_id;
    public $pro_id;
    public $pai_id;
    public $ori_id;
    public $con_id;
	public $prp_desc;
	public $prp_visitas;
    public $usr_id;
    public $tip_id;
    public $prp_nota;
    public $prp_pre;
    public $prp_pub;
	public $prp_mostrar;
    public $pre_dol;
    public $prp_llave;
    public $prp_cartel;
    public $prp_referente;
    public $prp_tas;
    public $pre_inmo;
    public $pre_prop;
    public $pre_trans;
    public $prp_insc_dom;
    public $publica;
    public $prp_servicios;
    public $bar_priv_id;
    public $fotos;
    public $mos_por_1;
    public $mos_por_2;
    public $mos_por_3;
    public $mos_por_4;
    public $prp_anonimo;
    public $prp_vip;
    public $prp_lat;
    public $prp_lng;
    public $prp_plano;
    public $ultimo_id;

	//Priopietario
	public $prop_id;
	public $prop_nombre;
	public $prop_apellido;
	public $prop_tel;
	public $prop_dom;
	public $prop_mail;
	public $prop_nota;

	//Servicios
	public $valor0;
	public $valor1;
	public $valor2;
	public $valor3;
	public $valor4;
	public $valor5;
	public $valor6;
	public $valor7;
	public $valor8;
	public $valor9;
	public $valor10;
	public $valor11;
	public $valor12;
	public $valor13;
	public $valor14;
	public $valor15;
	public $valor16;

	//ERRORES
	public $errores="";

    public function __construct($db){

        $this->conn = $db;

    }

    function altaPrpInmohost(){

        $this->tip_id=htmlspecialchars(strip_tags($this->tip_id));
        $this->prp_dom=htmlspecialchars(strip_tags($this->prp_dom));
        $this->loc_id=htmlspecialchars(strip_tags($this->loc_id));
        //$this->prp_desc=htmlspecialchars(strip_tags($this->prp_desc));
        $this->prp_pre=htmlspecialchars(strip_tags($this->prp_pre));
        $this->prp_tas=htmlspecialchars(strip_tags($this->prp_tas));
        $this->prp_nota=htmlspecialchars(strip_tags($this->prp_nota));
        
        /*$max_id = "select MAX(prp_id)as max_id from propiedades where usr_id=17"; //obtiene maximo de propiedades para agregar en tabla
        $stmt = $this->conn->prepare($max_id);
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        // set values to object properties

        //$this->prp_id = $row['max_id'] + 1;
		*/
		
		$verif="select prp_id from propiedades where prp_id=".$this->prp_id;
        $existe = $this->conn->prepare($verif);
        $existe->execute();
        $row1 = $existe->fetch(PDO::FETCH_ASSOC);
		
		if (intval($row1['prp_id']) > intval('0') )
		{
			$this->errores.="ERROR al grabar la Propiedad, el ID: ".$this->prp_id." ya existe.";
		}
		else 
		{
		//Alta Propietario
	        $max_prop = "select max(prop_id) from propietarios"; //obtiene maximo de propietarios para agregar en tabla
	        $prop = $this->conn->prepare($max_prop);
	        $prop->execute();
	        $row2 = $prop->fetch(PDO::FETCH_ASSOC);
			$prop_id=$row2['max(prop_id)']+1;

			$propietarios="insert into propietarios values (".$prop_id.",'".$this->prop_nombre."','".$this->prop_apellido."','".$this->prop_tel."','".$this->prop_dom."','".$this->prop_mail."','".$this->prop_nota."')";	
		//echo "<br> INSERTAR propietario:<br>".$propietarios."<br>";
	        $propietario = $this->conn->prepare($propietarios);
	        if(!($propietario->execute() ) ){
	        	$this->errores.="ERROR al cargar Propietario: ".$propietarios;
	        }

	    //Alta Propiedad
			$insertar="insert into propiedades (prp_id,prp_dom,prp_bar,loc_id,pro_id,pai_id,ori_id,con_id,prp_desc,prp_visitas,usr_id,tip_id,prp_mod,prp_nota,prp_pre,prp_pub,prp_mostrar,prp_pre_dol,prp_llave,prp_alta,prp_cartel,prp_referente,prp_tas,prp_aut,pre_inmo,pre_prop,pre_trans,prp_insc_dom,publica,prp_servicios,bar_priv_id,fotos,mos_por_1,mos_por_2,mos_por_3,mos_por_4,prp_anonimo,prop_id,prp_vip,prp_lat,prp_lng,prp_plano,prp_destacado) values (".$this->prp_id.",'".$this->prp_dom."','".$this->prp_bar."',".$this->loc_id.",".$this->pro_id.",".$this->pai_id.",'".$this->ori_id."',".$this->con_id.",'".$this->prp_desc."',".$this->prp_visitas.",".$this->usr_id.",".$this->tip_id.",now(),'".$this->prp_nota."','".$this->prp_pre."','".$this->prp_pub."',".$this->prp_mostrar.",'".$this->pre_dol."','".$this->prp_llave."',now(),'".$this->prp_cartel."','".$this->prp_referente."','".$this->prp_tas."','".$this->prp_aut."','".$this->pre_inmo."','".$this->pre_prop."','".$this->pre_trans."','".$this->prp_insc_dom."',".$this->publica.",'".$this->prp_servicios."','".$this->bar_priv_id."','".$this->fotos."','".$this->mos_por_1."','".$this->mos_por_2."','".$this->mos_por_3."','".$this->mos_por_4."','".$this->prp_anonimo."',".$prop_id.",'".$this->prp_vip."','".$this->prp_lat."','".$this->prp_lng."','".$this->prp_plano."',".$this->prp_destacado.")";
			//echo "<br> INSERTAR propiedad:<br>".$insertar."<br>";
			//$this->errores.= "<br> INSERTAR propiedad:<br>".$insertar."<br>";
			$propiedad = $this->conn->prepare($insertar);

	        if(!($propiedad->execute() ) ){
	        	$this->errores.= "ERROR: al cargar la propiedad: ".$propiedad;
	        }else{
				$msg_exitos[$ind_exito++]="El inmueble se ingreso con exito en con el identificador ".$this->prp_id."";
			}
			
			//Alta Servicios
				$cons_tip="select 
								servicios_ihost.* 
							from 
								ser_tipo_const,
								servicios_ihost
							where
								servicios_ihost.ser_id=ser_tipo_const.ser_id and
								ser_tipo_const.tip_id=".$this->tip_id." and
								servicios_ihost.ser_id!=6 and 
								servicios_ihost.ser_id!=5 
							ORDER BY
								servicios_ihost.ser_desc";	
				
				$consTip = $this->conn->prepare($cons_tip);
				$consTip->execute();
		        ;
				
				$i=0;
				while ( $fila=$consTip->fetch(PDO::FETCH_ASSOC) ) {
					$valor="valor".$i;
					$insertarSer="insert into ser_x_prp_ihost values(".$this->prp_id.",".$fila['ser_id'].",'".$this->$valor."',".$this->usr_id.")";
					$insServicio = $this->conn->prepare($insertarSer);
				//echo "<br> INSERTAR Servicio ".$fila['ser_id'].":<br>".$insertar."<br>";					
					if(!($insServicio->execute() ) ){
			        	$this->errores.= "ERROR: al cargar el servicio: ".$insertarSer;
			        }
					$i++;
				}//while
				 	
			/*			
			//MANDA NOVEDAD PARA COLOCAR CARTEL
				$consMaxNov="select max(nov_id) from novedades";
				$maxNov = $this->conn->prepare($consMaxNov);
		        $maxNov->execute();
		        $row5 = $maxNov->fetch(PDO::FETCH_ASSOC);
				$max_nov=$row5['max(nov_id)']+1;
						
				$consLocalidad="select loc_desc from localidades where loc_id=".$this->loc_id." and pro_id=".$this->pro_id;
				$localidad = $this->conn->prepare($consLocalidad);
				$localidad->execute();
				$row3 = $localidad->fetch(PDO::FETCH_ASSOC);
				$descLocalidad = $row3['loc_desc'];
				
				$consCondicion="select con_desc from condiciones where con_id=".$this->con_id;
				$condicion = $this->conn->prepare($consCondicion);
				$condicion->execute();
				$row4 = $condicion->fetch(PDO::FETCH_ASSOC); 
				$descCondicion = $row4['con_desc'];

				$domicilio=$this->prp_dom." - ".$this->prp_bar." - ".$descLocalidad;
				
				$message="Se dió de Alta una nueva propiedad en ".$descCondicion.", ID ".$this->prp_id.", ubicada en ".$domicilio;				
					
				$ins_novedades="insert into novedades values(".$max_nov.",'".$message."','24',CURDATE(),'',CURTIME() )";
				$novedad2 = $this->conn->prepare($ins_novedades);
		//echo "<br> INSERTAR novedad:<br>".$ins_novedades."<br>";
		        if(!($novedad2->execute() ) ){
		        	$this->errores.= "ERROR: al cargar la Novedad: ".$novedad;
		        }else{

					if($this->con_id==1){//si es un inmueble de ventas
						$ins_nov_x_emp="insert into nov_x_emp values(".$max_nov.",'111',0)";//Marisa Manuele
						$novedadxEmp=$this->conn->prepare($ins_nov_x_emp);
		//echo "<br> INSERTAR novedad x Emp:<br>".$ins_nov_x_emp."<br>";						
						if(!($novedadxEmp->execute() ) ){
				        	$this->errores.= "ERROR: al cargar la Novedad x Emp (Marisa): ".$novedadxEmp;
				        }
						//$ins_nov_x_emp=mysql_query("insert into nov_x_emp values($max_nov,'97',0);");//Antonella Herrera
						//$ins_nov_x_emp=mysql_query("insert into nov_x_emp values($max_nov,'117',0);");//Chiara
					}

					$ins_nov_x_emp2="insert into nov_x_emp values(".$max_nov.",'88',0)";//Alta Carteles						
					$novedadxEmp2=$this->conn->prepare($ins_nov_x_emp2);
		//echo "<br> INSERTAR novedad x Emp 2:<br>".$ins_nov_x_emp2."<br>";						
					if(!($novedadxEmp2->execute() ) ){
				       	$this->errores.= "ERROR: al cargar la Novedad x Emp2 (carteles): ".$novedadxEmp2;
				    }	

				}
		*/
		//buscar_coincidencia(0,$this->prp_id);	
		}//fin IF existe ID

		//$stmt->closeCursor();   

	}//fin altaPropiedad


    function modifPrpInmohost(){

        $this->tip_id=htmlspecialchars(strip_tags($this->tip_id));
        $this->prp_dom=htmlspecialchars(strip_tags($this->prp_dom));
        $this->loc_id=htmlspecialchars(strip_tags($this->loc_id));
        //$this->prp_desc=htmlspecialchars(strip_tags($this->prp_desc));
        $this->prp_pre=htmlspecialchars(strip_tags($this->prp_pre));
        $this->prp_tas=htmlspecialchars(strip_tags($this->prp_tas));
        $this->prp_nota=htmlspecialchars(strip_tags($this->prp_nota));
        
        // set values to object properties

		$verif="select prp_id,prop_id from propiedades where prp_id=".$this->prp_id." and (usr_id=".$this->usr_id." or usr_id=0)";
        $existe = $this->conn->prepare($verif);
        $existe->execute();
        $row1 = $existe->fetch(PDO::FETCH_ASSOC);

		if (intval($row1['prp_id']) > intval('0') )
		{

		//Modificar Propietario
        	$prop_id = $row1['prop_id'];
			
			$propietarios = "update 
								propietarios
							set
								prop_nombre='".$this->prop_nombre."',
								prop_apellido='".$this->prop_apellido."',
								prop_tel='".$this->prop_tel."',
								prop_dom='".$this->prop_dom."',
								prop_mail='".$this->prop_mail."',
								prop_nota='".$this->prop_nota."'
							where 
								propietarios.prop_id=".$prop_id;
		//echo "<br> UPDATE propietario:<br>".$propietarios."<br>";			
	        $propietario = $this->conn->prepare($propietarios);
	        if(!($propietario->execute() ) ){
	        	$this->errores.="ERROR al cargar Propietario: ".$propietarios;
	        }

	    //Modificar Propiedad
			$modificar= "update 
							propiedades 
						set 
							con_id=".$this->con_id.",
							loc_id=".$this->loc_id.",
							pro_id=".$this->pro_id.",
							prp_bar='".$this->prp_bar."',
							prp_dom='".$this->prp_dom."',
							pai_id='".$this->pai_id."',
							tip_id='".$this->tip_id."',
							prp_pre=".$this->prp_pre.",
							prp_desc='".$this->prp_desc."',
							prp_mod=now(),
							ori_id='".$this->ori_id."',
							prp_pub='".$this->prp_pub."',
							prp_pre_dol='".$this->pre_dol."',
							prp_llave='".$this->prp_llave."',
							prp_cartel='".$this->prp_cartel."',
							prp_referente='".$this->prp_referente."',
							prp_tas='".$this->prp_tas."',
							prp_aut='".$this->prp_aut."',
							pre_inmo='".$this->pre_inmo."',
							pre_prop='".$this->pre_prop."',
							pre_trans='".$this->pre_trans."',
							prp_insc_dom='".$this->prp_insc_dom."',
							publica=".$this->publica.",
							prp_servicios='".$this->prp_servicios."',
							prp_mostrar=".$this->prp_mostrar.",
							bar_priv_id='".$this->bar_priv_id."',
							fotos=".$this->fotos.",
							prp_anonimo='".$this->prp_anonimo."',
							prop_id='".$prop_id."',
							prp_vip='".$this->prp_vip."',
							mos_por_1='".$this->mos_por_1."',
							mos_por_2='".$this->mos_por_2."',
							mos_por_3='".$this->mos_por_3."',
							prp_lat='".$this->prp_lat."',
							prp_lng='".$this->prp_lng."',
							prp_plano='".$this->prp_plano."',
							prp_destacado=".$this->prp_destacado."
				where 
							prp_id=".$this->prp_id." and 
							(usr_id=".$this->usr_id." or usr_id=0);
				"; 

				$propiedad = $this->conn->prepare($modificar);
		echo "<br> modificar propiedad:<br>".$modificar."<br>";
		        if(!($propiedad->execute() ) ){
		        	$this->errores.= "ERROR: al modificar la propiedad: ".$propiedad;
		        }else{
					$msg_exitos[$ind_exito++]="El inmueble ID: ".$this->prp_id." se modifico con exito.";
				}

			//Manejo de Fotos
				if ($this->fotos>0){
					$consFotos = "delete from fotos where prp_id=".$this->prp_id." and usr_id=".$this->usr_id;
			 		$quitarFotos = $this->conn->prepare($consFotos);
					//echo "<br> Eliminar fotos:<br>".$consFotos."<br>";		 		
				    if(!($quitarFotos->execute() ) ){
				    	$this->errores.= "ERROR: al eliminar las fotos: ".$consFotos;
				    }

			 		$x=1;
			 		while ($x<=$this->fotos){

				 		$cadena="insert into fotos values('".$this->prp_id."-".$this->usr_id."-".$x.".gif',".$this->prp_id.",".$this->usr_id.",".$x.",'')";
				 		$consFotos2 = $this->conn->prepare($cadena);
					//echo "<br> Insertar fotos:<br>".$cadena."<br>";		 		
				        if(!($consFotos2->execute() ) ){
				        	$this->errores.= "ERROR: al cargar las fotos: ".$consFotos2;
				        }
			 			$x++;
					
					}//fin while
				}
			
			//Alta Servicios
				$consSer ="delete from ser_x_prp_ihost where prp_id=".$this->prp_id." and usr_id=".$this->usr_id;
				$quitarSer = $this->conn->prepare($consSer);
				//echo "<br> Eliminar servicios:<br>".$consSer."<br>";		 						
			    if(!($quitarSer->execute() ) ){
			    	$this->errores.= "ERROR: al eliminar los servicios: ".$consSer;
			    }

				$cons_tip="select 
								servicios_ihost.* 
							from 
								ser_tipo_const,
								servicios_ihost
							where
								servicios_ihost.ser_id=ser_tipo_const.ser_id and
								ser_tipo_const.tip_id=".$this->tip_id." and
								servicios_ihost.ser_id!=6 and 
								servicios_ihost.ser_id!=5 
							ORDER BY
								servicios_ihost.ser_desc";	
				
				$consTip = $this->conn->prepare($cons_tip);
				$consTip->execute();
		        ;
				
				$i=0;
				while ( $fila=$consTip->fetch(PDO::FETCH_ASSOC) ) {
					$valor="valor".$i;
					$insertarSer="insert into ser_x_prp_ihost values(".$this->prp_id.",".$fila['ser_id'].",'".$this->$valor."',".$this->usr_id.")";
					$insServicio = $this->conn->prepare($insertarSer);
		//echo "<br> Insertar servicio:<br>".$insertarSer."<br>";		 							
					if(!($insServicio->execute() ) ){
			        	$this->errores.= "ERROR: al cargar el servicio: ".$insertarSer;
			        }
					$i++;
				}//while
		//echo "<br>ERRORES: ".$propiedad->errores."-<br>";	


			//Descargar Fotos
			if($this->fotos>0){

				$ftp_server = "www.cocucci.com.ar";//"185.214.126.124";
				$ftp_usr = "ftp_inmohost@cocucci.com.ar";//"u808822254.tasainmuebles";
				$ftp_psw = "Socrate5";//"HmOwuBZo";

				$conn_ftp_id = ftp_connect($ftp_server);
				  
				$log_result = ftp_login($conn_ftp_id, $ftp_usr, $ftp_psw);

				if ((!$conn_ftp_id) || (!$log_result)) { 
				    $this->errores.= "La conexion FTP a ".$ftp_server." ha fallado.";
				}else{
					ftp_pasv($conn_ftp_id, true); 
					for($ii=1;$ii<=$this->fotos;$ii++){
						$local_file = "../fotos/".$this->prp_id."-".$this->usr_id."-".$ii.".gif";
						$server_file = "fotos/".$this->prp_id."/".$this->prp_id."-".$this->usr_id."-".$ii.".gif";
						// intenta descargar $server_file y guardarlo en $local_file
						if( !(ftp_get($conn_ftp_id, $local_file, $server_file, FTP_BINARY)) ){
						    $this->errores.="ERROR al descargar foto por FTP.";
						}
					}
				}
				// cerrar la conexión ftp
				ftp_close($conn_ftp_id);	
			}	

		}
		else 
		{
			$this->errores.="ERROR al Modificar la Propiedad, el ID: ".$this->prp_id." NO existe.";

		//buscar_coincidencia(0,$this->prp_id);	
		}//fin IF existe ID
	
	}//fin modifPropiedad

	function altaFotosPrpInmohost(){

	    	//Modificar Propiedad
			$modificar= "update 
							propiedades 
						set 
							fotos=".$this->fotos."
						where 
							prp_id=".$this->prp_id." and 
							(usr_id=".$this->usr_id." or usr_id=0);
						"; 

				$propiedad = $this->conn->prepare($modificar);
			//echo "<br> modificar Fotos propiedad:<br>".$modificar."<br>";
		        if(!($propiedad->execute() ) ){
		        	$this->errores.= "ERROR: al modificar la propiedad: ".$propiedad;
		        }else{
					$msg_exitos[$ind_exito++]="El inmueble ID: ".$this->prp_id." se modifico con exito.";
				}

			//Alta Fotos
				$consFotos = "delete from fotos where prp_id=".$this->prp_id." and usr_id=".$this->usr_id;
		 		$quitarFotos = $this->conn->prepare($consFotos);
			//echo "<br> Eliminar fotos:<br>".$consFotos."<br>";		 		
			    if(!($quitarFotos->execute() ) ){
			    	$this->errores.= "ERROR: al eliminar las fotos: ".$consFotos;
			    }

		 		$x=1;
		 		while ($x<=$this->fotos){

			 		$cadena="insert into fotos values('".$this->prp_id."-".$this->usr_id."-".$x.".gif',".$this->prp_id.",".$this->usr_id.",".$x.",'')";
			 		$consFotos2 = $this->conn->prepare($cadena);
			//echo "<br> Insertar fotos:<br>".$cadena."<br>";		 		
			        if(!($consFotos2->execute() ) ){
			        	$this->errores.= "ERROR: al cargar las fotos: ".$consFotos2;
			        }
		 			$x++;
				
				}//fin while
				
			//Descargar Fotos
			if($this->fotos>0){

				$ftp_server = "www.cocucci.com.ar";//"185.214.126.124";
				$ftp_usr = "ftp_inmohost@cocucci.com.ar";//"u808822254.tasainmuebles";
				$ftp_psw = "Socrate5";//"HmOwuBZo";

				$conn_ftp_id = ftp_connect($ftp_server);
				  
				$log_result = ftp_login($conn_ftp_id, $ftp_usr, $ftp_psw);

				if ((!$conn_ftp_id) || (!$log_result)) { 
				    $this->errores.= "La conexion FTP a ".$ftp_server." ha fallado.";
				}else{
					ftp_pasv($conn_ftp_id, true); 
					for($ii=1;$ii<=$this->fotos;$ii++){
						$local_file = "../fotos/".$this->prp_id."-".$this->usr_id."-".$ii.".gif";
						$server_file = "fotos/".$this->prp_id."/".$this->prp_id."-".$this->usr_id."-".$ii.".gif";
						// intenta descargar $server_file y guardarlo en $local_file
						if( !(ftp_get($conn_ftp_id, $local_file, $server_file, FTP_BINARY)) ){
						    $this->errores.="ERROR al descargar foto por FTP.";
						}
					}
				}
				// cerrar la conexión ftp
				ftp_close($conn_ftp_id);	
			}	
			else 
			{
				$this->errores.="ERROR al Modificar las Fotos de la Propiedad, el ID: ".$this->prp_id." NO existe.";

			//buscar_coincidencia(0,$this->prp_id);	
			}//fin IF existe ID
	
	}//fin altaFotosPropiedad

function ultimoID(){

	    	//consulto la tabla de Propiedades
			$sql= "select max(prp_id) as ultimo_id from propiedades"; 

				$propiedad = $this->conn->prepare($sql);
			
		        if(!($propiedad->execute() ) ){
		        	$this->errores.= "ERROR: al consultar las propiedades";
		        }else{

        			$row = $propiedad->fetch(PDO::FETCH_ASSOC);
					$propiedad->closeCursor();
        			$this->ultimo_id = $row['ultimo_id'];
					$msg_exitos[$ind_exito++]="La consulta se realizó con exito.";
					return $propiedad;
				}
	
	}//fin ultimoID

}//Fin class Propiedad

?>