<? 
	$error[$ind_error++]=array();
	$ind_error=0;
	include("system/php/config.php");
	mysql_query("start transaction");
	mysql_query("alter table publicaciones add pub_dia varchar(255)") or $error[$ind_error++]="No Modifica Tabla Publicaciones: " . mysql_error() ."<br>";
	mysql_query("create table cambios_medios (cam_id int(10), pub_id int(10))") or $error[$ind_error++]="No crea tabla Cambios_Medios: " . mysql_error() ."<br>";
	mysql_query("alter table publicaciones add pub_env datetime") or $error[$ind_error++]="No Modifica Tabla Publicaciones: " . mysql_error() ."<br>";	
	mysql_query("ALTER TABLE `usuarios` add web varchar(50)");
	mysql_query("ALTER TABLE `citas` ADD COLUMN `estado` tinyint(4)") or $error[$ind_error++][$ind_error++]="ALTER TABLE `citas` ADD COLUMN `estado` tinyint(4)";
	mysql_query("UPDATE citas set estado=0 WHERE mostrada=0 AND cancelada=0") or $error[$ind_error++]="UPDATE citas set estado=0 WHERE mostrada=0 AND cancelada=0";
	mysql_query("UPDATE citas set estado=1 WHERE mostrada=0 AND cancelada=1") or $error[$ind_error++]= "UPDATE citas set estado=1 WHERE mostrada=0 AND cancelada=1";
	mysql_query("UPDATE citas set estado=2 WHERE mostrada=1 AND cancelada=0") or $error[$ind_error++]="UPDATE citas set estado=2 WHERE mostrada=1 AND cancelada=0";
	mysql_query("ALTER TABLE `citas` DROP COLUMN `cancelada`") or $error[$ind_error++]="ALTER TABLE `citas` DROP COLUMN `cancelada`";  
	mysql_query("ALTER TABLE `citas` DROP COLUMN `mostrada`") or $error[$ind_error++]="ALTER TABLE `citas` DROP COLUMN `mostrada`";  
	mysql_query("create index cita_hora on citas (cita_hora)")or $error[$ind_error++]="create index cita_hora on citas (cita_hora)";
	mysql_query(" create index cita_fecha on citas (cita_fecha)")or $error[$ind_error++]="create index cita_fecha on citas (cita_fecha)";
	mysql_query(" create index prp_id on citas (prp_id)") or $error[$ind_error++]="create index prp_id on citas (prp_id)";
	mysql_query("alter table propiedades add column prop_id smallint(6) NOT NULL") or $error[$ind_error++]="alter table propiedades add column prop_id smallint(6) NOT NULL" . mysql_error();
	mysql_query("update propiedades set prop_id=-1") or $error[$ind_error++]="alter table propiedades add column prop_id smallint(6) NOT NULL";
	$res=mysql_query("select propiedades.prp_id, prop_x_prp.prop_id from propiedades, prop_x_prp where propiedades.prp_id=prop_x_prp.prp_id") or $error[$ind_error++]="select propiedades.prp_id, prop_x_prp.prop_id from propiedades, prop_x_prp where propiedades.prp_id=prop_x_prp.prp_id";
	
	while ($fila=mysql_fetch_array($res)) 
	{
		mysql_query("update propiedades set prop_id='" . $fila[prop_id]. "' where prp_id='".$fila[prp_id] ."'") or $error[$ind_error++]="update propiedades set prop_id=".$fila[prop_id];
	}
	mysql_query("update propiedades set prp_mostrar=2 where prp_mostrar=3") or $error[$ind_error++]="update propiedades set prp_mostrar=2 where prp_mostrar=3";
	mysql_query("update propiedades set prp_mostrar=3 where prp_mostrar=4") or $error[$ind_error++]="update propiedades set prp_mostrar=2 where prp_mostrar=4";
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
						") or $error[$ind_error++]="create 
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
						";
		//creo la tabla q relacinona novedades por empleado
		mysql_query("create 
							table 
					nov_x_emp (
								nov_id int(6),
								emp_id int(6),
								leida smallint(1),
								primary key(nov_id,emp_id)
							) engine=innodb;
		") or $error[$ind_error++]="create 
							table 
					nov_x_emp (
								nov_id int(6),
								emp_id int(6),
								leida smallint(1),
								primary key(nov_id,emp_id)
							) engine=innodb;
		";
		//traslado las novedades a la nueva tabla
		mysql_query("insert into nov_x_emp select nov_id,emp_hacia,leida from novedades") or $error[$ind_error++]="insert into nov_x_emp select nov_id,emp_hacia,leida from novedades";
		
		//finalmente dropeo la columna leida que ya no se va a usar más
		
		mysql_query("alter table novedades drop leida") or $error[$ind_error++]="alter table novedades drop leida";
		
		mysql_query("alter table novedades drop emp_hacia") or $error[$ind_error++]="alter table novedades drop emp_hacia" ;
		
		mysql_query("alter table novedades add column leida smallint(1) after nov_vig") or $error[$ind_error++]="alter table novedades add column leida smallint(1) after nov_vig" ;
		
		
		mysql_query("alter table notas change nombre nombre varchar(100)") or $error[$ind_error++]="alter table notas change nombre nombre varchar(100)" ;
		
		mysql_query("alter table notas change apellido apellido varchar(100)") or $error[$ind_error++]="alter table notas change apellido apellido varchar(100);" ;
		
		mysql_query("alter table notas change nota nota text") or $error[$ind_error++]="alter table notas change nota nota text;" ;
		
		
		mysql_query("alter table demandas change con_id con_id varchar(100)") or $error[$ind_error++]="alter table demandas change con_id con_id varchar(100)" ;
		
		mysql_query("alter table demandas change tip_id tip_id varchar(100)") or $error[$ind_error++]="alter table demandas change tip_id con_id varchar(100)" ;
		
		mysql_query("alter table demandas change loc_id loc_id varchar(100)") or $error[$ind_error++]="alter table demandas change loc_id con_id varchar(100)" ;
		
		mysql_query("alter table demandas add dem_pre_max int(10)") or $error[$ind_error++]="alter table demandas add dem_pre_max int(10)" ;
		
		mysql_query("alter table demandas change dem_pre dem_pre_min int(10)") or $error[$ind_error++]="alter table demandas change dem_pre dem_pre_min int(10)" ;
		
		mysql_query("insert into parametros values ('mail_usr','')");	
		mysql_query("insert into parametros values ('mail_pass','')");
		mysql_query("insert into parametros values ('mail_smtp','smtp.grupoclick.com.ar')");
		mysql_query("insert into parametros values ('mail_pop','pop.grupoclick.com.ar')");

		mysql_query("alter table demandas change dem_barr dem_barr varchar(100)");
		mysql_query("alter table demandas change dem_mail dem_mail varchar(100)");
		mysql_query("alter table demandas change dem_tel dem_tel varchar(100)");
		mysql_query("alter table demandas change dem_raz dem_raz varchar(100)");
		
		mysql_query("ALTER TABLE `receptores` add med_raz varchar(50)");
		mysql_query("create table red_cim_cle (usr_id_1 int(10),usr_id_2 int(10),compartir tinyint(1), primary key(usr_id_1,usr_id_2))");
		mysql_query("create table red_cim_sol (usr_id_d int(10),usr_id_h int(10))");
		mysql_query("create table red_cim_acc (usr_id int(10))");
		
		if ($ind_error==0)
		{
			print "Cambios Realizados. <br> HACIENDO COMMIT";
			mysql_query("commit");
			$res=mysql_query("show tables");
			while ($fila=mysql_fetch_array($res)) {
				$cons="alter table $fila[0] engine=innodb";
				mysql_query($cons);
			}
			
		}
		else 
		{
			print "Se registraron errores al hacer los cambios. <br>HACIENDO ROLLBACK<br> Listado de Errores";
			for ($i=0;$i<count($error);$i++) print $error[$i]."<br>";
			mysql_query("rollback");
		}
		
		
?>