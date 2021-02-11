<!DOCTYPE html>
<html lang="en">
<head>
       <meta charset="UTF-8">
       <meta name="viewport" content="width=device-width, initial-scale=1.0">
       <title>Document</title>
</head>
<?php
       date_default_timezone_set('America/Argentina/Mendoza');
       $date = date('Y-m-d H:i:s');
?>              
<body>
       <form action="">
              <label for="start">Seleccionar fecha:</label>
              <input type="date" id="cita_fecha" name="cita_fecha" name="trip-start">
              <input type="submit" value="IR">
       </form>

       
</body>
</html>
