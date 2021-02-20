<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
 
 
$data = json_decode(file_get_contents("php://input"));
 
if(
    !empty($data->a) &&
    !empty($data->b) &&
    !empty($data->operator)
){
    $a= $data->a;
    $b= $data->b;
    $operator= $data->operator;

    switch ($operator) {
        case "add":
            $result = $a + $b;
          break;
        case "subtract":
            $result = $a - $b;
          break;
        case "divide":
            $result = intdiv($a, $b);
          break;
        case "multiply":
            $result = $a * $b;
         break;
        default:
          $result = 0;
      }

    http_response_code(201);
    echo json_encode(array("result" => $result ));
}
 
else{
    // echo 'test';
    include_once 'calc.php';
    switch ($operator_calc) {
        case "add":
            $result_calc = $a_calc + $b_calc;
          break;
        case "subtract":
            $result_calc = $a_calc - $b_calc;
          break;
        case "divide":
            $result_calc = intdiv($a_calc, $b_calc);
          break;
        case "multiply":
            $result_calc = $a_calc * $b_calc;
         break;
        default:
          $result_calc = 0;
      }

    http_response_code(201);
    echo json_encode(array("result" => $result_calc ));
}