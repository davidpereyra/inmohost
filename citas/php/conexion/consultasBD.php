<!--  -->
<?php 

require_once("/../../../system/php/conexion.php");

function getPropiedades(){      
  $query = mysql_query("SELECT DISTINCT propiedades.prp_id, propiedades.prp_dom, propiedades.prp_bar,propiedades.prp_pre, propiedades.prp_llave, tipo_const.tip_desc,condiciones.con_desc
  FROM propiedades 
  INNER JOIN tipo_const ON propiedades.tip_id = tipo_const.tip_id
  INNER JOIN condiciones ON propiedades.con_id=condiciones.con_id
  WHERE propiedades.`prp_mostrar` = 1 
  ORDER BY propiedades.prp_id ASC");
  return $query;
}
function getEmpleados(){      
  $query = mysql_query("SELECT empleados.nombre,empleados.apellido,empleados.emp_id FROM empleados");
  return $query;
}

function getCitasComp(){
  date_default_timezone_set('America/Argentina/Mendoza');
  $fechaA = date('Y-m-d');        
  $fecha = strtotime ( '-15 day' , strtotime ( $fechaA ) ) ;
  $fecha = date ( 'Y-m-d' , $fecha );
  $query = mysql_query("SELECT citas.cita_id, citas.cita_fecha, citas.cita_hora, citas.cita_hora, propiedades.prp_id, propiedades.prp_dom, propiedades.prp_bar, empleados.nombre, empleados.apellido
  FROM citas
  INNER JOIN cita_emp ON citas.cita_id = cita_emp.cita_id
  INNER JOIN empleados ON empleados.emp_id = cita_emp.emp_id
  INNER JOIN propiedades ON citas.prp_id = propiedades.prp_id
  WHERE citas.cita_fecha >= '$fecha';");
  return $query;
}

?>