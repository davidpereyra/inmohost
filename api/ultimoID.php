<?php

extract($_GET);
extract($_POST);

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

//include_once '../config/validar_jwt.php'; 
include_once 'config/cocucciDB.php';
include_once 'objects/propiedad.php';

$database = new Database();

$db = $database->getConnection();

$propiedad = new Propiedad($db);

//$propiedad->prp_alta = date('Y-m-d H:i:s');

//obtengo las variables
$data=json_decode(file_get_contents("php://input"));

	$propiedad->ultimoID();

    if( $propiedad->errores=="" ){

        http_response_code(201);

          echo json_encode(array("ultimo_id" => $propiedad->ultimo_id,"message" => "La consulta ha sido realizada con Exito!."));
    
    }else{

        http_response_code(503);

        echo json_encode(array("message" => "Fallo al intentar modificar: ".$propiedad->errores));
    }


?>