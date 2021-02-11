<?php
    include_once 'apicita.php';
    header("Content-Type: application/json");
    
    $method = $_POST['method']; 
    //echo $empleado_id;
    if ($_SERVER['REQUEST_METHOD']=='GET') {
        $empleado_id = $_GET['empleado_id'];  
        $propiedad_id = $_GET['propiedad_id']; 
        # code...
        $api = new ApiCitas();
        if (isset($empleado_id)) {            
            $api->getCitaEmp($empleado_id);
        }else if (isset($propiedad_id)) {
            $api->getCitaProp($propiedad_id);
        }else{
            $api->getAll();
        }
    }else if ($_SERVER['REQUEST_METHOD']=='POST' && $method=='POST') {
        
        $api = new ApiCitas();
        $fecha = $_POST['fecha'];  
        $hora = $_POST['hora'];
        $inmueble = $_POST['inmueble'];  
        $empleado = $_POST['empleado'];
        $descripcion = $_POST['descripcion'];
        $api->setNewCita($fecha,$hora,$inmueble,$empleado,$descripcion);
        header('Location: /../InmohostV2.0/citas/'); 
    }else if ($_SERVER['REQUEST_METHOD']=='POST' && $method=='PUT') {
        $api = new ApiCitas();
        $citaId = $_POST['cita'];  
        $fecha = $_POST['fecha'];  
        $hora = $_POST['hora'];
        $inmueble = $_POST['inmueble'];  
        $empleado = $_POST['empleado'];
        $descripcion = $_POST['descripcion'];
        $api->setEditCita($citaId,$fecha,$hora,$inmueble,$empleado,$descripcion);
        header('Location: /../InmohostV2.0/citas/'); 
        /* echo "method ". $method;
        echo "cita " . $citaId;
        echo " fecha ". $fecha;
        echo " hora" . $hora;
        echo  " inmueble " . $inmueble;
        echo " emp " . $empleado;
        echo " desc " .$descripcion; */
    }else if ($_SERVER['REQUEST_METHOD']=='POST' && $method=='DELETE') {
        $api = new ApiCitas();
        $citaId = $_POST['cita']; 
        $api->setDeleteCita($citaId);
        header('Location: /../InmohostV2.0/citas/'); 

    }
?>       