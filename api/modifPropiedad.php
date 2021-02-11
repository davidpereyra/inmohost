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
$propiedad->prp_dom=$data->prp_dom;
$propiedad->prp_bar=$data->prp_bar;
$propiedad->loc_id=$data->loc_id;
$propiedad->pro_id=$data->pro_id;
$propiedad->pai_id=$data->pai_id;
$propiedad->ori_id=$data->ori_id;
if ($data->con_id!=2){$propiedad->con_id=1;}else{$propiedad->con_id=2;};
$propiedad->prp_desc=$data->prp_desc;
if($data->prp_desct!=""){$propiedad->prp_desc.=" <br>Terreno: ".$data->prp_desct;}
if($data->prp_frente!=""){$propiedad->prp_desc.=" <br>Frente: ".$data->prp_frente;}
if($data->prp_fos!=""){$propiedad->prp_desc.= " <br>FOS: ".$data->prp_fos;}
if($data->prp_fot!=""){$propiedad->prp_desc.=" <br>FOT: ".$data->prp_fot;}
$propiedad->prp_visitas=$data->prp_visitas;
$propiedad->usr_id=$data->usr_id;
$propiedad->tip_id=$data->tip_id;
$propiedad->prp_nota=$data->prp_nota;
$propiedad->prp_pre=$data->prp_pre;
$propiedad->prp_pub=$data->prp_pub;
$propiedad->prp_mostrar=$data->prp_mostrar;
$propiedad->pre_dol=$data->pre_dol;
$propiedad->prp_llave=$data->prp_llave;
if ($data->prp_cartel=="on"){$propiedad->prp_cartel=1;}else{$propiedad->prp_cartel=0;}; 
if ($data->con_id==2){$propiedad->prp_referente=1;}else{$propiedad->prp_referente=$data->prp_referente;}; 
$propiedad->prp_tas=$data->prp_tas;
$propiedad->pre_inmo=$data->pre_inmo;
$propiedad->pre_prop=$data->pre_prop;
$propiedad->pre_trans=$data->pre_trans;
$propiedad->prp_insc_dom=$data->prp_insc_dom;
$propiedad->publica=$data->publica;
$propiedad->prp_servicios=$data->prp_servicios;
$propiedad->bar_priv_id=$data->bar_priv_id;
$propiedad->fotos=$data->fotos;
if ($data->mos_por_1=='on'){$propiedad->mos_por_1=1;}else{$propiedad->mos_por_1=0;}
if ($data->mos_por_2=='on'){$propiedad->mos_por_2=1;}else{$propiedad->mos_por_2=0;}
if ($data->mos_por_3=='on'){$propiedad->mos_por_3=1;}else{$propiedad->mos_por_3=0;}
if ($data->mos_por_4=='on'){$propiedad->mos_por_4=1;}else{$propiedad->mos_por_4=0;}    
$propiedad->prp_anonimo=$data->prp_anonimo;
$propiedad->prp_vip=$data->prp_vip;
$propiedad->prp_lat=$data->prp_lat;
$propiedad->prp_lng=$data->prp_lng;
$propiedad->prp_plano=$data->prp_plano;
$propiedad->prp_destacado=$data->prp_destacado;

//Agregamos las expensas en caso de que sea un alquiler y que las tenga 
if ( $data->con_id==2 && $data->pre_inmo>0){
    $propiedad->prp_desc.=" <br>Expensas: $".$data->pre_inmo;
} 
                    
//Datos Propietario
$propiedad->prop_nombre=$data->prop_nombre;
$propiedad->prop_apellido=$data->prop_apellido;
$propiedad->prop_tel=$data->prop_tel;
$propiedad->prop_dom=$data->prop_dom;
$propiedad->prop_mail=$data->prop_mail;
$propiedad->prop_nota=$data->prop_nota;

//Datos Servicios
$propiedad->valor0=$data->valor0;//Agua 
$propiedad->valor1=$data->valor1;//Aire Acondicionado
$propiedad->valor2=$data->valor2;//Amoblado
$propiedad->valor3=$data->valor3;//Antiguedad
$propiedad->valor4=$data->valor4;//Baños
$propiedad->valor5=$data->valor5;//Calefaccion Central
$propiedad->valor6=$data->valor6;//Cloacas
if ($data->valor7>0){
    $propiedad->valor7="Garage/Cochera";//Cochera
}else if ($data->valor7==0){
    $propiedad->valor7="Sin Cochera";//Cochera
}else{
    $propiedad->valor7="Indistinto";//cochera
}
$propiedad->valor8=$data->valor8;//Dormitorios
$propiedad->valor9=$data->valor9;//Gas 
$propiedad->valor10=$data->valor10;//Luz
$propiedad->valor11=$data->valor11;//Mascota
$propiedad->valor12=$data->valor12;//Patio
$propiedad->valor13=$data->valor13;//Piscina
$propiedad->valor14=$data->valor14;//Plantas
$propiedad->valor15=$data->valor15;//Sup. cubierta
$propiedad->valor16=$data->valor16;//Sup. total

if( !empty($propiedad->prp_id) ){

	$propiedad->modifPrpInmohost();

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