<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
 

include_once 'config/database.php';
include_once 'models/jinaobj.php';
 
$database = new Database();
$db = $database->getConnection();
 
$ja = new JinaObj($db);
 
// get posted data
$data = json_decode(file_get_contents("php://input"));
 
if(
    !empty($data->jina)
){
    $ja->jina= $data->jina;
    $ja->created_at = date('Y-m-d H:i:s');

    if($ja->create()){
    http_response_code(201);
    echo json_encode(array("message" => "1."));
    }
    else{
        http_response_code(503);
        echo json_encode(array("message" => "2"));
    }
}
 
else{
    http_response_code(400);
    echo json_encode(array("message" => "0."));
}