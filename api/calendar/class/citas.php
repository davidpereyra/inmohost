<?php 
include_once '/../../config/conecBD.php';
class Citas extends DB{
    
    function obtenerCitas(){
        date_default_timezone_set('America/Argentina/Mendoza');
        $fechaA = date('Y-m-d');        
        $fecha = strtotime ( '-30 day' , strtotime($fechaA) ) ;
        $fecha = date ('Y-m-d' , $fecha);        
        $query = $this->connect()->query("SELECT citas.cita_id, citas.cita_fecha, citas.cita_hora, citas.cita_desc, propiedades.prp_id, propiedades.prp_dom, empleados.nombre,empleados.apellido
            FROM citas
            INNER JOIN cita_emp ON citas.cita_id = cita_emp.cita_id
            INNER JOIN empleados ON cita_emp.emp_id = empleados.emp_id
            INNER JOIN propiedades ON citas.prp_id = propiedades.prp_id
            WHERE citas.cita_fecha >= '$fecha';
        ");
        return $query;
    }
    function obtenerCitasEmpleado($empleado){
        date_default_timezone_set('America/Argentina/Mendoza');
        $fechaA = date('Y-m-d');        
        $fecha = strtotime ( '-90 day' , strtotime ( $fechaA ) ) ;
        $fecha = date ( 'Y-m-d' , $fecha );        
        $query = $this->connect()->query("SELECT citas.cita_id, citas.cita_fecha, citas.cita_hora, citas.cita_desc, propiedades.prp_id, propiedades.prp_dom
        FROM citas
        INNER JOIN cita_emp ON citas.cita_id = cita_emp.cita_id
        INNER JOIN empleados ON cita_emp.emp_id = empleados.emp_id
        INNER JOIN propiedades ON citas.prp_id = propiedades.prp_id
        WHERE cita_emp.emp_id =$empleado AND citas.cita_fecha >= '$fecha';"  );
        return $query;
    }

    function obtenerCitasPropiedad($propiedad){
        date_default_timezone_set('America/Argentina/Mendoza');
        $fechaA = date('Y-m-d');        
        $fecha = strtotime ( '-90 day' , strtotime ( $fechaA ) ) ;
        $fecha = date ( 'Y-m-d' , $fecha );        
        $query = $this->connect()->query("SELECT citas.cita_id, citas.cita_fecha, citas.cita_hora, citas.cita_desc, propiedades.prp_id, propiedades.prp_dom
        FROM citas
        INNER JOIN cita_emp ON citas.cita_id = cita_emp.cita_id
        INNER JOIN empleados ON cita_emp.emp_id = empleados.emp_id
        INNER JOIN propiedades ON citas.prp_id = propiedades.prp_id
        WHERE propiedades.prp_id =$propiedad AND citas.cita_fecha >= '$fecha';"  );
        return $query;
    }


    function getUltimoId(){
        $consulta=$this->connect()->prepare("SELECT max(cita_id) as cita_id FROM citas;");
        $consulta->execute();                              
                return $consulta->fetch(PDO::FETCH_OBJ);
       /*  $query = $this->connect()->query("SELECT max(cita_id) FROM citas;");
        return $query; */
    }
    function insertarCita($citaId,$fecha,$hora,$inmueble,$empleado,$descripcion){
        date_default_timezone_set('America/Argentina/Mendoza');               
        $query = $this->connect()->query("INSERT INTO citas (cita_id,cita_fecha,cita_hora,prp_id,cita_desc)
        VALUES ('$citaId','$fecha', '$hora', '$inmueble', '$descripcion');"); 
        $querie = $this->connect()->query("INSERT INTO cita_emp (cita_id,emp_id)
        VALUES ('$citaId','$empleado');");
        return $query;
    }

    function editarCita($citaId,$fecha,$hora,$inmueble,$empleado,$descripcion){                     
        $query = $this->connect()->query("UPDATE citas 
        SET cita_id='$citaId',cita_fecha='$fecha',cita_hora='$hora',prp_id='$inmueble',cita_desc='$descripcion',estado=0 
        WHERE citas.cita_id = '$citaId';"); 
        $querie = $this->connect()->query("UPDATE cita_emp SET cita_id='$citaId',emp_id='$empleado'
        WHERE cita_emp.cita_id = '$citaId';");
        //return $query;
    }
    function borrarCita($citaId){                     
        $query = $this->connect()->query("DELETE FROM `citas` WHERE citas.cita_id = '$citaId';"); 
        $querie = $this->connect()->query("DELETE FROM `cita_emp` WHERE  cita_emp.cita_id = '$citaId';");
        //return $query;
    }
 
}

?>