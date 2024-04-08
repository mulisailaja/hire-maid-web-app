<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');

if (isset($_POST['submit'])) {
    $catname = $_POST['catname'];
    $perHourAmt = $_POST['perhouramt'];
    $monthlyAmt = $_POST['monthlyamt'];
    $eid = $_GET['editid'];

    $sql = "UPDATE tblcategory SET CategoryName=:catname, PerHourAmount=:perHourAmt, MonthlyAmount=:monthlyAmt WHERE ID=:eid";
    $query = $dbh->prepare($sql);
    $query->bindParam(':catname', $catname, PDO::PARAM_STR);
    $query->bindParam(':perHourAmt', $perHourAmt, PDO::PARAM_STR);
    $query->bindParam(':monthlyAmt', $monthlyAmt, PDO::PARAM_STR);
    $query->bindParam(':eid', $eid, PDO::PARAM_STR);

    $query->execute();

    echo '<script>alert("Category name, per hour amount, and monthly amount have been updated")</script>';
}
?>

<!DOCTYPE html>
<html lang="en">
   <head>
   <title>Hire Maid </title>
        
        <link rel="manifest" href="site.webmanifest">
		<link rel="shortcut icon" type="image/x-icon" href="images/image 9.png" style="margin-top: 20px;margin-left:20px;">
      <link rel="stylesheet" href="css/bootstrap.min.css" />
      <!-- site css -->
      <link rel="stylesheet" href="style.css" />
      <!-- responsive css -->
      <link rel="stylesheet" href="css/responsive.css" />
      <!-- color css -->
      <link rel="stylesheet" href="css/colors.css" />
      <!-- select bootstrap -->
      <link rel="stylesheet" href="css/bootstrap-select.css" />
      <!-- scrollbar css -->
      <link rel="stylesheet" href="css/perfect-scrollbar.css" />
      <!-- custom css -->
      <link rel="stylesheet" href="css/custom.css" />
      <!-- calendar file css -->
      <link rel="stylesheet" href="js/semantic.min.css" />
   </head>
   <body class="inner_page general_elements">
      <div class="full_container">
         <div class="inner_container">
            <!-- Sidebar  -->
            <?php include_once('includes/sidebar.php');?>
            <!-- end sidebar -->
            <!-- right content -->
            <div id="content">
               <!-- topbar -->
               <?php include_once('includes/header.php');?>
               <!-- end topbar -->
               <!-- dashboard inner -->
               <div class="midde_cont">
                  <div class="container-fluid">
                     <div class="row column_title">
                        <div class="col-md-12">
                           <div class="page_title">
                              <h2>Update Category</h2>
                           </div>
                        </div>
                     </div>
                     <!-- row -->
                     <div class="row column8 graph">
                        <div class="col-md-12">
                           <div class="white_shd full margin_bottom_30">
                              <div class="full graph_head">
                                 <div class="heading1 margin_0">
                                    <h2>Update Category</h2>
                                 </div>
                              </div>
                              <div class="full progress_bar_inner">
                                 <div class="row">
                                    <div class="col-md-12">
                                       <div class="full">
                                          <div class="padding_infor_info">
                                             <div class="alert alert-primary" role="alert">
                                             <form method="post">
                                          <?php
                                             $eid = $_GET['editid'];
                                             $sql = "SELECT * from  tblcategory where ID=:eid";
                                             $query = $dbh->prepare($sql);
                                             $query->bindParam(':eid', $eid, PDO::PARAM_STR);
                                             $query->execute();
                                             $results = $query->fetchAll(PDO::FETCH_OBJ);
                                             if ($query->rowCount() > 0) {
                                                foreach ($results as $row) {
                                          ?>
                                          <fieldset>
                                             <div class="field">
                                                <label class="label_field">Category Name</label>
                                                <input type="text" name="catname" value="<?php echo htmlentities($row->CategoryName); ?>" class="form-control" required='true'>
                                             </div>
                                             <div class="field">
                                                <label class="label_field">Per Hour Amount</label>
                                                <input type="text" name="perhouramt" value="<?php echo htmlentities($row->perhouramount); ?>" class="form-control" required='true'>
                                             </div>
                                             <div class="field">
                                                <label class="label_field">Monthly Amount</label>
                                                <input type="text" name="monthlyamt" value="<?php echo htmlentities($row->monthlyamount); ?>" class="form-control" required='true'>
                                             </div>
                                             <?php } ?>
                                          </fieldset>
                                          <?php } ?>
                                          <div class="field margin_0">
                                             <label class="label_field hidden">hidden label</label>
                                             <button class="main_bt" type="submit" name="submit" id="submit">Update</button>
                                          </div>
                                       </form>
                                             </div>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                        <!-- funcation section -->
                     </div>
                  </div>
                  <!-- footer -->
                  <?php include_once('includes/footer.php');?>
               </div>
               <!-- end dashboard inner -->
            </div>
         </div>
         <!-- model popup -->
      </div>
      <!-- jQuery -->
      <script src="js/jquery.min.js"></script>
      <script src="js/popper.min.js"></script>
      <script src="js/bootstrap.min.js"></script>
      <!-- wow animation -->
      <script src="js/animate.js"></script>
      <!-- select country -->
      <script src="js/bootstrap-select.js"></script>
      <!-- owl carousel -->
      <script src="js/owl.carousel.js"></script> 
      <!-- chart js -->
      <script src="js/Chart.min.js"></script>
      <script src="js/Chart.bundle.min.js"></script>
      <script src="js/utils.js"></script>
      <script src="js/analyser.js"></script>
      <!-- nice scrollbar -->
      <script src="js/perfect-scrollbar.min.js"></script>
      <script>
         var ps = new PerfectScrollbar('#sidebar');
      </script>
      <!-- custom js -->
      <script src="js/custom.js"></script>
      <!-- calendar file css -->    
      <script src="js/semantic.min.js"></script>
   </body>
</html>
