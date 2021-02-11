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
  //Fecha
  $fecha_actual = date("d-m-Y");
?>

<form action="/../../InmohostV2.0/citas/"  method="GET">
  <div class="row">    

     <!-- Listar Inmuebles -->
     <div class="col-6">
      <select name="propiedad_id" class="form-select" aria-label="Default select example">
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
    <div class="col-2">
      <button type="submit" class="btn btn-primary">Buscar</button>
    </div>

  </div><!-- row -->
</form>



<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
</body>
</html>