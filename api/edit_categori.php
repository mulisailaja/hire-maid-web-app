<?php
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
header("Access-Control-Allow-Methods: POST");
// header("Allow: GET, POST, OPTIONS, PUT, DELETE");
header("Access-Control-Allow-Headers: X-API-KEY, Origin, X-Requested-With, Content-Type, Accept, Access-Control-Request-Method, Access-Control-Allow-Origin");

include "config.php";

$RequestMethod = $_SERVER["REQUEST_METHOD"];

if($RequestMethod == "POST"){

    try {
        $id	                    = addslashes((trim($_REQUEST['category_id'])));
        $category_name	        = addslashes((trim($_REQUEST['category_name'])));
        $perhour_amount	        = addslashes((trim($_REQUEST['perhour_amount'])));
        $monthly_amount	        = addslashes((trim($_REQUEST['monthly_amount'])));

        $AddNewUserQuery = "update tblcategory set CategoryName='$category_name',perhouramount='$perhour_amount',monthlyamount='$monthly_amount' where id='$id';";
        $ExecuteAddNewUserQuery = mysqli_query($conn,$AddNewUserQuery) or die ("Error in query: $AddNewUserQuery. ".mysqli_error($conn));

        $Data =[
            'status' => 200,
            'message' => 'Updated Successfully'
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