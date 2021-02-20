<?php
session_start();

$url = 'http://localhost/zydii/web_service/vuvuzela.php';
$a_calc = 5;
$b_calc = 5;
$operator_calc = "add";

//The data you want to send via POST
$fields = [
    'a' => $a_calc,
    'b' => $b_calc,
    'operator' => $operator_calc
];

//url-ify the data for the POST
$fields_string = http_build_query($fields);

//open connection
$ch = curl_init();

//set the url, number of POST vars, POST data
curl_setopt($ch,CURLOPT_URL, $url);
curl_setopt($ch,CURLOPT_POST, true);
curl_setopt($ch,CURLOPT_POSTFIELDS, $fields_string);

//So that curl_exec returns the contents of the cURL; rather than echoing it
curl_setopt($ch,CURLOPT_RETURNTRANSFER, true); 

//execute post
$result = curl_exec($ch);
echo $result;



