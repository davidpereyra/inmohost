<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    
    <title>Formularios citas</title>


</head>
<body>


<form action="/../InmohostV2.0/api/calendar/"  method="POST">

  <div class="row">
  <input type="hidden" id="method" name="method" value="DELETE">
   <!-- Listar Citas Previas -->
   <div class="col-12">
      <select class="form-select" id="cita" name="cita" aria-label="Default select example">
        <option selected>Seleccionar Cita a Borrar</option>        
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
    <!-- Boton -->    
    <div class="col-2">
      <button type="submit" class="btn btn-primary">Borrar</button>
    </div>
  </div><!-- row -->
  
</form>



<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
</body>
</html>