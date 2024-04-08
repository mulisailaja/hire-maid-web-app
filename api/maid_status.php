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
            $name	        = addslashes((trim($_REQUEST['name'])));
            $email	        = addslashes((trim($_REQUEST['email'])));
        
            $AddNewUserQuery = "SELECT CatID,BookingID,Name,Amount,AssignTo,BookingDate,Status FROM `tblmaidbooking` WHERE Email='$email' AND Name='$name'";
            $ExecuteAddNewUserQuery = mysqli_query($conn,$AddNewUserQuery) or die ("Error in query: $ExecuteAddNewUserQuery. ".mysqli_error($conn));
            $ListArray = array();
            if (mysqli_num_rows($ExecuteAddNewUserQuery) > 0)
            {
                while($record = mysqli_fetch_assoc($ExecuteAddNewUserQuery)) 
                {
                    $PayloadArray = array();
                        
                    $PayloadArray["service"]            = $record["CatID"];
                    $PayloadArray["book_id"]            = $record["BookingID"];
                    $PayloadArray["name"]               = $record["Name"];
                    $PayloadArray["amount"]             = $record["Amount"];
                    $PayloadArray["assign_to"]          = $record["AssignTo"];
                    $PayloadArray["booking_date"]       = $record["BookingDate"];
                    $PayloadArray["status"]             = $record["Status"];
                    
                    array_push($ListArray,$PayloadArray);
                }
                
                $Data =[
                    'status' => 200,
                    'message' => 'Success',
                    'data' => $ListArray,
                ];
            
                header("HTTP/1.0 200 Success");
                echo json_encode($Data);
            } else {
                $Data =[
                    'status' => 404,
                    'message' => 'your not booking any maid'
                ];
            
                header("HTTP/1.0 200 Username or password is incorrect");
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
            'message' => $RequestMethod . 'Method Not Allowed'
        ];
    
        header("HTTP/1.0 405 Method Not Allowed");
        echo json_encode($Data);
    }
     
?>