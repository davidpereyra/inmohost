<? 
	$HOST="localhost";     
	$USUARIO="inmo";
	$PASSWORD="inmo";
	$BASE_DATOS="inmodb";
	$db=mysql_connect($HOST,$USUARIO,$PASSWORD);
	mysql_select_db($BASE_DATOS,$db);
	

	$usr_id=mysql_result(mysql_query("select valor from parametros where nom_var='usr_inmo'"),0,0);
	
	$ind_error=0;
	$error=array();
	
	mysql_query("BEGIN TRANSACTION");
	
	mysql_query("alter table publicaciones add pub_dia varchar(255)") or $error[$ind_error++]="No Modifica Tabla Publicaciones: " . mysql_error() ."<br>";
	mysql_query("alter table publicaciones add pub_env datetime") or $error[$ind_error++]="No Modifica Tabla Publicaciones: " . mysql_error() ."<br>";
	mysql_query("create table cambios_medios (cam_id int(10), pub_id int(10))") or $error[$ind_error++]="No crea tabla Cambios_Medios: " . mysql_error() ."<br>";
	


	/******************************************************************************************/
	/*********************************** CREATES **********************************************/
	/******************************************************************************************/
	mysql_query("DROP TABLE IF EXISTS `citas`") or $error[$ind_error++]="No borra tabla CITAS: " . mysql_error() ."<br>";
	mysql_query("
				CREATE TABLE `citas` (
				  `cita_id` smallint(6) NOT NULL default '0',
				  `cita_fecha` date default NULL,
				  `cita_hora` time default NULL,
				  `prp_id` smallint(6) default NULL,
				  `cita_desc` varchar(200) default NULL,
				  `estado` tinyint(4) default '0',
				  PRIMARY KEY  (`cita_id`)
				) ENGINE=InnoDB DEFAULT CHARSET=latin1"
				)or $error[$ind_error++]="No crea tabla CITAS: " . mysql_error() ."<br>";
	mysql_query("DROP TABLE IF EXISTS `cita_emp`") or $error[$ind_error++]="No borra tabla CITAS_EMP: " . mysql_error() ."<br>";
	mysql_query("
				CREATE TABLE `cita_emp` (
				  `cita_id` smallint(6) NOT NULL default '0',
				  `emp_id` smallint(6) NOT NULL default '0',
				  PRIMARY KEY  (`cita_id`,`emp_id`)
				) ENGINE=InnoDB DEFAULT CHARSET=latin1"
				)or $error[$ind_error++]="No crea tabla CITAS_EMP " . mysql_error() ."<br>";
	mysql_query("DROP TABLE IF EXISTS `banners`") or $error[$ind_error++]="No borra tabla BANNERS: " . mysql_error() ."<br>";
	mysql_query("create 
						table 
				banners 
						(ban_id int(10),
						ban_url varchar(255),
						ban_mos tinyint(1),
						ban_exp datetime,
						ban_tpo time,
						ban_col varchar(50),
						ban_alp int(10),
						ban_des varchar(200),
						ban_tar varchar(100),
						primary key(ban_id))
						") or $error[$ind_error++]="No crea tabla BANNERS ". mysql_error() ."<br>";
	mysql_query("DROP TABLE IF EXISTS `interesados`") or $error[$ind_error++]="No borra tabla INTERESADOS: " . mysql_error() ."<br>";
	mysql_query("
		CREATE TABLE `interesados` (
		  `int_id` smallint(6) default NULL,
		  `nombre` varchar(25) default NULL,
		  `apellido` varchar(25) default NULL,
		  `domicilio` varchar(100) default NULL,
		  `telefono` varchar(30) default NULL,
		  `mail` varchar(30) default NULL
		) ENGINE=InnoDB DEFAULT CHARSET=latin1"
		) or $error[$ind_error++]="No crea tabla INTERESADOS " . mysql_error() ."<br>";
	mysql_query("DROP TABLE IF EXISTS `int_x_cita`") or $error[$ind_error++]="No borra tabla int_x_cita: " . mysql_error() ."<br>";
	mysql_query("
		CREATE TABLE `int_x_cita` (
		  `int_id` smallint(6) default NULL,
		  `cita_id` smallint(6) default NULL
		) ENGINE=InnoDB DEFAULT CHARSET=latin1"
		) or $error[$ind_error++]="No crea tabla INT_X_CITA " . mysql_error() ."<br>";
	mysql_query("DROP TABLE IF EXISTS `nov_x_emp`") or $error[$ind_error++]="No borra tabla nov_x_emp: " . mysql_error() ."<br>";		
	mysql_query("create 
					table 
				 nov_x_emp (
							nov_id int(6),
							emp_id int(6),
							leida smallint(1),
							primary key(nov_id,emp_id)
						)
		") or $error[$ind_error++]="No crea tabla NOV_X_EMP " . mysql_error() ."<br>";
	mysql_query("DROP TABLE IF EXISTS `notas`") or $error[$ind_error++]="No borra tabla NOTAS: " . mysql_error() ."<br>";
	mysql_query("
		CREATE TABLE `notas` (
					  `rub_id` tinyint(3) unsigned default NULL,
					  `nota_id` smallint(6) default NULL,
					  `nombre` varchar(30) default NULL,
					  `apellido` varchar(30) default NULL,
					  `telefono` varchar(30) default NULL,
					  `domicilio` varchar(100) default NULL,
					  `mail` varchar(30) default NULL,
					  `nota` blob
				) ENGINE=InnoDB DEFAULT CHARSET=latin1
	") or $error[$ind_error++]="No crea tabla NOTAS " . mysql_error() ."<br>";
	mysql_query("DROP TABLE IF EXISTS `rubros`") or $error[$ind_error++]="No borra tabla RUBROS: " . mysql_error() ."<br>";
	mysql_query("
		CREATE TABLE `rubros` (
			  `rub_id` tinyint(3) unsigned default NULL,
			  `rub_desc` varchar(30) default NULL
			) ENGINE=InnoDB DEFAULT CHARSET=latin1
	") or $error[$ind_error++]="No crea tabla RUBROS " . mysql_error() ."<br>";
	mysql_query("DROP TABLE IF EXISTS `demandas`") or $error[$ind_error++]="No borra tabla DEMANDAS: " . mysql_error() ."<br>";
	mysql_query("
		CREATE TABLE `demandas` (
			  `dem_id` tinyint(3) unsigned NOT NULL auto_increment,
			  `dem_raz` varchar(100) NOT NULL default '',
			  `dem_tel` varchar(100) default NULL,
			  `dem_mail` varchar(100) default NULL,
			  `dem_desc` text,
			  `dem_fecha` date default NULL,
			  `dem_barr` varchar(100) default NULL,
			  `loc_id` varchar(100) default NULL,
			  `pro_id` tinyint(3) unsigned NOT NULL default '0',
			  `pai_id` tinyint(3) unsigned NOT NULL default '0',
			  `dem_pre_min` int(10) default NULL,
			  `con_id` varchar(100) default NULL,
			  `tip_id` varchar(100) default NULL,
			  `dem_dom` varchar(100) default NULL,
			  `dem_pre_max` int(10) default NULL,
		  PRIMARY KEY  (`dem_id`),
		  KEY `loc_id` (`loc_id`),
		  KEY `pro_id` (`pro_id`),
		  KEY `pai_id` (`pai_id`)
		) ENGINE=InnoDB DEFAULT CHARSET=latin1"
	) or $error[$ind_error++]="No crea tabla DEMANDAS " . mysql_error() ."<br>";
	mysql_query("DROP TABLE IF EXISTS `red_cim_cle`") or $error[$ind_error++]="No borra tabla rec_cim_cle: " . mysql_error() ."<br>";
	mysql_query("create table red_cim_cle (usr_id_1 int(10),usr_id_2 int(10),compartir tinyint(1), primary key(usr_id_1,usr_id_2))") or $error[$ind_error++]="No crea tabla red_cim_cle " . mysql_error() ."<br>";
	mysql_query("DROP TABLE IF EXISTS `red_cim_sol`") or $error[$ind_error++]="No borra tabla rec_cim_sol: " . mysql_error() ."<br>";
	mysql_query("create table red_cim_sol (usr_id_d int(10),usr_id_h int(10))") or $error[$ind_error++]="No crea tabla red_cim_sol " . mysql_error() ."<br>";
	mysql_query("DROP TABLE IF EXISTS `red_cim_acc`") or $error[$ind_error++]="No borra tabla rec_cim_cle: " . mysql_error() ."<br>";
	mysql_query("create table red_cim_acc (usr_id int(10))")  or $error[$ind_error++]="No crea tabla red_cim_acc ". mysql_error() ."<br>";
	
	/******************************************************************************************************/
	/****************************************   CREACION DE INDICES  **************************************/
	/******************************************************************************************************/
	mysql_query("create index cita_hora on citas (cita_hora)") or $error[$ind_error++]="Error al crear indice en cita_hora " . mysql_error() ."<br>";
	mysql_query("create index cita_fecha on citas (cita_fecha)") or $error[$ind_error++]="Error al crear indice en cita_fecha ". mysql_error() ."<br>";
	mysql_query("create index prp_id on citas (prp_id);") or $error[$ind_error++]="Error al crear indice en prp_id ". mysql_error() ."<br>";

	/******************************************************************************************************/
	/**************************************   MODIFICACIONES DE TABLAS  ***********************************/
	/******************************************************************************************************/	
	mysql_query("alter table propiedades add column prop_id smallint(6) NOT NULL") or $error[$ind_error++]="Error al modificar tabla propiedades con PROP_ID ". mysql_error() ."<br>";
	mysql_query("update propiedades set prop_id=-1") or $error[$ind_error++]="Error al modificar tabla propiedades con prop_id=-1 ". mysql_error() ."<br>";
	mysql_query("ALTER TABLE `usuarios` add usr_ccpim smallint(1)") or $error[$ind_error++]="Error al modificar tabla usuarios con usr_ccpim ". mysql_error() ."<br>";
	mysql_query("ALTER TABLE `usuarios` add usr_fot varchar(150)") or $error[$ind_error++]="Error al modificar tabla usuarios con usr_fot ". mysql_error() ."<br>";	
	mysql_query("ALTER TABLE `usuarios` add titular varchar(100)") or $error[$ind_error++]="Error al modificar tabla usuarios con titular ". mysql_error() ."<br>";
	mysql_query("ALTER TABLE `usuarios` add web varchar(50)") or $error[$ind_error++]="Error al modificar tabla usuarios con web ". mysql_error() ."<br>";
	
	mysql_query("alter table notas change nombre nombre varchar(100)") or $error[$ind_error++]="alter table notas change nombre nombre varchar(100) " . mysql_error() ."<br>";
	mysql_query("alter table notas change apellido apellido varchar(100)") or $error[$ind_error++]="alter table notas change apellido apellido varchar(100); ". mysql_error() ."<br>"; ;
	mysql_query("alter table notas change nota nota text") or $error[$ind_error++]="alter table notas change nota nota text; " . mysql_error() ."<br>";
	mysql_query("ALTER TABLE `receptores` add med_raz varchar(50)") or $error[$ind_error++]="ALTER TABLE `receptores` add med_raz varchar(50) " . mysql_error() ."<br>";
	mysql_query("alter table novedades drop leida") or $error[$ind_error++]="alter table novedades drop leida";
	mysql_query("alter table novedades drop emp_hacia") or $error[$ind_error++]="alter table novedades drop emp_hacia" ;
	mysql_query("alter table novedades add nov_hora time") or $error[$ind_error++]="alter table novedades add nov_hora time " . mysql_error() ."<br>";
	/******************************************************************************************************/
	/*********************************************   UPDATEs  *********************************************/
	/******************************************************************************************************/
	mysql_query("update propiedades set prp_mostrar=2 where prp_mostrar=0") or $error[$ind_error++]="update propiedades set prp_mostrar=2 where prp_mostrar=0";
	$res=mysql_query("select propiedades.prp_id, prop_x_prp.prop_id from propiedades, prop_x_prp where propiedades.prp_id=prop_x_prp.prp_id and propiedades.usr_id=$usr_id") or $error[$ind_error++]="Error al Obtener propiedades para MODIFICAR ". mysql_error() ."<br>";
	while ($fila=mysql_fetch_array($res)) 
	{
		mysql_query("update propiedades set prop_id=" . $fila[prop_id] ." where prp_id=" . $fila[prp_id])  or $error[$ind_error++]="Error al modificar prop_id con de propiedad ". mysql_error() ."<br>";
	}
	mysql_query("select propiedades.prp_id, prop_x_prp.prop_id from propiedades, prop_x_prp where propiedades.prp_id=prop_x_prp.prp_id and propiedades.usr_id=$usr_id") or $error[$ind_error++]="Error al Obtener propiedades para MODIFICAR ". mysql_error() ."<br>";

	/******************************************************************************************************/
	/*********************************************   INSERTs  *********************************************/
	/******************************************************************************************************/		
	mysql_query("
		INSERT INTO `rubros` VALUES (15,'Abogados'),(2,'agrimensores'),(3,'alquileres potrerillos'),(4,'bancos'),(5,'clientes'),(6,'escribanias'),(7,'inmobiliarias'),(8,'proveedores'),(9,'tasadores'),(10,'telefonos personal inmo'),(11,'Arquitectos'),(12,'Amigos'),(13,'Doctores y Hospitales'),(16,'Contadores'),(17,'Propietarios'),(18,'Mecánico'),(19,'Computación'),(20,'Gasista'),(21,'Imprenta'),(22,'Consultores'),(23,'Forwarder'),(24,'Potrerillos'),(25,'Mineria'),(26,'Bodegas'),(27,'Mudanzas'),(28,'Recursos Humanos'),(29,'Pizza a domicilio'),(30,'Restaurantes'),(31,'Constructora'),(32,'Centrales Tel'),(33,'Inversores'),(34,'Servicios'),(35,'plomeros'),(36,'Loteos y Urbanizaciones'),(38,'Colegios'),(39,'Consejo Deliberante Mun. Lujan'),(40,'Futbol'),(41,'Obreros'),(42,'Seguros'),(43,'Ingenieros Civiles'),(44,'Alquileres Chile'),(45,'Gestorias automotor'),(46,'Corralón'),(47,'registro'),(48,'Hierros'),(49,'Hoteles y Posadas'),(50,'Correo-Mensajerias'),(51,'MUNICIPALIDAD DE CAPITAL'),(52,'Lista_Boedo'),(53,'Barrio Laderas'),(54,'Consecionarias de Autos'),(55,'Traductores'),(56,'Cabañas Manzano'),(57,'Carpinteria'),(58,'Electricista'),(59,'Herreros'),(60,'Peluquerías'),(61,'Muebles de Oficina'),(62,' Sistema de Riego y piscina'),(63,'Alquileres temporarios'),(64,'Ingenieros Agrónomos'),(65,'Contenedores'),(66,'Radios');
		")  or $error[$ind_error++]="Error al insertar RUBROS ". mysql_error() ."<br>";
	mysql_query("insert into parametros values ('mail_usr','')") or $error[$ind_error++]="Error al insertar en PARAMETROS ". mysql_error() ."<br>";	
	mysql_query("insert into parametros values ('mail_pass','')")  or $error[$ind_error++]="Error al insertar en PARAMETROS ". mysql_error() ."<br>";
	mysql_query("insert into parametros values ('mail_smtp','smtp.grupoclick.com.ar')")  or $error[$ind_error++]="Error al insertar en PARAMETROS ". mysql_error() ."<br>";
	mysql_query("insert into parametros values ('mail_pop','pop.grupoclick.com.ar')") or $error[$ind_error++]="Error al insertar en PARAMETROS ". mysql_error() ."<br>";
	$res=mysql_query("show tables");
	while ($fila=mysql_fetch_array($res)) {
		$cons="alter table $fila[0] engine=innodb";
		mysql_query($cons);
	}
	if ($error)
	{
		for($i=0;$i<count($error);$i++)
		{
			print $error[$i] . "<br>";
		}
		print "Haciendo ROLLBACK de las ACCIONES";
		mysql_query("rollback");
	}
	else 
	{
		mysql_query("commit");
		
		$res=mysql_query("show tables");
		while ($fila=mysql_fetch_array($res)) {
			$cons="alter table $fila[0] engine=innodb";
			mysql_query($cons);
		}
		
		print "CAMBIOS realizados<br>";
	}
	
	
?>