<?php
  session_start();
  ?>
<!DOCTYPE html>
<html>
  <head>
    <link rel="stylesheet" href="biketyres.css" />
    <style>
      /* Add your CSS styles here, or include them from an external CSS file */
      .desktop {
        background-color: #ffffff;
        display: flex;
        flex-wrap: wrap; /* Allow items to wrap to the next row */
        justify-content: center;
      }

      .frame {
        width: 30%; /* Adjust the width to fit three items in a row */
        margin: 10px; /* Add some margin to separate items */
        border-radius: 10px;
        border: 1px solid #bc9abd;
        position: relative;
      }

      .overlap-group {
        position: absolute;
        width: 100%;
        height: 36px;
        bottom: 0;
        left: 0;
        background-color: #f7c910;
        border-radius: 10px;
        box-shadow: 0px 4px 46px 3px #0000001a;
      }

      .text-wrapper-2 {
        top: 9px;
        left: 50%;
        transform: translateX(-50%); /* Center text horizontally */
        position: absolute;
        width: 84px;
        font-family: "Poppins", Helvetica;
        font-weight: 600;
        color: #1a1a1c;
        font-size: 12px;
        letter-spacing: 0;
        line-height: normal;
      }

      .p {
        position: absolute;
        width: 100%; /* Make sure the text takes the full width */
        bottom: 40px; /* Adjust as needed for spacing */
        left: 0;
        text-align: center; /* Center text */
        font-family: "Poppins", Helvetica;
        font-weight: 400;
        color: #000000;
        font-size: 16px;
        letter-spacing: 0;
        line-height: normal;
      }

      .element {
        position: absolute;
        width: 100%;
        height: auto; /* Maintain aspect ratio */
        top: 60px; /* Adjust as needed for spacing */
        left: 0;
        object-fit: cover;
      }
    </style>
  </head>
  <body>
    <div class="desktop">
      <div class="div">
      <?php include 'nav.php' ?>
        <br><br><br><br>

<!doctype html>
<html>
<head>
<meta charset='utf-8'>
<meta name='viewport' content='width=device-width, initial-scale=1'>
<title>Snippet - BBBootstrap</title>
<link href='https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css' rel='stylesheet'>
<link href='#' rel='stylesheet'>
<script type='text/javascript' src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js'>
</script>
<style>
  ::-webkit-scrollbar {
  width: 8px;
  }
  /* Track */
  ::-webkit-scrollbar-track {
  background: #f1f1f1; 
  }
  /* Handle */
  ::-webkit-scrollbar-thumb {
  background: #888; 
  }                               
   /* Handle on hover */
   ::-webkit-scrollbar-thumb:hover {
      background: #555; 
  } body {                              
                                
                                                             
    background-color: #eee
  }
  .mt-100{
      margin-top: 100px;
  }
  .card {
      border-radius: 7px !important;
      border-color: #e1e7ec;
  }

  .mb-30 {
      margin-bottom: 30px !important;
  }

  .card-img-tiles {
      display: block;
      border-bottom: 1px solid #e1e7ec;
  }

  a {
      
      color: white;
      text-decoration: none !important;
  }

  .card-img-tiles>.inner {
      display: table;
      width: 100%;
  }

  .card-img-tiles .main-img, .card-img-tiles .thumblist {
      display: table-cell;
      width: 65%;
      padding: 15px;
      vertical-align: middle;
  }

  .card-img-tiles .main-img>img:last-child, .card-img-tiles .thumblist>img:last-child {
      margin-bottom: 0;
  }

  .card-img-tiles .main-img>img, .card-img-tiles .thumblist>img {
      display: block;
      width: 100%;
      margin-bottom: 6px;
  }
  .thumblist {
      width: 35%;
      border-left: 1px solid #e1e7ec !important;
      display: table-cell;
      width: 65%;
      padding: 15px;
      vertical-align: middle;
  }



  .card-img-tiles .thumblist>img {
      display: block;
      width: 100%;
      margin-bottom: 6px;
  }
  .btn-group-sm>.btn, .btn-sm {
      padding: .45rem .5rem !important;
      font-size: .875rem;
      line-height: 1.5;
      border-radius: .2rem;
  }
</style>
</head>
<body className='snippet-body'>
<div style="margin-top:-80px;" class="container mt-100">
<div class="row" style="margin-left:60px;">
  
  <?php
 
        // Database connection
        $servername = "localhost";
        $username = "root";
        $password = "";
        $databasename = "sparemate";
      
        $conn = new mysqli($servername, $username, $password, $databasename);
      
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
        if (isset($_GET['parts'])) {
          $parts = $_GET['parts'];
          $brand =  $_SESSION['carbrand'];
          
        // Query to select all images from the table
        $query = "SELECT id, brand, product_name, parts, image_data FROM overall where parts ='$parts' and brand='$brand' and category='Car'";
        $result = $conn->query($query);
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                // Retrieve the image data
                $image_data = $row['image_data'];
      $product_name = $row['product_name'];
      $id = $row['id'];

      echo '<div class="col-md-4 col-sm-6">';
      echo      '<div class="card mb-30"><a class="card-img-tiles" href="btyrecom.php?id='.$id.'" data-abc="true">';
      echo          '<div class="inner">';
       echo           '<div class="main-img"><img style="height:200px;" src="data:image/jpeg;base64,' . base64_encode($image_data) . '" alt="Category"></div>
                </div></a>';
       echo       '<div class="card-body text-center">';
       echo         '<h4 class="card-title">' . $product_name . '</h4>';
       echo          ' <a class="btn btn-outline-primary btn-sm" style="background-color: #F7C910; color:black; width:100%;" href="addtocart.php?id='.$id.'" data-abc="true">Add to card</a>';
         echo     '</div>';
         echo   '</div>';
          echo '</div>';
          
}
        } else {
            echo 'No images found in the table.';
        }}

        $conn->close();
        ?>

         
         
</div>
</div>
                                <script type='text/javascript' src='https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js'></script>
                                <script type='text/javascript' src='#'></script>
                                <script type='text/javascript' src='#'></script>
                                <script type='text/javascript' src='#'></script>
                                <script type='text/javascript'>#</script>
                                <script type='text/javascript'>var myLink = document.querySelector('a[href="#"]');
                                myLink.addEventListener('click', function(e) {
                                  e.preventDefault();
                                });</script>
                            
                                </body>
                            </html>      
                          </div>
    </div>
  </body>
</html>
