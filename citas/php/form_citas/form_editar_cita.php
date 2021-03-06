<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    
    <title>Formularios citas</title>


</head>
<body>

<?php

  
  date_default_timezone_set('America/Argentina/Mendoza');
  $today = date('Y-m-d');
  //Calculo RANGO de Hora
  $var1 = '09:00:00';
  $var2 = '20:00:00';
  $intervarlo = '15';
  $horaInicio1 = new DateTime($var1);
  $horaFin1 = new DateTime($var2);
  $horaFin1 = $horaFin1->modify( '+15 minutes' ); 
  $rangoHoras1 = new DatePeriod($horaInicio1, new DateInterval('PT15M'), $horaFin1);           
  foreach($rangoHoras1 as $fecha){
    $listahora[] = $fecha->format("H:i") . PHP_EOL;
  }	
  //Calculo RANGO de Fechas
  $fecha_actual = date("d-m-Y");
/*   for ($i=0; $i <15 ; $i++) { 
    $dia[$i] = date("Y-m-d",strtotime($fecha_actual."+ 1 days")); 
  }
     */
?>

<form action="/../InmohostV2.0/api/calendar/"  method="POST">
<input type="hidden" id="method" name="method" value="PUT">
  <div class="row">
   <!-- Listar Citas Previas -->
   <div class="col-12">
      <select class="form-select" id="cita" name="cita" required>
        <option selected>Seleccionar Cita a Editar</option>        
        <?php $citasComp = getCitasComp();
        while ($fila = mysql_fetch_assoc($citasComp)){?>         
          <option value="<?php echo $fila['cita_id'];?>">
            <?php     
              echo  $fila['cita_fecha'] . " " .  $fila['cita_hora'] ." Cita Id ".$fila['cita_id'] ." - Propiedad: ".  $fila['prp_id'] . " - ".  $fila['prp_dom'] . " " .  $fila['prp_bar']. " Empleado: " .  $fila['nombre']. " " .  $fila['apellido'] ;
            ?>            
          </option> 
        <?php }?>       
      </select>
    </div>
  </div>

  <div class="row">
  <p>Datos a ingresar:</p>
    
    <!-- Listar Fecha -->    
    <div class="col-2">
      <input type="date" id="fecha" name="fecha" min="<?php echo $today?>" max="<?php echo date("Y-m-d",strtotime($fecha_actual."+ 15 days"));?>" required>
    </div>

    <!-- Listar Horario -->
    <div class="col-2">
      <select class="form-select" id="hora" name="hora" required>
        <option selected>Horario</option>
        <?php foreach($listahora as $hora){?>
          <option value="<?php echo date("H:i:s",strtotime($hora));?>"><?php echo $hora;?></option>          
        <?php }?>
      </select>
    </div>

    <!-- Listar Inmuebles -->
    <div class="col-4">
      <select class="form-select" id="inmueble" name="inmueble" required>
        <option selected>Inmueble</option>        
        <?php $propiedades = getPropiedades();
        while ($fila = mysql_fetch_assoc($propiedades)) {?>         
          <option value="<?php echo $fila['prp_id'];?>">
            <?php     
              echo $fila['prp_id'] . " - " .  $fila['tip_desc'] . " - " .  $fila['con_desc'] . " - ".  $fila['prp_dom'] . " - $".  $fila['prp_pre'] . " - llave: " .  $fila['prp_llave'] ;
            ?>            
          </option> 
        <?php }?>       
      </select>
    </div>

    <!-- Listar Empleados -->
    <div class="col-2">
      <select class="form-select"  id="empleado" name="empleado">
        <?php $empleados = getEmpleados();
        while ($filae = mysql_fetch_assoc($empleados)) {?>         
          <option value="<?php echo $filae['emp_id'];?>">
            <?php     
              echo $filae['nombre'] . " " .  $filae['apellido'];
            ?>            
          </option> 
        <?php }?>       
      </select>
    </div>
  </div><!-- row -->
  <div class="row">
    <!-- Descripcion -->    
    <div class="col-6"> 
    <br>   
      <textarea class="form-control" id="descripcion" name="descripcion" aria-label="With textarea" required></textarea>
    </div>
    <!-- Boton -->    
    <div class="col-2">
    <br><br>
      <button type="submit" class="btn btn-primary">Editar</button>
    </div>
  </div><!-- row -->
  
</form>



<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
</body>
</html>