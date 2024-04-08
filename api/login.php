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
        $email		= addslashes((trim($_REQUEST['email'])));
        $password	= addslashes((trim($_REQUEST['password'])));
        $type	    = addslashes((trim($_REQUEST['type'])));

        if($type == "Customer"){
            $CheckUserQuery = "SELECT * FROM cussignup WHERE email = '$email' AND password = '$password'";
        }else if($type == "Maid"){
            $CheckUserQuery = "SELECT * FROM maid WHERE email = '$email' AND password = '$password'";
        }else{
            $CheckUserQuery = "SELECT * FROM tbladmin WHERE email = '$email' AND password = '$password'";
        }

        $CheckUserQueryResults = mysqli_query($conn,$CheckUserQuery);

        if (mysqli_num_rows($CheckUserQueryResults) > 0)
        {
            while($record = mysqli_fetch_assoc($CheckUserQueryResults)) 
            {
                $PayloadArray = array();

                $PayloadArray["logged_in"] = true;
                $PayloadArray["uid"]       = $record["id"];
                $PayloadArray["username"]  = $record["name"];
                $PayloadArray["useremail"] = $record["email"];
                $PayloadArray["user_mobile"]  = $record["number"];

                $Data =[
                    'status' => 200,
                    'message' => 'Success',
                    'data' => $PayloadArray,
                ];
            
                header("HTTP/1.0 200 Success");
                echo json_encode($Data);
            }
            

        } else {
            $Data =[
                'status' => 404,
                'message' => 'Username or password is incorrect'
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
        'message' => $RequestMethod . ' Method Not Allowed'
    ];

    header("HTTP/1.0 405 Method Not Allowed");
    echo json_encode($Data);
}

?>