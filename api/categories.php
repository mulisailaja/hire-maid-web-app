<?php
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
header("Access-Control-Allow-Methods: POST");
// header("Allow: GET, POST, OPTIONS, PUT, DELETE");
header("Access-Control-Allow-Headers: X-API-KEY, Origin, X-Requested-With, Content-Type, Accept, Access-Control-Request-Method, Access-Control-Allow-Origin");

include "config.php";
include "functions.php";

$RequestMethod = $_SERVER["REQUEST_METHOD"];

if($RequestMethod == "POST"){

    try {
       $categories = getCategories($conn);

        $Data =[
            'status' => 200,
            'message' => 'Success',
            'data' => $categories
        ];
    
        header("HTTP/1.0 200 Success");
        echo json_encode($Data);
        

    } catch (Exception $ex) {
        $Data =[
            'status' => 500,
            'message' => 'Server Error: Something went wrong'
        ];
    
        header("HTTP/1.0 500 Server Error: Something went wrong");
        echo json_encode($Data);
    }
}else{
    $Data =[
        'status' => 405,
        'message' => $RequestMethod . ' Method Not Allowed'
    ];

    header("HTTP/1.0 405 Method Not Allowed");
    echo json_encode($Data);
}



?>