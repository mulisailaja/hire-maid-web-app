<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');

if(isset($_POST['submit'])) {
    $aid = $_SESSION['id'];
    $name = $_POST['name'];
    $number = $_POST['number'];
    $email = $_POST['email'];
    
    $sql = "UPDATE tbladmin SET name=:name, number=:number, email=:email WHERE ID=:aid";
    $query = $dbh->prepare($sql);
    $query->bindParam(':name', $name, PDO::PARAM_STR);
    $query->bindParam(':email', $email, PDO::PARAM_STR);
    $query->bindParam(':number', $number, PDO::PARAM_STR);
    $query->bindParam(':aid', $aid, PDO::PARAM_STR);
    
    $query->execute();
    
    if($query->rowCount() > 0) {
        echo '<script>alert("Your profile has been updated")</script>';
        echo "<script>window.location.href ='profile.php'</script>";
    } else {
        echo '<script>alert("Something Went Wrong. Please try again")</script>';
    }
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
        <!-- Sidebar -->
        <?php include_once('includes/sidebar.php');?>
        <!-- End sidebar -->
        <!-- Right content -->
        <div id="content">
            <!-- Topbar -->
            <?php include_once('includes/header.php');?>
            <!-- End topbar -->
            <!-- Dashboard inner -->
            <div class="midde_cont">
                <div class="container-fluid">
                    <div class="row column_title">
                        <div class="col-md-12">
                            <div class="page_title">
                                <h2>Admin Profile</h2>
                            </div>
                        </div>
                    </div>
                    <!-- Row -->
                    <div class="row column8 graph">
                        <div class="col-md-12">
                            <div class="white_shd full margin_bottom_30">
                                <div class="full graph_head">
                                    <div class="heading1 margin_0">
                                        <h2>Profile</h2>
                                    </div>
                                </div>
                                <div class="full progress_bar_inner">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="full">
                                                <div class="padding_infor_info">
                                                    <div class="alert alert-primary" role="alert">
                                                        <form method="post">
                                                            <fieldset>
                                                                <?php
                                                                    $sql = "SELECT * FROM tbladmin WHERE ID = :id";
                                                                    $query = $dbh->prepare($sql);
                                                                    $query->bindParam(':id', $_SESSION['id'], PDO::PARAM_STR);
                                                                    $query->execute();
                                                                    $row = $query->fetch(PDO::FETCH_ASSOC);
                                                                ?>
                                                                <div class="field">
                                                                    <label class="label_field">Name</label>
                                                                    <input type="text" name="name" value="<?php echo $row['name'];?>" class="form-control" required='true'>
                                                                </div>
                                                                <br>
                                                                <div class="field">
                                                                    <label class="label_field">Contact Number</label>
                                                                    <input type="text" name="number" value="<?php echo $row['number'];?>" class="form-control" maxlength='10' required='true' pattern="[0-9]+">
                                                                </div>
                                                                <br>
                                                                <div class="field">
                                                                    <label class="label_field">Email</label>
                                                                    <input type="email" name="email" value="<?php echo $row['email'];?>" class="form-control" required='true'>
                                                                </div>
                                                                <br>
                                                                <div class="field margin_0">
                                                                    <label class="label_field hidden">hidden label</label>
                                                                    <button class="main_bt" type="submit" name="submit" id="submit">Update</button>
                                                                </div>
                                                            </fieldset>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Footer -->
                    <?php include_once('includes/footer.php');?>
                </div>
                <!-- End dashboard inner -->
            </div>
        </div>
    </div>
</div>
<!-- jQuery and other scripts -->
</body>
</html>