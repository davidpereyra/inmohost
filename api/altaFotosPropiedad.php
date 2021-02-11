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

//Datos propiedad
$propiedad->prp_id=$data->prp_id;
$propiedad->usr_id=$data->usr_id;
$propiedad->fotos=$data->fotos;

if( !empty($propiedad->prp_id) ){

	$propiedad->altaFotosPrpInmohost();

    if( $propiedad->errores=="" ){

        http_response_code(201);

          echo json_encode(array("message" => "La propiedad ID: ".$propiedad->prp_id." ha sido modificada."));
    
    }else{

        http_response_code(503);

        echo json_encode(array("message" => "Fallo al intentar modificar: ".$propiedad->errores));
    }

}else{

    http_response_code(400);

    echo json_encode(array("message" => "Faltan completar datos minimos requeridos. ID: ".$propiedad->prp_id));
}

?>