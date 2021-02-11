<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<!-- <link rel="stylesheet" href="https://unpkg.com/purecss@2.0.3/build/pure-min.css" integrity="sha384-4ZPLezkTZTsojWFhpdFembdzFudphhoOzIunR1wH6g1WQDzCAiPvDyitaK67mp0+" crossorigin="anonymous"> -->
<link rel="stylesheet" href="https://unpkg.com/purecss@2.0.3/build/grids-responsive-min.css">
</head>
<body>
<?php 
  require_once("/conexion/consultasBD.php");
?>
<div class="topnav" id="myTopnav">
  <a href="#" id="add">Agregar Cita</a>
  <a href="#" id="edit">Editar Cita</a>
  <a href="#" id="delete">Quitar Cita</a>
  <a href="#" id="lmos">Listar Citas de Mostrador</a>
  <a href="#" id="lprop">Listar Citas de propiedad</a>
  <a href="/../InmohostV2.0/citas/" id="lall">Listar Todas las Citas</a>


  <a href="javascript:void(0);" class="icon" onclick="myFunction()">
    <i class="fa fa-bars"></i>
  </a>
</div>


<script>
function myFunction() {
  var x = document.getElementById("myTopnav");
  if (x.className === "topnav") {
    x.className += " responsive";
  } else {
    x.className = "topnav";
  }
}
</script>






<script src="js/jquery-3.0.0.js" type="text/javascript"></script>
<script src="js/menu.js" type="text/javascript"></script>



<!-- 
Agregar Tasacion
Editar Tasacion
Quitar Tasacion -->


</body>
</html>
