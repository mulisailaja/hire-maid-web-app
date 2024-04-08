<?php
session_start();

if (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] == 'on') {
  $Protocol = "https://";
}else{
  $Protocol = "http://";
}



$CurrentServer = $_SERVER['SERVER_NAME'];

define("SITE_URL",$Protocol.$_SERVER['SERVER_NAME']."/"); 
define("ROOT",$_SERVER['DOCUMENT_ROOT']."/"); 
define("UPLOAD_PATH",$_SERVER['DOCUMENT_ROOT']."/uploads"); 
define("UPLOAD_URL",SITE_URL."/uploads"); 

define("DB_SERVER","localhost"); 
define("DB_USER","root"); 
define("DB_PASS",""); 
define("DB_NAME","mhmsdb"); 



// Create connection
$conn =  mysqli_connect(DB_SERVER, DB_USER, DB_PASS, DB_NAME);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
//  echo "Connected successfully";

?>