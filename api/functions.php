<?php

function getCategories($conn){
    $Query      = "SELECT * FROM tblcategory";
    $Results    = mysqli_query($conn,$Query);
    $ListArray  = array();

    if (mysqli_num_rows($Results) > 0) 
    {
        while($record = mysqli_fetch_assoc($Results)) 
        {
    
            $data = array();
            $data["id"]                      = $record["ID"];
            $data["category_name"]           = $record["CategoryName"];
            $data["per_hour_amount"]         = $record["perhouramount"];
            $data["monthly_amount"]          = $record["monthlyamount"];

            array_push($ListArray,$data);

        }

    }

    return $ListArray;

}

function manageMaid($conn){
    $Query      = "SELECT CatID,Name,Email,ContactNumber,Experience,Address,WillingToWork,preferredLocations,RegDate FROM `tblmaid`";
    $Results    = mysqli_query($conn,$Query);
    $ListArray  = array();

    if (mysqli_num_rows($Results) > 0) 
    {
        while($record = mysqli_fetch_assoc($Results)) 
        {
    
            $data = array();
            $data["Proficient"]              = $record["CatID"];
            $data["Name"]                    = $record["Name"];
            $data["Email"]                   = $record["Email"];
            $data["ContactNumber"]           = $record["ContactNumber"];
            $data["Experience"]              = $record["Experience"];
            $data["Location"]                = $record["Address"];
            $data["Willing_to_Work"]         = $record["WillingToWork"];
            $data["preferredLocations"]      = $record["preferredLocations"];
            $data["Date_of_Registration"]    = $record["RegDate"];

            array_push($ListArray,$data);

        }

    }

    return $ListArray;

}

function checkMaidId($conn,$id,$email){
    $Query      = "select * from tblmaid where maidid='$id' or email='$email';";
    $Results    = mysqli_query($conn,$Query);

    if (mysqli_num_rows($Results) > 0) 
    {
        return false;
    }
    else{

        return true;
    }


}

function allRequest($conn){
    $Query      = "SELECT BookingID,Name,Email,ContactNumber,BookingDate,AssignTo,Status FROM `tblmaidbooking`";
    $Results    = mysqli_query($conn,$Query);
    $ListArray  = array();

    if (mysqli_num_rows($Results) > 0) 
    {
        while($record = mysqli_fetch_assoc($Results)) 
        {
    
            $data = array();
            $data["booking_id"]              = $record["BookingID"];
            $data["name"]                    = $record["Name"];
            $data["email"]                   = $record["Email"];
            $data["contact_Number"]          = $record["ContactNumber"];
            $data["booking_date"]            = $record["BookingDate"];
            $data["assignTo"]                = $record["AssignTo"];
            $data["status"]                  = $record["Status"];

            array_push($ListArray,$data);

        }

    }

    return $ListArray;

}

function cancelRequest($conn){
    $Query      = "SELECT BookingID,Name,Email,ContactNumber,BookingDate,AssignTo,Status FROM `tblmaidbooking` WHERE Status='Cancelled'";
    $Results    = mysqli_query($conn,$Query);
    $ListArray  = array();

    if (mysqli_num_rows($Results) > 0) 
    {
        while($record = mysqli_fetch_assoc($Results))
        {
    
            $data = array();
            $data["booking_id"]              = $record["BookingID"];
            $data["name"]                    = $record["Name"];
            $data["email"]                   = $record["Email"];
            $data["contact_Number"]          = $record["ContactNumber"];
            $data["booking_date"]            = $record["BookingDate"];
            $data["assignTo"]                = $record["AssignTo"];
            $data["status"]                  = $record["Status"];

            array_push($ListArray,$data);

        }

    }

    return $ListArray;

}

function approveRequest($conn){
    $Query      = "SELECT BookingID,Name,Email,ContactNumber,BookingDate,AssignTo,Status FROM `tblmaidbooking` WHERE Status='Approved'";
    $Results    = mysqli_query($conn,$Query);
    $ListArray  = array();

    if (mysqli_num_rows($Results) > 0) 
    {
        while($record = mysqli_fetch_assoc($Results))
        {
    
            $data = array();
            $data["booking_id"]              = $record["BookingID"];
            $data["name"]                    = $record["Name"];
            $data["email"]                   = $record["Email"];
            $data["contact_Number"]          = $record["ContactNumber"];
            $data["booking_date"]            = $record["BookingDate"];
            $data["assignTo"]                = $record["AssignTo"];
            $data["status"]                  = $record["Status"];

            array_push($ListArray,$data);

        }

    }

    return $ListArray;

}

