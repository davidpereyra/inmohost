<!DOCTYPE html>
<html>
<head>
<meta charset='utf-8' />
<link href='lib/main.css' rel='stylesheet' />
<script src='lib/main.js'></script>
<!-- Estilos Personalizados -->
<link rel="stylesheet" href="css/style.css">

<?php
  //para consumir el json que viene de la BD
  
  if (isset($_GET['empleado_id'])) {//cita de empleado
    $empleado_id = $_GET['empleado_id'];
    //echo $empleado_id;
    file_get_contents('http://localhost/InmohostV2.0/api/calendar/?empleado_id='.$empleado_id);
  }elseif (isset($_GET['propiedad_id'])) {//cita por propiedad
    $propiedad_id = $_GET['propiedad_id'];
    file_get_contents('http://localhost/InmohostV2.0/api/calendar/?propiedad_id='.$propiedad_id);
  }else {//Todas las citas
    file_get_contents('http://localhost/InmohostV2.0/api/calendar/');
  }
  
  date_default_timezone_set('America/Argentina/Mendoza');
     $fechaA = date('Y-m-d');
     //echo $fechaA;  
?>

<script>

  document.addEventListener('DOMContentLoaded', function() {
    var calendarEl = document.getElementById('calendar');

    var calendar = new FullCalendar.Calendar(calendarEl, {
      headerToolbar: {
        left: 'prev,next today',
        center: 'title',
        right: 'dayGridMonth,timeGridWeek,timeGridDay,listWeek'
      },
      initialDate: '<?php echo $fechaA; ?>',
      editable: true,
      navLinks: true, // can click day/week names to navigate views
      dayMaxEvents: true, // allow "more" link when too many events
      events: {
        url: 'php/get-events.php',
        failure: function() {
          document.getElementById('script-warning').style.display = 'block'
        }
      },
      loading: function(bool) {
        document.getElementById('loading').style.display =
          bool ? 'block' : 'none';
      }
    });

    calendar.render();
  });

</script>


</head>
<body>

<?php  
  include("php/menu.php");

?>

    <div class="container  oculto" id="agregar_cita" >
      <?php 
        include("php/form_citas/form_agregar_cita.php");
      ?>
    </div>
    <div class="container  oculto" id="buscar_cita_mostrador" >
      <?php 
        include("php/form_citas/form_get_cita_emp.php");
      ?>
    </div>
    <div class="container  oculto" id="buscar_cita_propiedad" >
      <?php 
        include("php/form_citas/form_get_cita_prop.php");
      ?>
    </div>
    <div class="container  oculto" id="editar_cita" >
      <?php 
        include("php/form_citas/form_editar_cita.php");
      ?>
    </div>
    <div class="container  oculto" id="quitar_cita" >
      <?php 
        include("php/form_citas/form_quitar_cita.php");
      ?>
    </div>
    <div id='script-warning'>
      <code>php/get-events.php</code> must be running.
    </div>

    <div id='loading'>loading...</div>

    <div id='calendar'></div>


  </body>
</html>
