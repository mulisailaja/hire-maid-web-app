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
    
    $name	        = addslashes((trim($_REQUEST['name'])));
    $phone	        = addslashes((trim($_REQUEST['phone'])));
    $email	        = addslashes((trim($_REQUEST['email'])));
    $gender	        = addslashes((trim($_REQUEST['gender'])));
    $category_id	= addslashes((trim($_REQUEST['service'])));
    $amount         = addslashes((trim($_REQUEST['amount'])));
    $start_time     = addslashes((trim($_REQUEST['start_time'])));
    $end_time       = addslashes((trim($_REQUEST['end_time'])));
    $date           = addslashes((trim($_REQUEST['date'])));
    $address  	    = addslashes((trim($_REQUEST['address'])));
    if(checkMaidAvailability($category_id,$date,$start_time,$end_time))
    {
        try {
            $bookingid = mt_rand(100000000, 999999999);
            
            $InsertArray = array();

            $InsertArray["BookingID"]           = $bookingid;
            $InsertArray["CatID"]               = $category_id;
            $InsertArray["Amount"]              = $amount;
            $InsertArray["Name"]                = $name;
            $InsertArray["ContactNumber"]       = $phone;
            $InsertArray["Email"]               = $email;
            $InsertArray["Address"]             = $address;
            $InsertArray["gender"]              = $gender;
            $InsertArray["WorkingShiftFrom"]    = $start_time;
            $InsertArray["WorkingShiftTo"]      = $end_time;
            $InsertArray["StartDate"]           = $date;

            $columns = implode(", ",array_keys($InsertArray));
            $escaped_values = array_map(array($conn, 'real_escape_string'), array_values($InsertArray));
            $values  = implode("', '", $escaped_values);
            $AddNewUserQuery = "INSERT INTO tblmaidbooking ($columns) VALUES ('$values')";
            $ExecuteAddNewUserQuery = mysqli_query($conn,$AddNewUserQuery) or die ("Error in query: $AddNewUserQuery. ".mysqli_error($conn));

            $Data =[
                'status' => 200,
                'message' => 'Maid Booked Successfully',
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
            'status' => 400,
            'message' => 'Maid Not Available',
        ];
        header("HTTP/1.0 200 Success");
        echo json_encode($Data);
    }   
}else{
    $Data =[
        'status' => 405,
        'message' => $RequestMethod . 'Method Not Allowed'
    ];

    header("HTTP/1.0 405 Method Not Allowed");
    echo json_encode($Data);
}



?>