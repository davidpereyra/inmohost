<?php
	extract($_GET);
	extract ($_POST);
	extract ($_REQUEST);

	include("system/php/config.php");
/*
	mysql_query("alter table publicaciones add pub_dia varchar(255)");
	mysql_query("create table cambios_medios (cam_id, pub_id)");
	mysql_query("create table cambios_medios (cam_id int(10), pub_id int(10))");
	mysql_query("alter table publicaciones add pub_env datetime");
*/
	mysql_query("DROP TABLE IF EXISTS `citas`;
				CREATE TABLE `citas` (
				  `cita_id` smallint(6) NOT NULL default '0',
				  `cita_fecha` date default NULL,
				  `cita_hora` time default NULL,
				  `prp_id` smallint(6) default NULL,
				  `cita_desc` varchar(200) default NULL,
				  `estado` tinyint(4) default NULL
				  PRIMARY KEY  (`cita_id`)
				) ENGINE=InnoDB DEFAULT CHARSET=latin1;");
	mysql_query("DROP TABLE IF EXISTS `cita_emp`;
				CREATE TABLE `cita_emp` (
				  `cita_id` smallint(6) NOT NULL default '0',
				  `emp_id` smallint(6) NOT NULL default '0',
				  PRIMARY KEY  (`cita_id`,`emp_id`)
				) ENGINE=InnoDB DEFAULT CHARSET=latin1;");
	mysql_query("create index cita_hora on citas (cita_hora);
				 create index cita_fecha on citas (cita_hora);
				 create index prp_id on citas (cita_hora);");
	mysql_query("alter table propiedades add column prop_id smallint(6) NOT NULL");
	mysql_query("update propiedades set prop_id=-1");
	$res=mysql_query("select propiedades.prp_id, prop_x_prp.prop_id from propiedades, prop_x_prp where propiedades.prp_id=prop_x_prp.prp_id");
	while ($fila=mysql_fetch_array($res)) 
	{
		mysql_query("update propiedades set prop_id=" . $fila[prop_id]);
	}
	
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
						");
	mysql_query("
		DROP TABLE IF EXISTS `interesados`;
		CREATE TABLE `interesados` (
		  `int_id` smallint(6) default NULL,
		  `nombre` varchar(25) default NULL,
		  `apellido` varchar(25) default NULL,
		  `domicilio` varchar(100) default NULL,
		  `telefono` varchar(30) default NULL,
		  `mail` varchar(30) default NULL
		) ENGINE=InnoDB DEFAULT CHARSET=latin1;"
		) or die("No crea tabla INTERESADOS");
		
		mysql_query("
		DROP TABLE IF EXISTS `int_x_cita`;
		CREATE TABLE `int_x_cita` (
		  `int_id` smallint(6) default NULL,
		  `cita_id` smallint(6) default NULL
		) ENGINE=InnoDB DEFAULT CHARSET=latin1;"
		) or die("No crea tabla INT_X_CITA");
		
		mysql_query("create 
							table 
					nov_x_emp (
								nov_id int(6),
								emp_id int(6),
								leida smallint(1),
								primary key(nov_id,emp_id)
							)
		");
		mysql_query("
					DROP TABLE IF EXISTS `notas`;
						CREATE TABLE `notas` (
						  `rub_id` tinyint(3) unsigned default NULL,
						  `nota_id` smallint(6) default NULL,
						  `nombre` varchar(30) default NULL,
						  `apellido` varchar(30) default NULL,
						  `telefono` varchar(30) default NULL,
						  `domicilio` varchar(100) default NULL,
						  `mail` varchar(30) default NULL,
						  `nota` blob
						) ENGINE=InnoDB DEFAULT CHARSET=latin1;
		");

		mysql_query("
		DROP TABLE IF EXISTS `rubros`;
			CREATE TABLE `rubros` (
			  `rub_id` tinyint(3) unsigned default NULL,
			  `rub_desc` varchar(30) default NULL
			) ENGINE=InnoDB DEFAULT CHARSET=latin1;
		");
		
		mysql_query("
		INSERT INTO `rubros` VALUES (15,'Abogados'),(2,'agrimensores'),(3,'alquileres potrerillos'),(4,'bancos'),(5,'clientes'),(6,'escribanias'),(7,'inmobiliarias'),(8,'proveedores'),(9,'tasadores'),(10,'telefonos personal inmo'),(11,'Arquitectos'),(12,'Amigos'),(13,'Doctores y Hospitales'),(16,'Contadores'),(17,'Propietarios'),(18,'Mecánico'),(19,'Computación'),(20,'Gasista'),(21,'Imprenta'),(22,'Consultores'),(23,'Forwarder'),(24,'Potrerillos'),(25,'Mineria'),(26,'Bodegas'),(27,'Mudanzas'),(28,'Recursos Humanos'),(29,'Pizza a domicilio'),(30,'Restaurantes'),(31,'Constructora'),(32,'Centrales Tel'),(33,'Inversores'),(34,'Servicios'),(35,'plomeros'),(36,'Loteos y Urbanizaciones'),(38,'Colegios'),(39,'Consejo Deliberante Mun. Lujan'),(40,'Futbol'),(41,'Obreros'),(42,'Seguros'),(43,'Ingenieros Civiles'),(44,'Alquileres Chile'),(45,'Gestorias automotor'),(46,'Corralón'),(47,'registro'),(48,'Hierros'),(49,'Hoteles y Posadas'),(50,'Correo-Mensajerias'),(51,'MUNICIPALIDAD DE CAPITAL'),(52,'Lista_Boedo'),(53,'Barrio Laderas'),(54,'Consecionarias de Autos'),(55,'Traductores'),(56,'Cabañas Manzano'),(57,'Carpinteria'),(58,'Electricista'),(59,'Herreros'),(60,'Peluquerías'),(61,'Muebles de Oficina'),(62,' Sistema de Riego y piscina'),(63,'Alquileres temporarios'),(64,'Ingenieros Agrónomos'),(65,'Contenedores'),(66,'Radios');
		");
			
?>