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

    $proficient	        = addslashes((trim($_REQUEST['Proficient'])));
    $maid_id	        = addslashes((trim($_REQUEST['Maid_ID'])));
    $email	            = addslashes((trim($_REQUEST['Email'])));
    $name	            = addslashes((trim($_REQUEST['Name'])));
    $gender	            = addslashes((trim($_REQUEST['Gender'])));
    $contact_number     = addslashes((trim($_REQUEST['Contact_Number'])));
    $experience         = addslashes((trim($_REQUEST['Experience'])));
    $date_of_birth      = addslashes((trim($_REQUEST['Date_of_Birth'])));
    $address  	        = addslashes((trim($_REQUEST['address'])));
    $willing_to_work    = addslashes((trim($_REQUEST['Willing_to_Work'])));
    $work_location      = addslashes((trim($_REQUEST['Work_Locations'])));

    if(checkMaidId($conn,$maid_id,$email))
    {
        try {
                $InsertArray = array();

                $InsertArray["CatID"]               = $proficient;
                $InsertArray["MaidId"]              = $maid_id;
                $InsertArray["Name"]                = $name;
                $InsertArray["Email"]               = $email;
                $InsertArray["ContactNumber"]       = $contact_number;
                $InsertArray["Gender"]              = $gender;
                $InsertArray["Experience"]          = $experience;
                $InsertArray["Dateofbirth"]         = $date_of_birth;
                $InsertArray["Address"]             = $address;
                $InsertArray["WillingToWork"]       = $willing_to_work;
                $InsertArray["PreferredLocations"]  = $work_location;

                $columns = implode(", ",array_keys($InsertArray));
                $escaped_values = array_map(array($conn, 'real_escape_string'), array_values($InsertArray));
                $values  = implode("', '", $escaped_values);
                $AddNewUserQuery = "INSERT INTO tblmaid ($columns) VALUES ('$values')";
                $ExecuteAddNewUserQuery = mysqli_query($conn,$AddNewUserQuery) or die ("Error in query: $AddNewUserQuery. ".mysqli_error($conn));

                $Data =[
                    'status' => 200,
                    'message' => 'Success'
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
}
else {
    $Data =[
        'status' => 400,
        'message' => 'email or maid ID already exist'
    ];

    header("HTTP/1.0 200 Success");
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