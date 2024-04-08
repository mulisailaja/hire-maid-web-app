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
        $username	= addslashes((trim($_REQUEST['user_name'])));
        $email	    = addslashes((trim($_REQUEST['user_email'])));
        $phone  	= addslashes((trim($_REQUEST['user_phone'])));
        $password	= addslashes((trim($_REQUEST['user_password'])));
        $type	    = addslashes((trim($_REQUEST['type'])));
        
        if($type == "Customer"){
            $table = "cussignup";
        }else if($type == "Maid"){
            $table = "maid";
        }else{
            $table = "tbladmin";
        }
        
        function checkId($conn,$email,$name,$table){
            $Query      = "select * from $table where email='$email' or name='$name';";
            $Results    = mysqli_query($conn,$Query);
        
            if (mysqli_num_rows($Results) > 0) 
            {
                return false;
            }
            else{
        
                return true;
            }
        
        
        }
        // $InsertArray = array();
        
        // $InsertArray["name"]        = $username;
        // $InsertArray["email"]       = $email;
        // $InsertArray["number"]      = $phone;
        // $InsertArray["password"]    = $password;

        // $columns = implode(", ",array_keys($InsertArray));
        // $escaped_values = array_map(array($conn, 'real_escape_string'), array_values($InsertArray));
        // $values  = implode("', '", $escaped_values);
        if(checkId($conn,$email,$username,$table))
        {
        $AddNewUserQuery = "INSERT INTO `cussignup`( `name`, `email`, `number`, `password`) VALUES ('$username','$email',$phone,'$password')";
        $ExecuteAddNewUserQuery = mysqli_query($conn,$AddNewUserQuery) or die ("Error in query: $AddNewUserQuery. ".mysqli_error($conn));
        $Data =[
            'status' => 200,
            'message' => 'Account Created Susscesfully'
        ];
    
        header("HTTP/1.0 200 Success");
        echo json_encode($Data);
    }
    else{
        $Data =[
            'status' => 400,
            'message' => 'Mail Id or Username Already Registered'
        ];
    
        header("HTTP/1.0 200 Success");
        echo json_encode($Data);
    }

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