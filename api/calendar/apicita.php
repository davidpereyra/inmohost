<?php
include_once 'class/citas.php';

class ApiCitas{
    //GET
    function getAll(){
        $cita = new Citas();
        $citas = array();
        $res = $cita->obtenerCitas();
        if($res->rowCount()){
            while ($row = $res->fetch(PDO::FETCH_ASSOC)){
                $item=array(
                    "title" => "(ID: ". $row['prp_id']  . ") DOMICILIO: " .$row['prp_dom']." MONITOR: ". $row['nombre'] . " ". $row['apellido'] . " DESCRIPCION: " .$row['cita_desc'],
                    "start" => $row['cita_fecha'] . "T" .$row['cita_hora'] ,
                );
                array_push($citas, $item);
            }
            $json_string = json_encode($citas);            
            echo $json_string;
            $file = 'citas.json';
            file_put_contents($file, $json_string);
        }else{
            //echo json_encode(array('mensaje' => 'No hay elementos'));
            $json_string = json_encode($citas);
            echo $json_string;
            $file = 'citas.json';
            file_put_contents($file, $json_string);
        }
        exit();
    }
    function getCitaEmp($empleado){
        $cita = new Citas();
        $citas = array();        
        $res = $cita->obtenerCitasEmpleado($empleado);
        if($res->rowCount()){
            while ($row = $res->fetch(PDO::FETCH_ASSOC)){
                $item=array(                   
                    "title" => "(ID: ". $row['prp_id']  . ") DOMICILIO: " .$row['prp_dom']." MONITOR: ". $row['nombre'] . " ". $row['apellido'] . " DESCRIPCION: " .$row['cita_desc'],
                    "start" => $row['cita_fecha'] . "T" .$row['cita_hora'] ,
                );
                array_push($citas, $item);                
            }        
            $json_string = json_encode($citas);            
            echo $json_string;
            $file = 'citas.json';
            file_put_contents($file, $json_string);
        }else{
             //echo json_encode(array('mensaje' => 'No hay elementos'));
             $json_string = json_encode($citas);
             echo $json_string;
            $file = 'citas.json';
            file_put_contents($file, $json_string);
        }
    } 
    function getCitaProp($propiedad){
        $cita = new Citas();
        $citas = array();        
        $res = $cita->obtenerCitasPropiedad($propiedad);
        if($res->rowCount()){
            while ($row = $res->fetch(PDO::FETCH_ASSOC)){
                $item=array(                   
                    "title" => "(ID: ". $row['prp_id']  . ") DOMICILIO: " .$row['prp_dom']." MONITOR: ". $row['nombre'] . " ". $row['apellido'] . " DESCRIPCION: " .$row['cita_desc'],
                    "start" => $row['cita_fecha'] . "T" .$row['cita_hora'] ,
                );
                array_push($citas, $item);                
            }        
            $json_string = json_encode($citas);            
            echo $json_string;
            $file = 'citas.json';
            file_put_contents($file, $json_string);
        }else{
             //echo json_encode(array('mensaje' => 'No hay elementos'));
            $json_string = json_encode($citas);
            echo $json_string;
            $file = 'citas.json';
            file_put_contents($file, $json_string);
        }
    } 

    //SET
    function setNewCita($fecha,$hora,$inmueble,$empleado,$descripcion){
        
        $cita = new Citas();
        $ultimoId = $cita->getUltimoId();
        $citaId = $ultimoId->cita_id +1;
        $cita->insertarCita($citaId,$fecha,$hora,$inmueble,$empleado,$descripcion);
        $citas = array();
        $res = $cita->obtenerCitas();
        if($res->rowCount()){
            while ($row = $res->fetch(PDO::FETCH_ASSOC)){
                $item=array(
                    "title" => "(ID: ". $row['prp_id']  . ") DOMICILIO: " .$row['prp_dom']." MONITOR: ". $row['nombre'] . " ". $row['apellido'] . " DESCRIPCION: " .$row['cita_desc'],
                    "start" => $row['cita_fecha'] . "T" .$row['cita_hora'] ,
                );
                array_push($citas, $item);
            }
            $json_string = json_encode($citas);            
            //Descomentar para que devuelva el json pero no funcionara el redireccionamiento del index.php
            //echo $json_string;
            $file = 'citas.json';
            file_put_contents($file, $json_string);
        }else{
            echo json_encode(array('mensaje' => 'No hay elementos'));
            $json_string = json_encode($citas);
            echo $json_string;
            $file = 'citas.json';
            file_put_contents($file, $json_string);
        } 

        //exit();
    }

    function setEditCita($citaId,$fecha,$hora,$inmueble,$empleado,$descripcion){        
        $cita = new Citas();                
        $cita->editarCita($citaId,$fecha,$hora,$inmueble,$empleado,$descripcion);
        $citas = array();
        $res = $cita->obtenerCitas();
        if($res->rowCount()){
            while ($row = $res->fetch(PDO::FETCH_ASSOC)){
                $item=array(
                    "title" => "(ID: ". $row['prp_id']  . ") DOMICILIO: " .$row['prp_dom']." MONITOR: ". $row['nombre'] . " ". $row['apellido'] . " DESCRIPCION: " .$row['cita_desc'],
                    "start" => $row['cita_fecha'] . "T" .$row['cita_hora'] ,
                );
                array_push($citas, $item);
            }
            $json_string = json_encode($citas);            
            //Descomentar para que devuelva el json pero no funcionara el redireccionamiento del index.php
            //echo $json_string;
            $file = 'citas.json';
            file_put_contents($file, $json_string);
        }else{
            echo json_encode(array('mensaje' => 'No hay elementos'));
            $json_string = json_encode($citas);
            echo $json_string;
            $file = 'citas.json';
            file_put_contents($file, $json_string);
        } 

        //exit();
    }
    
    function setDeleteCita($citaId){        
        $cita = new Citas();                
        $cita->borrarCita($citaId);
        $citas = array();
        $res = $cita->obtenerCitas();
        if($res->rowCount()){
            while ($row = $res->fetch(PDO::FETCH_ASSOC)){
                $item=array(
                    "title" => "(ID: ". $row['prp_id']  . ") DOMICILIO: " .$row['prp_dom']." MONITOR: ". $row['nombre'] . " ". $row['apellido'] . " DESCRIPCION: " .$row['cita_desc'],
                    "start" => $row['cita_fecha'] . "T" .$row['cita_hora'] ,
                );
                array_push($citas, $item);
            }
            $json_string = json_encode($citas);            
            //Descomentar para que devuelva el json pero no funcionara el redireccionamiento del index.php
            //echo $json_string;
            $file = 'citas.json';
            file_put_contents($file, $json_string);
        }else{
            echo json_encode(array('mensaje' => 'No hay elementos'));
            $json_string = json_encode($citas);
            echo $json_string;
            $file = 'citas.json';
            file_put_contents($file, $json_string);
        } 

        //exit();
    }
}


?>