function newRequest($conn){
    $Query      = "SELECT BookingID,CatID,Name,Email,ContactNumber,BookingDate,AssignTo,Status FROM `tblmaidbooking` WHERE  Status='Pending'";
    $Results    = mysqli_query($conn,$Query);
    $ListArray  = array();

    if (mysqli_num_rows($Results) > 0) 
    {
        while($record = mysqli_fetch_assoc($Results))
        {
    
            $data = array();
            $data["booking_id"]              = $record["BookingID"];
            $data["CategoryName"]            = $record["CatID"];
            $data["Name"]                    = $record["Name"];
            $data["Email"]                   = $record["Email"];
            $data["Contact_Number"]          = $record["ContactNumber"];
            $data["booking_date"]            = $record["BookingDate"];
            $data["assignTo"]                = $record["AssignTo"];
            $data["status"]                  = $record["Status"];

            array_push($ListArray,$data);

        }

    }

    return $ListArray;

}

function checkMaidAvailability($catid, $startdate, $wsf, $wst)
{
        define('DB_HOST1','localhost');
        define('DB_USER1','root');
        define('DB_PASS1','');
        define('DB_NAME1','mhmsdb');
        // Establish database connection.
        try
        {
            $dbh = new PDO("mysql:host=".DB_HOST1.";dbname=".DB_NAME1,DB_USER1, DB_PASS1,array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'"));
        }
        catch (PDOException $e)
        {
        exit("Error: " . $e->getMessage());
        }
    
    $sql = "SELECT * FROM tblmaidbooking WHERE CatID = :catid AND StartDate = :startdate AND ((WorkingShiftFrom BETWEEN :wsf AND :wst) OR (WorkingShiftTo BETWEEN :wsf AND :wst))";
    $query = $dbh->prepare($sql);
    $query->bindParam(':catid', $catid, PDO::PARAM_STR);
    $query->bindParam(':startdate', $startdate, PDO::PARAM_STR);
    $query->bindParam(':wsf', $wsf, PDO::PARAM_STR);
    $query->bindParam(':wst', $wst, PDO::PARAM_STR);
    $query->execute();
    $result = $query->fetch(PDO::FETCH_ASSOC);

    return !$result; // Return true if the maid is available, false otherwise
}

function assignReqest($conn, $name)
{
    $Query      = "SELECT BookingID,CatID,Amount,Name,Email,ContactNumber,BookingDate,AssignTo,Status FROM `tblmaidbooking` WHERE AssignTo='$name'";
    $Results    = mysqli_query($conn,$Query);
    $ListArray  = array();

    if (mysqli_num_rows($Results) > 0) 
    {
        while($record = mysqli_fetch_assoc($Results))
        {
            $data = array();
            $data["booking_id"]              = $record["BookingID"];
            $data["service"]                 = $record["CatID"];
            $data["amount"]                  = $record["Amount"];
            $data["Name"]                    = $record["Name"];
            $data["Email"]                   = $record["Email"];
            $data["Contact_Number"]          = $record["ContactNumber"];
            $data["booking_date"]            = $record["BookingDate"];
            $data["assignTo"]                = $record["AssignTo"];
            $data["status"]                  = $record["Status"];

            array_push($ListArray,$data);
        }

    }

    return $ListArray;
}

function maidDetails($conn,$name){
    $Query      = "SELECT CatID,Name,Email,ContactNumber,Experience,Address,WillingToWork,preferredLocations,RegDate FROM `tblmaid` WHERE name='$name'";
    $Results    = mysqli_query($conn,$Query);
    $ListArray  = array();

    if (mysqli_num_rows($Results) > 0) 
    {
        while($record = mysqli_fetch_assoc($Results)) 
        {
    
            $data = array();
            $data["Proficient"]              = $record["CatID"];
            $data["Name"]                    = $record["Name"];
            $data["Email"]                   = $record["Email"];
            $data["ContactNumber"]           = $record["ContactNumber"];
            $data["Experience"]              = $record["Experience"];
            $data["Location"]                = $record["Address"];
            $data["Willing_to_Work"]         = $record["WillingToWork"];
            $data["preferredLocations"]      = $record["preferredLocations"];
            $data["Date_of_Registration"]    = $record["RegDate"];

            array_push($ListArray,$data);

        }

    }

    return $ListArray;

}
?>